<?php
/**
 * Script by an AJAX script to update position of an item in a dashboard from its position captured by the AJAX
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:Ajax
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
 

$pathBase='../';
require_once $pathBase.'session_settings.php';
$pathClasses=$pathBase.'libraries/classes/';
$pathFunctions=$pathBase.'libraries/functions/';  
$pathImages=$pathBase.'images/';
$pathAppClasses=$pathBase.'classes/';

require_once $pathClasses.'class_connexion_mysql.php';
require_once $pathClasses.'class_connexion_mongodb.php';
require_once $pathBase.'common_scripts/app_functions.php';
require_once $pathBase.'common_scripts/functions.php';
require_once $pathFunctions.'fct_date_hour.php';
require_once $pathAppClasses.'project.php';

require_once $pathBase.'messages/'.$_SESSION['language'].'_app_messages.php';
require_once $pathBase.'messages/'.$_SESSION['language'].'_ihm_messages.php';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$simpleItemType=getSimpleItemType($_REQUEST['item_type']);
require_once $pathBase.'dashboard_settings.php';

// Validating the input data:

if(!is_numeric($_REQUEST['id']) || !is_numeric($_REQUEST['x']) || !is_numeric($_REQUEST['y']) || !is_numeric($_REQUEST['z']) || !isset($_REQUEST['status']))
die("0");

if (isset($_SESSION['current_project_id']))
{    
  $currentProject=new project($pathBase,$_SESSION['current_project_id']);
}
else
{    
  $currentProject=new project($pathBase,0);
}    
$currentProject->getData();

require_once $pathBase.'boards_settings/settings_'.$_REQUEST['item_type'].'.php';

// Escaping:
$id = (int)$_REQUEST['id'];
$x = (int)$_REQUEST['x'];
$y = (int)$_REQUEST['y'];
$z = (int)$_REQUEST['z'];
$status=$_REQUEST['status'];

// Check if a note is near the moved one
$request= new requete("SELECT * FROM ".$tableData." WHERE ABS(".$yPosField."-".$y.")<15 AND ABS(".$xPosField."-".$x.")<20 AND ".$itemIdName."!=".$id." AND ".$statusField."='".$status."' AND active=1".$clauseWhereElements,$cnx->num);
$request->calc_nb_elt();
if ($request->nb_elt!=0)
{
  $y+=15;  
}

$request->envoi("SELECT ".$statusField." AS status FROM ".$tableData." WHERE ".$itemIdName."=".$id);
$oldObject=$request->recup_objet();

$updateDateSet='';
if (isset($updateDateField))
{
  $updateDateSet=",".$updateDateField."='".aujourdhui()." ".heure_brute()."'";  
}
if (isset($updaterUsernameField))
{
  $updateDateSet.=",".$updaterUsernameField."='".$_SESSION['login']."'";  
}    
// Saving the position and z-index of the note:
$request->envoi("UPDATE ".$tableData." SET ".$xPosField."=".$x.",".$yPosField."=".$y.",".$zPosField."=".$z.",".$statusField."='".$status."'".$updateDateSet." WHERE ".$itemIdName."=".$id);
$mcnx->num->$tableData->update(array($itemIdName=>$id),array('$set'=>array($xPosField=>$x,$yPosField=>$y,$zPosField=>$z,$statusField=>$status."'".$updateDateSet)),array('multiple' => true));

// if $_REQUEST['item_type']==us_project, it's necessary to check if there is change in release allocation. If yes, sprint x position must be reset.
if ($_REQUEST['item_type']=='us_project' && $oldObject->status!=$status)
{ 
  $request->envoi("UPDATE ".$tableData." SET us_sprint_id_fk=0,xpos_s=".$xInitDefaultPosition." WHERE ".$itemIdName."=".$id);
  $mcnx->num->$tableData->update(array($itemIdName=>$id),array('$set'=>array('us_sprint_id_fk'=>'0','xpos_s'=>$xInitDefaultPosition)),array('multiple' => true));  
}

// if $_REQUEST['item_type']==us_release, all tasks load value must be set to remaining2do value
if ($_REQUEST['item_type']=='us_release' && $oldObject->status!=$status)
{ 
  $request->envoi("UPDATE kados_tasks SET task_load=task_raf WHERE us_id_fk=".$id);
  $mcnx->num->kados_tasks->update(array('us_id_fk'=>$id),array('$set'=>array('task_load'=>'task_raf')),array('multiple' => true));
}

// Affect leader to a task if the previous status is the first one (TO DO) and there is a change in status and the object is a task
if (($_REQUEST['item_type']=='tasks_sprint' || $_REQUEST['item_type']=='pbl_tasks' || $_REQUEST['item_type']=='rbl_tasks') && $oldObject->status!=$status)
{ 
  $request->envoi("UPDATE ".$tableData." SET task_leader='".$_SESSION['login']."',task_finished=0,task_date_finished='0000-00-00' WHERE ".$itemIdName."=".$id);
  $mcnx->num->$tableData->update(array($itemIdName=>$id),array('$set'=>array('task_leader'=>$_SESSION['login'],'task_finished'=>'0','task_date_finished'=>'0000-00-00')),array('multiple' => true));
}

// Affect leader to a action if the previous status is the first one (TO DO) and there is a change in status and the object is an action
if ($_REQUEST['item_type']=='issues_actions' && $oldObject->status!=$status)
{ 
  $request->envoi("UPDATE ".$tableData." SET action_leader='".$_SESSION['login']."' WHERE ".$itemIdName."=".$id);
  $mcnx->num->$tableData->update(array($itemIdName=>$id),array('$set'=>array('action_leader'=>$_SESSION['login'])),array('multiple' => true));
}

// Set 2do2finish at zero if the task is in the last status and there is a change in status and the object is a task
if (($_REQUEST['item_type']=='tasks_sprint' || $_REQUEST['item_type']=='pbl_tasks' || $_REQUEST['item_type']=='rbl_tasks') && $status==$boardFinalStatusTag && $oldObject->status!=$status)
{ 
  $request->envoi("UPDATE ".$tableData." SET task_raf=0,task_finished=1,task_date_finished='".aujourdhui()."' WHERE ".$itemIdName."=".$id);
  $mcnx->num->$tableData->update(array($itemIdName=>$id),array('$set'=>array('task_raf'=>'0','task_finished'=>'1','task_date_finished'=>aujourdhui())),array('multiple' => true));
  // Update record of the situation
  if (isset($_SESSION['current_sprint_id']))
  {
    $currentSprintId=$_SESSION['current_sprint_id'];
    require_once $pathBase.'progress_recording.php';
  }	
}

// Set 2do2finish at zero if the action is in the last status and there is a change in status and the object is an action
if ($_REQUEST['item_type']=='issues_actions' && $status==$boardFinalStatusTag && $oldObject->status!=$status)
{ 
  $request->envoi("UPDATE ".$tableData." SET action_raf=0 WHERE ".$itemIdName."=".$id);
  $mcnx->num->$tableData->update(array($itemIdName=>$id),array('$set'=>array('action_raf'=>'0')),array('multiple' => true));
}

// Manage status of US or Issue when tasks are finished or re-started
$retour=':STDBY:0';

/*  ------------- TASKS----------------------------*/
// if item is a task and the JS need the count of tasks finished, send it
if (($_REQUEST['item_type']=='tasks_sprint' || $_REQUEST['item_type']=='pbl_tasks' || $_REQUEST['item_type']=='rbl_tasks') && $status==$boardFinalStatusTag && $oldObject->status!=$status)
{ 
  $request->envoi("SELECT COUNT(task_id) AS nb,status FROM kados_tasks WHERE us_id_fk=".$_REQUEST['parent_id']." GROUP BY status");
  $tasksByStatus=$request->recup_array_champ();
  $request->envoi('SELECT * FROM kados_user_stories WHERE us_id='.$_REQUEST['parent_id']);
  $usData=$request->recup_objet();

  if(count($tasksByStatus)==1 && $tasksByStatus[0]['status']==$boardFinalStatusTag)
  {
	// If US is already DONE (that is to say, a manual action has set to DONE, do nothing
	if ($usData->status=='TODO')
	{
	  $retour=':ALMOST_DONE:'.$_REQUEST['parent_id'];
	}
  }
}

