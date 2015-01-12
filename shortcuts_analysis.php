<?php

/**
 * Analyse shortcuts
 *
 * @category YYYYYYYYY
 * @package  XXXXXXXXX
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */

          if (isset($_REQUEST['shortcut']))
          {
            switch ($_REQUEST['shortcut'])  
            {
              case 'release':
                if (isset($_REQUEST['shortcut_id']))  
                {
                  if (is_numeric($_REQUEST['shortcut_id']))  
                  {
                    $request->envoi("SELECT release_project_id_fk
                                     FROM kados_releases
                                     WHERE release_id=".intval($_REQUEST['shortcut_id']));
                    $request->calc_nb_elt();
                    if ($request->nb_elt!=0)
                    {
                      $releaseData=$request->recup_objet();
                      if (userIsAllowedOnProject($releaseData->release_project_id_fk,$_SESSION['login']) 
                          || $_SESSION['user_profile_tag']=='ADM')
                      {    
                        $_SESSION['menu_lev1']='cockpit';
                        $_SESSION['menu_lev2']='prj_kanban';
                        $_SESSION['current_release_id']=intval($_REQUEST['shortcut_id']);
                        $_SESSION['current_project_id']=$releaseData->release_project_id_fk;
                        $targetStartFile='manage_kanban.php';
                        include $pathBase.'project_get_user_rights.php';
                      }  
                    }
                  }  
                }  
              break;
              
              case 'release_ext':
                if (isset($_REQUEST['shortcut_id']))  
                {
                  if (is_numeric($_REQUEST['shortcut_id']))  
                  {
                    $request->envoi("SELECT release_project_id_fk,release_id
                                     FROM kados_releases
                                     WHERE release_external_release_id=".intval($_REQUEST['shortcut_id']));
                    $request->calc_nb_elt();
                    if ($request->nb_elt!=0)
                    {
                      $releaseData=$request->recup_objet();
                      if (userIsAllowedOnProject($releaseData->release_project_id_fk,$_SESSION['login']) 
                          || $_SESSION['user_profile_tag']=='ADM')
                      {    
                        $_SESSION['menu_lev1']='cockpit';
                        $_SESSION['menu_lev2']='prj_kanban';
                        $_SESSION['current_release_id']=$releaseData->release_id;
                        $_SESSION['current_project_id']=$releaseData->release_project_id_fk;
                        $targetStartFile='manage_kanban.php';
                        include $pathBase.'project_get_user_rights.php';
                      }  
                    }
                  }  
                }                    
              break;
              
              case 'project':
                if (isset($_REQUEST['shortcut_id']))  
                {
                  if (is_numeric($_REQUEST['shortcut_id']))  
                  {
                    $request->envoi("SELECT project_id 
                                     FROM kados_projects
                                     WHERE project_id=".intval($_REQUEST['shortcut_id']));
                    $request->calc_nb_elt();
                    if ($request->nb_elt!=0)
                    {
                      $projectData=$request->recup_objet();
                      if (userIsAllowedOnProject($projectData->project_id,$_SESSION['login']) 
                          || $_SESSION['user_profile_tag']=='ADM')
                      { 
                        $_SESSION['current_project_id']=$projectData->project_id;  
                        if (isset($_REQUEST['shortcut_target']))
                        {
                          $_SESSION['menu_lev1']='cockpit';
                          $targetStartFile='project_cockpit.php';
                        }   
                        else
                        {    
                          $_SESSION['menu_lev1']='cockpit';
                          $_SESSION['menu_lev2']='prj_kanban';
                          $targetStartFile='manage_kanban.php';
                        }  
                        include $pathBase.'project_get_user_rights.php';
                      }  
                    }
                  }  
                }  
              break;    
              
              case 'project_ext':
                if (isset($_REQUEST['shortcut_id']))  
                {
                  if (is_numeric($_REQUEST['shortcut_id']))  
                  {
                    $request->envoi("SELECT project_id 
                                     FROM kados_projects 
                                     WHERE project_external_project_id=".intval($_REQUEST['shortcut_id']));
                    $request->calc_nb_elt();
                    if ($request->nb_elt!=0)
                    {
                      $projectData=$request->recup_objet();
                      if (userIsAllowedOnProject($projectData->project_id,$_SESSION['login']) 
                          || $_SESSION['user_profile_tag']=='ADM')
                      {                          
                        $_SESSION['current_project_id']=$projectData->project_id;
                        if (isset($_REQUEST['shortcut_target']))
                        {
                          $_SESSION['menu_lev1']='cockpit';
                          $targetStartFile='project_cockpit.php';
                        }   
                        else
                        {    
                          $_SESSION['menu_lev1']='cockpit';
                          $_SESSION['menu_lev2']='prj_kanban';
                          $targetStartFile='manage_kanban.php';
                        }  
                        include $pathBase.'project_get_user_rights.php';
                      }  
                    }
                  }  
                }                    
              break;      
              
              case 'sprint':
                if (isset($_REQUEST['shortcut_id']))  
                {
                  if (is_numeric($_REQUEST['shortcut_id']))  
                  {
                    $request->envoi("SELECT sprint_release_id_fk
                                     FROM kados_sprints
                                     WHERE sprint_id=".intval($_REQUEST['shortcut_id']));
                    $request->calc_nb_elt();
                    // get sprint data
                    if ($request->nb_elt!=0)
                    {
                      $sprintData=$request->recup_objet();
                      // get release data
                      $request->envoi("SELECT release_project_id_fk
                                     FROM kados_releases
                                     WHERE release_id=".$sprintData->sprint_release_id_fk);
                      $request->calc_nb_elt();
                      if ($request->nb_elt!=0)
                      {
                        $releaseData=$request->recup_objet();
                        if (userIsAllowedOnProject($releaseData->release_project_id_fk,$_SESSION['login']) 
                            || $_SESSION['user_profile_tag']=='ADM')
                        {                        
                          $_SESSION['menu_lev1']='cockpit';
                          $_SESSION['menu_lev2']='prj_kanban';
                          $_SESSION['current_sprint_id']=intval($_REQUEST['shortcut_id']);                        
                          $_SESSION['current_release_id']=$sprintData->sprint_release_id_fk;
                          $_SESSION['current_project_id']=$releaseData->release_project_id_fk;
                          $targetStartFile='manage_kanban.php';
                          include $pathBase.'project_get_user_rights.php';
                        }  
                      }
                    }
                  }  
                }  
              break;                 
            }
          }

?>
