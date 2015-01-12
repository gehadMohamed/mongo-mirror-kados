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
    case 'add_activity':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);
      $zindex = (int)$_POST['zindex'];
	  
      if ($itemType=='checklist')
	  {
        /* Inserting a new record in the $tableData DB: */
        $request->envoi("INSERT INTO ".$tableData." (text,color,active,status,".$xPosField.",".$yPosField.",".$zPosField.$otherFieldsInsert.")
				   VALUES ('".$body."','".$color."',1,'0',".$xInitDefaultPosition.",".$yInitDefaultPosition.",".$zindex.$otherFieldsInsertValues.")");	  
//	$mcnx->num->$tableData->insert(array("text"=>$body,"color"=>$color,'active'=>"1",'status'=>"0","$xPosField"=>$xInitDefaultPosition,"$yPosField"=>$yInitDefaultPosition,"$zPosField.$otherFieldsInsert"=>$zindex.$otherFieldsInsertValues));

        $mrequest=new requete("SELECT * FROM ".$tableData." WHERE ".$request->keyArray[$tableData]."='".$request->insert_id()."'",$cnx->num);
    
         $mcnx->num->$tableData->insert(array_shift($mrequest->recup_array_champ()));
	  }
	  else
	  {
	    // Get max issue_number for the project
	    $request= new requete("SELECT MAX(activity_number) AS max FROM kados_activities WHERE activity_release_id_fk=".$_SESSION['current_release_id'],$cnx->num);
	    $request->getObject();
	    $activityNumber=(int)$request->objet->max+1;	  
        /* Inserting a new record in the $tableData DB: */
        $request->envoi("INSERT INTO ".$tableData." (text,color,".$xPosField.",".$yPosField.",".$zPosField.",status,
	                         activity_release_id_fk,activity_creation_date,activity_creator,activity_last_update_date,activity_last_updater,activity_link,activity_number)
				   VALUES ('".$body."','".$color."',".$xInitDefaultPosition.",".$yInitDefaultPosition.",".$zindex.",'TODO',
				           ".$_SESSION['current_release_id'].",'".aujourdhui()." ".heure_brute()."','".$_SESSION['login']."','".aujourdhui()." ".heure_brute()."','".$_SESSION['login']."',
						   '".$_POST['note_link']."',".$activityNumber.")");
//        $mcnx->num->$tableData->insert(array("text"=>$body,"color"=>$color,"$xPosField"=>$xInitDefaultPosition,"$yPosField"=>$yInitDefaultPosition,"$zPosField"=>$zindex,'status'=>"TODO","activity_release_id_fk"=>$_SESSION['current_release_id'],"activity_creation_date"=>aujourdhui()."".heure_brute(),"activity_creator"=>$_SESSION['login'],"activity_last_update_date"=>aujourdhui()."".heure_brute(),"activity_last_updater"=>$_SESSION['login'],"activity_link"=>$_POST['note_link'],"activity_number"=>$activityNumber));
                $mrequest=new requete("SELECT * FROM ".$tableData." WHERE ".$request->keyArray[$tableData]."='".$request->insert_id()."'",$cnx->num);
    
         $mcnx->num->$tableData->insert(array_shift($mrequest->recup_array_champ()));
      }
	break;
 
    case 'update_activity':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);

	  
      if ($itemType=='checklist')
	  {	  
        $request= new requete("UPDATE ".$tableData." 
		                      SET text='".$body."',color='".$color."' 
							  WHERE ".$itemIdName."=".$_REQUEST['item_id'],$cnx->num);
        $mcnx->num->$tableData->update(array($itemIdName=>$_REQUEST['item_id']),array('$set'=>array('text'=>$body,'color'=>$color)),array('multiple' => true));
	  }			
      else
      {
        $request= new requete("UPDATE ".$tableData." 
		                      SET text='".$body."',color='".$color."',activity_link= '".$_POST['note_link']."'  
							  WHERE ".$itemIdName."=".$_REQUEST['item_id'],$cnx->num);
        $mcnx->num->$tableData->update(array($itemIdName=>$_REQUEST['item_id']),array('$set'=>array('text'=>$body,'color'=>$color,'activity_link'=>$_POST['note_link'])),array('multiple' => true));
      }	  
	break; 
	
	case 'del_item':
	  $request->envoi("DELETE FROM ".$tableData." WHERE ".$itemIdName."=".$_REQUEST['item_id']);
            $mcnx->num->$tableData->remove(array($itemIdName=>$_REQUEST['item_id']));
	break;
  }	
}	