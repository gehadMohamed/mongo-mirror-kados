<?php
/**
 * Get Project Data
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectMngt
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */   

    // line with project data and possible actions
	$request=new requete("SELECT project_id,project_name,status_translation_value,CONCAT(user_firstname,' ',user_name) AS project_admin,project_external_project_id,
	                             project_sprint_overlapping,project_visibility,project_creator AS project_admin_login,project_use_tags, 
                                 (SELECT COUNT(us_id) FROM kados_user_stories WHERE us_project_id_fk=project_id AND kados_user_stories.active=1) AS us_count,
                                 (SELECT COUNT(us_id) FROM kados_user_stories WHERE us_project_id_fk=project_id AND us_release_id_fk=0 AND kados_user_stories.active=1) AS pbl_count,									 
								 (SELECT SUM(business_value) FROM kados_user_stories WHERE us_project_id_fk=project_id AND kados_user_stories.active=1) AS bv_sum,
								 (SELECT SUM(complexity) FROM kados_user_stories WHERE us_project_id_fk=project_id AND kados_user_stories.active=1) AS complexity_sum 
	                      FROM kados_projects,framework_status_translations,framework_users 
						  WHERE project_creator=user_login 
						    AND project_status_id_fk=status_id_fk 
                            AND status_translation_language='".$_SESSION['language']."' 
							AND project_id=".$_SESSION['current_project_id'],$cnx->num); 	  	     
    $project=$request->getObject();
?>    