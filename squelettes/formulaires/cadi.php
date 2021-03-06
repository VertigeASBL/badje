<?php
include_spip('inc/session');

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

    // On récupère le cadi actuel de la personne
    $cadi_actuel = session_get('cadi');

    // S'il existe et que l'activité est déjà dans le tableau, on passe dans le contexte une instruction pour ne pas afficher le formulaire.
    if (is_array($cadi_actuel) 
        and in_array($id_activite, $cadi_actuel)
        and !_request('delete')) {
        $erreurs['message_erreur'] = 'Déjà dans le cadi';
    }

    return $erreurs;
}

function formulaires_cadi_traiter_dist($id_activite) {
    
    $res = array(
            'editable' => true,
            'message_ok' => '',
            'redirect' => ''
    );

    // On récupère le cadi actuel du visiteur
    $cadi_actuel = session_get('cadi');

    // Si on ne supprime pas, on ajoute
    if (!_request('delete')) {
        // On place le nouvel objet
        $cadi_actuel[] = $id_activite;

        // Mise à jour de la session
        session_set('cadi', $cadi_actuel);
    }
    // Sinon on supprime
    else {
        unset($cadi_actuel[array_search($id_activite, $cadi_actuel)]);

        session_set('cadi', $cadi_actuel);
    }

    // All clear !
    return $res;
}
?>