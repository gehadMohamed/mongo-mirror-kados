/*
SQLyog Community v11.41 (64 bit)
MySQL - 5.5.11 : Database - test_kados
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table framework_addresses */

CREATE TABLE framework_addresses (
  address_id INT(11) NOT NULL AUTO_INCREMENT,
  address_street VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  address_street_comments VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  address_zip_code VARCHAR(12) COLLATE utf8_bin DEFAULT NULL,
  address_city VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  address_country VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  address_state VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (address_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_addresses */

/*Table structure for table framework_languages */

CREATE TABLE framework_languages (
  language_tag VARCHAR(2) COLLATE utf8_bin NOT NULL,
  language_name VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (language_tag)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_languages */

INSERT  INTO framework_languages(language_tag,language_name) VALUES ('br','português');
INSERT  INTO framework_languages(language_tag,language_name) VALUES ('de','Deutsch');
INSERT  INTO framework_languages(language_tag,language_name) VALUES ('en','English');
INSERT  INTO framework_languages(language_tag,language_name) VALUES ('es','Español');
INSERT  INTO framework_languages(language_tag,language_name) VALUES ('fr','Français');

/*Table structure for table framework_menus */

CREATE TABLE framework_menus (
  menu_tag VARCHAR(20) COLLATE utf8_bin NOT NULL,
  menu_file VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
  menu_father VARCHAR(20) COLLATE utf8_bin DEFAULT NULL,
  menu_order INT(11) DEFAULT NULL,
  menu_default INT(11) DEFAULT NULL,
  PRIMARY KEY (menu_tag)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_menus */

INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('admin','administration/users.php?','',100,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('admin_param','administration/parameters.php?','admin',3,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('admin_profile','administration/profiles.php?','admin',2,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('admin_user','administration/users.php?','admin',1,1);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('app_admin','app_admin/external_connections.php?','',52,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('app_columns','app_admin/app_columns.php?','app_admin',4,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('app_prj_templates','app_admin/templates_project.php?','app_admin',7,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('app_tags','app_admin/template_tags.php?','app_admin',8,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('app_tpl_checklist','template_checklist.php?','app_admin',5,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('ceremony','project_us_review.php?','',6,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('checklist','manage_release_checklist.php?','cockpit',2,NULL);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('cockpit','project_cockpit.php?','',2,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('color_uses','app_admin/colors_uses.php?','app_admin',3,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('colors','app_admin/colors.php?','app_admin',2,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('connections','app_admin/external_connections.php?','app_admin',1,1);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('issue_history','project_issues_history.php?','issues',3,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('issues','project_issues_impact.php?','',7,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('languages','administration/languages.php?','',102,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('my_profile','my_profile.php?','',101,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('poker_plan','project_poker_planning.php?','ceremony',2,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('prj_colors','project_postit_colors.php?','settings',1,1);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('prj_columns','project_columns.php?','settings',3,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('prj_feature','project_features.php?','',3,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('prj_issues_impact','project_issues_impact.php?','issues',1,1);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('prj_issues_progress','project_issues_progress.php?','issues',2,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('prj_kanban','manage_kanban.php?','cockpit',1,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('prj_parameters','project_parameters.php?','settings',4,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('prj_report','project_reports.php?','cockpit',4,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('prj_settings','project_settings.php?','settings',2,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('prj_tags','project_tags.php?','settings',6,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('projects','projects.php?','',1,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('settings','project_postit_colors.php?','',8,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('team','project_team.php?','',3,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('team_tasks','project_team_tasks.php?','team',1,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('trash_action','trash_actions.php?','issues',6,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('trash_issue','trash_issues.php?','issues',4,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('trash_tsk','trash_tasks.php?','cockpit',7,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('trash_us','trash_us.php?','cockpit',6,0);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('us_review','project_us_review.php?','ceremony',1,1);
INSERT  INTO framework_menus(menu_tag,menu_file,menu_father,menu_order,menu_default) VALUES ('us_roadmap','project_us_roadmap.php?','cockpit',3,0);

/*Table structure for table framework_menus_translations */

CREATE TABLE framework_menus_translations (
  menu_tag_fk VARCHAR(20) COLLATE utf8_bin NOT NULL,
  menu_translation_language VARCHAR(2) COLLATE utf8_bin NOT NULL,
  menu_translation_value VARCHAR(30) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (menu_tag_fk,menu_translation_language)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_menus_translations */

INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin','br','Administração');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin','de','Verwaltung');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin','en','Administration');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin','es','Administración');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin','fr','Administration');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_param','br','Configurações');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_param','de','Einstellungen');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_param','en','Settings');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_param','es','Configuración');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_param','fr','Paramètres');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_profile','br','Perfis');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_profile','de','Profile');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_profile','en','Profiles');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_profile','es','Perfiles');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_profile','fr','Profils');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_user','br','Usuários');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_user','de','Benutzer');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_user','en','Users');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_user','es','Usuarios');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('admin_user','fr','Utilisateurs');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_admin','br','Configurações globais');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_admin','de','Globale Einstellungen');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_admin','en','Global settings');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_admin','es','Configuracion general');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_admin','fr','Paramètres globaux');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_columns','br','Templates de colunas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_columns','de','Spaltenvorlage');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_columns','en','Columns template');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_columns','es','Modelo de columnas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_columns','fr','Modèle colonnes');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_prj_templates','br','Templates de projetos');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_prj_templates','de','Projektvorlage');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_prj_templates','en','Projects templates');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_prj_templates','es','Modelo de proyectos');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_prj_templates','fr','Modèles projets');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_tags','br','Tags');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_tags','de','Tags');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_tags','en','Tags');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_tags','es','Tags');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_tags','fr','Tags');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_tpl_checklist','br','Template de checklist');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_tpl_checklist','de','Vorlage für Checklisten');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_tpl_checklist','en','Checklist template');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_tpl_checklist','es','Modelo de la checklist');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('app_tpl_checklist','fr','Modèle checklist');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('ceremony','br','US de priorização');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('ceremony','de','US Priorität');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('ceremony','en','US priority');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('ceremony','es','US de priorización');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('ceremony','fr','Priorité des US');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('checklist','br','Checklist');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('checklist','de','Checklisten');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('checklist','en','Checklist');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('checklist','es','Checklist');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('checklist','fr','Checklist');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('cockpit','br','Cockpit do projeto');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('cockpit','de','Projektübersicht');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('cockpit','en','Project cockpit');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('cockpit','es','Proyecto piloto');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('cockpit','fr','Cockpit projet');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('color_uses','br','Utilização de cor');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('color_uses','de','Farbzuordnung');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('color_uses','en','Colors uses');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('color_uses','es','Asignación de colores');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('color_uses','fr','Affectation des couleurs');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('colors','br','Cores das notas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('colors','de','Farben');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('colors','en','Colors');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('colors','es','Colores');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('colors','fr','Couleurs');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('connections','br','Conexões');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('connections','de','Verbindungen');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('connections','en','Connections');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('connections','es','Conexiones');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('connections','fr','Connexions');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('issue_history','br','Histórico');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('issue_history','de','Historie');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('issue_history','en','History');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('issue_history','es','Historial');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('issue_history','fr','Historique');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('issues','br','Problemas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('issues','de','Vorfälle');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('issues','en','Issues');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('issues','es','Errores');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('issues','fr','RADAR');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('languages','br','Idiomas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('languages','de','Sprachen');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('languages','en','Languages');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('languages','es','Idiomas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('languages','fr','Langues');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('my_profile','br','Meu perfil');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('my_profile','de','Mein Profil');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('my_profile','en','My profile');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('my_profile','es','Mi perfil');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('my_profile','fr','Mon profil');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('poker_plan','br','Complexidade');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('poker_plan','de','Komplexität');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('poker_plan','en','Complexity');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('poker_plan','es','Complejidad');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('poker_plan','fr','Complexité');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_colors','br','Cores');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_colors','de','Farben');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_colors','en','Colors');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_colors','es','Colores');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_colors','fr','Couleurs');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_columns','br','Colunas de tarefas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_columns','de','Farben für Aufgaben');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_columns','en','Tasks columns');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_columns','es','Columnas de tareas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_columns','fr','Colonnes tâches');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_feature','br','Características');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_feature','de','Merkmale');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_feature','en','Features');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_feature','es','Funcionalidades');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_feature','fr','Fonctions');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_issues_impact','br','Avaliação');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_issues_impact','de','Beurteilung');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_issues_impact','en','Assessment');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_issues_impact','es','Evaluacion');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_issues_impact','fr','Evaluation');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_issues_progress','br','Progresso das ações');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_issues_progress','de','Fortschritt');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_issues_progress','en','Actions progress');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_issues_progress','es','Seguimiento de acciones');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_issues_progress','fr','Suivi actions');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_kanban','br','Kanban');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_kanban','de','Kanban');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_kanban','en','Kanban');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_kanban','es','Kanban');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_kanban','fr','Kanban');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_parameters','br','Parâmetros');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_parameters','de','Parameter');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_parameters','en','Parameters');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_parameters','es','Configuracion');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_parameters','fr','Paramètres');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_report','br','Relatórios');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_report','de','Berichte');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_report','en','Reports');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_report','es','Reportes');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_report','fr','Rapports');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_settings','br','Valores de atributos');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_settings','de','Attribute');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_settings','en','Attributes values');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_settings','es','Valor de atributos');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_settings','fr','Valeurs attributs');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_tags','br','Tags');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_tags','de','Tags');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_tags','en','Tags');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_tags','es','Tags');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('prj_tags','fr','Tags');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('projects','br','Portfolio');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('projects','de','Protfolio');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('projects','en','Portfolio');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('projects','es','Portafolio');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('projects','fr','Portefeuille');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('settings','br','Configuração do projeto');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('settings','de','Projekteinstellungen');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('settings','en','Project configuration');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('settings','es','Configuración del proyecto');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('settings','fr','Configuration projet');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('team','br','Time');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('team','de','Team');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('team','en','Team');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('team','es','Equipo');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('team','fr','Equipe');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('team_tasks','br','Tarefas do time');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('team_tasks','de','Teamaufgaben');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('team_tasks','en','Team tasks');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('team_tasks','es','Reparticion de tareas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('team_tasks','fr','Répartition des tâches');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_action','br','Lixeira de ações');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_action','de','gelöschte Aktionen');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_action','en','Actions trash');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_action','es','Papelera de acciones');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_action','fr','Poubelle actions');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_issue','br','Lixeira de problemas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_issue','de','gelöschte Vorfälle');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_issue','en','Issues trash');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_issue','es','Papelera de errores');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_issue','fr','Poubelle');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_tsk','br','Lixeira de tarefas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_tsk','de','gelöschte Aufgaben');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_tsk','en','Tasks trash');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_tsk','es','Papelera de tareas');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_tsk','fr','Poubelle tâches');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_us','br','Lixeira de US');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_us','de','gelöschte User-Stories');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_us','en','US trash');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_us','es','Papelera de US');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('trash_us','fr','Poubelle US');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('us_review','br','Business Value');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('us_review','de','Wirtschaftlicher Nutzen');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('us_review','en','Business Value');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('us_review','es','Business Value');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('us_review','fr','Business Value');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('us_roadmap','br','US roadmap');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('us_roadmap','de','US Roadmap');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('us_roadmap','en','US roadmap');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('us_roadmap','es','US roadmap');
INSERT  INTO framework_menus_translations(menu_tag_fk,menu_translation_language,menu_translation_value) VALUES ('us_roadmap','fr','US roadmap');

