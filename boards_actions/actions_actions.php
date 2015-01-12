<?php
/**
 * Actions for actions (linked to issues) management  in a dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
 
if (!isset($otherFieldsInsert))
{
  $otherFieldsInsert='';
  $otherFieldsInsertValues='';
}
 
if (isset($_REQUEST['action']))
{
  switch ($_REQUEST['action'])
  {
    case 'add_action':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-task_load']=stripslashes(str_replace(',','.',$_POST['note-task_load']));
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:

      $action_load = (float)$_POST['note-task_load'];
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);
      $zindex = (int)$_POST['zindex'];

	  // Get max action_number for the project
	  $request= new requete("SELECT MAX(action_number) AS max FROM kados_actions WHERE issue_id_fk=".$_REQUEST['object_id'],$cnx->num);
	  $request->getObject();
	  $actionNumber=(int)$request->objet->max+1;	  
	  
	  // Get issue_number 
	  $request->envoi("SELECT issue_number FROM kados_issues WHERE issue_id=".$_REQUEST['object_id']); 
	  $request->getObject();
      $actionIssueNumber=$request->objet->issue_number;
 	  
      /* Inserting a new record in the $tableData DB: */
      $request= new requete("INSERT INTO ".$tableData." (action_number,action_issue_number,text,action_load,color,".$xPosField.",".$yPosField.",".$zPosField.",".$statusField.$otherFieldsInsert.",
	                         action_done,action_raf,action_creation_date,action_creator,action_last_update_date,action_last_updater,action_link)
				             VALUES (".$actionNumber.",".$actionIssueNumber.",'".$body."',".$action_load.",'".$color."',".$xInitDefaultPosition.",".$yInitDefaultPosition.",".$zindex.",'".$initialStatus."'".$otherFieldsInsertValues.",
							 0,".$action_load.",'".aujourdhui()." ".heure_brute()."','".$_SESSION['login']."','".aujourdhui()." ".heure_brute()."','".$_SESSION['login']."',
							 '".$_POST['note_link']."')",$cnx->num);
//      $mcnx->num->$tableData->insert(array('action_number'=>$actionNumber,'action_issue_number'=>$actionIssueNumber,'text'=>$body,'action_load'=>$action_load,'color'=>$color,$xPosField=>$xInitDefaultPosition,$yPosField=>$yInitDefaultPosition,$zPosField=>$zindex,$statusField.$otherFieldsInsert=>$initialStatus."'".$otherFieldsInsertValues,'action_done'=>"0",'action_raf'=>$action_load,'action_creation_date'=>aujourdhui()."".heure_brute(),'action_creator'=>$_SESSION['login'],'action_last_update_date'=>aujourdhui()."".heure_brute(),'action_last_updater'=>$_SESSION['login'],'action_link'=>$_POST['note_link']));
                   $mrequest=new requete("SELECT * FROM ".$tableData." WHERE action_id='".$request->insert_id()."'",$cnx->num);
    
         $mcnx->num->$tableData->insert(array_shift($mrequest->recup_array_champ()));							 
      // If action parent is at AWAY status, reset ISSUE status to TODO
	  $request->envoi("UPDATE kados_issues SET status='NEW' WHERE status='AWAY' AND issue_id=".$_REQUEST['object_id']); 
          $mcnx->num->kados_issues->update(array('status'=>'AWAY','issue_id'=>$_REQUEST['object_id']),array('$set'=>array('status'=>'NEW')),array('multiple' => true));	  
    break;
	
    case 'update_action':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-task_load']=stripslashes(str_replace(',','.',$_POST['note-task_load']));
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:

      $action_load = (float)$_POST['note-task_load'];
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);
	  $load_spent = (float)str_replace(',','.',$_POST['note-load_spent']);
	  $load2finish = (float)str_replace(',','.',$_POST['note-load2finish']);
	  
      $request= new requete("UPDATE ".$tableData." SET text='".$body."',action_load=".$action_load.",color='".$color."',action_link='".$_POST['note_link']."',
                             action_done=".$load_spent.",action_raf=".$load2finish.",action_last_update_date='".aujourdhui()." ".heure_brute()."',action_last_updater='".$_SESSION['login']."' 
							 WHERE ".$itemIdName."=".$_REQUEST['item_id'],$cnx->num);
      $mcnx->num->$tableData->update(array($itemIdName=>$_REQUEST['item_id']),array('$set'=>array('text'=>$body,'action_load'=>$action_load,'color'=>$color,'action_link'=>$_POST['note_link'],'action_done'=>$load_spent,'action_raf'=>$load2finish,'action_last_update_date'=>aujourdhui()." ".heure_brute(),'action_last_updater'=>$_SESSION['login'])),array('multiple' => true));

	break; 	
  }
}