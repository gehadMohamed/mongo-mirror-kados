<?php
/**
 * External Connections Management
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Administration:ExternalConnections
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     
$pathBase='../';
require_once $pathBase.'header.php';

$targetFile='external_connections.php?';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$displayTable=true;

  switch ($_REQUEST['action'])
  {
  	case 'delete':
  	  $request=new requete("DELETE FROM kados_connections WHERE connection_id=".$_REQUEST['id_to_delete'],$cnx->num);
            $mcnx->num->kados_connections->remove(array('connection_id'=>$_REQUEST['id_to_delete']));
            ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php  	
    break;
	  
  	case 'modify':
      $wkf=new workflow('CON','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
  	  $request=new requete("SELECT * FROM kados_connections WHERE connection_id='".$_REQUEST['id_to_modify']."'",$cnx->num);
      $connectionData=$request->getObject();      
	  $connectionData->status_value=$wkf->valeur_etat($connectionData->connection_status_id_fk);	  	  
      // Get connection form
      $form_legend=$legend_changing_f.' '.lcfirst($text_connection);
      include 'connection_form.php';
      // Do not dipaly the connections list table
      $displayTable=false;  	
    break;	
     
    case 'submit_modify':
	  // Update connection with data from the form
	  if ($_POST['form_item_connection_port']=='')
      {	  
	    $_POST['form_item_connection_port']=0;
	  }
	  
  	  $request=new requete("UPDATE kados_connections SET
	                               connection_name='".$_POST['form_item_connection_name']."',
								   connection_status_id_fk=".$_POST['form_item_connection_status'].",
						           connection_db_type='".$_POST['form_item_database_type']."',
								   connection_host='".$_POST['form_item_connection_host']."',
						           connection_port=".$_POST['form_item_connection_port'].",
								   connection_dbname='".$_POST['form_item_connection_dbname']."',
								   connection_user='".$_POST['form_item_connection_user']."',
						           connection_password='".$_POST['form_item_connection_password']."',
								   connection_table_projects='".$_POST['form_item_connection_project_table']."',
								   connection_project_id_field='".$_POST['form_item_connection_project_id_field']."',
								   connection_project_name_field='".$_POST['form_item_connection_project_name_field']."',
								   connection_project_filter_clause='".$_POST['form_item_connection_project_filter_clause']."',
						           connection_table_releases='".$_POST['form_item_connection_release_table']."',
								   connection_release_id_field='".$_POST['form_item_connection_release_id_field']."',
						           connection_release_name_field='".$_POST['form_item_connection_release_name_field']."',
								   connection_release_due_date_field='".$_POST['form_item_connection_release_due_date_field']."',
								   connection_release_due_date_request='".$_POST['form_item_connection_release_due_date_request']."',
								   connection_release_filter_clause='".$_POST['form_item_connection_release_filter_clause']."',
								   connection_release_to_project_field='".$_POST['form_item_connection_release_to_project_field']."',
						           connection_table_release_project='".$_POST['form_item_connection_projet_release_table']."',
								   connection_foreign_key_project_field='".$_POST['form_item_connection_foreign_key_project_field']."',
								   connection_foreign_key_release_field='".$_POST['form_item_connection_foreign_key_release_field']."'
								   WHERE connection_id=".$_REQUEST['connection_id'],
								   $cnx->num);	
          $mcnx->num->kados_connections->update(array('connection_id'=>$_REQUEST['connection_id']),array('$set'=>array('connection_name'=>$_POST['form_item_connection_name'],'connection_status_id_fk'=>$_POST['form_item_connection_status'],'connection_db_type'=>$_POST['form_item_database_type'],'connection_host'=>$_POST['form_item_connection_host'],'connection_port'=>$_POST['form_item_connection_port'],'connection_dbname'=>$_POST['form_item_connection_dbname'],'connection_user'=>$_POST['form_item_connection_user'],'connection_password'=>$_POST['form_item_connection_password'],'connection_table_projects'=>$_POST['form_item_connection_project_table'],'connection_project_id_field'=>$_POST['form_item_connection_project_id_field'],'connection_project_name_field'=>$_POST['form_item_connection_project_name_field'],'connection_project_filter_clause'=>$_POST['form_item_connection_project_filter_clause'],'connection_table_releases'=>$_POST['form_item_connection_release_table'],'connection_release_id_field'=>$_POST['form_item_connection_release_id_field'],'connection_release_name_field'=>$_POST['form_item_connection_release_name_field'],'connection_release_due_date_field'=>$_POST['form_item_connection_release_due_date_field'],'connection_release_due_date_request'=>$_POST['form_item_connection_release_due_date_request'],'connection_release_filter_clause'=>$_POST['form_item_connection_release_filter_clause'],'connection_release_to_project_field'=>$_POST['form_item_connection_release_to_project_field'],'connection_table_release_project'=>$_POST['form_item_connection_projet_release_table'],'connection_foreign_key_project_field'=>$_POST['form_item_connection_foreign_key_project_field'],'connection_foreign_key_release_field'=>$_POST['form_item_connection_foreign_key_release_field'])),array('multiple' => true));
          ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;  
     
    case 'new':
      $wkf=new workflow('CON','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
      // create an empty standard connection object
	  $connectionData=new stdClass();
      $connectionData->connection_id='';
      $connectionData->connection_name='';
      $connectionData->connection_host=''; 
      $connectionData->connection_port=''; 
	  $connectionData->connection_dbname=''; 
      $connectionData->connection_user=''; 
      $connectionData->connection_password=''; 
      $connectionData->connection_table_projects=''; 
      $connectionData->connection_project_id_field=''; 
      $connectionData->connection_project_name_field=''; 
	  $connectionData->connection_project_filter_clause=''; 
      $connectionData->connection_table_releases=''; 
      $connectionData->connection_release_id_field=''; 
      $connectionData->connection_release_name_field=''; 
	  $connectionData->connection_release_due_date_field=''; 
	  $connectionData->connection_release_due_date_request=''; 
	  $connectionData->connection_release_filter_clause=''; 	  
      $connectionData->connection_release_to_project_field=''; 
      $connectionData->connection_table_release_project=''; 
      $connectionData->connection_foreign_key_project_field=''; 
      $connectionData->connection_foreign_key_release_field=''; 
	  $connectionData->connection_status_id_fk=$wkf->init_statut();
	  $connectionData->status_value=$wkf->valeur_etat($connectionData->connection_status_id_fk);	  
      // Get the standard connection form        
      $form_legend=$legend_creation_f.' '.lcfirst($text_connection);
      include 'connection_form.php';
      $displayTable=false;
    break;
    
    case 'submit_new':
	  if ($_POST['form_item_connection_port']=='')
      {	  
	    $_POST['form_item_connection_port']=0;
	  }	
  	  $request=new requete("INSERT INTO kados_connections (	connection_name, 
	                                                        connection_status_id_fk, 
	                                                        connection_db_type, 
	                                                        connection_host, 
	                                                        connection_port, 
															connection_dbname,
	                                                        connection_user, 
	                                                        connection_password, 
	                                                        connection_table_projects, 
	                                                        connection_project_id_field, 
	                                                        connection_project_name_field, 
															connection_project_filter_clause,
	                                                        connection_table_releases, 
	                                                        connection_release_id_field, 
	                                                        connection_release_name_field, 
														    connection_release_due_date_field,
								                            connection_release_due_date_request,
															connection_release_filter_clause,
	                                                        connection_release_to_project_field, 
	                                                        connection_table_release_project, 
	                                                        connection_foreign_key_project_field, 
	                                                        connection_foreign_key_release_field) 
	                       VALUES ('".$_POST['form_item_connection_name']."',".$_POST['form_item_connection_status'].",
						           '".$_POST['form_item_database_type']."','".$_POST['form_item_connection_host']."',
						           ".$_POST['form_item_connection_port'].",'".$_POST['form_item_connection_dbname']."','".$_POST['form_item_connection_user']."',
						           '".$_POST['form_item_connection_password']."','".$_POST['form_item_connection_project_table']."',
								   '".$_POST['form_item_connection_project_id_field']."','".$_POST['form_item_connection_project_name_field']."',
								   '".$_POST['form_item_connection_project_filter_clause']."',
						           '".$_POST['form_item_connection_release_table']."','".$_POST['form_item_connection_release_id_field']."',
						           '".$_POST['form_item_connection_release_name_field']."','".$_POST['form_item_connection_release_due_date_field']."',
								   '".$_POST['form_item_connection_release_due_date_request']."','".$_POST['form_item_connection_release_filter_clause']."',
								   '".$_POST['form_item_connection_release_to_project_field']."',
						           '".$_POST['form_item_connection_projet_release_table']."','".$_POST['form_item_connection_foreign_key_project_field']."',
								   '".$_POST['form_item_connection_foreign_key_release_field']."')",
								   $cnx->num);
          
          
         $mrequest=new requete("SELECT * FROM kados_connections WHERE connection_id='".$request->insert_id()."'",$cnx->num);
    
         $mcnx->num->kados_connections->insert(array_shift($mrequest->recup_array_champ()));
          
          ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_created;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;
	
	case 'change_status':
	  $wkf=new workflow('CON','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
      $wkf->change_object_status($_REQUEST['connection_id'],$_REQUEST['new_status_id']);?>
	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_status_changed;?></div><?php
	break;		
  }  	 
  
  if ($displayTable)
  {
     $wkf=new workflow('CON','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
	 $wkf->set_profile('framework_workflows_transitions_profiles','profile_id_fk',$_SESSION['user_profile']);
	 displayButton($button_new_connection,$pathImages.'app/connection.png',$targetFile.'&action=new');	
      
     $sqlConnections="SELECT * FROM framework_status,framework_status_translations,kados_connections WHERE status_translation_language='".$_SESSION['language']."' AND connection_status_id_fk=status_id_fk AND status_id_fk=status_id"; 
     $request=new requete($sqlConnections,$cnx->num); 	  	     
     $request->calc_nb_elt();
     $pageNumbering=new page_numbering('page_connections',$request->nb_elt,$targetFile,$pathImages,getParameter('PGNUBR',$cnx->num));
           
     $sortColumn=new sort_column('connection_sort',$targetFile,$pathImages);
     $pageNumbering->display_navigator($text_no_item);?>
     <table class="TableData">
       <tr> 
         <th><?php echo $text_login;  $sortColumn->display_sort_buttons('connection_id');?></th>
         <th><?php echo $text_name;  $sortColumn->display_sort_buttons('connection_name');?></th>
		 <th><?php echo $text_database_type;  $sortColumn->display_sort_buttons('connection_db_type');?></th>
         <th><?php echo $text_host;  $sortColumn->display_sort_buttons('connection_host');?></th>
		 <th><?php echo $text_port;  $sortColumn->display_sort_buttons('connection_port');?></th>
		 <th><?php echo $text_dbname;  $sortColumn->display_sort_buttons('connection_dbname');?></th>
		 <th><?php echo $text_user;  $sortColumn->display_sort_buttons('connection_user');?></th>
		 <th><?php echo $text_project_table;  $sortColumn->display_sort_buttons('connection_table_projects');?></th>
		 <th><?php echo $text_release_table;  $sortColumn->display_sort_buttons('connection_table_releases');?></th>
		 <th><?php echo $text_connection_test; ?></th>
		 <th><?php echo $text_requests_tests; ?></th>
   		 <th><?php echo $text_status; ?></th>         
		 <th><center><a href="#" class="<?php echo TipCssDisplay($text_workflow);?>"><img src="<?php echo $pathImages;?>workflow.gif" border="0"  /><span><?php echo $text_workflow;?></span></a></center></th>		 
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_management);?>"><img src="<?php echo $pathImages;?>file.gif" border="0" /><span><?php echo $text_management;?></span></a></center></th>       
       </tr><?php
       $request->envoi($sqlConnections.$sortColumn->return_sql_order_by().$pageNumbering->return_sql_limit(),$cnx->num); 	  	     
       $resultsArray=$request->getArrayFields();       
       for ($i=0;$i<count($resultsArray);$i++)
       { ?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td><?php echo $resultsArray[$i]['connection_id'];?></td>
           <td><?php echo $resultsArray[$i]['connection_name'];?></td>
		   <td><?php echo $resultsArray[$i]['connection_db_type'];?></td>
		   <td><?php echo $resultsArray[$i]['connection_host'];?></td>
		   <td><?php echo $resultsArray[$i]['connection_port'];?></td>
		   <td><?php echo $resultsArray[$i]['connection_dbname'];?></td>
		   <td><?php echo $resultsArray[$i]['connection_user'];?></td>
		   <td><?php echo $resultsArray[$i]['connection_table_projects'];?></td>
		   <td><?php echo $resultsArray[$i]['connection_table_releases'];?></td>
		   <td><?php // test connection to DB
		     $testDbOK=false;
			 $dbPath=$resultsArray[$i]['connection_host'];
			 if ($resultsArray[$i]['connection_port']!='' && $resultsArray[$i]['connection_port']!=0)
			 {
			   $dbPath.=':'.$resultsArray[$i]['connection_port'];
			 }
			 $cnx_ext=new connexion_mysql($dbPath,$resultsArray[$i]['connection_user'],$resultsArray[$i]['connection_password'],$resultsArray[$i]['connection_dbname']);
			 $result=$cnx_ext->createConnection();
			 $answerServer=explode(':',$result);
			 if ($answerServer[0]=='OK')
			 {
			   $testDbOK=true;
			   echo $text_db_connect_ok;
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
		   ?>
		   </td>
		   <td><?php // test request to DB
		     $testRequestsOK=false;
		     if ($testDbOK)
			 {
			   // test if project request is OK
			   $request_ext=new requete("SELECT ".$resultsArray[$i]['connection_project_id_field'].",".$resultsArray[$i]['connection_project_name_field']." 
			                             FROM ".$resultsArray[$i]['connection_table_projects'],$cnx_ext->num);
			   if ($request_ext->log)
			   {
			     $request_ext->calc_nb_elt();
				 if ($request_ext->nb_elt!=0)
				 {
				   $request_ext->recup_array_mono();
				   $projectTestId=$request_ext->array[0][0];
				   // test if release request is OK
				   if ($resultsArray[$i]['connection_table_release_project']!='')
				   {
				     // request releases linked to the projet with a third table
				     $request_ext->envoi("SELECT rel.".$resultsArray[$i]['connection_release_id_field'].",rel.".$resultsArray[$i]['connection_release_name_field']." 
					                      FROM ".$resultsArray[$i]['connection_table_releases']." rel,".$resultsArray[$i]['connection_table_release_project']." link
										  WHERE rel.".$resultsArray[$i]['connection_release_id_field']."=link.".$resultsArray[$i]['connection_foreign_key_release_field']." 
										        AND link.".$resultsArray[$i]['connection_foreign_key_project_field']."=".$projectTestId);

					 $requestReleasesTest=$request_ext->log;						
				   }
				   else
				   {
				     // request releases linked to the projet with a foreign key field
				     $request_ext->envoi("SELECT ".$resultsArray[$i]['connection_release_id_field'].",".$resultsArray[$i]['connection_release_name_field']." 
					                      FROM ".$resultsArray[$i]['connection_table_releases']."  
										  WHERE ".$resultsArray[$i]['connection_release_to_project_field']."=".$projectTestId);
					 $requestReleasesTest=$request_ext->log;						
				   }
				   // continue report
				   if ($requestReleasesTest)
				   {
				     // everything OK
				     $testRequestsOK=true;	
					 echo $text_requests_tests_ok;
				   }	 
				   else
				   {
				     echo $text_request_release_ko;
				   }
				 }
				 else
				 {
				   // Request OK but no project
				   echo $text_request_ok_no_project;
				 }  
			   }
			   else
			   {
			     echo $text_request_project_ko;
			   }
			 }  ?>
		   </td>
		   <td><?php echo $resultsArray[$i]['status_translation_value'];?></td>		   
           <td class="nowrap"><center><?php
		     // Test connection before allow activation
			 if ($testRequestsOK)
			 {
		       $statusList=$wkf->etats_suivants_tablo($resultsArray[$i]['connection_id']);
			   for ($k=0;$k<count($statusList);$k++)
			   {?>
			     <a href="<?php echo $targetFile;?>&action=change_status&new_status_id=<?php echo $statusList[$k]['status_id']; ?>&connection_id=<?php echo $resultsArray[$i]['connection_id'];?>" class="<?php echo TipCssDisplay($action_change_status.' : '.$statusList[$k]['status_value']);?>"><img src="<?php echo $pathImages.$statusList[$k]['status_icon'];?>" border="0"  /><span><?php echo $action_change_status.' : '.$statusList[$k]['status_value'];?></span></a><?php
			   }
			  }?> </center>
		   </td> 		   
           <td class="nowrap"><center><?php
		      if ($resultsArray[$i]['status_update_available'])
			  {?>
		         <a href="<?php echo $targetFile;?>&action=modify&id_to_modify=<?php echo $resultsArray[$i]['connection_id'];?>" class="info"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_modify;?></span></a><?php
			  }	 
			  $request->envoi('SELECT project_id FROM kados_projects WHERE project_external_project_connection_id='.$resultsArray[$i]['connection_id']);
			  $isRelatedProjects=$request->calc_nb_elt();
              if ($resultsArray[$i]['status_delete_available'] && !$isRelatedProjects)
              {?>
                 <a href="<?php echo $targetFile;?>&action=delete&id_to_delete=<?php echo $resultsArray[$i]['connection_id'];?>" class="info" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');"><img src="<?php echo $pathImages;?>delete.gif" border=0 /><span><?php echo $action_delete;?></span></a><?php
              }?></center>
           </td>                      
         </tr><?php
       }?>
     </table><?php
  }

$cnx->close();  

require_once $pathBase.'footer.php';?>

