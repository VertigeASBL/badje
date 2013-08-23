<?php
function formulaires_supprimer_objet_charger_dist($id_objet, $objet) {
    $contexte = array();
    return $contexte;
}

function formulaires_supprimer_objet_verifier_dist($id_objet, $objet) {
    // if (!_request('')) {
    //         $erreurs['message_erreur'] = '';
    //         $erreurs['NomErreur'] = '';
    // }
    $erreurs = array();
    
    return $erreurs;
}

function formulaires_supprimer_objet_traiter_dist($id_objet, $objet) {
    
    // On place l'élément à la poubelle.
    include_spip('action/editer_objet');
    objet_instituer($objet, $id_objet, array('statut' => 'poubelle'));
    
    /* message */
    return array(
            'editable' => true
    );
}
?>