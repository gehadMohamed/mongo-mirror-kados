<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of project
 *
 * @author Charles
 */
class project {
  var $cnxProject;
  var $projectId;
  var $name;
  var $status;
  var $adminName;
  var $adminLogin;
  var $level;
  var $externalProjectId=0;
  var $externalProjectConnexId=0;
  var $paramSprintOver;
  var $paramVisibility;
  var $paramUseTags;
  var $paramBlockRaf;
  
   function project($pathBase,$projectId)
   {
     $this->cnxProject=new connexion_db($pathBase);
     $this->projectId=$projectId;
   }
   
   function getData($projectId=0)
   {
       
     $request=new requete("SELECT project_id,project_name,status_translation_value,CONCAT(user_firstname,' ',user_name) AS project_admin,project_external_project_id,
                                  project_external_project_connection_id,project_levels,project_block_raf,  
	                          project_sprint_overlapping,project_visibility,project_creator AS project_admin_login,project_use_tags 
	                   FROM kados_projects,framework_status_translations,framework_users 
	                   WHERE project_creator=user_login 
		             AND project_status_id_fk=status_id_fk 
                             AND status_translation_language='".$_SESSION['language']."' 
		             AND project_id=".($projectId!=0 ? $projectId  : $this->projectId),$this->cnxProject->num);
     $request->countRows();
     if ($request->nb_elt!=0)
     {    
       $request->getObject(); 
       $this->name=$request->objet->project_name;  
       $this->status=$request->objet->status_translation_value;
       $this->adminName=$request->objet->project_admin;
       $this->adminLogin=$request->objet->project_admin_login;
       $this->level=$request->objet->project_levels;
       $this->externalProjectId=$request->objet->project_external_project_id;
       $this->externalProjectConnexId=$request->objet->project_external_project_connection_id;
       $this->paramSprintOver=$request->objet->project_sprint_overlapping;
       $this->paramVisibility=$request->objet->project_visibility;
       $this->paramUseTags=$request->objet->project_use_tags;
       $this->paramBlockRaf=$request->objet->project_block_raf;
     }
     else
     {    
       $this->name='';  
       $this->status='';
       $this->adminName='';
       $this->adminLogin='';
       $this->level=0;
       $this->externalProjectId=0;
       $this->externalProjectConnexId=0;
       $this->paramSprintOver=0;
       $this->paramVisibility='PUB';
       $this->paramUseTags=0;
       $this->paramBlockRaf=0;
     }         
   }
   
   function getStakeholders($projectId=0,$releaseId=0)
   {
     $clause= $releaseId==0 ? '' : ' AND release_id_fk=0 OR release_id_fk='.$releaseId;  
     
     $request=new requete("SELECT user_login_fk AS login,CONCAT(user_firstname,' ',user_name) AS name 
                           FROM kados_projects_users,framework_users   
	                   WHERE user_login=user_login_fk 
                             AND project_id_fk=".($projectId!=0 ? $projectId  : $this->projectId).$clause,$this->cnxProject->num); 	  	     
     $request->recup_array_champ();
     return $request->array;  
   }
   
   function isUserStakeholder($user,$projectId=0,$releaseId=0)
   {
     $clause= $releaseId==0 ? '' : ' AND release_id_fk=0 OR release_id_fk='.$releaseId;  
     
     $request=new requete("SELECT user_login_fk
                           FROM kados_projects_users 
	                   WHERE user_login_fk='".$user."'  
                             AND project_id_fk=".($projectId!=0 ? $projectId  : $this->projectId).$clause,$this->cnxProject->num); 	  	     
     $request->countRows();
     return $request->nb_elt;  
   }           

   function getStakeholdersAllowedToMoveTasksUsernames($projectId=0,$releaseId=0)
   {
     $clause= $releaseId==0 ? '' : ' AND release_id_fk=0 OR release_id_fk='.$releaseId;  
     
     $request=new requete("SELECT user_login_fk 
                        FROM kados_projects_users,framework_profiles_constitution_actions  
			WHERE action_tag_fk='MOVE_TASK' 
                          AND kados_projects_users.profile_id_fk=framework_profiles_constitution_actions.profile_id_fk 
		  	  AND project_id_fk=".($projectId!=0 ? $projectId  : $this->projectId).$clause,$this->cnxProject->num); 	  	     
     $request->recup_array_mono();
     return $request->array;  
   }
   
   function getUsCount($projectId=0)
   {
     $request=new requete("SELECT COUNT(us_id) AS nbUs 
                           FROM kados_user_stories 
                           WHERE kados_user_stories.active=1
	                     AND us_project_id_fk=".($projectId!=0 ? $projectId  : $this->projectId),$this->cnxProject->num); 	  	     
     $request->getObject();       
     
     return $request->objet->nbUs;
   }

   function getPblCount($projectId=0)
   {
     $request=new requete("SELECT COUNT(us_id) AS nbUs
                           FROM kados_user_stories 
                           WHERE kados_user_stories.active=1 AND us_release_id_fk=0 
	                     AND us_project_id_fk=".($projectId!=0 ? $projectId  : $this->projectId),$this->cnxProject->num); 	  	     
     $request->getObject();       
     
     return $request->objet->nbUs;
   }   
   
   function getBusinessValueSum($projectId=0)
   {
     $request=new requete("SELECT SUM(business_value) AS sum
                           FROM kados_user_stories 
                           WHERE kados_user_stories.active=1
	                     AND us_project_id_fk=".($projectId!=0 ? $projectId  : $this->projectId),$this->cnxProject->num); 	  	     
     $request->getObject();       
     
     return $request->objet->sum;
   }      
   
   function getComplexitySum($projectId=0)
   {
     $request=new requete("SELECT SUM(complexity) AS sum
                           FROM kados_user_stories 
                           WHERE kados_user_stories.active=1
	                     AND us_project_id_fk=".($projectId!=0 ? $projectId  : $this->projectId),$this->cnxProject->num); 	  	     
     $request->getObject();       
     
     return $request->objet->sum;
   }   
}?>