/*Table structure for table framework_parameters */

CREATE TABLE framework_parameters (
  parameter_tag_id VARCHAR(6) COLLATE utf8_bin NOT NULL,
  parameter_value VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  parameter_display INT(11) DEFAULT '1',
  parameter_type ENUM('SWITCH','STRING','INT') COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (parameter_tag_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_parameters */

INSERT  INTO framework_parameters(parameter_tag_id,parameter_value,parameter_display,parameter_type) VALUES ('NBLIST','3',1,'INT');
INSERT  INTO framework_parameters(parameter_tag_id,parameter_value,parameter_display,parameter_type) VALUES ('PGNUBR','12',1,'INT');
INSERT  INTO framework_parameters(parameter_tag_id,parameter_value,parameter_display,parameter_type) VALUES ('PRJLOC','1',1,'SWITCH');
INSERT  INTO framework_parameters(parameter_tag_id,parameter_value,parameter_display,parameter_type) VALUES ('PRJTPL','3;2;1:3',0,'STRING');
INSERT  INTO framework_parameters(parameter_tag_id,parameter_value,parameter_display,parameter_type) VALUES ('READAC','1',1,'SWITCH');
INSERT  INTO framework_parameters(parameter_tag_id,parameter_value,parameter_display,parameter_type) VALUES ('RSSACT','1',1,'SWITCH');
INSERT  INTO framework_parameters(parameter_tag_id,parameter_value,parameter_display,parameter_type) VALUES ('SPOVL','0',1,'SWITCH');
INSERT  INTO framework_parameters(parameter_tag_id,parameter_value,parameter_display,parameter_type) VALUES ('USECHL','1',1,'SWITCH');
INSERT  INTO framework_parameters(parameter_tag_id,parameter_value,parameter_display,parameter_type) VALUES ('USEWS','1',1,'SWITCH');
INSERT  INTO framework_parameters(parameter_tag_id,parameter_value,parameter_display,parameter_type) VALUES ('WSSIZE','1050',1,'INT');

/*Table structure for table framework_parameters_translations */

CREATE TABLE framework_parameters_translations (
  parameter_tag_id_fk VARCHAR(20) COLLATE utf8_bin NOT NULL,
  parameter_translation_language VARCHAR(2) COLLATE utf8_bin NOT NULL,
  parameter_translation_value VARCHAR(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (parameter_tag_id_fk,parameter_translation_language)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_parameters_translations */

INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('NBLIST','br','Número máximo de usuários para usar uma listbox');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('NBLIST','de','Maximale Anzahl von Benutzern in einer Auswahlliste');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('NBLIST','en','Max number of users to use a listbox');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('NBLIST','es','Numero maximo de usuarios para utilizar la lista');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('NBLIST','fr','Nombre limite d\'utilisateurs pour utiliser une liste déroulante');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('PGNUBR','br','Número de itens mostrados na página');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('PGNUBR','de','Anzahl von Objekten auf einer Seite');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('PGNUBR','en','Number of items displayed in a page');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('PGNUBR','es','Numero de elementos mostrados en la pagina');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('PGNUBR','fr','Nombre d\'éléments affichés dans un tableau par page');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('PRJLOC','br','Permitir criação de projetos locais');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('PRJLOC','de','Erzeugen lokaler Projekte erlauben');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('PRJLOC','en','Allow local projects creation');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('PRJLOC','es','Permitir la creacion de proyectos locales');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('PRJLOC','fr','Autorise la création de projets locaux');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('READAC','br','Cada novo projeto é público');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('READAC','de','Neue Projekte sind öffentlich');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('READAC','en','Each new project is public');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('READAC','es','Cada nuevo proyecto es definido como publico por defecto');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('READAC','fr','Chaque nouveau projet est défini comme public par défaut');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('RSSACT','br','Permitir RSS nos projetos, releases e sprints');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('RSSACT','de','RSS für Projekte, Releases und Sprints erlauben');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('RSSACT','en','Allow RSS on projects,releases and sprints');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('RSSACT','es','Permitir RSS en proyectos, publicaciones y sprints');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('RSSACT','fr','Autoriser la syndication RSS du contenu des projets, releases et sprints');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('SPOVL','br','Permitir sobreposição de sprints');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('SPOVL','de','Überlappen von Sprints erlauben');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('SPOVL','en','Allow sprints ovelapping');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('SPOVL','es','Permitir la superposición de sprints');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('SPOVL','fr','Autorise la superposition de sprints');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('USECHL','br','Permitir o uso de templates de checklist');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('USECHL','de','Verwendung von Checklist-Vorlagen erlauben');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('USECHL','en','Allow use of checklist template');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('USECHL','es','Permitir el uso del modelo checklist');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('USECHL','fr','Autorise l\'utilisation du modèle de la checklist');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('USEWS','br','Modo workshop disponível');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('USEWS','de','Workshop-Modus ist verfügbar');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('USEWS','en','Workshop mode is available');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('USEWS','es','El modo Workshop es disponible');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('USEWS','fr','Utilisation du mode Workshop');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('WSSIZE','br','Tamanho da célula do workshop');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('WSSIZE','de','Workshop-Zellengröße');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('WSSIZE','en','Workshop cell size');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('WSSIZE','es','Tamaño del tablero Workshop');
INSERT  INTO framework_parameters_translations(parameter_tag_id_fk,parameter_translation_language,parameter_translation_value) VALUES ('WSSIZE','fr','Taille du tableau de Workshop');

/*Table structure for table framework_profiles */

CREATE TABLE framework_profiles (
  profile_id INT(11) NOT NULL AUTO_INCREMENT,
  profile_name VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  profile_type ENUM('GLOBAL','LOCAL') COLLATE utf8_bin DEFAULT 'GLOBAL',
  profile_tag VARCHAR(15) COLLATE utf8_bin DEFAULT NULL,
  profile_default TINYINT(4) DEFAULT '0',
  PRIMARY KEY (profile_id)
) ENGINE=INNODB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_profiles */

INSERT  INTO framework_profiles(profile_id,profile_name,profile_type,profile_tag,profile_default) VALUES (1,'2-Administration','GLOBAL','ADM',0);
INSERT  INTO framework_profiles(profile_id,profile_name,profile_type,profile_tag,profile_default) VALUES (2,'1-Accès standard','GLOBAL','STD',1);
INSERT  INTO framework_profiles(profile_id,profile_name,profile_type,profile_tag,profile_default) VALUES (4,'Scrum Master','LOCAL','GESTION',0);
INSERT  INTO framework_profiles(profile_id,profile_name,profile_type,profile_tag,profile_default) VALUES (5,'Lecteur','LOCAL','READ',0);
INSERT  INTO framework_profiles(profile_id,profile_name,profile_type,profile_tag,profile_default) VALUES (6,'Product Owner','LOCAL','PO',0);
INSERT  INTO framework_profiles(profile_id,profile_name,profile_type,profile_tag,profile_default) VALUES (8,'Team Member','LOCAL','MEMBER',0);

/*Table structure for table framework_profiles_actions */

CREATE TABLE framework_profiles_actions (
  action_tag VARCHAR(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (action_tag)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_profiles_actions */

INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADDACTION');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADDTASK');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADD_ACTIVITY');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADD_EXT_PRJ_OTHERS');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADD_EXT_PRJ_SELF');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADD_ISSUES');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADD_PRJ_OTHERS');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADD_PRJ_SELF');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADD_RELEASE');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADD_SPRINT');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADD_US');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ADD_US_REL');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ALLOC_TASK');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('DELACTION');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('DELPRJ');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('DELTASK');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('DEL_ACTIVITIES');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('DEL_ISSUES');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('DEL_RELEASE');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('DEL_SPRINT');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('DEL_US');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('MNGPARAMPRJ');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('MNGSTAKEHOLDER');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('MNG_TAGS');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('MOVE_ACTION');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('MOVE_TASK');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('MOVE_US');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('MOV_ACTIVITIES');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ORDACTION');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ORDTASK');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ORD_ACTIVITIES');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ORD_ISSUES');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('ORD_US');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('SET_BV');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('SET_COMPLEXITY');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('SET_IMPACT');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('UPDACTION');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('UPDPRJ');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('UPDTASK');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('UPD_ACTIVITIES');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('UPD_ISSUES');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('UPD_RELEASE');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('UPD_SPRINT');
INSERT  INTO framework_profiles_actions(action_tag) VALUES ('UPD_US');

