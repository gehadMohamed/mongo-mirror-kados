<?php
/**
 * Display at the top of some board the stakeholders filter
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
 
if ($simpleItemType=='task' && $showFilterStakeHolders)
{
  $request=new requete("(SELECT user_login,CONCAT(user_firstname,' ',user_name) AS stakeholder
	                 FROM framework_users,kados_projects_users prju,framework_profiles_constitution_actions prf 
			 WHERE user_login=user_login_fk AND prju.profile_id_fk=prf.profile_id_fk 
			   AND project_id_fk=".$_SESSION['current_project_id']."
			   AND action_tag_fk='MOVE_TASK'
			 ORDER BY user_name)
			 UNION
			 (SELECT user_login,CONCAT(user_firstname,' ',user_name) AS stakeholder 
			  FROM framework_users,kados_tasks,kados_user_stories
                          WHERE task_leader=user_login AND us_id_fk=us_id 
			    AND us_project_id_fk=".$_SESSION['current_project_id'].")",$cnx->num);	  
  $stakeholdersList=$request->getArrayFields();

  if (isset($_SESSION['stakeholder_filter']))
  {
    $clauseWhereElements.=" AND task_leader='".$_SESSION['stakeholder_filter']."'";
    $clauseWhereElementsGetAll.=" AND task_leader='".$_SESSION['stakeholder_filter']."'";
  } ?>  

<div class="stakeholderBlockFilter" <?php if (isset($_SESSION['stakeholder_filter'])) { echo ' id="actif"';}?>> 
 <form name="stakeholder_filter_form" id="stakeholder_filter_form" method="post" action="<?php echo $targetFile;?>&action=filter_stakeholder" enctype="multipart/form-data">   
  <select name="filter_stakeholder" style="font-size:8pt;"  onChange="javascript:document.stakeholder_filter_form.submit();">
      <option></option><?php
   for ($i=0;$i<count($stakeholdersList);$i++)
   {?>
      <option style="font-size:8pt;" value="<?php echo $stakeholdersList[$i]['user_login'];?>" <?php if (isset($_SESSION['stakeholder_filter'])) { if ($_SESSION['stakeholder_filter']==$stakeholdersList[$i]['user_login']){ echo 'selected="selected"';}};?>><?php echo $stakeholdersList[$i]['stakeholder'];?></option><?php
   }?>
  </select>
 </form>    
</div>    
<?php
}?>