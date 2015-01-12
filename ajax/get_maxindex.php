<?php
/**
 * Script called by an AJAX script to get the max zposition of the note in a dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:Ajax
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
session_start(); 
$pathBase='../';
$pathClasses=$pathBase.'libraries/classes/';
$pathImages=$pathBase.'images/';
$pathAppClasses=$pathBase.'classes/';

require_once $pathClasses.'class_connexion_mysql.php';
require_once $pathClasses.'class_connexion_mongodb.php';
require_once $pathBase.'common_scripts/app_functions.php';
require_once $pathBase.'common_scripts/functions.php';
require_once $pathBase.'messages/'.$_SESSION['language'].'_app_messages.php';
require_once $pathBase.'messages/'.$_SESSION['language'].'_ihm_messages.php';
require_once $pathAppClasses.'project.php';

$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
if (isset($_SESSION['current_project_id']))
{    
  $currentProject=new project($pathBase,$_SESSION['current_project_id']);
}
else
{    
  $currentProject=new project($pathBase,0);
}    
$currentProject->getData();

require_once $pathBase.'boards_settings/settings_'.$_POST['item_type'].'.php';

$request= new requete("SELECT MAX(".$zPosField.") AS maxi FROM ".$tableData." WHERE active=1".$clauseWhereElementsGetAll,$cnx->num);
$maxZpos=$request->getObject();
echo $_POST['note_id'].':'.$maxZpos->maxi;
?>