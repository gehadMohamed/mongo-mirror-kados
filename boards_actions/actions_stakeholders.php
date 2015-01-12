<?php
/**
 * Actions for stekeholders management in a dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

if (isset($_REQUEST['action']))
{
  switch ($_REQUEST['action'])
  {
    case 'submit_add_stakeholder':
      if (isset($_POST['form_item_resource_search']))
      {
        // Get stakeholder username
        $username=$_POST['form_item_resource_search'];
        // Insert stakeholder
      }	
      else
      {
        $username=$_POST['form_item_resource_lb'];
      }
      // Check if user exists in the app
      $request=new requete("SELECT user_login FROM framework_users WHERE user_login='".$username."'",$cnx->num);
      $request->calc_nb_elt();
      if ($request->nb_elt!=0)
      {
        $request->envoi("INSERT INTO kados_projects_users (user_login_fk,project_id_fk,profile_id_fk,xpos,ypos,zpos,color,release_id_fk) 
                         VALUES ('".$username."',".$_SESSION['current_project_id'].",".getProfileIdFromTag('READ').",10,40,1,'brown',".$_POST['form_item_release'].")");
        $mcnx->num->kados_projects_users->insert(array("user_login_fk"=>$username,"project_id_fk"=>$_SESSION['current_project_id'],"profile_id_fk"=>getProfileIdFromTag('READ'),'xpos'=>"10",'ypos'=>"40",'zpos'=>"1",'color'=>"brown","release_id_fk"=>$_POST['form_item_release']));
        // add bookmark project for the new stakeholder
        $request=new requete("SELECT MAX(bookmark_order) AS max FROM kados_users_bookmarks WHERE user_login_fk='".$username."'",$cnx->num);
        $request->getObject();
        $order=$request->objet->max+1;	
        $request->envoi("INSERT IGNORE INTO kados_users_bookmarks (user_login_fk,project_id_fk,bookmark_order,bookmark_color) 
                         VALUES ('".$username."',".$_SESSION['current_project_id'].",".$order.",'')");							
        $mcnx->num->kados_users_bookmarks->insert(array("user_login_fk"=>$username,"project_id_fk"=>$_SESSION['current_project_id'],"bookmark_order"=>$order,'bookmark_color'=>""));
        
      }
      else
      {?>
        <div class="MessageBox WarningMessageBox"><?php echo $msg_unknown_user;?></div><?php
      }  
    break;
	
	case 'del_item':
	  // delete stakeholder
  	  $request=new requete("DELETE FROM kados_projects_users WHERE stakeholder_id=".$_REQUEST['item_id'],$cnx->num);
            $mcnx->num->kados_projects_users->remove(array('stakeholder_id'=>$_REQUEST['item_id']));
	break;
  }
}?>