<?php
function formulaires_exporter_organisme_charger_dist() {
    $contexte = array();
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
    
    // On récupère la table des organismes
    $sql = sql_select('*', 'spip_badje_organismes');

    $exporter_csv = charger_fonction('exporter_csv', 'inc/', true);
    echo $exporter_csv('organisme', $sql);
    exit();

    /* message */
    return array(
            'editable' => true,
            'message_ok' => '',
            'redirect' => ''
    );
}
?>