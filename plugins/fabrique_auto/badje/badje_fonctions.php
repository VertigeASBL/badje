<?php
/**
 * Fonctions utiles au plugin Badje
 *
 * @plugin     Badje
 * @copyright  2013
 * @author     Vertige ASBL
 * @licence    GNU/GPL
 * @package    SPIP\Badje\Fonctions
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/*
*   Fonction qui permet d'afficher la pédiode d'une activité sous forme de chaine de caractère plus maléable.
*/
function afficher_periode($periode_string, $glue = ', ') {

    // En premier lieu, on va récupèrer nos données dans un tableau.
    $periode_string = explode(',', $periode_string);

    // On renvoie le nouveau formatage.
    return implode($glue, $periode_string);
}

/*
*   Cette fonction est utiliser pour transormer #PERIODE en tableau utilisable.
*/
function get_array_periode($periode_string) {
    return explode(',', $periode_string);
}

/*
*   Fonction qui ajoute http:// devant un lien s'il n'y a rien.
*/
function add_http($url) {
    if (!preg_match("/^(http|https|ftp):/", $url) and $url) 
        return $url = 'http://'.$url;
}


/*
*   Certains champs sont des des tableaux que l'ont dois assembler avant de les ajouter à la base de donnée.
*/
function implode_champs() {
    
    // On traite le champ logement
    if (_request('logement')) 
        set_request('logement', implode(',', _request('logement')));
    // On traite le champ période
    if (_request('periode')) 
        set_request('periode', implode(',', _request('periode')));
}

?>