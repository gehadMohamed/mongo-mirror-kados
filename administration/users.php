<?php
/**
 * users.php
 * Users Management
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:administration
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     
$pathBase='../';
require_once $pathBase.'header.php';

$targetFile='users.php?';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$displayTable=true;

  switch ($_REQUEST['action'])
  {
  	case 'delete':
  	  $request=new requete("SELECT * FROM framework_users WHERE user_login='".$_REQUEST['id_to_delete']."'",$cnx->num);
      $user=$request->getObject();      
      // If address data exist, delete them
      if ($user->user_address_id_fk!=0)
      {
        $request->envoi("DELETE FROM framework_addresses WHERE address_id=".$user->user_address_id_fk);
        $mcnx->num->framework_addresses->remove(array('address_id'=>$user->user_address_id_fk));
      }  	  
  	  $request->envoi("DELETE FROM framework_users WHERE user_login='".$_REQUEST['id_to_delete']."'");
          $mcnx->num->framework_users->remove(array('user_login'=>$_REQUEST['id_to_delete']));
          ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php  	
    break;
	  
  	case 'modify':
  	  $request=new requete("SELECT * FROM framework_users WHERE user_login='".$_REQUEST['id_to_modify']."'",$cnx->num);
      $user=$request->getObject();      
      // Get the address data
      if ($user->user_address_id_fk!=0)
      {
        // If user has an address, get it and put data in the standard address object 
        $request->envoi('SELECT * FROM framework_addresses WHERE address_id='.$user->user_address_id_fk);
        $address_data=$request->getObject();
      }
      else
      {
        // If not, create an empty standard address object
		$address_data=new stdClass();
        $address_data->address_id='';
        $address_data->address_street='';
        $address_data->address_street_comments='';
        $address_data->address_zip_code='';
        $address_data->address_city='';       
		$address_data->address_country='';
      }        
      // Get user form
      $form_legend=$legend_changing_m.' '.lcfirst($text_user);
      include 'user_form.php';
      // Do not dipaly the users list table
      $displayTable=false;  	
    break;	
     
    case 'submit_modify':
      // If Global Settings allow the use of an address for users
      if ($global_settings_use_user_address)
      {
        // Get the address id
        $request=new requete("SELECT user_address_id_fk FROM framework_users WHERE user_login='".$_REQUEST['form_item_login']."'",$cnx->num);
        $user=$request->getObject();
        // If user has an address id
        if ($user->user_address_id_fk!=0)
        { 
          // Update Address with the proper script (data are gotten from the "modify" form)
          include $pathBase.'common_scripts/script_address_update.php';
        }
        // No address for the use, check if the address in the form is not empty 
        elseif (address_exists($_POST))
        {
          // Create the address
          include $pathBase.'common_scripts/script_address_create.php';
          $request->envoi("UPDATE framework_users SET user_address_id_fk=".$id_address." WHERE user_login='".$_REQUEST['form_item_login']."'");
          $mcnx->num->framework_users->update(array('user_login'=>$_REQUEST['form_item_login']),array('$set'=>array('user_address_id_fk'=>$id_address)),array('multiple' => true));
        }  
      }    
      $changePassword='';
      $mongoChangePassword=array();
      if ($_POST['form_item_password']!='')
      {
        $changePassword="user_password='".md5(substr($_POST['form_item_password'],0,15))."',";  
        $mongoChangePassword = array('user_password'=>md5(substr($_POST['form_item_password'],0,15)));
      }
      // Update user with data from the form
  	  $request=new requete("UPDATE framework_users 
                                SET user_name='".$_POST['form_item_name']."',
                                    user_firstname='".$_POST['form_item_firstname']."',
                                    user_mail='".$_POST['form_item_email']."',
                                    ".$changePassword." 
                                    user_profile_id_fk=".$_POST['form_item_profile'].",
                                    user_language='".$_POST['form_item_language']."' 
                                WHERE user_login='".$_REQUEST['form_item_login']."'",$cnx->num);
          $mcnx->num->framework_users->update(array('user_login'=>$_REQUEST['form_item_login']),array('$set'=>  array_merge(array('user_name'=>$_POST['form_item_name'],'user_firstname'=>$_POST['form_item_firstname'],'user_mail'=>$_POST['form_item_email'],'user_profile_id_fk'=>$_POST['form_item_profile'],'user_language'=>$_POST['form_item_language']),$mongoChangePassword)),array('multiple' => true));
          ?>
       <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div> <?php
    break;  
     
    case 'new':
      // create an empty standard user object
	  $user=new stdClass();
      $user->user_login='';
      $user->user_firstname='';
      $user->user_name='';
	  $user->user_profile_id_fk=0;
      $user->user_mail='';
      $user->user_password='';
	  $user->user_theme='default';
	  $user->user_language='fr';
      if ($global_settings_use_user_address)
      {
        // create an empty standard address object if used
		$address_data=new stdClass();
        $address_data->address_id='';
        $address_data->address_street='';
        $address_data->address_street_comments='';
        $address_data->address_zip_code='';
        $address_data->address_city='';
        $address_data->address_country='';
      }
      // Get the standard user form        
      $form_legend=$legend_creation_m.' '.lcfirst($text_user);
      include 'user_form.php';
      $displayTable=false;
    break;
    
    case 'submit_new':
      $syntaxOK=true;  
      $FormLogin=substr($_POST['form_item_login'],0,15);  
      if (!preg_match("/^[a-z0-9]+$/",$FormLogin))
      {
        $syntaxOK=false;  
      }    
      if ($syntaxOK)
      {
        if ($global_settings_use_user_address && address_exists($_POST))
        {
          include $pathBase.'common_scripts/script_address_create.php';
        }
        else
        {
          $id_address=0;
        }   
  	$request=new requete("INSERT INTO framework_users (user_login,user_name,user_firstname,user_mail,user_password,
	                                                    user_address_id_fk,user_profile_id_fk,user_creation_date,user_language,user_theme) 
	                      VALUES ('".strtolower($_POST['form_item_login'])."','".$_POST['form_item_name']."','".$_POST['form_item_firstname']."',
                                      '".$_POST['form_item_email']."','".md5(substr($_POST['form_item_password'],0,15))."',".$id_address.','.$_POST['form_item_profile'].",
				      '".aujourdhui()."','".$_POST['form_item_language']."','".$global_settings_default_theme."')",$cnx->num);
        $mcnx->num->framework_users->insert(array('user_login'=>strtolower($_POST['form_item_login']),'user_name'=>$_POST['form_item_name'],
            'user_firstname'=>$_POST['form_item_firstname'],'user_mail'=>$_POST['form_item_email'],
            'user_password'=>md5(substr($_POST['form_item_password'],0,15)),'user_address_id_fk'=>$id_address,
            'user_profile_id_fk'=>$_POST['form_item_profile'],'user_creation_date'=>aujourdhui(),
            'user_language'=>$_POST['form_item_language'],'user_theme'=>$global_settings_default_theme));												 
        ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_created;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
      }
      else
      {?>
        <div class="MessageBox WarningMessageBox"><?php echo $msg_user_format_ko;?></div><?php
        // create an empty standard user object
	$user=new stdClass();
        $_REQUEST['action']='new';
        $user->user_login='';
        $user->user_firstname=$_POST['form_item_firstname'];
        $user->user_name=$_POST['form_item_name'];
	$user->user_profile_id_fk=$_POST['form_item_profile'];
        $user->user_mail=$_POST['form_item_email'];
        $user->user_password='';
	$user->user_theme='default';
	$user->user_language=$_POST['form_item_language'];
        if ($global_settings_use_user_address)
        {
          // create an empty standard address object if used
	  $address_data=new stdClass();
          $address_data->address_id='';
          $address_data->address_street='';
          $address_data->address_street_comments='';
          $address_data->address_zip_code='';
          $address_data->address_city='';
          $address_data->address_country='';
        }
        // Get the standard user form        
        $form_legend=$legend_creation_m.' '.lcfirst($text_user);
        include 'user_form.php';
        $displayTable=false;          
      }    
    break;

    case 'search_ldap_uid':	
    case 'search_ldap':
      // include form to search the LDAP
      include 'ldap_form_search.php';
      $displayTable=false;
    break;
	
	case 'add_user_from_ldap':
	  $request=new requete("SELECT * FROM framework_users WHERE user_login='".$_REQUEST['username']."'",$cnx->num);
	  $request->calc_nb_elt();
	  if ($request->nb_elt!=0)
	  {?>
         <div class="MessageBox WarningMessageBox"><?php echo $msg_user_already_exists;?></div>	  <?php
	    
	  }
	  else
	  {
	    // Get default profile
		$request->envoi("SELECT profile_id FROM framework_profiles WHERE profile_default=1");
		$request->getObject();
		$defaultProfileId=$request->objet->profile_id;
		// Get LDAP data
	    include $pathBase.'conf/ldap.conf';
	    $ldapConnection=new mt_ldap($ldap_server,$ldap_port,$ldap_base_dn,$ldap_uid_field,$ldap_attributes,$ldap_all_attributes);		 
	    // get user data
	    $userData=$ldapConnection->get_all_data($_REQUEST['username']);	  
 	    $request->envoi("INSERT INTO framework_users (user_login,user_name,user_firstname,user_mail,user_password,
		                                               user_address_id_fk,user_profile_id_fk,user_creation_date,user_status_id_fk,
													   user_connection_mode,user_theme) 
	                      VALUES ('".strtolower($_REQUEST['username'])."','".$userData->lastname."','".$userData->firstname."',
						          '".$userData->mail."','',0,".$defaultProfileId.",'".aujourdhui()."',
								  (SELECT status_id FROM framework_status WHERE status_target_object='USR' ANd status_order=1),
								  'LDAP','".$global_settings_default_theme."')");
            
            $mcnx->num->framework_users->insert(array('user_login'=>strtolower($_REQUEST['username']),'user_name'=>$userData->lastname,'user_firstname'=>$userData->firstname,'user_mail'=>$userData->mail,'user_password'=>"",'user_address_id_fk'=>"0",'user_profile_id_fk'=>$defaultProfileId,'user_creation_date'=>aujourdhui(),'user_status_id_fk'=>"(SELECTstatus_idFROMframework_statusWHEREstatus_target_object='USR'ANdstatus_order=1)",'user_connection_mode'=>"LDAP",'user_theme'=>$global_settings_default_theme));
            ?>
	    <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_created;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
	  }
	break;
	
	case 'change_status':
	  $wkf=new workflow('USR','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
      $wkf->change_object_status($_REQUEST['user_login'],$_REQUEST['new_status_id']);?>
	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_status_changed;?></div><?php
	break;		
  }  	 
  
  if ($displayTable)
  {
     $wkf=new workflow('USR','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
	 $wkf->set_profile('framework_workflows_transitions_profiles','profile_id_fk',$_SESSION['user_profile']);
	 displayButton($button_new_user,$pathImages.'add_user.png',$targetFile.'&action=new');	     
         if ($global_settings_use_ldap)
         {
	   displayButton($button_new_user_ldap,$pathImages.'search_ldap.png',$targetFile.'&action=search_ldap');
         }  ?>
     <div class="clearleft"></div><?php
	 
     $filtres=new filtres($pathBase,$pathImages);
	 $filtres->add_field('filter_user_login',$text_login,'string','user_login');     	
     $filtres->add_field('filter_user_name',$text_name,'string','user_name');     	
	 $filtres->add_field('filter_user_mail',$text_email,'string','user_mail');     	

    $filtres->afficher($targetFile,$button_filter,$text_filter_inactive);
	  
     $sqlUsers="SELECT * 
	            FROM framework_status,framework_status_translations,framework_users 
	                 LEFT JOIN framework_profiles ON user_profile_id_fk=profile_id 
				WHERE status_translation_language='".$_SESSION['language']."' 
				AND user_status_id_fk=status_id_fk AND status_id_fk=status_id ".$filtres->return_sql_filter();; 
     $request=new requete($sqlUsers,$cnx->num); 	  	     
     $request->calc_nb_elt();
     $pageNumbering=new page_numbering('page_users',$request->nb_elt,$targetFile,$pathImages,getParameter('PGNUBR',$cnx->num));
           
     $sortColumn=new sort_column('user_sort',$targetFile,$pathImages);
     $pageNumbering->display_navigator($text_no_item);?>
     <table class="TableData">
       <tr> 
         <th><?php echo $text_login;  $sortColumn->display_sort_buttons('user_login');?></th>
         <th><?php echo $text_firstname;  $sortColumn->display_sort_buttons('user_firstname');?></th>
         <th><?php echo $text_name;  $sortColumn->display_sort_buttons('user_name');?></th>
         <th><?php echo $text_email;  $sortColumn->display_sort_buttons('user_mail');?></th>
		 <th><?php echo $text_language;  $sortColumn->display_sort_buttons('user_language');?></th>
		 <th><?php echo $text_profile;  $sortColumn->display_sort_buttons('profile_name');?></th>
		 <th><?php echo $text_connection_mode;  $sortColumn->display_sort_buttons('user_connection_mode');?></th>
   
		 <th><?php echo $text_status; ?></th>         
		 <th><center><a href="#" class="<?php echo TipCssDisplay($text_workflow);?>"><img src="<?php echo $pathImages;?>workflow.gif" border="0"  /><span><?php echo $text_workflow;?></span></a></center></th>		 
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_management);?>"><img src="<?php echo $pathImages;?>file.gif" border="0" /><span><?php echo $text_management;?></span></a></center></th>       
       </tr><?php
       $request->envoi($sqlUsers.$sortColumn->return_sql_order_by().$pageNumbering->return_sql_limit(),$cnx->num); 	  	     
       $resultsArray=$request->getArrayFields();       
       for ($i=0;$i<count($resultsArray);$i++)
       { ?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td><?php echo $resultsArray[$i]['user_login'];?></td>
           <td><?php echo $resultsArray[$i]['user_firstname'];?></td>
           <td><?php echo $resultsArray[$i]['user_name'];?></td>
           <td><a href="mailto:<?php echo $resultsArray[$i]['user_mail'];?>" class="mailto_link"><?php echo $resultsArray[$i]['user_mail'];?></a></td>
		   <td><?php echo $resultsArray[$i]['user_language'];?></td>
		   <td><?php 
		      if ($resultsArray[$i]['profile_id']==0)
			  {
			    echo $text_std_profile;
			  }
			  else
			  {
		        echo $resultsArray[$i]['profile_name'];
			  }?>
		   </td>
		   <td><?php echo $resultsArray[$i]['user_connection_mode'];?></td>
		   <td><?php echo $resultsArray[$i]['status_translation_value'];?></td>
           <td class="nowrap"><center><?php
		     $status_list=$wkf->etats_suivants_tablo($resultsArray[$i]['user_login']);
			 for ($k=0;$k<count($status_list);$k++)
			 {?>
			     <a href="<?php echo $targetFile;?>&action=change_status&new_status_id=<?php echo $status_list[$k]['status_id']; ?>&user_login=<?php echo $resultsArray[$i]['user_login'];?>" class="<?php echo TipCssDisplay($action_change_status.' : '.$status_list[$k]['status_value']);?>"><img src="<?php echo $pathImages.$status_list[$k]['status_icon'];?>" border="0"  /><span><?php echo $action_change_status.' : '.$status_list[$k]['status_value'];?></span></a><?php
			 }?></center>
		   </td> 		   
           <td class="nowrap"><center><a href="<?php echo $targetFile;?>&action=modify&id_to_modify=<?php echo $resultsArray[$i]['user_login'];?>" class="info"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_modify;?></span></a><?php
                if ($resultsArray[$i]['user_login']!=$_SESSION['login'])
                {?>
                   <a href="<?php echo $targetFile;?>&action=delete&id_to_delete=<?php echo $resultsArray[$i]['user_login'];?>" class="info" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');"><img src="<?php echo $pathImages;?>delete.gif" border=0 /><span><?php echo $action_delete;?></span></a><?php
                }?></center>
           </td>                      
         </tr><?php
       }?>
     </table><?php
  }

$cnx->close();  

require_once $pathBase.'footer.php';?>

