<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of appUser
 *
 * @author Charles
 */
class appUser {
  var $login;
  var $firstname;
  var $lastname;
  
  function appUser($login='')
  {  
    global $pathBase;
    if ($login!='')  
    {
      $cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
      $request=new requete("SELECT * FROM framework_users WHERE user_login='".$login."'",$cnx->num);
      $request->getObject();
      $this->login=$login;
      $this->firstname=$request->objet->user_firstname;
      $this->lastname=$request->objet->user_name;
    }
  }
  
  function getFullName()
  {
    return $this->firstname.' '.$this->lastname;
  }
  
}?>