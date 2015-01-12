<?php
/**
 * index.php
 * index page  
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:index
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */
$pathBase='./';
$pathClasses=$pathBase.'libraries/classes/';
$pathFunctions=$pathBase.'libraries/functions/';  
$pathImages=$pathBase.'images/';

require_once $pathBase.'session_settings.php';
require_once $pathBase.'common_scripts/getDefaultLanguage.php';

require_once $pathBase.'global_settings_default.php';
require_once $pathBase.'global_settings.php';

require_once $pathClasses.'class_connexion_mysql.php';
require_once $pathClasses.'class_connexion_mongodb.php';

$cnx=new connexion_db();
$_SESSION['charset']=$cnx->charset;

// Set default language using the browser language 
$request=new requete("SELECT language_tag FROM framework_languages",$cnx->num);
$availableLanguages=$request->recup_array_mono();
$browserDefaultLanguage=strtolower(getDefaultLanguage());
$browserLanguage= ($browserDefaultLanguage=='pt-br') ? 'br' : substr($browserDefaultLanguage,0,2);  
$_SESSION['language']= in_array($browserLanguage,$availableLanguages) ? $browserLanguage : $global_settings_default_language ;

if (isset($_GET['change_language']))
{  
  $request=new requete("SELECT language_tag FROM framework_languages",$cnx->num);
  $availableLanguages=$request->recup_array_mono();
  $changeLanguage=strtolower(substr($_GET['change_language'],0,2));
  $_SESSION['language']=in_array($changeLanguage,$availableLanguages) ? $changeLanguage : $global_settings_default_language ;
} 

require_once $pathClasses.'class_ldap.php';
require_once $pathFunctions.'fct_date_hour.php';
require_once $pathBase.'messages/'.$_SESSION['language'].'_ihm_messages.php';
require_once $pathBase.'messages/'.$_SESSION['language'].'_app_messages.php';
require_once $pathBase.'common_scripts/functions.php';
require_once $pathBase.'common_scripts/app_functions.php';

$targetFile='index.php?';
 
if (!isset($_REQUEST['connexion']))
{
  $_REQUEST['connexion']='';
}  

switch($_REQUEST['connexion'])
{
  case 'off':
    $saveLanguage=$_SESSION['language'];
    session_destroy();
    session_start();
    $_SESSION['language']=$saveLanguage;
  break;
}

