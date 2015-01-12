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

  $cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

  $dueDate=convertDateSlashToDash($_REQUEST['due_date']);
  $releaseId=$_REQUEST['release_id'];

  if ($releaseId==0)
  {
    echo 0;
  }
  else
  {
    $request=new requete("SELECT sprint_id FROM kados_sprints 
                          WHERE sprint_release_id_fk=".$releaseId." 
                            AND sprint_end_date>'".$dueDate."'",$cnx->num);
    $request->calc_nb_elt();
    echo $request->nb_elt;
  }
}?>  