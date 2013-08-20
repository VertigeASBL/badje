<?php
/*
*    Moteur de recherche du site Badje
*
*    Didier - Vertige ASBL
*    http://www.vertige.org/
*    http://p.henix.be/
*/

include_spip('base/abstract_sql');
include_spip('inc/session');


/*
*   une fonction pour récupérer facilement le contexte de la recherche.
*/
function get_contexte_recherche($contexte) {
    
    $contexte['recherche'] = _request('recherche');
    $contexte['code_postal'] = _request('code_postal');
    $contexte['ages'] = _request('ages');
    $contexte['periode'] = _request('periode');
    $contexte['creative'] = _request('creative');
    $contexte['multiactivite'] = _request('multiactivite');
    $contexte['sejour'] = _request('sejour');
    $contexte['soutien'] = _request('soutien');
    $contexte['sportive'] = _request('sportive');
    $contexte['accueil_handicap'] = _request('accueil_handicap');
    $contexte['accessibilite_handicap'] = _request('accessibilite_handicap');
    
    // On revient à oui au lieu du ON de la base de donnée.
    if ($contexte['accueil_handicap'] == 'on') $contexte['accueil_handicap'] = 'oui';
    if ($contexte['accessibilite_handicap'] == 'on') $contexte['accessibilite_handicap'] = 'oui';

    return $contexte;
}