/*Table structure for table framework_profiles_actions_translations */

CREATE TABLE framework_profiles_actions_translations (
  action_tag_fk VARCHAR(20) COLLATE utf8_bin NOT NULL,
  action_translation_language VARCHAR(2) COLLATE utf8_bin NOT NULL,
  action_translation_value VARCHAR(150) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (action_tag_fk,action_translation_language)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_profiles_actions_translations */

INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADDACTION','br','[ACT] Adicionar uma ação');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADDACTION','de','[RIS] Aktion hinzufügen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADDACTION','en','[ACT] Add an action');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADDACTION','es','[ACT] Añadir una accion');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADDACTION','fr','[ACT] Ajouter une action');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADDTASK','br','[TASK] Adicionar tarefas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADDTASK','de','[TODO] Aufgabe erstellen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADDTASK','en','[TASK] Add tasks');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADDTASK','es','[TASK] Añadir tareas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADDTASK','fr','[TACHE] Ajouter des tâches');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_ACTIVITY','br','[ATV] Adicionar uma atividade');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_ACTIVITY','de','[AKT] Aktivität hinzufügen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_ACTIVITY','en','[ATV] Add an activity');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_ACTIVITY','es','[ATV] Añadir una actividad');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_ACTIVITY','fr','[ATV] Ajouter une activité');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_EXT_PRJ_OTHERS','br','[PRJ] Adicionar um projeto externo para outros');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_EXT_PRJ_OTHERS','de','[PRO] Externes Projekt für andere hinzufügen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_EXT_PRJ_OTHERS','en','[PRJ] Add an external project for others');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_EXT_PRJ_OTHERS','es','[PRJ] Añadir un proyecto externo hecho por otros');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_EXT_PRJ_OTHERS','fr','[PRJ] Ajouter un projet externe affecté à un autre');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_EXT_PRJ_SELF','br','[PRJ] Adicionar um projeto externo para você mesmo');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_EXT_PRJ_SELF','de','[PRO] Eigenes externes Projekt hinzufügen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_EXT_PRJ_SELF','en','[PRJ] Add an external project for oneself');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_EXT_PRJ_SELF','es','[PRJ] Añadir un proyecto externo hecho por uno mismo');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_EXT_PRJ_SELF','fr','[PRJ] Ajouter un projet externe affecté à soi-même');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_ISSUES','br','[ISS] Adicionar problemas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_ISSUES','de','[VOR] Vorfall hinzufügen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_ISSUES','en','[ISS] Add issues');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_ISSUES','es','[ISS] Añadir errores');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_ISSUES','fr','[OBS] Enregistrer des obstacles');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_PRJ_OTHERS','br','[PRJ] Adicionar um projeto para outros');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_PRJ_OTHERS','de','[PRO] Projekt für andere hinzufügen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_PRJ_OTHERS','en','[PRJ] Add a project for others');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_PRJ_OTHERS','es','[PRJ] Añadir un proyecto hecho por otros');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_PRJ_OTHERS','fr','[PRJ] Ajouter un projet affecté à un autre');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_PRJ_SELF','br','[PRJ] Adicionar um projeto para você mesmo');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_PRJ_SELF','de','[PRO] Eigenes Projekt hinzufügen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_PRJ_SELF','en','[PRJ] Add a project for oneself');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_PRJ_SELF','es','[PRJ] Añadir un proyecto hecho por uno mismo');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_PRJ_SELF','fr','[PRJ] Ajouter un projet affecté à soi-même');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_RELEASE','br','[REL] Adicionar uma release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_RELEASE','de','[REL] Release hinzufügen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_RELEASE','en','[REL] Add a release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_RELEASE','es','[REL] Añadir una release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_RELEASE','fr','[REL] Ajouter une release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_SPRINT','br','[SPR] Adicionar uma sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_SPRINT','de','[SPR] Sprint hinzufügen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_SPRINT','en','[SPR] Add a sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_SPRINT','es','[SPR] Añadir un sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_SPRINT','fr','[SPR] Ajouter un sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_US','br','[US] Adicionar uma User Story');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_US','de','[US] User-Story anlegen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_US','en','[US] Add an User Story');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_US','es','[US] Añadir un User Story');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_US','fr','[US] Ajouter une User Story');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_US_REL','br','[REL] Adicionar uma US ao Backlog de Release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_US_REL','de','[REL] User-Story dem Release-Backlog hinzufügen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_US_REL','en','[REL] Add US to the Release Backlog');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_US_REL','es','[REL] Añadir US en la Release Backlog');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ADD_US_REL','fr','[REL] Ajouter des US dans le Release Backlog');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ALLOC_TASK','br','[TASK] Alocar tarefas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ALLOC_TASK','de','[TODO] Aufgaben zuweisen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ALLOC_TASK','en','[TSK] Allocate tasks');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ALLOC_TASK','es','[TSK] Asignar tareas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ALLOC_TASK','fr','[TACHE] Affecter des tâches');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELACTION','br','[ACT] Deletar uma ação');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELACTION','de','[RIS] Aktion löschen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELACTION','en','[ACT] Delete an action');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELACTION','es','[ACT] Borrar una accion');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELACTION','fr','[ACT] Détruire une action');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELPRJ','br','[PRJ] Deletar um projeto');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELPRJ','de','[PRO] Projekt löschen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELPRJ','en','[PRJ] Delete a project');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELPRJ','es','[PRJ] Borrar un proyecto');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELPRJ','fr','[PRJ] Détruire un projet');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELTASK','br','[TASK] Deletar uma tarefa');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELTASK','de','[TODO] Aufgabe löschen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELTASK','en','[TASK] Delete a task');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELTASK','es','[TASK] Borrar una tarea');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DELTASK','fr','[TACHE] Supprimer une tâche');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_ACTIVITIES','br','[ATV] Deletar uma atividade');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_ACTIVITIES','de','[AKT] Aktivität löschen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_ACTIVITIES','en','[ATV] Delete an activity');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_ACTIVITIES','es','[ATV] Borrar una actividad');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_ACTIVITIES','fr','[ATV] Effacer une activité');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_ISSUES','br','[ISS] Deletar problemas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_ISSUES','de','[VOR] Vorfall löschen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_ISSUES','en','[ISS] Delete issues');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_ISSUES','es','[ISS] Borrar un error');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_ISSUES','fr','[OBS] Effacer un obstacle');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_RELEASE','br','[REL] Deletar uma release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_RELEASE','de','[REL] Release löschen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_RELEASE','en','[REL] Delete a release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_RELEASE','es','[REL] Borrar una release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_RELEASE','fr','[REL] Détruire une release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_SPRINT','br','[SPR] Deletar uma sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_SPRINT','de','[SPR] Sprint löschen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_SPRINT','en','[SPR] Delete a sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_SPRINT','es','[SPR] Borrar un sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_SPRINT','fr','[SPR] Détruire un sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_US','br','[US] Deletar uma User Story');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_US','de','[US] User-Story löschen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_US','en','[US] Delete an User Story');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_US','es','[US] Borrar un User Story');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('DEL_US','fr','[US] Effacer une User Story');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNGPARAMPRJ','br','[PRJ] Gerenciar configurações');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNGPARAMPRJ','de','[PRO] Einstellungen verwalten');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNGPARAMPRJ','en','[PRJ] Manage settings');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNGPARAMPRJ','es','[PRJ] Administrar la configuración');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNGPARAMPRJ','fr','[PRJ] Gérer les paramètres');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNGSTAKEHOLDER','br','[PRJ] Gerenciar stakeholders');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNGSTAKEHOLDER','de','[PRO] Stakeholder verwalten');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNGSTAKEHOLDER','en','[PRJ] Manage stakeholders');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNGSTAKEHOLDER','es','[PRJ] Administrar los colaboradores');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNGSTAKEHOLDER','fr','[PRJ] Gérer les contributeurs');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNG_TAGS','br','[TAGS] Adicionar e deletar tags');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNG_TAGS','de','[TAGS] Tags zu User-Stories und Aufgaben hinzufügen oder löschen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNG_TAGS','en','[TAGS] Add and remove tags on US and tasks');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNG_TAGS','es','[TAGS] Añadir y borrar los tags en los US y tareas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MNG_TAGS','fr','[TAGS] Ajouter et enlever des tags sur des US et des tâches');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_ACTION','br','[ACT] Atualizar status de ações');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_ACTION','de','[RIS] Status einer Aktion ändern');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_ACTION','en','[ACT] Update actions status');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_ACTION','es','[ACT] Actualizar el estado de las acciones');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_ACTION','fr','[ACT] Changer le statut des actions');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_TASK','br','[TASK] Modificar status da tarefa');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_TASK','de','[TODO] Status einer Aufgabe ändern');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_TASK','en','[TASK] Change task status');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_TASK','es','[TASK] Modificar el estado de las tareas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_TASK','fr','[TACHE] Changer le statut des tâches');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_US','br','[US] Alocar User Stories');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_US','de','[US] User-Story zuweisen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_US','en','[US] Allocate User Stories');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_US','es','[US] Asignar User Stories');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOVE_US','fr','[US] Affecter des User Stories');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOV_ACTIVITIES','br','[ATV] Atualizar status de atividades');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOV_ACTIVITIES','de','[AKT] Status einer Aktivität ändern');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOV_ACTIVITIES','en','[ATV] Update activity status');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOV_ACTIVITIES','es','[ATV] Actualizar el estado de una actividad');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('MOV_ACTIVITIES','fr','[ATV] Mettre à jour le statut d\'une activité');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORDACTION','br','[ACT] Ordenar ações');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORDACTION','de','[RIS] Aktion zuweisen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORDACTION','en','[ACT] Order actions');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORDACTION','es','[ACT] Organizar las acciones');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORDACTION','fr','[ACT] Ordonner les actions');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORDTASK','br','[TASK] Ordenar tarefas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORDTASK','de','[TODO] Aufgabe zuweisen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORDTASK','en','[TASK] Order tasks');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORDTASK','es','[TASK] Organizar las tareas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORDTASK','fr','[TACHE] Ordonner les tâches');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_ACTIVITIES','br','[ATV] Ordenar atividades');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_ACTIVITIES','de','[AKT] Aktivität zuweisen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_ACTIVITIES','en','[ATV] Order activities');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_ACTIVITIES','es','[ATV] Organizar las actividades');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_ACTIVITIES','fr','[ATV] Ordonner les activités');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_ISSUES','br','[ISS] Ordenar problemas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_ISSUES','de','[VOR] Vorfall zuweisen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_ISSUES','en','[ISS] Order issues');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_ISSUES','es','[ISS] Organizar los errores');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_ISSUES','fr','[OBS] Ordonner les obstacles');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_US','br','[US] Ordenar User Stories');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_US','de','[US] User-Story zuweisen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_US','en','[US] Order User Stories');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_US','es','[US] Organizar los User Stories');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('ORD_US','fr','[US] Ordonner les User Stories');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_BV','br','[US] Definir um business value');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_BV','de','[US] Wirtschaftlichen Nutzen festlegen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_BV','en','[US] Set a business value');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_BV','es','[US] Asigna un business value');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_BV','fr','[US] Affecte une business value');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_COMPLEXITY','br','[US] Definir uma complexidade');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_COMPLEXITY','de','[US] Komplexität festlegen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_COMPLEXITY','en','[US] Set a complexity');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_COMPLEXITY','es','[US] Asigna una complejidad');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_COMPLEXITY','fr','[US] Affecte une complexité');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_IMPACT','br','[ISS] Definir impacto');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_IMPACT','de','[VOR] Auswirkung festlegen');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_IMPACT','en','[ISS] Set impact');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_IMPACT','es','[ISS] Asigna un impacto');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('SET_IMPACT','fr','[OBS] Affecter un impact');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDACTION','br','[ACT] Atualizar uma ação');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDACTION','de','[RIS] Aktion aktualisieren');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDACTION','en','[ACT] Update an action');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDACTION','es','[ACT] Actualiza una acción');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDACTION','fr','[ACT] Mettre à jour une action');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDPRJ','br','[PRJ] Atualizar um projeto');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDPRJ','de','[PRO] Projekt aktualisieren');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDPRJ','en','[PRJ] Update a project');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDPRJ','es','[PRJ] Actualiza un proyecto');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDPRJ','fr','[PRJ] Mettre à jour un projet');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDTASK','br','[TASK] Atualizar uma tarefa');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDTASK','de','[TODO] Aufgabe aktualisieren');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDTASK','en','[TASK] Update a task');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDTASK','es','[TASK] Actualiza una tarea');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPDTASK','fr','[TACHE] Mettre à jour une tâche');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_ACTIVITIES','br','[ATV] Atualizar uma atividade');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_ACTIVITIES','de','[AKT] Aktivität aktualisieren');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_ACTIVITIES','en','[ATV] Update an activity');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_ACTIVITIES','es','[ATV] Actualiza una actividad');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_ACTIVITIES','fr','[ATV] Mettre à jour une activité');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_ISSUES','br','[ISS] Atualizar problemas');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_ISSUES','de','[VOR] Vorfall aktualisieren');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_ISSUES','en','[ISS] Update issues');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_ISSUES','es','[ISS] Actualiza los errores');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_ISSUES','fr','[OBS] Mettre à jour les obstacles');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_RELEASE','br','[REL] Atualizar uma release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_RELEASE','de','[REL] Release aktualisieren');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_RELEASE','en','[REL] Update a release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_RELEASE','es','[REL] Actualiza una release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_RELEASE','fr','[REL] Mettre à jour une release');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_SPRINT','br','[SPR] Atualizar uma sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_SPRINT','de','[SPR] Sprint aktualisieren');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_SPRINT','en','[SPR] Update a sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_SPRINT','es','[SPR] Actualiza un sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_SPRINT','fr','[SPR] Mettre à jour un sprint');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_US','br','[US] Atualizar uma User Story');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_US','de','[US] User-Story aktualisieren');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_US','en','[US] Update an User Story');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_US','es','[US] Actualiza un User Story');
INSERT  INTO framework_profiles_actions_translations(action_tag_fk,action_translation_language,action_translation_value) VALUES ('UPD_US','fr','[US] Mettre à jour une User Story');

