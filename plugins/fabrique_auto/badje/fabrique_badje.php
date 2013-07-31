<?php

/**
 *  Fichier généré par la Fabrique de plugin v5
 *   le 2013-07-24 12:07:39
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
      0 => 'autorisations',
      1 => 'fonctions',
      2 => 'options',
      3 => 'pipelines',
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
          'nom' => 'Adresse de l\'activité',
          'champ' => 'adresse',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '8',
          'saisie' => 'textarea',
          'explication' => '',
          'saisie_options' => '',
        ),
        3 => 
        array (
          'nom' => 'Commune',
          'champ' => 'commune',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '8',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        4 => 
        array (
          'nom' => 'Code Postal',
          'champ' => 'code_postal',
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
        5 => 
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
        6 => 
        array (
          'nom' => 'Accueil des enfants en situation de handicap',
          'champ' => 'accueil_handicap',
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
        7 => 
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
        8 => 
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
          'saisie_options' => 'datas=[(#ARRAY{Externat,Externat,Séjour,Séjour})]',
        ),
        9 => 
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
        10 => 
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
        11 => 
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
          'saisie_options' => 'datas=[(#ARRAY{
Automne,automne, 
Hiver,Hiver, 
Détente,Détente, 
Printemps,Printemps, 
Juillet,Juillet, 
Août,Août})]',
        ),
        12 => 
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
        13 => 
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
      'champ_titre' => 'nom',
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
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => 'on',
      'vue_auteurs_liens' => 'on',
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
      'auteurs_liens' => 'on',
      'vue_auteurs_liens' => 'on',
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
        1 => 
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
      'nom' => 'Groupes d\'activités',
      'nom_singulier' => 'Groupe d\'activité',
      'genre' => 'masculin',
      'logo_variantes' => 'on',
      'table' => 'spip_badje_groupe_activitie',
      'cle_primaire' => 'id_groupe_activite',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'groupe_activite',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Nom du groupe',
          'champ' => 'nom_groupe',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
            2 => 'obligatoire',
          ),
          'recherche' => '6',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'nom_groupe',
      'champ_date' => '',
      'statut' => '',
      'chaines' => 
      array (
        'titre_objets' => 'Groupes d\'activités',
        'titre_objet' => 'Groupe d\'activité',
        'info_aucun_objet' => 'Aucun groupe d\'activité',
        'info_1_objet' => 'Un groupe d\'activité',
        'info_nb_objets' => '@nb@ groupes d\'activités',
        'icone_creer_objet' => 'Créer un groupe d\'activité',
        'icone_modifier_objet' => 'Modifier ce groupe d\'activité',
        'titre_logo_objet' => 'Logo de ce groupe d\'activité',
        'titre_langue_objet' => 'Langue de ce groupe d\'activité',
        'titre_objets_rubrique' => 'Groupes d\'activités de la rubrique',
        'info_objets_auteur' => 'Les groupes d\'activités de cet auteur',
        'retirer_lien_objet' => 'Retirer ce groupe d\'activité',
        'retirer_tous_liens_objets' => 'Retirer tous les groupes d\'activités',
        'ajouter_lien_objet' => 'Ajouter ce groupe d\'activité',
        'texte_ajouter_objet' => 'Ajouter un groupe d\'activité',
        'texte_creer_associer_objet' => 'Créer et associer un groupe d\'activité',
        'texte_changer_statut_objet' => 'Ce groupe d\'activité est :',
      ),
      'table_liens' => 'on',
      'vue_liens' => 
      array (
        0 => 'spip_badje_type_activites',
      ),
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
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
            'contenu' => 'iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAYAAABccqhmAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAACNhJREFUeNrs3e9x20YQhnHA4+9MB0IHdCqQOhDTATtI0kFKcAlxB0wHVAdWBZY6kCpgcDbtyBnL4h9Rwu7+nhmMv9ge4u747HtYAug3m00HoCZvDAFAAAAIAAABACAAAAQAgAAAEAAAAgBAAAAIAAABACAAAAQAgAAAEAAAAgBAAAAIAAABACAAAAQAgAAAEACAk/E2+gn0feiPP4zHMtF6+ivaB67+Xpw++puBggvg/Xj8nmg9/ToeHwnAFgC7ceF8IAHUTAAt/n9Ktp6ux+OdBCABoGa1nI/HL6aWAPA0C+cFApAAnBcIoOCXfyYBgADE/2w0sb0zxQSAujFZCiAAPMLQfblaTgAgANU/JdqBBIDi1VEKIAD8gEsCAAGo/rY6IAD7/7TMSIAAUDsW2wYQALYM43Em8YAAVP8qzLfiAwHY/ztvEEBdLouet+sABCD+Sz4gAAKoiHYgAdj/EyAIoCbt3vgzAgABqP5VaQIcDAMBqH7GAQRQhnZP/LlhkIQIwKKvzqUhIACx13iAACQA4wECyI32nwRAABY7HqAdSAAEYFxAALlp7b+5YSAAArDI8T3nnXcGEEByLgyB8SEACQDGhwCK0dp/M8MgARCA6oYfc9Z5hTgBEIAUAALIhPYfURKARY0d0A4kAAIwXiAA+1rjBQJIsJi1/yQAArCYsSNNmNqBBCDOEicIIC5Dp/1HAASg+mNvmji1AwlAFTN+IAAJwPiBAIJVL+0/CYAAVC8ciHYgAahexVkaAgKIxtB59r8kRQCqP45m3nlnAAGoWsYTBBAFb7yVqAjAYoUEQAAWK45lZlwJQAIwriCASePV35IVAVikOAHagQQgphpfEMA0afeunxsGCYsALE6cBr+vIADx1DiDACQA4wwCmAjafxIAAahKeAGaaAfDQACqkvEGAbw62n8SFwGoRuG4Djzml513BhCAanQUf4/HrXEHAdRMAOvtYdxBAAfS2n8Rn/3fKv/H4AKQAAhAFTqi+jdWgcf+rPPOAAIggKMEcNfFvhgoBRDAq9GuQs+DC6BzHQAEUGvxtf3/TRIBnHfagQQgfu7F6idpwDyAAIrs/7sH1wGuzAMIYL+qM0sigOgpQAIgAFVnR663FT+TALQDCUDVOXD//1AA94QMAniaocvR/suUAgiAAFT/wgJoQtYOJADV5ic8daV/bV5AAPX2/19pNwe5PRgE8MQiy9T+cx0ABFBgkd1vK3xmATQxawcSAAEc8cV2HQAE8AhDF/fZ/7ve938T/DoAARCAxXVkZY/8kBCvECeAk3ER9HP///bf7NuAC0uVAE5B1DfTrk/89yU1AhD/E+z/v+IxYSCARIvqkIoe+TrAjAQIQAL4wmO3/9oGgAB2ZOjitv/WL/zvJDYCUP0TCKDxT+Dz1g4kAAI4ci8vBRBAeSK/+vvYB326DkAA5YlcRY79ArebhyI/JuzS8iUA8V8KAAGUSwC73v77EhIxfwQQknZvebX2nwQAArD//8ZNF/v24CbwwVImgGrVYz3R/8s8EkAIIrf/bp9p/+86AAGI/8Wrf4YEoB1IAOL/EUS/Pdg2gAAIoHgKsA0ggJ1p7b+oz/5vlfqGACQAAlD9n5PoFwK9QpwACOBIroLPq20AATxJa//NCcA2gABU/2i0Cn13wv8/+jbgvPMKcQJIHBNPXaGj3x5sG7AH/WaziX0C/UH/rFXQmelPy4fxWO7yF4MvfwngAN758kt4qCuApWlPj3YgAagOUgBcA/ieYTw+mfYSXO+SAlwDUBWQk/Y7D+1AAvgOPxIx35AAYL5RTQBtMWj/SQAoKgCLoR5N+NqBBCAOSgGoLIChi333HwiAACwCHIB2IAGI/1IAKgvAI6MJAEUFYPIhARYWgMnHzDqQAGAbgGICGLq4r/6GJEgArI9nYt55hXg5AbA+rIfCAtD+g0RYVAAmGxIAAQDf0A4sJAATDYWhqADaPeDafyCAogJQ/fEYrTAMhiG3AFge1kdRAbR7v89NLSTEmgIwuXgKvw9JLADxDtaJBABYJ9UEoP0HCaCwAEwqdkU7kAAgBRBAFlr7z7P/QQBFBaD6Y1/O+772OwMyCeDCeoZ1IwEA1k0xAbT2n1d/QwIoKgDVH4dy1vd1XyH+lgAmwe143AT97BluvGop4GNFAfSbzSb2CfSff8zxKfg8/DYeq6CffZ1AAlfj16DkViDDFiDDxK199tdNMVXbgRkEED3+X43HXeDPv0ryXVgQgASggu5P2zvfW0cE8Br7/zZpMwJwDhJAzQSw8OVxDs/ErGI7MLoAose2f5Kso3WS81gQQJz4P3Tx7/7L8sVp1wFuCYAAVP+aAshyLvNq7cDIAohu6/su16/PbAMIQAIoWv0znc8FAUx//98srf03LW5cByAAlt6dVcL1lEFqpdqBUQXg7j9SOyVLAphu/B+6+M/+XyddT64DEIDqX1gA7aam6wTnMd8WGgJgZwKQAghgSkR/s+t10v1/NgEsCGB6+3/xf/pkuRAoAZgUAjiQqwTnMNvebk4AYhkB2AYQwGvH/wyv/m77/zsCkDgJQPwngOmTvh0YSQAZ4tiqq0OWh50sCOD143+7RzvDCyjWhQRgG0AAJuEBV10tsgjgkgDEMF+I/cnyuPAsvz+RAOz/Sc82IJgAkrT/sj3+q5r0JAD2VQkLn/dZ1nZgBAEsfRHCctPleExY2hQwaQFs239zAnDukmjNBJDBulX3/9kEcJnxnQFTF0AG66662mRKPxcEIAGI//tfB7hOci4LAnjZ/b8KaAymhC3AS7HZfL5tdhl8fLM+/ruiAG67hI8Ln/QWYJRA2z//aeETwCvTLuQutkWJAF5YAu/HPz4EHd+V7/5noj8ufDmuw5SdnLcRPuQ4+Mu+DxmlJYD/+KOLeRX94zaJpqTfjGcHoCZvDAFAAAAIAAABACAAAAQAgAAAEAAAAgBAAAAIAAABACAAAAQAgAAAEAAAAgBAAAAIAAABACAAAAQAgAAAEAAAAgBAAAAIAAABADiKfwUYAEIXW+8E3DDHAAAAAElFTkSuQmCC',
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