function formulaires_badje_charger_dist($retour_recherche = null) {
    /*
    *   Ce tableau va défini la structure du le formulaire.
    */
    $form_saisie_recherche = array( 
        array(
            'saisie' => 'fieldset',
            'options' => array(
                'nom' => 'Recherche_libre', 
                'label' => 'Recherche Libre',
                'explication' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui.'
                ),
            'saisies' => array(
                array('saisie' =>'input',
                    'options' => array(
                        'nom' => 'recherche', 
                        'placeholder' => 'effectuer un recherche')
                )
            )
        )
    );

    /*
    *   On va créer un tableau code postal => commune.code_postal à passer dans le datas du champ lieux.
    *   Les recherches ce feront ainsi sur le code postal qui est une donnée plus fiable que le nom de la commune.
    */
    $commune = array('all' => 'Toutes les communes');
    /*
        TODO: Commenue par order alphabètique et mettre (bxl ville sur haren, laeken et neder)
    */
    // On récupère les donnée de la base de donnée des organiseme
    $organisme_commune = sql_allfetsel('code_postal, commune', 'spip_badje_activites', '', 'code_postal');
    
    // On boucle sur le retour de base de donnée pour l'ajouter à notre trableau
    foreach ($organisme_commune as $key => $value) {
        $commune[$value['code_postal']] = $value['commune'].' '.$value['code_postal'];
    }

    // Liste des ages pour les enfants.
    $age_list = array(
        1.5 => '1,5 ans',
        2 => '2 ans',
        2.5 => '2,5 ans'
        );
    // maintenant ça suffit, on boucle pour ajouter les autres nombre
    $i = 3;
    while ($i <= 12) {
        $age_list[$i] = $i.' ans';
        $i++;
    }

    // La liste des périodes disponible.
    $periodes = array(
        'Automne' => 'Automne', 
        'Détente' => 'Détente', 
        'Juillet' => 'Juillet', 
        'Hiver' => 'Hiver',
        'Printemps' => 'Printemps', 
        'Août' => 'Août'
    );

    /*
        TODO: tenter de mettre les flèches du design.
    */

    // liste des Activités créatives
    $activite_creative = array();
    $activite_creative_sql = sql_allfetsel(
        'id_type_activite, type_activite', 
        'spip_badje_type_activites AS type
        INNER JOIN spip_badje_groupe_activitie_liens AS L ON L.id_objet = type.id_type_activite
        INNER JOIN spip_badje_groupe_activitie AS groupe ON L.id_groupe_activite = groupe.id_groupe_activite', 
        'L.objet='.sql_quote('type_activite').' AND groupe.id_groupe_activite=1');
    foreach ($activite_creative_sql as $key => $value) {
        $activite_creative[$value['id_type_activite']] = $value['type_activite'];
    }

    // Liste des activité sportive
    $activite_sportive = array();
    $activite_sportive_sql = sql_allfetsel(
        'id_type_activite, type_activite', 
        'spip_badje_type_activites AS type
        INNER JOIN spip_badje_groupe_activitie_liens AS L ON L.id_objet = type.id_type_activite
        INNER JOIN spip_badje_groupe_activitie AS groupe ON L.id_groupe_activite = groupe.id_groupe_activite', 
        'L.objet='.sql_quote('type_activite').' AND groupe.id_groupe_activite=1');
    foreach ($activite_sportive_sql as $key => $value) {
        $activite_sportive[$value['id_type_activite']] = $value['type_activite'];
    }

    include_spip('inc/filtres');
    $form_saisie_options = array( 
        // La saisie des lieux
        array(
            'saisie' => 'fieldset',
            'options' => array(
                'nom' => 'code_postal', 
                'label' => 'Lieux',
                'explication' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui.'
                ),
            'saisies' => array(
                array('saisie' => 'checkbox',
                    'options' => array(
                        'nom' => 'code_postal', 
                        'datas' => $commune
                        )
                    )
                )
            ),
        // La saisie pour les ages.
        array(
            'saisie' => 'fieldset',
            'options' => array(
                'nom' => 'ages',
                'label' => 'Âges'
                ),
            'saisies' => array(
                    array(
                        'saisie' => 'selection_multiple',
                        'options' => array(
                            'nom' => 'ages',
                            'label' => 'Mes enfants ont',
                            'class' => 'chosen',
                            'datas' => $age_list,
                            'explication' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui.'
                            )
                        )
                )
            ),

        // La saisie des périodes
        array(
            'saisie' => 'fieldset',
            'options' => array(
                'nom' => 'periodes',
                'label' => 'Périodes'
                ),
            'saisies' => array(
                array(
                    'saisie' => 'checkbox',
                    'options' => array(
                        'nom' => 'periode',
                        'datas' => $periodes
                        )
                    )
                )
            ),
        array(
            'saisie' => 'fieldset',
            'options' => array(
                'nom' => 'activite',
                'label' => 'Activité'
                ),
            'saisies' => array(
                array(
                    'saisie' => 'selection_multiple',
                    'options' => array(
                        'nom' => 'creative',
                        'label' => 'Activités créatives, ludiques et culturelles',
                        'class' => 'chosen',
                        'datas' => $activite_creative
                        )
                    ),
                array(
                    'saisie' => 'checkbox',
                    'options' => array(
                        'nom' => 'multiactivite',
                        'datas' => array('oui' => 'Multiactivités'),
                        'explication' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui.'
                        )
                    ),
                array(
                    'saisie' => 'checkbox',
                    'options' => array(
                        'nom' => 'soutien',
                        'datas' => array('oui' => 'Soutien Scolaire')
                        )
                    ),
                array(
                    'saisie' => 'checkbox',
                    'options' => array(
                        'nom' => 'sejour',
                        'datas' => array('oui' => 'Séjours')
                        )
                    ),
                array(
                    'saisie' => 'selection_multiple',
                    'options' => array(
                        'nom' => 'sportive',
                        'label' => 'Activités sportives',
                        'class' => 'chosen',
                        'datas' => $activite_sportive
                        )
                    ),
                ),
                
            ),
        array(
            'saisie' => 'fieldset',
            'options' => array(
                'nom' => 'handicap',
                'label' => 'Handicap',
                'explication' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui.'
                ),
            'saisies' => array(
                array(
                    'saisie' => 'checkbox',
                    'options' => array(
                        'nom' => 'accueil_handicap',
                        'datas' => array('oui' => 'Accueil des enfants en situation de handicap')
                        )
                    ),
                array(
                    'saisie' => 'checkbox',
                    'options' => array(
                        'nom' => 'accessibilite_handicap',
                        'datas' => array('oui' => 'Accessible aux enfants à mobilité réduite')
                        )
                    )
                )
            )
    );
    
    // On charge les formulaire dans le contexte.
    $contexte = array(
            'form_saisie_recherche' => $form_saisie_recherche,
            'form_saisie_options' => $form_saisie_options
    );

    if ($retour_recherche and is_array(session_get('recherche_contexte'))) $contexte = array_merge($contexte, session_get('recherche_contexte') );
    else {
        // On charge aussi dans le contexte les données d'un éventuel formulaire envoyé.
        $contexte = get_contexte_recherche($contexte);
    }

    // On change l'action pour envoyer les donnée sur une autre page.
    $contexte['action'] = generer_url_public('recherche-badje');

    return $contexte;
}

function formulaires_badje_verifier_dist($retour_recherche) {
    $erreurs = array();
    /*if (!_request('')) {
            $erreurs['message_erreur'] = '';
            $erreurs['NomErreur'] = '';
    }*/
    return $erreurs;
}

