<?php
function formulaires_exporter_organisme_charger_dist() {
    
    // On récupère les donnée de la base de donnée des organiseme
    $organisme_commune = sql_allfetsel('code_postal, commune', 'spip_badje_activites', '', 'code_postal');
    
    // On boucle sur le retour de base de donnée pour l'ajouter à notre tableau
    foreach ($organisme_commune as $key => $value) {
        $commune[$value['code_postal']] = $value['commune'].' '.$value['code_postal'];
    }

    asort($commune);

    $contexte = array('commune' => $commune);
    return $contexte;
}

function formulaires_exporter_organisme_verifier_dist() {
    // if (!_request('')) {
    //         $erreurs['message_erreur'] = '';
    //         $erreurs['NomErreur'] = '';
    // }

    $erreurs = array();
    
    return $erreurs;
}

function formulaires_exporter_organisme_traiter_dist() {
    
    // On déclare le tableau qui sera en réalité le fichier CSV
    $csv = array();

    // On récupère les champs de la table
    $champ = lister_tables_objets_sql('spip_badje_activites');

    // On ajoute les champs en première ligne du fichier csv.
    $csv[] = $champ['champs_editables'];

    // On ajoute manuellement la colonne "type d'activité"
    $csv[0]['type_activite'] = "Type d'activite";

    // Si une commune est envoyer on filtre sur cette commune.
    if (_request('commune_export')) 
        $where = 'code_postal='.sql_quote(_request('commune_export'));
    // Sinon pas de filtre
    else $where = null;

    // En plus des champs éditable, on va ajouter l'id_activite.
    $champ['champs_editables'][] = 'id_activite';

    // On récupère les activités.
    $data = sql_allfetsel($champ['champs_editables'], 'spip_badje_activites', $where);

    // On va ajouter les types d'activité a la fin.
    foreach ($data as $key => $value) {
        
        // On récupère les type d'activité.
        $activite = sql_allfetsel(
            'type.type_activite',
            "spip_badje_type_activites_liens as liens
                INNER JOIN spip_badje_type_activites as type
                    ON type.id_type_activite = liens.id_type_activite",
            'id_objet = '.sql_quote($value['id_activite']));

        // La requête est faite, on supprime l'ID pour éviter de l'avoir dans le csv
        unset($data[$key]['id_activite']);

        // On va créer une chaine à mettre dans le CSV final.
        $type_activite = '';
        foreach ($activite as $cle => $valeur) {
            $type_activite .= $valeur['type_activite'].', ';
        }
        spip_log($type_activite, 'type');
        $data[$key]['type_activite'] = $type_activite;
    }

    // on ajoute les donnée des activité au fichier csv.
    $csv = array_merge($csv, $data);

    // On va remplacer le symbole € par un E.
    function replace_euro($str) {
        return str_replace('€', 'E', $str);
    }
    $csv = array_map('replace_euro', $csv);

    // On va chercher la fonction de création de fichier CSV
    $exporter_csv = charger_fonction('exporter_csv', 'inc/', true);

    // On crée le fichier CSV
    echo $exporter_csv('export_activite_'._request('commune_export'), $csv, 'TAB');
    // On arrête tout, le fichier est envoyé a l'utilisateur.
    exit();

    /* message */
    return array(
            'editable' => true,
            'message_ok' => '',
            'redirect' => ''
    );
}
?>