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

$request->envoi('SELECT * FROM kados_sprints_progress WHERE log_sprint_id_fk='.$_SESSION['current_sprint_id'].' ORDER BY log_date');
$request->getArrayFields();
$resultsArray=array();
for ($i=0;$i<$request->nb_elt;$i++)
{
 $resultsArray[$request->array[$i]['log_date']]= $request->array[$i];
 if ($resultsArray[$request->array[$i]['log_date']]['log_initial_forecast']==null)
 {
   $resultsArray[$request->array[$i]['log_date']]['log_initial_forecast']='0';
 }
 if ($resultsArray[$request->array[$i]['log_date']]['log_spent']==null)
 {
   $resultsArray[$request->array[$i]['log_date']]['log_spent']='0';
 }
 if ($resultsArray[$request->array[$i]['log_date']]['log_new_forecast']==null)
 {
   $resultsArray[$request->array[$i]['log_date']]['log_new_forecast']='0';
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
$graph->SetScale("textlin");

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

if (count($resultsArray)!=0)
{
  // Build lines
  $realLine=array();
  $toDo2FinishLine=array();
  $idealLineList=array();
  $countLines=0;
  $valuesStock=array();
  $gaps=array();
  $toDo2FinishLineTarget=array();
  $valuesStock[-1]=0;
  $bascule=true;
  $valuesCounter=0;
  // for each day
  for ($i=0;$i<count($daysList);$i++)
  {
    if (isset($resultsArray[$daysList[$i]]))
    {
      // If there is a record, get it
      $dayLog=$resultsArray[$daysList[$i]];
  	  if ($dayLog['log_initial_forecast']!=$valuesStock[$countLines-1]['initValue'])
	  {
	    // If there is a change in the total initial forecast, create a new line
        $idealLineList[$countLines]=array_fill(0,$i+1,null);
	    // Set its first value (this line must be the same line beginning now but with a start for day one of the sprint
	    // that is at the new initial value forecasted (the one that changed)
	    $valuesStock[$countLines]['initValue']=$dayLog['log_initial_forecast']*($daysCount-$i-1)/($daysCount-1);
	    $valuesStock[$countLines]['denom']=$daysCount-$i-1;
        // stock values for gaps in ideal line
        if ($countLines>0)
        {	  
	      $gaps[$i]['start']=$valuesStock[$countLines-1]['initValue']*($daysCount-$i-1)/$valuesStock[$countLines-1]['denom'];
	      $gaps[$i]['end']=$valuesStock[$countLines]['initValue'];
	    }	
	    $countLines++;
	  }  
	  // Store values for 2do2finish lines
	  $toDo2FinishLine[$i]=$dayLog['log_new_forecast'];
  	  $lastToDo2FinishValue=$dayLog['log_new_forecast'];
	  $lastToDo2FinishDenom=$daysCount-$i-1;
	  $toDo2FinishLineTarget[$i]=null;
	  // Set real line dots
	  $realLine[$i]=$dayLog['log_spent'];
	  // increment values counter
	  $valuesCounter++;
    }	
    else
    {
	  // two possibilities : there is some results remaining or not
	  if ($valuesCounter==count($resultsArray))
	  {
        $realLine[$i]=null;
        // 2do2finish line must be dotted and nomore solid
        if ($bascule)
	    { 
	      $toDo2FinishLineTarget[$i-1]=$lastToDo2FinishValue;
	      $bascule=false;
	    }
        $toDo2FinishLine[$i]=null;
  	    $toDo2FinishLineTarget[$i]=$lastToDo2FinishValue*($daysCount-$i-1)/$lastToDo2FinishDenom;
	  }
      else
      {
	    // fill in the missing day(s)
        $realLine[$i]=$realLine[$i-1];
        $toDo2FinishLineTarget[$i]=$toDo2FinishLineTarget[$i-1];
        $toDo2FinishLine[$i]=$toDo2FinishLine[$i-1];
      }	  
    }  
    // continue lines
    $nbl=count($idealLineList)-1;
	if ($valuesStock[$nbl]['denom']!=0)
	{
      $idealLineList[$nbl][$i]=$valuesStock[$nbl]['initValue']*($daysCount-$i-1)/$valuesStock[$nbl]['denom'];	
	}
    else
	{
	  $idealLineList[$nbl][$i]=0;
	}
  
    // If there is a gap, continue the previous line once more
    if (isset($gaps[$i]))
    {
      $nbl=count($idealLineList)-2;
      $idealLineList[$nbl][$i]=$valuesStock[$nbl]['initValue']*($daysCount-$i-1)/$valuesStock[$nbl]['denom'];	
    }	  
  }

  // Create vertical lines to link ideal lines gaps
  $links=array();
  for ($i=0;$i<count($daysList);$i++)
  {
    if (isset($gaps[$i]))
    {
      array_push($links,$gaps[$i]['start']);
	  array_push($links,$gaps[$i]['end']);
    }
    else
    {
      array_push($links,0);
  	  array_push($links,0);
    }  
  }

  // Create the main ideal line
  for ($i=0;$i<count($idealLineList);$i++)
  {
    $p3 = new LinePlot($idealLineList[$i]);
    $graph->Add($p3);
    $p3->SetColor('#2F9D1C');
	if ($_SESSION['show_graph_values'])
	{
      $p3->value->Show();
	}  
    $p3->value->SetColor('#027100');
    $p3->value->SetFont(FF_FONT1,FS_BOLD);
  }
  $p3->SetLegend($text_task_load);  

  // Create the linkes between lines
  $errplot=new ErrorPlot($links);
  $graph->Add($errplot);
  $errplot->SetColor("#2F9D1C");
  $errplot->SetWeight(2);

  // Create the dotted 2 to 2 finish simulated line
  $p2 = new LinePlot($toDo2FinishLineTarget);
  $graph->Add($p2);
  $p2->SetColor("#B22222");
  $p2->SetStyle("dotted");

  // Create the solid 2 to 2 finish line
  $p2 = new LinePlot($toDo2FinishLine);
  $graph->Add($p2);
  $p2->SetColor("#B22222");
  $p2->SetLegend($text_load2finish);
  if ($_SESSION['show_graph_values'])
  {  
    $p2->value->Show();
  }	
  $p2->value->SetColor("#A62121");
  $p2->value->SetFont(FF_FONT1,FS_BOLD);

  // Create the solid real line
  $p2 = new LinePlot($realLine);
  $graph->Add($p2);
  $p2->SetColor("#2D4B8E");
  $p2->SetLegend($text_load_spent);
  if ($_SESSION['show_graph_values'])
  {  
    $p2->value->Show();
  }	
  $p2->value->SetColor("#2D4C8E");
  $p2->value->SetFont(FF_FONT1,FS_BOLD);  
}
else
{
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