<?php
/**
 * messages and texts used by all scripts in French
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:labels
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     
 
// Global Messages   
$msg_confirm_delete_object=utf8_encode('Voulez-vous vraiment effacer cet objet ?');
$msg_object_deleted=utf8_encode("L'objet a été effacé");
$msg_object_detached=utf8_encode("L'objet a été détaché");
$msg_object_created=utf8_encode("L'objet a été créé");
$msg_all_objects_created=utf8_encode('Tous les objets ont été créés');
$msg_object_updated=utf8_encode("L'objet a été mis à jour");
$msg_select_profile=utf8_encode('Sélectionnez un profil pour accéder aux fonctions de gestion.');
$msg_unknown_user=utf8_encode('Utilisateur inconnu');
$msg_wrong_password=utf8_encode('Mot de passe erroné');
$msg_object_exists=utf8_encode('Cet objet existe déjà !');
$msg_status_changed=utf8_encode('Le statut a été modifié.');
$msg_object_added=utf8_encode("L'objet a été ajouté");
$msg_confirm_detach_object=utf8_encode('Voulez-vous vraiment détacher cet objet ?');
$msg_managing_profile=utf8_encode('Vous êtes en train de mettre à jour les caractéristiques du profil');
$msg_choose_value=utf8_encode('Choisissez une valeur');
$msg_file_missing=utf8_encode("Le fichier n'existe plus sur le serveur");
$msg_file_too_big=utf8_encode('Le fichier est trop volumineux');
$msg_credentials_ko=utf8_encode('Identifiant ou mot de passe incorrect');
$msg_language_available=utf8_encode('Langage disponible');
$msg_language_data_missing=utf8_encode('Certaines données du langage manquent');
$msg_too_much_results=utf8_encode('Trop de résultats. Veuillez affiner votre recherche');
$msg_not_enough_char=utf8_encode('Pas assez de caractères (au moins 3)');
$msg_user_already_exists=utf8_encode('Cet utilisateur existe déjà');
$msg_no_result=utf8_encode('Aucun résultat trouvé');
$msg_managing_parameters_switch=utf8_encode('Inverser la valeur du paramètre en cliquant sur le bouton de switch de chaque paramètre.');
$msg_managing_parameters=utf8_encode("Mettez à jour les paramètres de type entier ou chaines de caractères en cliquant sur l'icone de mise à jour en bout de chaque ligne.");
$msg_user_format_ko=utf8_encode("Nom d'utilisateur invalide (alphanumériques minuscules seulement)");

// Global Texts
$text_profile=utf8_encode('Profil');
$text_duration=utf8_encode('Durée (en mois)');
$text_template_status=utf8_encode('Etat du modèle');
$text_template_status_ok=utf8_encode('OK');
$text_template_status_ko=utf8_encode('A définir');
$text_year=utf8_encode('année');
$text_month=utf8_encode('mois');
$text_number=utf8_encode('n°');
$text_login=utf8_encode('Identifiant');
$text_password=utf8_encode('Mot de passe');
$text_logout=utf8_encode('Quitter');
$text_user=utf8_encode('Utilisateur');
$text_firstname=utf8_encode('Prénom');
$text_name=utf8_encode('Nom');
$text_email=utf8_encode('Courriel');
$text_status=utf8_encode('Statut');
$text_short_name=utf8_encode('Nom court');
$text_address=utf8_encode('Adresse');
$text_address_comment=utf8_encode("Complément d'adresse");
$text_address_city=utf8_encode('Ville');
$text_address_country=utf8_encode('Pays');
$text_address_zip_code=utf8_encode('Code postal');
$text_address_state=utf8_encode('Etat');
$text_filter_inactive=utf8_encode('Inactif');
$text_description=utf8_encode('Description');
$text_amount=utf8_encode('Montant');
$text_reference=utf8_encode('Référence');
$text_resource=utf8_encode('Ressource');
$text_of=utf8_encode('de');
$text_of_the=utf8_encode('du');
$text_date_from=utf8_encode('du');
$text_date_to=utf8_encode('au');
$text_none=utf8_encode('Aucun');
$text_total=utf8_encode('Total');
$text_no_data=utf8_encode('Pas de saisie');
$text_total_cost=utf8_encode('Coût total');
$text_hours=utf8_encode('Heures');
$text_creator=utf8_encode('Créateur');
$text_creation_date=utf8_encode('Date création');
$text_parameter=utf8_encode('Paramètre');
$text_tag=utf8_encode('Tag');
$text_value=utf8_encode('Valeur');
$text_max_value=utf8_encode('Valeur maximum');
$text_informations=utf8_encode('Informations Générales');
$text_misc=utf8_encode('Divers');
$text_comments=utf8_encode('Commentaires');
$text_comment=utf8_encode('Commentaire');
$text_object_id=utf8_encode('N°');
$text_actions=utf8_encode('Actions');
$text_start_date=utf8_encode('Date de début');
$text_days=utf8_encode('jours');
$text_features=utf8_encode('Caractéristiques');
$text_created_by=utf8_encode('Créé par');
$text_resource=utf8_encode('Ressource');
$text_no_item=utf8_encode('Aucun élément');
$text_for=utf8_encode('pour');
$text_the_m=utf8_encode('le');
$text_the_f=utf8_encode('la');
$text_one_m=utf8_encode('un');
$text_one_f=utf8_encode('une');
$text_change_status=utf8_encode('Chg statut');
$text_workflow=utf8_encode('Workflow');
$text_management=utf8_encode('Gestion');
$text_group=utf8_encode('Groupe');
$text_ratio=utf8_encode('Coefficient');
$text_std_profile=utf8_encode('Profil standard');
$text_value_is_too_high_for=utf8_encode('La valeur saisie est trop grande pour');
$text_limit_is=utf8_encode('La limite est');
$text_yes=utf8_encode('Oui');
$text_no=utf8_encode('Non');
$text_to=utf8_encode('au');
$text_cost=utf8_encode('Coût');
$text_week=utf8_encode('semaine');
$text_tip=utf8_encode('Indication');
$text_alert_if_zero=utf8_encode('Alerte sur valeur nulle');
$text_date=utf8_encode('Date');
$text_menu=utf8_encode('Rubriques de menu');
$text_transitions=utf8_encode('Transitions');
$text_and=utf8_encode('et');
$text_todo2finish=utf8_encode('Reste à faire');
$text_order=utf8_encode('Ordre');
$text_none=utf8_encode('Aucun');
$text_owner=utf8_encode('Propriétaire');
$text_role=utf8_encode('Rôle');
$text_stakeholder=utf8_encode('Contributeur');
$text_global=utf8_encode('Global');
$text_local=utf8_encode('Local');
$text_type=utf8_encode('Type');
$text_progress=utf8_encode('Avancement');
$text_on=utf8_encode('le');
$text_update_date=utf8_encode('Date de mise à jour');
$text_file=utf8_encode('Fichier');
$text_document=utf8_encode('Document');
$text_maxsize=utf8_encode('Taille maximum');
$text_objects_using_this_profile=utf8_encode('Objets utilisant ce profil');
$text_connection_mode=utf8_encode('Source');
$text_language=utf8_encode('Langue');
$text_situation=utf8_encode('Situation');
$text_not_enough_char=utf8_encode('Not enough char (at least 3)');
$text_ldap_search=utf8_encode('Recherche LDAP');
$text_search_by_name=utf8_encode('Par nom');
$text_search_by_username=utf8_encode('Par identifiant');
$text_readonly_role=utf8_encode('Lecteur');
$text_nobody=utf8_encode('Personne');
$text_theme=utf8_encode('Thème');
$text_project_block_raf=utf8_encode('Empêche de saisir un RAF dans les tâches de la dernière colonne');
$text_tag_used=utf8_encode('Tag disponible pour le projet');
$text_tag_not_used=utf8_encode('Tag non disponible pour le projet');
$text_password_check=utf8_encode('Contrôle du mot de passe');
$text_change_password=utf8_encode('Pour changer de mot de passe, remplissez les deux champs. Le mot de passe est limité à 15 caractères.');
        
// Global Buttons
$button_cancel=utf8_encode('Annuler');
$button_submit=utf8_encode('Valider');
$button_search=utf8_encode('Chercher');
$button_new_profile=utf8_encode('Créer un profil');
$button_update_values=utf8_encode('Mettre à jour les valeurs');
$button_new_user=utf8_encode('Créer un utilisateur');
$button_filter=utf8_encode('Filtrer');
$button_back_to_list=utf8_encode('Retour à la liste');
$button_lock=utf8_encode('Verrouiller');
$button_save=utf8_encode('Enregistrer');
$button_unlock=utf8_encode('Déverrouiller');
$button_update_value=utf8_encode('Enregistrer la valeur');
$button_new_user_ldap=utf8_encode("Ajouter un utilisateur à partir de l'annuaire LDAP");

// Global Actions
$action_modify=utf8_encode('Modifier');
$action_delete=utf8_encode('Supprimer');
$action_manage=utf8_encode('Gérer');
$action_fill_in=utf8_encode('Saisir');
$action_start=utf8_encode('Démarrer');
$action_view=utf8_encode('Voir');
$action_view_progress=utf8_encode("Voir l'avancement");
$action_change_status=utf8_encode('Passer au statut');
$action_detach=utf8_encode('Détacher');
$action_fill=utf8_encode('Saisir');
$action_set_as_default=utf8_encode('Définir comme valeur par défaut');
$action_view_dashboard=utf8_encode('Voir le tableau de bord');
$action_disable=utf8_encode('Désactiver');
$action_activate=utf8_encode('Activer');
$action_move_up=utf8_encode('Monter');
$action_move_down=utf8_encode('Descendre');

// Legends
$legend_logon=utf8_encode('Connexion');
$legend_changing_f=utf8_encode("Modification d'une");
$legend_creation_f=utf8_encode("Création d'une");
$legend_display_f=utf8_encode("Visualisation d'une");
$legend_adding_f=utf8_encode("Ajout d'une");
$legend_changing_m=utf8_encode("Modification d'un");
$legend_creation_m=utf8_encode("Création d'un");
$legend_display_m=utf8_encode("Visualisation d'un");
$legend_adding_m=utf8_encode("Ajout d'un");

// Days
$list_days_week[]=utf8_encode('Lundi');
$list_days_week[]=utf8_encode('Mardi');
$list_days_week[]=utf8_encode('Mercredi');
$list_days_week[]=utf8_encode('Jeudi');
$list_days_week[]=utf8_encode('Vendredi');
$list_days_week[]=utf8_encode('Samedi');
$list_days_week[]=utf8_encode('Dimanche');

// Months
$list_months[]=utf8_encode('janvier');
$list_months[]=utf8_encode('février');
$list_months[]=utf8_encode('mars');
$list_months[]=utf8_encode('avril');
$list_months[]=utf8_encode('mai');
$list_months[]=utf8_encode('juin');
$list_months[]=utf8_encode('juillet');
$list_months[]=utf8_encode('août');
$list_months[]=utf8_encode('septembre');
$list_months[]=utf8_encode('octobre');
$list_months[]=utf8_encode('novembre');
$list_months[]=utf8_encode('décembre');

// Arrays
$array_yes_no[1]=$text_yes;
$array_yes_no[0]=$text_no;

?>