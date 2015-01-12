<?php
/**
 * Check if tag exists or not  
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
  $cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
  $request=new requete("SELECT column_tag FROM kados_template_columns WHERE LOWER(column_tag)='".strtolower($_REQUEST['recherche'])."'",$cnx->num);
  $request->calc_nb_elt();
  echo $request->nb_elt;
}  
?>  