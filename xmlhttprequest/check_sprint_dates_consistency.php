<?php
/**
 * Check if tag exists or not  
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:administration
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */
session_start();

if (isset($_SESSION['login']))
{    
$pathBase='../';
include $pathBase.'libraries/classes/class_connexion_mysql.php';
include $pathBase.'libraries/functions/fct_date_hour.php';
include $pathBase.'common_scripts/app_functions.php';
include $pathBase.'common_scripts/functions.php';

$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$dateStart=$_REQUEST['date_start'];
$dateEnd=$_REQUEST['date_end'];
$releaseId=$_REQUEST['release_id'];
$sprintId=$_REQUEST['sprint_id'];

$startDay=fmod(dayOfWeek($dateStart)+6,7);
$endDay=fmod(dayOfWeek($dateEnd)+6,7);

$workingDays=explode(';',getProjectSetting('WK_DAY',$_SESSION['current_project_id'],$cnx->num));

$checkOthers=true;
if (!in_array($startDay,$workingDays))
{
  echo -1;
  $checkOthers=false;  
}
else if (!in_array($endDay,$workingDays))
{
  echo -2;
  $checkOthers=false;  
}

if ($checkOthers)
{
  // Check if ovelapping is forbidden
  if (getParameter('SPOVL',$cnx->num)==1) 
  {
    $request=new requete("SELECT project_sprint_overlapping FROM kados_projects WHERE project_id=".$_SESSION['current_project_id'],$cnx->num);
    $request->getObject();
    if ($request->objet->project_sprint_overlapping==1)
    {
      echo 0;
      $checkOthers=false;
    }
  }
}

// Then if ovelapping is not allowed, check
if ($checkOthers)
{
  $request=new requete("SELECT sprint_id FROM kados_sprints 
                      WHERE sprint_release_id_fk=".$releaseId." 
					  AND sprint_id!=".$sprintId." 
					  AND (sprint_start_date<='".$dateStart."' AND sprint_end_date>='".$dateStart."'
					  OR sprint_start_date<='".$dateEnd."' AND sprint_end_date>='".$dateEnd."')",$cnx->num);
  $request->calc_nb_elt();
  echo $request->nb_elt;
}
}?>