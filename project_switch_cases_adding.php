<?php
/**
 * Switch cases for the project adding
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
    case 'submit_new_project':
      // set project admin username
      if (isset($_POST['form_item_project_admin_search']))
      {
        // Get stakeholder username
        $username=$_POST['form_item_project_admin_search'];
        // Insert stakeholder
      }	
      else
      {
        $username=$_POST['form_item_project_admin_lb'];
      }
      // Create project
      $request=new requete("INSERT INTO kados_projects ( project_name, project_status_id_fk,project_creation_date,project_creator,
	                                                     project_levels,project_visibility) 
                          VALUES('".formatStringForDB($_POST['form_item_project_name'])."',".$_POST['form_item_project_status'].",
							       '".aujourdhui()." ".heure_brute()."','".$username."',".$_REQUEST['form_item_project_level'].",
								   '".(getParameter('READAC',$cnx->num)==1 ? 'PUB' : 'PRI')."')",$cnx->num);
// MONGO          
    $mrequest=new requete("SELECT * FROM kados_projects WHERE project_id='".$request->insert_id()."'",$cnx->num);
    

    $mcnx->num->kados_projects->insert(array_shift($mrequest->recup_array_champ()));
        

      $idNew=$request->insert_id();
   
      
      $_SESSION['current_project_id']=$idNew;
      // Default Settings of the project
      $request->envoi("INSERT INTO kados_projects_settings (project_id_fk,setting_tag,setting_value) 
	                                             VALUES (".$idNew.",'PP_VAL','0;1;2;3;5;8;13;20;30;50;80;100')");  

// MONGO              
      
      $mcnx->num->kados_projects_settings->insert(array('project_id_fk'=>"$idNew",'setting_tag'=>"PP_VAL",'setting_value'=>"0;1;2;3;5;8;13;20;30;50;80;100"));
      
      $request->envoi("INSERT INTO kados_projects_settings (project_id_fk,setting_tag,setting_value) 
	                                             VALUES (".$idNew.",'US_BVL','0;100;200;300;500;800;1000;2000')");  
      
// MONGO          
      
      $mcnx->num->kados_projects_settings->insert(array('project_id_fk'=>"$idNew",'setting_tag'=>"US_BVL",'setting_value'=>"0;100;200;300;500;800;1000;2000"));
      
      $request->envoi("INSERT INTO kados_projects_settings (project_id_fk,setting_tag,setting_value) 
	                                             VALUES (".$idNew.",'WK_DAY','0;1;2;3;4')"); 
      
// MONGO          
      
      $mcnx->num->kados_projects_settings->insert(array('project_id_fk'=>"$idNew",'setting_tag'=>"WK_DAY",'setting_value'=>"0;1;2;3;4"));
      
      // set projects as bookmark
      $request=new requete("SELECT MAX(bookmark_order) AS max FROM kados_users_bookmarks WHERE user_login_fk='".$_SESSION['login']."'",$cnx->num);
      $request->getObject();
      $order=$request->objet->max+1;	
      $request->envoi("INSERT IGNORE INTO kados_users_bookmarks (user_login_fk,project_id_fk,bookmark_order,bookmark_color) 
	                        VALUES ('".$username."',".$idNew.",".$order.",'')");
//mongo
$mcnx->num->kados_users_bookmarks->insert(array('user_login_fk'=>"$username",'project_id_fk'=>"$idNew",'bookmark_order'=>"$order",'bookmark_color'=>""));												 
      // compute access rights to this project
      include_once $pathBase.'project_get_user_rights.php';  
    break;

    case 'add_ext_project':
      // set project admin username
      if (isset($_POST['form_item_project_admin_search']))
      {
        // Get stakeholder username
        $username=$_POST['form_item_project_admin_search'];
        // Insert stakeholder
      }	
      else
      {
        $username=$_POST['form_item_project_admin_lb'];
      }        
      $wkf=new workflow('PRJ','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language']);	
      // Get project data from external server
      $request=new requete("SELECT * FROM kados_connections WHERE connection_id=".$_POST['connection_id'],$cnx->num);
      $connectionData=$request->getObject();
      $dbPath=$connectionData->connection_host;
      if ($connectionData->connection_port!='' && $connectionData->connection_port!=0)
      {
        $dbPath.=':'.$connectionData->connection_port;
      }	
      $cnx_ext=new connexion_mysql($dbPath,$connectionData->connection_user,$connectionData->connection_password,$connectionData->connection_dbname);
      $result=$cnx_ext->createConnection();
      $request_ext=new requete("SELECT ".$connectionData->connection_project_name_field." AS project_field_name 
	                        FROM ".$connectionData->connection_table_projects." WHERE ".$connectionData->connection_project_id_field."=".$_POST['form_item_ext_project_id'],$cnx_ext->num);
      if ($request_ext->log)	  
      {
        $request_ext->getObject();
        // Create project
        $request=new requete("INSERT INTO kados_projects ( project_name, project_status_id_fk,project_creation_date,project_creator,
	                                                     project_external_project_id,project_external_project_connection_id,project_levels,
														 project_visibility) 
	                        VALUES('".formatStringForDB($request_ext->objet->project_field_name)."',".$wkf->init_statut().",
							       '".aujourdhui()." ".heure_brute()."','".$username."',
								   ".$_POST['form_item_ext_project_id'].",".$_POST['connection_id'].",".$_REQUEST['form_item_project_level'].",
								   '".(getParameter('READAC',$cnx->num)==1 ? 'PUB' : 'PRI')."')",$cnx->num);
        
        
    // MONGO          
    $mrequest=new requete("SELECT * FROM kados_projects WHERE project_id='".$request->insert_id()."'",$cnx->num);
    

    $mcnx->num->kados_projects->insert($mrequest->recup_array_champ());
        
        $idNew=$request->insert_id();
        $_SESSION['current_project_id']=$idNew;
        // Default Settings of the project
      $request->envoi("INSERT INTO kados_projects_settings (project_id_fk,setting_tag,setting_value) 
	                                             VALUES (".$idNew.",'PP_VAL','0;1;2;3;5;8;13;20;30;50;80;100')");  

// MONGO              
      
      $mcnx->num->kados_projects_settings->insert(array('project_id_fk'=>"$idNew",'setting_tag'=>"PP_VAL",'setting_value'=>"0;1;2;3;5;8;13;20;30;50;80;100"));
      
      $request->envoi("INSERT INTO kados_projects_settings (project_id_fk,setting_tag,setting_value) 
	                                             VALUES (".$idNew.",'US_BVL','0;100;200;300;500;800;1000;2000')");  
      
// MONGO          
      
      $mcnx->num->kados_projects_settings->insert(array('project_id_fk'=>"$idNew",'setting_tag'=>"US_BVL",'setting_value'=>"0;100;200;300;500;800;1000;2000"));
      
      $request->envoi("INSERT INTO kados_projects_settings (project_id_fk,setting_tag,setting_value) 
	                                             VALUES (".$idNew.",'WK_DAY','0;1;2;3;4')"); 
      
// MONGO          
      
      $mcnx->num->kados_projects_settings->insert(array('project_id_fk'=>"$idNew",'setting_tag'=>"WK_DAY",'setting_value'=>"0;1;2;3;4"));
      
      // set projects as bookmark
      $request=new requete("SELECT MAX(bookmark_order) AS max FROM kados_users_bookmarks WHERE user_login_fk='".$_SESSION['login']."'",$cnx->num);
      $request->getObject();
      $order=$request->objet->max+1;	
      $request->envoi("INSERT IGNORE INTO kados_users_bookmarks (user_login_fk,project_id_fk,bookmark_order,bookmark_color) 
	                        VALUES ('".$username."',".$idNew.",".$order.",'')");
//mongo
$mcnx->num->kados_users_bookmarks->insert(array('user_login_fk'=>"$username",'project_id_fk'=>"$idNew",'bookmark_order'=>"$order",'bookmark_color'=>""));												 

        // compute access rights to this project
        include_once $pathBase.'project_get_user_rights.php';		
      }		
      else
      {?>
        <div class="MessageBox ErrorMessageBox"><?php echo $text_request_project_ko?></div><?php	 
      }
    break;		
  }
