<?php
/**
 * Main page to manage risks in a dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

$pathBase='./';
$targetFile='project_issues_progress.php?menu_lev2=prj_issues_progress';
	  
include $pathBase.'header.php';

if (isset($_SESSION['current_project_id']))
{
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';
    
  if (!isset($_REQUEST['object_id'])) 
  {
    $_REQUEST['object_id']=0;
  }

  $itemType='issues_actions'; 
  $masterItemType=getMasterItemType($itemType);
  $simpleItemType=getSimpleItemType($itemType);
  /* Dashboard settings */
  include $pathBase.'dashboard_settings.php';

// Select list of columns					 
/*$request->envoi("SELECT column_tag,column_name,column_usage,column_meaning 
	             FROM kados_template_columns,kados_projects_columns
				 WHERE column_tag=column_tag_fk AND project_id_fk=".$_SESSION['current_project_id']."
				 ORDER BY column_order");				   
$request->getArrayFields();	
// Allocate columns
for ($i=0;$i<$request->nb_elt;$i++)
{	 
  $arrayStatusX[$request->array[$i]['column_tag']]=$columnWidth*$i;
  $arrayStatus[]['colName']=$request->array[$i]['column_name'];  
}*/

  $arrayStatusX['TODO']=$columnWidth*0;
  $arrayStatusX['PROG']=$columnWidth*1;
  $arrayStatusX['DONE']=$columnWidth*2;
  $arrayStatus[]['colName']=$text_action_todo;
  $arrayStatus[]['colName']=$text_action_in_progress;
  $arrayStatus[]['colName']=$text_action_done;  

$initialStatus='TODO';
$actionFinalStatusTag='DONE';  
  
/* Buttons settings */
$displayTopButtons=false;
$allowAdd=in_array('ADDACTION',$_SESSION['user_actions']) || in_array('ADDACTION',$_SESSION['user_local_actions']);
$buttonAdd=$button_add_action;
$buttonAddImage='app/new_action.png';

$allowDelete=in_array('DELACTION',$_SESSION['user_actions']) || in_array('DELACTION',$_SESSION['user_local_actions']);
$allowOrder=in_array('ORDACTION',$_SESSION['user_actions']) || in_array('ORDACTION',$_SESSION['user_local_actions']);
$allowUpdate=in_array('UPDACTION',$_SESSION['user_actions']) || in_array('UPDACTION',$_SESSION['user_local_actions']);
$allowMove=in_array('MOVE_ACTION',$_SESSION['user_actions']) || in_array('MOVE_ACTION',$_SESSION['user_local_actions']);

$allowActionHeaderStamp=true;

$buttonAdd=$button_add_action;
$buttonOrder=$button_reorder;
$buttonOrderExtended=$button_reorder_flat;

$otherFieldsInsert=',issue_id_fk';
$otherFieldsInsertValues=','.$_REQUEST['object_id'];

$firstColumnStatic=true;
$firstColumnDisplayParentZone=true;
$firstColumnDisplayWarningZone=true;
$firstColumnObjectTag='I';
$firstColumnTitle=$text_issues;
$firstColumnFunctionForHeaderStamp='displayIssueStatusImageButton';
$firstColumnFunctionForBottomLeft='displayImpactImage';
$firstColumnFunctionForBottomRight='displayProbability';
	
include $pathBase.'boards_settings/settings_'.$itemType.'.php';
include $pathBase.'boards_actions/actions_items.php';
include $pathBase.'boards_actions/actions_actions.php';
  
