<?php
/**
 * columns template management
 *
 * PHP versions 4 and 5
 *
 * @framework_ Scripts
 * @package  ProjectMngt:administration
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     
$pathBase='../';
require_once $pathBase.'header.php';
$targetFile='app_columns.php?';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$displayTable=true;

  switch ($_REQUEST['action'])
  {
  	case 'delete':
  	  $request=new requete("DELETE FROM kados_template_columns WHERE column_tag='".$_REQUEST['id_to_delete']."'",$cnx->num);
            $mcnx->num->kados_template_columns->remove(array('column_tag'=>$_REQUEST['id_to_delete']));
            ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;
	
    case 'new_column':?>
      <form action="<?php echo $targetFile;?>&action=submit_new" method="post" enctype="multipart/form-data" name="form_column">
       <fieldset class="fieldset">
         <legend class="legend"><?php echo $legend_creation_f.' '.lcfirst($text_column);?></legend>
         <label class="label required_field50" ><?php echo $text_tag;?></label>
         <input class="std_form_field" name="form_item_tag" type="text" size="5" maxlength="5" value="" /><div class="clearleft"></div>			 
         <label class="label required_field50" ><?php echo $text_name;?></label>
         <input class="std_form_field" name="form_item_name" type="text" size="15" maxlength="15" value="" /><div class="clearleft"></div>
         <label class="label length50" ><?php echo $text_description;?></label>
	     <input class="std_form_field" name="form_item_description" size="60" maxlength="100" value="" type="text">	  <div class="clearleft"></div>		 
         <br />
		 <div style="margin-left:15px;"><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormColumn(1)');	
           displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		 </div>  
       </fieldset><div class="clearleft"></div>
      </form><?php
      $displayTable=false;
    break;
  
    case 'submit_new':
	  $wkf=new workflow('COL','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
 	  $request=new requete("INSERT INTO kados_template_columns (column_tag,column_name,column_usage,column_status_id_fk) 
	                        VALUES ('".$_POST['form_item_tag']."',
							        '".$_POST['form_item_name']."',
							        '".$_POST['form_item_description']."',
									".$wkf->init_statut().")",$cnx->num);
          $mcnx->num->kados_template_columns->insert(array('column_tag'=>$_POST['form_item_tag'],'column_name'=>$_POST['form_item_name'],'column_usage'=>$_POST['form_item_description'],'column_status_id_fk'=>$wkf->init_statut()));
          ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_created;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php	
	break;
  
  	case 'modify':
  	  $request=new requete("SELECT column_tag,column_name,column_usage FROM kados_template_columns WHERE column_tag='".$_REQUEST['id_to_modify']."'",$cnx->num);
      $column=$request->getObject();?>
      <form action="<?php echo $targetFile;?>&action=submit_modify" method="post" enctype="multipart/form-data" name="form_column">
       <fieldset class="fieldset">
         <legend class="legend"><?php echo $legend_changing_f.' '.lcfirst($text_column).' : '.$column->column_tag;?></legend>
         <input type="hidden" name="form_item_tag" value="<?php echo $_REQUEST['id_to_modify'];?>">
         <label class="label required_field50" ><?php echo $text_name;?></label>
         <input class="std_form_field" name="form_item_name" type="text" size="15" maxlength="15" value="<?php echo $column->column_name;?>" /><div class="clearleft"></div>
         <label class="label length50" ><?php echo $text_description;?></label>
	     <input class="std_form_field" name="form_item_description" size="60" maxlength="100" value="<?php echo $column->column_usage;?>" type="text">	  <div class="clearleft"></div>	
         <br />
		 <div style="margin-left:15px;"><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormColumn(0)');	
           displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		 </div>  
       </fieldset><div class="clearleft"></div>
      </form><?php
      $displayTable=false;  	
    break;	
     
    case 'submit_modify':
  	  $request=new requete("UPDATE kados_template_columns 
	                        SET column_name='".$_POST['form_item_name']."',column_usage='".$_POST['form_item_description']."' 
	                        WHERE column_tag='".$_REQUEST['form_item_tag']."'",$cnx->num);
        $mcnx->num->kados_template_columns->update(array('column_tag'=>$_REQUEST['form_item_tag']),array('$set'=>array('column_name'=>$_POST['form_item_name'],'column_usage'=>$_POST['form_item_description'])),array('multiple' => true));
        ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;  
     
	case 'change_status':
	  $wkf=new workflow('COL','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
      $wkf->change_object_status($_REQUEST['column_tag'],$_REQUEST['new_status_id']);?>
	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_status_changed;?></div><?php
	break;			 
  }  	 
  
  if ($displayTable)
  {
     $wkf=new workflow('COL','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
	 $wkf->set_profile('framework_workflows_transitions_profiles','profile_id_fk',$_SESSION['user_profile']);
  
     $sqlColumns="SELECT column_tag,column_name,column_usage,column_status_id_fk FROM kados_template_columns"; 
     $request=new requete($sqlColumns,$cnx->num); 	  	     
     $request->calc_nb_elt();
     $pageNumbering=new page_numbering('page_columns',$request->nb_elt,$targetFile,$pathImages,getParameter('PGNUBR',$cnx->num));
           
     $sortColumn=new sort_column('columns_sort',$targetFile,$pathImages);
	 
	 displayButton($button_new_column,$pathImages.'app/new.png',$targetFile.'&action=new_column');	
	 
     $pageNumbering->display_navigator($text_no_item);?>
     <table class="TableData">
       <tr>
         <th><?php echo $text_tag; $sortColumn->display_sort_buttons('column_tag');?></th> 
         <th><?php echo $text_name; $sortColumn->display_sort_buttons('column_name');?></th>
         <th><?php echo $text_description;?></th>
		 <th><?php echo $text_status;?></th>
		 <th><center><a href="#" class="<?php echo TipCssDisplay($text_workflow);?>"><img src="<?php echo $pathImages;?>workflow.gif" border="0"  /><span><?php echo $text_workflow;?></span></a></center></th>		 
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_management);?>"><img src="<?php echo $pathImages;?>file.gif" border="0" /><span><?php echo $text_management;?></span></a></center></th>       
       </tr><?php
       $request=new requete($sqlColumns.$sortColumn->return_sql_order_by().$pageNumbering->return_sql_limit(),$cnx->num);
       $resultsArray=$request->getArrayFields();
              
       for ($i=0;$i<count($resultsArray);$i++)
       {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td><?php echo $resultsArray[$i]['column_tag'];?></td>
           <td><?php echo $resultsArray[$i]['column_name'];?></td>
           <td><?php echo $resultsArray[$i]['column_usage'];?></td>
		   <td><?php echo $wkf->valeur_etat($resultsArray[$i]['column_status_id_fk']); ?></td>			 
           <td class="nowrap"><center><?php
		     $status_list=$wkf->etats_suivants_tablo($resultsArray[$i]['column_tag']);
			 for ($k=0;$k<count($status_list);$k++)
			 {?>
			     <a href="<?php echo $targetFile;?>&action=change_status&new_status_id=<?php echo $status_list[$k]['status_id']; ?>&column_tag=<?php echo $resultsArray[$i]['column_tag'];?>" class="<?php echo TipCssDisplay($action_change_status.' : '.$status_list[$k]['status_value']);?>"><img src="<?php echo $pathImages.$status_list[$k]['status_icon'];?>" border="0"  /><span><?php echo $action_change_status.' : '.$status_list[$k]['status_value'];?></span></a><?php
			 }?></center>
		   </td> 	
           <td class="nowrap">
		    <center>
		     <a href="<?php echo $targetFile;?>&action=modify&id_to_modify=<?php echo $resultsArray[$i]['column_tag'];?>" class="info"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_modify;?></span></a><?php
			 $request->envoi("SELECT COUNT(project_id_fk) AS nbProjects 
			                  FROM kados_projects_columns 
							  WHERE column_tag_fk='".$resultsArray[$i]['column_tag']."'");
			 $request->getObject();
			 if ($request->objet->nbProjects==0)
             {?>
               <a href="<?php echo $targetFile;?>&action=delete&id_to_delete=<?php echo $resultsArray[$i]['column_tag'];?>" class="info" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');"><img src="<?php echo $pathImages;?>delete.gif" border=0 /><span><?php echo $action_delete;?></span></a><?php
             }?>
		    </center>
		   </td>
         </tr><?php
       }?>
     </table><?php
  }

$cnx->close();  

require_once $pathBase.'footer.php';?>