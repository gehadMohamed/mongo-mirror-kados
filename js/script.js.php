<?php
  require_once '../session_settings.php';
  require '../messages/'.$_SESSION['language'].'_ihm_messages.php'; 
  require '../messages/'.$_SESSION['language'].'_js_messages.php';
  require '../messages/'.$_SESSION['language'].'_app_messages.php';  
  require '../common_scripts/functions.php';
?>


$(document).ready(function(){
   /* This code is executed after the DOM has been completely loaded */

   // listen for scroll
   var positionElementInPage = $('#menu').offset().top;
   $(window).scroll(
            function() {
                if ($(window).scrollTop() > positionElementInPage) {
                    // fixed
                    $('#menu').addClass("floatable");
                    $('.display_body').addClass("blockGap");
                } else {
                    // relative
                    $('#menu').removeClass("floatable");
                    $('.display_body').removeClass("blockGap");
                }
            }
    );

 
   
    $('#password_fill_check').keyup(function(){
       if ($('#password_fill').attr('value')!='')
       {
         if ($('#password_fill').attr('value')==$(this).attr('value'))
         {
           $('#imgOK').show();
           $('#imgKO').hide();
         }
         else
         {
           $('#imgKO').show();
           $('#imgOK').hide();       
         }
       }
       else
       {
         $('#imgKO').hide();
         $('#imgOK').hide();       
       }
    });

    $('#password_fill').keyup(function(){
       if ($(this).attr('value')=='')
       {
         $('#password_fill_label').removeClass('required_field200').addClass('length200');
         $('#password_fill_check_label').removeClass('required_field200').addClass('length200');
         $('#imgKO').hide();
         $('#imgOK').hide();       
       }
       else
       {
         $('#password_fill_label').removeClass('length200').addClass('required_field200');
         $('#password_fill_check_label').removeClass('length200').addClass('required_field200');
         if ($(this).attr('value')==$('#password_fill_check').attr('value'))
         {
           $('#imgOK').show();
           $('#imgKO').hide();
         } 
         else
         {
           $('#imgKO').show();
           $('#imgOK').hide();       
         }
         
       }    
    });  
    
    var pathBase="";
    if ($('.hidden-pathBase').text().length!=0)
    {
      pathBase=$('.hidden-pathBase').text();
    }   

    var tmp;

    $('#tag_filter').on('change',function(){
      if($(this).value!='')
      {
        
      }
    });
    
    // set effect to display/hide tag list
    $('.tag-zone-add').click(function() {
      var options = {};
      var status=$(this).find('.tag-list').css('display');
      if (status=='none')
      {
        $(this).find('.tag-list').show( "blind", options, 250 );
      }
      else
      {
        $(this).find('.tag-list').hide( "blind", options, 250 );
      }
    });	

    // set effect to show tags
    $('.tag-zone-out').click(function() {
	 var options = {};
     $(this).next().show( "slide", options, 250 );
    });	

    // set effect to hide tags
    $('.tag-zone').click(function() {
	 var options = {};
     $(this).hide( "slide", options, 250 );
    });		

   /* impact of resize on tags mini-slots */
   $('.postit_text').on('resize', function() {
      $(this).parent().find('.tag-zone').css('left',$(this).parent().css('width'));
      $(this).parent().find('.tag-zone-out').css('left',$(this).parent().css('width'));
      $(this).parent().find('.tag-zone-add').css('left',$(this).parent().css('width'));
    });    
    

    /* list of users for allocation*/
    // set effect to display/hide tag list
    $('.allocate_user').click(function() {
      var options = {};
      var status=$(this).find('.user-list').css('display');
      if (status=='none')
      {
        $(this).find('.user-list').show( "", options, 250 );
      }
      else
      {
        $(this).find('.user-list').hide( "", options, 250 );
      }
    });	
    

    $('#searchUser').autocomplete({
       source: "xmlhttprequest/search_user.php",
       minLength: 2,
       select: function( event, ui ) {
            $('#searchUserId').attr('value',ui.item['id']);
       }
    });

    $('#searchAnyUser').autocomplete({
       source: "xmlhttprequest/search_any_user.php",
       minLength: 2,
       select: function( event, ui ) {
            $('#searchAnyUserId').attr('value',ui.item['id']);
       }
    });
    
    $('#bg_color').ColorPicker({
	  onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
	  },
	  onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	  },
	  onChange: function (hsb, hex, rgb,el) {
		$('#bg_color').val(hex);
	  }	
    })
    $('#border_color').ColorPicker({
	  onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
	  },
	  onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	  },
	  onChange: function (hsb, hex, rgb) {
		$('#border_color').val(hex);
	  }	
    })
	
    .bind('keyup', function(){
	   $(this).ColorPickerSetColor(this.value);
    });	
	
    /* Finding the biggest z-index value of the kados_tasks */
	if ($('span.itemType').text()!='')
	{
	  $.post(pathBase+'ajax/get_maxindex.php',{note_id:0,item_type : $('span.itemType').text()},function(msg){
	    if(msg!='')
	    {
	      data=msg.split(':');
	      if(parseInt(data[1])>zIndex) {zIndex = parseInt(data[1])};
        } 
	  });
    }	  


	$('.postit_text').each(function(){
	   var text='#note'+$(this).parent().find('span.data').text();
	   $(this).resizable({
		 alsoResize: text
	  });
	});		
	
	$('.postit_text_static').each(function(){
	   var text='#note_static'+$(this).parent().parent().find('span.hidden-item').text().split(':')[0];
	   $(this).resizable({
		 alsoResize: text
	  });
	});		
	
	
	/* A helper function for converting a set of elements to draggables: */
	make_draggable($('.note'));

	$('.note').live('click',function(){
		/* on clicking a note , set zindex to be the highest  */
			$.post(pathBase+'ajax/get_maxindex.php',{note_id:$(this).find('span.data').text(),item_type : $('span.itemType').text()},function(msg){
			
			  if(msg!='')
			  {
			    data=msg.split(':');
				if(parseInt(data[1])>zIndex) {zIndex = parseInt(data[1])};
                $('div.note').each(function(){
				if (parseInt($(this).find('span.data').text())==parseInt(data[0]))
				{
				  $(this).css('z-index',++zIndex); 	  
				}
				});			  
			  } 
			});		
	})

