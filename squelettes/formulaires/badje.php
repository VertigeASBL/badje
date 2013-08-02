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
                'label' => 'Recherche Libre'),
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

    // La liste des périodes disponible.
    $periodes = array(
        'Automne' => 'Automne', 
        'Hiver' => 'Hiver',
        'Détente' => 'Détente', 
        'Printemps' => 'Printemps', 
        'Juillet' => 'Juillet', 
        'Août' => 'Août'
    );

    $form_saisie_options = array( 
        // La saisie des lieux
        array(
            'saisie' => 'fieldset',
            'options' => array(
                'nom' => 'lieux', 
                'label' => 'Lieux'
                ),
            'saisies' => array(
                array('saisie' => 'checkbox',
                    'options' => array(
                        'nom' => 'lieux', 
                        'datas' => $commune
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
                        'nom' => 'periodes',
                        'datas' => $periodes
                        )
                    )
                )
            )
    );

    $contexte = array(
            'form_saisie_recherche' => $form_saisie_recherche,
            'form_saisie_options' => $form_saisie_options
    );
    return $contexte;
}

function formulaires_badje_verifier_dist() {
    $erreurs = array();
    if (!_request('')) {
            $erreurs['message_erreur'] = '';
            $erreurs['NomErreur'] = '';
    }
    return $erreurs;
}

function formulaires_badje_traiter_dist() {
    $data = _request('data');

    /* message */
    return array(
            'editable' => true,
            'message_ok' => '',
            'redirect' => ''
    );
}
?>