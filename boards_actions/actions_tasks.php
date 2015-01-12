<?php
/**
 * Actions for us management  in a dashboard
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
    case 'add_task':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-task_load']=stripslashes(str_replace(',','.',$_POST['note-task_load']));
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:

      $task_load = (float)$_POST['note-task_load'];
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);
      $zindex = (int)$_POST['zindex'];

	  // Get max task_number for the project
	  $request= new requete("SELECT MAX(task_number) AS max FROM kados_tasks WHERE us_id_fk=".$_REQUEST['object_id'],$cnx->num);
	  $request->getObject();
	  $taskNumber=(int)$request->objet->max+1;	  
	  
	  // Get us_number 
	  $request->envoi("SELECT us_number FROM kados_user_stories WHERE us_id=".$_REQUEST['object_id']); 
	  $request->getObject();
      $taskUsNumber=$request->objet->us_number;
 	  
      /* Compute position for tasks */
      // get US y max and y min and number of in the backlog
      $request->envoi("SELECT MIN(".$yPosField.") AS ymin,MAX(".$yPosField.") AS ymax,COUNT(".$yPosField.") AS nb_us 
                       FROM kados_tasks
                       WHERE active=1 
                         AND status=(SELECT column_tag_fk 
                                     FROM kados_projects_columns 
                                     WHERE column_order=1 
                                       AND project_id_fk=".$_SESSION['current_project_id'].")
                         AND us_id_fk=".$_REQUEST['object_id']);
      $infosTaskInScope=$request->getObject();  
      if ($infosTaskInScope->nb_us!=0)
      {
        $score=floor(($infosTaskInScope->ymax+$itemHeight-$infosTaskInScope->ymin+25*$infosTaskInScope->nb_us)/$infosTaskInScope->nb_us);  
        if ($score>=$itemHeight)
        {
          $yInitDefaultPosition=$infosTaskInScope->ymax+$itemHeight+25;  
        }    
        else
        {
          $yInitDefaultPosition=$infosTaskInScope->ymax+$itemYShift;  
          $xInitDefaultPosition=7*($infosTaskInScope->nb_us+1);
        }                
      }
                  
      /* Inserting a new record in the $tableData DB: */
      $request= new requete("INSERT INTO ".$tableData." (task_number,task_us_number,text,task_load,task_init_load,color,".$xPosField.",".$yPosField.",".$zPosField.",".$statusField.$otherFieldsInsert.",
	                         task_done,task_raf,task_creation_date,task_creator,task_last_update_date,task_last_updater,task_link)
				             VALUES (".$taskNumber.",".$taskUsNumber.",'".$body."',".$task_load.",".$task_load.",'".$color."',".$xInitDefaultPosition.",".$yInitDefaultPosition.",".$zindex.",'".$initialStatus."'".$otherFieldsInsertValues.",
							 0,".$task_load.",'".aujourdhui()." ".heure_brute()."','".$_SESSION['login']."','".aujourdhui()." ".heure_brute()."','".$_SESSION['login']."',
							 '".$_POST['note_link']."')",$cnx->num);
      $mcnx->num->$tableData->insert(array("task_number"=>$taskNumber,"task_us_number"=>$taskUsNumber,"text"=>$body,"task_load"=>$task_load,"task_init_load"=>$task_load,"color"=>$color,"$xPosField"=>$xInitDefaultPosition,"$yPosField"=>$yInitDefaultPosition,"$zPosField"=>$zindex,"$statusField.$otherFieldsInsert"=>$initialStatus."'".$otherFieldsInsertValues,'task_done'=>"0","task_raf"=>$task_load,"task_creation_date"=>aujourdhui()."".heure_brute(),"task_creator"=>$_SESSION['login'],"task_last_update_date"=>aujourdhui()."".heure_brute(),"task_last_updater"=>$_SESSION['login'],"task_link"=>$_POST['note_link']));
							 
      // If US parent is at DONE status, reset US status to TODO
	  $request->envoi("UPDATE kados_user_stories SET status='TODO' WHERE status='DONE' AND us_id=".$_REQUEST['object_id']);
          $mcnx->num->kados_user_stories->update(array('status'=>'DONE','us_id'=>$_REQUEST['object_id']),array('$set'=>array('status'=>'TODO')),array('multiple' => true));
	  // Update record of the situation
	  if (isset($_SESSION['current_sprint_id']))
	  {	  
	    $currentSprintId=$_SESSION['current_sprint_id'];
	    require_once $pathBase.'progress_recording.php';
	  }	
    break;
	
    case 'update_task':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-task_load']=stripslashes(str_replace(',','.',$_POST['note-task_load']));
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:

      $task_load = (float)$_POST['note-task_load'];
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);
	  $load_spent = (float)str_replace(',','.',$_POST['note-load_spent']);
	  $load2finish = (float)str_replace(',','.',$_POST['note-load2finish']);
	  
      $request= new requete("UPDATE ".$tableData." SET text='".$body."',task_load=".$task_load.",task_init_load=".$task_load.",color='".$color."',task_link='".$_POST['note_link']."',
                             task_done=".$load_spent.",task_raf=".$load2finish.",task_last_update_date='".aujourdhui()." ".heure_brute()."',task_last_updater='".$_SESSION['login']."' 
							 WHERE ".$itemIdName."=".$_REQUEST['item_id'],$cnx->num);
      $mcnx->num->$tableData->update(array($itemIdName=>$_REQUEST['item_id']),array('$set'=>array('text'=>$body,'task_load'=>$task_load,'task_init_load'=>$task_load,'color'=>$color,'task_link'=>$_POST['note_link'],'task_done'=>$load_spent,'task_raf'=>$load2finish,'task_last_update_date'=>aujourdhui()." ".heure_brute(),'task_last_updater'=>$_SESSION['login'])),array('multiple' => true));
	  // Update record of the situation
	  if (isset($_SESSION['current_sprint_id']))
	  {
	    $currentSprintId=$_SESSION['current_sprint_id'];
	    require_once $pathBase.'progress_recording.php';
	  }	
	break; 	
  }
}