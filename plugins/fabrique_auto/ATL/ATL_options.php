<?php
/**
 * Options du plugin Badje_ATLau chargement
 *
 * @plugin     Badje_ATL
 * @copyright  2013
 * @author     vertige
 * @licence    GNU/GPL
 * @package    SPIP\ATL\Options
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/*
 * Un fichier d'options permet de définir des éléments
 * systématiquement chargés à chaque hit sur SPIP.
 *
 * Il vaut donc mieux limiter au maximum son usage
 * tout comme son volume !
 * 
 */

/*
*   On créer un statut SPIP spécial pour les ATL
*/
$GLOBALS['liste_des_statuts'][] = 'ATL';
?>