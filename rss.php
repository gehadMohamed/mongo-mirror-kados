<?php
/**
 * RSS generator
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  RSS
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     

$pathBase='./';

$pathLibraries=$pathBase.'libraries/';
$pathClasses=$pathBase.'libraries/classes/';
$pathFunctions=$pathBase.'libraries/functions/';
$pathAppClasses=$pathBase.'classes/';

require_once $pathBase.'session_settings.php';
require_once $pathBase.'common_scripts/getDefaultLanguage.php';
require_once $pathClasses.'class_connexion_mysql.php';
require_once $pathClasses.'class_connexion_mongodb.php';
require_once $pathAppClasses.'project.php';

// create a database connexion
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);   

// Set default language using the browser language 
if (isset($_GET['language']))
{
  $defaultLanguage=strtolower(substr($_GET['language'],0,2));
}
else
{   
  $defaultLanguage=substr(getDefaultLanguage(),0,2);        
}
$request=new requete("SELECT language_tag FROM framework_languages",$cnx->num);
$availableLanguages=$request->recup_array_mono();
$displayLanguage= in_array($defaultLanguage,$availableLanguages) ? $defaultLanguage : 'en' ;
$_SESSION['language']=$displayLanguage;

require_once $pathFunctions.'fct_date_hour.php';
require_once $pathBase.'messages/'.$displayLanguage.'_ihm_messages.php';
require_once $pathBase.'messages/'.$displayLanguage.'_app_messages.php';
require_once $pathBase.'common_scripts/functions.php';
require_once $pathBase.'common_scripts/app_functions.php';
 

$ChannelTitle='';
$ChannelDesc='';
$itemsList=array();

$allowRss=getParameter('RSSACT',$cnx->num);
// display RSS if allowed
if ($allowRss)
{

if (isset($_GET['sprint_id']))
{
  $request=new requete('SELECT project_name,release_name,release_due_date,release_project_id_fk, 
                               sprint_name,sprint_start_date,sprint_end_date
                        FROM kados_projects,kados_releases,kados_sprints 
                        WHERE project_id=release_project_id_fk 
			  AND release_id=sprint_release_id_fk 
			  AND sprint_id='.intval($_GET['sprint_id']),$cnx->num);
  $request->countRows();
  if ($request->nb_elt!=0)
  {    
    $sprintData=$request->getObject();
    $ChannelTitle=$text_sprint_content.' '.$sprintData->sprint_name;
    $ChannelDesc=$text_sprint_content.' '.$sprintData->sprint_name.' '.$text_of.' '.$text_the_f.' '.$text_release.' '.$sprintData->release_name.' '.$text_of_the.' '.$text_project.' '.$sprintData->project_name;
    $projectId=$sprintData->release_project_id_fk;   
  
    $request->envoi("SELECT us_id,us_number AS title,text AS description,status  
                     FROM kados_user_stories 
                     WHERE active=1 AND us_sprint_id_fk=".intval($_GET['sprint_id'])." ORDER BY status");
    $itemsList=$request->getArrayFields();						
  }  
} 
elseif (isset($_GET['release_id']))
{
  $request=new requete('SELECT project_name,release_name,release_due_date,release_project_id_fk 
                        FROM kados_projects,kados_releases 
                        WHERE project_id=release_project_id_fk 
			  AND release_id='.intval($_GET['release_id']),$cnx->num);
  $request->countRows();
  if ($request->nb_elt!=0)
  {      
    $releaseData=$request->getObject();
    $ChannelTitle=$text_release_content.' '.$releaseData->release_name;
    $ChannelDesc=$text_release_content.' '.$releaseData->release_name.' '.$text_of_the.' '.$text_project.' '.$releaseData->project_name;
    $projectId=$releaseData->release_project_id_fk;  
  
    $request->envoi("SELECT us_id,us_number AS title,text AS description,status  
                     FROM kados_user_stories 
                     WHERE active=1 AND us_release_id_fk=".intval($_GET['release_id'])." ORDER BY status");
    $itemsList=$request->getArrayFields();	
  }  
}
elseif (isset($_GET['project_id']))
{
  $projectData=new project($pathBase,intval($_GET['project_id']));
  $projectData->getData();    
  $ChannelTitle=$text_project.' '.$projectData->name;
  $ChannelDesc=$text_project.' '.$projectData->name;
  
  $request->envoi("SELECT us_id,us_number AS title,text AS description,status  
                   FROM kados_user_stories 
                   WHERE active=1 AND us_project_id_fk=".intval($_GET['project_id'])." ORDER BY status");
  $itemsList=$request->getArrayFields();		
  $projectId=intval($_GET['project_id']);
}

$request=new requete("SELECT column_tag_fk 
                      FROM kados_projects_columns 
                      WHERE project_id_fk=".$projectId." ORDER BY column_order DESC LIMIT 0,1",$cnx->num);
$request->recup_array_mono();
$finalStatus=0;
if ($request->nb_elt)
{
  $finalStatus=$request->array[0];
}
  
header('Content-type: text/xml');

echo '<rss version="2.0">
	  <channel>
		<title>'.$ChannelTitle.'</title> 
		<description>'.$ChannelDesc.'</description>';
		
for ($i=0;$i<count($itemsList);$i++)
{
  echo '<item>
	      <category></category>
	      <title>US'.$itemsList[$i]['title'].' - '.getUsDetailedStatus($itemsList[$i]['us_id'],$itemsList[$i]['status'],$finalStatus).'</title> 
	      <description>'.$itemsList[$i]['description'].'</description> 
	      <pubDate></pubDate>
        </item>';
}		

echo '</channel>
      </rss>';
}	  
else
{
  echo $msg_rss_is_not_available;
}
?>