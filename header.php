<?php
/**
 * header.php
 * Standard page header  
 *
 * PHP versions 4 and 5
 *
 * @category Script
 * @package  Project_Mngt:global
 * @author   Charles Santucci <charles@santucci.fr> <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://marmotech.free.fr/gestion_chantier 
 * */
if (!isset($pathBase)) {
    $pathBase='./';
}   

require_once $pathBase.'session_settings.php';

require_once $pathBase.'global_settings_default.php';
require_once $pathBase.'global_settings.php';

if (!isset($_SESSION['menu_lev1'])) {
    $_SESSION['menu_lev1']='none';
}

if (isset($_REQUEST['menu_lev1'])) {
    $_SESSION['menu_lev1']=$_REQUEST['menu_lev1'];
    $_SESSION['menu_lev2']=-1;
}

if (!isset($_SESSION['menu_lev2'])) {
    $_SESSION['menu_lev2']=-1;
}

if (isset($_REQUEST['menu_lev2'])) {
    $_SESSION['menu_lev2']=$_REQUEST['menu_lev2'];
}

if (isset($_POST['form_item_theme']))
{
  $_SESSION['user_theme']=$_POST['form_item_theme'];
}

$pathLibraries=$pathBase.'libraries/';
$pathClasses=$pathBase.'libraries/classes/';
$pathAppClasses=$pathBase.'classes/';
$pathFunctions=$pathBase.'libraries/functions/';  
$pathImages=$pathBase.'images/';
$pathImagesGeneration=$pathBase.'generated_images/';

require_once $pathClasses.'class_connexion_mysql.php';
require_once $pathClasses.'class_connexion_mongodb.php';
require_once $pathBase.'common_scripts/getDefaultLanguage.php';

// create a database connexion
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

// If language is not defined, French is the default language
if (!isset($_SESSION['language']))
{
  // Set default language using the browser language 
  $request=new requete("SELECT language_tag FROM framework_languages",$cnx->num);
  $availableLanguages=$request->recup_array_mono();
  $browserDefaultLanguage=strtolower(getDefaultLanguage());
  $browserLanguage= ($browserDefaultLanguage=='pt-br') ? 'br' : substr($browserDefaultLanguage,0,2);  
  $_SESSION['language']= in_array($browserLanguage,$availableLanguages) ? $browserLanguage : 'fr' ;
}  

if (isset($_GET['change_language']))
{  
  $request=new requete("SELECT language_tag FROM framework_languages",$cnx->num);
  $availableLanguages=$request->recup_array_mono();
  $changeLanguage=strtolower(substr($_GET['change_language'],0,2));
  $_SESSION['language']=in_array($changeLanguage,$availableLanguages) ? $changeLanguage : 'fr' ;
  $request->envoi("UPDATE framework_users SET user_language='".$_SESSION['language']."' WHERE user_login='".$_SESSION['login']."'");
  $mcnx->num->framework_users->update(array('user_login'=>$_SESSION['login']),array('$set'=>array('user_language'=>$_SESSION['language'])),array('multiple' => true));
}  

// Get language change from user form
if (isset($_POST['form_item_language']))
{
  $request=new requete("SELECT language_tag FROM framework_languages",$cnx->num);
  $availableLanguages=$request->recup_array_mono();
  $changeLanguage=strtolower(substr($_POST['form_item_language'],0,2));
  $_SESSION['language']=in_array($changeLanguage,$availableLanguages) ? $changeLanguage : 'fr' ;
}

require_once $pathClasses.'class_connexion_mysql_ext.php';
require_once $pathClasses.'class_filtres.php';
require_once $pathClasses.'class_workflow.php';
require_once $pathClasses.'class_railway.php';
require_once $pathClasses.'class_ldap.php';
require_once $pathFunctions.'fct_date_hour.php';
require_once $pathClasses.'class_sort_column.php';
require_once $pathClasses.'class_page_numbering.php';
require_once $pathBase.'messages/'.$_SESSION['language'].'_ihm_messages.php';
require_once $pathBase.'messages/'.$_SESSION['language'].'_app_messages.php';
require_once $pathBase.'common_scripts/functions.php';
require_once $pathBase.'common_scripts/app_functions.php';
require_once $pathAppClasses.'appUser.php';
require_once $pathAppClasses.'project.php';

