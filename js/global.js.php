<?php
  require_once '../session_settings.php';
  require '../messages/'.$_SESSION['language'].'_ihm_messages.php'; 
  require '../messages/'.$_SESSION['language'].'_js_messages.php';
  require '../common_scripts/functions.php';
?>
// JavaScript Document
function ReplaceAll(str,find,rep){
  var reg = new RegExp(find,"gi")
  return(str.replace(reg,rep));
}

function nl2br (str, is_xhtml) {   
var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}


function CheckFormProfile()
{ 
	if (document.form_profile.form_item_tag.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.$text_tag;?>"));
	if (document.form_profile.form_item_profile.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.$text_profile;?>"));
  document.form_profile.submit();
}

function CheckFormParameter()
{ 
	if (document.form_parameter.form_item_parameter_value.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.$text_non_null_value.' '.$text_for.' '.$text_the_m.' '.$text_parameter;?>"));
  document.form_parameter.submit();
}

function CheckFormLogon()
{ 
	if (document.form_logon.Flogin.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_login);?>"));
	if (document.form_logon.Fpass.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_password);?>"));
  document.form_logon.submit();
}

function CheckFormUser(path_base,action) 
{
  if (document.form_user.form_item_login.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_login);?>"));
  if (document.form_user.form_item_firstname.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_firstname);?>"));
  if (document.form_user.form_item_name.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_name);?>"));
  if (document.form_user.form_item_email.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_email);?>"));

  if (action=='new')
  {
    if (document.form_user.form_item_password.value=='')
       return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_password);?>"));
  }   
  
  if (document.form_user.form_item_password.value!='')
  {
    if (document.form_user.form_item_password.value!=document.form_user.form_item_password_check.value)
    {
       return(alert("<?php echo $text_password_check_failed;?>"));
    }   
  }
  
  if (action=='new')
  { 
    $.post(path_base+'xmlhttprequest/check_login_unicity.php',{recherche:$('#form_item_login').val()},function(msg)
    {
      if (msg=='OK')
      {
        document.form_user.submit();
      }
      else if (msg=='EXISTS')
      {
        return(alert("<?php echo $text_login_exists;?>")); 
      }    
      else if (msg=='WRONG')
      {
        return(alert("<?php echo $text_login_forbidden;?>")); 
      }          
    });
  }
  else
  {
    document.form_user.submit();
  }  
}
   
function CheckFormAddress(target_form)
{
	if (document.forms[target_form].form_item_address_street1.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_address);?>"));
 	if (document.forms[target_form].form_item_address_zip_code.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_address_zip_code);?>"));
	if (document.forms[target_form].form_item_address_city.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_address_city);?>"));
  return 'ok';  
}

  
function affectValue(target,source)
{
  if (document.getElementById(target).value=='')
  {
    document.getElementById(target).value=document.getElementById(source).value;
    document.getElementById(source).value='';
  }	
}
