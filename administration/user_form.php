<?php
/**
 * Users management : form to create and modify
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:users
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */
 
  // Set variable to use the form for administration purpose
  $myProfile=!isset($myProfile) ? false :$myProfile;
  // Get global profiles list
  $request=new requete("SELECT profile_id,profile_name FROM framework_profiles WHERE profile_type='GLOBAL' ORDER BY profile_name ",$cnx->num);
  $profiles_list=$request->getArrayFields();  
  
  // Get languages list
  $request->envoi("SELECT language_tag,language_name FROM framework_languages ORDER BY language_name ");  
  $languagesList=$request->getArrayFields();  
  
  // If it's a new user, allow fields to be updated
  if ($_REQUEST['action']=='modify' && !$myProfile)
  {
    $displayReadonlyFields=$user->user_connection_mode=='LDAP';
	$displaySubmitButton=true;
	$checkForm=!$displayReadonlyFields;
  }
  else
  {
    $displayReadonlyFields=($global_settings_use_ldap && $myProfile &&  $user->user_connection_mode=='LDAP');
	$checkForm=!$displayReadonlyFields;
	$displaySubmitButton=true;
  }
  
  $themesList=array();
  $themesDirectory=opendir($pathBase.'themes');
  while($dirName = readdir($themesDirectory)) 
  {
	if($dirName!='.' && $dirName!='..')
	{
	  $themesList[]=$dirName;
	}
  }
  closedir($themesDirectory);  
  
  ?>  
  
      <form action="<?php echo $targetFile;?>&action=submit_<?php echo $_REQUEST['action'];?>" method="post" enctype="multipart/form-data" name="form_user"><?php
	  if ($global_settings_use_user_address)
      {?>
          <input type="hidden" name="address_id" value="<?php echo $address_data->address_id;?>"><?php
	  }?>	  
       <fieldset class="fieldset">
        <legend class="legend"><?php echo $form_legend;?></legend>
         <label class="label required_field200"  ><?php echo $text_login;?></label>
         <input class="<?php if($_REQUEST['action']!='new') { echo 'readonly';} else{ echo 'std';} ?>_form_field" name="form_item_login" id="form_item_login" type="text" size="25" value="<?php echo $user->user_login;?>" <?php if($_REQUEST['action']!='new') { echo 'readonly="readonly"';} ?> /><div class="clearleft"></div>
         <label class="label required_field200" ><?php echo $text_firstname;?></label>
         <input class="<?php if ($displayReadonlyFields) { echo 'readonly';} else{ echo 'std';} ?>_form_field" name="form_item_firstname" type="text" size="30"  value="<?php echo $user->user_firstname;?>" <?php if ($displayReadonlyFields) { echo 'readonly="readonly"';} ?> /><div class="clearleft"></div>
         <label class="label required_field200" ><?php echo $text_name;?></label>
         <input class="<?php if ($displayReadonlyFields) { echo 'readonly';} else{ echo 'std';} ?>_form_field" name="form_item_name" type="text" size="30"  value="<?php echo $user->user_name;?>" <?php if ($displayReadonlyFields) { echo 'readonly="readonly"';} ?> /><div class="clearleft"></div>
         <label class="label required_field200" ><?php echo $text_email;?></label>
         <input class="<?php if ($displayReadonlyFields) { echo 'readonly';} else{ echo 'std';} ?>_form_field" name="form_item_email" type="text" size="30"  value="<?php echo $user->user_mail;?>" <?php if ($displayReadonlyFields) { echo 'readonly="readonly"';} ?> /><div class="clearleft"></div>
         
	 <label class="label required_field200" ><?php echo $text_language;?></label>
         <select name="form_item_language" class="std_form_field_liste" ><?php
             for ($i=0;$i<count($languagesList);$i++)
             {?>
               <option  value="<?php echo $languagesList[$i]['language_tag'];?>" <?php if ($languagesList[$i]['language_tag']==$user->user_language) {echo 'selected="selected"';}?> ><?php echo $languagesList[$i]['language_name'];?></option><?php
             }?>
         </select> <div class="clearleft"></div>  		 
		 
         <label class="label required_field200" ><?php echo $text_profile;?></label><?php
		 if ($myProfile) 
		 { 
		   for ($i=0;$i<count($profiles_list);$i++)
           {
		     if ($profiles_list[$i]['profile_id']==$user->user_profile_id_fk) 
			 {?>
			   <input class="readonly_form_field" type="text" size="25" value="<?php echo $profiles_list[$i]['profile_name'];?>" /><?php
			   break;
			 }
           }
		 }
		 else
		 {?>
           <select name="form_item_profile" class="std_form_field_liste" ><?php
             for ($i=0;$i<count($profiles_list);$i++)
             {?>
               <option  value="<?php echo $profiles_list[$i]['profile_id'];?>" <?php if ($profiles_list[$i]['profile_id']==$user->user_profile_id_fk) {echo 'selected="selected"';}?> ><?php echo $profiles_list[$i]['profile_name'];?></option><?php
             }?>
           </select><?php
		 }?>  <div class="clearleft"></div>  		 <?php
		 
		 if ($myProfile) 
		 { ?>
          <label class="label required_field200" ><?php echo $text_theme;?></label>

           <select name="form_item_theme" class="std_form_field_liste" ><?php
             for ($i=0;$i<count($themesList);$i++)
             {?>
               <option  value="<?php echo $themesList[$i];?>" <?php if ($themesList[$i]==$user->user_theme) {echo 'selected="selected"';}?> ><?php echo $themesList[$i];?></option><?php
             }?>
           </select>		 
		  <div class="clearleft"></div>  		 <?php
		 }?> 
         <br /><?php
         if ($global_settings_use_user_address)
         {
           $address_required=false;
           $field_length=150;
           include $pathBase.'common_scripts/address_form.php';?>
         <br /> <?php
         }
         if (!$displayReadonlyFields)
         {?>
           <br />
           <legend class="legend"><?php echo $text_change_password;?></legend>
            <label class="label length200" id="password_fill_label"><?php echo $text_password;?></label>
            <input class="std_form_field" name="form_item_password" type="password" id="password_fill" size="20" maxlength="15" /><div class="clearleft"></div>
            <label class="label length200"  id="password_fill_check_label" ><?php echo $text_password_check;?></label>
            <input class="std_form_field" name="form_item_password_check" type="password" id="password_fill_check" size="20" maxlength="15"  />
            <img src="<?php echo $pathImages;?>tick.png" id="imgOK"  style="display:none"/><img src="<?php echo $pathImages;?>error.png" id="imgKO" style="display:none"/>
            <div class="clearleft"></div><?php
         }?>         
         <br /><?php
         if ($displaySubmitButton) 
	 {?>          
            <div style="margin-left:250px;">	 <?php
	   if ($checkForm)
	   {
	     displayButton($button_submit,$pathImages.'submit.png',"javascript:CheckFormUser('".$pathBase."','".$_REQUEST['action']."')");	
	   } 
	   else
	   {
	     displayButton($button_submit,$pathImages.'submit.png','javascript:document.form_user.submit()');	
	   } 		 
           if (!$myProfile)
           { 
             displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	
	   }?>
	   </div><?php
	 }?>

       </fieldset><div class="clearleft"></div>
      </form>