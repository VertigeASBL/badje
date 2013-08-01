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

    $form_saisie_options = array( 
        array(
            'saisie' => 'fieldset',
            'options' => array(
                'nom' => 'lieux', 
                'label' => 'Lieux'),
            'saisies' => array(
                array('saisie' =>'input',
                    'options' => array(
                        'nom' => 'recherche', 
                        'placeholder' => 'effectuer un recherche')
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