<?php

/*
*   La variable $type_recherche défini le champs qui sert à rechercher:
*   nom_organisme sur la page des organismes
*   
*/

function formulaires_recherche_atl_charger_dist($type_recherche) {
    $contexte = array(
        'type_recherche' => $type_recherche,
        $type_recherche => _request($type_recherche)
    );
    return $contexte;
}

function formulaires_recherche_atl_verifier_dist() {
    $erreurs = array();
    return $erreurs;
}

function formulaires_recherche_atl_traiter_dist() {
    

    /* message */
    return array(
            'editable' => true,
    );
}
?>