if (!isset($_SESSION['issue_deck_content']))
{
  $_SESSION['issue_deck_content']=array();
  $_SESSION['issue_deck_content'][0]=0;
  // Get the deck storage of the user
  $request->envoi("SELECT item_id_fk FROM kados_users_decks WHERE user_login_fk='".$_SESSION['login']."' AND item_type='issue'");
  $deckList=array();
  $deckList=$request->recup_array_mono();
  $_SESSION['issue_deck_content']=array_merge($_SESSION['issue_deck_content'],$deckList);
}
if (isset($_REQUEST['add_to_deck']))
{
  if (!array_search((int)$_REQUEST['add_to_deck'],$_SESSION['issue_deck_content']))
  {
    array_push($_SESSION['issue_deck_content'],(int)$_REQUEST['add_to_deck']);
	// Add US to the deck storage of the user
	$request->envoi("INSERT INTO kados_users_decks 
	                 (user_login_fk,item_id_fk,item_type)
					 VALUES ('".$_SESSION['login']."',".($_REQUEST['add_to_deck']).",'issue')");
        $mcnx->num->kados_users_decks->insert(array("user_login_fk"=>$_SESSION['login'],"item_id_fk"=>($_REQUEST['add_to_deck']),'item_type'=>"issue"));
  }	
}
if (isset($_REQUEST['remove_from_deck']))
{
  $pos=array_search((int)$_REQUEST['remove_from_deck'],$_SESSION['issue_deck_content']);
  if ($pos>0)
  {
    unset($_SESSION['issue_deck_content'][$pos]);
	// Delete US in the deck storage of the user 
	$request->envoi("DELETE FROM kados_users_decks 
	                 WHERE user_login_fk='".$_SESSION['login']."' AND item_type='issue' AND item_id_fk=".$_REQUEST['remove_from_deck']);
        $mcnx->num->kados_users_decks->remove(array('user_login_fk'=>$_SESSION['login'],'item_type'=>'issue','item_id_fk'=>$_REQUEST['remove_from_deck']));
  }	
}

// 
$clauseWhereIssueFilter='';
if (isset($_SESSION['filter_issue']))
{
  $clauseWhereIssueFilter=" AND kados_issues.color='".$_SESSION['filter_issue']."'";
}

  // Get colors of the displayed issues
  $exclusiveIssueColorsListRequest="SELECT color
                        FROM kados_issues WHERE active=1 AND issue_project_id_fk=".$_SESSION['current_project_id']." 
						AND issue_id NOT IN (".implode(',',$_SESSION['issue_deck_content']).") 
						AND status!='AWAY' 
						GROUP BY color ";
						
 // Protection against : if UScolor selected is not in the board (when drilling-down or up)
 if (isset($_SESSION['filter_issue']))
 {
   $request->envoi($exclusiveIssueColorsListRequest);						
   $request->recup_array_mono();
   if (!in_array($_SESSION['filter_issue'],$request->array))
   {
     unset($_SESSION['filter_issue']);
     $clauseWhereIssueFilter='';
   }	 
 }
 
 // Set filter on colors for tasks items : colors of displayed tasks postits
 $exclusiveActionColorsListRequest="SELECT kados_actions.color 
                        FROM kados_actions,kados_issues 
						WHERE kados_actions.active=1 AND issue_id_fk=issue_id						  
						  AND issue_project_id_fk=".$_SESSION['current_project_id']." AND status!='AWAY' 
						AND issue_id NOT IN (".implode(',',$_SESSION['issue_deck_content']).")  
						GROUP BY kados_actions.color ";

// Get US of the sprint in deck
$request=new requete("SELECT issue_id AS parent_id,issue_number AS display_number,text,status AS header_stamp,color,impact AS infoBottomLeft,
                             probability AS infoBottomRight 
                      FROM kados_issues 
					  WHERE active=1 AND issue_project_id_fk=".$_SESSION['current_project_id']." AND status!='AWAY' 
					   AND issue_id IN (".implode(',',$_SESSION['issue_deck_content']).") ".$clauseWhereIssueFilter." 
					  ORDER BY zpos ASC",$cnx->num);
$deckItemsArray=$request->getArrayFields();

// Get US of the sprint
$request=new requete("SELECT issue_id AS parent_id,issue_number AS display_number,text,status AS header_stamp,color,impact AS infoBottomLeft,
                             probability AS infoBottomRight 
                      FROM kados_issues 
					  WHERE active=1 AND issue_project_id_fk=".$_SESSION['current_project_id']." AND status!='AWAY' 
					    AND issue_id NOT IN (".implode(',',$_SESSION['issue_deck_content']).") ".$clauseWhereIssueFilter." 
					  ORDER BY zpos ASC",$cnx->num);
$MultipleItemsArray=$request->getArrayFields();

// If deck is not empty and board is empty, get an item out of the deck
if (count($deckItemsArray)!=0 && count($MultipleItemsArray)==0)
{
  // si aucune US dans le board, mais il y en a dans le deck, on en sort un du deck
  $deckOut=array_pop($_SESSION['issue_deck_content']);
  // Delete the US from the deck storage for the user
  $request->envoi("DELETE FROM kados_users_decks 
	               WHERE user_login_fk='".$_SESSION['login']."' AND item_id_fk=".$deckOut);
  $mcnx->num->kados_users_decks->remove(array('user_login_fk'=>$_SESSION['login'],'item_id_fk'=>$deckOut));
  $request=new requete("SELECT issue_id AS parent_id,issue_number AS display_number,text,status AS header_stamp,color,impact AS infoBottomLeft,
                             probability AS infoBottomRight
                        FROM kados_issues WHERE active=1 AND issue_project_id_fk=".$_SESSION['current_project_id']." AND status!='AWAY' 
						AND issue_id IN (".implode(',',$_SESSION['issue_deck_content']).") 
						".$clauseWhereIssueFilter." ORDER BY zpos ASC",$cnx->num);
  $deckItemsArray=$request->getArrayFields();
  
  $request=new requete("SELECT issue_id AS parent_id,issue_number AS display_number,text,status AS header_stamp,color,impact AS infoBottomLeft,
                             probability AS infoBottomRight
                        FROM kados_issues WHERE active=1 AND issue_project_id_fk=".$_SESSION['current_project_id']." AND status!='AWAY' 
						AND issue_id NOT IN (".implode(',',$_SESSION['issue_deck_content']).") ".$clauseWhereIssueFilter." ORDER BY zpos ASC",$cnx->num);
  $MultipleItemsArray=$request->getArrayFields();
}
  
// Display the deck
include $pathBase.'deck_display.php';
// get project stakeholders
$displayNoUser=true;
$stakeholdersProjects=$currentProject->getStakeholdersAllowedToMoveTasksUsernames();
$projectUsers=$currentProject->getStakeholders();

// If there are at least one user story
if (count($MultipleItemsArray)!=0)
{
  $displayIssueFilter=true;
  $displayActionFilter=true;
  include $pathBase.'matrix_display.php';
}
else
{
  // else, display an empty sprint backlog
  include $pathBase.'boards_settings/settings_'.$itemType.'.php';
  unset($arrayStatusX);
  unset($arrayStatus);
  $arrayStatusX['INIT']=$columnWidth*0;
  $arrayStatus[]['colName']='Issues';
  $dashboardHeight=$usBlockMinHeight;
  $displayDashBoardTitles=true;
  $dashboardWidth=($columnWidth)*count($arrayStatus)+1;
  $clauseWhereElementsGetAllStd=$clauseWhereElementsGetAll." AND issue_id_fk=0";
  $parentId=0;
  include $pathBase.'dashboard_display.php';
}

}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}
include $pathBase.'footer.php';?>