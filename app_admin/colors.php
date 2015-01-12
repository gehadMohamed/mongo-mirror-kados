<?php
/**
 * Profiles management
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:Profiles
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     
$pathBase='../';
require_once $pathBase.'header.php';
$targetFile='colors.php?';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$displayTable=true;

  switch ($_REQUEST['action'])
  {
  	case 'delete':
  	  $request=new requete('DELETE FROM kados_colors WHERE color_id='.$_REQUEST['id_to_delete'],$cnx->num);
            $mcnx->num->kados_colors->remove(array('color_id'=>$_REQUEST['id_to_delete']));
            ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;
	  
  	case 'modify':
  	  $request=new requete("SELECT color_name,color_value,color_border_value FROM kados_colors WHERE color_id=".$_REQUEST['id_to_modify'],$cnx->num);
      $color=$request->getObject();
	  // get objects of this color
	  $request->envoi("(SELECT task_id FROM kados_tasks WHERE color='".$color->color_name."')
                 UNION (SELECT us_id FROM kados_user_stories WHERE color='".$color->color_name."')");
      $request->calc_nb_elt();
	  $disableChangeName=$request->nb_elt; ?>
      <form action="<?php echo $targetFile;?>&action=submit_modify" method="post" enctype="multipart/form-data" name="form_color">
       <fieldset class="fieldset">
         <legend class="legend"><?php echo $legend_changing_f.' '.lcfirst($text_color);?></legend>
         <input type="hidden" name="form_item_color_id" value="<?php echo $_REQUEST['id_to_modify'];?>">
         <label class="label required_field200" ><?php echo $text_name;?></label>
         <input <?php if ($disableChangeName) { echo 'readonly="readonly" class="readonly_form_field"';} else { echo ' class="std_form_field" ';} ?> name="form_item_name" type="text" size="15" maxlength="20" value="<?php echo $color->color_name;?>" /><div class="clearleft"></div>			 
         <label class="label required_field200" ><?php echo $text_background_value;?></label>
         <input class="std_form_field" id="bg_color" name="form_item_bg_value" type="text" size="6" maxlength="6" value="<?php echo $color->color_value;?>" /><div class="clearleft"></div>
         <label class="label required_field200" ><?php echo $text_border_value;?></label>
	     <input class="std_form_field" id="border_color" name="form_item_border_value" size="6" maxlength="6" value="<?php echo $color->color_border_value;?>" type="text">	  <div class="clearleft"></div>		 
         <br />
		 <div style="margin-left:15px;"><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormColor()');	
           displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		 </div>  
       </fieldset><div class="clearleft"></div>
      </form><?php
      $displayTable=false;  	
    break;	
     
    case 'submit_modify':
  	  $request=new requete("UPDATE kados_colors 
	                        SET color_name='".$_POST['form_item_name']."',
							    color_value='".$_POST['form_item_bg_value']."',
							    color_border_value='".$_POST['form_item_border_value']."' 
 	                        WHERE color_id=".$_REQUEST['form_item_color_id'],$cnx->num);
        $mcnx->num->kados_colors->update(array('color_id'=>$_REQUEST['form_item_color_id']),array('$set'=>array('color_name'=>$_POST['form_item_name'],'color_value'=>$_POST['form_item_bg_value'],'color_border_value'=>$_POST['form_item_border_value'])),array('multiple' => true));
        ?>
        <style type="text/css">
          .<?php echo $_POST['form_item_name'];?>{
	         background-color:#<?php echo $_POST['form_item_bg_value'];?>;
	         border:solid #<?php echo $_POST['form_item_border_value'];?>;	
	         border-width:3px 1px 1px 1px;
          } 
        </style>							
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;  
     
    case 'new':?>
      <form action="<?php echo $targetFile;?>&action=submit_new" method="post" enctype="multipart/form-data" name="form_color">
       <fieldset class="fieldset">
         <legend class="legend"><?php echo $legend_creation_f.' '.lcfirst($text_color);?></legend>
         <label class="label required_field200" ><?php echo $text_name;?></label>
         <input class="std_form_field" name="form_item_name" type="text" size="15" maxlength="20" value="" /><div class="clearleft"></div>			 
         <label class="label required_field200" ><?php echo $text_background_value;?></label>
         <input class="std_form_field" id="bg_color" name="form_item_bg_value" type="text" size="6" maxlength="6" value="" /><div class="clearleft"></div>
         <label class="label required_field200" ><?php echo $text_border_value;?></label>
	     <input class="std_form_field" id="border_color" name="form_item_border_value" size="6" maxlength="6" value="" type="text">	  <div class="clearleft"></div>		 
         <br />
		 <div style="margin-left:15px;"><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormColor()');	
           displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		 </div>  
       </fieldset><div class="clearleft"></div>
      </form><?php
      $displayTable=false;
    break;
    
    case 'submit_new':
  	  $request=new requete("INSERT INTO kados_colors (color_name,color_value,color_border_value) 
	                        VALUES ('".$_POST['form_item_name']."','".$_POST['form_item_bg_value']."','".$_POST['form_item_border_value']."')",$cnx->num);
        
        $mrequest=new requete("SELECT * FROM kados_colors WHERE color_id='".$request->insert_id()."'",$cnx->num);
    
        $mcnx->num->kados_colors->insert(array_shift($mrequest->recup_array_champ()));
        
        ?>
        <style type="text/css">
          .<?php echo $_POST['form_item_name'];?>{
	         background-color:#<?php echo $_POST['form_item_bg_value'];?>;
	         border:solid #<?php echo $_POST['form_item_border_value'];?>;	
	         border-width:3px 1px 1px 1px;
          } 	
        </style>		  
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_created;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;
  }  	 

  if ($displayTable)
  {
    // get all color uses
    $request=new requete("(SELECT bookmark_color AS color FROM kados_users_bookmarks GROUP BY bookmark_color) 
                          UNION (SELECT color FROM kados_user_stories GROUP BY color) 
                          UNION (SELECT color FROM kados_template_activities GROUP BY color) 
                          UNION (SELECT color FROM kados_tasks GROUP BY color) 
                          UNION (SELECT tag_color AS color FROM kados_tags GROUP BY tag_color) 
                          UNION (SELECT color FROM kados_projects_users GROUP BY color) 
                          UNION (SELECT color FROM kados_issues GROUP BY color) 
                          UNION (SELECT color FROM kados_activities GROUP BY color) 
                          UNION (SELECT color FROM kados_actions GROUP BY color)",$cnx->num);
     $listUsedColors=$request->recup_array_mono();
        
      
     displayButton($button_new_color,$pathImages.'app/color.png',$targetFile.'&action=new');	
	 
     $sqlColors='SELECT * FROM kados_colors'; 
     $request=new requete($sqlColors,$cnx->num); 	  	     
     $request->calc_nb_elt();
     $pageNumbering=new page_numbering('page_colors',$request->nb_elt,$targetFile,$pathImages,getParameter('PGNUBR',$cnx->num));
           
     $sortColumn=new sort_column('color_sort',$targetFile,$pathImages);
     $pageNumbering->display_navigator($text_no_item);?>
     <table class="LineData" cellspacing="0">
       <tr> 
         <th></th>
         <th><?php echo $text_name; $sortColumn->display_sort_buttons('color_name');?></th>
	 <th><?php echo $text_background_value; ?></th>
	 <th><?php echo $text_border_value; ?></th>
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_management);?>"><img src="<?php echo $pathImages;?>file.gif" border="0" /><span><?php echo $text_management;?></span></a></center></th>       
       </tr><?php
       $request=new requete($sqlColors.$sortColumn->return_sql_order_by().$pageNumbering->return_sql_limit(),$cnx->num);
       $resultsArray=$request->getArrayFields(); 
       
       for ($i=0;$i<count($resultsArray);$i++)
       { ?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
	   <td><center><div class="colorDisplay <?php echo $resultsArray[$i]['color_name']; ?>"></div></center></td>
           <td><?php   echo $resultsArray[$i]['color_name']; ?></td>
           <td>#<?php echo $resultsArray[$i]['color_value']; ?></td>
	   <td>#<?php echo $resultsArray[$i]['color_border_value']; ?></td>
  	   <td class="nowrap">
            <center>
	     <a href="<?php echo $targetFile;?>&action=modify&id_to_modify=<?php echo $resultsArray[$i]['color_id'];?>" class="info"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_modify;?></span></a><?php
	     if (!in_array($resultsArray[$i]['color_name'],$listUsedColors))
             {?>
               <a href="<?php echo $targetFile;?>&action=delete&id_to_delete=<?php echo $resultsArray[$i]['color_id'];?>" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');" class="info"><img src="<?php echo $pathImages;?>delete.gif" border="0" /><span><?php echo $action_delete;?></span></a><?php
	     }?>  
            </center>
           </td>                      
         </tr><?php
       }?>
	
     </table><br /><?php
  }

$cnx->close();  

require_once $pathBase.'footer.php';?>

