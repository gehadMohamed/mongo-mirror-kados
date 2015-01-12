<?php
/**
 * Page to allocate a business value to US
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectManagement:US
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='./';
$targetFile='project_us_roadmap.php?menu_lev2=us_roadmap';
$displayTable=true;
	  
include $pathBase.'header.php';

if (isset($_SESSION['current_project_id']))
{
  if (!isset($_SESSION['filter_sprint_us_roadmap']))
  {
    $_SESSION['filter_sprint_us_roadmap']=0;
  }
  
  if (!isset($_SESSION['filter_us_roadmap']))
  {
    $_SESSION['filter_us_roadmap']='off';
  }

  $itemWidth=75;
  $itemWidthBodyMargin=4;
  $itemHeight=50;
  $itemHeightBodyMargin=40;
  $taskFinalStatusTag=getFinalStatus($_SESSION['current_project_id'],$pathBase);

  /* special railway */
  $railway=new railway($pathImages.$imgRailway);

  // Get project data & count US in the project
  $projectData=new project($pathBase,$_SESSION['current_project_id']);
  $projectData->getData();
  
  $railway->add($projectData->name.=' ('.$projectData->getUsCount().' US)');  
  
  /* Actions */
  switch ($_REQUEST['action'])
  {
    case 'record_sprint_situation':
      include_once $pathBase.'progress_log.php';
    break;
	
	case 'del_filter':
	  $_SESSION['filter_sprint_us_roadmap']=0;
        break;
    
	case 'del_filter_us':    
          $_SESSION['filter_us_roadmap']='off';      
	break;
	
	case 'add_filter':
          $_SESSION['filter_sprint_us_roadmap']=$_REQUEST['sprint2filter'];
        break;
  
        case 'filter_us':
            $_SESSION['filter_us_roadmap']='on';    
	break;
  }  
  
  // If there is no current release, set current release as the running release, else set the last release as current  
  if (!isset($_SESSION['current_release_id']))
  {
     $_SESSION['current_release_id']=getRunningReleaseId($_SESSION['current_project_id'],$cnx->num);
	 if ($_SESSION['current_release_id']==0)
	 {
	   $_SESSION['current_release_id']=getLastReleaseId($_SESSION['current_project_id'],$cnx->num);
	   if ($_SESSION['current_release_id']==0)
	   {
	     unset($_SESSION['current_release_id']);
	   }
	 }
  }
 
  if (isset($_SESSION['current_release_id']))
  {
    // Get release data & count US in the release
    $request=new requete("SELECT * FROM kados_releases WHERE release_id=".$_SESSION['current_release_id'],$cnx->num);
    $releaseData=$request->getObject();
    $request->envoi("SELECT COUNT(*) AS nb_us FROM kados_user_stories WHERE us_release_id_fk=".$_SESSION['current_release_id']." AND active=1");
    $request->getObject();
     $releaseData->release_name.=' ('.$request->objet->nb_us.' US)';
    $railway->add($releaseData->release_name);  
  }
  
  $railway->display();
  
  // Choice of release
  $railway2=new railway($pathImages.'app/hand-point.png');
  $request->envoi("SELECT * FROM kados_releases WHERE visibility=1 AND release_project_id_fk=".$_SESSION['current_project_id']." ORDER BY release_due_date");
  $resultsArray=$request->getArrayFields();
  for ($i=0;$i<$request->nb_elt;$i++)
  {	
	$railway2->add($resultsArray[$i]['release_name'],$targetFile.'&release_id='.$resultsArray[$i]['release_id']);  
  }
  $railway2->display('railway_release');
  // end railway
  
  $itemType='us_review';
  $simpleItemType=getSimpleItemType($itemType);

  $filterLevelTable='kados_releases,';
  $filterLevelClause='release_id AND release_project_id_fk='.$_SESSION['current_project_id'];	
  if (isset($_SESSION['current_release_id']))
  {
    $filterLevelTable='';
    $filterLevelClause=$_SESSION['current_release_id'];
  }

  $filterSprint='';	
  if ($_SESSION['filter_sprint_us_roadmap']!=0)
  {
    $filterSprint=' AND bl.us_id_fk IN(SELECT us_id_fk FROM kados_baselines WHERE us_sprint_id_fk='.$_SESSION['filter_sprint_us_roadmap'].')';
  }  
  // Get lost of US
  $request->envoi("SELECT bl.us_id_fk,text,color,bl.us_number,active,bl.us_release_id_fk,bl.us_sprint_id_fk       
                   FROM ".$filterLevelTable."kados_sprints,kados_baselines bl 
				   LEFT JOIN kados_user_stories tb_us ON us_id_fk=us_id 
	  			   WHERE bl.us_release_id_fk=".$filterLevelClause."
				     AND kados_sprints.sprint_id=bl.us_sprint_id_fk ".$filterSprint."
                  		   GROUP BY bl.us_id_fk
				   ORDER BY sprint_start_date,baseline_date");	
  $usList=$request->getArrayFields();	
  // Get situation of US : in which release ?
  $request->envoi("SELECT us_release_id_fk,us_id,us_sprint_id_fk FROM kados_user_stories WHERE us_id IN 
                   (SELECT bl.us_id_fk FROM ".$filterLevelTable."kados_sprints,kados_baselines bl 
				   LEFT JOIN kados_user_stories tb_us ON us_id_fk=us_id 
	  			   WHERE bl.us_release_id_fk=".$filterLevelClause."
				     AND kados_sprints.sprint_id=bl.us_sprint_id_fk 
				   GROUP BY bl.us_id_fk)");	
  $request->getArrayFields();					   
  $usListRealSituation=array();
  for ($i=0;$i<$request->nb_elt;$i++)
  {
    $usListRealSituation[$request->array[$i]['us_id']]['release']=$request->array[$i]['us_release_id_fk'];
    $usListRealSituation[$request->array[$i]['us_id']]['sprint']=$request->array[$i]['us_sprint_id_fk'];
  }
  
  // Get data on US					   
  $request->envoi("SELECT baseline_date, us_id_fk, bl.us_release_id_fk,bl.us_number, bl.us_sprint_id_fk,text,  
                          bl.us_business_value, bl.us_complexity, bl.us_status, color,active, us_date_finished  
                   FROM ".$filterLevelTable."kados_baselines bl LEFT JOIN kados_sprints ON us_sprint_id_fk=sprint_id 
				   LEFT JOIN kados_user_stories tb_us ON us_id_fk=us_id
		   WHERE bl.us_release_id_fk=".$filterLevelClause." ".$filterSprint."
		   ORDER BY sprint_start_date,baseline_date");
  $request->getArrayFields();					   
  $usData=array();
  $usedSprints=array();
  
  for ($i=0;$i<$request->nb_elt;$i++)
  {
    $usData[$request->array[$i]['us_id_fk']][$request->array[$i]['us_sprint_id_fk']][]=$request->array[$i];
    $usedSprints[$i]=$request->array[$i]['us_sprint_id_fk'];
  }
  // Count baselines for each US
  $request->envoi("SELECT COUNT(baseline_date) AS nb_bl, us_id_fk, baseline_date  
                   FROM ".$filterLevelTable."kados_baselines bl LEFT JOIN kados_sprints ON us_sprint_id_fk=sprint_id 
				   LEFT JOIN kados_user_stories tb_us ON us_id_fk=us_id
		   WHERE bl.us_release_id_fk=".$filterLevelClause."
		   GROUP BY us_id_fk");
  $request->getArrayFields();					   
  $usBaselineCount=array();
  for ($i=0;$i<$request->nb_elt;$i++)
  {
    $usBaselineCount[$request->array[$i]['us_id_fk']]=$request->array[$i];
  }	  
	  
  // get Tasks situation
  $request->envoi("SELECT COUNT(task_id) AS nb_task,tsk.color,tsk.status,us_id_fk, use_color_meaning  
                   FROM ".$filterLevelTable."kados_tasks tsk,kados_user_stories, kados_colors_uses colors
		   WHERE us_id_fk=us_id AND us_release_id_fk=".$filterLevelClause."
		     AND tsk.color=colors.color AND tsk.active=1 AND use_color_postit_type='TASK' 
		   GROUP BY us_id_fk,tsk.color,tsk.status");
  $request->getArrayFields();
  $usTasks=array();
  for ($i=0;$i<$request->nb_elt;$i++)
  {
    $usTasks[$request->array[$i]['us_id_fk']][$request->array[$i]['color']]['meaning']=$request->array[$i]['use_color_meaning'];	  
    if ($request->array[$i]['status']==$taskFinalStatusTag)
    {
      if (isset($usTasks[$request->array[$i]['us_id_fk']][$request->array[$i]['color']]['DONE']))
      {
        $usTasks[$request->array[$i]['us_id_fk']][$request->array[$i]['color']]['DONE']+=$request->array[$i]['nb_task'];
      }	
      else
      {
        $usTasks[$request->array[$i]['us_id_fk']][$request->array[$i]['color']]['DONE']=$request->array[$i]['nb_task'];
      }			  
    }
    else
    {
      if (isset($usTasks[$request->array[$i]['us_id_fk']][$request->array[$i]['color']]['UNDONE']))
      {
        $usTasks[$request->array[$i]['us_id_fk']][$request->array[$i]['color']]['UNDONE']+=$request->array[$i]['nb_task'];
      }	
      else
      {
        $usTasks[$request->array[$i]['us_id_fk']][$request->array[$i]['color']]['UNDONE']=$request->array[$i]['nb_task'];
      }			  
    }
  }	  	  
	  
  if (count($usedSprints)!=0)
  {
    $filterLevelClause.=' AND sprint_id IN('.implode(',',$usedSprints).')';
  }
  // Get sprints data
  $request->envoi("SELECT * FROM ".$filterLevelTable."kados_sprints WHERE sprint_release_id_fk=".$filterLevelClause.' ORDER BY sprint_start_date');
  $sprintsList=$request->getArrayFields();

  // List of recorded status
  $detailStatusList['TODO']='app/bulb.png';
  $detailStatusList['DEV']='app/square_green.png';
  $detailStatusList['RUN']='app/under_progress.png';
  $detailStatusList['DONE']='app/ok.png';?>
	  
  <div class="MessageBox TitleBox"><?php echo $msg_us_roadmap_explainations;?></div><?php
	  
  displayButton($button_record_us_situation,$pathImages.'photo.png',$targetFile.'&action=record_sprint_situation','');	  

  // Get complexity and business value
  for ($k=0;$k<count($sprintsList);$k++)
  {
    $complexityBySprint[$sprintsList[$k]['sprint_id']]=0;
    $businessValueBySprint[$sprintsList[$k]['sprint_id']]=0;
    $usCountBySprint[$sprintsList[$k]['sprint_id']]=0;
    $complexityDeliveredbySprint[$sprintsList[$k]['sprint_id']]=0;
    $businessValueDeliveredBySprint[$sprintsList[$k]['sprint_id']]=0;
    $usDeliveredBySprint[$sprintsList[$k]['sprint_id']]=0;
    $usReadyToCheck[$sprintsList[$k]['sprint_id']]=0;
            
    $usCountAllBySprint[$sprintsList[$k]['sprint_id']]=0;
  }
  for ($i=0;$i<count($usList);$i++)
  {
    for ($k=0;$k<count($sprintsList);$k++)
    {
      if (isset($usData[$usList[$i]['us_id_fk']][$sprintsList[$k]['sprint_id']]))
      {
	$nbChange=count($usData[$usList[$i]['us_id_fk']][$sprintsList[$k]['sprint_id']])-1;
	$log=$usData[$usList[$i]['us_id_fk']][$sprintsList[$k]['sprint_id']][$nbChange];
        
        if (isset($usListRealSituation[$usList[$i]['us_id_fk']]))
        {            
          $isUsActiveAndInRelease= $usListRealSituation[$usList[$i]['us_id_fk']]['sprint']==$sprintsList[$k]['sprint_id'] && $log['active']==1 && $log['us_sprint_id_fk']==$sprintsList[$k]['sprint_id'];
        }
        else
        {
          $isUsActiveAndInRelease= $log['active']==1 && $log['us_sprint_id_fk']==$sprintsList[$k]['sprint_id'];    
        }
        $isUsAlmostDone=$log['us_status']=='DEV';        
        $isUsDone=$log['us_status']=='DONE';
        $usCountAllBySprint[$sprintsList[$k]['sprint_id']]++;

        $complexityBySprint[$sprintsList[$k]['sprint_id']]+= $isUsActiveAndInRelease ? $log['us_complexity'] : 0;
	$businessValueBySprint[$sprintsList[$k]['sprint_id']]+= $isUsActiveAndInRelease ?  $log['us_business_value'] :0;
        $usCountBySprint[$sprintsList[$k]['sprint_id']]+= $isUsActiveAndInRelease ? 1 : 0;        
	$complexityDeliveredbySprint[$sprintsList[$k]['sprint_id']]+= $isUsActiveAndInRelease && $isUsDone ? $log['us_complexity'] : 0;
	$businessValueDeliveredBySprint[$sprintsList[$k]['sprint_id']]+= $isUsActiveAndInRelease && $isUsDone ?  $log['us_business_value'] :0;
        $usReadyToCheck[$sprintsList[$k]['sprint_id']]+= $isUsActiveAndInRelease && $isUsAlmostDone ? 1 : 0;        
	$usDeliveredBySprint[$sprintsList[$k]['sprint_id']]+= $isUsActiveAndInRelease && $isUsDone ? 1 : 0;        
      }			   
    }	  
  }	
	  
  // List of US roadmaps?>
  <div class="clearleft"></div>
   <table class="SimpleData lines">
       <tr> 
	 <th colspan="2"><?php echo $text_user_story; 
            if ($_SESSION['filter_us_roadmap']=='on')
	    {?>
	      <a href="<?php echo $targetFile;?>&action=del_filter_us"><img src="<?php echo $pathImages;?>app/del_filter.png" border="0" /></a> <?php
	    }
            else
	    {?>
	      <a href="<?php echo $targetFile;?>&action=filter_us"><img src="<?php echo $pathImages;?>app/add_filter.png" border="0" /></a> <?php
	    }  ?>
         </th><?php
	     for ($i=0;$i<count($sprintsList);$i++)
	     {?>		 
		  <th><?php
		    if ($_SESSION['filter_sprint_us_roadmap']==$sprintsList[$i]['sprint_id'])
			{?>
		      <a href="<?php echo $targetFile;?>&action=del_filter"><img src="<?php echo $pathImages;?>app/del_filter.png" border="0" /></a> <?php
			}
            else
			{?>
		      <a href="<?php echo $targetFile;?>&action=add_filter&sprint2filter=<?php echo $sprintsList[$i]['sprint_id'];?>"><img src="<?php echo $pathImages;?>app/add_filter.png" border="0" /></a> <?php
			}	
			echo $sprintsList[$i]['sprint_name'];?>
		  </th><?php
         } ?>
		<th rowspan="4"><center><?php echo $text_tasks;?></center></th>
       </tr>
	   <!-- COMPLEXITE -->
       <tr> 
	 <th colspan="2"><?php echo $text_bv_delivered.'/'.$text_bv_total; ?></th><?php
	  for ($i=0;$i<count($sprintsList);$i++)
	  {?>		 
	    <th><?php
	     echo (isset($businessValueDeliveredBySprint[$sprintsList[$i]['sprint_id']]) ? $businessValueDeliveredBySprint[$sprintsList[$i]['sprint_id']] : 0);
	     echo '/';
	     echo (isset($businessValueBySprint[$sprintsList[$i]['sprint_id']]) ? $businessValueBySprint[$sprintsList[$i]['sprint_id']] : 0);?>
	    </th><?php
           } ?>
       </tr>
	   <!-- BUSINESS VALUE -->
       <tr> 
	 <th colspan="2"><?php echo $text_cp_delivered.'/'.$text_cp_total; ?></th><?php
	     for ($i=0;$i<count($sprintsList);$i++)
	     {?>		 
		  <th><?php
		     echo (isset($complexityDeliveredbySprint[$sprintsList[$i]['sprint_id']]) ? $complexityDeliveredbySprint[$sprintsList[$i]['sprint_id']] : 0);
		     echo '/';
			 echo (isset($complexityBySprint[$sprintsList[$i]['sprint_id']]) ? $complexityBySprint[$sprintsList[$i]['sprint_id']] : 0);?>
		  </th><?php		 
         } ?>
       </tr> 
	   <!-- Count US -->
       <tr> 
	 <th colspan="2"><?php echo $text_us_count_delivered.' ('.$text_us_count_ready2check.')/'.$text_us_count_planned.'/'.$text_us_count_all; ?></th><?php
	  for ($i=0;$i<count($sprintsList);$i++)
	  {?>		 
	    <th><?php
	     echo (isset($usDeliveredBySprint[$sprintsList[$i]['sprint_id']]) ? $usDeliveredBySprint[$sprintsList[$i]['sprint_id']] : 0);
             echo '<i>('.(isset($usReadyToCheck[$sprintsList[$i]['sprint_id']]) ? $usReadyToCheck[$sprintsList[$i]['sprint_id']] : 0).')</i>';
	     echo '/';
	     echo (isset($usCountBySprint[$sprintsList[$i]['sprint_id']]) ? $usCountBySprint[$sprintsList[$i]['sprint_id']] : 0);
             echo '/';
             echo (isset($usCountAllBySprint[$sprintsList[$i]['sprint_id']]) ? $usCountAllBySprint[$sprintsList[$i]['sprint_id']] : 0);?>
	    </th><?php
           } ?>
       </tr>
           
           <?php
       // data from baselines
       $cpt=0;
       for ($i=0;$i<count($usList);$i++)
       {
         // analyse US  
         $usSituation='std';
         if ($usList[$i]['color']=='') 
	 {
           $usSituation='dead';
	 } 
	 else
	 {
  	   if ($usList[$i]['active']==-1)
	   { 
             $usSituation='trash';
	   }
	   else if ($usListRealSituation[$usList[$i]['us_id_fk']]['release']!=$usList[$i]['us_release_id_fk'])
	   {
             $usSituation='ghost';
  	   }
	   else if ($usListRealSituation[$usList[$i]['us_id_fk']]['sprint']==0)
	   {
             $usSituation='sleep';
	   }				  
	 }
         if ($usSituation=='std' || $_SESSION['filter_us_roadmap']=='off')
         {?>		 
           <tr <?php  if (fmod($cpt++,2)==1) { echo 'class="alt"'; }?>>
	      <td nowrap="nowrap" width="90"><div class="colorDisplay <?php echo $usList[$i]['color']; ?>" style="float:left;margin-right:8px;" > </div> <?php 
                echo ($usSituation=='std' ? '<b>US'.$usList[$i]['us_number'].'</b>' : 'US'.$usList[$i]['us_number']); 
                switch ($usSituation)
                {
                  case 'dead':?> 
                    <img src="<?php echo $pathImages;?>flag_red.gif" /><?php
                  break;

                  case 'trash':?> 
		            <img src="<?php echo $pathImages;?>warning.gif" /><?php
                  break;

                  case 'ghost':?> 
                    <img src="<?php echo $pathImages;?>app/ghost.png" /><?php
                  break;

                  case 'sleep':?> 
                    <img src="<?php echo $pathImages;?>app/sleep.png" /><?php
                  break;
                }
                if ($usSituation=='std' && $usBaselineCount[$usList[$i]['us_id_fk']]['nb_bl']==1 && $usBaselineCount[$usList[$i]['us_id_fk']]['baseline_date']==aujourdhui())
	        { ?> 
		       <img src="<?php echo $pathImages;?>new.png" /><?php
	        }   ?>
	    </td>
	    <td><?php 
                switch ($usSituation)
                {
                  case 'dead':
                    echo '<i>'.$msg_us_has_been_deleted.'</i>'; 
                  break;

                  case 'trash':
		    echo '<i>'.$msg_us_is_in_trash.'</i><br />';
                  break;

                  case 'ghost': 
                    echo '<i>'.$msg_us_has_been_moved.'</i><br />'; 
                  break;

                  case 'sleep':
                    echo '<i>'.$msg_us_is_in_backlog.'</i><br />'; 
                  break;
                }            
                if ($usSituation!='dead')
                {
                  echo $usList[$i]['text']; 
                }?>
	    </td><?php
	    for ($k=0;$k<count($sprintsList);$k++)
	    {
	      $warningDate='#FFFFEE';?>		 
	       <td><center><?php 
  	          if (isset($usData[$usList[$i]['us_id_fk']][$sprintsList[$k]['sprint_id']]))
		  {
		    $nbChange=count($usData[$usList[$i]['us_id_fk']][$sprintsList[$k]['sprint_id']])-1;
		    $log=$usData[$usList[$i]['us_id_fk']][$sprintsList[$k]['sprint_id']][$nbChange];				 
		    if ($log['baseline_date']>$sprintsList[$k]['sprint_end_date'])
		    {
		      $warningDate='#FFDD00';
		    }
                    if ($usSituation=='std')
                    {?>
		      <span style="float:left;margin-left:5px;">
		        <div style="font-size:8pt;text-align:center;border:solid 1px #8B8276;border-bottom:0;width:60px;background-color:#EDDEC9"><?php 
                           if ($log['us_status']=='DONE' && $log['us_date_finished']!='' && $log['us_date_finished']!='0000-00-00')
                           {
                             echo format_date_slash($log['us_date_finished']);   
                           }
                           else
                           {
                             echo format_date_slash($log['baseline_date']);
                           }?>
                        </div>
		        <div style="text-align:center;border:solid 1px #8B8276;width:60px;background-color:<?php echo $warningDate;?>">
		          <img src="<?php echo $pathImages.$detailStatusList[$log['us_status']];?>" style="cursor:default;" />
		        </div>  
		      </span><?php   		         
                    }
                    else
                    {?>
		      <span style="float:left;margin-left:5px;">
		        <div style="font-size:8pt;text-align:center;border:dotted 1px #8B8276;border-bottom:0;width:60px;background-color:#F4EDE3;height:12px"></div>
		        <div style="text-align:center;border:dotted 1px #8B8276;width:60px;height:16px">
		          <!--<img src="<?php echo $pathImages.$detailStatusList[$log['us_status']];?>" style="cursor:default;" />-->
		        </div>  
		      </span><?php  
                    }
		  }?></center> 
	       </td><?php
             } ?>
             <td  nowrap="nowrap"><table class="invisibleTable" cellpadding="0" cellspacing="0"><?php 
			 if (isset($usTasks[$usList[$i]['us_id_fk']]))
			 {
			   $tasksStatus=$usTasks[$usList[$i]['us_id_fk']];
			   while($status=each($tasksStatus))
			   {?>
			    <tr>
			     <td><div class="colorDisplay <?php echo $status[0]; ?>" style="float:left" title="<?php echo $status[1]['meaning'];?>"></div></td>
				 <td style="padding-left:3px;">:</td>
				 <td style="padding-left:3px;">
				   <?php if (isset($status[1]['UNDONE'])) {echo '<img style="cursor:default;" src="./images/app/smallClock.png"> '.$status[1]['UNDONE']; }
				 if (isset($status[1]['UNDONE']) && isset($status[1]['DONE'])) { echo ' /';}?>
				   <?php if (isset($status[1]['DONE'])) {echo '<img style="cursor:default;" src="./images/app/smallCheck.png"> '.$status[1]['DONE']; }?>
				 </td>  
				 </tr><?php  
			   }
			 } ?></table>
			 </td>	   			 
	     </tr><?php
         }
       }?>
   </table><?php	   
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}  


include $pathBase.'footer.php';?>