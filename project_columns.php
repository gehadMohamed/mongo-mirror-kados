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
$targetFile='project_columns.php?menu_lev2=prj_columns';
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
    case 'select_column':
	  $request->envoi("SELECT MAX(column_order) AS max_order
	                   FROM kados_projects_columns
	                   WHERE project_id_fk=".$_SESSION['current_project_id']);
	  $max=$request->getObject();				   
	  $request->envoi("INSERT INTO kados_projects_columns 
	                   (project_id_fk,column_tag_fk,column_order,column_meaning)
					   VALUES (".$_SESSION['current_project_id'].",
					   '".$_REQUEST['selected_tag']."',
					   ".((int)$max->max_order+1).",
					   '')");
          $mcnx->num->kados_projects_columns->insert(array("project_id_fk"=>$_SESSION['current_project_id'],"column_tag_fk"=>$_REQUEST['selected_tag'],"column_order"=>((int)$max->max_order+1),'column_meaning'=>""));
	break;

    case 'unselect_column':
	  // Delete column
	  $request->envoi("DELETE FROM kados_projects_columns 
	                   WHERE project_id_fk=".$_SESSION['current_project_id']." 
					     AND column_tag_fk='".$_REQUEST['selected_tag']."'");

        $mcnx->num->kados_projects_columns->remove(array('project_id_fk'=>$_SESSION['current_project_id'],'column_tag_fk'=>$_REQUEST['selected_tag']));
	  // Select list of columns					 
	  $request->envoi("SELECT column_tag_fk 
	                   FROM kados_projects_columns
					   WHERE project_id_fk=".$_SESSION['current_project_id']."
					   ORDER BY column_order");
	  $list=array();				   
      $list=$request->recup_array_mono();	
	  // Reorder columns
      for ($i=0;$i<count($list);$i++)
      {	  
	    $request->envoi("UPDATE kados_projects_columns 
	                   SET column_order=".($i+1)."
	                   WHERE project_id_fk=".$_SESSION['current_project_id']."
					     AND column_tag_fk='".$list[$i]."'");
            $mcnx->num->kados_projects_columns->update(array('project_id_fk'=>$_SESSION['current_project_id'],'column_tag_fk'=>$list[$i]),array('$set'=>array('column_order'=>($i+1))),array('multiple' => true));
	  }				   
	break;	
	
	case 'column_up':
	  //set apart the upper column 
	  $request->envoi("UPDATE kados_projects_columns
	                   SET column_order=0 
					   WHERE project_id_fk=".$_SESSION['current_project_id']." 
					     AND column_order=".($_REQUEST['order']-1));
            $mcnx->num->kados_projects_columns->update(array('project_id_fk'=>$_SESSION['current_project_id'],'column_order'=>($_REQUEST['order']-1)),array('$set'=>array('column_order'=>'0')),array('multiple' => true));
	  // move up the column					 
	  $request->envoi("UPDATE kados_projects_columns
	                   SET column_order=".($_REQUEST['order']-1)."  
					   WHERE project_id_fk=".$_SESSION['current_project_id']." 
					     AND column_order=".$_REQUEST['order']);
          
          $mcnx->num->kados_projects_columns->update(array('project_id_fk'=>$_SESSION['current_project_id'],'column_order'=>$_REQUEST['order']),array('$set'=>array('column_order'=>($_REQUEST['order']-1))),array('multiple' => true));
	  // move down the column set apart
	  $request->envoi("UPDATE kados_projects_columns
	                   SET column_order=".$_REQUEST['order']."  
					   WHERE project_id_fk=".$_SESSION['current_project_id']." 
					     AND column_order=0");
          $mcnx->num->kados_projects_columns->update(array('project_id_fk'=>$_SESSION['current_project_id'],'column_order'=>'0'),array('$set'=>array('column_order'=>$_REQUEST['order'])),array('multiple' => true));
	break;
	
	case 'column_down':
	  //set apart the upper column 
	  $request->envoi("UPDATE kados_projects_columns
	                   SET column_order=0 
					   WHERE project_id_fk=".$_SESSION['current_project_id']." 
					     AND column_order=".($_REQUEST['order']+1));
            $mcnx->num->kados_projects_columns->update(array('project_id_fk'=>$_SESSION['current_project_id'],'column_order'=>($_REQUEST['order']+1)),array('$set'=>array('column_order'=>'0')),array('multiple' => true));
	  // move up the column					 
	  $request->envoi("UPDATE kados_projects_columns
	                   SET column_order=".($_REQUEST['order']+1)."  
					   WHERE project_id_fk=".$_SESSION['current_project_id']." 
					     AND column_order=".$_REQUEST['order']);		
          $mcnx->num->kados_projects_columns->update(array('project_id_fk'=>$_SESSION['current_project_id'],'column_order'=>$_REQUEST['order']),array('$set'=>array('column_order'=>($_REQUEST['order']+1))),array('multiple' => true));
	  // move down the column set apart
	  $request->envoi("UPDATE kados_projects_columns
	                   SET column_order=".$_REQUEST['order']."  
					   WHERE project_id_fk=".$_SESSION['current_project_id']." 
					     AND column_order=0");
          $mcnx->num->kados_projects_columns->update(array('project_id_fk'=>$_SESSION['current_project_id'],'column_order'=>'0'),array('$set'=>array('column_order'=>$_REQUEST['order'])),array('multiple' => true));
	break;	
	
	case 'save_meaning':
	  // Select list of columns					 
	  $request->envoi("SELECT column_tag_fk 
	                   FROM kados_projects_columns
					   WHERE project_id_fk=".$_SESSION['current_project_id']."
					   ORDER BY column_order");
	  $list=array();				   
      $list=$request->recup_array_mono();	
	  // Reorder columns
      for ($i=0;$i<count($list);$i++)
      {	  
	    $request->envoi("UPDATE kados_projects_columns 
	                     SET column_meaning='".formatStringForDB($_REQUEST['form_item_meaning_'.$list[$i]])."' 
	                     WHERE project_id_fk=".$_SESSION['current_project_id']."
					       AND column_tag_fk='".$list[$i]."'");
            $mcnx->num->kados_projects_columns->update(array('project_id_fk'=>$_SESSION['current_project_id'],'column_tag_fk'=>$list[$i]),array('$set'=>array('column_meaning'=>formatStringForDB($_REQUEST['form_item_meaning_'.$list[$i]]))),array('multiple' => true));
	  }?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php	
	break;
  }


  if ($displayTable)
  {
     $wkf=new workflow('COL','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);?>
     <div class="MessageBox TitleBox"><?php echo $msg_columns_select;?></div>
	 <div class="block3">
	 <!-- Columns available !--><?php
     $sqlColumns="SELECT column_tag,column_name,column_usage 
	              FROM kados_template_columns
				  WHERE column_status_id_fk=".$wkf->id_etat_from_label('COLACT')." 
				  AND column_tag NOT IN (SELECT column_tag_fk 
				                         FROM kados_projects_columns 
										 WHERE project_id_fk=".$_SESSION['current_project_id'].")"; ?>
     <div class="selectColumnsTitle"><?php echo $text_available_columns;?></div>
     <table class="LineData" cellpadding="0" cellspacing="0">
       <tr>
         <th><?php echo $text_tag; ?></th> 
         <th><?php echo $text_name; ?></th>
         <th><?php echo $text_description;?></th>
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_actions);?>"><img src="<?php echo $pathImages;?>action.gif" border="0" /><span><?php echo $text_actions;?></span></a></center></th>       
       </tr><?php
       $request=new requete($sqlColumns,$cnx->num);
       $resultsArray=$request->getArrayFields();
              
       for ($i=0;$i<count($resultsArray);$i++)
       {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td><?php echo $resultsArray[$i]['column_tag'];?></td>
           <td><?php echo $resultsArray[$i]['column_name'];?></td>
           <td><?php echo $resultsArray[$i]['column_usage'];?></td>
           <td class="nowrap"><center><?php
	        if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
                || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
                || $currentProject->adminLogin==$_SESSION['login']) 
	        {?>
		       <a href="<?php echo $targetFile;?>&action=select_column&selected_tag=<?php echo $resultsArray[$i]['column_tag'];?>" class="info"><img src="<?php echo $pathImages;?>app/arrow.png" border="0" /><span><?php echo $action_modify;?></span></a><?php
			}?>   
		    </center>
		   </td>
         </tr><?php
       }?>
     </table>
	 
	 </div>
	 
	 <div class="block4">
	 <!-- Selected columns !--><?php
	      $sqlColumns="SELECT column_tag,column_name,column_usage,column_order,column_meaning,COUNT(task_id) AS nbTask 
	                   FROM kados_template_columns,kados_projects_columns 
					   LEFT JOIN kados_user_stories ON us_project_id_fk=".$_SESSION['current_project_id']." 
					   LEFT JOIN kados_tasks ON column_tag_fk=kados_tasks.STATUS AND us_id_fk=us_id 
				       WHERE column_tag=column_tag_fk AND project_id_fk=".$_SESSION['current_project_id']."  
				       GROUP BY column_tag_fk
				       ORDER BY column_order"; ?>

	 <form method="POST" name="form_project_columns" action="<?php echo $targetFile;?>&action=save_meaning" enctype="multipart/form-data">
     <div class="selectColumnsTitle"><?php echo $text_selected_columns;?></div>
     <table class="LineData" cellpadding="0" cellspacing="0">
       <tr>
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_actions);?>"><img src="<?php echo $pathImages;?>action.gif" border="0" /><span><?php echo $text_actions;?></span></a></center></th>       
         <th><?php echo $text_tag; ?></th> 
         <th><?php echo $text_name; ?></th>
         <th><?php echo $text_description;?></th>
		 <th><?php echo $text_meaning;?></th>
		 <th><?php echo $text_order;?></th>
		 <th></th>
       </tr><?php
       $request=new requete($sqlColumns,$cnx->num);
       $resultsArray=$request->getArrayFields();
              
       for ($i=0;$i<count($resultsArray);$i++)
       {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td class="nowrap"><center><?php
	        if ((in_array('MNGPARAMPRJ',$_SESSION['user_actions'])  
                || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
                || $currentProject->adminLogin==$_SESSION['login']) && $resultsArray[$i]['nbTask']==0 && count($resultsArray)>1) 
	        {?>
		       <a href="<?php echo $targetFile;?>&action=unselect_column&selected_tag=<?php echo $resultsArray[$i]['column_tag'];?>" class="info"><img src="<?php echo $pathImages;?>app/arrow_inv.png" border="0" /><span><?php echo $action_modify;?></span></a><?php
			}?>   
		    </center>
		   </td>		 
           <td><?php echo $resultsArray[$i]['column_tag'];?></td>
           <td><?php echo $resultsArray[$i]['column_name'];?></td>
           <td><?php echo $resultsArray[$i]['column_usage'];?></td>
		   <td><?php
		     if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
                 || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
                 || $currentProject->adminLogin==$_SESSION['login'])	 
			 {?>
		       <textarea name="form_item_meaning_<?php echo $resultsArray[$i]['column_tag'];?>" cols="20" rows="1"><?php echo $resultsArray[$i]['column_meaning'];?></textarea><?php
			 }
             else
			 {
			   echo $resultsArray[$i]['column_meaning'];
			 }?>
		   </td>
		   <td><?php echo $resultsArray[$i]['column_order'];?></td>
		   <td style="text-align:left;width:40px;"><?php 
		   if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
               || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
               || $currentProject->adminLogin==$_SESSION['login'])	 
		   {
			 if ($i<count($resultsArray)-1)
			 {?>
			   <a href="<?php echo $targetFile;?>&action=column_down&order=<?php echo $resultsArray[$i]['column_order'];?>" class="info"><img src="<?php echo $pathImages;?>down.png" border="0" /><span><?php echo $action_down;?></span></a><?php
			 }		   
			 else
			 {?>
			   <img src="<?php echo $pathImages;?>blank.gif" width="16" /><?php
			 }			 
		     if ($i>0)
			 {?>
			   <a href="<?php echo $targetFile;?>&action=column_up&order=<?php echo $resultsArray[$i]['column_order'];?>" class="info"><img src="<?php echo $pathImages;?>up.png" border="0" /><span><?php echo $action_up;?></span></a><?php
			 }
		   } ?>
		   </td>

         </tr><?php
       }?>
     </table><br /><?php
     if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
         || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
         || $currentProject->adminLogin==$_SESSION['login'])	 
	 {
	   displayButton($button_submit,$pathImages.'submit.png','javascript:document.form_project_columns.submit()');
	 }?>	
	 </form>
	 
	 </div>
     <div class="clearleft"></div>	 <?php
	 
  }
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}

include $pathBase.'footer.php';?>