<?php
/**
 * Update session variable with a Javascript Input  
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
  $variable=substr($_REQUEST['recherche'],0,7);
  if ($variable=='display' || $variable=='toggle_' )  
  {
    $_SESSION[$_REQUEST['recherche']]=$_REQUEST['value'];
  }
}?>