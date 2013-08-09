<?php
function formulaires_cadi_charger_dist($id_activite) {
    
    // On récupère le cadi actuel de la personne
    $cadi_actuel = session_get('cadi');

    // S'il existe et que l'activité est déjà dans le tableau, on passe dans le contexte une instruction pour ne pas afficher le formulaire.
    if (is_array($cadi_actuel) and in_array($id_activite, $cadi_actuel)) {
        $contexte['in_cadi'] = true;
    }
    // Sinon on autorise l'affichage.
    else $contexte['in_cadi'] = false;

    return $contexte;
}


function formulaires_cadi_verifier_dist($id_activite) {
    /*if (!_request('')) {
            $erreurs['message_erreur'] = '';
            $erreurs['NomErreur'] = '';
    }*/
    $erreurs = array();
    return $erreurs;
}

function formulaires_cadi_traiter_dist($id_activite) {
    
    // On récupère le cadi actuel du visiteur
    $cadi_actuel = session_get('cadi');

    // On place le nouvel objet
    $cadi_actuel[] = $id_activite;

    // Mise à jour de la session
    session_set('cadi', $cadi_actuel);

    // All clear !
    return array(
            'editable' => true,
            'message_ok' => '',
            'redirect' => ''
    );
}
?>