/* exemple avec double clic � garder au cas o� 
	$('.note').live('dblclick',function(){
    var link=$(this).find('.ulbtn').attr('href');
	$(this).fancybox({
	    'href'              : link,
		'zoomSpeedIn'		: 600,
		'zoomSpeedOut'		: 500,
		'easingIn'			: 'easeOutBack',
		'easingOut'			: 'easeInBack',
		'hideOnContentClick': false,
		'padding'			: 15,
        hideOnOverlayClick:false,
        hideOnContentClick:false		
	});	
	  	  
	})*/
	
	
	$('.note_static').live('click',function(){
		/* on clicking a static note , set zindex to be the highest  */
			$.post(pathBase+'ajax/get_maxindex.php',{note_id:$(this).find('span.data').text(),item_type : $('span.itemType').text()},function(msg){
			
			  if(msg!='')
			  {
			    data=msg.split(':');
				if(parseInt(data[1])>zIndex) {zIndex = parseInt(data[1])};
                $('div.note_static').each(function(){
				if (parseInt($(this).find('span.data').text())==parseInt(data[0]))
				{
				  $(this).css('z-index',++zIndex); 	  
				}
				});			  
			  } 
			});		
	})	
	
	/* Configuring the fancybox plugin for the "Add a note" button: */

	/* Configuring the fancybox plugin for the "Add a release","Add a sprint" button: */
	$(".addButtonGeneric").fancybox({
		'zoomSpeedIn'		: 600,
		'zoomSpeedOut'		: 500,
		'easingIn'			: 'easeOutBack',
		'easingOut'			: 'easeInBack',
		'hideOnContentClick': false,
		'padding'			: 15,
        hideOnOverlayClick:false,
        hideOnContentClick:false
	});	

       
    /* Configuring the fancybox plugin for the "Update a note" button: */
	$('.ulbtn').fancybox({
		'zoomSpeedIn'		: 600,
		'zoomSpeedOut'		: 500,
		'easingIn'			: 'easeOutBack',
		'easingOut'			: 'easeInBack',
		'hideOnContentClick': false,
		'padding'			: 15,
        hideOnOverlayClick:false,
        hideOnContentClick:false
	});

	/* Listening for keyup events on fields of the "Add a note" form: */
	$('.pr-text_body,.pr-task_load,.pr-load_spent,.pr-load2finish').live('keyup',function(e){
		if(!this.preview)
			this.preview=$('#previewNote');
		
		/* Setting the text of the preview to the contents of the input field, and stripping all the HTML tags: */
		this.preview.find($(this).attr('class').replace('pr-','.')).html(nl2br($(this).val().replace(/<[^>]+>/ig,'')));
		
	});
	
	$('.pr-issue_probability').live('keyup',function(e){
		if(!this.preview)
			this.preview=$('#previewNote');
		
		/* Setting the text of the preview to the contents of the input field, and stripping all the HTML tags: */
		this.preview.find($(this).attr('class').replace('pr-','.')).html(nl2br($(this).val().replace(/<[^>]+>/ig,'')+'%'));
		
	});	

	var colorList=$('.colorList').text();
	/* Changing the color of the preview note: */
	$('.color').live('click',function(){
		$('#previewNote').removeClass(colorList).addClass($(this).attr('class').replace('color',''));
		$('.colorname').val($(this).attr('class').replace('color ',''));
	});
	
	/* The submit button for US */
	$('.us-submit').live('click',function(e){
		
		if($('.pr-text_body').val().length<1)
		{
			alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.$text_user_story;?>")
			return false;
		}
	
		/* setting the zindex value */
		$('.zindexvalue').val(++zIndex);
		// send the form
		document.form_us.submit();		
		e.preventDefault();
	})
	
	/* The submit button for tasks: */
	$('.task-submit').live('click',function(e){
		
		if($('.pr-text_body').val().length<2)
		{
			alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_task);?>")
			return false;
		}
		
		$('.zindexvalue').val(++zIndex);		
		// close the update note popin form
		document.form_task.submit();			
		e.preventDefault();
	})	

	/* The submit button for issues: */
	$('.issue-submit').live('click',function(e){
		var topic=$('.topic').val();		
		if($('.pr-text_body').val().length<1)
		{
		  if (topic=='risk')
		  {
		    alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_risk);?>")
		  }	
		  else
		  {
		    alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_problem);?>")
		  }		  
		  return false;
		}
	
        if (topic=='risk')
		{
		  if (parseInt($('.pr-issue_probability').val())>99 || parseInt($('.pr-issue_probability').val())<1)
		  {
		    if (parseInt($('.pr-issue_probability').val())==100)
			{
			  if (!confirm("<?php echo $text_risk_will_become_problem;?>"))
			  {
			    return false;
			  }
			}
			else
			{
		      alert("<?php echo $text_probability_is_percentage;?>")
			  return false;
			} 
		  }	
		}	
			
		/* setting the zindex value */
		$('.zindexvalue').val(++zIndex);
		// send the form
		document.form_issue.submit();		
		e.preventDefault();
	})
	
	/* The submit button for action : */
	$('.action-submit').live('click',function(e){
		
		if($('.pr-text_body').val().length<1)
		{
		  alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_action);?>")
		  return false;
		}
	
		/* setting the zindex value */
		$('.zindexvalue').val(++zIndex);
		// send the form
		document.form_action.submit();		
		e.preventDefault();
	})	

	/* The submit button for feature : */
	$('.feature-submit').live('click',function(e){
		
		if($('#form_item_feature_name').val().length<1)
		{
		  alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_feature);?>")
		  return false;
		}

		if($('#form_item_feature_short_label').val().length<1)
		{
		  alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_feature_short_label);?>")
		  return false;
		}
		
		// send the form
		document.form_feature.submit();		
		e.preventDefault();
	})	
		
	
	/* The submit button for activity : */
	$('.activity-submit').live('click',function(e){
		
		if($('.pr-text_body').val().length<1)
		{
		  alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_activity);?>")
		  return false;
		}
	
		/* setting the zindex value */
		$('.zindexvalue').val(++zIndex);
		// send the form
		document.form_activity.submit();		
		e.preventDefault();
	})	
	
	/* The submit button for release : */
	$('.release-submit').live('click',function(e){
		
		if($('#form_item_release').val().length<1)
		{
			alert("<?php echo $text_please_fill_in.' '.$text_one_f.' '.lcfirst($text_release);?>")
			return false;
		}		
		
		if($('#form_item_due_date').val()=='')
		{
			alert("<?php echo $text_please_select.' '.$text_one_f.' '.lcfirst($text_due_date);?>")
			return false;
		}	
		
		var dueDate=$('#form_item_due_date').val();
		var releaseId=$('#release_2update_id').val();
        $.post('xmlhttprequest/check_release_due_date_consistency.php',{
		  due_date:dueDate,
		  release_id:releaseId
		  },function(msg){
  
	     if (parseInt(msg)>0)
	     {
           alert("<?php echo $msg_due_date_must_be_greater_than_sprint_end_date;?>");
		   return false;
	     }  
		 else
		 {
		   // send the popin form
		   document.form_release.submit();			
		 }
        });		
		return false;
	})		

	/* The submit button for color use */
	$('.color-submit').live('click',function(e){
		
	   // send the popin form
	   document.form_color_use.submit();
	   return false;
	})        
        
	/* The submit button for external release : */
	$('.release-ext-submit').live('click',function(e){
		
	   // send the popin form
	   document.form_ext_release.submit();
	   return false;
	})		
	
	/* The update button: */
	$('.sprint-submit').live('click',function(e){
		
		if($('#form_item_sprint').val().length<1)
		{
			alert("<?php echo $text_please_fill_in.' '.$text_one_m.' '.lcfirst($text_sprint);?>")
			return false;
		}			
		
		if($('#form_item_start_date').val()=='')
		{
			alert("<?php echo $text_please_select.' '.$text_one_f.' '.lcfirst($text_start_date);?>")
			return false;
		}
        else
        {
		  var data_date=$('#form_item_start_date').val().split("/");
          var date_start=new Date(data_date[2],data_date[1]-1,data_date[0]);
		  var date_start_dash=data_date[2]+'-'+data_date[1]+'-'+data_date[0];
        }  
		
		if($('#form_item_end_date').val()=='')
		{
			alert("<?php echo $text_please_select.' '.$text_one_f.' '.lcfirst($text_end_date);?>")
			return false;
		}	
        else
        {
		  var data_date=$('#form_item_end_date').val().split("/");
          var date_end=new Date(data_date[2],data_date[1]-1,data_date[0]);
		  var date_end_dash=data_date[2]+'-'+data_date[1]+'-'+data_date[0];
        }  
		
		if (date_end<date_start)
		{
			alert("<?php echo ucfirst($text_the_f).' '.lcfirst($text_end_date).' '.$text_is_greater_than.' '.$text_the_f.' '.lcfirst($text_start_date);?>")
			return false;
		}

		var rel_end_date=$('#form_hidden_release_end_date').val().split("-");
        var date_end_release=new Date(rel_end_date[0],rel_end_date[1]-1,rel_end_date[2]);
		if (date_end>date_end_release)
		{
			alert("<?php echo ucfirst($text_the_f).' '.lcfirst($text_end_date).' '.$text_is_lesser_than.' '.$text_the_f.' '.lcfirst($text_due_date);?>")
			return false;
		}

		var releaseId=$('#release_add_sprint').val();
        var sprintId=$('#sprint_2update_id').val(); 		
        $.post('xmlhttprequest/check_sprint_dates_consistency.php',{
		  date_start:date_start_dash,
		  date_end:date_end_dash,
		  release_id:releaseId,
		  sprint_id:sprintId
		  },function(msg){ 
	     if (parseInt(msg)>0)
	     {
           alert("<?php echo $msg_sprint_dates_mixed_other_sprints;?>");
		   return false;
	     }  
		 else if (parseInt(msg)<0)
		 {
		   if (parseInt(msg)==-1)
		   {
		     alert("<?php echo $msg_start_date_is_no_working_day;?>");
		     return false;
		   }
		   else if (parseInt(msg)==-2)
		   {
		     alert("<?php echo $msg_end_date_is_no_working_day;?>");
		     return false;
		   }
		 }
		 else
         {		 
		   // send the popin form
		   document.form_sprint.submit();			
		 }
        });		
		return false;
	})
	
	/* The update button: */
	$('.stakeholder-submit').live('click',function(e){
		
		// send the popin form
		document.form_add_stakeholder.submit();			
		e.preventDefault();
	})		
	
	
     $.fn.qtip.styles.mystyle = { // Last part is the name of the style
       border: {
       width: 1,
	   radius: 3,
       color: 'black'
       },
	   width:{min:0,max:400},
       name: 'dark' // Inherit the rest of the attributes from the preset dark style
     }       

     $.fn.qtip.styles.stylered = { // Last part is the name of the style
       border: {
       width: 3,
	   radius: 3,
       color: '#A6110F'
       },	 
	   width:{min:0,max:350},
       color:'black',
       name: 'red' // Inherit the rest of the attributes from the preset dark style
     }
	 
     $.fn.qtip.styles.stylegreen = { // Last part is the name of the style
       border: {
       width: 3,
	   radius: 3,
       color: '#509918'
       },	 
	   width:{min:0,max:350},
       color:'black',
       name: 'green' // Inherit the rest of the attributes from the preset dark style
     }	 	 
	 
     $.fn.qtip.styles.styleyellow = { // Last part is the name of the style
       border: {
       width: 3,
	   radius: 3,
       color: '#FFD105'
       },	 
	   width:{min:0,max:350},
       color:'black',
       name: 'cream' // Inherit the rest of the attributes from the preset dark style
     }	 
	 
     $.fn.qtip.styles.styleblue = { // Last part is the name of the style
       border: {
       width: 3,
	   radius: 3,
       color: '#07084D'
       },	 
	   background:'#C6C7ED',
	   width:{min:0,max:350},
       color:'black',
       name: 'blue' // Inherit the rest of the attributes from the preset dark style
     }	 

     $.fn.qtip.styles.stylecream = { // Last part is the name of the style
       width:{min:0,max:350},
       color:'black',
       name: 'cream' // Inherit the rest of the attributes from the preset dark style
     }
	 
   // Notice the use of the each() method to acquire access to each elements attributes
   $('.postit_details img[tooltip]').each(function()
   {
      $(this).qtip({
         content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
         style: 'mystyle', // Give it a crea mstyle to make it stand out
		 show: 'mouseover',
         hide: 'mouseout'
      });
   });   
 
   // Notice the use of the each() method to acquire access to each elements attributes
   $('.parent_zone span[tooltip]').each(function()
   {
      $(this).qtip({
         content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
         style: 'stylecream', // Give it a crea mstyle to make it stand out
		 show: 'mouseover',
         hide: 'mouseout'
      });
   });   

   // Notice the use of the each() method to acquire access to each elements attributes
   $('#warning_red span[tooltip]').each(function()
   {
      $(this).qtip({
         content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
         style: 'stylered', // Give it a crea mstyle to make it stand out
		 show: 'mouseover',
         hide: 'mouseout'
      });
   });

   $('#warning_yellow span[tooltip]').each(function()
   {
      $(this).qtip({
         content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
         style: 'styleyellow', // Give it a crea mstyle to make it stand out
		 show: 'mouseover',
         hide: 'mouseout'
      });
   });
   
   $('#warning_blue span[tooltip]').each(function()
   {
      $(this).qtip({
         content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
         style: 'styleblue', // Give it a crea mstyle to make it stand out
		 show: 'mouseover',
         hide: 'mouseout'
      });
   });

   $('#warning_green span[tooltip]').each(function()
   {
      $(this).qtip({
         content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
         style: 'stylegreen', // Give it a crea mstyle to make it stand out
		 show: 'mouseover',
         hide: 'mouseout'
      });
   });   

   // Notice the use of the each() method to acquire access to each elements attributes
   $('.colMeaning img[tooltip]').each(function()
   {
      $(this).qtip({
         content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
         style: 'styleblue', // Give it a crea mstyle to make it stand out
		 show: 'mouseover',
         hide: 'mouseout'
      });
   });   

   // Notice the use of the each() method to acquire access to each elements attributes
   $('.upper_infos img[tooltip]').each(function()
   {
      $(this).qtip({
         content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
         style: 'styleblue', // Give it a crea mstyle to make it stand out
		 show: 'mouseover',
         hide: 'mouseout'
      });
   });   

   
   $('.note-form').live('submit',function(e){e.preventDefault();});
	
});

