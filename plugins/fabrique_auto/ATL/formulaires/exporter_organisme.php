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

    // Si une commune est envoyer on filtre sur cette commune.
    if (_request('commune_export')) 
        $where = 'code_postal='.sql_quote(_request('commune_export'));
    // Sinon pas de filtre
    else $where = null;
    
    // On récupère les activités.
    $data = sql_allfetsel($champ['champs_editables'], 'spip_badje_activites', $where);

    // on ajoute les donnée des activité au fichier csv.
    $csv = array_merge($csv, $data);

    // On va chercher la fonction de création de fichier CSV
    $exporter_csv = charger_fonction('exporter_csv', 'inc/', true);
    // On crée le fichier CSV
    echo $exporter_csv('export_activite_'._request('commune_export'), $csv);
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