if (!isset($_SESSION['login'])) {
    header('location: '.  getServerURL().'/index.php');    	
}

// get months names
$_SESSION['annee']=$list_months;
// set delay for hidding messages
$delayMsg=1200;

// nom du script en cours	
$pos=strrpos($_SERVER['PHP_SELF'], '/');
$pos2=strrpos($_SERVER['PHP_SELF'], '?');
if ($pos2) {
    $script=substr($_SERVER['PHP_SELF'], $pos+1, $pos2-$pos+1);
} else {
    $script=substr($_SERVER['PHP_SELF'], $pos+1);
}      

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action']='';
}  
	
// Get menu level 1 from database	
$menus_lev1=array();
$menus_lev2=array();
$sqlMenus="SELECT menu_tag AS tag,menu_translation_value AS titre,menu_file AS file FROM framework_menus,framework_menus_translations,framework_profiles_constitution_menus WHERE menu_father='' AND menu_translation_language='".$_SESSION['language']."' AND menu_tag=framework_menus_translations.menu_tag_fk AND menu_tag=framework_profiles_constitution_menus.menu_tag_fk AND profile_id_fk=".$_SESSION['user_profile']." ORDER BY menu_order";
$request=new requete($sqlMenus,$cnx->num);
$menus_lev1=$request->getArrayFields();

if ($_SESSION['menu_lev1']!='none')
{
  // Get menu level 2 from database
  $request->envoi("SELECT menu_tag AS tag,menu_translation_value AS titre,menu_file AS file FROM framework_menus,framework_menus_translations,framework_profiles_constitution_menus WHERE menu_father='".$_SESSION['menu_lev1']."' AND menu_translation_language='".$_SESSION['language']."' AND menu_tag=framework_menus_translations.menu_tag_fk AND menu_tag=framework_profiles_constitution_menus.menu_tag_fk AND profile_id_fk=".$_SESSION['user_profile']." ORDER BY menu_order");  
  $menus_lev2=$request->getArrayFields();

  if ($_SESSION['menu_lev2']==-1)
  {
    // Get a the default menu (if exists) for the level2
    $request->envoi("SELECT menu_tag FROM framework_menus,framework_profiles_constitution_menus WHERE menu_father='".$_SESSION['menu_lev1']."' AND menu_tag=menu_tag_fk AND profile_id_fk=".$_SESSION['user_profile']."  AND menu_default=1 ORDER BY menu_order");
    $request->calc_nb_elt();
    if ($request->nb_elt!=0)
    {
      $request->getObject();
	  $_SESSION['menu_lev2']=$request->objet->menu_tag;
    }
  }
} 