var zIndex = 0;

function make_draggable(elements)
{
	/* Elements is a jquery object: */
	
	elements.draggable({
		containment:'parent',
		start:function(e,ui){ ui.helper.css('z-index',++zIndex); },
		stop:function(e,ui){
			
		var abscisse=ui.position.left;
		var ordonnee=ui.position.top;
                var statusArray=new Array();
		var headerColArray=new Array();
		var arrayTmp=new Array();
		var columnWidth=parseInt($('.columnWidth').text());
                var itemWidth=parseInt($('.itemWidth').text());
		var xInitDefaultPosition=parseInt($('.xInitDefaultPosition').text());			
	        var dashboardType=$('.dashboardType').text();
	        var displayTopLimit=parseInt($(this).find('.hidden-title_displayed').text());
	 	var parentId=parseInt($(this).find('.hidden-parent_id').text());
                var pathBase="";
                if ($('.hidden-pathBase').text().length!=0)
                {
                  pathBase=$('.hidden-pathBase').text();
                }   

		// Build the array with status and their bounds values from the hidden data 
		$('.hidden-status').each(function(){
	            headerColArray[$(this).text().split(':')[0]]=$(this).parent().find('.colHeader').text();
	            statusArray.push($(this).text().split(':'));
		});	

		var objectId=0;
            
		// If the dashboard is a matrix get the bound ans target statuses for the Y axis 
		if (dashboardType=='multiple')
		{
		  objectId=$(this).find('span.hidden-parent_id').text();
                }
			
			// If under limit, set ypos at the max top value
			if (ordonnee<displayTopLimit)
			{
			  ordonnee=displayTopLimit;
			}	

            originalAbscisse=abscisse; 			
			// from abscisse of item shift to the middle of the item
			noteMiddle=abscisse+Math.round(itemWidth/2);
            
			// check where the middle is regarding the bounds of the status columns
			for (i=0;i<statusArray.length;i++)
			{
              if (noteMiddle<(columnWidth)*(i+1))
              {
			    columnStartPosition=parseInt(statusArray[i][1]);
			    targetStatus=statusArray[i][0];
				// If note is on another column too, reset x position on left or right so that note will be
				// just n the column border
				if (originalAbscisse<columnStartPosition)
				{
				  abscisse=columnStartPosition+xInitDefaultPosition;
				}
                if ((originalAbscisse+itemWidth)>(columnStartPosition+columnWidth))
				{
				  abscisse=columnStartPosition+columnWidth-itemWidth-xInitDefaultPosition;
				}  
				break;
              }
			}  
			// if out of bounds, set it at the upper status
			if (i==statusArray.length)
			{
			  abscisse=statusArray[i-1][1]+columnWidth-itemWidth;
			  targetStatus=statusArray[i-1][0];
			}

			// set the displayed item left position (x-position)
			ui.helper.css( { 
                left: parseInt(abscisse)
             } );
			if ($('.hidden-updateStatusField').text()!='') 
			{
			  ui.helper.find('span.'+$('.hidden-updateStatusField').text()).html(targetStatus);
			}  
			
			// If is task or action and is affected to the user, set icon
			if (($('.itemType').text()=='tasks_sprint' || $('.itemType').text()=='pbl_tasks' || $('.itemType').text()=='rbl_tasks' || $('.itemType').text()=='issues_actions') && targetStatus!=$(this).find('span.item-status').text())
			{
			  ui.helper.find('span.postit_footer-center2').find('span.user-head').html('<img src="images/app/user.png" title="<?php echo $text_assigned_to_f.' '.$_SESSION['user_fullname'];?>" />');
			}

			// If is task or action and is affected to the user, set icon
			if (($('.itemType').text()=='tasks_stakeholders') && $(this).find('span.item-status').text()!=targetStatus)
			{
			  if (targetStatus!='')
			  {
			    ui.helper.find('span.postit_footer-center2').find('span.user-head').html('<img src="images/app/user.png" title="<?php echo $text_assigned_to_f.' ';?>'+$.trim(headerColArray[targetStatus])+'" />');			    
			  }
			  else
			  {
				ui.helper.find('span.postit_footer-center2').find('span.user-head').html('');
			  }	
			}

			
			// If is task or action and status is the final one : set 2do2finish to zero 
			if (($('.itemType').text()=='tasks_sprint' || $('.itemType').text()=='pbl_tasks' || $('.itemType').text()=='rbl_tasks' || $('.itemType').text()=='issues_actions') && targetStatus==statusArray[statusArray.length-1][0] && $(this).find('span.item-status').text()!=targetStatus)
			{
			  ui.helper.find('span.postit_footer-right').html('0.0');
			}			

			// If item is issue and impact is changed
			if (($('.itemType').text()=='issues_impact'))
			{
		      ui.helper.find('span.postit_footer-left').html('<img src="images/app/impact_'+targetStatus+'.png" />');
			}			
			
			/* update priority */
			if ($('.itemType').text()=="us_poker")
			{
			  if (targetStatus!=0)
			  {
			    var result=Math.round(parseInt($(this).find('.postit_footer-left').text())/targetStatus);
	            $(this).find('.postit_text_over').text(result);
			  }	
			  else
			  {
			    $(this).find('.postit_text_over').text('');
			  }
			}  
			
			/* Sending the z-index and position of the note to update_position.php via AJAX GET: */			 
			// update database and set the top position (y-position) with the answer of the ajax script
			// ypos can be updated so that item will not be just above another item
			
			// Send as abscisse only the position in the column
			xPositionInColumn = abscisse % columnWidth;

			$.post(pathBase+'ajax/update_position.php',{
				  x		    : xPositionInColumn,
				  y		    : ordonnee,
				  z		    : zIndex,
				  status    : targetStatus,
				  item_type : $('.itemType').text(),
				  object_id : objectId,
				  parent_id : parentId,
				  id	    : parseInt(ui.helper.find('span.data').html())
			},function(msg){
			  result=msg.split(':');
			  if(parseInt(result[0]))
			  {
			    // set yop position with the answser (which a correct y-position)
			    ui.helper.css( { 
       		      top:parseInt(result[0])
                  } );
			  }
			  if(result[1]!='STDBY')
			  {
			    // find the ITEM to change 
				$('.hidden-item').each(function(){
				  item_data=$(this).text().split(':');
				  if (item_data[0]==result[2])
				  {
				    if (result[1]=='ALMOST_DONE')
					{
					  var allowUpdate=$('.hidden-allowUpdate').text();
					  var targetFile=$('.hidden-targetFile').text();

					  if (allowUpdate)
					  {
					    var masterItemType=$('.masterItemType').text();
						var statusDone='done';
						if (masterItemType=='issue')
						{
						  statusDone='away';
						}
						var block=$(this).parent().parent().find('a.block').attr('name');
					    htmlReplace='<a href="'+targetFile+'&action='+masterItemType+'_status_change&new_status='+statusDone+'&'+masterItemType+'_id='+result[2]+'#'+block+'"><img src="images/app/square_green.png" /></a>';
					  }
					  else
					  {
					    htmlReplace='<img src="images/app/square_green.png" style="cursor:default;" />';
					  }	
					  $(this).parent().find('span.postit_header-right').html(htmlReplace);					
					}
                    else if (result[1]=='BACK_TODO')
					{
				      $(this).parent().find('span.postit_header-right').html('<img src="images/app/under_progress.png" style="cursor:default;" />');
					}
	              }
		        });	
			  } 
			});

			// Update status in hidden div for the next user actions
			$(this).find('span.item-status').text(targetStatus);
		  }	
	  });
}