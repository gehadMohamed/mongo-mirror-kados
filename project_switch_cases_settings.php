<?php
/**
 * Switch cases for the project settings
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

  /* actions for the page */
  switch ($_REQUEST['action'])
  {
    case 'add_release':
      $request=new requete("INSERT INTO kados_releases (release_name,release_creation_date,release_due_date,release_project_id_fk) 
	                                            VALUES ('".formatStringForDB($_POST['form_item_release'])."','".aujourdhui()."',
												'".convertDateSlashToDash($_POST['form_item_due_date'])."',".$_SESSION['current_project_id'].")",$cnx->num);
        
        
    $mrequest=new requete("SELECT * FROM kados_releases WHERE release_id='".$request->insert_id()."'",$cnx->num);
    

    @$mcnx->num->kados_releases->insert(array_shift($mrequest->recup_array_champ()));
        
      $idNew=$request->insert_id();												
      if (isset($_POST['form_item_checklist']))
	  {
             $request->envoi("INSERT INTO kados_activities (
		                      SELECT 0,text,color,'TODO',1,40,15+zpos*15,zpos,".$idNew.",'".$_SESSION['login']."','".aujourdhui()."','".$_SESSION['login']."','".aujourdhui()."','','".$_SESSION['login']."',zpos,template_activity_id 
							  FROM kados_template_activities)");
            

	  }
    break;

    case 'add_release_ext':
      $request=new requete("INSERT INTO kados_releases (release_name,release_creation_date,release_due_date,release_project_id_fk,
	                                                    release_external_release_id,release_external_release_connection_id)  
	                                            VALUES ('".formatStringForDB($_POST['form_item_release_name'])."','".aujourdhui()."',
												'".convertDateSlashToDash($_POST['form_item_due_date'])."',".$_SESSION['current_project_id'].",
												".$_POST['form_item_release'].",".$_POST['form_item_connection_id'].")",$cnx->num);

    $mrequest=new requete("SELECT * FROM kados_releases WHERE release_id='".$request->insert_id()."'",$cnx->num);
    

    @$mcnx->num->kados_releases->insert(array_shift($mrequest->recup_array_champ()));
    
    $idNew=$request->insert_id();												
      if (isset($_POST['form_item_checklist']))
	  {
	    $request->envoi("INSERT INTO kados_activities (
		                      SELECT 0,text,color,'TODO',1,40,15+zpos*15,zpos,".$idNew.",'".$_SESSION['login']."','".aujourdhui()."','".$_SESSION['login']."','".aujourdhui()."','','".$_SESSION['login']."',zpos,template_activity_id 
							  FROM kados_template_activities)");
	  }												
    break;
	
    case 'update_release':
      $request=new requete("UPDATE kados_releases SET release_name='".formatStringForDB($_POST['form_item_release'])."',
	                      release_due_date='".convertDateSlashToDash($_POST['form_item_due_date'])."'
						  WHERE release_id=".$_POST['release_2update_id'],$cnx->num);
        $mcnx->num->kados_releases->update(array('release_id'=>$_POST['release_2update_id']),array('$set'=>array('release_name'=>formatStringForDB($_POST['form_item_release']),'release_due_date'=>convertDateSlashToDash($_POST['form_item_due_date']))),array('multiple' => true));
      if (isset($_POST['form_item_checklist']))
	  {
	    $request->envoi("INSERT INTO kados_activities (
		                      SELECT 0,text,color,'TODO',1,40,15+zpos*15,zpos,".$_POST['release_2update_id'].",'".$_SESSION['login']."','".aujourdhui()."','".$_SESSION['login']."','".aujourdhui()."','','".$_SESSION['login']."',zpos,template_activity_id 
							  FROM kados_template_activities)");
	  }						  
    break;

    case 'update_release_ext':
      if (isset($_POST['form_item_checklist']))
	  {
	    $request->envoi("INSERT INTO kados_activities (
		                      SELECT 0,text,color,'TODO',1,40,15+zpos*15,zpos,".$_POST['release_2update_id'].",'".$_SESSION['login']."','".aujourdhui()."','".$_SESSION['login']."','".aujourdhui()."','','".$_SESSION['login']."',zpos,template_activity_id 
							  FROM kados_template_activities)");
	  }						  
    break;
	
    case 'delete_release':
      // Delete release
      $request=new requete("DELETE FROM kados_releases WHERE release_id=".$_REQUEST['release_id_2del'],$cnx->num);
        $mcnx->num->kados_releases->remove(array('release_id'=>$_REQUEST['release_id_2del']));
	  // Delete sprints
 	  $request->envoi("DELETE FROM kados_sprints WHERE sprint_release_id_fk=".$_REQUEST['release_id_2del']);
          $mcnx->num->kados_sprints->remove(array('sprint_release_id_fk'=>$_REQUEST['release_id_2del']));
	  // Update US : init release to none
	  $request->envoi("UPDATE kados_user_stories SET us_release_id_fk=0,us_sprint_id_fk=0 WHERE us_release_id_fk=".$_REQUEST['release_id_2del']);
          $mcnx->num->kados_user_stories->update(array('us_release_id_fk'=>$_REQUEST['release_id_2del']),array('$set'=>array('us_release_id_fk'=>'0','us_sprint_id_fk'=>'0')),array('multiple' => true));
    break;  
	
    case 'add_sprint':
      $request=new requete("SELECT MAX(sprint_number) AS max_nb FROM kados_sprints WHERE sprint_release_id_fk=".$_REQUEST['release_add_sprint'],$cnx->num);
      $sprintData=$request->getObject();
      $request->envoi("INSERT INTO kados_sprints (sprint_name,sprint_number,sprint_start_date,sprint_end_date,sprint_release_id_fk) 
                                  VALUES ('".formatStringForDB($_POST['form_item_sprint'])."',".($sprintData->max_nb+1).",
					  '".convertDateSlashToDash($_POST['form_item_start_date'])."',
					  '".convertDateSlashToDash($_POST['form_item_end_date'])."',
					  ".$_REQUEST['release_add_sprint'].")");
      
      
    $mrequest=new requete("SELECT * FROM kados_sprints WHERE sprint_id='".$request->insert_id()."'",$cnx->num);
    

    @$mcnx->num->kados_sprints->insert(array_shift($mrequest->recup_array_champ()));
      
    break;
  
    case 'update_sprint':
      $request=new requete("UPDATE kados_sprints SET sprint_name='".formatStringForDB($_POST['form_item_sprint'])."',
	                    sprint_start_date='".convertDateSlashToDash($_POST['form_item_start_date'])."',
			    sprint_end_date='".convertDateSlashToDash($_POST['form_item_end_date'])."' WHERE sprint_id=".$_POST['sprint_2update_id'],$cnx->num);
        $mcnx->num->kados_sprints->update(array('sprint_id'=>$_POST['sprint_2update_id']),array('$set'=>array('sprint_name'=>formatStringForDB($_POST['form_item_sprint']),'sprint_start_date'=>convertDateSlashToDash($_POST['form_item_start_date']),'sprint_end_date'=>convertDateSlashToDash($_POST['form_item_end_date']))),array('multiple' => true));
    break;  
  
    case 'delete_sprint':
      // Get sprint release
      $request=new requete("SELECT sprint_release_id_fk FROM kados_sprints WHERE sprint_id=".$_REQUEST['sprint_id_2del'],$cnx->num);
      $releaseOfSprint=$request->getObject();
      // Delete sprint
      $request->envoi("DELETE FROM kados_sprints WHERE sprint_id=".$_REQUEST['sprint_id_2del']);
      $mcnx->num->kados_sprints->remove(array('sprint_id'=>$_REQUEST['sprint_id_2del']));
      // UPDATE US
      $request->envoi("UPDATE kados_user_stories SET us_sprint_id_fk=0 
                       WHERE us_sprint_id_fk=".$_REQUEST['sprint_id_2del']);
      $mcnx->num->kados_user_stories->update(array('us_sprint_id_fk'=>$_REQUEST['sprint_id_2del']),array('$set'=>array('us_sprint_id_fk'=>'0')),array('multiple' => true));
      // Re-Set sprint numbers
      $request->envoi("SELECT sprint_id FROM kados_sprints 
                       WHERE sprint_release_id_fk=".$releaseOfSprint->sprint_release_id_fk." 
                       ORDER BY sprint_start_date");
      $sprints=$request->recup_array_mono();
      for ($i=0;$i<count($sprints);$i++)
      {
        $request->envoi("UPDATE kados_sprints SET sprint_number=".($i+1)." WHERE sprint_id=".$sprints[$i]);
        $mcnx->num->kados_sprints->update(array('sprint_id'=>$sprints[$i]),array('$set'=>array('sprint_number'=>($i+1))),array('multiple' => true));
      }
    break;   	
	
	case 'show_in_kanban':
	  if (isset($_REQUEST['release2show']))
	  {
	    $request=new requete("UPDATE kados_releases SET visibility=1 WHERE release_id=".$_REQUEST['release2show'],$cnx->num);
            $mcnx->num->kados_releases->update(array('release_id'=>$_REQUEST['release2show']),array('$set'=>array('visibility'=>'1')),array('multiple' => true));
	  }	
	  if (isset($_REQUEST['sprint2show']))
	  {
	    $request=new requete("UPDATE kados_sprints SET visibility=1 WHERE sprint_id=".$_REQUEST['sprint2show'],$cnx->num);
            $mcnx->num->kados_sprints->update(array('sprint_id'=>$_REQUEST['sprint2show']),array('$set'=>array('visibility'=>'1')),array('multiple' => true));
	  }		  
	break;
	
	case 'hide_in_kanban';
	  if (isset($_REQUEST['release2hide']))
	  {	
	    $request=new requete("UPDATE kados_releases SET visibility=0 WHERE release_id=".$_REQUEST['release2hide'],$cnx->num);	
            $mcnx->num->kados_releases->update(array('release_id'=>$_REQUEST['release2hide']),array('$set'=>array('visibility'=>'0')),array('multiple' => true));
	  }	
	  if (isset($_REQUEST['sprint2hide']))
	  {	
	    $request=new requete("UPDATE kados_sprints SET visibility=0 WHERE sprint_id=".$_REQUEST['sprint2hide'],$cnx->num);	
            $mcnx->num->kados_sprints->update(array('sprint_id'=>$_REQUEST['sprint2hide']),array('$set'=>array('visibility'=>'0')),array('multiple' => true));
	  }		  
	break;

	case 'update_ext_release':
	  $request=new requete("UPDATE kados_releases SET release_name='".formatStringForDB($_POST['new_name'])."',release_due_date='".$_POST['new_due_date']."' WHERE release_id=".$_POST['release2update'],$cnx->num);
            $mcnx->num->kados_releases->update(array('release_id'=>$_POST['release2update']),array('$set'=>array('release_name'=>formatStringForDB($_POST['new_name']),'release_due_date'=>$_POST['new_due_date'])),array('multiple' => true));
	break;
	
	case 'add_feature':
      $request=new requete("INSERT INTO kados_features (feature_short_label,feature_name,feature_description,feature_project_id_fk)  
	                                            VALUES ('".formatStringForDB($_POST['form_item_feature_short_label'])."','".formatStringForDB($_POST['form_item_feature_name'])."',
												        '".formatStringForDB($_POST['form_item_feature_description'])."',".$_SESSION['current_project_id'].")",$cnx->num);	
	break;
	
	case 'update_feature':
	  $request=new requete("UPDATE kados_features SET feature_name='".formatStringForDB($_POST['form_item_feature_name'])."',
	                                                  feature_description='".formatStringForDB($_POST['form_item_feature_description'])."', 
													  feature_short_label='".formatStringForDB($_POST['form_item_feature_short_label'])."' 
							WHERE feature_id=".$_POST['feature2update'],$cnx->num);
            $mcnx->num->kados_features->update(array('feature_id'=>$_POST['feature2update']),array('$set'=>array('feature_name'=>formatStringForDB($_POST['form_item_feature_name']),'feature_description'=>formatStringForDB($_POST['form_item_feature_description']),'feature_short_label'=>formatStringForDB($_POST['form_item_feature_short_label']))),array('multiple' => true));
	break;
	
	case 'delete_feature':
	  $request=new requete("DELETE FROM kados_features WHERE feature_id=".$_REQUEST['feature2delete'],$cnx->num);
            $mcnx->num->kados_features->remove(array('feature_id'=>$_REQUEST['feature2delete']));
	break;
  }
