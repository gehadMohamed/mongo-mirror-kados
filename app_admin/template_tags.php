<?php
/**
 * Tags template management
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
$targetFile='template_tags.php?';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$displayTable=true;

  switch ($_REQUEST['action'])
  {
  	case 'delete':
  	  $request=new requete("DELETE FROM kados_tags WHERE tag_id=".$_REQUEST['id_to_delete'],$cnx->num);
            $mcnx->num->kados_tags->remove(array('tag_id'=>$_REQUEST['id_to_delete']));
            ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;
	
    case 'new_tag':
	  $colors=array();
	  $request->envoi("SELECT color_name FROM kados_colors");
	  $colors=$request->recup_array_mono();?>
      <form action="<?php echo $targetFile;?>&action=submit_new" method="post" enctype="multipart/form-data" name="form_tag">
       <fieldset class="fieldset">
         <legend class="legend"><?php echo $legend_creation_f.' '.lcfirst($text_tag);?></legend>
         <label class="label required_field50" ><?php echo $text_tag;?></label>
         <input class="std_form_field" name="form_item_tag" type="text" size="12" maxlength="12" value="" /><div class="clearleft"></div>			 
         <label class="label required_field50" style="margin-right:5px;"><?php echo $text_color;?></label>
		 <div style="margin-top:1px;margin-bottom:5px;">
		 <?php
		 for ($i=0;$i<count($colors);$i++)
		 {?>
           <span class="colorDisplay <?php echo $colors[$i];?>"><input value="<?php echo $colors[$i];?>" type="radio" name="form_item_color" checked="checked"/></span> <?php
		 }?>  
		 </div>
         <div class="clearleft"></div>			 
         <label class="label length50" ><?php echo $text_type;?></label>
		 <select name="form_item_type" class="std_form_field_liste" >
           <option  value="ALL_MAND" ><?php echo $tagTypeDisplay['ALL_MAND'];?></option>
		   <option  value="ALL_FREE" ><?php echo $tagTypeDisplay['ALL_FREE'];?></option>
         </select><div class="clearleft"></div>	 
         <br />
		 <div style="margin-left:15px;"><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormTag()');	
           displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		 </div>  
       </fieldset><div class="clearleft"></div>
      </form><?php
      $displayTable=false;
    break;
  
    case 'submit_new':
	  $wkf=new workflow('TAG','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
 	  $request=new requete("INSERT INTO kados_tags (tag_label,tag_owner,tag_color,tag_type,tag_status_id_fk) 
	                        VALUES ('".$_POST['form_item_tag']."',
							        '".$_SESSION['login']."',
									'".$_POST['form_item_color']."',
							        '".$_POST['form_item_type']."',
									".$wkf->init_statut().")",$cnx->num);
                   $mrequest=new requete("SELECT * FROM kados_tags WHERE tag_id='".$request->insert_id()."'",$cnx->num);
    
         $mcnx->num->kados_tags->insert(array_shift($mrequest->recup_array_champ()));
          ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_created;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php	
	break;
  
  	case 'modify':
  	  $request=new requete("SELECT * 
	                        FROM kados_tags 
							WHERE tag_id='".$_REQUEST['id_to_modify']."'",$cnx->num);
      $tagData=$request->getObject();
	  $colors=array();
	  $request->envoi("SELECT color_name FROM kados_colors");
	  $colors=$request->recup_array_mono();	  ?>
      <form action="<?php echo $targetFile;?>&action=submit_modify" method="post" enctype="multipart/form-data" name="form_tag">
       <fieldset class="fieldset">
       <fieldset class="fieldset">
         <legend class="legend"><?php echo $legend_creation_f.' '.lcfirst($text_tag);?></legend>
		 <input type="hidden" name="tag_id" value="<?php echo $_REQUEST['id_to_modify'];?>">
         <label class="label required_field50" ><?php echo $text_tag;?></label>
         <input class="std_form_field" name="form_item_tag" type="text" size="12" maxlength="12" value="<?php echo $tagData->tag_label;?>" /><div class="clearleft"></div>			 
         <label class="label required_field50" style="margin-right:5px;"><?php echo $text_color;?></label>
		 <div style="margin-top:1px;margin-bottom:5px;">
		 <?php
		 for ($i=0;$i<count($colors);$i++)
		 {?>
           <span class="colorDisplay <?php echo $colors[$i];?>"><input type="radio"  value="<?php echo $colors[$i];?>" name="form_item_color" <?php if ($colors[$i]==$tagData->tag_color) { echo 'checked="checked"';}?>/></span> <?php
		 }?>  
		 </div>
         <div class="clearleft"></div>			 
         <label class="label length50" ><?php echo $text_type;?></label>
		 <select name="form_item_type" class="std_form_field_liste" >
           <option  value="ALL_MAND" <?php if ('ALL_MAND'==$tagData->tag_type) { echo 'selected="selected"';}?>><?php echo $tagTypeDisplay['ALL_MAND'];?></option>
		   <option  value="ALL_FREE" <?php if ('ALL_FREE'==$tagData->tag_type) { echo 'selected="selected"';}?>><?php echo $tagTypeDisplay['ALL_FREE'];?></option>
         </select><div class="clearleft"></div>	 
         <br />
		 <div style="margin-left:15px;"><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormTag()');	
           displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		 </div>  
       </fieldset><div class="clearleft"></div>
      </form><?php
      $displayTable=false;  	
    break;	
     
    case 'submit_modify':
  	  $request=new requete("UPDATE kados_tags 
	                        SET tag_label='".$_POST['form_item_tag']."',tag_type='".$_POST['form_item_type']."', 
							    tag_color='".$_POST['form_item_color']."'
	                        WHERE tag_id='".$_REQUEST['tag_id']."'",$cnx->num);
        $mcnx->num->kados_tags->update(array('tag_id'=>$_REQUEST['tag_id']),array('$set'=>array('tag_label'=>$_POST['form_item_tag'],'tag_type'=>$_POST['form_item_type'],'tag_color'=>$_POST['form_item_color'])),array('multiple' => true));
        ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;  
     
	case 'change_status':
	  $wkf=new workflow('TAG','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
      $wkf->change_object_status($_REQUEST['tag_id'],$_REQUEST['new_status_id']);?>
	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_status_changed;?></div><?php
	break;			 
  }  	 
  
  if ($displayTable)
  {
     $wkf=new workflow('TAG','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
	 $wkf->set_profile('framework_workflows_transitions_profiles','profile_id_fk',$_SESSION['user_profile']);
  
     $sqlTags="SELECT * FROM kados_tags WHERE tag_type IN ('ALL_FREE','ALL_MAND')"; 
     $request=new requete($sqlTags,$cnx->num); 	  	     
     $request->calc_nb_elt();
     $pageNumbering=new page_numbering('page_tags',$request->nb_elt,$targetFile,$pathImages,getParameter('PGNUBR',$cnx->num));
           
     $sortColumn=new sort_column('tags_sort',$targetFile,$pathImages);
	 
	 displayButton($button_new_tag,$pathImages.'app/new.png',$targetFile.'&action=new_tag');	
	 
     $pageNumbering->display_navigator($text_no_item);?>
     <table class="TableData">
       <tr>
         <th><?php echo $text_color; ?></th> 
         <th><?php echo $text_tag; $sortColumn->display_sort_buttons('tag_label');?></th>
         <th><?php echo $text_type; $sortColumn->display_sort_buttons('tag_type');?></th>		 
         <th><?php echo $text_creator;?></th>
		 <th><?php echo $text_status;?></th>
		 <th><center><a href="#" class="<?php echo TipCssDisplay($text_workflow);?>"><img src="<?php echo $pathImages;?>workflow.gif" border="0"  /><span><?php echo $text_workflow;?></span></a></center></th>		 
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_management);?>"><img src="<?php echo $pathImages;?>file.gif" border="0" /><span><?php echo $text_management;?></span></a></center></th>       
       </tr><?php
       $request=new requete($sqlTags.$sortColumn->return_sql_order_by().$pageNumbering->return_sql_limit(),$cnx->num);
       $resultsArray=$request->getArrayFields();
              
       for ($i=0;$i<count($resultsArray);$i++)
       {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td><div class="colorDisplay <?php echo $resultsArray[$i]['tag_color'];?>"></div></td>
           <td><?php echo $resultsArray[$i]['tag_label'];?></td>
		   <td><?php echo $tagTypeDisplay[$resultsArray[$i]['tag_type']];?></td>
           <td><?php echo $resultsArray[$i]['tag_owner'];?></td>
		   <td><?php echo $wkf->valeur_etat($resultsArray[$i]['tag_status_id_fk']); ?></td>			 
           <td class="nowrap"><center><?php
		     $status_list=$wkf->etats_suivants_tablo($resultsArray[$i]['tag_id']);
			 for ($k=0;$k<count($status_list);$k++)
			 {?>
			     <a href="<?php echo $targetFile;?>&action=change_status&new_status_id=<?php echo $status_list[$k]['status_id']; ?>&tag_id=<?php echo $resultsArray[$i]['tag_id'];?>" class="<?php echo TipCssDisplay($action_change_status.' : '.$status_list[$k]['status_value']);?>"><img src="<?php echo $pathImages.$status_list[$k]['status_icon'];?>" border="0"  /><span><?php echo $action_change_status.' : '.$status_list[$k]['status_value'];?></span></a><?php
			 }?></center>
		   </td> 	
           <td class="nowrap">
		    <center>
		     <a href="<?php echo $targetFile;?>&action=modify&id_to_modify=<?php echo $resultsArray[$i]['tag_id'];?>" class="info"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_modify;?></span></a><?php
			 $request->envoi("SELECT COUNT(tag_id_fk) AS nbTags 
			                  FROM kados_tags_postit 
							  WHERE tag_id_fk='".$resultsArray[$i]['tag_id']."'");
			 $request->getObject();
			 if ($request->objet->nbTags==0)
             {?>
               <a href="<?php echo $targetFile;?>&action=delete&id_to_delete=<?php echo $resultsArray[$i]['tag_id'];?>" class="info" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');"><img src="<?php echo $pathImages;?>delete.gif" border=0 /><span><?php echo $action_delete;?></span></a><?php
             }?>
		    </center>
		   </td>
         </tr><?php
       }?>
     </table><?php
  }

$cnx->close();  

require_once $pathBase.'footer.php';?>