<?php
/**
 * all includes used in a popin form
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */   
 
require_once $pathBase.'global_settings_default.php';
require_once $pathBase.'global_settings.php';

require_once $pathClasses.'class_connexion_mysql.php';
require_once $pathClasses.'class_connexion_mongodb.php';
require_once $pathClasses.'class_connexion_mysql_ext.php';
require_once $pathBase.'messages/'.$_SESSION['language'].'_app_messages.php';
require_once $pathBase.'messages/'.$_SESSION['language'].'_ihm_messages.php';
require_once $pathBase.'common_scripts/functions.php';
require_once $pathBase.'common_scripts/app_functions.php';
?>