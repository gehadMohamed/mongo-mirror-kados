<?php 
/**
 * Deck Management
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DeckManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  


/****************************** DECK basic actions ***********************************/
if (!isset($_SESSION['us_deck_content']))
{
  $_SESSION['us_deck_content'][0]=0;
  // Get the deck storage of the user
  $request->envoi("SELECT item_id_fk FROM kados_users_decks WHERE user_login_fk='".$_SESSION['login']."' AND item_type='us'");
  $_SESSION['us_deck_content']=array_merge($_SESSION['us_deck_content'],$request->recup_array_mono());
}
// Add to DECK
if (isset($_REQUEST['add_to_deck']))
{
  if (!array_search((int)$_REQUEST['add_to_deck'],$_SESSION['us_deck_content']))
  {
    array_push($_SESSION['us_deck_content'],(int)$_REQUEST['add_to_deck']);
    // Add US to the deck storage of the user
    $request->envoi("INSERT INTO kados_users_decks 
                     (user_login_fk,item_id_fk,item_type)
                     VALUES ('".$_SESSION['login']."',".($_REQUEST['add_to_deck']).",'us')");
    $mcnx->num->kados_users_decks->insert(array("user_login_fk"=>$_SESSION['login'],"item_id_fk"=>$_REQUEST['add_to_deck'],'item_type'=>"us"));
  }	
}
// Remove from DECK
if (isset($_REQUEST['remove_from_deck']))
{
  $pos=array_search((int)$_REQUEST['remove_from_deck'],$_SESSION['us_deck_content']);
  if ($pos>0)
  {
    unset($_SESSION['us_deck_content'][$pos]);
   // Delete US in the deck storage of the user 
   $request->envoi("DELETE FROM kados_users_decks 
                    WHERE user_login_fk='".$_SESSION['login']."' 
                      AND item_type='us' 
                      AND item_id_fk=".$_REQUEST['remove_from_deck']);
   $mcnx->num->kados_users_decks->remove(array('user_login_fk'=>$_SESSION['login'],'item_type'=>'us','item_id_fk'=>$_REQUEST['remove_from_deck']));
  }	
}

/****************** Action for keeping US wuth my tasks **********************************/
// Filter on the US with my tasks = put all US without a task for me in the DECK/
// Set scope
$scope=' us_project_id_fk='.$_SESSION['current_project_id'];
if (isset($_SESSION['current_sprint_id']))
{
  $scope=' us_sprint_id_fk='.$_SESSION['current_sprint_id'];
}
else if (isset($_SESSION['current_release_id']))
{
  $scope=' us_release_id_fk='.$_SESSION['current_release_id'];
}


if ($_REQUEST['action']=='filter_my_tasks')
{
  // 1/Empty the DECK
  unset($_SESSION['us_deck_content']);
  $_SESSION['us_deck_content'][0]=0;
  $request->envoi("DELETE FROM kados_users_decks WHERE user_login_fk='".$_SESSION['login']."' AND item_type='us'");

  // 2/put US without me in DECK
  // FInd US without me
  // put on deck
  $request->envoi("SELECT us_id FROM kados_user_stories WHERE ".$scope." AND us_id NOT IN (
                   SELECT us_id_fk FROM kados_user_stories,kados_tasks 
                   WHERE ".$scope." AND us_id_fk=us_id AND kados_user_stories.active=1 
				       AND task_leader='".$_SESSION['login']."' AND kados_tasks.active=1)");
  $request->recup_array_mono();
  for($i=0;$i<$request->nb_elt;$i++)
  {
    array_push($_SESSION['us_deck_content'],(int)$request->array[$i]);
    // Add US to the deck storage of the user
    $request->envoi("INSERT INTO kados_users_decks 
	               (user_login_fk,item_id_fk,item_type)
			       VALUES ('".$_SESSION['login']."',".($request->array[$i]).",'us')");
    $mcnx->num->kados_users_decks->insert(array("user_login_fk"=>$_SESSION['login'],"item_id_fk"=>$request->array[$i],'item_type'=>"us"));
  }
}  


// 
$clauseWhereUsFilter='';
$clauseWhereUsFilterA='';
if (isset($_SESSION['filter_us']))
{
  $clauseWhereUsFilterA=" AND kados_user_stories.color='".$_SESSION['filter_us']."'";
}

  // Get colors of the displayed US
  $exclusiveUsColorsListRequest="SELECT color
                                 FROM kados_user_stories 
                                 WHERE active=1 AND ".$scope." 
				   AND us_id NOT IN (".implode(',',$_SESSION['us_deck_content']).") 
				 GROUP BY color ";
						
 // Protection against : if US color selected is not in the board (when drilling-down or up)
 if (isset($_SESSION['filter_us']))
 {
   $request->envoi($exclusiveUsColorsListRequest);						
   $request->recup_array_mono();
   if (!in_array($_SESSION['filter_us'],$request->array))
   {
     unset($_SESSION['filter_us']);
     $clauseWhereUsFilterA='';
   }	 
 }

$clauseWhereUsFilterB=''; 
if (isset($_SESSION['feature_filter']))
{
  $clauseWhereUsFilterB=" AND us_feature_id_fk=".$_SESSION['feature_filter'];
} 

  // Get features of the displayed
  $exclusiveUsFeaturesListRequest="SELECT us_feature_id_fk
                                   FROM kados_user_stories 
                                   WHERE active=1 AND ".$scope." 
				   AND us_id NOT IN (".implode(',',$_SESSION['us_deck_content']).") 
				   GROUP BY us_feature_id_fk ";

 // Protection against : if feature selected is not in the board (when drilling-down or up)
 if (isset($_SESSION['feature_filter']))
 {
   $request->envoi($exclusiveUsFeaturesListRequest);						
   $request->recup_array_mono();
   if (!in_array($_SESSION['feature_filter'],$request->array))
   {
     unset($_SESSION['feature_filter']);
     $clauseWhereUsFilterB='';
   }	 
 }  
  
$clauseWhereUsFilter=$clauseWhereUsFilterA.$clauseWhereUsFilterB; 
 
 // Set filter on colors for tasks items : colors of displayed tasks postits
 $exclusiveTaskColorsListRequest="SELECT kados_tasks.color 
                                  FROM kados_tasks,kados_user_stories 
			   	  WHERE kados_tasks.active=1 AND us_id_fk=us_id						  
				    AND ".$scope." 
				    AND us_id NOT IN (".implode(',',$_SESSION['us_deck_content']).")  
			    	  GROUP BY kados_tasks.color ";

// Get US of the sprint in deck
$request=new requete("SELECT us_id AS parent_id,us_number AS display_number,text,status AS header_stamp,color,business_value AS infoBottomLeft,
                             complexity AS infoBottomRight 
                      FROM kados_user_stories 
					  WHERE active=1 AND ".$scope." 
					   AND us_id IN (".implode(',',$_SESSION['us_deck_content']).") ".$clauseWhereUsFilter." 
					  ORDER BY ".$usFieldForOrderMatrix." ASC",$cnx->num);
$deckItemsArray=$request->getArrayFields();

// Get US of the sprint
$request=new requete("SELECT us_id AS parent_id,us_number AS display_number,text,status AS header_stamp,color,business_value AS infoBottomLeft,complexity AS infoBottomRight 
                      FROM kados_user_stories 
		      WHERE active=1 AND ".$scope."  
		        AND us_id NOT IN (".implode(',',$_SESSION['us_deck_content']).") ".$clauseWhereUsFilter." 
		      ORDER BY ".$usFieldForOrderMatrix." ASC",$cnx->num);
$MultipleItemsArray=$request->getArrayFields();

// If deck is not empty and board is empty, get an item out of the deck
if (count($deckItemsArray)!=0 && count($MultipleItemsArray)==0)
{
  // si aucune US dans le board, mais il y en a dans le deck, on en sort un du deck
  $deckOut=array_pop($_SESSION['us_deck_content']);
  // Delete the US from the deck storage for the user
  $request->envoi("DELETE FROM kados_users_decks 
	               WHERE user_login_fk='".$_SESSION['login']."' AND item_id_fk=".$deckOut);  
  $request=new requete("SELECT us_id AS parent_id,us_number AS display_number,text,status AS header_stamp,color,business_value AS infoBottomLeft,complexity AS infoBottomRight 
                        FROM kados_user_stories WHERE active=1 AND ".$scope." 
						AND us_id IN (".implode(',',$_SESSION['us_deck_content']).") 
						".$clauseWhereUsFilter." ORDER BY ".$usFieldForOrderMatrix." ASC",$cnx->num);
  $deckItemsArray=$request->getArrayFields();
  
  $request=new requete("SELECT us_id AS parent_id,us_number AS display_number,text,status AS header_stamp,color,business_value AS infoBottomLeft,complexity AS infoBottomRight 
                        FROM kados_user_stories WHERE active=1 AND ".$scope." 
			 AND us_id NOT IN (".implode(',',$_SESSION['us_deck_content']).") ".$clauseWhereUsFilter." 
                        ORDER BY ".$usFieldForOrderMatrix." ASC",$cnx->num);
  $MultipleItemsArray=$request->getArrayFields();
}

require_once $pathBase.'deck_display.php';

?>