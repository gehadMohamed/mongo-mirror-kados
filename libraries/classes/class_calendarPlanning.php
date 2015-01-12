<?php

include_once 'class_planning.php';

class calendarPlanning extends planning
{
  var $pageNumbering=0;
  var $filtres;
  
  function setPageNumbering($number)
  {
    $this->pageNumbering=$number;
  }
  
  function monthWithZero($month)
  {
    $string = $month<10 ? "0".$month : $month;
    return $string;
  }  
  
  function calendarPlanning($pathBase,$target,$pathImages,$LocaleFile,$allow_allocation_on_saturdays=false,$allow_allocation_on_sundays=false)
  {
	$this->targetFile=$target;
	$this->allow_saturdays=$allow_allocation_on_saturdays;
	$this->allow_sundays=$allow_allocation_on_sundays;
	$this->path_images=$pathImages;
	$this->locale_file=$LocaleFile;
	$this->pictures=array('0.25'=>'quart.png','0.50'=>'demi.png','0.75'=>'3quart.png','1.00'=>'4quart.png');
	$this->max_daily_workload=1.00;

	if (isset($_REQUEST['display']))
	{
	  $_SESSION['display']=$_REQUEST['display'];
	}
	if (!isset($_SESSION['display']))
	{
	  $_SESSION['display']='2weeks';
	}	
	
	if (isset($_REQUEST['year']))
	{
	  $_SESSION['filter_year_class_csi']=$_REQUEST['year'];
	}
	if (!isset($_SESSION['filter_year_class_csi']))
	{
	  $date=new DateTime();
	  $_SESSION['filter_year_class_csi']=$date->format('Y');
	}		
	
	if (isset($_REQUEST['month']))
	{
	  $_SESSION['filter_month_class_csi']=$_REQUEST['month'];
	}
	if (!isset($_SESSION['filter_month_class_csi']))
	{
	  $date=new DateTime();
	  $_SESSION['filter_month_class_csi']=$date->format('n');
	}		

	if (isset($_REQUEST['week']))
	{
	  $_SESSION['filter_week_class_csi']=$_REQUEST['week'];
      $date = new DateTime();
      $date->setISODate($_SESSION['filter_year_class_csi'],$_REQUEST['week']);	  
	  $_SESSION['filter_month_class_csi']=$date->format('n');
	}
	if (!isset($_SESSION['filter_week_class_csi']))
	{
	  $date=new DateTime();
	  $_SESSION['filter_week_class_csi']=$date->format('W');
	}		
	
	switch ($_SESSION['display'])
	{
      case 'month':
        // create planning object
        // compute first and last day of selected month    
	    $this->first_day=$_SESSION['filter_year_class_csi']."-".$this->monthWithZero($_SESSION['filter_month_class_csi'])."-01";
	    // Month is not december, compute end of month using the start of next month minus one day!
	    if ($_SESSION['filter_month_class_csi']!=12)
	    {
          $date=new DateTime($_SESSION['filter_year_class_csi']."-".$this->monthWithZero($_SESSION['filter_month_class_csi']+1)."-01");
  	      $this->last_day=$date->format('Y-m-d');  
	    }
        else
	    {
    	  // last day is decembre 31st
	      $this->last_day=($_SESSION['filter_year_class_csi']+1)."-01-01";
	    }
	  break;

      case 'week':
        $date=new DateTime();
		$date->setISODate($_SESSION['filter_year_class_csi'],$_SESSION['filter_week_class_csi']);
  	    $this->first_day=$date->format('Y-m-d');		  
        if (class_exists('DateInterval'))
	    {	
	      $interval=new DateInterval('P7D');
          $date->add($interval);
	    }
        else
	    {
	      $date->modify('+7 days');
	    }				
  	    $this->last_day=$date->format('Y-m-d');  
	  break;

      case '2weeks':
        $date=new DateTime();
		$date->setISODate($_SESSION['filter_year_class_csi'],$_SESSION['filter_week_class_csi']);
  	    $this->first_day=$date->format('Y-m-d');	
        if (class_exists('DateInterval'))
	    {	
	      $interval=new DateInterval('P14D');
          $date->add($interval);
	    }
        else
	    {
	      $date->modify('+14 days');
	    }		
  	    $this->last_day=$date->format('Y-m-d');  
	  break;
	  
	}
  }
  
