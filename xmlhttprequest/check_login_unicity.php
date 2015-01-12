<?php
/**
 * check_login_unicity.php
 * Check if login exists or not  
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:administration
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */
session_start();
$pathBase='../';
include $pathBase.'libraries/classes/class_connexion_mysql.php';
include $pathBase.'common_scripts/functions.php';

$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

if (isset($_SESSION['login']))
{    
  $testLogin=substr($_POST['recherche'],0,15);
  if (stripSpaces($testLogin)==$testLogin)
  {

    $request=new requete("SELECT user_login FROM framework_users WHERE user_login='".$testLogin."'",$cnx->num);
    $request->calc_nb_elt();
    if ($request->nb_elt!=0)
    {
      echo 'EXISTS';
    }    
    else
    {
      echo 'OK';  
    }
  }  
  else
  {
    echo 'WRONG';  
  }
}
else
{
  echo 'KO';
}?>