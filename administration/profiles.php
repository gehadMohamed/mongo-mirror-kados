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
$targetFile='profiles.php?';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

if (!isset($_SESSION['mng_profile_id']))
{
  $_SESSION['mng_profile_id']=0;
}  

if (isset($_REQUEST['mng_profile_id']))
{
  $_SESSION['mng_profile_id']=$_REQUEST['mng_profile_id'];
}

$profileTypeList['LOCAL']=$text_local;
$profileTypeList['GLOBAL']=$text_global;

$displayTable=true;

  switch ($_REQUEST['action'])
  {
  	case 'delete':
  	  $request=new requete('DELETE FROM framework_profiles WHERE profile_id='.$_REQUEST['id_to_delete'],$cnx->num);
            $mcnx->num->framework_profiles->remove(array('profile_id'=>$_REQUEST['id_to_delete']));
	  $request->envoi('DELETE FROM framework_profiles_constitution_actions WHERE profile_id_fk='.$_REQUEST['id_to_delete']);
          $mcnx->num->framework_profiles_constitution_actions->remove(array('profile_id_fk'=>$_REQUEST['id_to_delete']));
	  $request->envoi('DELETE FROM framework_profiles_constitution_menus WHERE profile_id_fk='.$_REQUEST['id_to_delete']);
          $mcnx->num->framework_profiles_constitution_menus->remove(array('profile_id_fk'=>$_REQUEST['id_to_delete']));
	  $request->envoi('DELETE FROM framework_workflows_transitions_profiles WHERE profile_id_fk='.$_REQUEST['id_to_delete']);
          $mcnx->num->framework_workflows_transitions_profiles->remove(array('profile_id_fk'=>$_REQUEST['id_to_delete']));
          ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;
	  
  	case 'modify':
  	  $request=new requete("SELECT profile_name,profile_type,profile_tag FROM framework_profiles WHERE profile_id=".$_REQUEST['id_to_modify'],$cnx->num);
      $profile=$request->getObject();?>
      <form action="<?php echo $targetFile;?>&action=submit_modify" method="post" enctype="multipart/form-data" name="form_profile">
       <fieldset class="fieldset">
         <legend class="legend"><?php echo $legend_changing_m.' '.lcfirst($text_profile);?></legend>
         <input type="hidden" name="form_item_profile_id" value="<?php echo $_REQUEST['id_to_modify'];?>">
         <label class="label required_field50" ><?php echo $text_tag;?></label>
         <input class="std_form_field" name="form_item_tag" type="text" size="15" maxlength="15" value="<?php echo $profile->profile_tag;?>" /><div class="clearleft"></div>			 
         <label class="label required_field50" ><?php echo $text_profile;?></label>
         <input class="std_form_field" name="form_item_profile" type="text" size="30" value="<?php echo $profile->profile_name;?>" /><div class="clearleft"></div>
         <label class="label required_field50" ><?php echo $text_type;?></label>
	     <input class="readonly_form_field" readonly="readonly" name="form_item_type" value="<?php echo $profileTypeList[$profile->profile_type];?>" type="text">	  
		 <div class="clearleft"></div>		 
         <br />
		 <div style="margin-left:15px;"><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormProfile()');	
           displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		 </div>  
       </fieldset><div class="clearleft"></div>
      </form><?php
      $displayTable=false;  	
    break;	
     
    case 'submit_modify':
  	  $request=new requete("UPDATE framework_profiles 
	                        SET profile_name='".$_POST['form_item_profile']."',profile_tag='".$_POST['form_item_tag']."' 
	                        WHERE profile_id=".$_REQUEST['form_item_profile_id'],$cnx->num);
        $mcnx->num->framework_profiles->update(array('profile_id'=>$_REQUEST['form_item_profile_id']),array('$set'=>array('profile_name'=>$_POST['form_item_profile'],'profile_tag'=>$_POST['form_item_tag'])),array('multiple' => true));
        ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;  
     
    case 'new':?>
      <form action="<?php echo $targetFile;?>&action=submit_new" method="post" enctype="multipart/form-data" name="form_profile">
       <fieldset class="fieldset">
       <legend class="legend"><?php echo $legend_creation_m.' '.lcfirst($text_profile);?></legend>
         <label class="label required_field50" ><?php echo $text_tag;?></label>
         <input class="std_form_field" name="form_item_tag" type="text" size="15" maxlength="15" /><div class="clearleft"></div>	   
         <label class="label required_field50" ><?php echo $text_profile;?></label>
         <input class="std_form_field" name="form_item_profile" type="text" size="30" /><div class="clearleft"></div>
         <label class="label required_field50" ><?php echo $text_type;?></label>
	       <input name="form_item_type" value="GLOBAL" type="radio" checked="checked"><?php echo $text_global;?>
           <input name="form_item_type" value="LOCAL" type="radio" ><?php echo $text_local;?>		  
		 <div class="clearleft"></div>			 
         <br />
		 <div style="margin-left:15px;"><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormProfile()');	
           displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		 </div>
       </fieldset><div class="clearleft"></div>
      </form> <?php
      $displayTable=false;
    break;
    
    case 'submit_new':

  	  $request=new requete("INSERT INTO framework_profiles (profile_name,profile_type,profile_tag) 
	                        VALUES ('".$_POST['form_item_profile']."','".$_POST['form_item_type']."','".$_POST['form_item_tag']."')",$cnx->num);
         
    // MONGO          
    $mrequest=new requete("SELECT * FROM framework_profiles WHERE profile_id='".$request->insert_id()."'",$cnx->num);
    
    $mcnx->num->framework_profiles->insert(array_shift($mrequest->recup_array_champ()));

        ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_created;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;
	
	case 'activate_menu':
	  $request=new requete("INSERT INTO framework_profiles_constitution_menus (profile_id_fk,menu_tag_fk) VALUES (".$_SESSION['mng_profile_id'].",'".$_REQUEST['menu_tag']."')",$cnx->num);
          $mcnx->num->framework_profiles_constitution_menus->insert(array('profile_id_fk'=>$_SESSION['mng_profile_id'],'menu_tag_fk'=>$_REQUEST['menu_tag']));  
	break;
	
	case 'disable_menu':
	  $request=new requete("DELETE FROM framework_profiles_constitution_menus WHERE profile_id_fk=".$_SESSION['mng_profile_id']." AND menu_tag_fk='".$_REQUEST['menu_tag']."'",$cnx->num);
            $mcnx->num->framework_profiles_constitution_menus->remove(array('profile_id_fk'=>$_SESSION['mng_profile_id'],'menu_tag_fk'=>$_REQUEST['menu_tag']));
	break;	
	
	case 'activate_action':
	  $request=new requete("INSERT INTO framework_profiles_constitution_actions (profile_id_fk,action_tag_fk) VALUES (".$_SESSION['mng_profile_id'].",'".$_REQUEST['action_tag']."')",$cnx->num);
          $mcnx->num->framework_profiles_constitution_actions->insert(array('profile_id_fk'=>$_SESSION['mng_profile_id'],'action_tag_fk'=>$_REQUEST['action_tag']));  
	break;
	
	case 'disable_action':
	  $request=new requete("DELETE FROM framework_profiles_constitution_actions WHERE profile_id_fk=".$_SESSION['mng_profile_id']." AND action_tag_fk='".$_REQUEST['action_tag']."'",$cnx->num);
            $mcnx->num->framework_profiles_constitution_actions->remove(array('profile_id_fk'=>$_SESSION['mng_profile_id'],'action_tag_fk'=>$_REQUEST['action_tag']));
	break;	
	
	case 'activate_transition':
	  $request=new requete("INSERT INTO framework_workflows_transitions_profiles (profile_id_fk,transition_id_fk) VALUES (".$_SESSION['mng_profile_id'].",".$_REQUEST['transition_id'].")",$cnx->num);
          $mcnx->num->framework_workflows_transitions_profiles->insert(array('profile_id_fk'=>$_SESSION['mng_profile_id'],'transition_id_fk'=>$_REQUEST['transition_id']));  
	break;
	
	case 'disable_transition':
	  $request=new requete("DELETE FROM framework_workflows_transitions_profiles WHERE profile_id_fk=".$_SESSION['mng_profile_id']." AND transition_id_fk=".$_REQUEST['transition_id'],$cnx->num);
            $mcnx->num->framework_workflows_transitions_profiles->remove(array('profile_id_fk'=>$_SESSION['mng_profile_id'],'transition_id_fk'=>$_REQUEST['transition_id']));	break;		

	case 'set_default':
	  $request=new requete('UPDATE framework_profiles SET profile_default=0',$cnx->num);
            $mcnx->num->framework_profiles->update(array(),array('$set'=>array('profile_default'=>'0')),array('multiple' => true));
	  $request->envoi('UPDATE framework_profiles SET profile_default=1 WHERE profile_id='.$_REQUEST['profile_id_2set']);
          $mcnx->num->framework_profiles->update(array('profile_id'=>$_REQUEST['profile_id_2set']),array('$set'=>array('profile_default'=>'1')),array('multiple' => true));
          
	break;	
  }  	 

if ($_SESSION['mng_profile_id']==0)
{
  if ($displayTable)
  {
     displayButton($button_new_profile,$pathImages.'profile.png',$targetFile.'&action=new');	
     
     $sql_profiles='SELECT profile_id,profile_name FROM framework_profiles'; 
     $request=new requete($sql_profiles,$cnx->num); 	  	     
     $request->calc_nb_elt();
     $pageNumbering=new page_numbering('page_profiles',$request->nb_elt,$targetFile,$pathImages,getParameter('PGNUBR',$cnx->num));
           
     $sortColumn=new sort_column('profile_sort',$targetFile,$pathImages);
     $pageNumbering->display_navigator($text_no_item);?>
     <table class="TableData">
       <tr> 
	     <th><?php echo $text_tag; $sortColumn->display_sort_buttons('profile_tag');?></th>
         <th><?php echo $text_profile; $sortColumn->display_sort_buttons('profile_name');?></th>
		 <th><?php echo $text_type; $sortColumn->display_sort_buttons('profile_type');?></th>
		 <th><center><a href="#" class="<?php echo TipCssDisplay($text_actions);?>"><img src="<?php echo $pathImages;?>action.gif" border="0"  /><span><?php echo $text_actions;?></span></a></center></th>		 		 
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_management);?>"><img src="<?php echo $pathImages;?>file.gif" border="0" /><span><?php echo $text_management;?></span></a></center></th>       
       </tr><?php
       $request=new requete("SELECT profile_id,profile_name,profile_tag,profile_default,profile_type,workflow_translation_value AS wf_name FROM framework_profiles LEFT JOIN framework_workflows ON wf_favorite_profile_id_fk=profile_id LEFT JOIN framework_workflows_translations ON wf_id=workflow_id_fk AND workflow_translation_language='".$_SESSION['language']."' ".$sortColumn->return_sql_order_by().$pageNumbering->return_sql_limit(),$cnx->num);
     
       $resultsArray=$request->getArrayFields();       
       for ($i=0;$i<count($resultsArray);$i++)
       {
         $request->envoi('SELECT COUNT(user_login) AS nb_item FROM framework_users WHERE user_profile_id_fk='.$resultsArray[$i]['profile_id']);
         $user_check=$request->getObject();?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
		   <td><?php echo $resultsArray[$i]['profile_tag']; ?></td>
           <td><?php
		   	  if ($resultsArray[$i]['profile_default']==1)
			  {?>
			    <img src="<?php echo $pathImages;?>set_default.gif" border="0"  /> <?php
			  }?>
		      <a href="<?php echo $targetFile;?>&mng_profile_id=<?php echo $resultsArray[$i]['profile_id']; ?>" class="std_link"><?php echo $resultsArray[$i]['profile_name'];?></a></td>
           <td><?php echo $profileTypeList[$resultsArray[$i]['profile_type']]; ?></td>
		   <td class="nowrap"><center><?php
             if ($resultsArray[$i]['profile_default']==0)
             {?>
			   <a href="<?php echo $targetFile;?>&action=set_default&profile_id_2set=<?php echo $resultsArray[$i]['profile_id'];?>" class="<?php echo TipCssDisplay($action_set_as_default);?>"><img src="<?php echo $pathImages;?>set_default.gif" border="0"  /><span><?php echo $action_set_as_default;?></span></a><?php
             }?>   </center>
		   </td> 	
		   <td class="nowrap"><center>
		      <a href="<?php echo $targetFile;?>&action=modify&id_to_modify=<?php echo $resultsArray[$i]['profile_id'];?>" class="info"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_modify;?></span></a>
              <a href="<?php echo $targetFile;?>&mng_profile_id=<?php echo $resultsArray[$i]['profile_id']; ?>" class="info"><img src="<?php echo $pathImages;?>manage.gif" border=0 /><span><?php echo $action_manage;?></span></a><?php
                 if ($user_check->nb_item==0)
                 {?>
                    <a href="<?php echo $targetFile;?>&action=delete&id_to_delete=<?php echo $resultsArray[$i]['profile_id'];?>" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');" class="info"><img src="<?php echo $pathImages;?>delete.gif" border=0 /><span><?php echo $action_delete;?></span></a><?php
                 }?>   </center>
          </td>                      
         </tr><?php
       }?>
     </table><?php
  }
}
else
{
  // display tables to manage the three axes of the profile : menus, actions, workflows transitions
  $request=new requete('SELECT * FROM framework_profiles WHERE profile_id='.$_SESSION['mng_profile_id'],$cnx->num);
  $profileData=$request->getObject();?>
  <div class="MessageBox InformationMessageBox"><?php echo $msg_managing_profile.' : '.$profileData->profile_name;?></div><?php
  displayButton($button_back_to_list,$pathImages.'back.png',$targetFile.'&mng_profile_id=0');	?>
  <div class="clearleft"></div><?php  
  
  // Get menus 
  $request->envoi('SELECT menu_tag,menu_translation_value AS menu_text,profile_id_fk,menu_father FROM framework_menus_translations,framework_menus LEFT JOIN framework_profiles_constitution_menus ON framework_profiles_constitution_menus.menu_tag_fk=menu_tag AND profile_id_fk='.$_SESSION['mng_profile_id']." WHERE menu_tag=framework_menus_translations.menu_tag_fk AND menu_translation_language='".$_SESSION['language']."' ORDER BY menu_father,menu_order");
  $request->getArrayFields();       
  $resultsArray=array();
  $resultsArraySubMenu=array();
  $cpt=0;
  for ($i=0;$i<$request->nb_elt;$i++)  
  {
    if ($request->array[$i]['menu_father']=='')
	{
      $resultsArray[$cpt]=$request->array[$i];  
	}  
	else
	{
	  $resultsArraySubMenu[$request->array[$i]['menu_father']][]=$request->array[$i];
	}
	$cpt++;
  }?>
  <div class="block25">
      <table class="TableData"  cellpadding="0" cellspacing="0">
       <tr> 
         <th  colspan="2"><?php echo $text_menu; ?></th>
         <th></th>       
       </tr><?php
       for ($i=0;$i<count($resultsArray);$i++)
       {?>
         <tr class="alt">
           <td colspan="2"><?php echo $resultsArray[$i]['menu_text'];?></td>
           <td><?php
		     if ($resultsArray[$i]['profile_id_fk']!='')
			 {?>
		       <a href="<?php echo $targetFile;?>&action=disable_menu&menu_tag=<?php echo $resultsArray[$i]['menu_tag'];?>" class="info"><img src="<?php echo $pathImages;?>power_on.png" border=0 /><span><?php echo $action_disable;?></span><?php
			 }
		     else
			 {?>
		       <a href="<?php echo $targetFile;?>&action=activate_menu&menu_tag=<?php echo $resultsArray[$i]['menu_tag'];?>" class="info"><img src="<?php echo $pathImages;?>power_off.png" border=0 /><span><?php echo $action_activate;?></span><?php
			 }?>			 
		   </td>
         </tr><?php
		 if (isset($resultsArraySubMenu[$resultsArray[$i]['menu_tag']]))
		 {
		   for ($j=0;$j<count($resultsArraySubMenu[$resultsArray[$i]['menu_tag']]);$j++)
		   {?>
              <tr>
			   <td width="20"></td> 
               <td><?php echo $resultsArraySubMenu[$resultsArray[$i]['menu_tag']][$j]['menu_text'];?></td>
               <td><?php 
			     if ($resultsArraySubMenu[$resultsArray[$i]['menu_tag']][$j]['profile_id_fk']!='')
				 {?>
		             <a href="<?php echo $targetFile;?>&action=disable_menu&menu_tag=<?php echo $resultsArraySubMenu[$resultsArray[$i]['menu_tag']][$j]['menu_tag'];?>" class="info"><img src="<?php echo $pathImages;?>power_on.png" border=0 /><span><?php echo $action_disable;?></span><?php
				 }
				 else
				 {?>
		             <a href="<?php echo $targetFile;?>&action=activate_menu&menu_tag=<?php echo $resultsArraySubMenu[$resultsArray[$i]['menu_tag']][$j]['menu_tag'];?>" class="info"><img src="<?php echo $pathImages;?>power_off.png" border=0 /><span><?php echo $action_activate;?></span><?php
				 }?>
			   </td>
             </tr><?php
		   
		   }
		 } 
       }
	   unset($resultsArray);?>	 
     </table>	   
  </div><?php
  // Get actions
  $request->envoi('SELECT action_tag,action_translation_value AS action_name,profile_id_fk FROM framework_profiles_actions_translations,framework_profiles_actions LEFT JOIN framework_profiles_constitution_actions ON action_tag=framework_profiles_constitution_actions.action_tag_fk AND profile_id_fk='.$_SESSION['mng_profile_id']." WHERE framework_profiles_actions_translations.action_tag_fk=action_tag AND action_translation_language='".$_SESSION['language']."' ORDER BY action_name");
  $resultsArray=$request->getArrayFields();  ?>
 
  <div class="block35">
     <table class="TableData"  cellpadding="0" cellspacing="0">
       <tr> 
         <th colspan="2"><?php echo $text_actions; ?></th>
         <th></th>       
       </tr><?php
       for ($i=0;$i<count($resultsArray);$i++)
       {?>
         <tr class="alt">
           <td colspan="2"><?php echo $resultsArray[$i]['action_name'];?></td>
           <td><?php
		     if ($resultsArray[$i]['profile_id_fk']!='')
			 {?>
		       <a href="<?php echo $targetFile;?>&action=disable_action&action_tag=<?php echo $resultsArray[$i]['action_tag'];?>" class="info"><img src="<?php echo $pathImages;?>power_on.png" border=0 /><span><?php echo $action_disable;?></span><?php
			 }
			 else
			 {?>
		       <a href="<?php echo $targetFile;?>&action=activate_action&action_tag=<?php echo $resultsArray[$i]['action_tag'];?>" class="info"><img src="<?php echo $pathImages;?>power_off.png" border=0 /><span><?php echo $action_activate;?></span><?php
			 }?>			 
		   </td>
         </tr><?php
       }
	 //  unset($resultsArray);?>	 
     </table>	     
  </div><?php
  $current_wf='';
  $request->envoi("SELECT workflow_translation_value AS wf_name,wf_id,transition_id,
   (SELECT status_translation_value FROM framework_status,framework_status_translations WHERE status_id=transition_initial_status AND status_id_fk=status_id AND status_translation_language='".$_SESSION['language']."') AS initial_status,
   (SELECT status_order FROM framework_status,framework_status_translations WHERE status_id=transition_initial_status AND status_id_fk=status_id AND status_translation_language='".$_SESSION['language']."') AS status_order,
   (SELECT status_translation_value FROM framework_status,framework_status_translations WHERE status_id=transition_final_status AND status_id_fk=status_id AND status_translation_language='".$_SESSION['language']."')AS final_status,
   (SELECT status_icon FROM framework_status WHERE status_id=transition_initial_status) AS initial_status_icon,
   (SELECT status_icon FROM framework_status WHERE status_id=transition_final_status)AS final_status_icon,
    profile_id_fk 
    FROM framework_workflows,framework_workflows_translations,framework_workflows_transitions LEFT JOIN framework_workflows_transitions_profiles ON transition_id_fk=transition_id AND profile_id_fk=".$_SESSION['mng_profile_id']." WHERE workflow_translation_language='".$_SESSION['language']."' AND workflow_id_fk=wf_id AND transition_wf_id_fk=wf_id ORDER BY wf_id,status_order");
  $resultsArray=$request->getArrayFields();       
  // Get workflows transitions  ?>
  <div class="block40">
     <table class="TableData" cellpadding="0" cellspacing="0">
       <tr> 
	     <th><?php echo $text_workflow; ?></th>
         <th colspan="3"><?php echo $text_transitions; ?></th>
         <th></th>       
       </tr><?php
       for ($i=0;$i<count($resultsArray);$i++)
       {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?> >
		   <td><?php
    	   if ($resultsArray[$i]['wf_id']!=$current_wf)
	       {
		     echo $resultsArray[$i]['wf_name'];
			 $current_wf=$resultsArray[$i]['wf_id'];
		   }?>
		   </td>
           <td><img src="<?php echo $pathImages.$resultsArray[$i]['initial_status_icon'];?>" border=0 /> <?php echo $resultsArray[$i]['initial_status'];?></td>
		   <td width="16"><img src="<?php echo $pathImages;?>transition.gif" border=0 /></td>
		   <td><img src="<?php echo $pathImages.$resultsArray[$i]['final_status_icon'];?>" border=0 /> <?php echo $resultsArray[$i]['final_status'];?></td>
           <td><?php
		     if ($resultsArray[$i]['profile_id_fk']!='')
			 {?>
		       <a href="<?php echo $targetFile;?>&action=disable_transition&transition_id=<?php echo $resultsArray[$i]['transition_id'];?>" class="info"><img src="<?php echo $pathImages;?>power_on.png" border=0 /><span><?php echo $action_disable;?></span></a><?php
			 }
			 else
			 {?>
		       <a href="<?php echo $targetFile;?>&action=activate_transition&transition_id=<?php echo $resultsArray[$i]['transition_id'];?>" class="info"><img src="<?php echo $pathImages;?>power_off.png" border=0 /><span><?php echo $action_activate;?></span><?php
			 }?>				 
		   </td>
         </tr><?php
       }
	   unset($resultsArray);?>	 
     </table>  
  </div>
  <div class="clearleft"></div><?php  
}
$cnx->close();  

require_once $pathBase.'footer.php';?>

