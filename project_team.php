<?php
/**
 * Project Team
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='./';
$targetFile='project_team.php?menu_lev1=team';
	  
require $pathBase.'header.php';

if (isset($_SESSION['current_project_id']))
{
  require_once $pathBase.'boards_actions/actions_stakeholders.php'; 
  
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';
 
  // Get mode
  $itemType='stakeholders';

  $masterItemType=getMasterItemType($itemType);
  $simpleItemType=getSimpleItemType($itemType);
  /* set dashboard settings */
  include $pathBase.'dashboard_settings.php';
  $columnWidth=360;

  // Get local profiles list
  $request=new requete("SELECT profile_id,profile_name 
                        FROM framework_profiles 
                        WHERE profile_type='LOCAL' 
                        ORDER BY profile_name ",$cnx->num);
  $profilesList=$request->getArrayFields();  

  for ($i=0;$i<count($profilesList);$i++)
  {
    $arrayStatusX[$profilesList[$i]['profile_id']]=$columnWidth*$i;
    $arrayStatus[$i]['colName']=$profilesList[$i]['profile_name'];
  }
  $initialStatus=getProfileIdFromTag('READ');	
    
  $displayTopButtons=true;
  $rightToAdd=in_array('MNGSTAKEHOLDER',$_SESSION['user_actions']) || in_array('MNGSTAKEHOLDER',$_SESSION['user_local_actions'])  || $_SESSION['login']==$currentProject->adminLogin;
  $allowAdd=false;
  $targetAdd='';
  $buttonAdd='';
  $buttonAddImage='';	
	
  $allowDelete=$rightToAdd;
  $allowOrder=$rightToAdd;
  $allowMove=$rightToAdd;
  $allowUpdate=false;
  $allowActionHeaderStamp=false;

  $buttonOrder=$button_reorder;
  $buttonOrderExtended=$button_reorder_flat;  
  
  $MultipleItemsArray[0]=array('parent_id'=>0,'name'=>'','header_stamp'=>'','text'=>'','color'=>'');
  $firstColumnStatic=false;
  
  include $pathBase.'boards_settings/settings_'.$itemType.'.php';

  $deleteMode='del';?>

   <div class="MessageBox TitleBox"><?php echo $msg_stakeholders_display;?></div><?php	 

  if ($rightToAdd)
  {
    $boardFinalStatusTag='';  
    $clauseOrder=' ORDER BY user_name';	
    if ($global_settings_user_name_sorting_mode=='SFN')
    { 
      $clauseOrder=' ORDER BY user_firstname';
    }
    // Get resources
    $request=new requete("SELECT user_login,user_firstname,user_name 
                          FROM framework_users,framework_status 
                          WHERE user_status_id_fk=status_id AND status_tag='ACTIVE' AND status_target_object='USR' 
                            AND user_login NOT IN (SELECT user_login_fk 
                                                   FROM kados_projects_users 
                                                   WHERE project_id_fk=".$_SESSION['current_project_id'].")".$clauseOrder,$cnx->num);
    $table_resources=$request->getArrayFields();
    // Get releases
    $request->envoi("SELECT release_id,release_name 
                     FROM kados_releases 
                     WHERE release_project_id_fk=".$_SESSION['current_project_id']);
    $releaseList=$request->getArrayFields();
    
    // Set default mode : listbox
    $userModeChoice='listbox';
    // if to many users, user search with auto-complete
    if (count($table_resources)>getParameter('NBLIST',$cnx->num))
    {
      $userModeChoice='search';
    }  ?>
    <div class="MessageBox TitleBox"><?php echo ($userModeChoice=='search' ? $msg_stakeholders_display_autocomplete : $msg_stakeholders_display_list );?></div><?php	 
    include 'stakeholder_form.php';
  }   
  // change delete picture (direct delete, no trash system)
  include $pathBase.'boards_actions/actions_items.php';
  include $pathBase.'matrix_display.php';	 

}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}
include $pathBase.'footer.php';?>