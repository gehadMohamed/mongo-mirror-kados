<?php
/**
 * Settings for displaying dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */

 // Default position for a note
$yInitDefaultPosition=40; 
$xInitDefaultPosition=10;
// Height of the dashboard column header
$displayTopLimit=25;
// Min height for a block dashboard
$usBlockMinHeight=50;
// Width of a column in a dashboard
$columnWidth=250;
// Width of the first column in a dashboard when first static column is used
$columnWidthSingle=190;
// Width and height of a note/post-it. 
// Body margin is the values to control the text area of the note, 
// because header and footer and padding take some space in the global note area
// for instance, since padding left and right in style.css is 2px for the text body, then $itemWidthBodyMargin=4
// and for a 150px note width, then text area width must be 146. This width is computed with the two following variables
// same process for the height
$itemWidth=160;
$itemWidthBodyMargin=4;
$itemHeight=120;
$itemHeightBodyMargin=40;
// Shift a each note when re-ordering in a compact display
$itemYShift=54;
// Done status for tasks 
if (isset($_SESSION['current_project_id']))
{
  $taskFinalStatusTag=getFinalStatus($_SESSION['current_project_id'],$pathBase);
}  

// Get user right to update US
$allowUpdateUS=in_array('UPD_US',$_SESSION['user_actions']) || in_array('UPD_US',$_SESSION['user_local_actions']);

if (!isset($_SESSION['display_priority']))
{
  $_SESSION['display_priority']='none';
}
/* Manage filter vars for issues */
if (isset($_REQUEST['filter_issue']))
{
  if ($_REQUEST['filter_issue']!='')
  {
    $_SESSION['filter_issue']=$_REQUEST['filter_issue'];
  }
  else
  {
    unset($_SESSION['filter_issue']);
  }  
}
/* Manage filter vars for US */
if (isset($_REQUEST['filter_us']))
{
  if ($_REQUEST['filter_us']!='')
  {
    $_SESSION['filter_us']=$_REQUEST['filter_us'];
  }
  else
  {
    unset($_SESSION['filter_us']);
  }  
}
/* Manage filter vars for tasks */
if (isset($_REQUEST['filter_task']))
{
  if ($_REQUEST['filter_task']!='')
  {
    $_SESSION['filter_task']=$_REQUEST['filter_task'];
  }
  else
  {
    unset($_SESSION['filter_task']);
  }  
}

// Set the final status tag of the board for tasks or actions
switch ($simpleItemType)
{
  case 'us':
  case 'task':
    $boardInitialStatusTag=getInitialStatus($_SESSION['current_project_id'],$pathBase);  
    $boardFinalStatusTag=getFinalStatus($_SESSION['current_project_id'],$pathBase);
  break;	

  case 'activity':
  case 'issue':
  case 'action':
    $boardInitialStatusTag='TODO';
    $boardFinalStatusTag='DONE';
  break;	

  case 'color':
    $boardInitialStatusTag='NONE';
    $boardFinalStatusTag='DONE';
  break;	

}?>