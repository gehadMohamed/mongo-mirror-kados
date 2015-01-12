<?php
/**
 * log data for graphs
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */

if (isset($currentSprintId))
{
  // Get sprint info
  $request->envoi("SELECT * FROM kados_sprints WHERE sprint_id=".$currentSprintId);
  $sprintData=$request->getObject();
  // SET counter strings
  $countTasks="SELECT COUNT(task_id) FROM kados_user_stories,kados_tasks WHERE kados_user_stories.active=1 AND kados_tasks.active=1 AND us_id_fk=us_id AND us_sprint_id_fk=".$currentSprintId;
  $countUS="SELECT COUNT(us_id) FROM kados_user_stories WHERE active=1 AND us_sprint_id_fk=".$currentSprintId;
  $sumLoad="SELECT SUM(task_load) FROM kados_user_stories,kados_tasks WHERE kados_user_stories.active=1 AND kados_tasks.active=1 AND us_id_fk=us_id AND us_sprint_id_fk=".$currentSprintId;
  $sumDone="SELECT SUM(task_done) FROM kados_user_stories,kados_tasks WHERE kados_user_stories.active=1 AND kados_tasks.active=1 AND us_id_fk=us_id AND us_sprint_id_fk=".$currentSprintId;
  $sumRaf="SELECT SUM(task_raf) FROM kados_user_stories,kados_tasks WHERE kados_user_stories.active=1 AND kados_tasks.active=1 AND us_id_fk=us_id AND us_sprint_id_fk=".$currentSprintId;
  
  if ($sprintData->sprint_end_date>=aujourdhui())
  {  
    // Delete all sprints logs done for dates prior to and after the sprint
	$request->envoi("DELETE FROM kados_sprints_progress 
	                 WHERE (log_date<'".$sprintData->sprint_start_date."' 
					 OR log_date>'".$sprintData->sprint_end_date."' ) 
					 AND log_sprint_id_fk=".$currentSprintId);
        
        $mcnx->num->kados_sprints_progress->remove(array('log_date'=>array('$lt'=>$sprintData->sprint_start_date),'log_sprint_id_fk'=>$currentSprintId));
        $mcnx->num->kados_sprints_progress->remove(array('log_date'=>array('$gt'=>$sprintData->sprint_end_date),'log_sprint_id_fk'=>$currentSprintId));
        
	// Set DateRef to today or the sprint start date if today is prior to sprint start date
    $dateRef=aujourdhui();
    if ($sprintData->sprint_start_date>aujourdhui())
	{
	  $dateRef=$sprintData->sprint_start_date;
	}
    // log sprint consolidated situation
    $request->envoi("SELECT log_sprint_id_fk FROM kados_sprints_progress WHERE log_date='".$dateRef."' AND log_sprint_id_fk=".$currentSprintId);
	$request->calc_nb_elt();
	if ($request->nb_elt==0)
	{
	  $request->envoi("INSERT INTO kados_sprints_progress 
	                  (log_sprint_id_fk,
					  log_date, 
	                  log_task_count, 
	                  log_us_count, 
	                  log_initial_forecast, 
                  	  log_spent, 
	                  log_new_forecast)
					  VALUES
					  (".$currentSprintId.",
					  '".$dateRef."',
					  (".$countTasks."),
					  (".$countUS."),
					  (".$sumLoad."),
					  (".$sumDone."),
					  (".$sumRaf.")
					  )");
          $mcnx->num->kados_sprints_progress->insert(array("log_sprint_id_fk"=>$currentSprintId,"log_date"=>$dateRef,"log_task_count"=>"$countTasks","log_us_count"=>"$countUS","log_initial_forecast"=>"$sumLoad","log_spent"=>"$sumDone","log_new_forecast"=>"$sumRaf"));
	}
	else
	{

	  $request->envoi("UPDATE kados_sprints_progress SET 
	                  log_task_count=(".$countTasks."),
	                  log_us_count=(".$countUS."),
	                  log_initial_forecast=(".$sumLoad."),
                  	  log_spent=(".$sumDone."),
	                  log_new_forecast=(".$sumRaf.")
					  WHERE log_date='".$dateRef."' AND log_sprint_id_fk=".$currentSprintId);
          $mcnx->num->kados_sprints_progress->update(array('log_date'=>$dateRef,'log_sprint_id_fk'=>$currentSprintId),array('$set'=>array('log_task_count'=>(".$countTasks."),'log_us_count'=>(".$countUS."),'log_initial_forecast'=>(".$sumLoad."),'log_spent'=>(".$sumDone."),'log_new_forecast'=>(".$sumRaf."))),array('multiple' => true));
	}
  }
  
  // Always check that there is a log for the first day of the sprint.
  // It could create some funny graph, but at least, if the first day of logging is forgotten, the graph will be displayed anyway.
  // Showing the delay
  $request->envoi("SELECT log_sprint_id_fk FROM kados_sprints_progress WHERE log_date='".$sprintData->sprint_start_date."' AND log_sprint_id_fk=".$currentSprintId);
  $request->calc_nb_elt();
  if ($request->nb_elt==0)
  {
	$request->envoi("INSERT INTO kados_sprints_progress 
	                  (log_sprint_id_fk,
					  log_date, 
	                  log_task_count, 
	                  log_us_count, 
	                  log_initial_forecast, 
                  	  log_spent, 
	                  log_new_forecast)
					  VALUES
					  (".$currentSprintId.",
					  '".$sprintData->sprint_start_date."',
					  (".$countTasks."),
					  (".$countUS."),
					  (".$sumLoad."),
					  (".$sumDone."),
					  (".$sumRaf.")
					  )");
  }
}?>