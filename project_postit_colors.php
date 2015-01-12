<?php
/**
 * Main page to manage colors of postit on a project
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='./';
$targetFile='project_postit_colors.php?menu_lev2=prj_colors';
$displayTable=true;
	  
include $pathBase.'header.php';

if (isset($_REQUEST['project_id']))
{
  $_SESSION['current_project_id']=intval($_REQUEST['project_id']);
  include_once $pathBase.'project_get_user_rights.php';
}


if (isset($_SESSION['current_project_id']))
{
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';
	  
  /* actions for the page */
  switch ($_REQUEST['action'])
  {
    case 'save_colors':
      $request->envoi("SELECT color_id
                       FROM kados_colors",$cnx->num);	  	     
      $colorList=$request->recup_array_mono();
	  
      $request->envoi("DELETE FROM kados_projects_colors 
                       WHERE project_id_fk=".$_SESSION['current_project_id']."
		         AND object_type='".$_POST['object_type']."'");
      $mcnx->num->kados_projects_colors->remove(array('project_id_fk'=>$_SESSION['current_project_id'],'object_type'=>$_POST['object_type']));
      $default=0;
      $type=strtolower($_POST['object_type']);
      if (isset($_POST['default_color_'.$type]))
      {
        $default=$_POST['default_color_'.$type];
      }
      
      for ($i=0;$i<count($colorList);$i++)	  
      {
        if (isset($_POST['choose_color_'.$type.'_'.$colorList[$i]]))
        {
          $request->envoi("INSERT INTO kados_projects_colors 
                             (project_id_fk,
			      color_id_fk,
			      object_type,
			      object_color_meaning,
			      object_color_default)
			   VALUES 
			      (".$_SESSION['current_project_id'].",
			       ".$colorList[$i].",
			      '".$_POST['object_type']."',
			      '".formatStringForDB($_POST['meaning_color_'.$type.'_'.$colorList[$i]])."',
			       ".($default==$colorList[$i] ? 1 : 0).")");
          $mcnx->num->kados_projects_colors->insert(array("project_id_fk"=>$_SESSION['current_project_id'],"color_id_fk"=>$colorList[$i],"object_type"=>$_POST['object_type'],"object_color_meaning"=>formatStringForDB($_POST['meaning_color_'.$type.'_'.$colorList[$i]]),"object_color_default"=>($default==$colorList[$i]?1:0)));
        }
      }?>
     <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php	
    break;
  }


  if ($displayTable)
  {
    if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
        || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
        || $currentProject->adminLogin==$_SESSION['login'])	 
	{  ?>
 
	 <div class="block1">
	 <!-- Colors for USer Stories !-->
	 <div class="MessageBox TitleBox"><?php echo $text_us_colors_select;?></div>
	 <form method="POST" name="form_us_colors" action="<?php echo $targetFile;?>&action=save_colors" enctype="multipart/form-data">
	 <input type="hidden" name="object_type" value="US" />
     <table class="TableData">
       <tr> 
	     <th colspan="2"></th>
		 <th><?php echo $text_meaning; ?></th>
		 <th><?php echo $text_default; ?></th>
       </tr><?php
     $request->envoi("SELECT color_id,color_name,object_color_default,object_color_meaning,color_id_fk,
                             use_color_lock,use_color_meaning,use_color_default 
                      FROM kados_colors_uses,kados_colors LEFT JOIN kados_projects_colors ON 
                           project_id_fk=".$_SESSION['current_project_id']."
		 	   AND color_id_fk=color_id 
			   AND object_type='US' 
                      WHERE color=color_name AND use_color_postit_type='US'
                      ORDER BY use_color_lock DESC");	  	     
     $colorList=$request->getArrayFields();
     $defaultInMandatory=false;
     for ($i=0;$i<count($colorList);$i++)
     {?>
        <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>><?php
        if ($colorList[$i]['use_color_lock'])
	{
          $defaultInMandatory = $defaultInMandatory==true ? true  :  $colorList[$i]['use_color_default']==1 ; ?>
          <td><img src="<?php echo $pathImages;?>lock.png" /></td>
          <td><div class="colorDisplay <?php echo $colorList[$i]['color_name'];?>"></div></td>
	  <td><input type="text" size="12" maxlength="20" readonly="readonly" class="readonly_form_field" value="<?php echo $colorList[$i]['use_color_meaning']; ?>"></td>                     
  	  <td>
	    <input type="radio" id="default_color_us_<?php echo $colorList[$i]['color_id'];?>" <?php if ($colorList[$i]['use_color_default']==1) { echo 'checked="checked"';}?> />
	    <script>document.getElementById('default_color_us_'+<?php echo $colorList[$i]['color_id'];?>).disabled=true;</script>
	  </td><?php
        }
        else		   
	{ ?>
	  <td><input type="checkbox" name="choose_color_us_<?php echo $colorList[$i]['color_id'];?>" id="choose_color_us_<?php echo $colorList[$i]['color_id'];?>" <?php if ($colorList[$i]['color_id_fk']!='') { echo 'checked="checked"';}?> onChange="javascript:manageDefaultButton('<?php echo $colorList[$i]['color_id'];?>','us')"/></td>
	  <td><div class="colorDisplay <?php echo $colorList[$i]['color_name'];?>"></div></td>
	  <td><input type="text" size="12" maxlength="20" name="meaning_color_us_<?php echo $colorList[$i]['color_id'];?>" id="meaning_color_us_<?php echo $colorList[$i]['color_id'];?>" value="<?php echo $colorList[$i]['object_color_meaning']; ?>"></td>                     
  	  <td><?php
	    if (!$defaultInMandatory)
	    {?>
	      <input type="radio" name="default_color_us" value="<?php echo $colorList[$i]['color_id'];?>" id="default_color_us_<?php echo $colorList[$i]['color_id'];?>" <?php if ($colorList[$i]['object_color_default']==1) { echo 'checked="checked"';}?> /><?php
	    }?>
	  </td><?php
        }?>		   
        </tr><?php
       if (!$colorList[$i]['use_color_lock'])
       {
         if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
              || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
              || $currentProject->adminLogin==$_SESSION['login'])	 
	 {?>	 		 
  	   <script>manageDefaultButton('<?php echo $colorList[$i]['color_id'];?>','us');</script><?php
	 }
         else
	 {?>	 		 
	   <script>disableButton('<?php echo $colorList[$i]['color_id'];?>','us');</script><?php
	 }
       }  
     }?>
     </table><?php
     if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
         || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
         || $currentProject->adminLogin==$_SESSION['login'])	 
	 {	 
	   displayButton($button_submit,$pathImages.'submit.png','javascript:document.form_us_colors.submit()');
	 }  ?>
	 </form>
	 
	 </div>
	 
	 <div class="block2">
	 <!-- Colors for Tasks !-->
	 <div class="MessageBox TitleBox"><?php echo $text_tasks_colors_select;?></div>
	 <form method="POST" name="form_task_colors" action="<?php echo $targetFile;?>&action=save_colors" enctype="multipart/form-data">
	 <input type="hidden" name="object_type" value="TASK" />
     <table class="TableData">
       <tr> 
	     <th colspan="2"></th>
		 <th><?php echo $text_meaning; ?></th>
		 <th><?php echo $text_default; ?></th>
       </tr><?php
	   
     $request->envoi("SELECT color_id,color_name,object_color_default,object_color_meaning,color_id_fk,
                             use_color_lock,use_color_meaning,use_color_default 
                      FROM kados_colors_uses,kados_colors LEFT JOIN kados_projects_colors ON 
                           project_id_fk=".$_SESSION['current_project_id']."
		 	   AND color_id_fk=color_id 
			   AND object_type='TASK' 
                      WHERE color=color_name AND use_color_postit_type='TASK'
                      ORDER BY use_color_lock DESC");		     
     $colorList=$request->getArrayFields();
	   
     $defaultInMandatory=false;
     for ($i=0;$i<count($colorList);$i++)
     { ?>
       <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>><?php
	 if ($colorList[$i]['use_color_lock'])
	 {
           $defaultInMandatory = $defaultInMandatory==true ? true  :  $colorList[$i]['use_color_default']==1 ; ?>
	   <td><img src="<?php echo $pathImages;?>lock.png" /></td>
	   <td><div class="colorDisplay <?php echo $colorList[$i]['color_name'];?>"></div></td>
	   <td><input type="text" size="12" maxlength="20" readonly="readonly" class="readonly_form_field" value="<?php echo $colorList[$i]['use_color_meaning']; ?>"></td>                     
  	   <td>
	     <input type="radio" id="default_color_task_<?php echo $colorList[$i]['color_id'];?>" <?php if ($colorList[$i]['use_color_default']==1) { echo 'checked="checked"';}?> />
	     <script>document.getElementById('default_color_task_'+<?php echo $colorList[$i]['color_id'];?>).disabled=true;</script>
	   </td><?php
         }
         else		   
	 {?>
	   <td><input type="checkbox" name="choose_color_task_<?php echo $colorList[$i]['color_id'];?>" id="choose_color_task_<?php echo $colorList[$i]['color_id'];?>" <?php if ($colorList[$i]['color_id_fk']!='') { echo 'checked="checked"';}?> onChange="javascript:manageDefaultButton('<?php echo $colorList[$i]['color_id'];?>','task')"/></td>
	   <td><div class="colorDisplay <?php echo $colorList[$i]['color_name'];?>"></div></td>
	   <td><input type="text" size="12" maxlength="20" name="meaning_color_task_<?php echo $colorList[$i]['color_id'];?>" id="meaning_color_task_<?php echo $colorList[$i]['color_id'];?>" value="<?php echo $colorList[$i]['object_color_meaning']; ?>"></td>                     
  	   <td><?php
	     if (!$defaultInMandatory)
	     {?>
	       <input type="radio" name="default_color_task" value="<?php echo $colorList[$i]['color_id'];?>" id="default_color_task_<?php echo $colorList[$i]['color_id'];?>" <?php if ($colorList[$i]['object_color_default']==1) { echo 'checked="checked"';}?> /><?php
             }?>
           </td>	<?php	   
	 } ?>
       </tr><?php
       if (!$colorList[$i]['use_color_lock'])
       {
         if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
             || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
             || $currentProject->adminLogin==$_SESSION['login'])	 
	 {?>	 		 
	   <script>manageDefaultButton('<?php echo $colorList[$i]['color_id'];?>','task');</script><?php
	 }
         else
	 {?>	 		 
	   <script>disableButton('<?php echo $colorList[$i]['color_id'];?>','task');</script><?php
	 }
       }  
     }?>
     </table><?php
     if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
         || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
         || $currentProject->adminLogin==$_SESSION['login'])	 
	 {
	   displayButton($button_submit,$pathImages.'submit.png','javascript:document.form_task_colors.submit()');
	 }?>	
	 </form>
	 
	 </div>
     <div class="clearleft"></div>	 <?php
	 }
	 else
	 {?>
	 	 <!-- Colors for Items !-->
	
     <div class="block1">
	 <div class="MessageBox TitleBox"><?php echo $msg_us_colors_display;?></div> 
     <table class="LineData" cellspacing="0"><?php
      $request->envoi("(SELECT color AS color_name,use_color_default AS color_default,
	                       use_color_meaning AS object_color_meaning,use_color_lock 
                           FROM kados_colors_uses
			   WHERE use_color_postit_type='US' 
                                 AND use_color_lock=1)
			   UNION
			  (SELECT color_name,object_color_default AS color_default,
                                  object_color_meaning,0 AS use_color_lock 
			   FROM kados_projects_colors,kados_colors 
			   WHERE project_id_fk=".$_SESSION['current_project_id']."
		 	     AND color_id_fk=color_id 
			     AND object_type='US')"); 	     
     $colorList=$request->getArrayFields();
     for ($i=0;$i<count($colorList);$i++)
     {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>><?php
           if ($i==0)
	   {?>
	     <td rowspan="<?php echo count($colorList);?>"><?php echo $text_colors_us;?></td><?php
	   }		   
	   if ($colorList[$i]['use_color_lock']==1)
           {?>
	     <td><div class="color <?php echo $colorList[$i]['color_name'];?>"></div></td>
	     <td><?php echo $colorList[$i]['object_color_meaning']; ?></td>                     
  	     <td><?php 
		if ($colorList[$i]['color_default']==1) 
	        { 
		  echo $text_default_color;
		}?>
	     </td><?php			 
           }
           else		   
	   {?>
	     <td><div class="color <?php echo $colorList[$i]['color_name'];?>"></div></td>
	     <td><?php echo $colorList[$i]['object_color_meaning']; ?></td>                     
  	     <td><?php 
	        if ($colorList[$i]['color_default']==1) 
		{ 
		  echo $text_default_color;
		}?>
             </td><?php			 
           }?>		   		   
         </tr><?php
       }?>
       <tr><td colspan="5" style="border:solid 1px #AEAEAE;height:1px;background-color:#AEAEAE"></tr><?php
       $colorUsCount=count($colorList);
       // Idem for tasks
      $request->envoi("(SELECT color AS color_name,use_color_default AS color_default,
	                       use_color_meaning AS object_color_meaning,use_color_lock 
                           FROM kados_colors_uses
			   WHERE use_color_postit_type='TASK' 
                                 AND use_color_lock=1)
			   UNION
			  (SELECT color_name,object_color_default AS color_default,
                                  object_color_meaning,0 AS use_color_lock 
			   FROM kados_projects_colors,kados_colors 
			   WHERE project_id_fk=".$_SESSION['current_project_id']."
		 	     AND color_id_fk=color_id 
			     AND object_type='TASK')"); 	  	     
       $colorList=$request->getArrayFields();
       for ($i=0;$i<count($colorList);$i++)
       {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>><?php
		   if ($i==0)
		   {?>
		     <td rowspan="<?php echo count($colorList);?>"><?php echo $text_colors_tasks;?></td><?php
		   }		   
		   if ($colorList[$i]['use_color_lock']==1)
		   {?>
		     <td><div class="color <?php echo $colorList[$i]['color_name'];?>"></div></td>
		     <td><?php echo $colorList[$i]['object_color_meaning']; ?></td>                     
  		     <td><?php 
			   if ($colorList[$i]['color_default']==1) 
			   { 
			     echo $text_default_color;
			   }?>
			 </td><?php
           }
           else		   
		   {?>
		     <td><div class="color <?php echo $colorList[$i]['color_name'];?>"></div></td>
		     <td><?php echo $colorList[$i]['object_color_meaning']; ?></td>                     
  		     <td><?php 
			   if ($colorList[$i]['color_default']==1) 
			   { 
			     echo $text_default_color;
			   }?>
			 </td><?php			 
           }?>		   
         </tr><?php
       }?>	   
     </table>
	 </div>
     <div class="clearleft"></div> <?php
	 }
  }
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}

include $pathBase.'footer.php';?>