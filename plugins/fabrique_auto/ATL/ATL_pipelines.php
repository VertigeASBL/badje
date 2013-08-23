<?php
/*
*   On ajoute un peu de javascript.
*/
function ATL_insert_head($flux) {
    
    /*
    *   Liste des pages qui on besoin du script de confirmation
    */
    $page_insert_confirmer = array(
        'admin',
        'editer_activite',
        'editer_organisme'
        );

    if (in_array(_request('page'), $page_insert_confirmer))
        $flux .= '<script src="'.find_in_path('javascript/confirmer.js').'" type="text/javascript"></script>';
    
    return $flux;
}

?>