// if item is a task and the JS need the count of tasks finished, send it
if (($_REQUEST['item_type']=='tasks_sprint' || $_REQUEST['item_type']=='pbl_tasks' || $_REQUEST['item_type']=='rbl_tasks') && $oldObject->status==$boardFinalStatusTag && $oldObject->status!=$status)
{ 
  $request->envoi("SELECT COUNT(task_id) AS nb,status FROM kados_tasks WHERE us_id_fk=".$_REQUEST['parent_id']." AND active>0 GROUP BY status");
  $tasksByStatus=$request->recup_array_champ();
  $request->envoi('SELECT * FROM kados_user_stories WHERE us_id='.$_REQUEST['parent_id']);
  $usData=$request->recup_objet();
  
  if(count($tasksByStatus)>1 || count($tasksByStatus)==1 && $tasksByStatus[0]['status']!=$boardFinalStatusTag)
  {
    $retour=':BACK_TODO:'.$_REQUEST['parent_id'];  
    if ($usData->status=='DONE')
	{
	  $request->envoi("UPDATE kados_user_stories SET status='TODO' WHERE us_id=".$_REQUEST['parent_id']);
          $mcnx->num->kados_user_stories->update(array('us_id'=>$_REQUEST['parent_id']),array('$set'=>array('status'=>'TODO')),array('multiple' => true));
	}  
  }	
}

