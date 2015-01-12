<?php

function make_clickable($text)
{
  return preg_replace_callback(
    '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', 
    create_function(
      '$matches',
      'return "<a href=\'{$matches[0]}\' target=\'_ext\'>{$matches[0]}</a>";'
    ),
    $text);
}


/**
 * get access right for a local profile on a project for an action tag
 *  
 * @param varchar $user       login of a user
 * @param varchar $profileTag tag of the action
 * @param int     $projectID  project id
 * @return varchar id
 */
function isActionAllowedOnProjectForUser($user,$actionTag,$projectId)  
{
  $result=false;
  
  $cnx=new connexion_db();
  $request=new requete("SELECT user_login_fk
                        FROM framework_profiles_constitution_actions t1,kados_projects_users t2
                        WHERE action_tag_fk='".$actionTag."' AND t1.profile_id_fk=t2.profile_id_fk 
						     AND user_login_fk='".$user."' AND project_id_fk=".$projectId,$cnx->num);
  $request->calc_nb_elt();
  
  if($request->nb_elt!=0)
  {
    $result=true;
  }
  return $result;
}

/**
 * get local profile on a project for an user
 *  
 * @param varchar $user       login of a user
 * @param int     $projectID  project id
 * @return varchar id
 */
function getLocalProfileOnProjectForUser($user,$projectId)  
{
  $result=0;
  
  $cnx=new connexion_db();
  $request=new requete("SELECT profile_id_fk
                        FROM kados_projects_users
                        WHERE user_login_fk='".$user."' AND project_id_fk=".$projectId,$cnx->num);
  $request->calc_nb_elt();
  
  if($request->nb_elt!=0)
  {
    $request->getObject();
    $result=$request->objet->profile_id_fk;
  }
  return $result;
}


/*******************  FUNCTION  ***********************************************
NAME: displayStatusImageButton            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function displayStatusImageButton($args)
{
  global $pathImages,$targetFile,$pathBase;
  
  $id=(int)$args[0];
  $status=$args[1];
  $allow=$args[2];
  $finalStatusTag=$args[3];
  $k=$args[4];  
  $cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
  
  $request=new requete("SELECT COUNT(task_id) AS nb,status FROM kados_tasks WHERE us_id_fk=".$id." AND active>0 GROUP BY status",$cnx->num);
  $tasksByStatus=$request->getArrayFields();
  
  switch ($status)
  {
    case 'TODO':
      if (count($tasksByStatus)==0)
      {?>
	    <img src="<?php echo $pathImages;?>/app/bulb.png" style="cursor:default;" /><?php
      }	
	  else if(count($tasksByStatus)==1 && $tasksByStatus[0]['status']==$finalStatusTag)
      {
	    if ($allow)
	    {?>
	      <a href="<?php echo $targetFile;?>&action=us_status_change&new_status=done&us_id=<?php echo $id;?>#Block<?php echo $k;?>"><img src="<?php echo $pathImages;?>/app/square_green.png" border="0" /></a><?php
	    }
	    else
	    {?>
	      <img src="<?php echo $pathImages;?>/app/square_green.png" style="cursor:default;" /><?php
	    }
	  }
	  else
	  {?>
	    <img src="<?php echo $pathImages;?>/app/under_progress.png" style="cursor:default;" /><?php
	  }
	break;
	
    case 'DONE':
	  if ($allow)
	  {?>
	    <a href="<?php echo $targetFile;?>&action=us_status_change&new_status=todo&us_id=<?php echo $id;?>#Block<?php echo $k;?>"><img src="<?php echo $pathImages;?>/app/ok.png"  border="0"  /></a><?php
	  }
	  else
	  {	?>
	    <img src="<?php echo $pathImages;?>/app/ok.png" style="cursor:default;" /><?php
	  }
	break;	
  }
}

/*******************  FUNCTION  ***********************************************
NAME: displayIssueStatusImageButton            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function displayIssueStatusImageButton($args)
{
  global $pathImages,$targetFile,$pathBase;
  
  $id=(int)$args[0];
  $status=$args[1];
  $allow=$args[2];
  $finalStatusTag=$args[3];
  $k=$args[4];

  $cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
  
  $request=new requete("SELECT COUNT(action_id) AS nb,status FROM kados_actions WHERE issue_id_fk=".$id." AND active>0 GROUP BY status",$cnx->num);
  $actionsByStatus=$request->getArrayFields();
  
  switch ($status)
  {
    case 'NEW':
      if (count($actionsByStatus)==0)
      {
  	    if ($allow)
	    {?>
	      <a href="<?php echo $targetFile;?>&action=issue_status_change&new_status=away&issue_id=<?php echo $id;?>#Block<?php echo $k;?>"><img src="<?php echo $pathImages;?>/app/bulb.png" border="0" /></a><?php
		}
		else
		{?>
		  <img src="<?php echo $pathImages;?>/app/bulb.png" style="cursor:default;" /><?php
		}  
      }	
	  else if(count($actionsByStatus)==1 && $actionsByStatus[0]['status']==$finalStatusTag)
      {
	    if ($allow)
	    {?>
	      <a href="<?php echo $targetFile;?>&action=issue_status_change&new_status=away&issue_id=<?php echo $id;?>#Block<?php echo $k;?>"><img src="<?php echo $pathImages;?>/app/square_green.png" border="0" /></a><?php
	    }
	    else
	    {?>
	      <img src="<?php echo $pathImages;?>/app/square_green.png" style="cursor:default;" /><?php
	    }
	  }
	  else
	  {?>
	    <img src="<?php echo $pathImages;?>/app/under_progress.png" style="cursor:default;" /><?php
	  }
	break;
	
    case 'AWAY':
	  if ($allow)
	  {?>
	    <a href="<?php echo $targetFile;?>&action=issue_status_change&new_status=new&issue_id=<?php echo $id;?>#Block<?php echo $k;?>"><img src="<?php echo $pathImages;?>/app/ok.png"  border="0"  /></a><?php
	  }
	  else
	  {	?>
	    <img src="<?php echo $pathImages;?>/app/ok.png" style="cursor:default;" /><?php
	  }
	break;	
  }
}


/*******************  FUNCTION  ***********************************************
NAME: displayActivitySourceImage            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function displayActivitySourceImage($args)
{
  global $pathImages,$text_lock_by_template;
  
  $id=(int)$args[0];
  $activityTemplate=$args[1];
  
  if ($activityTemplate!=0)
  {?>
	 <img src="<?php echo $pathImages;?>/app/template_lock.png" title="<?php echo $text_lock_by_template;?>" style="cursor:default;" /><?php
  }	
}



/*******************  FUNCTION  ***********************************************
NAME: displayLockedImage            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function displayLockedImage($args)
{
  global $pathImages,$text_lock_by_template;
  
  $id=(int)$args[0];
  $activityTemplate=$args[1];
  
  if ($activityTemplate==1)
  {?>
	 <img src="<?php echo $pathImages;?>/app/template_lock.png" title="<?php echo $text_lock_by_template;?>" style="cursor:default;" /><?php
  }	
}



/*******************  FUNCTION  ***********************************************
NAME: isTemplateActivity            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function isTemplateActivity($args)
{
  $id=(int)$args[0];
  $cnx_num=$args[1];
  
  $request=new requete("SELECT template_activity_id_fk FROM kados_activities WHERE activity_id=".$id,$cnx_num);
  $request->getObject();  
  return !($request->objet->template_activity_id_fk);
}

/*******************  FUNCTION  ***********************************************
NAME: isColorDefault            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function isColorDefault($default)
{
  global $pathImages;
  
  if ((int)$default==1)
  {?>
     <img src="<?php echo $pathImages;?>/app/star.png" style="cursor:default;" /><?php
  }	
}



/*******************  FUNCTION  ***********************************************
NAME: isColorUsed            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function isColorUsed($args)
{
  $id=(int)$args[0];
  $cnx_num=$args[1];

  $request=new requete("SELECT use_color_postit_type,color,color_id 
                        FROM kados_colors_uses,kados_colors 
                        WHERE color=color_name
                          AND use_color_id=".$id,$cnx_num);
  $colorUse=$request->getObject();  
  $table='';  
  if ($colorUse->use_color_postit_type=='NONE')
  {
    return 1;
  }
  switch ($colorUse->use_color_postit_type)
  {
    case 'US':
      $table='kados_user_stories';
    break;    

    case 'TASK':
      $table='kados_tasks';
    break;    

    case 'ACTIV':
      $table='kados_activities';
    break;    

    case 'ACTIO':
      $table='kados_actions';
    break;    
  }
  
  if ($table!='')
  {      
    $request->envoi("SELECT COUNT(*) AS nbItem 
                     FROM ".$table." 
                     WHERE active=1 AND color='".$colorUse->color."'");
    $request->getObject();  
    $colorIsUsedInPostit=$request->objet->nbItem;
    // check if no project uses the color
    $request->envoi("SELECT COUNT(*) AS nbItem 
                     FROM kados_projects_colors
                     WHERE project_id_fk=".$colorUse->color_id."
                       AND object_type='".$colorUse->use_color_postit_type."'");
    $request->getObject();  
    $colorIsUsedInProject=$request->objet->nbItem;    
    return (!$colorIsUsedInProject && !$colorIsUsedInPostit);
  }
  else 
  {
    return 0;
  }
 
}

/*******************  FUNCTION  ***********************************************
NAME: getProjectSetting            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function getProjectSetting($tag,$project_id,$cnx_num)
{
  $request=new requete("SELECT setting_value FROM kados_projects_settings WHERE setting_tag='".$tag."' AND project_id_fk=".$project_id,$cnx_num);
  $request->getObject();
  return $request->objet->setting_value;
}


/*******************  FUNCTION  ***********************************************
NAME: getRunningReleaseId            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function getRunningReleaseId($project_id,$cnx_num)
{
  $request=new requete("SELECT release_id FROM kados_releases 
                   WHERE release_due_date>='".aujourdhui()."' AND release_project_id_fk=".$project_id."
				   ORDER BY release_due_date ASC LIMIT 0,1",$cnx_num);
  $request->recup_array_mono();
  $runningReleaseId=0;
  if ($request->nb_elt)
  {
	$runningReleaseId=$request->array[0];
  }
  
  return $runningReleaseId;
}	

/*******************  FUNCTION  ***********************************************
NAME: getLastReleaseId            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function getLastReleaseId($project_id,$cnx_num)
{
  $request=new requete("SELECT release_id FROM kados_releases 
                   WHERE release_project_id_fk=".$project_id."
				   ORDER BY release_due_date DESC LIMIT 0,1",$cnx_num);
  $request->recup_array_mono();
  $runningLastId=0;
  if ($request->nb_elt)
  {
	$runningLastId=$request->array[0];
  }
  
  return $runningLastId;
}	

/*******************  FUNCTION  ***********************************************
NAME: getInitialStatus            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function getInitialStatus($project_id,$pathBase)
{ 
  $cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
  
  $request=new requete("SELECT column_tag_fk 
                        FROM kados_projects_columns 
                        WHERE project_id_fk=".$project_id." AND column_order=1",$cnx->num);
  $request->recup_array_mono();
  $initialStatus=0;
  if ($request->nb_elt)
  {
	$initialStatus=$request->array[0];
  }
  
  return $initialStatus;
}

/*******************  FUNCTION  ***********************************************
NAME: getFinalStatus            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function getFinalStatus($project_id,$pathBase)
{ 
  $cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
  
  $request=new requete("SELECT column_tag_fk 
                        FROM kados_projects_columns 
                        WHERE project_id_fk=".$project_id." ORDER BY column_order DESC LIMIT 0,1",$cnx->num);
  $request->recup_array_mono();
  $finalStatus=0;
  if ($request->nb_elt)
  {
	$finalStatus=$request->array[0];
  }
  
  return $finalStatus;
}

/*******************  FUNCTION  ***********************************************
NAME: getSimpleItemType            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function getSimpleItemType($itemType)
{
  $simplifyTypes['tasks_sprint']='task';
  $simplifyTypes['pbl_tasks']='task';
  $simplifyTypes['rbl_tasks']='task';
  $simplifyTypes['us_release']='us';
  $simplifyTypes['us_project']='us';
  $simplifyTypes['us_poker']='us';
  $simplifyTypes['us_review']='us';
  $simplifyTypes['us_project_workshop']='us';
  $simplifyTypes['us_release_workshop']='us';    
  $simplifyTypes['issues_impact']='issue';
  $simplifyTypes['issues_actions']='action';
  $simplifyTypes['checklist']='activity';  
  $simplifyTypes['activities']='activity';  
  $simplifyTypes['stakeholders']='stakeholder'; 
  $simplifyTypes['tasks_stakeholders']='task';   
  $simplifyTypes['us_features']='us';    
  $simplifyTypes['colors_global']='color';    
  
  $simpleItemType='';
  if (isset($simplifyTypes[$itemType]))
  {
    $simpleItemType=$simplifyTypes[$itemType];
  }

  return $simpleItemType;
}

/*******************  FUNCTION  ***********************************************
NAME: getMasterItemType            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function getMasterItemType($itemType)
{
  $simplifyTypes['tasks_sprint']='us';
  $simplifyTypes['pbl_tasks']='us';
  $simplifyTypes['rbl_tasks']='us';  
  $simplifyTypes['us_release']='us';
  $simplifyTypes['us_project']='us';
  $simplifyTypes['us_poker']='us';
  $simplifyTypes['us_review']='us';
  $simplifyTypes['us_project_workshop']='us';
  $simplifyTypes['us_release_workshop']='us';  
  $simplifyTypes['issues_impact']='issue';
  $simplifyTypes['issues_actions']='issue';
  $simplifyTypes['checklist']='activity';  
  $simplifyTypes['activities']='activity';  
  $simplifyTypes['stakeholders']='stakeholder';   
  $simplifyTypes['tasks_stakeholders']='task';   
  $simplifyTypes['us_features']='us';    
  $simplifyTypes['colors_global']='color';    
  
  $masterItemType='';
  if (isset($simplifyTypes[$itemType]))
  {
    $masterItemType=$simplifyTypes[$itemType];
  }

  return $masterItemType;
}

/*******************  FUNCTION  ***********************************************
NAME: displayImpactImage            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function displayImpactImage($impact)
{
  global $pathImages;?>
  
  <img src="<?php echo $pathImages;?>/app/impact_<?php echo $impact;?>.png" style="cursor:default;" /><?php
}

/*******************  FUNCTION  ***********************************************
NAME: displayProbability            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function displayProbability($probability)
{
  global $pathImages;
  if ($probability==100)
  {?>
    <img src="<?php echo $pathImages;?>/app/problem14.png" style="cursor:default;" /><?php
  }	
  else
  {
    echo $probability.'%';
  }
}


/*******************  FUNCTION  ***********************************************
NAME: countWorkingDaysBetweenTwoDates            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function countWorkingDaysBetweenTwoDates($date1,$date2,$workingDays=array(0,1,2,3,4),$excludeDays=array())
{
  $dateStart=new DateTime($date1);
  $dateEnd=new DateTime($date2);
  $count=0;
  
  while ($dateStart<$dateEnd)
  {
    // check current day is a working day
    if (in_array(fmod(dayOfWeek($dateStart->format('Y-m-d'))+6,7),$workingDays))
	{
	  // check if current day is not excluded
	  if (!in_array($dateStart->format('Y-m-d'),$excludeDays))
	  {
	    $count++;
	  }
	}
    $dateStart->add(new DateInterval('P1D'));
  }
  return $count;
}


/*******************  FUNCTION  ***********************************************
NAME: displayIssueStatusImageButton            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function displayTaskInitLoad($args)
{
  global $pathImages,$targetFile,$pathBase;
  
  $id=(int)$args[0];
  $taskLoad=$args[1];
  $allow=$args[2];
  $finalStatusTag=$args[3];
  $k=$args[4];
  $cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
  
  $request=new requete("SELECT task_init_load FROM kados_tasks WHERE task_id=".$id,$cnx->num);
  $task=$request->getObject();
  
  if ($task->task_init_load!=$taskLoad)
  {
    echo $taskLoad.'(<i>'.$task->task_init_load.'</i>)';
  }
  else
  {
    echo $taskLoad;
  }
}

/*******************  FUNCTION  ***********************************************
NAME: getUsDetailedStatus            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function getUsDetailedStatus($us_id,$status,$finalStatusTag)
{
  global $pathBase;
  
  $cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
  
  $request=new requete("SELECT COUNT(task_id) AS nb,status FROM kados_tasks WHERE us_id_fk=".$us_id." AND active>0 GROUP BY status",$cnx->num);
  $tasksByStatus=$request->getArrayFields();
  
  switch ($status)
  {
    case 'TODO':
      if (count($tasksByStatus)==0)
      {
	    return 'TODO';
      }	
	  else if(count($tasksByStatus)==1 && $tasksByStatus[0]['status']==$finalStatusTag)
      {
	    return 'DEV';
	  }
	  else
	  {
	    return 'RUN';
	  }
	break;
	
    case 'DONE':
	  return 'DONE';
	break;	
  }
}

function userIsAllowedOnProject($projectId,$userLogin)
{
  global $pathBase;    
  
  $allow=true;
  $cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
  $request=new requete("SELECT project_visibility FROM kados_projects WHERE project_id=".$projectId,$cnx->num);
  $projectData=$request->getObject();
  if ($projectData->project_visibility=='PRI')
  {
    $request->envoi("SELECT user_login_fk FROM kados_projects_users WHERE project_id_fk=".$projectId);
    $request->recup_array_mono();
    if (!in_array($userLogin,$request->array))
    {
      $allow=false;
    }
  }
  
  return $allow;    
}


/*******************  FUNCTION  ***********************************************
NAME: getImageFromUsDetailedStatus            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function getImageFromUsDetailedStatus($status)
{
  switch ($status)
  {
    case 'TODO':
      return 'app/bulb.png';
    break;

    case 'RUN':
      return 'app/under_progress.png';
    break;

    case 'DEV':
      return 'app/square_green.png';
    break; 

    case 'DONE':
      return 'app/ok.png';
    break;	
  }
}

function formatStringForDB($text)
{
  global $cnx;  
  // 
  if(ini_get('magic_quotes_gpc'))
  {  
    return mysqli_escape_string($cnx->num,strip_tags(stripslashes($text)));
  }
  else 
  {
    return mysqli_escape_string($cnx->num,strip_tags($text));
  }
}


function changeDoubleQuote($text)
{
  return str_replace('"','&quot;' ,$text);
}
?>