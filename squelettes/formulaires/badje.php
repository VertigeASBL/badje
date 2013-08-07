<?php
/*
*    Moteur de recherche du site Badje
*
*    Didier - Vertige ASBL
*    http://www.vertige.org/
*    http://p.henix.be/
*/

function formulaires_badje_charger_dist() {
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
    
    // On récupère les donnée de la base de donnée des organiseme
    $organisme_commune = sql_allfetsel('code_postal, localite', 'spip_badje_organismes', '', 'code_postal');
    
    // On boucle sur le retour de base de donnée pour l'ajouter à notre trableau
    foreach ($organisme_commune as $key => $value) {
        $commune[$value['code_postal']] = $value['localite'].' '.$value['code_postal'];
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
                'nom' => 'periode',
                'label' => 'Périodes'
                ),
            'saisies' => array(
                array(
                    'saisie' => 'checkbox',
                    'options' => array(
                        'nom' => 'periodes',
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
                        'nom' => 'acces_handicap',
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

    // On charge aussi dans le contexte les données d'un éventuel formulaire envoyé.
    $contexte['recherche'] = _request('recherche');
    $contexte['code_postal'] = _request('code_postal');
    $contexte['ages'] = _request('ages');
    $contexte['periode'] = _request('periodes');
    $contexte['creative'] = _request('creative');
    $contexte['multiactivite'] = _request('multiactivite');
    $contexte['soutien'] = _request('soutien');
    $contexte['sportive'] = _request('sportive');
    $contexte['accueil_handicap'] = _request('accueil_handicap');

    $contexte['action'] = generer_url_public('recherche-badje');

    return $contexte;
}

function formulaires_badje_verifier_dist() {
    $erreurs = array();
    /*if (!_request('')) {
            $erreurs['message_erreur'] = '';
            $erreurs['NomErreur'] = '';
    }*/
    return $erreurs;
}

function formulaires_badje_traiter_dist() {
    
    /* message */
    return array(
            'editable' => true,
            'message_ok' => '',
            'redirect' => ''
    );
}
?>