/*Table structure for table framework_profiles_constitution_actions */

CREATE TABLE framework_profiles_constitution_actions (
  profile_id_fk INT(11) NOT NULL,
  action_tag_fk VARCHAR(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (profile_id_fk,action_tag_fk)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_profiles_constitution_actions */

INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADDACTION');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADDTASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADD_ACTIVITY');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADD_EXT_PRJ_OTHERS');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADD_EXT_PRJ_SELF');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADD_ISSUES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADD_PRJ_OTHERS');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADD_PRJ_SELF');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADD_RELEASE');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADD_SPRINT');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADD_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ADD_US_REL');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ALLOC_TASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'DELACTION');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'DELPRJ');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'DELTASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'DEL_ACTIVITIES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'DEL_ISSUES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'DEL_RELEASE');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'DEL_SPRINT');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'DEL_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'MNGPARAMPRJ');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'MNGSTAKEHOLDER');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'MNG_TAGS');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'MOVE_ACTION');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'MOVE_TASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'MOVE_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'MOV_ACTIVITIES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ORDACTION');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ORDTASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ORD_ACTIVITIES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ORD_ISSUES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'ORD_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'SET_BV');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'SET_COMPLEXITY');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'SET_IMPACT');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'UPDACTION');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'UPDPRJ');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'UPDTASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'UPD_ACTIVITIES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'UPD_ISSUES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'UPD_RELEASE');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'UPD_SPRINT');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (1,'UPD_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (2,'ADD_PRJ_SELF');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ADDACTION');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ADDTASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ADD_ACTIVITY');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ADD_ISSUES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ADD_RELEASE');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ADD_SPRINT');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ADD_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ADD_US_REL');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ALLOC_TASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'DELACTION');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'DELTASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'DEL_ACTIVITIES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'DEL_ISSUES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'DEL_SPRINT');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'DEL_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'MNGPARAMPRJ');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'MNGSTAKEHOLDER');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'MNG_TAGS');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'MOVE_ACTION');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'MOVE_TASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'MOVE_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'MOV_ACTIVITIES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ORDACTION');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ORDTASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ORD_ACTIVITIES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ORD_ISSUES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'ORD_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'SET_BV');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'SET_COMPLEXITY');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'SET_IMPACT');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'UPDACTION');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'UPDPRJ');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'UPDTASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'UPD_ACTIVITIES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'UPD_ISSUES');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'UPD_RELEASE');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'UPD_SPRINT');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (4,'UPD_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'ADD_RELEASE');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'ADD_SPRINT');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'ADD_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'ADD_US_REL');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'DELPRJ');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'DEL_RELEASE');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'DEL_SPRINT');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'DEL_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'MNGPARAMPRJ');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'MNGSTAKEHOLDER');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'MNG_TAGS');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'MOVE_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'ORD_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'SET_BV');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'UPDPRJ');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'UPD_RELEASE');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'UPD_SPRINT');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (6,'UPD_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (8,'ADDTASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (8,'ALLOC_TASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (8,'DELTASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (8,'MNG_TAGS');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (8,'MOVE_TASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (8,'ORDTASK');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (8,'ORD_US');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (8,'SET_COMPLEXITY');
INSERT  INTO framework_profiles_constitution_actions(profile_id_fk,action_tag_fk) VALUES (8,'UPDTASK');

/*Table structure for table framework_profiles_constitution_menus */

CREATE TABLE framework_profiles_constitution_menus (
  profile_id_fk INT(11) NOT NULL,
  menu_tag_fk VARCHAR(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (profile_id_fk,menu_tag_fk)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_profiles_constitution_menus */

INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'admin');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'admin_param');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'admin_profile');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'admin_user');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'app_admin');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'app_columns');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'app_prj_templates');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'app_tags');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'app_tpl_checklist');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'ceremony');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'checklist');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'cockpit');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'color_uses');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'colors');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'connections');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'issue_history');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'issues');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'languages');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'my_profile');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'poker_plan');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'prj_colors');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'prj_columns');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'prj_feature');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'prj_issues_impact');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'prj_issues_progress');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'prj_kanban');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'prj_parameters');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'prj_report');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'prj_settings');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'prj_tags');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'projects');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'settings');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'team');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'team_tasks');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'trash_action');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'trash_issue');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'trash_tsk');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'trash_us');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'us_review');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (1,'us_roadmap');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'ceremony');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'checklist');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'cockpit');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'issue_history');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'issues');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'my_profile');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'poker_plan');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'prj_colors');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'prj_columns');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'prj_feature');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'prj_issues_impact');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'prj_issues_progress');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'prj_kanban');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'prj_parameters');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'prj_report');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'prj_settings');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'prj_tags');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'projects');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'settings');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'team');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'team_tasks');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'trash_action');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'trash_issue');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'trash_tsk');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'trash_us');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'us_review');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (2,'us_roadmap');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (4,'app_tags');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (4,'color_uses');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (4,'prj_parameters');
INSERT  INTO framework_profiles_constitution_menus(profile_id_fk,menu_tag_fk) VALUES (4,'prj_tags');

/*Table structure for table framework_status */