function formulaires_badje_traiter_dist($retour_recherche) {
    
    // On initialise le where de la requête SQL
    $where = array();

    // On traite la recherche libre:
    if (_request('recherche')) {
        // on LIKE dans les champs de textes.
        $recherche = _request('recherche');
        $where[] = "(a.nom LIKE '%$recherche%' OR a.descriptif LIKE '%$recherche%')";
    }

    // On traite le tableau des communes qui est sous forme de code postal.
    if (_request('code_postal')) {
        // On en fait une belle chaine de caractère et on passe le tout dans un IN sql.
        $code_postal = implode(',', _request('code_postal'));
        $where[] = "a.code_postal IN ($code_postal)";
    }

    // On traite le tableau des ages
    if (_request('ages')) {

        // On récupère l'age minimum et maximum du tableau
        $age_min = min(_request('ages'));
        $age_max = max(_request('ages'));

        // On ajoute le paramètre de recherche dans le where.
        $where[] = "age_min <= $age_min AND age_max >= $age_max";
    }

    // On va traiter les types d'activités.
    // On initialise un tableau vide pour contiendra les id_type_activité.
    $id_type_activite = array();
    // On traite les multiactivités
    if (_request('multiactivite')) {
        // D'abord, pour être sur d'avoir le bon id, on le récupère.
        $id_multiactivite = sql_getfetsel('id_type_activite', 'spip_badje_type_activites', 'type_activite='.sql_quote('Multiactivités'));
        
        // On l'ajoute au tableau des types d'acivité.
        $id_type_activite[] = $id_multiactivite;
    }

    // On traite la case de soutient scolaire.
    if (_request('soutien')) {
        // D'abord, pour être sur d'avoir le bon id, on le récupère.
        $id_soutien = sql_getfetsel('id_type_activite', 'spip_badje_type_activites', 'type_activite='.sql_quote('Soutien scolaire'));
        
        // On l'ajoute au tableau des types d'acivité.
        $id_type_activite[] = $id_soutien;
    }

    // On traite les tableaux d'activité.
    if (_request('creative'))
        $id_type_activite = array_merge($id_type_activite, _request('creative'));
    if (_request('sportive'))
        $id_type_activite = array_merge($id_type_activite, _request('sportive'));
    
    // On va ajouter le SQL pour filtrer selon le type d'activité.
    if (!empty($id_type_activite)) {
        // On implode pour que ce entre dans le IN
        $id_type_activite = implode(',', $id_type_activite);
        $where[] = "tl.id_type_activite IN ($id_type_activite)";
    }

    // On traite la case séjour
    if (_request('sejour')) {
        $where[] = "a.logement LIKE '%Séjour%'";
    }

    // Case "Accueil des enfants en situation de handicap"
    if (_request('accueil_handicap')) {
        $where[] = "accueil_handicap = 'on'";
    }

    // case "Accessible aux enfants à mobilité réduite"
    if (_request('accessibilite_handicap')) {
        $where[] = "accessibilite_handicap = 'on'";
    }


    // Fonction de tri, par défaut on trie sur les communes
    if (_request('tri') == 'type') {
        $orderby = 'ta.id_type_activite';
        $groupby = '';
    }
    else {
        $orderby = 'a.commune, o.id_organisme';
        $groupby = 'id_activite';
    }

    // On va chercher la liste des activités qui corresponde à la recherche
    $badje_recherche = sql_allfetsel(
        'a.id_activite, a.periode, a.commune, ta.type_activite', 
        "spip_badje_activites AS a
        INNER JOIN spip_badje_organismes_liens AS l 
                        ON l.id_objet = a.id_activite AND l.objet = 'activite'
        INNER JOIN spip_badje_organismes AS o 
                        ON l.id_organisme = o.id_organisme
        INNER JOIN spip_badje_type_activites_liens AS tl
                        ON tl.id_objet = a.id_activite AND tl.objet = 'activite'
        INNER JOIN spip_badje_type_activites AS ta 
                        ON tl.id_type_activite = ta.id_type_activite",
        $where, $groupby, $orderby);

    // On va filtrer le tableau ici
    if (_request('periode')) {
        function filtrer_periode($periode) {

            $periode_db = get_array_periode($periode['periode']);
            $periode_envoye = _request('periode');
            
            foreach ($periode_envoye as $value) {
                if (in_array($value, $periode_db)) return true;
            }
            return false;
        }
        $badje_recherche = array_filter($badje_recherche, 'filtrer_periode');
    }
    // On passe tout ça aux squelettes SPIP
    set_request('badje_recherche', $badje_recherche);

    // On va récupérer le contexte de la recherche pour pouvoir l'injecter dans la session.
    $contexte = get_contexte_recherche($contexte);

    // On va sauvegarder le contexte dans la session SPIP pour pouvoir récupérer la recherche par la suite.
    session_set('recherche_contexte', $contexte);

    /* message */
    return array(
            'editable' => true,
            'message_ok' => '',
            'redirect' => ''
    );
}
?>