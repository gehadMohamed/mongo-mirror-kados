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
    case 'del_us':
      $request->envoi("UPDATE kados_user_stories SET active=-1 WHERE us_id=".$_REQUEST['item_id']);
      $mcnx->num->kados_user_stories->update(array('us_id'=>$_REQUEST['item_id']),array('$set'=>array('active'=>'-1')),array('multiple' => true));
    break;
	
    case 'add_us':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:
      $business_value = $businessValueDefault;
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);
      $zindex = (int)$_POST['zindex'];
      $complexity = 0;
	  
      // Get max us_number for the project
      $request= new requete("SELECT MAX(us_number) AS max FROM kados_user_stories WHERE us_project_id_fk=".$_SESSION['current_project_id'],$cnx->num);
      $request->getObject();
      $usNumber=(int)$request->objet->max+1;

      /* Compute position for US */
      // get US of the scope : product backlog or release backlog
      $clauseScope= isset($_SESSION['current_release_id']) ? '  AND us_sprint_id_fk=0 AND us_release_id_fk='.$_SESSION['current_release_id'] : ' AND us_release_id_fk=0';
      // get US y max and y min and number of in the backlog
      $request->envoi("SELECT MIN(".$yPosField.") AS ymin,MAX(".$yPosField.") AS ymax,COUNT(".$yPosField.") AS nb_us 
                       FROM kados_user_stories 
                       WHERE active=1 
                         AND us_project_id_fk=".$_SESSION['current_project_id'].$clauseScope);
      $infosUsInScope=$request->getObject();  
      if ($infosUsInScope->nb_us!=0)
      {
        $score=floor(($infosUsInScope->ymax+$itemHeight-$infosUsInScope->ymin+25*$infosUsInScope->nb_us)/$infosUsInScope->nb_us);  
        if ($score>=$itemHeight)
        {
          $yInitDefaultPosition=$infosUsInScope->ymax+$itemHeight+25;  
        }    
        else
        {
          $yInitDefaultPosition=$infosUsInScope->ymax+$itemYShift;  
          $xInitDefaultPosition=7*($infosUsInScope->nb_us+1);
        }                
      }
      
      /* Inserting a new record in the $tableData DB: */
      $request->envoi("INSERT INTO kados_user_stories (us_number,text,business_value,color,".$xPosField.",".$yPosField.",".$zPosField.",".$statusField.$otherFieldsInsertUS.",
	                         complexity,us_creation_date,us_creator,us_last_update_date,us_last_updater,us_link)
				   VALUES (".$usNumber.",'".$body."','".$business_value."','".$color."',".$xInitDefaultPosition.",".$yInitDefaultPosition.",".$zindex.",'".$initialStatus."'".$otherFieldsInsertValuesUS.",
				           ".$complexity.",'".aujourdhui()." ".heure_brute()."','".$_SESSION['login']."','".aujourdhui()." ".heure_brute()."','".$_SESSION['login']."',
						   '".$_POST['note_link']."')");	
      $mcnx->num->kados_user_stories->insert(array("us_number"=>$usNumber,"text"=>$body,"business_value"=>$business_value,"color"=>$color,"$xPosField"=>$xInitDefaultPosition,"$yPosField"=>$yInitDefaultPosition,"$zPosField"=>$zindex,$statusField.$otherFieldsInsertUS=>$initialStatus."'".$otherFieldsInsertValuesUS,"complexity"=>$complexity,"us_creation_date"=>aujourdhui()."".heure_brute(),"us_creator"=>$_SESSION['login'],"us_last_update_date"=>aujourdhui()."".heure_brute(),"us_last_updater"=>$_SESSION['login'],"us_link"=>$_POST['note_link']));
  
	break;
 
    case 'update_us':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);
	  
      $request= new requete("UPDATE kados_user_stories SET text='".$body."',color='".$color."',us_link='".$_POST['note_link']."',
                            us_last_update_date='".aujourdhui()." ".heure_brute()."',us_last_updater='".$_SESSION['login']."' 
							 WHERE us_id=".$_REQUEST['item_id'],$cnx->num);
      $mcnx->num->kados_user_stories->update(array('us_id'=>$_REQUEST['item_id']),array('$set'=>array('text'=>$body,'color'=>$color,'us_link'=>$_POST['note_link'],'us_last_update_date'=>aujourdhui()." ".heure_brute(),'us_last_updater'=>$_SESSION['login'])),array('multiple' => true));
	break; 
  }	
}