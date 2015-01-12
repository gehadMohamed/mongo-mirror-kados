<?php
/**
 * Build an image for burndown chart
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
require_once $pathLibraries.'jpgraph35/jpgraph_error.php';
require_once $pathLibraries.'functions/fct_date_hour.php';

// Get data of the sprint

require_once $pathBase.'popin_includes.php';

$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
$request=new requete('SELECT * FROM kados_sprints WHERE sprint_id='.$_SESSION['current_sprint_id'],$cnx->num);
$sprintData=$request->getObject();
$startDate=new DateTime($sprintData->sprint_start_date);
$endDate=new DateTime($sprintData->sprint_end_date);

  // Get data on US					   
  $request->envoi("SELECT baseline_date,us_status 
                   FROM kados_baselines bl 
		   WHERE bl.us_sprint_id_fk=".$_SESSION['current_sprint_id']);
  $request->getArrayFields();					   
  $usCountByDay=array();
  
  for ($i=0;$i<$request->nb_elt;$i++)
  {
    if (!isset($usCountByDay[$request->array[$i]['baseline_date']][$request->array[$i]['us_status']]))
    {    
      $usCountByDay[$request->array[$i]['baseline_date']][$request->array[$i]['us_status']]=1;
    }
    else
    {    
      $usCountByDay[$request->array[$i]['baseline_date']][$request->array[$i]['us_status']]++;
    }
  }
  

// get project working days	 
$workingDays=explode(';',getProjectSetting('WK_DAY',$_SESSION['current_project_id'],$cnx->num));	   
$projectExludedDays=array();
$request->envoi("SELECT idle_day FROM kados_projects_idle_days 
                  WHERE project_id_fk=".$_SESSION['current_project_id']." ORDER BY idle_day");
$projectExludedDays=$request->recup_array_mono();	  
// count real sprint days 
$duration=$endDate->diff($startDate,true);
$daysShift=$duration->format('%a');

$daysDisplay=array();
$daysList=array();
$daysCount=0;
for ($i=0;$i<$daysShift+1;$i++)
{
  if (in_array(fmod(dayOfWeek($startDate->format('Y-m-d'))+6,7),$workingDays))
  {
	// check if current day is not excluded
	if (!in_array($startDate->format('Y-m-d'),$projectExludedDays))
	{
      array_push($daysDisplay,$startDate->format('j/n/y'));  
	  array_push($daysList,$startDate->format('Y-m-d'));  
	  $daysCount++;
	}
  }
  $startDate->add(new DateInterval('P1D'));
}


// Setup the graph
$graph = new Graph(900,550);
$graph->SetScale("textint");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(true);
$graph->SetBox(false);

$graph->SetMargin(30,30,30,00);
$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($daysDisplay);
$graph->xgrid->SetColor('#E3E3E3');
$graph->xaxis->SetLabelAngle(45);

if (count($usCountByDay)!=0)
{
  // Build lines
  $usTodo=array();
  $usInProgress=array();
  $usReady2Check=array();
  $usDone=array();
  $usTodo[-1]=0;
  $usInProgress[-1]=0;
  $usReady2Check[-1]=0;
  $usDone[-1]=0;
  // for each day
  for ($i=0;$i<count($daysList);$i++)
  {
    if (isset($usCountByDay[$daysList[$i]]))
    {
      // If there is a record, get it
      $dayLog=$usCountByDay[$daysList[$i]];
      $usTodo[$i]=isset($dayLog['TODO']) ? $dayLog['TODO'] : $usTodo[$i-1];
      $usInProgress[$i]=isset($dayLog['RUN']) ? $dayLog['RUN'] : $usInProgress[$i-1];
      $usReady2Check[$i]=isset($dayLog['DEV']) ? $dayLog['DEV'] : $usReady2Check[$i-1];
      $usDone[$i]=isset($dayLog['DONE']) ? $dayLog['DONE'] : $usDone[$i-1];
    }	
    else
    {
      $usTodo[$i]=$usTodo[$i-1];
      $usInProgress[$i]=$usInProgress[$i-1];
      $usReady2Check[$i]=$usReady2Check[$i-1];
      $usDone[$i]=$usDone[$i-1];
    }  
  }
  
  array_shift($usTodo);
  array_shift($usInProgress);
  array_shift($usReady2Check);
  array_shift($usDone);
  
  // Create the line for US todo
  $p3 = new LinePlot($usTodo);
  $graph->Add($p3);
  $p3->SetColor('#EDCD00');
  if ($_SESSION['show_graph_values'])
  {
    $p3->value->Show();
  }  
  $p3->value->SetColor('#EDCD00');
  $p3->value->SetFont(FF_FONT1,FS_BOLD);
  $p3->value->SetFormat('%d');
  $p3->SetLegend($text_us_count_todo);  


  // Create the line for US run
  $p2 = new LinePlot($usInProgress);
  $graph->Add($p2);
  $p2->SetColor("#B22222");
  $p2->SetLegend($text_us_count_run);
  if ($_SESSION['show_graph_values'])
  {  
    $p2->value->Show();
  }	
  $p2->value->SetColor("#A62121");
  $p2->value->SetFont(FF_FONT1,FS_BOLD);
  $p2->value->SetFormat('%d');
  
  // Create the line for US dev
  $p2 = new LinePlot($usReady2Check);
  $graph->Add($p2);
  $p2->SetColor("#2D4B8E");
  $p2->SetLegend($text_us_count_ready2check);
  if ($_SESSION['show_graph_values'])
  {  
    $p2->value->Show();
  }	
  $p2->value->SetColor("#2D4C8E");
  $p2->value->SetFont(FF_FONT1,FS_BOLD);  
  $p2->value->SetFormat('%d');
  // Create the line for US done
  $p2 = new LinePlot($usDone);
  $graph->Add($p2);
  $p2->SetColor('#027100');
  $p2->SetLegend($text_us_count_delivered);
  if ($_SESSION['show_graph_values'])
  {  
    $p2->value->Show();
  }	
  $p2->value->SetColor('#027100');
  $p2->value->SetFont(FF_FONT1,FS_BOLD);    
  $p2->value->SetFormat('%d');
}
else
{
    $idealLineList=array();  
  for ($i=0;$i<count($daysList);$i++)
  {
    $idealLineList[$i]=0;
  }
  // Create the solid real line
  $p2 = new LinePlot($idealLineList);
  $graph->Add($p2);
  $p2->SetLegend($text_no_data);
}

$graph->legend->SetFrameWeight(1);
$graph->legend->SetColumns(4);

// Output line
$graph->Stroke();
?>