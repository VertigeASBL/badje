<?php
function formulaires_cadi_charger_dist($id_activite) {
    $contexte = array(
            '' => '',
    );
    return $contexte;
}

function formulaires_cadi_verifier_dist($id_activite) {
    $erreurs = array();
    if (!_request('')) {
            $erreurs['message_erreur'] = '';
            $erreurs['NomErreur'] = '';
    }
    return $erreurs;
}

function formulaires_cadi_traiter_dist($id_activite) {
    $data = _request('data');

    /* message */
    return array(
            'editable' => true,
            'message_ok' => '',
            'redirect' => ''
    );
}
?>