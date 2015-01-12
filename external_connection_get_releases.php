<?php
/**
 * Get releases for external project
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ExternalProjects:GetReleases
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

 
// Get releases of project
$request->envoi("SELECT release_external_release_id FROM kados_releases 
				 WHERE release_project_id_fk=".$_SESSION['current_project_id']."
				 AND release_external_release_connection_id=".$currentProject->externalProjectConnexId);
$releasesList=$request->recup_array_mono();

// Get connection data
$request->envoi("SELECT * FROM kados_connections WHERE connection_id=".$currentProject->externalProjectConnexId);
$connectionData=$request->getObject();
// Test connection DB

// Get releases list
// Display releases list
$resultsArray=array();
$releasesArray=array();
		     $testDbOK=false;
			 $dbPath=$connectionData->connection_host;
			 if ($connectionData->connection_port!='' && $connectionData->connection_port!=0)
			 {
			   $dbPath.=':'.$connectionData->connection_port;
			 }
			 $cnx_ext=new connexion_mysql($dbPath,$connectionData->connection_user,$connectionData->connection_password,$connectionData->connection_dbname);
			 $result=$cnx_ext->createConnection();
			 $answerServer=explode(':',$result);
			 if ($answerServer[0]=='OK')
			 {
			   $testDbOK=true;
			   // echo $text_db_connect_ok;
   			   if ($connectionData->connection_release_due_date_field!='')
			   {
				 // due date is from a field in the release table 
				 $dueDateField=$connectionData->connection_release_due_date_field;
			   }
			   else
			   {
				 // due date is from another table
				 $dueDateField="(".$connectionData->connection_release_due_date_request.")";
			   }			  
               			   
			   // test if release request is OK
			   if ($connectionData->connection_table_release_project!='')
			   {
			     // request releases linked to the projet with a third table
				 $request_ext=new requete("SELECT rel.".$connectionData->connection_release_id_field." AS rel_id,rel.".$connectionData->connection_release_name_field." AS rel_name,
                                                  ".$dueDateField." AS rel_due_date 
					                      FROM ".$connectionData->connection_table_releases." rel,".$connectionData->connection_table_release_project." link
										  WHERE rel.".$connectionData->connection_release_id_field."=link.".$connectionData->connection_foreign_key_release_field." 
										        AND link.".$connectionData->connection_foreign_key_project_field."=".$currentProject->externalProjectId,$cnx_ext->num);
/*echo "SELECT rel.".$connectionData->connection_release_id_field." AS rel_id,rel.".$connectionData->connection_release_name_field." AS rel_name,
                                                  ".$dueDateField." AS rel_due_date 
					                      FROM ".$connectionData->connection_table_releases." rel,".$connectionData->connection_table_release_project." link
										  WHERE rel.".$connectionData->connection_release_id_field."=link.".$connectionData->connection_foreign_key_release_field." 
										        AND link.".$connectionData->connection_foreign_key_project_field."=".$currentProject->externalProjectId;											*/
			   }
			   else
			   {
  			       // request releases linked to the projet with a foreign key field
			       $request_ext=new requete("SELECT ".$connectionData->connection_release_id_field." AS rel_id,".$connectionData->connection_release_name_field." AS rel_name,
                                             ".$dueDateField." AS rel_due_date 
				                      FROM ".$connectionData->connection_table_releases." rel  
									  WHERE ".$connectionData->connection_release_to_project_field."=".$currentProject->externalProjectId,$cnx_ext->num);
/*echo "SELECT ".$connectionData->connection_release_id_field." AS rel_id,".$connectionData->connection_release_name_field." AS rel_name,
                                             ".$dueDateField." AS rel_due_date 
				                      FROM ".$connectionData->connection_table_releases." rel  
									  WHERE ".$connectionData->connection_release_to_project_field."=".$currentProject->externalProjectId;									  */
			   }
			   // If log is true, then get the list of releases
			   if ($request_ext->log)
               {			   
			     $resultsArray=$request_ext->getArrayFields();
			   }
			 }  
			 else
			 {
			   if ($answerServer[1]=='connect')
			   {
			     echo $text_db_connect_ko;
			   }
			   else
			   {
			     echo $text_database_access_ko;
			   }
			 }
// Add to releasesArray only the release with a due date			 
for ($i=0;$i<count($resultsArray);$i++)
{
  if ($resultsArray[$i]['rel_due_date']!='')
  {
    $releasesArray[]=$resultsArray[$i];
	$releasesData[$resultsArray[$i]['rel_id']]=$resultsArray[$i];
  }
}
?>