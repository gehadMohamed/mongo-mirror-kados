<?php
/**
 * Page to manage railway data
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

// railway display
$railway=new railway($pathImages.$imgRailway);

$showOnlyProjectLevel= isset($showOnlyProjectLevel) ? $showOnlyProjectLevel : false;

if (isset($_SESSION['current_project_id']))
{
  // Get project data & count US in the project
  $projectData=new project($pathBase,$_SESSION['current_project_id']);
  $projectData->getData();
  
  // Display PBL label if project levels = 1
  $infoLink='';
  if ($_SESSION['menu_lev2']=='prj_kanban')
  {
    if ($projectData->level==1)
    {
      $infoLink=' >> Project Tasks Dashboard';
    }
    else if (!isset($_SESSION['current_release_id']) && isset($_REQUEST['board']))
    {
      // levels >1 and in the product backlog
  	  $infoLink=' >> Product Backlog Tasks Early Dashboard';
    }
    else if (!isset($_SESSION['current_release_id']))
    {
      // levels >1 and in the product backlog
	  $infoLink=' >> Releases Roadmap';
    }
  }
  // do not display a lonk when railway is limited to project level
  if ($showOnlyProjectLevel)
  {
    $railway->add($projectData->name.=' ('.$projectData->getUsCount().' US)','',$infoLink);  
  }
  else
  {
    $railway->add($projectData->name.=' ('.$projectData->getUsCount().' US)',$targetFile.'&project_id='.$_SESSION['current_project_id'],$infoLink);  
  }  
  $lastLevel='PRJ';
}  
if (isset($_SESSION['current_release_id']) && !$showOnlyProjectLevel)
{
  // Get release data & count US in the release
  $request=new requete("SELECT * FROM kados_releases WHERE release_id=".$_SESSION['current_release_id'],$cnx->num);
  $releaseData=$request->getObject();
  $request->envoi("SELECT COUNT(*) AS nb_us FROM kados_user_stories WHERE us_release_id_fk=".$_SESSION['current_release_id']." AND active=1");
  $request->getObject();
  $releaseData->release_name.=' ('.$request->objet->nb_us.' US)';
  // Display PBL label if project levels = 1
  $infoLink='';
  if ($_SESSION['menu_lev2']=='prj_kanban')
  {
    if ($projectData->level==2)
    {
      $infoLink=' >> Release Tasks Dashboard';
    }
    else if (!isset($_SESSION['current_sprint_id']) && isset($_REQUEST['board']))
    {
      // levels >1 and in the product backlog
  	  $infoLink=' >> Release Backlog Tasks Early Dashboard';
    }
    else if (!isset($_SESSION['current_sprint_id']))
    {
      // levels >1 and in the product backlog
	  $infoLink=' >> Sprints Roadmap';
    }
  }
  
  $railway->add($releaseData->release_name,$targetFile.'&release_id='.$_SESSION['current_release_id'],$infoLink);  
  $lastLevel='REL';
}
if (isset($_SESSION['current_sprint_id']) && !$showOnlyProjectLevel)
{  
  // Get sprint data & count US in the sprint
  $request=new requete("SELECT * FROM kados_sprints WHERE sprint_id=".$_SESSION['current_sprint_id'],$cnx->num);
  $sprintData=$request->getObject();
  $request->envoi("SELECT COUNT(*) AS nb_us FROM kados_user_stories WHERE us_sprint_id_fk=".$_SESSION['current_sprint_id']." AND active=1");
  $request->getObject();
  $sprintData->sprint_name.=' ('.$request->objet->nb_us.' US)';
  $infoLink='';
  if ($_SESSION['menu_lev2']=='prj_kanban')
  {
    $infoLink=' >> Sprint Tasks Dashboard';
  }  
  $railway->add($sprintData->sprint_name,$targetFile.'&sprint_id='.$_SESSION['current_sprint_id'],$infoLink);  
  $lastLevel='SPR';
}

$railway->display();

if (!$showOnlyProjectLevel)
{
  switch ($lastLevel)
  { 
    case 'PRJ':
      $railway2=new railway($pathImages.'app/square.png');
      $request->envoi("SELECT * FROM kados_releases WHERE release_project_id_fk=".$_SESSION['current_project_id']." ORDER BY release_due_date");
      $resultsArray=$request->getArrayFields();
      for ($i=0;$i<$request->nb_elt;$i++)
      {
        $railway2->add($resultsArray[$i]['release_name'],$targetFile.'&release_id='.$resultsArray[$i]['release_id']);  
      }
      $railway2->display('railway railway_lev2');
    break;

    case 'REL':
      $railway2=new railway($pathImages.'app/square.png');
      $request->envoi("SELECT * FROM kados_sprints WHERE sprint_release_id_fk=".$_SESSION['current_release_id']." ORDER BY sprint_start_date");
      $resultsArray=$request->getArrayFields();
      for ($i=0;$i<$request->nb_elt;$i++)
      {
        $railway2->add($resultsArray[$i]['sprint_name'],$targetFile.'&sprint_id='.$resultsArray[$i]['sprint_id']);  
      }
      $railway2->display('railway railway_lev2');
    break;  
  }  
}?>