CREATE TABLE framework_status (
  status_id INT(11) NOT NULL AUTO_INCREMENT,
  status_order INT(11) DEFAULT NULL,
  status_target_object VARCHAR(3) COLLATE utf8_bin DEFAULT NULL,
  status_delete_available TINYINT(1) DEFAULT '1',
  status_update_available TINYINT(1) DEFAULT '1',
  status_tag VARCHAR(6) COLLATE utf8_bin DEFAULT NULL,
  status_icon VARCHAR(150) COLLATE utf8_bin DEFAULT NULL,
  status_exclusive_data ENUM('MONO','MULTI','NONE','NEXT') COLLATE utf8_bin DEFAULT 'NONE' COMMENT 'NONE if no use, MULTI=status available for many objects, MONO=status can only be affected to only one object, NEXT=status affected to an object when a new object get the MONO status',
  PRIMARY KEY (status_id)
) ENGINE=INNODB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_status */

INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (1,1,'USR',0,1,'ACTIVE','set_active.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (2,2,'USR',0,1,'INACT','set_inactive.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (5,1,'PRJ',1,1,'PROJ','new.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (6,2,'PRJ',0,0,'GOING','start.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (7,3,'PRJ',0,0,'FINISH','finished.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (8,4,'PRJ',1,0,'CANCEL','trash.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (15,5,'PRJ',1,1,'BILLED','coins.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (16,1,'CON',1,1,'INACON','set_inactive.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (17,2,'CON',0,0,'ACTCON','set_active.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (18,1,'COL',0,0,'COLINA','set_inactive.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (19,2,'COL',0,0,'COLACT','set_active.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (20,1,'TAG',1,1,'TAGACT','set_active.gif','NONE');
INSERT  INTO framework_status(status_id,status_order,status_target_object,status_delete_available,status_update_available,status_tag,status_icon,status_exclusive_data) VALUES (21,2,'TAG',1,1,'TAGINA','set_inactive.gif','NONE');

/*Table structure for table framework_status_translations */

CREATE TABLE framework_status_translations (
  status_id_fk INT(11) NOT NULL,
  status_translation_language VARCHAR(2) COLLATE utf8_bin NOT NULL,
  status_translation_value VARCHAR(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (status_translation_language,status_id_fk),
  KEY FK_gc_status_translations (status_id_fk),
  CONSTRAINT FK_gc_status_translations FOREIGN KEY (status_id_fk) REFERENCES framework_status (status_id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_status_translations */

INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (1,'br','Ativo');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (2,'br','Inativo');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (5,'br','Novo');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (6,'br','Iniciado');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (7,'br','Terminado');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (8,'br','Aguardando');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (15,'br','Fechado');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (16,'br','Inativo');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (17,'br','Ativo');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (18,'br','Indisponível');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (19,'br','Disponível');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (20,'br','Disponível');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (21,'br','Indisponível');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (1,'de','Aktiv');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (2,'de','Inaktiv');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (5,'de','Neu');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (6,'de','Gestartet');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (7,'de','Abgeschlossen');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (8,'de','Wartend');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (15,'de','Beendet');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (16,'de','Inaktiv');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (17,'de','Aktiv');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (18,'de','Nicht verfügbar');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (19,'de','Verfügbar');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (20,'de','Aktiv');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (21,'de','Inaktiv');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (1,'en','Active');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (2,'en','Inactive');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (5,'en','New');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (6,'en','Started');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (7,'en','Finished');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (8,'en','Waiting');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (15,'en','Closed');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (16,'en','Inactive');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (17,'en','Active');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (18,'en','Unavailable');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (19,'en','Available');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (20,'en','Available');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (21,'en','Unavailable');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (1,'es','Activo');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (2,'es','Inactivo');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (5,'es','Nuevo');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (6,'es','Empezado');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (7,'es','Terminado');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (8,'es','Esperando');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (15,'es','Cerrado');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (16,'es','Inactiva');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (17,'es','Activa');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (18,'es','Indisponible');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (19,'es','Disponible');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (20,'es','Activo');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (21,'es','Inactivo');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (1,'fr','Actif');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (2,'fr','Inactif');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (5,'fr','Nouveau');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (6,'fr','Démarré');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (7,'fr','Terminé');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (8,'fr','Suspendu');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (15,'fr','Fermé');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (16,'fr','Inactive');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (17,'fr','Active');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (18,'fr','Indisponible');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (19,'fr','Disponible');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (20,'fr','Actif');
INSERT  INTO framework_status_translations(status_id_fk,status_translation_language,status_translation_value) VALUES (21,'fr','Inactif');

/*Table structure for table framework_users */

CREATE TABLE framework_users (
  user_login VARCHAR(15) COLLATE utf8_bin NOT NULL,
  user_name VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  user_firstname VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  user_mail VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  user_password VARCHAR(50) COLLATE utf8_bin NOT NULL,
  user_profile_id_fk INT(11) DEFAULT NULL,
  user_address_id_fk INT(11) DEFAULT NULL,
  user_creation_date DATE DEFAULT NULL,
  user_status_id_fk INT(11) DEFAULT '1',
  user_connection_mode ENUM('LOCAL','LDAP') COLLATE utf8_bin NOT NULL DEFAULT 'LOCAL',
  user_language VARCHAR(2) COLLATE utf8_bin DEFAULT 'fr',
  user_theme VARCHAR(50) COLLATE utf8_bin DEFAULT 'default',
  PRIMARY KEY (user_login)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_users */

INSERT  INTO framework_users(user_login,user_name,user_firstname,user_mail,user_password,user_profile_id_fk,user_address_id_fk,user_creation_date,user_status_id_fk,user_connection_mode,user_language,user_theme) VALUES ('admin','Administrator','Mister','admin@localhost.com','21232f297a57a5a743894a0e4a801fc3',1,0,'2010-01-01',1,'LOCAL','en','default2014');

/*Table structure for table framework_workflows */

CREATE TABLE framework_workflows (
  wf_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  wf_tag CHAR(3) COLLATE utf8_bin DEFAULT NULL,
  wf_initial_status_id INT(10) UNSIGNED DEFAULT NULL,
  wf_objects_table VARCHAR(50) COLLATE utf8_bin DEFAULT NULL,
  wf_object_id_field VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  wf_object_status_id_field VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  wf_favorite_profile_id_fk INT(11) DEFAULT NULL,
  PRIMARY KEY (wf_id)
) ENGINE=INNODB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_workflows */

INSERT  INTO framework_workflows(wf_id,wf_tag,wf_initial_status_id,wf_objects_table,wf_object_id_field,wf_object_status_id_field,wf_favorite_profile_id_fk) VALUES (1,'USR',1,'framework_users','user_login','user_status_id_fk',0);
INSERT  INTO framework_workflows(wf_id,wf_tag,wf_initial_status_id,wf_objects_table,wf_object_id_field,wf_object_status_id_field,wf_favorite_profile_id_fk) VALUES (5,'PRJ',5,'kados_projects','project_id','project_status_id_fk',0);
INSERT  INTO framework_workflows(wf_id,wf_tag,wf_initial_status_id,wf_objects_table,wf_object_id_field,wf_object_status_id_field,wf_favorite_profile_id_fk) VALUES (6,'CON',16,'kados_connections','connection_id','connection_status_id_fk',0);
INSERT  INTO framework_workflows(wf_id,wf_tag,wf_initial_status_id,wf_objects_table,wf_object_id_field,wf_object_status_id_field,wf_favorite_profile_id_fk) VALUES (7,'COL',18,'kados_template_columns','column_tag','column_status_id_fk',0);
INSERT  INTO framework_workflows(wf_id,wf_tag,wf_initial_status_id,wf_objects_table,wf_object_id_field,wf_object_status_id_field,wf_favorite_profile_id_fk) VALUES (8,'TAG',20,'kados_tags','tag_id','tag_status_id_fk',0);

/*Table structure for table framework_workflows_transitions */

CREATE TABLE framework_workflows_transitions (
  transition_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  transition_wf_id_fk INT(10) UNSIGNED DEFAULT NULL,
  transition_initial_status INT(10) UNSIGNED DEFAULT NULL,
  transition_final_status INT(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (transition_id)
) ENGINE=INNODB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_workflows_transitions */

INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (1,1,1,2);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (2,1,2,1);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (35,5,5,6);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (36,5,5,7);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (37,5,5,8);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (38,5,5,15);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (39,5,6,7);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (40,5,6,8);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (41,5,6,15);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (42,5,7,6);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (43,5,7,8);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (44,5,7,15);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (45,5,8,7);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (46,5,8,6);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (47,5,8,15);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (48,5,15,6);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (49,5,15,7);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (50,5,15,8);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (51,6,16,17);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (52,6,17,16);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (53,7,18,19);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (54,7,19,18);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (55,8,20,21);
INSERT  INTO framework_workflows_transitions(transition_id,transition_wf_id_fk,transition_initial_status,transition_final_status) VALUES (56,8,21,20);

/*Table structure for table framework_workflows_transitions_profiles */

CREATE TABLE framework_workflows_transitions_profiles (
  profile_id_fk INT(11) NOT NULL,
  transition_id_fk INT(11) NOT NULL,
  PRIMARY KEY (profile_id_fk,transition_id_fk)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_workflows_transitions_profiles */

INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,1);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,2);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,3);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,4);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,5);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,6);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,35);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,36);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,37);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,38);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,39);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,40);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,41);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,42);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,43);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,44);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,45);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,46);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,47);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,48);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,49);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,50);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,51);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,52);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,53);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,54);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,55);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (1,56);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (4,55);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (4,56);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (6,35);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (6,39);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (6,40);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (6,44);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (6,45);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (6,46);
INSERT  INTO framework_workflows_transitions_profiles(profile_id_fk,transition_id_fk) VALUES (6,48);

/*Table structure for table framework_workflows_translations */

