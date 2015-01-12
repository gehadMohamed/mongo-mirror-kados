<?php
/**
 * Actions for issue management  in a dashboard
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
    case 'add_issue':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:

	  $probability = (int)$_POST['probability'];
	  $linkedUs = (int)$_POST['linked_us'];
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);
      $zindex = (int)$_POST['zindex'];
	  
	  // Get max issue_number for the project
	  $request= new requete("SELECT MAX(issue_number) AS max FROM kados_issues WHERE issue_project_id_fk=".$_SESSION['current_project_id'],$cnx->num);
	  $request->getObject();
	  $issueNumber=(int)$request->objet->max+1;

	  // check if tranformation of risk into a problem is necessary
	  if ($probability==100 && $_POST['issue_type']=='risk')
	  {
	    $_POST['issue_type']='problem';
		$request->envoi("SELECT color FROM kados_colors_uses WHERE use_color_postit_type='PROBLEM'");
		$request->recup_array_mono();
		$color=$request->array[0];
	  }
	  
      /* Inserting a new record in the $tableData DB: */
          
      $request->envoi("INSERT INTO ".$tableData." (issue_number,text,probability,color,".$xPosField.",".$yPosField.",".$zPosField.",".$statusField.$otherFieldsInsert.",
	                         status,issue_type,issue_us_id_fk,issue_creation_date,issue_creator,issue_last_update_date,issue_last_updater,issue_link)
				   VALUES (".$issueNumber.",'".$body."','".$probability."','".$color."',".$xInitDefaultPosition.",".$yInitDefaultPosition.",".$zindex.",'".$initialStatus."'".$otherFieldsInsertValues.",
				           'NEW','".$_POST['issue_type']."',".$linkedUs.",'".aujourdhui()." ".heure_brute()."','".$_SESSION['login']."','".aujourdhui()." ".heure_brute()."','".$_SESSION['login']."',
						   '".$_POST['note_link']."')");
      $mcnx->num->$tableData->insert(array("issue_number"=>$issueNumber,"text"=>$body,"probability"=>$probability,"color"=>$color,"$xPosField"=>$xInitDefaultPosition,"$yPosField"=>$yInitDefaultPosition,"$zPosField"=>$zindex,$statusField.$otherFieldsInsert=>$initialStatus."'".$otherFieldsInsertValues,'status'=>"NEW","issue_type"=>$_POST['issue_type'],"issue_us_id_fk"=>$linkedUs,"issue_creation_date"=>aujourdhui()."".heure_brute(),"issue_creator"=>$_SESSION['login'],"issue_last_update_date"=>aujourdhui()."".heure_brute(),"issue_last_updater"=>$_SESSION['login'],"issue_link"=>$_POST['note_link']));
  
	break;
 
    case 'update_issue':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:
	  $probability = (int)$_POST['probability'];
	  $linkedUs = (int)$_POST['linked_us'];
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);

	  // check if tranformation of risk into a problem is necessary
	  if ($probability==100 && $_POST['issue_type']=='risk')
	  {
	    $_POST['issue_type']='problem';
		$request->envoi("SELECT color FROM kados_colors_uses WHERE use_color_postit_type='PROBLEM'");
		$request->recup_array_mono();
		$color=$request->array[0];
	  }
	  
      $request= new requete("UPDATE ".$tableData." SET text='".$body."',color='".$color."',issue_link='".$_POST['note_link']."',
	                                probability=".$probability.",issue_last_update_date='".aujourdhui()." ".heure_brute()."',
									issue_last_updater='".$_SESSION['login']."',issue_us_id_fk=".$linkedUs." 
							 WHERE ".$itemIdName."=".$_REQUEST['item_id'],$cnx->num);
      $mcnx->num->$tableData->update(array($itemIdName=>$_REQUEST['item_id']),array('$set'=>array('text'=>$body,'color'=>$color,'issue_link'=>$_POST['note_link'],'probability'=>$probability,'issue_last_update_date'=>aujourdhui()." ".heure_brute(),'issue_last_updater'=>$_SESSION['login'],'issue_us_id_fk'=>$linkedUs)),array('multiple' => true));
	break; 
  }	
}	