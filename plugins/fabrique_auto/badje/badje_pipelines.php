<?php
/**
 * Utilisations de pipelines par Badje
 *
 * @plugin     Badje
 * @copyright  2013
 * @author     Vertige ASBL
 * @licence    GNU/GPL
 * @package    SPIP\Badje\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;
	

/*
 * Un fichier de pipelines permet de regrouper
 * les fonctions de branchement de votre plugin
 * sur des pipelines existants.
 */



/**
 * Ajout de contenu sur certaines pages,
 * notamment des formulaires de liaisons entre objets
 *
 * @pipeline affiche_milieu
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
function badje_affiche_milieu($flux) {
	$texte = "";
	$e = trouver_objet_exec($flux['args']['exec']);

	// auteurs sur les badje_activites, badje_organismes
	if (!$e['edition'] AND in_array($e['type'], array('activite', 'organisme'))) {
		$texte .= recuperer_fond('prive/objets/editer/liens', array(
			'table_source' => 'auteurs',
			'objet' => $e['type'],
			'id_objet' => $flux['args'][$e['id_table_objet']]
		));
	}


	// badje_organismes sur les badje_activites
	if (!$e['edition'] AND in_array($e['type'], array('activite'))) {
		$texte .= recuperer_fond('prive/objets/editer/liens', array(
			'table_source' => 'badje_organismes',
			'objet' => $e['type'],
			'id_objet' => $flux['args'][$e['id_table_objet']]
		));
	}
	// badje_type_activites sur les badje_activites
	if (!$e['edition'] AND in_array($e['type'], array('activite'))) {
		$texte .= recuperer_fond('prive/objets/editer/liens', array(
			'table_source' => 'badje_type_activites',
			'objet' => $e['type'],
			'id_objet' => $flux['args'][$e['id_table_objet']]
		));
	}
	// badje_groupe_activitie sur les badje_type_activites
	if (!$e['edition'] AND in_array($e['type'], array('type_activite'))) {
		$texte .= recuperer_fond('prive/objets/editer/liens', array(
			'table_source' => 'badje_groupe_activitie',
			'objet' => $e['type'],
			'id_objet' => $flux['args'][$e['id_table_objet']]
		));
	}

	if ($texte) {
		if ($p=strpos($flux['data'],"<!--affiche_milieu-->"))
			$flux['data'] = substr_replace($flux['data'],$texte,$p,0);
		else
			$flux['data'] .= $texte;
	}

	return $flux;
}


/**
 * Ajout de liste sur la vue d'un auteur
 *
 * @pipeline affiche_auteurs_interventions
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
function badje_affiche_auteurs_interventions($flux) {
	if ($id_auteur = intval($flux['args']['id_auteur'])) {

		$flux['data'] .= recuperer_fond('prive/objets/liste/badje_activites', array(
			'id_auteur' => $id_auteur,
			'titre' => _T('activite:info_badje_activites_auteur')
		), array('ajax' => true));

		$flux['data'] .= recuperer_fond('prive/objets/liste/badje_organismes', array(
			'id_auteur' => $id_auteur,
			'titre' => _T('organisme:info_badje_organismes_auteur')
		), array('ajax' => true));

	}
	return $flux;
}


/**
 * Optimiser la base de données en supprimant les liens orphelins
 * de l'objet vers quelqu'un et de quelqu'un vers l'objet.
 *
 * @pipeline optimiser_base_disparus
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
function badje_optimiser_base_disparus($flux){
	include_spip('action/editer_liens');
	$flux['data'] += objet_optimiser_liens(array('organisme'=>'*', 'type_activite'=>'*', 'groupe_activite'=>'*'),'*');
	return $flux;
}

?>