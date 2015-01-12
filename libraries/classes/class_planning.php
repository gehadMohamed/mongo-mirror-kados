<?php 
class planning
{
  var $resources;
  var $allocations;
  var $projects;
  var $first_day;
  var $last_day;
  var $allow_saturdays;
  var $allow_sundays;
  var $path_images;
  var $pictures;
  var $max_daily_workload;
  var $currentUser;
  var $currentUserProfile;

  function planning($firstDay,$lastDay,$target,$pathImages,$LocaleFile,$allow_allocation_on_saturdays=false,$allow_allocation_on_sundays=false)
  {
    $this->first_day=$firstDay;
	$this->last_day=$lastDay;
	$this->targetFile=$target;
	$this->allow_saturdays=$allow_allocation_on_saturdays;
	$this->allow_sundays=$allow_allocation_on_sundays;
	$this->path_images=$pathImages;
	$this->locale_file=$LocaleFile;
	$this->pictures=array('0.25'=>'quart.png','0.50'=>'demi.png','0.75'=>'3quart.png','1.00'=>'4quart.png');
	$this->max_daily_workload=1.00;
  }
  
  function addUser($username,$profile='READONLY',$isValidator=false)
  {
    // username of the current user
    $this->currentUser=$username;
	// Profiles are READONLY, SELF, ALL
	$this->currentUserProfile=$profile;
	// allow validation
	$this->currentUserIsValidator=$isValidator;
  }
    
  function setMaxDailyWorkload($value)
  {
    $this->max_daily_workload=$value;
  }
  
  function addResource($resource_id,$resource_name,$category='none')
  {
    $this->resources[$category][$resource_id]=$resource_name;
  }
  
  function addAllocation($resource_id,$allocation_id,$project_id,$allocation_date,$workload,$status)
  {
    $this->allocations[$resource_id][$allocation_date][]=array('allocation_id'=>$allocation_id,'project_id'=>$project_id,'workload'=>$workload,'status'=>$status);
  }
  
  function addProject($project_id,$project_code,$project_name,$projectLeader='',$project_color_class,$visibility='yes')
  {
    if (!isset($this->projects[$project_id]))
	{
      $this->projects[$project_id]=array('project_code'=>$project_code,'project_name'=>$project_name,'project_color_class'=>$project_color_class,'visible'=>$visibility,'project_leader'=>$projectLeader);
	}  
  }
  
