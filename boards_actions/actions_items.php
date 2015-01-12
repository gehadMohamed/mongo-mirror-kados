<?php
/**
 * Actions for items management  in a dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
 
if (!isset($otherFieldsInsert))
{
  $otherFieldsInsert='';
  $otherFieldsInsertValues='';
}

if (!isset($otherFieldsInsertUS))
{
  $otherFieldsInsertUS='';
  $otherFieldsInsertValuesUS='';
}


// Set to nothing the field for ordering by priority. Only used for US
$fieldForPriorityOrder= isset($fieldForPriorityOrder) ? $fieldForPriorityOrder : '';
 
if (isset($_REQUEST['action']))
{
  switch ($_REQUEST['action'])
  {
    case 'del_item':
          $request->envoi("UPDATE ".$tableData." SET active=-1 WHERE ".$itemIdName."=".$_REQUEST['item_id']);
        $mcnx->num->$tableData->update(array($itemIdName=>$_REQUEST['item_id']),array('$set'=>array('active'=>'-1')),array('multiple' => true));
	  if (isset($_SESSION['current_sprint_id']))
	  {
	    $currentSprintId=$_SESSION['current_sprint_id'];
	    require_once $pathBase.'progress_recording.php';	  
	  }	
	break;
	
        case 'order_all_by_number':
          $fieldForOrder=$fieldForSorting;  
	case 'order_all_compact':
	  $_SESSION['dashboard_display_mode']='compact';
	  // compute available space for shifting item on the left before stepping over the column limit
	  $availableSpaceForItemXShift=$columnWidth-$itemWidth-5;
      $status='no_value';
	  $yposRef=isset($_REQUEST['ypos_ref']) ? $_REQUEST['ypos_ref'] : 45;
	  $altRef=-$xInitDefaultPosition+5;
      //	 get all items
	  $request= new requete("SELECT ".$itemIdName.",".$statusField.",".$zPosField." AS zindex 
	                       FROM ".$tableData." WHERE active=1 ".$clauseWhereElements."
						   ORDER BY ".$statusField.",".$fieldForOrder." ASC",$cnx->num);
      $resultArray=$request->getArrayFields();
      $zposNew=1;
	  
	  if ($availableSpaceForItemXShift>20)
	  {
	    for ($i=0;$i<count($resultArray);$i++)
        {
	      if ($status!=$resultArray[$i][$statusField])
		  {
  		    $ypos=$yposRef;
		    $status=$resultArray[$i][$statusField];
		    $alt=$altRef;
		  }
          $request->envoi("UPDATE ".$tableData." SET ".$xPosField."=".($xInitDefaultPosition+$alt).",".$yPosField."=".$ypos.",".$zPosField."=".$zposNew++." WHERE ".$itemIdName."=".$resultArray[$i][$itemIdName]);
          $mcnx->num->$tableData->update(array($itemIdName=>$resultArray[$i][$itemIdName]),array('$set'=>array($xPosField=>($xInitDefaultPosition+$alt),$yPosField=>$ypos,$zPosField=>$zposNew++)),array('multiple' => true));
  		  $ypos+=$itemYShift;
		  $alt+=7;
		  if ($alt-$altRef>$availableSpaceForItemXShift)
		  {
		    $alt=0;
		    $ypos+=$itemHeight-35;
  		  }
		}  
	  }
	  else
	  {
	    for ($i=0;$i<count($resultArray);$i++)
        {
	      if ($status!=$resultArray[$i][$statusField])
		  {
  		    $ypos=$yposRef;
		    $status=$resultArray[$i][$statusField];
		  }
          $request->envoi("UPDATE ".$tableData." SET ".$xPosField."=".($xInitDefaultPosition).",".$yPosField."=".$ypos.",".$zPosField."=".$zposNew++." WHERE ".$itemIdName."=".$resultArray[$i][$itemIdName]);
          $mcnx->num->$tableData->update(array($itemIdName=>$resultArray[$i][$itemIdName]),array('$set'=>array($xPosField=>($xInitDefaultPosition),$yPosField=>$ypos,$zPosField=>$zposNew++)),array('multiple' => true));
  		  $ypos+=$itemYShift;
		}	  
	  }
	break;

	case 'order_all_extended':
	  $_SESSION['dashboard_display_mode']='extended';
	  // compute available space for putting extra "columns"
	  $columnsOfPostit=floor($columnWidth/($itemWidth+10));
      $status='no_value';
	  $yposRef=isset($_REQUEST['ypos_ref']) ? $_REQUEST['ypos_ref'] : 45;
      //	 get all items
	  $request= new requete("SELECT ".$itemIdName.",".$statusField.",".$zPosField." AS zindex 
	                       FROM ".$tableData." WHERE active=1 ".$clauseWhereElements."
						   ORDER BY ".$statusField.",".$fieldForOrder." ASC",$cnx->num);
      $resultArray=$request->getArrayFields();
	  
      $zposNew=1;
	  $xCol=0;
      for ($i=0;$i<count($resultArray);$i++)
      {
	    if ($status!=$resultArray[$i][$statusField])
		{
		  $ypos=$yposRef;
		  $status=$resultArray[$i][$statusField];
		  $xCol=0;
		}
        $request->envoi("UPDATE ".$tableData." SET ".$xPosField."=".($xInitDefaultPosition+($itemWidth+10)*$xCol++).",".$yPosField."=".$ypos.",".$zPosField."=".$zposNew++." WHERE ".$itemIdName."=".$resultArray[$i][$itemIdName]);
        $mcnx->num->$tableData->update(array($itemIdName=>$resultArray[$i][$itemIdName]),array('$set'=>array($xPosField=>($xInitDefaultPosition+($itemWidth+10)*$xCol++),$yPosField=>$ypos,$zPosField=>$zposNew++)),array('multiple' => true));
		if ($xCol==$columnsOfPostit)
		{
		  $ypos+=$itemHeight+25;
		  $xCol=0;
		}  
	  }
	break;	

	case 'order_all_priority':
	  $_SESSION['dashboard_display_mode']='priority';
	  $_SESSION['display_priority']='block';
	  // compute available space for putting extra "columns"
	  $columnsOfPostit=floor($columnWidth/($itemWidth+10));
      $status='no_value';
	  $yposRef=isset($_REQUEST['ypos_ref']) ? $_REQUEST['ypos_ref'] : 45;
      // get all items
	  $request= new requete("SELECT ".$itemIdName.",".$statusField.",".$zPosField." AS zindex 
	                       FROM ".$tableData." WHERE active=1 ".$clauseWhereElements."
			       ORDER BY ".$statusField.",".$fieldForPriorityOrder,$cnx->num);
      $resultArray=$request->getArrayFields();
	  
      $zposNew=1;	  
	  $xCol=0;
      for ($i=0;$i<count($resultArray);$i++)
      {
	    if ($status!=$resultArray[$i][$statusField])
		{
		  $ypos=$yposRef;
		  $status=$resultArray[$i][$statusField];
		  $xCol=0;
		}
        $request->envoi("UPDATE ".$tableData." SET ".$xPosField."=".($xInitDefaultPosition+($itemWidth+10)*$xCol++).",".$yPosField."=".$ypos.",".$zPosField."=".$zposNew++." WHERE ".$itemIdName."=".$resultArray[$i][$itemIdName]);
        $mcnx->num->$tableData->update(array($itemIdName=>$resultArray[$i][$itemIdName]),array('$set'=>array($xPosField=>($xInitDefaultPosition+($itemWidth+10)*$xCol++),$yPosField=>$ypos,$zPosField=>$zposNew++)),array('multiple' => true));
		if ($xCol==$columnsOfPostit)
		{
		  $ypos+=$itemHeight+10;
		  $xCol=0;
		}  
	  }
	break;	

	    
	case 'us_status_change':
          $setDateClause='';  
          if (strtoupper($_REQUEST['new_status'])=='DONE')  
          {
            $setDateClause=",us_date_finished=DATE(NOW())";
          }
	  $request->envoi("UPDATE kados_user_stories 
	                   SET status='".strtoupper($_REQUEST['new_status'])."'".$setDateClause." 
					   WHERE us_id=".$_REQUEST['us_id']);
          $mcnx->num->kados_user_stories->update(array('us_id'=>$_REQUEST['us_id']),array('$set'=>array('status'=>"'".strtoupper($_REQUEST['new_status'])."'".$setDateClause)),array('multiple' => true));
	break;

        case 'issue_status_change':
	  $request->envoi("UPDATE kados_issues 
	                   SET status='".strtoupper($_REQUEST['new_status'])."' 
		           WHERE issue_id=".$_REQUEST['issue_id']);
            $mcnx->num->kados_issues->update(array('issue_id'=>$_REQUEST['issue_id']),array('$set'=>array('status'=>strtoupper($_REQUEST['new_status']))),array('multiple' => true));
	break;

	case 'assign':
	  $request= new requete("UPDATE ".$tableData." 
	                         SET ".$fieldLeader."='".$_REQUEST['username']."' 
			         WHERE ".$itemIdName."=".$_REQUEST['item_id'],$cnx->num);
            $mcnx->num->$tableData->update(array($itemIdName=>$_REQUEST['item_id']),array('$set'=>array($fieldLeader=>$_REQUEST['username'])),array('multiple' => true));
	break;    
    
	case 'add_tag':
	  $request->envoi("INSERT INTO kados_tags_postit 
	                         (tag_id_fk, 
	                          postit_id_fk, 
	                          postit_type, 
		                      tagged_date, 
		                      tagged_by )
		                      VALUES
		                      (".$_REQUEST['tag2add_id'].", 
		                       ".$_REQUEST['item_id'].", 
		                       '".strtoupper($simpleItemType)."', 
		                       '".aujourdhui().' '.heure_brute()."', 
		                       '".$_SESSION['login']."')");
            $mcnx->num->kados_tags_postit->insert(array("tag_id_fk"=>$_REQUEST['tag2add_id'],"postit_id_fk"=>$_REQUEST['item_id'],"postit_type"=>strtoupper($simpleItemType),"tagged_date"=>aujourdhui().''.heure_brute(),"tagged_by"=>$_SESSION['login']));
	break;
	
	case 'remove_tag':
	  $request->envoi("DELETE FROM kados_tags_postit
	                   WHERE postit_id_fk=".$_REQUEST['item_id']." 
					   AND tag_id_fk=".$_REQUEST['tag2remove_id']."
					   AND postit_type='".strtoupper($simpleItemType)."'");
            $mcnx->num->kados_tags_postit->remove(array('postit_id_fk'=>$_REQUEST['item_id'],'tag_id_fk'=>$_REQUEST['tag2remove_id'],'postit_type'=>strtoupper($simpleItemType)));
	break;
	
        case 'order_all_tasks_by_number':
          $fieldForOrder=$fieldForSorting;  
	case 'order_all_tasks_compact':
          $usToOrder=array();
          $usToOrder=explode('_',$_REQUEST['tasks2order']);
            
          for ($nbUs=0;$nbUs<count($usToOrder);$nbUs++)
          {
            $_REQUEST['object_id']=$usToOrder[$nbUs];
            include $pathBase.'boards_settings/settings_'.$itemType.'.php';
            $_SESSION['dashboard_display_mode']='compact';
	    // compute available space for shifting item on the left before stepping over the column limit
	    $availableSpaceForItemXShift=$columnWidth-$itemWidth-5;
            $status='no_value';
  	    $yposRef=isset($_REQUEST['ypos_ref']) ? $_REQUEST['ypos_ref'] : 45;
	    $altRef=-$xInitDefaultPosition+5;
            // get all items
	    $request= new requete("SELECT ".$itemIdName.",".$statusField.",".$zPosField." AS zindex 
	                           FROM ".$tableData." 
                                   WHERE active=1 ".$clauseWhereElements."
		  	           ORDER BY ".$statusField.",".$fieldForOrder." ASC",$cnx->num);
            $resultArray=$request->getArrayFields();
            $zposNew=1;
	  
	    if ($availableSpaceForItemXShift>20)
	   {
	      for ($i=0;$i<count($resultArray);$i++)
              {
	        if ($status!=$resultArray[$i][$statusField])
	        {
  		  $ypos=$yposRef;
		  $status=$resultArray[$i][$statusField];
		  $alt=$altRef;
	        }
                $request->envoi("UPDATE ".$tableData." SET ".$xPosField."=".($xInitDefaultPosition+$alt).",".$yPosField."=".$ypos.",".$zPosField."=".$zposNew++." WHERE ".$itemIdName."=".$resultArray[$i][$itemIdName]);
                $mcnx->num->$tableData->update(array($itemIdName=>$resultArray[$i][$itemIdName]),array('$set'=>array($xPosField=>($xInitDefaultPosition+$alt),$yPosField=>$ypos,$zPosField=>$zposNew++)),array('multiple' => true));
    	        $ypos+=$itemYShift;
	        $alt+=7;
	        if ($alt-$altRef>$availableSpaceForItemXShift)
	        {
		  $alt=0;
		  $ypos+=$itemHeight-35;
  	        }
	      }  
	    }
	    else
	    {
  	      for ($i=0;$i<count($resultArray);$i++)
              {
	        if ($status!=$resultArray[$i][$statusField])
	        {
  		  $ypos=$yposRef;
		  $status=$resultArray[$i][$statusField];
                }
                $request->envoi("UPDATE ".$tableData." SET ".$xPosField."=".($xInitDefaultPosition).",".$yPosField."=".$ypos.",".$zPosField."=".$zposNew++." WHERE ".$itemIdName."=".$resultArray[$i][$itemIdName]);
                $mcnx->num->$tableData->update(array($itemIdName=>$resultArray[$i][$itemIdName]),array('$set'=>array($xPosField=>($xInitDefaultPosition),$yPosField=>$ypos,$zPosField=>$zposNew++)),array('multiple' => true));
   	        $ypos+=$itemYShift;
              }
	    }
          }  
	break;	

	case 'order_all_tasks_extended':
          $usToOrder=array();
          $usToOrder=explode('_',$_REQUEST['tasks2order']);
            
          for ($nbUs=0;$nbUs<count($usToOrder);$nbUs++)
          {
            $_REQUEST['object_id']=$usToOrder[$nbUs];
            include $pathBase.'boards_settings/settings_'.$itemType.'.php';
	    $_SESSION['dashboard_display_mode']='extended';
	    // compute available space for putting extra "columns"
	    $columnsOfPostit=floor($columnWidth/($itemWidth+10));
            $status='no_value';
	    $yposRef=isset($_REQUEST['ypos_ref']) ? $_REQUEST['ypos_ref'] : 45;
            // get all items
	    $request= new requete("SELECT ".$itemIdName.",".$statusField.",".$zPosField." AS zindex 
	                           FROM ".$tableData." 
                                   WHERE active=1 ".$clauseWhereElements."
				   ORDER BY ".$statusField.",".$fieldForOrder." ASC",$cnx->num);
            $resultArray=$request->getArrayFields();
	  
            $zposNew=1;
	    $xCol=0;
            for ($i=0;$i<count($resultArray);$i++)
            {
	      if ($status!=$resultArray[$i][$statusField])
	      {
		$ypos=$yposRef;
		$status=$resultArray[$i][$statusField];
		$xCol=0;
	      }
              $request->envoi("UPDATE ".$tableData." SET ".$xPosField."=".($xInitDefaultPosition+($itemWidth+10)*$xCol++).",".$yPosField."=".$ypos.",".$zPosField."=".$zposNew++." WHERE ".$itemIdName."=".$resultArray[$i][$itemIdName]);
              $mcnx->num->$tableData->update(array($itemIdName=>$resultArray[$i][$itemIdName]),array('$set'=>array($xPosField=>($xInitDefaultPosition+($itemWidth+10)*$xCol++),$yPosField=>$ypos,$zPosField=>$zposNew++)),array('multiple' => true));
	      if ($xCol==$columnsOfPostit)
	      {
		$ypos+=$itemHeight+25;
		$xCol=0;
	      }  
	    }
          }  
	break;	        
        
    case 'filter_feature':
      if ($_REQUEST['filter_feature']=='')  
      {
        unset($_SESSION['feature_filter']);
      }
      else
      {
        $_SESSION['feature_filter']=$_REQUEST['filter_feature'];
      }  
    break;
    
    case 'filter_stakeholder':
      if ($_REQUEST['filter_stakeholder']=='')  
      {
        unset($_SESSION['stakeholder_filter']);
      }
      else
      {
        $_SESSION['stakeholder_filter']=$_REQUEST['filter_stakeholder'];
      }  
    break;    
  }
}?>