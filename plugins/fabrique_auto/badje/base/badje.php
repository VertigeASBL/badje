<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     Badje
 * @copyright  2013
 * @author     Vertige ASBL
 * @licence    GNU/GPL
 * @package    SPIP\Badje\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 * @param array $interfaces
 *     Déclarations d'interface pour le compilateur
 * @return array
 *     Déclarations d'interface pour le compilateur
 */
function badje_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['badje_communes'] = 'badje_communes';
	$interfaces['table_des_tables']['badje_organismes'] = 'badje_organismes';
	$interfaces['table_des_tables']['badje_activites'] = 'badje_activites';
	$interfaces['table_des_tables']['badje_type_activites'] = 'badje_type_activites';

	return $interfaces;
}


/**
 * Déclaration des objets éditoriaux
 *
 * @pipeline declarer_tables_objets_sql
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function badje_declarer_tables_objets_sql($tables) {

	$tables['spip_badje_communes'] = array(
		'type' => 'commune',
		'principale' => "oui", 
		'table_objet_surnoms' => array('badjecommune'), // table_objet('commune') => 'badje_communes' 
		'field'=> array(
			"id_commune"         => "bigint(21) NOT NULL",
			"nom_commune"        => "text NOT NULL DEFAULT ''",
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_commune",
		),
		'titre' => "nom_commune AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('nom_commune'),
		'champs_versionnes' => array('nom_commune'),
		'rechercher_champs' => array("nom_commune" => 8),
		'tables_jointures'  => array('spip_badje_communes_liens'),
		

	);

	$tables['spip_badje_organismes'] = array(
		'type' => 'organisme',
		'principale' => "oui", 
		'table_objet_surnoms' => array('badjeorganisme'), // table_objet('organisme') => 'badje_organismes' 
		'field'=> array(
			"id_organisme"       => "bigint(21) NOT NULL",
			"nom_organisme"      => "text NOT NULL DEFAULT ''",
			"adresse"            => "text NOT NULL DEFAULT ''",
			"code_postal"        => "int(11) NOT NULL DEFAULT 0",
			"localite"           => "text NOT NULL DEFAULT ''",
			"telephone"          => "text NOT NULL DEFAULT ''",
			"gsm"                => "text NOT NULL DEFAULT ''",
			"fax"                => "text NOT NULL DEFAULT ''",
			"email"              => "text NOT NULL DEFAULT ''",
			"site_internet"      => "text NOT NULL DEFAULT ''",
			"membre_badje"       => "text NOT NULL DEFAULT ''",
			"one"                => "text NOT NULL DEFAULT ''",
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_organisme",
		),
		'titre' => "nom_organisme AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('nom_organisme', 'adresse', 'code_postal', 'localite', 'telephone', 'gsm', 'fax', 'email', 'site_internet', 'membre_badje', 'one'),
		'champs_versionnes' => array('nom_organisme', 'adresse', 'code_postal', 'localite', 'telephone', 'gsm', 'fax', 'email', 'site_internet', 'membre_badje', 'one'),
		'rechercher_champs' => array("nom_organisme" => 8, "adresse" => 4, "code_postal" => 4, "localite" => 6, "telephone" => 2, "gsm" => 2, "fax" => 1, "site_internet" => 4),
		'tables_jointures'  => array('spip_badje_organismes_liens'),
		

	);

	$tables['spip_badje_activites'] = array(
		'type' => 'activite',
		'principale' => "oui", 
		'table_objet_surnoms' => array('badjeactivite'), // table_objet('activite') => 'badje_activites' 
		'field'=> array(
			"id_activite"        => "bigint(21) NOT NULL",
			"nom"                => "text NOT NULL DEFAULT ''",
			"descriptif"         => "text NOT NULL DEFAULT ''",
			"prix"               => "text NOT NULL DEFAULT ''",
			"accessibilite_handicap" => "text NOT NULL DEFAULT ''",
			"logement"           => "text NOT NULL DEFAULT ''",
			"garderie"           => "text NOT NULL DEFAULT ''",
			"repas_chaud"        => "text NOT NULL DEFAULT ''",
			"nom_organisation"   => "text NOT NULL DEFAULT ''",
			"periode"            => "text NOT NULL DEFAULT ''",
			"age_min"            => "int(11) NOT NULL DEFAULT 0",
			"age_max"            => "int(11) NOT NULL DEFAULT 0",
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_activite",
			"KEY statut"         => "statut", 
		),
		'titre' => "nom_organisation AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('nom', 'descriptif', 'prix', 'accessibilite_handicap', 'logement', 'garderie', 'repas_chaud', 'nom_organisation', 'periode', 'age_min', 'age_max'),
		'champs_versionnes' => array('nom', 'descriptif', 'prix', 'accessibilite_handicap', 'logement', 'garderie', 'repas_chaud', 'nom_organisation', 'periode', 'age_min', 'age_max'),
		'rechercher_champs' => array("nom" => 8, "descriptif" => 6, "accessibilite_handicap" => 2, "repas_chaud" => 2, "nom_organisation" => 6, "periode" => 1, "age_min" => 6),
		'tables_jointures'  => array('spip_badje_activites_liens'),
		'statut_textes_instituer' => array(
			'prepa'    => 'texte_statut_en_cours_redaction',
			'prop'     => 'texte_statut_propose_evaluation',
			'publie'   => 'texte_statut_publie',
			'refuse'   => 'texte_statut_refuse',
			'poubelle' => 'texte_statut_poubelle',
		),
		'statut'=> array(
			array(
				'champ'     => 'statut',
				'publie'    => 'publie',
				'previsu'   => 'publie,prop,prepa',
				'post_date' => 'date', 
				'exception' => array('statut','tout')
			)
		),
		'texte_changer_statut' => 'activite:texte_changer_statut_activite', 
		

	);

	$tables['spip_badje_type_activites'] = array(
		'type' => 'type_activite',
		'principale' => "oui", 
		'table_objet_surnoms' => array('badjetypeactivite'), // table_objet('type_activite') => 'badje_type_activites' 
		'field'=> array(
			"id_type_activite"   => "bigint(21) NOT NULL",
			"type_activite"      => "text NOT NULL DEFAULT ''",
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_type_activite",
		),
		'titre' => "type_activite AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('type_activite'),
		'champs_versionnes' => array('type_activite'),
		'rechercher_champs' => array("type_activite" => 1),
		'tables_jointures'  => array('spip_badje_type_activites_liens'),
		

	);

	return $tables;
}


/**
 * Déclaration des tables secondaires (liaisons)
 *
 * @pipeline declarer_tables_auxiliaires
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function badje_declarer_tables_auxiliaires($tables) {

	$tables['spip_badje_communes_liens'] = array(
		'field' => array(
			"id_commune"         => "bigint(21) DEFAULT '0' NOT NULL",
			"id_objet"           => "bigint(21) DEFAULT '0' NOT NULL",
			"objet"              => "VARCHAR(25) DEFAULT '' NOT NULL",
			"vu"                 => "VARCHAR(6) DEFAULT 'non' NOT NULL"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_commune,id_objet,objet",
			"KEY id_commune"     => "id_commune"
		)
	);
	$tables['spip_badje_organismes_liens'] = array(
		'field' => array(
			"id_organisme"       => "bigint(21) DEFAULT '0' NOT NULL",
			"id_objet"           => "bigint(21) DEFAULT '0' NOT NULL",
			"objet"              => "VARCHAR(25) DEFAULT '' NOT NULL",
			"vu"                 => "VARCHAR(6) DEFAULT 'non' NOT NULL"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_organisme,id_objet,objet",
			"KEY id_organisme"   => "id_organisme"
		)
	);
	$tables['spip_badje_activites_liens'] = array(
		'field' => array(
			"id_activite"        => "bigint(21) DEFAULT '0' NOT NULL",
			"id_objet"           => "bigint(21) DEFAULT '0' NOT NULL",
			"objet"              => "VARCHAR(25) DEFAULT '' NOT NULL",
			"vu"                 => "VARCHAR(6) DEFAULT 'non' NOT NULL"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_activite,id_objet,objet",
			"KEY id_activite"    => "id_activite"
		)
	);
	$tables['spip_badje_type_activites_liens'] = array(
		'field' => array(
			"id_type_activite"   => "bigint(21) DEFAULT '0' NOT NULL",
			"id_objet"           => "bigint(21) DEFAULT '0' NOT NULL",
			"objet"              => "VARCHAR(25) DEFAULT '' NOT NULL",
			"vu"                 => "VARCHAR(6) DEFAULT 'non' NOT NULL"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_type_activite,id_objet,objet",
			"KEY id_type_activite" => "id_type_activite"
		)
	);

	return $tables;
}


?>