<?php
/**
 * My Profile Management
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectMngtUserProfile
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     
$pathBase='./';

require_once $pathBase.'header.php';
$targetFile='my_profile.php?';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$displayTable=true;

  switch ($_REQUEST['action'])
  {
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
	  if (isset($_POST['form_item_password']))
	  {
        if ($_POST['form_item_password']!='')
        {
          $changePassword="user_password='".md5(substr($_POST['form_item_password'],0,15))."',";  
          $mongoChangePassword = array('user_password'=>md5(substr($_POST['form_item_password'],0,15)));

        }
	  }	
      // Update user with data from the form
  	  $request=new requete("UPDATE framework_users 
	                        SET user_name='".$_POST['form_item_name']."',
                                    user_firstname='".$_POST['form_item_firstname']."',
	                            user_mail='".$_POST['form_item_email']."',
                                    ".$changePassword."
				    user_language='".$_POST['form_item_language']."',
                                    user_theme='".$_POST['form_item_theme']."'  
				WHERE user_login='".$_REQUEST['form_item_login']."'",$cnx->num);
          $mcnx->num->framework_users->update(array('user_login'=>$_REQUEST['form_item_login']),array('$set'=>array_merge(array('user_name'=>$_POST['form_item_name'],'user_firstname'=>$_POST['form_item_firstname'],'user_mail'=>$_POST['form_item_email'],'user_language'=>$_POST['form_item_language'],'user_theme'=>$_POST['form_item_theme']),$mongoChangePassword)),array('multiple' => true));
	  $_SESSION['user_theme']=$_POST['form_item_theme'];?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>
          <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;  
  }  	 
  
  if ($displayTable)
  {
      $myProfile=true;
      // Set variables to use the user form
      $_REQUEST['action']='modify';
      $_REQUEST['id_to_modify']=$_SESSION['login'];
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
        $address_data->address_id='';
        $address_data->address_street='';
        $address_data->address_street_comments='';
        $address_data->address_zip_code='';
        $address_data->address_city='';       
		$address_data->address_country='';     
      }        
      // Get user form
      $form_legend=$legend_changing_m.' '.lcfirst($text_user);
      include 'administration/user_form.php';
  }

$cnx->close();  

require_once $pathBase.'footer.php';?>

