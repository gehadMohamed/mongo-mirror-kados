<?php
/**
 * Get user local available actions
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  UserManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */   

  if (isset($_SESSION['user_local_actions']))
  {
	unset($_SESSION['user_local_actions']);
  }
  $_SESSION['user_local_actions']=array();
  $_SESSION['user_local_profile']=getLocalProfileOnProjectForUser($_SESSION['login'],$_SESSION['current_project_id']);
  $request->envoi('SELECT action_tag_fk FROM framework_profiles_constitution_actions WHERE profile_id_fk='.$_SESSION['user_local_profile']);
  $_SESSION['user_local_actions']=$request->recup_array_mono();?>