  function getFirstDay()
  {
     return $this->first_day;
  }
  
  function getLastDay()
  {
     return $this->last_day;
  }

  function displayCalendarPlanningButtons()
  {
  }

  function displayCalendarPlanningHeader()
  {  
    include $this->locale_file;  
	$dateRef=new myDateTime($this->first_day);
	$dateStart1=new myDateTime($this->first_day);
	$dateEnd=new DateTime($this->last_day);?>  
	   <!-- YEAR --------------------------------- !-->
       <tr> 
	     <td class="empty"><a href="<?php echo $this->targetFile;?>&display=month" class="switch_display <?php if ($_SESSION['display']=='month') { echo 'selected_display'; }?>"><?php echo $text_month;?></a></td>
		 <td class="empty alignright"><a href="<?php echo $this->targetFile;?>&year=<?php echo ($dateRef->format('Y')-1);?>"><img src="<?php echo $this->path_images;?>arrow_previous.gif" border="0" /></a></td><?php
		 // Header line is made with all days of period
		 $dateGap=$dateEnd->diff($dateStart1);
		 $dateStart2=new myDateTime($this->first_day);		 
		 // display column with computed colspan for the first week
		 // compute end of month regarding dateStart
		 $interval=new DateInterval('P1D');
		 $interval7d=new DateInterval('P7D');
		 while ($dateStart1<$dateEnd)
		 {
           $dateStart2->shiftToEndOfYear();	
		   $dateGap=$dateStart1->diff($dateStart2);
		   $dateGap2=$dateStart1->diff($dateEnd);?>
		   <td colspan="<?php echo min($dateGap->format('%a')+1,$dateGap2->format('%a'));?>" class="year"><?php echo $dateStart1->format('Y');?></td><?php
		   $dateStart2->add($interval);
		   $dateStart1->setTimeStamp($dateStart2->getTimeStamp());		   
		 }?>		 
		 <td class="empty"><a href="<?php echo $this->targetFile;?>&year=<?php echo ($dateRef->format('Y')+1);?>"><img src="<?php echo $this->path_images;?>arrow_next.gif" border="0" /></a></td>
       </tr>	
	   <!-- MONTH ------------------------------- !-->
       <tr> 
	     <td class="empty"><a href="<?php echo $this->targetFile;?>&display=2weeks" class="switch_display <?php if ($_SESSION['display']=='2weeks') { echo 'selected_display'; }?>"><?php echo $text_two_weeks;?></a></td>
	     <td class="empty alignright"><?php 
		 $dateStart1=new myDateTime($this->first_day);
		 // Use month slide buttons only when display view is "Month"
		 if ($_SESSION['display']=='month')
		 {
		   if ($dateRef->format('n')>1)
		   {?>
		     <a href="<?php echo $this->targetFile;?>&month=<?php echo ($dateRef->format('n')-1);?>"><img src="<?php echo $this->path_images;?>arrow_previous.gif" border="0" /></a><?php
		   }
		   else
		   {?>
		     <a href="<?php echo $this->targetFile;?>&month=12&year=<?php echo ($dateRef->format('Y')-1);?>"><img src="<?php echo $this->path_images;?>arrow_previous.gif" border="0" /></a><?php
		   }		   
		 }  ?>
         </td><?php
		 // Header line is made with all days of period
		 $dateStart2=new myDateTime($this->first_day);		 
		 // display column with computed colspan for the first week
		 // compute end of month regarding dateStart
		 while ($dateStart1<$dateEnd)
		 {
           $dateStart2->shiftToEndOfMonth();	
		   $dateGap=$dateStart1->getDiff($dateStart2);
		   $dateGap2=$dateStart1->getDiff($dateEnd);?>
		   <td colspan="<?php echo min($dateGap+1,$dateGap2);?>" class="month"><a href="<?php echo $this->targetFile;?>&display=month&month=<?php echo $dateStart1->format('n');?>"><?php echo $list_months[$dateStart1->format('n')-1];?></a></td><?php
		   $dateStart2->add($interval);	
		   $dateStart1->setTimeStamp($dateStart2->getTimeStamp());	
		 }?>
	     <td class="empty"><?php 
		 // Use month slide buttons only when display view is "Month"
		 if ($_SESSION['display']=='month')
		 {		 
		   if ($dateRef->format('n')<12)
		   {?>
		     <a href="<?php echo $this->targetFile;?>&month=<?php echo ($dateRef->format('n')+1);?>"><img src="<?php echo $this->path_images;?>arrow_next.gif" border="0" /></a><?php
		   }
		   else
		   {?>
		     <a href="<?php echo $this->targetFile;?>&month=1&year=<?php echo ($dateRef->format('Y')+1);?>"><img src="<?php echo $this->path_images;?>arrow_next.gif" border="0" /></a><?php
		   }
         } ?>
         </td>
       </tr>	
	   <!-- WEEK -------------------------- !-->
      <tr>	   
	     <td class="empty"><a href="<?php echo $this->targetFile;?>&display=week" class="switch_display <?php if ($_SESSION['display']=='week') { echo 'selected_display'; }?>"><?php echo $text_one_week;?></a></td>
	     <td class="empty alignright"><?php 
		 // Use week slide buttons only when display view is not "Month"
		 if ($_SESSION['display']!='month')
		 {				 
		   if ($dateRef->format('W')>1)
		   {?>
		     <a href="<?php echo $this->targetFile;?>&week=<?php echo ($dateRef->format('W')-1);?>"><img src="<?php echo $this->path_images;?>arrow_previous.gif" border="0" /></a><?php
		   }
		   else
		   {
		     $dateRef2=new DateTime();
		     $dateRef2->setTimeStamp($dateRef->getTimeStamp());
             $dateRef2->sub($interval7d);	 ?>
		     <a href="<?php echo $this->targetFile;?>&year=<?php echo ($dateRef2->format('Y'));?>&week=<?php echo ($dateRef2->format('W'));?>"><img src="<?php echo $this->path_images;?>arrow_previous.gif" border="0" /></a><?php
		   }
		 } ?>
         </td><?php		   
		 // Header line is made with all days of period
		 $dateStart=new DateTime($this->first_day);
		 // display column with computed colspan for the first week?>
		 <td colspan="<?php echo (8-$dateStart->format('N'));?>" class="week"><a href="<?php echo $this->targetFile;?>&display=week&week=<?php echo $dateStart->format('W');?>"><?php echo $text_week.' '.$dateStart->format('W');?></a></td><?php
		 $dateStart->add($interval);
		  while ($dateStart<$dateEnd)
		 {
		   if ($dateStart->format('N')==1)
		   { 
		     // compute colspan for the last week
		     $colspan=7;
			 $dateGap=$dateEnd->diff($dateStart);

		     if ($dateGap->format('%a')<7)
			 {
			   $colspan=$dateGap->format('%a');
			 }?>
		     <td colspan="<?php echo $colspan;?>" class="week"><a href="<?php echo $this->targetFile;?>&display=week&week=<?php echo $dateStart->format('W');?>"><?php echo $text_week.' '.$dateStart->format('W');?></a></td><?php
		   }
		   $dateStart->add($interval);
		 }?>
	     <td class="empty"><?php 
		 // Use week slide buttons only when display view is not "Month"
		 if ($_SESSION['display']!='month')
		 {			 
		   if ($dateRef->format('W')<52)
		   {?>
		     <a href="<?php echo $this->targetFile;?>&week=<?php echo ($dateRef->format('W')+1);?>"><img src="<?php echo $this->path_images;?>arrow_next.gif" border="0" /></a><?php
		   }
		   else
		   {
		     $dateRef2=new DateTime();
		     $dateRef2->setTimeStamp($dateRef->getTimeStamp());
             
             $dateRef2->add($interval7d);	 ?>
		     <a href="<?php echo $this->targetFile;?>&year=<?php echo ($dateRef2->format('Y'));?>&week=<?php echo ($dateRef2->format('W'));?>"><img src="<?php echo $this->path_images;?>arrow_next.gif" border="0" /></a><?php
		   }
		 }  ?>
         </td>
       </tr><?php
	
  }
  
  function displayCalendarPlanning()
  {
    $this->planningDisplayOpenTable();
	$this->displayCalendarPlanningHeader();
	$this->planningDisplayTableBody();
	$this->planningDisplayCloseTable();
  }
}