  function planningDisplayOpenTable()
  {
    include $this->locale_file;?>
    <script>
	projectsList=new Array();
	var i=0;<?php
	while ($project=each($this->projects))
	{
	  if ($project['value']['visible']=='yes' || $project['value']['visible']=='self')
	  {?>
	   projectsList[i]=new Array();	
	   projectsList[i]['key']=<?php echo $project['key']; ?>;
	   projectsList[i]['project_code']='<?php echo $project['value']['project_code']; ?>';
	   projectsList[i]['project_name']="<?php echo $project['value']['project_name']; ?>";
	   projectsList[i]['project_visibility']="<?php echo $project['value']['visible']; ?>";	   
	   i++;<?php
	  } 
    }

	reset($this->projects);?>	
// JavaScript Document

function pointerOver(resource,day,str,color)
{
  document.getElementById(resource+"_"+day+str).style.backgroundColor=color;
  document.getElementById(resource).style.backgroundColor=color;
  document.getElementById(day).style.backgroundColor=color;
}

function pointerOut(resource,day,str)
{
  document.getElementById(resource+"_"+day+str).style.backgroundColor='';
  document.getElementById(resource).style.backgroundColor='';
  document.getElementById(day).style.backgroundColor='';
}

Array.prototype.inArray = function(p_val) 
{
  var l=this.length;
  for(var i=0;i<l;i++)
  {
    if (this[i] == p_val)
	{
	  return true;
	}
  }
  return false;
}

function displayProjectsList(ressource_id,day_count,max_daily_workload,daily_workload,timestamp,project_list,targetFile,path_images,isCurrentUser)
{
  var display=new String();
  var projectIdList=new Array();
  
  // load projects already allocated in a an array
  if (project_list!='')
  {
    projectIdList=project_list.split(",");
  }	
  
  for (i=0;i<projectsList.length;i++)
  {
    if ((isCurrentUser==true && projectsList[i]['project_visibility']=="self") || projectsList[i]['project_visibility']=="yes")
    {
      if (!(projectIdList.inArray(projectsList[i]['key'])))
	  {
	    display+='<div class="tinyTable">';
	    if (max_daily_workload-daily_workload>=0.25)
	    { 
		  display+='<a href="'+targetFile+'&action=add_allocation&day='+timestamp+'&resource2allocate='+ressource_id+'&project2add='+projectsList[i]['key']+'&workload=0.25" class="std_link"><img src="'+path_images+'quart.png" style="border:solid 1px grey"/></a> ';
		  if (max_daily_workload-daily_workload>=0.5)
		  {
 		    display+='<a href="'+targetFile+'&action=add_allocation&day='+timestamp+'&resource2allocate='+ressource_id+'&project2add='+projectsList[i]['key']+'&workload=0.5" class="std_link"><img src="'+path_images+'demi.png" style="border:solid 1px grey"/></a> ';
            if (max_daily_workload-daily_workload>=0.75)
		    {						   
  		      display+='<a href="'+targetFile+'&action=add_allocation&day='+timestamp+'&resource2allocate='+ressource_id+'&project2add='+projectsList[i]['key']+'&workload=0.75" class="std_link"><img src="'+path_images+'3quart.png" style="border:solid 1px grey"/></a> ';
 	          if (max_daily_workload-daily_workload>=1)
			  {
  		        display+='<a href="'+targetFile+'&action=add_allocation&day='+timestamp+'&resource2allocate='+ressource_id+'&project2add='+projectsList[i]['key']+'&workload=1" class="std_link"><img src="'+path_images+'4quart.png" style="border:solid 1px grey"/></a> ';
              }
	        }
	      }
	    }
	    display+=projectsList[i]['project_code']+' - '+projectsList[i]['project_name']+'</div>';
      }	 
   }
  }
  document.getElementById(ressource_id+"_"+day_count+"_projects").innerHTML=display;
}
	

function displayForwardProjectsList(ressource_id,day_count,max_daily_workload,daily_workload,timestamp,allocation_list,targetFile,isCurrentUser)
{
  var display=new String();
  var projectIdList=new Array();
  var allocIdList=new Array();
  var storeAllocId=new Array();
  
  // load allocations id associated with the project id
  if (allocation_list!='')
  {
    allocIdList=allocation_list.split(",");
  }	
  // split 
  for (i=0;i<allocIdList.length;i++)
  {
    data=allocIdList[i].split(":");
    projectIdList[i]=data[1];
	storeAllocId[data[1]]=data[0];
  }
  display='<?php echo $text_list_project_reuse;?><br />';
  for (i=0;i<projectsList.length;i++)
  {
    if ((isCurrentUser==true && projectsList[i]['project_visibility']=="self") || projectsList[i]['project_visibility']=="yes")
    {
      if (projectIdList.inArray(projectsList[i]['key']))
	  {
	    display+='<div class="tinyTable">';
  	    display+='<a href="'+targetFile+'&action=extend_allocation&allocId='+storeAllocId[projectsList[i]['key']]+'&finalday='+timestamp+'" class="std_link">';
	    display+=projectsList[i]['project_code']+' - '+projectsList[i]['project_name']+'</a></div>';
      }	 
   }
  }
  document.getElementById(ressource_id+"_"+day_count+"_forwardprojects").innerHTML=display;
}
		
	
	</script>
    <table class="CalendarData"><?php
  }
  