$imgRailway='railway.png';
$allowedScripts=array();
// Check if the user can access the page
$request->envoi("SELECT SUBSTRING(TRIM(TRAILING '?' FROM menu_file),LOCATE('/',menu_file)+1) 
                 FROM framework_menus,framework_profiles_constitution_menus 
                 WHERE menu_tag_fk=menu_tag AND profile_id_fk=".$_SESSION['user_profile']);
$allowedScripts=$request->recup_array_mono();

if (!in_array($script,$allowedScripts)) 
{
  $menu_lev1=array();
  if (isset($_SESSION['user_profile']))
  {    
    $sqlMenus="SELECT menu_tag AS tag,menu_translation_value AS titre,menu_file AS file 
              FROM framework_menus,framework_menus_translations,framework_profiles_constitution_menus 
              WHERE menu_father='' AND menu_translation_language='".$_SESSION['language']."' 
                AND menu_tag=framework_menus_translations.menu_tag_fk 
                AND menu_tag=framework_profiles_constitution_menus.menu_tag_fk 
                AND profile_id_fk=".$_SESSION['user_profile']." ORDER BY menu_order";
    $request=new requete($sqlMenus,$cnx->num);
    $menu_lev1=$request->getArrayFields();		
    $_SESSION['menu_lev1']=$menu_lev1[0]['tag'];	
    header('location:'.getServerURL().'/'.$menu_lev1[0]['file']);
  }
  else
  {
    header('location:'.getServerURL().'/index.php');  
  } 
}

// if project is a one level project, redirect to the Kanban
if (isset($_REQUEST['project_id']))
{
  if (intval($_REQUEST['project_id'])!=0)
  {
    $_SESSION['current_project_id']=intval($_REQUEST['project_id']);
    // reset some session vars
    // tags
    unset($_SESSION['tag_filter_plus']);
    unset($_SESSION['tag_filter_moins']);
    // features
    unset($_SESSION['feature_filter']);
    // stakeholders
    unset($_SESSION['stakeholder_filter']);
    // US color
    unset($_SESSION['filter_us']);
    // Task color
    unset($_SESSION['filter_task']);
    // order
    unset($_SESSION['display_priority']);
  }	
}  

include_once $pathBase.'project_switch_cases_adding.php';

if (isset($_SESSION['current_project_id']))
{
  $currentProject=new project($pathBase,$_SESSION['current_project_id']);
  $currentProject->getData();
  
  if ($currentProject->level==1 && $script=='project_cockpit.php')
  {
    header('location: ./manage_kanban.php?&menu_lev2=prj_kanban');	  
  }	
} 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title><?php TextDisplay($appName);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>css/global.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>css/bulle.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>css/formulaire.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>css/filtre.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>css/app.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>css/poof.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>css/switch.css" />

<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>themes/<?php echo $_SESSION['user_theme'];?>/theme.css" />

<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>css/colorpicker.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>css/smoothness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>css/smoothness/jquery-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $pathBase;?>css/smoothness/jquery.ui.theme.css" />
 
<script type="text/javascript" src="<?php echo $pathBase;?>js/global.js.php"></script>
<script type="text/javascript" src="<?php echo $pathBase;?>js/app.js.php"></script>
<script type="text/javascript" src="<?php echo $pathBase;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $pathBase;?>js/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $pathBase;?>js/jquery/jquery.qtip.min.js"></script>
<script type="text/javascript" src="<?php echo $pathBase;?>js/jquery/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="<?php echo $pathBase;?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo $pathBase;?>js/colorpicker.js"></script>

<script type="text/javascript" src="<?php echo $pathBase;?>js/script.js.php"></script>
<script type="text/javascript" src="<?php echo $pathBase;?>js/poof.js.php"></script>

<style type="text/css"><?php
  $colorListText='';
  $request->envoi('SELECT * FROM kados_colors');
  $colorList=$request->getArrayFields();
  for ($i=0;$i<count($colorList);$i++)
  {?>
  .<?php echo $colorList[$i]['color_name'];?>{
	background-color:#<?php echo $colorList[$i]['color_value'];?>;
	border:solid #<?php echo $colorList[$i]['color_border_value'];?>;	
    border-width:3px 1px 1px 1px;	
    /* Background */
    background: #<?php echo $colorList[$i]['color_value'];?>; /* Old browsers */
    background: -moz-linear-gradient(top, #<?php echo $colorList[$i]['color_value'];?> 30%, #FFFFFF 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(30%,#<?php echo $colorList[$i]['color_value'];?>), color-stop(100%,#FFFFFF)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top, #<?php echo $colorList[$i]['color_value'];?> 30%,#FFFFFF 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top, #<?php echo $colorList[$i]['color_value'];?> 30%,#FFFFFF 100%); /* Opera11.10+ */
    background: -ms-linear-gradient(top, #<?php echo $colorList[$i]['color_value'];?> 30%,#FFFFFF 100%); /* IE10+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $colorList[$i]['color_value'];?>', endColorstr='#FFFFFF',GradientType=0 ); /* IE6-9 */
    background: linear-gradient(top, #<?php echo $colorList[$i]['color_value'];?> 30%,#FFFFFF 100%); /* W3C; A catch-all for everything else */         
  }   <?php
  $colorListText.=$colorList[$i]['color_name'].' ';  
  }?>
</style>

</head>

<body>

<div class="global">
<div class="colorList"><?php echo $colorListText;?></div>

<div id="menu">
<!-- DEBUT TITRE!-->
<div class="logo"><img src="<?php echo $pathBase;?>themes/<?php echo $_SESSION['user_theme'];?>/images/logo.png" border="0" /></div>
<div class="display_header">
<!--  <div class="languages"><?php
   $request=new requete("SELECT language_tag FROM framework_languages",$cnx->num); 
   $resultsArray=$request->getArrayFields();
              
   for ($i=0;$i<count($resultsArray);$i++)
   {?>
     <a href="<?php echo setUrlForParam($_SERVER['PHP_SELF']);?>change_language=<?php echo $resultsArray[$i]['language_tag'];?>" class="std_link link_quit"><img src="<?php echo $pathImages;?>flags/<?php echo $resultsArray[$i]['language_tag'];?>-small.png" border="0"/></a> <?php
   }?>	 
  </div>    -->
  <div class="username"><?php echo $_SESSION['user_fullname'];?>
   <a href="<?php echo $pathBase;?>index.php?connexion=off" class="std_link link_quit">| <?php echo $text_logout;?></a>
  </div>
  <div class="title"><?php TextDisplay($appName);?></div>  
  <div class="subtitle"><?php if (isset($appSubTitle)) { echo $appSubTitle;}?></div>
  </div>
  <div class="sol"></div>
<div class="clearleft"></div>
<!-- FIN TITRE!-->

<div class="menu_lev1">
<div <?php 
 if ($menus_lev1[0]['tag']==$_SESSION['menu_lev1'])  {
   echo 'class="elt_menu_img_select"';  } 
 else  { echo 'class="elt_menu_img"'; } ?>><a href="<?php echo $pathBase.$menus_lev1[0]['file'];?>&menu_lev1=<?php echo $menus_lev1[0]['tag']; ?>" ><img src="<?php echo $pathImages;?>app/home.png" border="0" title="<?php echo $menus_lev1[0]['titre']?>" /></a>
</div><?php

for ($i=1;$i<count($menus_lev1);$i++) {?>
    <div <?php
    if($menus_lev1[$i]['titre']!=="Languages"){
    
    if ($menus_lev1[$i]['tag']==$_SESSION['menu_lev1']) {
        echo 'class="elt_menu_select"'; 
    } else {
        echo 'class="elt_menu"';
    } ?>><a href="<?php echo $pathBase.$menus_lev1[$i]['file'];?>&menu_lev1=<?php echo $menus_lev1[$i]['tag']; ?>" ><?php echo $menus_lev1[$i]['titre']?></a></div><?php
}
}
?></div><!-- FIN du menu niveau1!-->
<div class="clearleft"></div>

<?php
if (count($menus_lev2)!=0) {?>
    <div class="menu_lev2"><?php
    for ($i=0;$i<count($menus_lev2);$i++) {?>
        <div <?php 
        if ($menus_lev2[$i]['tag']==$_SESSION['menu_lev2']) {
            echo 'class="elt_menu_select"'; 
        } else { 
            echo 'class="elt_menu"'; 
        } ?>><a href="<?php echo $pathBase.$menus_lev2[$i]['file'];?>&menu_lev2=<?php echo $menus_lev2[$i]['tag']; ?>" ><?php echo $menus_lev2[$i]['titre'];?></a></div><?php
    }?>
    </div><!-- FIN du menu niveau2!-->
    <div class="clearleft"></div><?php
}?>
</div>

<div class="display_body"><?php

// Set for the app
require_once $pathBase.'railway_set_level.php';
$businessValueDefault='0';
if (isset($_REQUEST['mode_pbl']))
{
  $_SESSION['mode_pbl']=$_REQUEST['mode_pbl'];
}
if (!isset($_SESSION['mode_pbl']))
{
  $_SESSION['mode_pbl']='std';
}
 