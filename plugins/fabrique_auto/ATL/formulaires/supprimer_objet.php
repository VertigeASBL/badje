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
    include_spip('inc/autoriser');

    // donner une autorisation exceptionnelle temporaire
    autoriser_exception('instituer', $objet, $id_objet);
    // Publier l'organisme
    objet_instituer($objet, $id_objet, array('statut' => 'poubelle'));
    // retirer l'autorisation exceptionnelle
    autoriser_exception('instituer', $objet, $id_objet, false);
    
    /* message */
    return array(
            'editable' => true,
            'redirect' => self().'#panel2'
    );
}
?>