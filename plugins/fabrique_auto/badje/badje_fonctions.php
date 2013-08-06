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

?>