<?php
/**
 * Main page of kanban, switching between levels of kanban 
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

$pathBase='./';
$targetFile='manage_kanban.php?menu_lev2=prj_kanban';
	  
include $pathBase.'header.php';

// Init the board parameter
$targetBoard = isset($_REQUEST['board']) ? $_REQUEST['board'] : '' ;

if (isset($_SESSION['current_project_id']))
{
  if (isset($_SESSION['current_sprint_id']))
  {
    include 'manage_sprint.php' ;
  }
  else if (isset($_SESSION['current_release_id']))
  {
    if ($currentProject->level==2)
    {
	  include 'manage_rbl_tasks.php' ;
    }
    else
	{
      if ($targetBoard=='tasks')
	  {
	    include 'manage_rbl_tasks.php' ;
	  }
	  else
  	  {
	    $workshopView=true;
        include 'manage_release.php' ;
	  }    
    }      
  }
  else
  {
    if ($currentProject->level==1)
    {
	  include 'manage_pbl_tasks.php' ;
    }
    else	
	{
      if ($targetBoard=='tasks')
	  {
	    include 'manage_pbl_tasks.php' ;
	  }
	  else
	  {
	    $workshopView=true;
        include 'manage_project.php' ;
	  }  
	}  
  }
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}
include $pathBase.'footer.php';?>