CREATE TABLE framework_workflows_translations (
  workflow_id_fk INT(11) NOT NULL,
  workflow_translation_language VARCHAR(2) COLLATE utf8_bin NOT NULL,
  workflow_translation_value VARCHAR(30) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (workflow_id_fk,workflow_translation_language)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table framework_workflows_translations */

INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (1,'br','Usuários');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (1,'de','Benutzer');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (1,'en','Users');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (1,'es','Usuarios');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (1,'fr','Utilisateurs');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (5,'br','Projetos');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (5,'de','Projekte');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (5,'en','Projects');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (5,'es','Proyectos');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (5,'fr','Projets');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (6,'br','Conexões externas');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (6,'de','Externe Verbindungen');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (6,'en','External connections');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (6,'es','Conexiones externas');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (6,'fr','Connexions externes');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (7,'br','Template de colunas');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (7,'de','Spaltenvorlage');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (7,'en','Columns template');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (7,'es','Modelo de columnas');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (7,'fr','Modèle de colonnes');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (8,'br','Global tags');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (8,'de','Globale Tags');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (8,'en','Global tags');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (8,'es','Tags Globales');
INSERT  INTO framework_workflows_translations(workflow_id_fk,workflow_translation_language,workflow_translation_value) VALUES (8,'fr','Tags globaux');

/*Table structure for table kados_actions */

CREATE TABLE kados_actions (
  action_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  text TEXT COLLATE utf8_bin NOT NULL,
  color VARCHAR(20) COLLATE utf8_bin NOT NULL,
  status VARCHAR(5) COLLATE utf8_bin NOT NULL DEFAULT 'TODO',
  active INT(10) NOT NULL DEFAULT '1',
  xpos INT(11) NOT NULL,
  ypos INT(11) NOT NULL,
  zpos INT(11) NOT NULL,
  issue_id_fk INT(11) NOT NULL DEFAULT '0',
  action_creator VARCHAR(25) COLLATE utf8_bin NOT NULL,
  action_creation_date DATETIME NOT NULL,
  action_last_updater VARCHAR(25) COLLATE utf8_bin NOT NULL,
  action_last_update_date DATETIME NOT NULL,
  action_load FLOAT(10,1) NOT NULL DEFAULT '0.0',
  action_done FLOAT(10,1) NOT NULL DEFAULT '0.0',
  action_raf FLOAT(10,1) NOT NULL DEFAULT '0.0',
  action_finished INT(11) NOT NULL DEFAULT '0',
  action_date_finished DATE NOT NULL DEFAULT '0000-00-00',
  action_link VARCHAR(250) COLLATE utf8_bin NOT NULL DEFAULT '',
  action_leader VARCHAR(25) COLLATE utf8_bin NOT NULL DEFAULT '',
  action_number INT(11) NOT NULL,
  action_issue_number INT(11) NOT NULL,
  PRIMARY KEY (action_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_actions */

/*Table structure for table kados_activities */

CREATE TABLE kados_activities (
  activity_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  text TEXT COLLATE utf8_bin NOT NULL,
  color VARCHAR(20) COLLATE utf8_bin NOT NULL,
  status VARCHAR(5) COLLATE utf8_bin NOT NULL DEFAULT 'TODO',
  active INT(10) NOT NULL DEFAULT '1',
  xpos INT(11) NOT NULL,
  ypos INT(11) NOT NULL,
  zpos INT(11) NOT NULL,
  activity_release_id_fk INT(11) NOT NULL DEFAULT '0',
  activity_creator VARCHAR(25) COLLATE utf8_bin NOT NULL,
  activity_creation_date DATETIME NOT NULL,
  activity_last_updater VARCHAR(25) COLLATE utf8_bin NOT NULL,
  activity_last_update_date DATETIME NOT NULL,
  activity_link VARCHAR(250) COLLATE utf8_bin NOT NULL DEFAULT '',
  activity_leader VARCHAR(25) COLLATE utf8_bin NOT NULL DEFAULT '',
  activity_number INT(11) NOT NULL,
  template_activity_id_fk INT(11) DEFAULT '0',
  PRIMARY KEY (activity_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_activities */

/*Table structure for table kados_baselines */

CREATE TABLE kados_baselines (
  baseline_date DATE NOT NULL,
  us_id_fk INT(11) NOT NULL,
  us_release_id_fk INT(11) DEFAULT NULL,
  us_sprint_id_fk INT(11) DEFAULT NULL,
  us_business_value INT(11) DEFAULT NULL,
  us_complexity INT(11) DEFAULT NULL,
  us_status VARCHAR(10) COLLATE utf8_bin DEFAULT NULL,
  us_number INT(11) NOT NULL,
  PRIMARY KEY (baseline_date,us_id_fk)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_baselines */

/*Table structure for table kados_colors */

CREATE TABLE kados_colors (
  color_id INT(11) NOT NULL AUTO_INCREMENT,
  color_name VARCHAR(20) COLLATE utf8_bin NOT NULL,
  color_value VARCHAR(6) COLLATE utf8_bin DEFAULT NULL,
  color_border_value VARCHAR(6) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (color_id),
  UNIQUE KEY color_name (color_name)
) ENGINE=INNODB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_colors */

INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (1,'beige','E1D1BA','A28F74');
INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (2,'blue','A6E3FC','265E74');
INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (3,'green','A5F88B','30822A');
INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (4,'orange','F79D35','CA802C');
INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (5,'pink','FFBEEC','BE0082');
INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (6,'white','FFFEF9','C4C3BF');
INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (7,'yellow','FDFB8C','BBA200');
INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (15,'purple','e352e3','520b52');
INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (16,'rouge','ff0d0d','b00a0a');
INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (17,'navy','b6bdfa','1e2d94');
INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (18,'gris','e8e8e8','242424');
INSERT  INTO kados_colors(color_id,color_name,color_value,color_border_value) VALUES (19,'brown','debc78','704802');

/*Table structure for table kados_colors_uses */

CREATE TABLE kados_colors_uses (
  use_color_id INT(11) NOT NULL AUTO_INCREMENT,
  use_color_postit_type VARCHAR(10) COLLATE utf8_bin NOT NULL,
  use_color_meaning VARCHAR(20) COLLATE utf8_bin DEFAULT NULL,
  use_color_default INT(1) DEFAULT NULL,
  use_color_lock INT(1) DEFAULT NULL,
  color VARCHAR(20) COLLATE utf8_bin DEFAULT NULL,
  active INT(1) DEFAULT '1',
  xpos INT(11) DEFAULT '5',
  ypos INT(11) DEFAULT '35',
  zpos INT(11) DEFAULT '5',
  PRIMARY KEY (use_color_id),
  UNIQUE KEY unique_key (use_color_postit_type,color)
) ENGINE=INNODB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_colors_uses */

INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (1,'US','US',1,1,'beige',1,10,300,13);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (2,'US','Note',0,1,'white',1,10,215,12);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (3,'TASK','Test',0,1,'green',1,10,215,8);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (4,'TASK','Dev',1,1,'yellow',1,10,130,7);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (5,'TASK','Infrastructure',0,1,'purple',1,10,45,6);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (6,'RISK','Risque',0,1,'orange',1,10,45,4);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (7,'PROBLEM','',0,1,'rouge',1,10,45,3);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (8,'ACTIVITY','Activity',1,1,'navy',1,10,45,2);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (9,'STKH','',0,1,'brown',1,10,45,5);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (10,'US','',0,0,'pink',1,10,45,10);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (11,'US','',0,0,'orange',1,10,130,11);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (12,'TASK',NULL,0,0,'brown',1,10,300,9);
INSERT  INTO kados_colors_uses(use_color_id,use_color_postit_type,use_color_meaning,use_color_default,use_color_lock,color,active,xpos,ypos,zpos) VALUES (13,'ACTION','Action',1,1,'gris',1,10,45,1);

/*Table structure for table kados_connections */

CREATE TABLE kados_connections (
  connection_id INT(11) NOT NULL AUTO_INCREMENT,
  connection_name VARCHAR(50) COLLATE utf8_bin NOT NULL,
  connection_status_id_fk INT(11) NOT NULL,
  connection_db_type VARCHAR(50) COLLATE utf8_bin NOT NULL DEFAULT 'mysql',
  connection_host VARCHAR(250) COLLATE utf8_bin NOT NULL,
  connection_port INT(11) DEFAULT NULL,
  connection_dbname VARCHAR(100) COLLATE utf8_bin NOT NULL,
  connection_user VARCHAR(100) COLLATE utf8_bin NOT NULL,
  connection_password VARCHAR(50) COLLATE utf8_bin NOT NULL,
  connection_table_projects VARCHAR(100) COLLATE utf8_bin NOT NULL,
  connection_project_id_field VARCHAR(100) COLLATE utf8_bin NOT NULL,
  connection_project_name_field VARCHAR(100) COLLATE utf8_bin NOT NULL,
  connection_project_filter_clause TEXT COLLATE utf8_bin,
  connection_table_releases VARCHAR(100) COLLATE utf8_bin NOT NULL,
  connection_release_id_field VARCHAR(100) COLLATE utf8_bin NOT NULL,
  connection_release_name_field VARCHAR(100) COLLATE utf8_bin NOT NULL,
  connection_release_filter_clause TEXT COLLATE utf8_bin,
  connection_release_to_project_field VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  connection_table_release_project VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  connection_foreign_key_project_field VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  connection_foreign_key_release_field VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  connection_release_due_date_field VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  connection_release_due_date_request TEXT COLLATE utf8_bin,
  PRIMARY KEY (connection_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_connections */

/*Table structure for table kados_features */

CREATE TABLE kados_features (
  feature_id INT(11) NOT NULL AUTO_INCREMENT,
  feature_short_label VARCHAR(5) COLLATE utf8_bin DEFAULT NULL,
  feature_name VARCHAR(25) COLLATE utf8_bin DEFAULT NULL,
  feature_description TEXT COLLATE utf8_bin,
  feature_project_id_fk INT(11) DEFAULT NULL,
  PRIMARY KEY (feature_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_features */

/*Table structure for table kados_issues */

CREATE TABLE kados_issues (
  issue_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  text TEXT COLLATE utf8_bin NOT NULL,
  probability INT(11) NOT NULL DEFAULT '0',
  impact INT(11) NOT NULL DEFAULT '0',
  issue_type VARCHAR(10) COLLATE utf8_bin NOT NULL,
  color VARCHAR(20) COLLATE utf8_bin NOT NULL,
  status VARCHAR(5) COLLATE utf8_bin NOT NULL DEFAULT 'TODO',
  active INT(10) NOT NULL DEFAULT '1',
  xpos INT(11) NOT NULL DEFAULT '40',
  ypos INT(11) NOT NULL DEFAULT '40',
  zpos INT(11) NOT NULL DEFAULT '0',
  issue_project_id_fk INT(11) NOT NULL DEFAULT '0',
  issue_creator VARCHAR(25) COLLATE utf8_bin NOT NULL DEFAULT '0',
  issue_creation_date DATETIME NOT NULL,
  issue_last_updater VARCHAR(25) COLLATE utf8_bin NOT NULL,
  issue_last_update_date DATETIME NOT NULL,
  xpos_p INT(11) NOT NULL DEFAULT '10',
  ypos_p INT(11) NOT NULL DEFAULT '30',
  zpos_p INT(11) NOT NULL DEFAULT '0',
  xpos_i INT(11) NOT NULL DEFAULT '10',
  ypos_i INT(11) NOT NULL DEFAULT '30',
  zpos_i INT(11) NOT NULL DEFAULT '0',
  issue_link VARCHAR(250) COLLATE utf8_bin NOT NULL DEFAULT '',
  issue_number INT(11) NOT NULL,
  issue_us_id_fk INT(11) DEFAULT '0',
  PRIMARY KEY (issue_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_issues */

/*Table structure for table kados_projects */

CREATE TABLE kados_projects (
  project_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  project_name VARCHAR(50) COLLATE utf8_bin NOT NULL,
  project_creator VARCHAR(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  project_creation_date DATE NOT NULL,
  project_status_id_fk INT(11) NOT NULL,
  project_external_project_id INT(11) NOT NULL DEFAULT '0',
  project_external_project_connection_id INT(11) NOT NULL DEFAULT '0',
  project_sprint_overlapping INT(1) DEFAULT '0',
  project_levels INT(1) DEFAULT '3',
  project_visibility VARCHAR(3) COLLATE utf8_bin DEFAULT 'PUB',
  project_use_tags INT(1) DEFAULT '0',
  project_block_raf INT(1) DEFAULT '0',
  PRIMARY KEY (project_id)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_projects */

INSERT  INTO kados_projects(project_id,project_name,project_creator,project_creation_date,project_status_id_fk,project_external_project_id,project_external_project_connection_id,project_sprint_overlapping,project_levels,project_visibility,project_use_tags,project_block_raf) VALUES (1,'Demo Project','admin','2014-04-24',5,0,0,0,3,'PUB',0,0);

/*Table structure for table kados_projects_colors */

CREATE TABLE kados_projects_colors (
  project_id_fk INT(11) NOT NULL,
  color_id_fk INT(11) NOT NULL,
  object_type VARCHAR(4) COLLATE utf8_bin NOT NULL,
  object_color_meaning VARCHAR(20) COLLATE utf8_bin DEFAULT NULL,
  object_color_default INT(1) DEFAULT '0',
  PRIMARY KEY (project_id_fk,color_id_fk,object_type)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_projects_colors */

/*Table structure for table kados_projects_columns */

CREATE TABLE kados_projects_columns (
  project_id_fk INT(11) NOT NULL,
  column_tag_fk VARCHAR(5) COLLATE utf8_bin NOT NULL,
  column_order INT(11) DEFAULT NULL,
  column_meaning VARCHAR(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (project_id_fk,column_tag_fk)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_projects_columns */

INSERT  INTO kados_projects_columns(project_id_fk,column_tag_fk,column_order,column_meaning) VALUES (1,'DONE',3,'');
INSERT  INTO kados_projects_columns(project_id_fk,column_tag_fk,column_order,column_meaning) VALUES (1,'PROG',2,'');
INSERT  INTO kados_projects_columns(project_id_fk,column_tag_fk,column_order,column_meaning) VALUES (1,'TODO',1,'');

/*Table structure for table kados_projects_idle_days */

CREATE TABLE kados_projects_idle_days (
  project_id_fk INT(11) NOT NULL,
  idle_day DATE NOT NULL,
  PRIMARY KEY (project_id_fk,idle_day)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_projects_idle_days */

/*Table structure for table kados_projects_settings */

CREATE TABLE kados_projects_settings (
  setting_tag VARCHAR(6) COLLATE utf8_bin NOT NULL,
  project_id_fk INT(11) NOT NULL,
  setting_value VARCHAR(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (setting_tag,project_id_fk)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_projects_settings */

INSERT  INTO kados_projects_settings(setting_tag,project_id_fk,setting_value) VALUES ('PP_VAL',1,'0;1;2;3;5;8;13;20;30;50;80;100');
INSERT  INTO kados_projects_settings(setting_tag,project_id_fk,setting_value) VALUES ('US_BVL',1,'0;100;200;300;500;800;1000;2000');
INSERT  INTO kados_projects_settings(setting_tag,project_id_fk,setting_value) VALUES ('WK_DAY',1,'0;1;2;3;4');

/*Table structure for table kados_projects_users */

CREATE TABLE kados_projects_users (
  stakeholder_id INT(11) NOT NULL AUTO_INCREMENT,
  project_id_fk INT(11) NOT NULL,
  user_login_fk VARCHAR(20) COLLATE utf8_bin NOT NULL,
  profile_id_fk INT(11) NOT NULL,
  xpos INT(11) DEFAULT '20',
  ypos INT(11) DEFAULT '40',
  zpos INT(11) DEFAULT '1',
  color VARCHAR(20) COLLATE utf8_bin DEFAULT NULL,
  active INT(1) DEFAULT '1',
  release_id_fk INT(11) DEFAULT '0',
  PRIMARY KEY (stakeholder_id)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_projects_users */

INSERT  INTO kados_projects_users(stakeholder_id,project_id_fk,user_login_fk,profile_id_fk,xpos,ypos,zpos,color,active,release_id_fk) VALUES (1,1,'admin',4,55,37,2,'brown',1,0);

/*Table structure for table kados_releases */

CREATE TABLE kados_releases (
  release_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  release_name VARCHAR(25) COLLATE utf8_bin NOT NULL,
  release_creation_date DATE NOT NULL,
  release_due_date DATE NOT NULL,
  release_project_id_fk INT(11) DEFAULT NULL,
  release_external_release_id INT(11) NOT NULL DEFAULT '0',
  release_external_release_connection_id INT(11) NOT NULL DEFAULT '0',
  visibility INT(1) DEFAULT '1',
  release_template_activities_id_fk INT(11) DEFAULT '0',
  PRIMARY KEY (release_id)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_releases */

INSERT  INTO kados_releases(release_id,release_name,release_creation_date,release_due_date,release_project_id_fk,release_external_release_id,release_external_release_connection_id,visibility,release_template_activities_id_fk) VALUES (1,'v1.0.0','2014-04-24','2014-12-16',1,0,0,1,0);

/*Table structure for table kados_sprints */

CREATE TABLE kados_sprints (
  sprint_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  sprint_name VARCHAR(50) COLLATE utf8_bin NOT NULL,
  sprint_number INT(11) NOT NULL,
  sprint_start_date DATE NOT NULL,
  sprint_end_date DATE NOT NULL,
  sprint_release_id_fk INT(11) NOT NULL,
  visibility INT(1) DEFAULT '1',
  PRIMARY KEY (sprint_id)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_sprints */

INSERT  INTO kados_sprints(sprint_id,sprint_name,sprint_number,sprint_start_date,sprint_end_date,sprint_release_id_fk,visibility) VALUES (1,'Sprint 1',1,'2014-04-30','2014-05-16',1,1);

/*Table structure for table kados_sprints_progress */

CREATE TABLE kados_sprints_progress (
  log_sprint_id_fk INT(11) NOT NULL,
  log_date DATE NOT NULL,
  log_task_count INT(11) DEFAULT NULL,
  log_us_count INT(11) DEFAULT NULL,
  log_initial_forecast FLOAT(10,1) DEFAULT NULL,
  log_spent FLOAT(10,1) DEFAULT NULL,
  log_new_forecast FLOAT(10,1) DEFAULT NULL,
  PRIMARY KEY (log_sprint_id_fk,log_date)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_sprints_progress */

INSERT  INTO kados_sprints_progress(log_sprint_id_fk,log_date,log_task_count,log_us_count,log_initial_forecast,log_spent,log_new_forecast) VALUES (1,'2014-04-30',1,1,0.0,0.0,0.0);

/*Table structure for table kados_tags */

CREATE TABLE kados_tags (
  tag_id INT(11) NOT NULL AUTO_INCREMENT,
  tag_label VARCHAR(12) COLLATE utf8_bin DEFAULT NULL,
  tag_owner VARCHAR(15) COLLATE utf8_bin DEFAULT NULL,
  tag_color VARCHAR(20) COLLATE utf8_bin DEFAULT NULL,
  tag_type ENUM('ALL_FREE','ALL_MAND','USR_FREE') COLLATE utf8_bin DEFAULT 'USR_FREE',
  tag_status_id_fk INT(11) DEFAULT '20',
  PRIMARY KEY (tag_id)
) ENGINE=INNODB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_tags */

INSERT  INTO kados_tags(tag_id,tag_label,tag_owner,tag_color,tag_type,tag_status_id_fk) VALUES (1,'Nouveau','admin','rouge','ALL_MAND',20);
INSERT  INTO kados_tags(tag_id,tag_label,tag_owner,tag_color,tag_type,tag_status_id_fk) VALUES (2,'Important','admin','navy','ALL_FREE',20);

/*Table structure for table kados_tags_postit */

CREATE TABLE kados_tags_postit (
  tag_id_fk INT(11) NOT NULL,
  postit_id_fk INT(11) NOT NULL,
  postit_type ENUM('TASK','US') COLLATE utf8_bin NOT NULL,
  tagged_date DATETIME DEFAULT NULL,
  tagged_by VARCHAR(15) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (tag_id_fk,postit_id_fk,postit_type)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_tags_postit */

/*Table structure for table kados_tags_projects */

CREATE TABLE kados_tags_projects (
  tag_id_fk INT(11) NOT NULL,
  project_id_fk INT(11) NOT NULL,
  PRIMARY KEY (tag_id_fk,project_id_fk)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_tags_projects */

/*Table structure for table kados_tasks */

CREATE TABLE kados_tasks (
  task_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  text TEXT COLLATE utf8_bin NOT NULL,
  color VARCHAR(20) COLLATE utf8_bin NOT NULL,
  status VARCHAR(5) COLLATE utf8_bin NOT NULL DEFAULT 'TODO',
  active INT(10) NOT NULL DEFAULT '1',
  xpos INT(11) NOT NULL,
  ypos INT(11) NOT NULL,
  zpos INT(11) NOT NULL,
  us_id_fk INT(11) NOT NULL DEFAULT '0',
  task_creator VARCHAR(25) COLLATE utf8_bin NOT NULL,
  task_creation_date DATETIME NOT NULL,
  task_last_updater VARCHAR(25) COLLATE utf8_bin NOT NULL,
  task_last_update_date DATETIME NOT NULL,
  task_init_load FLOAT(10,1) DEFAULT '0.0',
  task_load FLOAT(10,1) NOT NULL DEFAULT '0.0',
  task_done FLOAT(10,1) NOT NULL DEFAULT '0.0',
  task_raf FLOAT(10,1) NOT NULL DEFAULT '0.0',
  task_finished INT(11) NOT NULL DEFAULT '0',
  task_date_finished DATE NOT NULL DEFAULT '0000-00-00',
  task_link VARCHAR(250) COLLATE utf8_bin NOT NULL DEFAULT '',
  task_leader VARCHAR(25) COLLATE utf8_bin NOT NULL DEFAULT '',
  task_number INT(11) NOT NULL,
  task_us_number INT(11) NOT NULL,
  xpos_l INT(11) DEFAULT '10',
  ypos_l INT(11) DEFAULT '40',
  zpos_l INT(11) DEFAULT '0',
  PRIMARY KEY (task_id)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_tasks */

INSERT  INTO kados_tasks(task_id,text,color,status,active,xpos,ypos,zpos,us_id_fk,task_creator,task_creation_date,task_last_updater,task_last_update_date,task_init_load,task_load,task_done,task_raf,task_finished,task_date_finished,task_link,task_leader,task_number,task_us_number,xpos_l,ypos_l,zpos_l) VALUES (1,'Task 1','yellow','PROG',1,25,54,2,1,'admin','2014-04-24 11:45:46','admin','2014-04-24 11:45:51',0.0,0.0,0.0,0.0,0,'0000-00-00','','admin',1,1,10,40,0);

/*Table structure for table kados_template_activities */

CREATE TABLE kados_template_activities (
  template_activity_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  text TEXT COLLATE utf8_bin NOT NULL,
  color VARCHAR(20) COLLATE utf8_bin NOT NULL,
  active INT(10) NOT NULL DEFAULT '1',
  status VARCHAR(5) COLLATE utf8_bin NOT NULL,
  xpos INT(11) NOT NULL,
  ypos INT(11) NOT NULL,
  zpos INT(11) NOT NULL,
  PRIMARY KEY (template_activity_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_template_activities */

/*Table structure for table kados_template_columns */

CREATE TABLE kados_template_columns (
  column_tag VARCHAR(5) COLLATE utf8_bin NOT NULL,
  column_name VARCHAR(15) COLLATE utf8_bin NOT NULL,
  column_usage VARCHAR(100) COLLATE utf8_bin DEFAULT NULL,
  column_status_id_fk INT(11) DEFAULT NULL,
  PRIMARY KEY (column_tag)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_template_columns */

INSERT  INTO kados_template_columns(column_tag,column_name,column_usage,column_status_id_fk) VALUES ('DEVOK','Dev OK','Source code and unit tests are OK',19);
INSERT  INTO kados_template_columns(column_tag,column_name,column_usage,column_status_id_fk) VALUES ('DONE','Done','Task is done',19);
INSERT  INTO kados_template_columns(column_tag,column_name,column_usage,column_status_id_fk) VALUES ('PROG','In Progress','Item is under progress',19);
INSERT  INTO kados_template_columns(column_tag,column_name,column_usage,column_status_id_fk) VALUES ('TODO','To Do','First column and default column',19);

/*Table structure for table kados_user_stories */

CREATE TABLE kados_user_stories (
  us_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  text TEXT COLLATE utf8_bin NOT NULL,
  business_value INT(11) NOT NULL DEFAULT '0',
  complexity INT(11) NOT NULL DEFAULT '0',
  color VARCHAR(20) COLLATE utf8_bin NOT NULL,
  status VARCHAR(5) COLLATE utf8_bin NOT NULL DEFAULT 'TODO',
  active INT(10) NOT NULL DEFAULT '1',
  xpos INT(11) NOT NULL DEFAULT '40',
  ypos INT(11) NOT NULL DEFAULT '40',
  zpos INT(11) NOT NULL DEFAULT '0',
  us_project_id_fk INT(11) NOT NULL DEFAULT '0',
  us_release_id_fk INT(11) NOT NULL DEFAULT '0',
  xpos_r INT(11) NOT NULL DEFAULT '40',
  ypos_r INT(11) NOT NULL DEFAULT '40',
  zpos_r INT(11) NOT NULL DEFAULT '0',
  us_sprint_id_fk INT(11) NOT NULL DEFAULT '0',
  xpos_s INT(11) NOT NULL DEFAULT '40',
  ypos_s INT(11) NOT NULL DEFAULT '40',
  zpos_s INT(11) NOT NULL DEFAULT '0',
  us_creator VARCHAR(25) COLLATE utf8_bin NOT NULL DEFAULT '0',
  us_creation_date DATETIME NOT NULL,
  us_last_updater VARCHAR(25) COLLATE utf8_bin NOT NULL,
  us_last_update_date DATETIME NOT NULL,
  xpos_c INT(11) NOT NULL DEFAULT '10',
  ypos_c INT(11) NOT NULL DEFAULT '30',
  zpos_c INT(11) NOT NULL DEFAULT '0',
  xpos_bv INT(11) NOT NULL DEFAULT '10',
  ypos_bv INT(11) NOT NULL DEFAULT '30',
  zpos_bv INT(11) NOT NULL DEFAULT '0',
  us_link VARCHAR(250) COLLATE utf8_bin NOT NULL DEFAULT '',
  us_number INT(11) NOT NULL,
  xpos_pw INT(11) NOT NULL DEFAULT '40',
  ypos_pw INT(11) DEFAULT '40',
  zpos_pw INT(11) DEFAULT '0',
  xpos_rw INT(11) NOT NULL DEFAULT '40',
  ypos_rw INT(11) DEFAULT '40',
  zpos_rw INT(11) DEFAULT '0',
  xpos_feat INT(11) DEFAULT '10',
  ypos_feat INT(11) DEFAULT '40',
  zpos_feat INT(11) DEFAULT '0',
  us_feature_id_fk INT(11) DEFAULT '0',
  us_date_finished DATE DEFAULT NULL,
  PRIMARY KEY (us_id)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_user_stories */

INSERT  INTO kados_user_stories(us_id,text,business_value,complexity,color,status,active,xpos,ypos,zpos,us_project_id_fk,us_release_id_fk,xpos_r,ypos_r,zpos_r,us_sprint_id_fk,xpos_s,ypos_s,zpos_s,us_creator,us_creation_date,us_last_updater,us_last_update_date,xpos_c,ypos_c,zpos_c,xpos_bv,ypos_bv,zpos_bv,us_link,us_number,xpos_pw,ypos_pw,zpos_pw,xpos_rw,ypos_rw,zpos_rw,xpos_feat,ypos_feat,zpos_feat,us_feature_id_fk,us_date_finished) VALUES (1,'As a ...., I want to ..... in order to....',500,0,'beige','TODO',1,40,40,0,1,1,40,57,1,1,15,54,2,'admin','2014-04-24 11:45:36','admin','2014-04-24 11:45:36',10,30,0,19,26,1,'',1,40,40,0,40,40,0,10,45,1,0,NULL);

/*Table structure for table kados_users_bookmarks */

CREATE TABLE kados_users_bookmarks (
  user_login_fk VARCHAR(15) COLLATE utf8_bin NOT NULL,
  project_id_fk INT(11) NOT NULL,
  bookmark_order INT(11) DEFAULT NULL,
  bookmark_color VARCHAR(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (user_login_fk,project_id_fk)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_users_bookmarks */

INSERT  INTO kados_users_bookmarks(user_login_fk,project_id_fk,bookmark_order,bookmark_color) VALUES ('admin',1,1,'');

/*Table structure for table kados_users_decks */

CREATE TABLE kados_users_decks (
  user_login_fk VARCHAR(15) COLLATE utf8_bin NOT NULL,
  item_id_fk INT(11) NOT NULL,
  item_type VARCHAR(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (user_login_fk,item_id_fk)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table kados_users_decks */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