/*  ------------- ACTIONS----------------------------*/
// if item is an action and the JS need the count of actions finished, send it
if ($_REQUEST['item_type']=='issues_actions' && $status==$boardFinalStatusTag && $oldObject->status!=$status)
{ 
  $request->envoi("SELECT COUNT(action_id) AS nb,status FROM kados_actions WHERE issue_id_fk=".$_REQUEST['parent_id']." AND active>0 GROUP BY status");
  $actionsByStatus=$request->recup_array_champ();
  $request->envoi('SELECT * FROM kados_issues WHERE issue_id='.$_REQUEST['parent_id']);
  $issueData=$request->recup_objet();

  if(count($actionsByStatus)==1 && $actionsByStatus[0]['status']==$boardFinalStatusTag)
  {
	// If US is already DONE (that is to say, a manual action has set to DONE, do nothing
	if ($issueData->status=='NEW')
	{
	  $retour=':ALMOST_DONE:'.$_REQUEST['parent_id'];
	}
  }
}
if ($_REQUEST['item_type']=='issues_actions' && $oldObject->status==$boardFinalStatusTag && $oldObject->status!=$status)
{ 
  $request->envoi("SELECT COUNT(action_id) AS nb,status FROM kados_actions WHERE issue_id_fk=".$_REQUEST['parent_id']." AND active>0 GROUP BY status");
  $actionsByStatus=$request->recup_array_champ();
  $request->envoi('SELECT * FROM kados_issues WHERE issue_id='.$_REQUEST['parent_id']);
  $issueData=$request->recup_objet();
  
  if(count($actionsByStatus)>1 || count($actionsByStatus)==1 && $actionsByStatus[0]['status']!=$boardFinalStatusTag)
  {
    $retour=':BACK_TODO:'.$_REQUEST['parent_id'];  
    if ($issueData->status=='AWAY')
	{
	  $request->envoi("UPDATE kados_issues SET status='NEW' WHERE issue_id=".$_REQUEST['parent_id']);
          $mcnx->num->kados_issues->update(array('issue_id'=>$_REQUEST['parent_id']),array('$set'=>array('status'=>'NEW')),array('multiple' => true));
	}  
  }	
}


echo $y.$retour;
?>