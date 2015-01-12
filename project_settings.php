<?php
/**
 * Main page to manage settings of a project
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='./';
$targetFile='project_settings.php?menu_lev2=prj_settings';
$displayTable=true;
	  
include $pathBase.'header.php';

if (isset($_REQUEST['project_id']))
{
  if (intval($_REQUEST['project_id'])!=0)
  {
    $_SESSION['current_project_id']=intval($_REQUEST['project_id']);
  }
  if (isset( $_SESSION['current_project_id']))
  {  
    include_once $pathBase.'project_get_user_rights.php';
  }
}


if (isset($_SESSION['current_project_id']))
{
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';
	  
  /* actions for the page */
  switch ($_REQUEST['action'])
  {
	case 'save_us_values':
	  // remove empty values at front and back
	  $bvValues=trim($_POST['choose_bv_values'],';');
	  $complexityValues=trim($_POST['choose_complexity_values'],';');
	  // Add default value 0 if not filled in
	  if (substr($bvValues,0,2)!='0;')
	  {
	    $bvValues='0;'.$bvValues;
	  }
	  if (substr($complexityValues,0,2)!='0;')
	  {
	    $complexityValues='0;'.$complexityValues;
	  }	  
	  // Get working days
	  $workingDays=array();
	  for ($i=0;$i<count($list_days_week);$i++)
	  {
	    if (isset($_POST['form_item_working_day_'.$i]))
		{
		  $workingDays[]=$i;
		}
      }	  
	  // save overlapping
	  if (getParameter('SPOVL',$cnx->num)==1) 
	  {
	    $state= isset($_REQUEST['form_item_allow_sprint_overlapping']) ? 1 : 0 ;
	    $request->envoi("UPDATE kados_projects SET project_sprint_overlapping=".$state." WHERE project_id=".$_SESSION['current_project_id']);
            $mcnx->num->kados_projects->update(array('project_id'=>$_SESSION['current_project_id']),array('$set'=>array('project_sprint_overlapping'=>$state)),array('multiple' => true));
		$currentProject->paramSprintOver=$state;
	  }
	  // get existing values to add them to the list
	  // save values
	  $request->envoi("UPDATE kados_projects_settings SET setting_value='".$bvValues."' WHERE setting_tag='US_BVL' AND project_id_fk=".$_SESSION['current_project_id']);
          $mcnx->num->kados_projects_settings->update(array('setting_tag'=>'US_BVL','project_id_fk'=>$_SESSION['current_project_id']),array('$set'=>array('setting_value'=>$bvValues)),array('multiple' => true));
	  $request->envoi("UPDATE kados_projects_settings SET setting_value='".$complexityValues."' WHERE setting_tag='PP_VAL' AND project_id_fk=".$_SESSION['current_project_id']);
          $mcnx->num->kados_projects_settings->update(array('setting_tag'=>'PP_VAL','project_id_fk'=>$_SESSION['current_project_id']),array('$set'=>array('setting_value'=>$complexityValues)),array('multiple' => true));
	  $request->envoi("UPDATE kados_projects_settings SET setting_value='".implode(';',$workingDays)."' WHERE setting_tag='WK_DAY' AND project_id_fk=".$_SESSION['current_project_id']);
          $mcnx->num->kados_projects_settings->update(array('setting_tag'=>'WK_DAY','project_id_fk'=>$_SESSION['current_project_id']),array('$set'=>array('setting_value'=>implode(';',$workingDays))),array('multiple' => true));
          ?>
	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php	
	break;
	
	case 'delete_idle_date':
	  $request->envoi("DELETE FROM kados_projects_idle_days 
	                   WHERE project_id_fk=".$_SESSION['current_project_id']." 
					     AND idle_day='".$_REQUEST['selected_day']."'");
            $mcnx->num->kados_projects_idle_days->remove(array('project_id_fk'=>$_SESSION['current_project_id'],'idle_day'=>$_REQUEST['selected_day']));
            ?>
      <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php						 
	break;
	
	case 'add_idle_day':
	  if ($_POST['form_item_idle_day']!='')
	  {
	    $request->envoi("SELECT * FROM kados_projects_idle_days 
	                   WHERE project_id_fk=".$_SESSION['current_project_id']." 
					     AND idle_day='".convertDateSlashToDash($_POST['form_item_idle_day'])."'");	
		$request->calc_nb_elt();
		if ($request->nb_elt==0)
		{
	      $request->envoi("INSERT INTO kados_projects_idle_days (project_id_fk,idle_day)
			  			    VALUES (".$_SESSION['current_project_id'].",'".convertDateSlashToDash($_POST['form_item_idle_day'])."')");	  
              $mcnx->num->kados_projects_idle_days->insert(array("project_id_fk"=>$_SESSION['current_project_id'],"idle_day"=>convertDateSlashToDash($_POST['form_item_idle_day'])));
		}					
	  }?>
	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_added;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php	
	break;
  }


  if ($displayTable)
  { ?>
	 <div class="block1">
	 
	 <!-- Values for Business values !-->
	 <div class="MessageBox TitleBox"><?php echo $msg_us_business_values_display;?></div>
	 <form method="POST" name="form_us_bvc" action="<?php echo $targetFile;?>&action=save_us_values" enctype="multipart/form-data">
	 <input type="hidden" name="object_type" value="US" />
     <table class="LineData" cellpadding="0" cellspacing="0">
         <tr>
		   <td><?php echo $text_values_for_bv;?></td><?php
		   if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
               || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
               || $currentProject->adminLogin==$_SESSION['login'])	 
	       {?>	 
		     <td><input type="text" size="45" name="choose_bv_values" value="<?php echo getProjectSetting('US_BVL',$_SESSION['current_project_id'],$cnx->num);?>" /></td>
             <td rowspan="<?php if (getParameter('SPOVL',$cnx->num)==1) { echo 4;} else {echo 3;}?>"><a class="" href="javascript:document.form_us_bvc.submit()"><img border="0" src="./images/submit.png"></a></td><?php
		   }
           else
		   {?>
		     <td><?php echo str_replace(';',' | ',getProjectSetting('US_BVL',$_SESSION['current_project_id'],$cnx->num));?></td><?php
		   }?>
         </tr>
         <tr class="alt">
		   <td><?php echo $text_values_for_complexity;?></td><?php
		   if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
               || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
               || $currentProject->adminLogin==$_SESSION['login'])	 
	       {?>	 
		     <td><input type="text" size="45" name="choose_complexity_values" value="<?php echo getProjectSetting('PP_VAL',$_SESSION['current_project_id'],$cnx->num);?>" /></td><?php
           }		   
		   else
		   {?>
		     <td><?php echo str_replace(';',' | ',getProjectSetting('PP_VAL',$_SESSION['current_project_id'],$cnx->num));?></td><?php
		   }?>
         </tr>		 
         <tr>
		   <td><?php echo $text_values_for_working_days;?></td><?php
		   $workingDays=explode(';',getProjectSetting('WK_DAY',$_SESSION['current_project_id'],$cnx->num));
		   if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
               || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
               || $currentProject->adminLogin==$_SESSION['login'])	 
	       {?>
		     <td style="text-align:left;"><?php
			   for ($i=0;$i<count($list_days_week);$i++)
			   {?>
			     <input type="checkbox" name="form_item_working_day_<?php echo $i;?>" <?php if (in_array($i,$workingDays)) { echo 'checked="checked"';}?> /><?php echo $list_days_week[$i];?><br /><?php
			   }?>
			 </td><?php
           }		   
		   else
		   {?>
		     <td style="text-align:left;"><?php 
			   for ($i=0;$i<count($list_days_week);$i++)
			   {
			     if (in_array($i,$workingDays)) { echo $list_days_week[$i].'<br />'; }
			   }?>
			 </td><?php
		   }?>
         </tr>	
     </table>
	 </form>
	 <br />
	 </div>
	 
	 <div class="block2">
	  <div class="MessageBox TitleBox"><?php echo $text_non_working_specific_days;?></div><?php
	  if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
          || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
          || $currentProject->adminLogin==$_SESSION['login'])	 
	  {?>
	   <table>
		 <tr><td>
	  	 <form action="<?php echo $targetFile;?>&action=add_idle_day" name="form_idle_day" method="POST" enctype="multipart/form-data">
          <input class="date_form_field" readonly="readonly" name="form_item_idle_day" id="form_item_idle_day" type="text" size="10" />
            <script>
             $("#form_item_idle_day").datepicker({dateFormat:"dd/mm/yy"});
            </script>
		 </form>
		 </td>
		 <td><?php displayButton($button_submit,$pathImages.'submit.png','javascript:document.form_idle_day.submit()','');?></td>
		 </tr>
	   </table><?php
	   }
		 
		  
     $sqlIdleDays="SELECT idle_day
	               FROM kados_projects_idle_days
				   WHERE project_id_fk=".$_SESSION['current_project_id']; ?>
     <table class="LineData" cellpadding="0" cellspacing="0">
       <tr>
         <th><?php echo $text_date; ?></th> 
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_actions);?>"><img src="<?php echo $pathImages;?>action.gif" border="0" /><span><?php echo $text_actions;?></span></a></center></th>       
       </tr><?php
       $request=new requete($sqlIdleDays,$cnx->num);
       $resultsArray=$request->getArrayFields();
              
       for ($i=0;$i<count($resultsArray);$i++)
       {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td><?php echo format_date($resultsArray[$i]['idle_day']);?></td>
           <td class="nowrap"><center><?php
	        if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
                || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
                || $currentProject->adminLogin==$_SESSION['login']) 
	        {?>
		       <a href="<?php echo $targetFile;?>&action=delete_idle_date&selected_day=<?php echo $resultsArray[$i]['idle_day'];?>" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');" class="info"><img src="<?php echo $pathImages;?>delete.gif" border="0" /><span><?php echo $action_delete;?></span></a><?php
			}?>   
		    </center>
		   </td>
         </tr><?php
       }?>
     </table>		 
		 
	 </div>
	 <div class="clearleft"></div><?php
  }
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}

include $pathBase.'footer.php';?>