<?php 

/*
*   Fonction qui test les autorisations d'accès à l'admin
*/

function autoriser_adminATL_dist($faire, $type, $id, $qui, $opt){
    return in_array($qui['statut'], array('0minirezo', 'ATL'));
}

?>