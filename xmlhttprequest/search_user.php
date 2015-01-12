<?php
/**
 * get users
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:administration
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */
session_start();
if (isset($_SESSION['login']))
{    
  $pathBase='../';
  include $pathBase.'libraries/classes/class_connexion_mysql.php';

  $cnx=new connexion_db($pathBase);

  if(isset($_GET['term'])) 
  {
    $q = substr($_GET['term'],0,15); // protection
     
    // connexion à la base de données
    $request = new requete("SELECT CONCAT('{ \"label\": \"',user_firstname,' ',user_name,'\"',',\"value\": \"',user_firstname,' ',user_name,'\"',', \"id\" :\"',user_login,'\"}') AS result 
                            FROM framework_users 
	                    WHERE CONCAT(LOWER(user_firstname),' ',LOWER(user_name),' (',user_login,')') LIKE '%". strtolower($q) ."%'
			      AND user_login NOT IN (SELECT user_login_fk 
                                                     FROM kados_projects_users 
                                                     WHERE project_id_fk=".$_SESSION['current_project_id']." ) 
			    LIMIT 0, 10",$cnx->num);
    // exécution de la requête
    $request->recup_array_mono();
    // affichage des résultats
    echo '['.implode(',',$request->array).']';
  }
}
?>