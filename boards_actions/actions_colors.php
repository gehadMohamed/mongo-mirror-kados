<?php
/**
 * Actions for issue management  in a dashboard
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
    case 'add_color':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);
      $zindex = (int)$_POST['zindex'];
	  
      /* Inserting a new record in the $tableData DB: */
      $request->envoi("INSERT INTO ".$tableData." (use_color_meaning,color,active,use_color_postit_type,
                                                   ".$xPosField.",".$yPosField.",".$zPosField.",use_color_default,use_color_lock)
  		       VALUES ('".$body."','".$color."',1,'NONE',
                               ".$xInitDefaultPosition.",".$yInitDefaultPosition.",".$zindex.",
                               ".(isset($_POST['setdefault']) ? 1 : 0).",".(isset($_POST['setlock']) ? 1 : 0).")");
      $mcnx->num->$tableData->insert(array("use_color_meaning"=>$body,"color"=>$color,'active'=>"1",'use_color_postit_type'=>"NONE","$xPosField"=>$xInitDefaultPosition,"$yPosField"=>$yInitDefaultPosition,"$zPosField"=>$zindex,"use_color_default"=>(isset($_POST['setdefault'])?1:0),"use_color_lock"=>(isset($_POST['setlock'])?1:0)));
	  
    break;
    
    case 'del_item':
      $request->envoi("DELETE FROM ".$tableData." WHERE ".$itemIdName."=".$_REQUEST['item_id']);
        $mcnx->num->$tableData->remove(array($itemIdName=>$_REQUEST['item_id']));
    break;    

    case 'update_color':
      if(ini_get('magic_quotes_gpc'))
      {
	     // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	     $_POST['note-body']=stripslashes($_POST['note-body']);
      }

      // Escaping the input data:
      $body = formatStringForDB($_POST['note-body']);
      $color = mysqli_escape_string($cnx->num,$_POST['color']);
  
      $request= new requete("UPDATE ".$tableData." 
                             SET use_color_meaning='".$body."',color='".$color."',
                                 use_color_default=".(isset($_POST['setdefault']) ? 1 : 0).",use_color_lock=".((isset($_POST['setlock']) ? 1 : 0))."   
			     WHERE ".$itemIdName."=".$_REQUEST['item_id'],$cnx->num);
      $mcnx->num->$tableData->update(array($itemIdName=>$_REQUEST['item_id']),array('$set'=>array('use_color_meaning'=>$body,'color'=>$color,'use_color_default'=>(isset($_POST['setdefault'])?1:0),'use_color_lock'=>((isset($_POST['setlock'])?1:0)))),array('multiple' => true));
     break;   
  } 
}	