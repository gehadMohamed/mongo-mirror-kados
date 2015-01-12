<?php
  require_once '../session_settings.php';
  require '../messages/'.$_SESSION['language'].'_ihm_messages.php'; 
  require '../messages/'.$_SESSION['language'].'_js_messages.php';
  require '../messages/'.$_SESSION['language'].'_app_messages.php';  
  require '../common_scripts/functions.php';
?>
$(document).ready(function() {
	$('.trashspan').click(function(e) {
		// set the x and y offset of the poof animation <div> from cursor position (in pixels)
		var xOffset = 0;
		var yOffset = 0;
        
		if (confirm("<?php echo $msg_confirm_send_object_to_trash;?>"))
		{
		  // send post-it to trash
		  $(this).parent().parent().fadeOut('slow');
		  setTimeout("formDelSubmit("+$(this).parent().parent().find('span.data').text()+")",900);
		}  
	});
});

$(document).ready(function() {
	$('.delspan').click(function(e) {
		// set the x and y offset of the poof animation <div> from cursor position (in pixels)
		var xOffset = 0;
		var yOffset = 0;
        
		if (confirm("<?php echo $msg_confirm_delete_object;?>"))
		{
		  // send post-it to trash
		  $(this).parent().parent().fadeOut('slow');
		  setTimeout("formDelSubmit("+$(this).parent().parent().find('span.data').text()+")",900);
		}  
	});
});

function formDelSubmit(id)
{
  document.forms['form_del_item'+id].submit();
}


