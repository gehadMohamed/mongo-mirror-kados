<?php
/**
 * Get projects of an external connection
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ExternalProjects:GetReleases
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

  // Get connection data
  $request->envoi("SELECT * FROM kados_connections WHERE connection_id=".$project_external_project_connection_id);
  $connectionData=$request->getObject();
 
    $projectsList=array();
	// get projects already created from this connection
	$clause='';
    if (!isset($projectFindId))
    {	
      $request->envoi("SELECT project_external_project_id FROM kados_projects 
	                  WHERE project_external_project_id!=0 
		  			      AND project_external_project_connection_id=".$project_external_project_connection_id);
	  $request->calc_nb_elt();
	  if ($request->nb_elt!=0)
	  {
        $request->recup_array_mono();	
	    $clause="WHERE ".$connectionData->connection_project_id_field." NOT IN (".implode(',',$request->array).")";
	  }  
	}  
	else
    {
      $clause.=' WHERE '.$connectionData->connection_project_id_field.'='.$projectFindId;
    }
	
	// Build connection to external server
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
	  // send request for projects to external server
	  // add SQL filter if exists
	  if ($connectionData->connection_project_filter_clause!='')
	  {
	    if ($clause=='')
	    {
  	      $clause=' WHERE '.ltrim(ltrim($connectionData->connection_project_filter_clause),'AND');
	    }	
	    else
	    {
  	      $clause.=' AND '.ltrim(ltrim($connectionData->connection_project_filter_clause),'AND');
	    }
	  }	
	  $request_ext=new requete("SELECT ".$connectionData->connection_project_id_field." AS project_field_id,".$connectionData->connection_project_name_field." AS project_field_name 
		                        FROM ".$connectionData->connection_table_projects." ".$clause." ORDER BY project_field_name",$cnx_ext->num);
	  if ($request_ext->log)
	  {	
	    $projectsList=$request_ext->getArrayFields();
	  }
	  else
	  {
	    echo $text_request_project_ko;
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
	}?>