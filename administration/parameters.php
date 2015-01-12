<?php
/**
 * parameters.php
 * Parameters management
 *
 * PHP versions 4 and 5
 *
 * @framework_ Scripts
 * @package  Project_Mngt:administration
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     
$pathBase='../';
require_once $pathBase.'header.php';
$targetFile='parameters.php?';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$displayTable=true;

  switch ($_REQUEST['action'])
  {
    case 'modify':
      $request=new requete("SELECT parameter_translation_value AS parameter_name,parameter_value FROM framework_parameters,framework_parameters_translations WHERE parameter_translation_language='".$_SESSION['language']."' AND parameter_tag_id=parameter_tag_id_fk AND parameter_tag_id='".$_REQUEST['id_to_modify']."'",$cnx->num);
      $parameter=$request->getObject();?>
      <form action="<?php echo $targetFile;?>&action=submit_modify" method="post" enctype="multipart/form-data" name="form_parameter">
       <fieldset class="fieldset">
         <legend class="legend"><?php echo $legend_changing_m.' '.lcfirst($text_parameter).' : '.$parameter->parameter_name;?></legend>
         <input type="hidden" name="form_item_parameter_tag_id" value="<?php echo $_REQUEST['id_to_modify'];?>">
         <label class="label required_field50" ><?php echo $text_value;?></label>
         <input class="std_form_field" name="form_item_parameter_value" type="text" size="30" value="<?php echo $parameter->parameter_value;?>" /><div class="clearleft"></div>
         <br />
		 <div style="margin-left:15px;"><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormParameter()');	
           displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		 </div>  
       </fieldset><div class="clearleft"></div>
      </form><?php
      $displayTable=false;  	
    break;	
     
    case 'submit_modify':
  	  $request=new requete("UPDATE framework_parameters SET parameter_value='".$_POST['form_item_parameter_value']."' WHERE parameter_tag_id='".$_REQUEST['form_item_parameter_tag_id']."'",$cnx->num);
          $mcnx->num->framework_parameters->update(array('parameter_tag_id'=>$_REQUEST['form_item_parameter_tag_id']),array('$set'=>array('parameter_value'=>$_POST['form_item_parameter_value'])),array('multiple' => true));
        ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;  
     
	case 'change_button':
	  // switch between use or no use of country field
  	  $request=new requete("SELECT parameter_value from framework_parameters WHERE parameter_tag_id='".$_REQUEST['parameter_id']."'",$cnx->num);
            list($paramVal) = $request->recup_array_mono();
            
  	  $request=new requete("UPDATE framework_parameters SET parameter_value=NOT(parameter_value) WHERE parameter_tag_id='".$_REQUEST['parameter_id']."'",$cnx->num);
          $mcnx->num->framework_parameters->update(array('parameter_tag_id'=>$_REQUEST['parameter_id']),array('$set'=>array('parameter_value'=>!$paramVal)),array('multiple' => true));            
	break;		 
  }  	 
  
  if ($displayTable)
  {
    // display parameters with switch?>
	<div class="MessageBox InformationMessageBox"><?php echo $msg_managing_parameters_switch;?></div><?php
    $sqlParametersSW="SELECT parameter_tag_id,parameter_translation_value AS parameter_name,parameter_value 
	                  FROM framework_parameters,framework_parameters_translations 
					  WHERE parameter_translation_language='".$_SESSION['language']."' AND parameter_type='SWITCH' 
					  AND parameter_tag_id=parameter_tag_id_fk AND parameter_display=1"; 
    $request=new requete($sqlParametersSW,$cnx->num); 	  	         
	$resultsArray=$request->getArrayFields();
    for ($i=0;$i<count($resultsArray);$i++)
    {
        $buttonText=$resultsArray[$i]['parameter_name'];
        $urlButtonOnOff=$targetFile.'&action=change_button&parameter_id='.$resultsArray[$i]['parameter_tag_id'];
        $boolOnOff=$resultsArray[$i]['parameter_value'];
        include $pathBase.'common_scripts/on_off_button.php';
	}?>
	<div class="clearleft"></div><br /><br /> <?php
		
    unset($resultsArray);
    // display parameters in INT or STRING format?>
	<div class="MessageBox InformationMessageBox"><?php echo $msg_managing_parameters;?></div><?php
     $sqlParameters="SELECT parameter_tag_id,parameter_translation_value AS parameter_name,parameter_value 
	                  FROM framework_parameters,framework_parameters_translations 
					  WHERE parameter_translation_language='".$_SESSION['language']."' AND parameter_type IN ('INT','STRING') 
					  AND parameter_tag_id=parameter_tag_id_fk AND parameter_display=1"; 
     $request=new requete($sqlParameters,$cnx->num); 	  	     
     $request->calc_nb_elt();
     $pageNumbering=new page_numbering('page_parameters',$request->nb_elt,$targetFile,$pathImages,getParameter('PGNUBR',$cnx->num));
           
     $sortColumn=new sort_column('param_sort',$targetFile,$pathImages);
     $pageNumbering->display_navigator($text_no_item);?>
     <table class="TableData">
       <tr>
         <th><?php echo $text_tag; $sortColumn->display_sort_buttons('parameter_tag_id');?></th> 
         <th><?php echo $text_parameter; $sortColumn->display_sort_buttons('parameter_name');?></th>
         <th><?php echo $text_value;?></th>
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_management);?>"><img src="<?php echo $pathImages;?>file.gif" border="0" /><span><?php echo $text_management;?></span></a></center></th>       
       </tr><?php
       $request=new requete($sqlParameters.$sortColumn->return_sql_order_by().$pageNumbering->return_sql_limit(),$cnx->num);
       $resultsArray=$request->getArrayFields();
              
       for ($i=0;$i<count($resultsArray);$i++)
       {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td><?php echo $resultsArray[$i]['parameter_tag_id'];?></td>
           <td><?php echo $resultsArray[$i]['parameter_name'];?></td>
           <td><?php echo $resultsArray[$i]['parameter_value'];?></td>
           <td class="nowrap"><center><a href="<?php echo $targetFile;?>&action=modify&id_to_modify=<?php echo $resultsArray[$i]['parameter_tag_id'];?>" class="info"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_modify;?></span></a></center></td>
         </tr><?php
       }?>
     </table><?php
  }

$cnx->close();  

require_once $pathBase.'footer.php';?>