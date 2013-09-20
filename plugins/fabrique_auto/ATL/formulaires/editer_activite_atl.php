<?php
/**
 * Gestion du formulaire de d'édition de activite
 *
 * @plugin     Badje
 * @copyright  2013
 * @author     Vertige ASBL
 * @licence    GNU/GPL
 * @package    SPIP\Badje\Formulaires
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

include_spip('inc/actions');
include_spip('inc/editer');

/**
 * Identifier le formulaire en faisant abstraction des paramètres qui ne représentent pas l'objet edité
 *
 * @param int|string $id_activite
 *     Identifiant du activite. 'new' pour un nouveau activite.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un activite source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du activite, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return string
 *     Hash du formulaire
 */
function formulaires_editer_activite_identifier_dist($id_activite='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	return serialize(array(intval($id_activite)));
}

/**
 * Chargement du formulaire d'édition de activite
 *
 * Déclarer les champs postés et y intégrer les valeurs par défaut
 *
 * @uses formulaires_editer_objet_charger()
 *
 * @param int|string $id_activite
 *     Identifiant du activite. 'new' pour un nouveau activite.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un activite source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du activite, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Environnement du formulaire
 */
function formulaires_editer_activite_atl_charger_dist($id_activite='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	$valeurs = formulaires_editer_objet_charger('activite',$id_activite,'',$lier_trad,$retour,$config_fonc,$row,$hidden);
	return $valeurs;
}

/**
 * Vérifications du formulaire d'édition de activite
 *
 * Vérifier les champs postés et signaler d'éventuelles erreurs
 *
 * @uses formulaires_editer_objet_verifier()
 *
 * @param int|string $id_activite
 *     Identifiant du activite. 'new' pour un nouveau activite.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un activite source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du activite, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Tableau des erreurs
 */
function formulaires_editer_activite_atl_verifier_dist($id_activite='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	
    // Conversion des champs pour la base de donnée.
    implode_champs();
    
    return formulaires_editer_objet_verifier('activite',$id_activite, array('nom'));
}

/**
 * Traitement du formulaire d'édition de activite
 *
 * Traiter les champs postés
 *
 * @uses formulaires_editer_objet_traiter()
 *
 * @param int|string $id_activite
 *     Identifiant du activite. 'new' pour un nouveau activite.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un activite source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du activite, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Retours des traitements
 */
function formulaires_editer_activite_atl_traiter_dist($id_activite='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	
    // On traite le fomulaire et dans le res on récupère l'id_activité
    $res = formulaires_editer_objet_traiter('activite',$id_activite,'',$lier_trad,$retour,$config_fonc,$row,$hidden);

    // On va lier l'organisme
    objet_associer(
        array('organisme' => _request('id_organisme')), 
        array('activite' => $res['id_activite'])
        );

    // On va lier les types d'activité.
    objet_associer(
        array('type_activite' => _request('type_activite')), 
        array('activite' => $res['id_activite'])
        );

    // Donner une autorisation exceptionnelle temporaire
    autoriser_exception('instituer', 'activite', $res['id_activite']);
    // Publier l'activite
    objet_instituer('activite', $res['id_activite'], array('statut' => 'publie'));
    // Retirer l'autorisation exceptionnelle
    autoriser_exception('instituer', 'activite', $res['id_activite'], false);

    $res['redirect'] = generer_url_public('editer_organisme', 'id_organisme=303#panel2');

    return $res;
}


?>