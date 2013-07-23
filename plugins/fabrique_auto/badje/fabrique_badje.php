<?php

/**
 *  Fichier généré par la Fabrique de plugin v5
 *   le 2013-07-22 17:44:53
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
    0 => 
    array (
      'nom' => 'Communes',
      'nom_singulier' => 'Commune',
      'genre' => 'feminin',
      'logo_variantes' => 'on',
      'table' => 'spip_badje_communes',
      'cle_primaire' => 'id_commune',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'commune',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Nom de la commune',
          'champ' => 'nom_commune',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
            2 => 'obligatoire',
          ),
          'recherche' => '8',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'nom_commune',
      'champ_date' => '',
      'statut' => '',
      'chaines' => 
      array (
        'titre_objets' => 'Communes',
        'titre_objet' => 'Commune',
        'info_aucun_objet' => 'Aucune commune',
        'info_1_objet' => 'Une commune',
        'info_nb_objets' => '@nb@ communes',
        'icone_creer_objet' => 'Créer une commune',
        'icone_modifier_objet' => 'Modifier cette commune',
        'titre_logo_objet' => 'Logo de cette commune',
        'titre_langue_objet' => 'Langue de cette commune',
        'titre_objets_rubrique' => 'Communes de la rubrique',
        'info_objets_auteur' => 'Les communes de cet auteur',
        'retirer_lien_objet' => 'Retirer cette commune',
        'retirer_tous_liens_objets' => 'Retirer toutes les communes',
        'ajouter_lien_objet' => 'Ajouter cette commune',
        'texte_ajouter_objet' => 'Ajouter une commune',
        'texte_creer_associer_objet' => 'Créer et associer une commune',
        'texte_changer_statut_objet' => 'Cette commune est :',
      ),
      'table_liens' => 'on',
      'vue_liens' => 
      array (
        0 => 'spip_badje_organismes',
      ),
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'echafaudages' => 
      array (
        0 => 'prive/squelettes/contenu/objets.html',
        1 => 'prive/objets/infos/objet.html',
        2 => 'prive/squelettes/contenu/objet.html',
      ),
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => '',
        'objet_supprimer' => '',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
      ),
    ),
    1 => 
    array (
      'nom' => 'Organismes',
      'nom_singulier' => 'Organisme',
      'genre' => 'masculin',
      'logo_variantes' => 'on',
      'table' => 'spip_badje_organismes',
      'cle_primaire' => 'id_organisme',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'organisme',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Nom de l\'organisme',
          'champ' => 'nom_organisme',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
            2 => 'obligatoire',
          ),
          'recherche' => '8',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Adresse',
          'champ' => 'adresse',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '4',
          'saisie' => 'textarea',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'Code postal',
          'champ' => 'code_postal',
          'sql' => 'int(11) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '4',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        3 => 
        array (
          'nom' => 'Localité',
          'champ' => 'localite',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '6',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        4 => 
        array (
          'nom' => 'Téléphone',
          'champ' => 'telephone',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '2',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        5 => 
        array (
          'nom' => 'GSM',
          'champ' => 'gsm',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '2',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        6 => 
        array (
          'nom' => 'Fax',
          'champ' => 'fax',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '1',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        7 => 
        array (
          'nom' => 'Email',
          'champ' => 'email',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        8 => 
        array (
          'nom' => 'Site internet',
          'champ' => 'site_internet',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '4',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        9 => 
        array (
          'nom' => 'membre badje',
          'champ' => 'membre_badje',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'oui_non',
          'explication' => '',
          'saisie_options' => '',
        ),
        10 => 
        array (
          'nom' => 'Association reconnue par l\'ONE',
          'champ' => 'one',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'oui_non',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'nom_organisme',
      'champ_date' => '',
      'statut' => '',
      'chaines' => 
      array (
        'titre_objets' => 'Organismes',
        'titre_objet' => 'Organisme',
        'info_aucun_objet' => 'Aucun organisme',
        'info_1_objet' => 'Un organisme',
        'info_nb_objets' => '@nb@ organismes',
        'icone_creer_objet' => 'Créer un organisme',
        'icone_modifier_objet' => 'Modifier ce organisme',
        'titre_logo_objet' => 'Logo de ce organisme',
        'titre_langue_objet' => 'Langue de ce organisme',
        'titre_objets_rubrique' => 'Organismes de la rubrique',
        'info_objets_auteur' => 'Les organismes de cet auteur',
        'retirer_lien_objet' => 'Retirer ce organisme',
        'retirer_tous_liens_objets' => 'Retirer tous les organismes',
        'ajouter_lien_objet' => 'Ajouter ce organisme',
        'texte_ajouter_objet' => 'Ajouter un organisme',
        'texte_creer_associer_objet' => 'Créer et associer un organisme',
        'texte_changer_statut_objet' => 'Ce organisme est :',
      ),
      'table_liens' => 'on',
      'vue_liens' => 
      array (
        0 => 'spip_badje_activites',
      ),
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'echafaudages' => 
      array (
        0 => 'prive/squelettes/contenu/objets.html',
        1 => 'prive/objets/infos/objet.html',
        2 => 'prive/squelettes/contenu/objet.html',
      ),
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => '',
        'objet_supprimer' => '',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
      ),
    ),
    2 => 
    array (
      'nom' => 'Activités',
      'nom_singulier' => 'Activité',
      'genre' => 'feminin',
      'logo_variantes' => 'on',
      'table' => 'spip_badje_activites',
      'cle_primaire' => 'id_activite',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'activite',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Nom',
          'champ' => 'nom',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
            2 => 'obligatoire',
          ),
          'recherche' => '8',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Descriptif de l\'activité',
          'champ' => 'descriptif',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '6',
          'saisie' => 'textarea',
          'explication' => '',
          'saisie_options' => 'li_class=haut, class=inserer_barre_edition, rows=4',
        ),
        2 => 
        array (
          'nom' => 'Prix',
          'champ' => 'prix',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        3 => 
        array (
          'nom' => 'Accessibilite handicap',
          'champ' => 'accessibilite_handicap',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '2',
          'saisie' => 'oui_non',
          'explication' => 'Accessible aux personnes handicapées',
          'saisie_options' => '',
        ),
        4 => 
        array (
          'nom' => 'Logement',
          'champ' => 'logement',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'checkbox',
          'explication' => '',
          'saisie_options' => 'datas=[(#ARRAY{internat,internat,externat,externat})]',
        ),
        5 => 
        array (
          'nom' => 'Garderie',
          'champ' => 'garderie',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'oui_non',
          'explication' => '',
          'saisie_options' => '',
        ),
        6 => 
        array (
          'nom' => 'Repas chaud',
          'champ' => 'repas_chaud',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '2',
          'saisie' => 'oui_non',
          'explication' => '',
          'saisie_options' => '',
        ),
        7 => 
        array (
          'nom' => 'nom_organisation',
          'champ' => 'nom_organisation',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '6',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        8 => 
        array (
          'nom' => 'Période',
          'champ' => 'periode',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '1',
          'saisie' => 'checkbox',
          'explication' => '',
          'saisie_options' => 'datas=[(#ARRAY{Toussaint,Toussaint, Noël,Noël, Carnaval,Carnaval, Pâques,Pâques, Juillet,Juillet, Août,Août})]',
        ),
        9 => 
        array (
          'nom' => 'Age minimum',
          'champ' => 'age_min',
          'sql' => 'int(11) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '6',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        10 => 
        array (
          'nom' => 'Age maximum',
          'champ' => 'age_max',
          'sql' => 'int(11) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'nom_organisation',
      'champ_date' => '',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Activités',
        'titre_objet' => 'Activité',
        'info_aucun_objet' => 'Aucune activité',
        'info_1_objet' => 'Une activité',
        'info_nb_objets' => '@nb@ activités',
        'icone_creer_objet' => 'Créer une activité',
        'icone_modifier_objet' => 'Modifier cette activité',
        'titre_logo_objet' => 'Logo de cette activité',
        'titre_langue_objet' => 'Langue de cette activité',
        'titre_objets_rubrique' => 'Activités de la rubrique',
        'info_objets_auteur' => 'Les activités de cet auteur',
        'retirer_lien_objet' => 'Retirer cette activité',
        'retirer_tous_liens_objets' => 'Retirer toutes les activités',
        'ajouter_lien_objet' => 'Ajouter cette activité',
        'texte_ajouter_objet' => 'Ajouter une activité',
        'texte_creer_associer_objet' => 'Créer et associer une activité',
        'texte_changer_statut_objet' => 'Cette activité est :',
      ),
      'table_liens' => 'on',
      'vue_liens' => 
      array (
        0 => 'spip_badje_organismes',
      ),
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'echafaudages' => 
      array (
        0 => 'prive/squelettes/contenu/objets.html',
        1 => 'prive/objets/infos/objet.html',
        2 => 'prive/squelettes/contenu/objet.html',
      ),
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => '',
        'objet_supprimer' => '',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
      ),
    ),
    3 => 
    array (
      'nom' => 'types d\'activités',
      'nom_singulier' => 'type d\'activité',
      'genre' => 'masculin',
      'logo_variantes' => 'on',
      'table' => 'spip_badje_type_activites',
      'cle_primaire' => 'id_type_activite',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'type_activite',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Type d\'activité',
          'champ' => 'type_activite',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '1',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'type_activite',
      'champ_date' => '',
      'statut' => '',
      'chaines' => 
      array (
        'titre_objets' => 'Types d\'activités',
        'titre_objet' => 'Type d\'activité',
        'info_aucun_objet' => 'Aucun type d\'activité',
        'info_1_objet' => 'Un type d\'activité',
        'info_nb_objets' => '@nb@ types d\'activités',
        'icone_creer_objet' => 'Créer un type d\'activité',
        'icone_modifier_objet' => 'Modifier ce type d\'activité',
        'titre_logo_objet' => 'Logo de ce type d\'activité',
        'titre_langue_objet' => 'Langue de ce type d\'activité',
        'titre_objets_rubrique' => 'Types d\'activités de la rubrique',
        'info_objets_auteur' => 'Les types d\'activités de cet auteur',
        'retirer_lien_objet' => 'Retirer ce type d\'activité',
        'retirer_tous_liens_objets' => 'Retirer tous les types d\'activités',
        'ajouter_lien_objet' => 'Ajouter ce type d\'activité',
        'texte_ajouter_objet' => 'Ajouter un type d\'activité',
        'texte_creer_associer_objet' => 'Créer et associer un type d\'activité',
        'texte_changer_statut_objet' => 'Ce type d\'activité est :',
      ),
      'table_liens' => 'on',
      'vue_liens' => 
      array (
        0 => 'spip_badje_activites',
      ),
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'echafaudages' => 
      array (
        0 => 'prive/squelettes/contenu/objets.html',
        1 => 'prive/objets/infos/objet.html',
        2 => 'prive/squelettes/contenu/objet.html',
      ),
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => '',
        'objet_supprimer' => '',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
      ),
    ),
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
      0 => 
      array (
        'logo' => 
        array (
          0 => 
          array (
            'extension' => 'png',
            'contenu' => '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',
          ),
        ),
      ),
      1 => 
      array (
        'logo' => 
        array (
          0 => 
          array (
            'extension' => 'png',
            'contenu' => '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',
          ),
        ),
      ),
      2 => 
      array (
        'logo' => 
        array (
          0 => 
          array (
            'extension' => 'png',
            'contenu' => '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',
          ),
        ),
      ),
      3 => 
      array (
        'logo' => 
        array (
          0 => 
          array (
            'extension' => 'png',
            'contenu' => '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',
          ),
        ),
      ),
    ),
  ),
);

?>