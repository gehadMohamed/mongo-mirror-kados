<?php
/**
 * Build an image for burnup chart of business value
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */
$pathBase='../';
$pathLibraries=$pathBase.'libraries/';
$pathClasses=$pathBase.'libraries/classes/';

require_once $pathBase.'session_settings.php';

require_once $pathLibraries.'jpgraph35/jpgraph.php';
require_once $pathLibraries.'jpgraph35/jpgraph_line.php';

// Get data of the sprint
require_once $pathBase.'popin_includes.php';

$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
$request=new requete('SELECT * FROM kados_releases WHERE release_id='.$_SESSION['current_release_id'],$cnx->num);
$releaseData=$request->getObject();
$request->envoi("SELECT sprint_id,sprint_name FROM kados_sprints WHERE sprint_release_id_fk=".$_SESSION['current_release_id']." ORDER BY sprint_start_date");
$sprintsList=$request->getArrayFields();

if (count($sprintsList)!=0)
{

require $pathBase.'common_scripts/compute_release_data_by_sprint.php';

$businessValueLine=array();
$realBvLine=array();
$sprints=array();
$businessValueLine[0]=0;
$realBvLine[0]=0;
$sprints[0]='Start';

for ($i=0;$i<count($sprintsList);$i++)
{
  $businessValueLine[$i+1]=$businessValueLine[$i]; 
  if (isset($businessValueBySprint[$sprintsList[$i]['sprint_id']]))
  {
    $businessValueLine[$i+1]+=$businessValueBySprint[$sprintsList[$i]['sprint_id']];
  }
  $realBvLine[$i+1]=$realBvLine[$i]; 
  if (isset($businessValueDeliveredbySprint[$sprintsList[$i]['sprint_id']]))
  {
    $realBvLine[$i+1]+=$businessValueDeliveredbySprint[$sprintsList[$i]['sprint_id']];
  }  
  $sprints[$i+1]=$sprintsList[$i]['sprint_name'];
}

// Setup the graph
$graph = new Graph(600,400);
$graph->SetScale("textint");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing();

$graph->SetMargin(50,30,30,00);
$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->xaxis->SetTickLabels($sprints);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($businessValueLine);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend($text_bv_planned_delivery);

// Create the second line
$p3 = new LinePlot($realBvLine);
$graph->Add($p3);
$p3->SetColor("#46BB28");
$p3->SetLegend($text_bv_delivered);


$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();
}