  function planningDisplayTableBody()
  {
    include $this->locale_file;
    $dateEnd=new DateTime($this->last_day);?>
    <tr> 
      <th class="ressource bordertop borderleft" colspan="2"><?php echo $text_resource; ?></th><?php
	  // Header line is made with all days of period
	  $date=new DateTime($this->first_day);
	  $dayCount=1;
	  while ($date<$dateEnd)
	  {?>
	    <th id="<?php echo $dayCount++;?>" ><?php echo $date->format('d');?> <?php if ($date->format('Y-m-d')==aujourdhui()) { echo '<img src="'.$this->path_images.'/star.gif" />'; }?></th><?php
	    $date->add(new DateInterval('P1D'));
	  }?>
    </tr><?php
	// display resources list
	if (count($this->resources))
	{
	   $categories=array_keys($this->resources);
	   $date=new DateTime($this->first_day);
	   $dateEnd=new DateTime($this->last_day);
	   $dateGap=$dateEnd->diff($date);
	   $numberOfDays=$dateGap->format('%a');	   
	   for ($j=0;$j<count($categories);$j++)
	   {
	     // Manage session var to allow hide or show a category
	     if (!isset($_SESSION['cat_'.$categories[$j]]))
		 {
		   $_SESSION['cat_'.$categories[$j]]=1;
		 }
		 if (isset($_REQUEST['action_category']))
		 {
		   if ($_REQUEST['category']==$categories[$j])
		   {
		     $_SESSION['cat_'.$categories[$j]]=$_REQUEST['action_category'];
		   }
		 }
	     if (count($categories)!=1)
		 {?>
	       <tr class="planning_category">
		     <td colspan="<?php echo ($numberOfDays+2);?>" ><?php
			  if ($_SESSION['cat_'.$categories[$j]])
              {?>			  
			    <a href="<?php echo $this->targetFile;?>&action_category=0&category=<?php echo $categories[$j];?>"><img src="<?php echo $this->path_images;?>minus.png" border="0" /></a> <?php
			  }
			  else
              {?>			  
			    <a href="<?php echo $this->targetFile;?>&action_category=1&category=<?php echo $categories[$j];?>"><img src="<?php echo $this->path_images;?>plus.png" border="0" /></a> <?php
			  }			  
		      echo $categories[$j];?>
		     </td>
		   </tr><?php
		 }  
		 if ($_SESSION['cat_'.$categories[$j]])
		 {
	     $resourcesIds=array_keys($this->resources[$categories[$j]]);
         for ($i=0;$i<count($resourcesIds);$i++)
         {
		   $allocIdList=array();?>
           <tr>
           <td class="ressource" colspan="2" id="<?php echo $resourcesIds[$i];?>"><?php 
		     echo $this->resources[$categories[$j]][$resourcesIds[$i]];
             if ($resourcesIds[$i]==$this->currentUser) 
			 { 
			   echo ' <img src="'.$this->path_images.'/star.gif" />'; 
			 }			 ?>
		   </td><?php
		    $date=new DateTime($this->first_day);
			$dateEnd=new DateTime($this->last_day);
		    $dateGap=$dateEnd->diff($date);
		    $numberOfDays=$dateGap->format('%a');
		    $dayCount=1;
		    while ($date<$dateEnd)
		    {
		      // for each day of the period, display allocations of the resource
              $allocListUserThatDay=array();
			  $dateStrDB=$date->format('Y-m-d');			  
			  // if there is at least one allocation for the user on the period
			  if (isset($this->allocations[$resourcesIds[$i]]))
			  {
			    // Get allocations for the user on the current day
			    if (isset($this->allocations[$resourcesIds[$i]][$dateStrDB]))
				{
			      $allocListUserThatDay=$this->allocations[$resourcesIds[$i]][$dateStrDB];
				}
			  }
			 $widthTd='';  
			 if ($date->format('N')==6 && !$this->allow_saturdays ||  $date->format('N')==7 && !$this->allow_sundays)
             {
			   $widthTd='width_small';
             } ?>
			 <td class="<?php if ($date->format('Y-m-d')==aujourdhui()) { echo 'today_color'; } else if (in_array($date->format('N'),array(6,7))) {echo 'alt2'; } else if (fmod($date->format('N'),2)==0) {echo 'alt'; } echo ' '.$widthTd; ?>" valign="top"><?php 
			   // display all allocations on the current day
			   if (isset($projectIdList))
			   {
			     unset($projectIdList);
				 $projectIdList=array();
			   }
			   else
			   {
			     $projectIdList=array();
			   }
			   $daily_workload=0;
			   $localCellProjects=array();
    	       for ($k=0;$k<count($allocListUserThatDay);$k++)
               { 
			     if ($allocListUserThatDay[$k]['status']=='NEW') 
				 {
				   $classCell=str_replace('gantt','frame',$this->projects[$allocListUserThatDay[$k]['project_id']]['project_color_class']).' cell_alloc2';
				 }
				 else
				 {
 			       $classCell=$this->projects[$allocListUserThatDay[$k]['project_id']]['project_color_class'].' cell_alloc';
				 } ?>
			     <div class="<?php echo $classCell;?>" id="<?php echo $resourcesIds[$i].'_'.$dayCount.'_'.$allocListUserThatDay[$k]['allocation_id'];?>">
			   	 <span class="choice_menu<?php if ($dayCount>20) { echo '_left'; }?> "  onMouseOver="javascript:pointerOver('<?php echo $resourcesIds[$i];?>','<?php echo $dayCount;?>','<?php echo '_'.$allocListUserThatDay[$k]['allocation_id'];?>','#FF5C5C');" onMouseOut="javascript:pointerOut('<?php echo $resourcesIds[$i];?>','<?php echo $dayCount;?>','<?php echo '_'.$allocListUserThatDay[$k]['allocation_id'];?>');">
		           <?php echo $this->projects[$allocListUserThatDay[$k]['project_id']]['project_code'];?> 
				   <img src="<?php echo $this->path_images.$this->pictures[$allocListUserThatDay[$k]['workload']];?>" border="0"/>
				   <span style="text-align:left;">
				     <!-- Display infos on the allocation-->
				     <?php echo $text_project.' : ';
					 // Then the project name itself
					 echo $this->projects[$allocListUserThatDay[$k]['project_id']]['project_code'].' - '.$this->projects[$allocListUserThatDay[$k]['project_id']]['project_name'];
					 // Then the project leader if any
					 if ($this->projects[$allocListUserThatDay[$k]['project_id']]['project_leader']!='')
					 {
					   echo '<br />'.$text_project_leader.' : '.$this->projects[$allocListUserThatDay[$k]['project_id']]['project_leader'];
					 }?> <br />
					 <!--/********* Allocation menu ****************************/
					 //  Deletion available only if allowed by level rights --> <?php
					 if (($this->currentUserProfile=='ALL' ||  $this->currentUserProfile=='SELF' && $resourcesIds[$i]==$this->currentUser) && ($this->projects[$allocListUserThatDay[$k]['project_id']]['visible']=='yes' || $this->projects[$allocListUserThatDay[$k]['project_id']]['visible']=='self' && $resourcesIds[$i]==$this->currentUser))
					 {?>
                       <div class="menu_alloc"><a href="<?php echo $this->targetFile;?>&action=delete_allocation&allocation_id=<?php echo $allocListUserThatDay[$k]['allocation_id'];?>" class="small_link" title="<?php echo $action_delete_allocation;?>" ><img src="<?php echo $this->path_images;?>cancel_date.gif" border="0" /></a> </div><?php 
					 }  

					 // And the rewind function to delete all next allocation for the same project, the current allocation included
					 if (($this->currentUserProfile=='ALL' ||  $this->currentUserProfile=='SELF' && $resourcesIds[$i]==$this->currentUser) && ($this->projects[$allocListUserThatDay[$k]['project_id']]['visible']=='yes' || $this->projects[$allocListUserThatDay[$k]['project_id']]['visible']=='self' && $resourcesIds[$i]==$this->currentUser))
					 {?>
					   <div class="menu_alloc"><a href="<?php echo $this->targetFile;?>&action=rewind_allocation&allocId=<?php echo $allocListUserThatDay[$k]['allocation_id'];?>" title="<?php echo $action_delete_in_future_from_here;?>"><img src="<?php echo $this->path_images;?>rewind.png" border="0" /></a></div><?php
					 }
					 // If allocation is NEW, allow validation for Validators (Acces Rights = VAL)
					 if (($this->currentUserIsValidator && $allocListUserThatDay[$k]['status']=='NEW'))
					 {?>
					   <div class="menu_alloc"><a href="<?php echo $this->targetFile;?>&action=validate_allocation&allocId=<?php echo $allocListUserThatDay[$k]['allocation_id'];?>" title="<?php echo $action_validate_allocation;?>"><img src="<?php echo $this->path_images;?>flag_green.png" border="0" /></a></div><?php
					 }					 
					 // If allocation is NEW, allow multiple validation for Validators (Acces Rights = VAL)
					 if (($this->currentUserIsValidator && $allocListUserThatDay[$k]['status']=='NEW'))
					 {?>
					   <div class="menu_alloc"><a href="<?php echo $this->targetFile;?>&action=validate_adjacent_allocation&allocId=<?php echo $allocListUserThatDay[$k]['allocation_id'];?>" title="<?php echo $action_validate_multiple_allocation;?>"><img src="<?php echo $this->path_images;?>flag_green_multiple.png" border="0" /></a></div><?php
					 }					 
					 /********* END of Allocation menu ****************************/ ?>
			       </span>
			     </span>
				  </div><?php
                  // store projects id in an array				  
				  $projectIdList[$k]=$allocListUserThatDay[$k]['project_id'];
				  $daily_workload+=(float)$allocListUserThatDay[$k]['workload'];
				  $allocIdList[$allocListUserThatDay[$k]['project_id']]=$allocListUserThatDay[$k]['allocation_id'].':'.$allocListUserThatDay[$k]['project_id'];
				  $localCellProjects[]=$allocListUserThatDay[$k]['project_id'];
			    }
				// if allowed add a button to allocate the day to the user
                if (($date->format('N')<6 || $date->format('N')==6 && $this->allow_saturdays || $date->format('N')==7 && $this->allow_sundays) && ($this->max_daily_workload-$daily_workload)>=0.25 && ($this->currentUserProfile=='ALL' ||  $this->currentUserProfile=='SELF' && $resourcesIds[$i]==$this->currentUser))
                {?>
				  <div class="align_center" id="<?php echo $resourcesIds[$i].'_'.$dayCount;?>_add">
			   	  <span class="choice<?php if ($dayCount>floor($numberOfDays/2)) { echo '_left'; }?>" onMouseOver="javascript:pointerOver('<?php echo $resourcesIds[$i];?>','<?php echo $dayCount;?>','_add','#46FF46');" onMouseOut="javascript:pointerOut('<?php echo $resourcesIds[$i];?>','<?php echo $dayCount;?>','_add');">
		            <img src="<?php echo $this->path_images;?>add.png" border="0" onClick="javascript:displayProjectsList('<?php echo $resourcesIds[$i];?>','<?php echo $dayCount;?>','<?php echo $this->max_daily_workload; ?>','<?php echo $daily_workload; ?>',<?php echo $date->getTimestamp();?>,'<?php echo implode(",",$projectIdList);?>','<?php echo $this->targetFile;?>','<?php echo $this->path_images;?>','<?php echo $resourcesIds[$i]==$this->currentUser;?>');"/>
			       <span id="<?php echo $resourcesIds[$i].'_'.$dayCount;?>_projects" >
				     <?php echo $action_click_on_image;?>
			       </span>
			     </span><?php 
				 // if an allocation has been made on the line, allow forward it
				 //if ( ($this->projects[$lastAllocationProject]['visible']=='yes' || $this->projects[$lastAllocationProject]['visible']=='self' && $resourcesIds[$i]==$this->currentUser))
				 // get projects of the allocation list
				 $projectKeys=array_keys($allocIdList);
				 $allocIdListTmp=array();
				 for ($m=0;$m<count($projectKeys);$m++)
				 {
                   if (($this->projects[$projectKeys[$m]]['visible']=='yes' || $this->projects[$projectKeys[$m]]['visible']=='self' && $resourcesIds[$i]==$this->currentUser))				 
				   {
				     $allocIdListTmp[$projectKeys[$m]]=$allocIdList[$projectKeys[$m]];
				   }	 
				 }								 
				 // remove current projects from allocIdList if exists
				 for ($m=0;$m<count($localCellProjects);$m++)
				 {
				   unset($allocIdListTmp[$localCellProjects[$m]]);
				 }				 
				 //var_dump($allocIdList);
				 if (count($allocIdListTmp)!=0)
				 {?>
                     <span class="choiceff<?php if ($dayCount>floor($numberOfDays/2)) { echo '_left'; }?>" onMouseOver="javascript:pointerOver('<?php echo $resourcesIds[$i];?>','<?php echo $dayCount;?>','_add','#C8D8F4');" onMouseOut="javascript:pointerOut('<?php echo $resourcesIds[$i];?>','<?php echo $dayCount;?>','_add');">
		              <img src="<?php echo $this->path_images;?>forward.png" border="0" onClick="javascript:displayForwardProjectsList('<?php echo $resourcesIds[$i];?>','<?php echo $dayCount;?>','<?php echo $this->max_daily_workload; ?>','<?php echo $daily_workload; ?>',<?php echo $date->getTimestamp();?>,'<?php echo implode(",",$allocIdListTmp);?>','<?php echo $this->targetFile;?>','<?php echo $this->path_images;?>','<?php echo $resourcesIds[$i]==$this->currentUser;?>');" />
  			           <span id="<?php echo $resourcesIds[$i].'_'.$dayCount;?>_forwardprojects" >
				     <?php echo $action_click_on_image;?>
			           </span> 
                    </span> <?php
				 }?>
				 </div><?php
			    }?>
			 </td><?php
			 $date->add(new DateInterval('P1D'));
			 $dayCount++;
		    }?>
           </tr><?php
         }
		 }
	  }
    }
    else
    {?>
  	  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_resource;?></div><?php
    }
  }
  
  function planningDisplayCloseTable()
  {?>
     </table><?php   
  }
  
  function planningDisplay()
  {
    $this->planningDisplayOpenTable();
	$this->planningDisplayTableBody();
	$this->planningDisplayCloseTable();
  }
  

}