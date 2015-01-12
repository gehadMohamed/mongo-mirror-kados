<?php
/**
 * Find whici levle the railway
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

if (isset($_REQUEST['project_id']))
{
  if (intval($_REQUEST['project_id'])!=0)
  {
    $_SESSION['current_project_id']=intval($_REQUEST['project_id']);
  }
  // unset $_SESSION['current_release_id'] and $_SESSION['current_sprint_id'] if exist to allow railway to be accurate
  if (isset($_SESSION['current_release_id'])) { unset($_SESSION['current_release_id']); }
  if (isset($_SESSION['current_sprint_id'])) { unset($_SESSION['current_sprint_id']); }
  if (isset( $_SESSION['current_project_id']))
  {  
    include_once $pathBase.'project_get_user_rights.php';
  } 
}
if (isset($_REQUEST['release_id']))
{
  $_SESSION['current_release_id']=intval($_REQUEST['release_id']);
  // unset $_SESSION['current_sprint_id'] if exist to allow railway to be accurate
  if (isset($_SESSION['current_sprint_id'])) 
  { 
    unset($_SESSION['current_sprint_id']); 
  }
  // get project for the release in order to keep session consistent
  $request= new requete('SELECT release_project_id_fk FROM kados_releases WHERE release_id='.$_SESSION['current_release_id'],$cnx->num);
  $request->getObject();
  $_SESSION['current_project_id']=$request->objet->release_project_id_fk;
}
if (isset($_REQUEST['sprint_id']))
{
  $_SESSION['current_sprint_id']=intval($_REQUEST['sprint_id']);
  // get release for the sprint in order to keep session consistent
  $request= new requete('SELECT sprint_release_id_fk FROM kados_sprints WHERE sprint_id='.$_SESSION['current_sprint_id'],$cnx->num);
  $request->getObject();
  $_SESSION['current_release_id']=$request->objet->sprint_release_id_fk;  
  // get project for the release in order to keep session consistent
  $request= new requete('SELECT release_project_id_fk FROM kados_releases WHERE release_id='.$_SESSION['current_release_id'],$cnx->num);
  $request->getObject();
  $_SESSION['current_project_id']=$request->objet->release_project_id_fk;  
}