if (!isset($_SESSION['login']))
{        
   switch($_REQUEST['connexion'])
   {
     case 'on':
       $userOK=false;
       $syntaxOK=true;  
       $FormLogin=substr($_POST['Flogin'],0,15);  
       if (!preg_match("/^[a-z0-9]+$/",strtolower($FormLogin)))
       {
         $msg_error=$msg_user_format_ko;  
         $syntaxOK=false;  
       }        
       $FormPass=substr($_POST['Fpass'],0,15);
       if ($syntaxOK)
       {
         if ($global_settings_use_ldap)
         {
           // First search user in the local users before using LDAP
           $request=new requete("SELECT user_password FROM framework_users WHERE user_login='".strtolower($FormLogin)."' AND user_connection_mode='LOCAL'",$cnx->num);
           $request->calc_nb_elt();
           if ($request->nb_elt!=0)
           {
  	     // It's a local user => use its profile
             $request->getObject();
             if ($request->objet->user_password==md5($FormPass))
             {
               $userOK=true;
             }
             else
             {
               $msg_error=$msg_wrong_password;
             }
           }
	   else
	   {
	     // It's not a local user => check if it's a LDAP user
	     include $pathBase.'conf/ldap.conf';
	     $ldapConnection=new mt_ldap($ldap_server,$ldap_port,$ldap_base_dn,$ldap_uid_field,$ldap_attributes,$ldap_all_attributes);
	     // Check if Ldap Id id OK
	     if ($ldapConnection->authenticate($FormLogin,$FormPass))
	     { 
	       // Check if user is in the BD
               $request=new requete("SELECT user_name FROM framework_users WHERE user_login='".strtolower($FormLogin)."' AND user_connection_mode='LDAP'",$cnx->num);		
               $request->calc_nb_elt();
               if ($request->nb_elt==0)
               {		
	         // If not, insert him
		 $userData=$ldapConnection->get_all_data($FormLogin);
		 // Get default profile
	         $request->envoi("SELECT profile_id FROM framework_profiles WHERE profile_default=1");
		 $request->getObject();
		 $defaultProfileId=$request->objet->profile_id;
		 // Create user
		 $request->envoi("INSERT INTO framework_users (user_login, user_name, user_firstname, user_mail, user_profile_id_fk,  user_creation_date, user_status_id_fk,user_connection_mode) VALUES ('".strtolower($FormLogin)."','".$userData->lastname."','".$userData->firstname."','".$userData->mail."',".$defaultProfileId.",'".aujourdhui()."',(SELECT status_id FROM framework_status WHERE status_target_object='USR' ANd status_order=1),'LDAP')");
                $mcnx->num->framework_users->insert(array("user_login"=>strtolower($FormLogin),"user_name"=>$userData->lastname,"user_firstname"=>$userData->firstname,"user_mail"=>$userData->mail,"user_profile_id_fk"=>$defaultProfileId,"user_creation_date"=>aujourdhui(),"user_status_id_fk"=>"(SELECT status_id FROM framework_status WHERE status_target_object='USR' ANd status_order=1)",'user_connection_mode'=>"LDAP"));
	       }
               $userOK=true;
	     }
	     else
	     {
	       $msg_error=$msg_credentials_ko;
	     }
	   }
	 }  
	 else
	 {
	   // No LDAP is used
           // search user in the user table
           $request=new requete("SELECT user_password FROM framework_users WHERE user_login='".strtolower($FormLogin)."'",$cnx->num);
           $request->calc_nb_elt();
           if ($request->nb_elt==0)
           {
             $msg_error=$msg_unknown_user;
           }
           else
           {
             $request->getObject();
             if ($request->objet->user_password==md5($FormPass))
             {
               $userOK=true;
             }
             else
             {
               $msg_error=$msg_wrong_password;
             }
           }
	 }  
       }  
       // If user is authenticated, let's go to the welcome page
       if ($userOK)
       {	
         $request=new requete("SELECT user_password,user_name,user_firstname,user_profile_id_fk,
	                              user_language,profile_tag,user_theme 
	                       FROM framework_users,framework_profiles 
	                       WHERE LOWER(user_login)='".strtolower($FormLogin)."' 
	                         AND user_profile_id_fk=profile_id",$cnx->num);
         $request->getObject();
         $_SESSION['login']=strtolower($FormLogin);     
         $_SESSION['user_fullname']=$request->objet->user_firstname.' '.$request->objet->user_name;
         $_SESSION['language']=$request->objet->user_language;
         $_SESSION['user_rights']=array();
         $_SESSION['user_theme']=$request->objet->user_theme;
         $_SESSION['user_profile']=$request->objet->user_profile_id_fk;
         $_SESSION['user_profile_tag']=$request->objet->profile_tag;
         $request->envoi('SELECT action_tag_fk FROM framework_profiles_constitution_actions WHERE profile_id_fk='.$request->objet->user_profile_id_fk);
         $_SESSION['user_actions']=$request->recup_array_mono();
         $menu_lev1=array();
         $sqlMenus="SELECT menu_tag AS tag,menu_translation_value AS titre,menu_file AS file 
                    FROM framework_menus,framework_menus_translations,framework_profiles_constitution_menus 
                    WHERE menu_father='' AND menu_translation_language='".$_SESSION['language']."' 
                      AND menu_tag=framework_menus_translations.menu_tag_fk 
                      AND menu_tag=framework_profiles_constitution_menus.menu_tag_fk 
                      AND profile_id_fk=".$_SESSION['user_profile']." 
                    ORDER BY menu_order";
         $request=new requete($sqlMenus,$cnx->num);
         $menu_lev1=$request->recup_array_champ();	
         $_SESSION['menu_lev1']='projects';	
         $targetStartFile='projects.php?';
         // Check if any shortcut
         include $pathBase.'shortcuts_analysis.php';
         header('location: ./'.$targetStartFile);
       }
     break;  
  } 
}
else
{
  $menu_lev1=array();
  $sqlMenus="SELECT menu_tag AS tag,menu_translation_value AS titre,menu_file AS file 
             FROM framework_menus,framework_menus_translations,framework_profiles_constitution_menus 
             WHERE menu_father='' AND menu_translation_language='".$_SESSION['language']."' 
               AND menu_tag=framework_menus_translations.menu_tag_fk 
               AND menu_tag=framework_profiles_constitution_menus.menu_tag_fk 
               AND profile_id_fk=".$_SESSION['user_profile']." 
             ORDER BY menu_order";
  $request=new requete($sqlMenus,$cnx->num);
  $menu_lev1=$request->recup_array_champ();	
  $_SESSION['menu_lev1']=$menu_lev1[0]['tag'];	
  $targetStartFile=$menu_lev1[0]['file'];
  // Check if any shortcut
  include $pathBase.'shortcuts_analysis.php';
  header('location: ./'.$targetStartFile);    
}
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title><?php TextDisplay($appName);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/bulle.css">
<link rel="stylesheet" type="text/css" href="css/formulaire.css">
<link rel="stylesheet" type="text/css" href="css/app.css">

<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>themes/<?php echo $global_settings_default_theme;?>/theme.css" />

<script type="text/javascript" src="<?php echo $pathBase.'js/global.js.php';?>"></script>
<script type="text/javascript" src="<?php echo $pathBase.'js/app.js.php';?>"></script>
</head>

<body>

<div class="global">

<!-- DEBUT TITRE!-->
<div class="logo"><img src="<?php echo $pathBase;?>themes/<?php echo $global_settings_default_theme;?>/images/logo.png" border="0" /></div>
<div class="display_header">
<!--   <div class="languages"><?php
   $request=new requete("SELECT language_tag FROM framework_languages",$cnx->num); 
   $resultsArray=$request->getArrayFields();
              
   for ($i=0;$i<count($resultsArray);$i++)
   {?>
     <a href="index.php?change_language=<?php echo $resultsArray[$i]['language_tag'];?>" class="std_link link_quit"><img src="<?php echo $pathImages;?>flags/<?php echo $resultsArray[$i]['language_tag'];?>-small.png" style="margin-top:2px;background-color:none" border="0"/></a> <?php
   }?></div>-->
  <div class="username"></div>
  <div class="title"><?php TextDisplay($appName);?></div>
  <div class="subtitle"><?php if (isset($appSubTitle)) { echo $appSubTitle;}?></div>
  </div>
  <div class="sol"></div>
<div class="clearleft"></div>
<!-- FIN TITRE!-->


<div class="display_body"><?php
        if (isset($msg_error))
        {?>
           <div class="MessageBox ErrorMessageBox"><?php echo $msg_error;?></div><?php
        }?>
<form action="<?php echo $targetFile;?>"  method="POST" name="form_logon" onkeypress="javascript:if(event.keyCode == 13){CheckFormLogon();}">
	     <fieldset class="fieldset">
	     <input type="hidden" name="connexion" value="on"><?php
                 if (isset($_REQUEST['shortcut']))
                 {?>
                   <input type="hidden" name="shortcut" value="<?php echo $_REQUEST['shortcut'];?>"><?php
                 }     
                 if (isset($_REQUEST['shortcut_id']))
                 {?>
                   <input type="hidden" name="shortcut_id" value="<?php echo $_REQUEST['shortcut_id'];?>"><?php
                 } 
                 if (isset($_REQUEST['shortcut_target']))
                 {?>
                   <input type="hidden" name="shortcut_target" value="<?php echo $_REQUEST['shortcut_target'];?>"><?php
                 } ?>                     
		   <legend class="legend"><?php echo $legend_logon;?></legend>
	   <label class="label required_field100" for="Flogin"><?php echo $text_login;?></label>
           <input class="std_form_field" type="text" name="Flogin" size="25" /><div class="clearleft"></div>
           <label  class="label required_field100" for="Fpass"><?php echo $text_password ;?></label>
           <input class="std_form_field" type="password" name="Fpass" size="25" /><div class="clearleft"></div><br />

		 <div style="margin-left:150px;"><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormLogon()');	?>
		 </div>  		   
		   
		  </fieldset> 
</form>
<script type="text/javascript">document.form_logon.Flogin.focus();</script>
<?php
require_once $pathBase.'footer.php';?>

