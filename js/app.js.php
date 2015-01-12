<?php
  require_once '../session_settings.php';
  require '../messages/'.$_SESSION['language'].'_ihm_messages.php'; 
  require '../messages/'.$_SESSION['language'].'_js_messages.php';  
  require '../messages/'.$_SESSION['language'].'_app_messages.php'; 
  require '../common_scripts/functions.php';
?>
// JavaScript Document
function CheckFormProject()
{
  if (document.form_project.form_item_project_name.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_name);?>"));
  document.form_project.submit();
}

function CheckFormConnection()
{
  if (document.form_connection.form_item_connection_name.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_name);?>"));
  if (document.form_connection.form_item_connection_host.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_host);?>"));
  if (document.form_connection.form_item_connection_dbname.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_dbname);?>"));	
  if (document.form_connection.form_item_connection_user.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_user);?>"));
  if (document.form_connection.form_item_connection_password.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_password);?>"));
  if (document.form_connection.form_item_connection_project_table.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_project_table);?>"));
  if (document.form_connection.form_item_connection_project_id_field.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_project_id_field);?>"));
  if (document.form_connection.form_item_connection_project_name_field.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_project_name_field);?>"));
  if (document.form_connection.form_item_connection_release_table.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_release_table);?>"));
  if (document.form_connection.form_item_connection_release_id_field.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_release_id_field);?>"));
  if (document.form_connection.form_item_connection_release_name_field.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_release_name_field);?>"));	
  document.form_connection.submit();

}

function CheckFormTag()
{
  if (document.form_tag.form_item_tag.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_name);?>"));
  document.form_tag.submit();
}

function CheckFormColor()
{
  if (document.form_color.form_item_name.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_name);?>"));
  if (document.form_color.form_item_bg_value.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_background_value);?>"));
  if (document.form_color.form_item_border_value.value=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_border_value);?>"));
  document.form_color.submit();
}

function CheckFormColumn(testTag)
{
  var tag=document.form_column.form_item_tag.value;
  if (tag=='')
    return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_tag);?>"));
  if (testTag)
  { 
    $.post('../xmlhttprequest/check_column_tag.php',{recherche:tag},function(msg){ 
	  if (parseInt(msg)==1)
	  {
       return(alert("<?php echo $text_tag_exists;?>"));
	  }  
      else
      {
        if (document.form_column.form_item_name.value=='')
          return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_name);?>"));
        document.form_column.submit();
      }	
    });
  }	
  else
  {
    if (document.form_column.form_item_name.value=='')
      return(alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_name);?>"));
    document.form_column.submit();
  }	
}

function manageDefaultButton(id,type)
{
  if (document.getElementById('choose_color_'+type+'_'+id).checked)
  {
    if (document.getElementById('default_color_'+type+'_'+id))
	{  
      document.getElementById('default_color_'+type+'_'+id).disabled=false;
	}  
	document.getElementById('meaning_color_'+type+'_'+id).disabled=false;
	document.getElementById('meaning_color_'+type+'_'+id).setAttribute("class","std_form_field");	
  }
  else
  {
    if (document.getElementById('default_color_'+type+'_'+id))
	{
	  document.getElementById('default_color_'+type+'_'+id).checked=false;  
      document.getElementById('default_color_'+type+'_'+id).disabled=true;
	}  
	document.getElementById('meaning_color_'+type+'_'+id).disabled=true;
	document.getElementById('meaning_color_'+type+'_'+id).setAttribute("class","readonly_form_field");
  }
}

function disableButton(id,type)
{
  document.getElementById('choose_color_'+type+'_'+id).disabled=true;
  if (document.getElementById('default_color_'+type+'_'+id))
  {  
    document.getElementById('default_color_'+type+'_'+id).disabled=true;
  }	
  document.getElementById('meaning_color_'+type+'_'+id).disabled=true;
}

function color_lock_unlock(id,type,lock)
{
  if (lock)
  {
    document.getElementById('choose_color_'+type+'_'+id).disabled=true;
  }
  else
  {  
    document.getElementById('choose_color_'+type+'_'+id).disabled=false;
  }
}

function updateRAF(id) 
{
  document.getElementById('note-load2finish').value=document.getElementById('note-task_load').value;
}

function showNoteDeck()
{
  $('.deck_postit_text').css('display','block');
  $('.deck_item-footer').css('display','block');
}

function hideNoteDeck()
{
  $('.deck_postit_text').css('display','none');
  $('.deck_item-footer').css('display','none');
}

function openSprintsTable(id)
{
  var tr='.sprint_table_'+id;
  var img='.img_sprint_table_'+id;
  $(img).click(function () {
  $(tr).toggle("slow");
   });    
}


function closeSprintsTable(id)
{
  var tr='.sprint_table_'+id;
  var img='.img_sprint_table_'+id;
  $(img).click(function () {
  $(tr).toggle("slow");
   });    
 }
   
function hidePriority(status)   
{
  $('.postit_text_over').css('display','none');
  $.post('xmlhttprequest/update_session.php',{recherche:'display_priority',value:'none'},function(msg){ });		
  $('.buttonPriority_link').parent().html('<a class="button buttonPriority_link" href="javascript:showPriority()"><?php echo $button_show_priority;?></a>');
  $('.buttonPriority_img').parent().html('<a class="buttonPriority_img" href="javascript:showPriority()"><img border="0" src="./images/online.png"></a>');
}

function showPriority(status)   
{
  /* Compute priority */
  $('div.note').each(function(){
    if (parseInt($(this).find('.postit_footer-right').text())!=0)
	{
      var result=Math.round(parseInt($(this).find('.postit_footer-left').text())/parseInt($(this).find('.postit_footer-right').text()));
	  $(this).find('.postit_text_over').text(result);
	}
    else
	{
	  $(this).find('.postit_text_over').text('');
	}
  });			    
  
  /* display priority */
  $('.postit_text_over').css('display','block');
  $.post('xmlhttprequest/update_session.php',{recherche:'display_priority',value:'block'},function(msg){ });		
  $('.buttonPriority_link').parent().html('<a class="button buttonPriority_link" href="javascript:hidePriority()"><?php echo $button_hide_priority;?></a>');
  $('.buttonPriority_img').parent().html('<a class="buttonPriority_img" href="javascript:hidePriority()"><img border="0" src="./images/offline.png"></a>');
}

function updateDueDate()
{
  var rel_id=document.getElementById('form_item_release').value;
  document.getElementById('form_item_due_date').value=dueDateList[rel_id]['date'];
  document.getElementById('form_item_release_name').value=dueDateList[rel_id]['name'];
}