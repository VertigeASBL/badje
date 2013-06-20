<?php

/**
 *  Fichier généré par la Fabrique de plugin v5
 *   le 2013-06-20 11:59:13
 *
 *  Ce fichier de sauvegarde peut servir à recréer
 *  votre plugin avec le plugin «Fabrique» qui a servi à le créer.
 *
 *  Bien évidemment, les modifications apportées ultérieurement
 *  par vos soins dans le code de ce plugin généré
 *  NE SERONT PAS connues du plugin «Fabrique» et ne pourront pas
 *  être recréées par lui !
 *
 *  La «Fabrique» ne pourra que régénerer le code de base du plugin
 *  avec les informations dont il dispose.
 *
**/

if (!defined("_ECRIRE_INC_VERSION")) return;

$data = array (
  'fabrique' => 
  array (
    'version' => 5,
  ),
  'paquet' => 
  array (
    'nom' => 'Badje',
    'slogan' => '',
    'description' => 'Plugin de gestion de base de donnée pour l\'ASBL badje',
    'prefixe' => 'badje',
    'version' => '1.0.0',
    'auteur' => 'Vertige ASBL',
    'auteur_lien' => 'http://www.vertige.org',
    'licence' => 'GNU/GPL',
    'categorie' => 'divers',
    'etat' => 'dev',
    'compatibilite' => '[3.0.10;3.0.*]',
    'documentation' => '',
    'administrations' => 'on',
    'schema' => '1.0.0',
    'formulaire_config' => '',
    'formulaire_config_titre' => '',
    'fichiers' => 
    array (
      0 => 'fonctions',
      1 => 'options',
      2 => 'pipelines',
    ),
    'inserer' => 
    array (
      'paquet' => '',
      'administrations' => 
      array (
        'maj' => '',
        'desinstallation' => '',
        'fin' => '',
      ),
      'base' => 
      array (
        'tables' => 
        array (
          'fin' => '',
        ),
      ),
    ),
    'scripts' => 
    array (
      'pre_copie' => '',
      'post_creation' => '',
    ),
    'exemples' => 'on',
  ),
  'objets' => 
  array (
  ),
  'images' => 
  array (
    'paquet' => 
    array (
      'logo' => 
      array (
        0 => 
        array (
          'extension' => 'jpg',
          'contenu' => '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',
        ),
      ),
    ),
    'objets' => 
    array (
    ),
  ),
);

?>