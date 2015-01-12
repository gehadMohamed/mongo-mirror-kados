<?php
/**
 * Main script to manage items in a dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */

if (!isset($tableDataLeftJoin))
{
  $tableDataLeftJoin='';
}

if (!isset($deleteMode))
{
  $pictureTrash='app/trash.gif';
  $deleteModeInt='trash';
}
else
{
  $pictureTrash='app/delete.png';  
  $deleteModeInt='del';
}

  $displayNoUser = isset($displayNoUser) ? $displayNoUser : false;
?>

<div class="main" style="height:<?php echo $dashboardHeight;?>px;width:<?php echo $dashboardWidth;?>px"><?php
 $keys=array_keys($arrayStatusX);
 // display columns based on the specific array
 for ($i=0;$i<count($arrayStatus);$i++)
 {?>
   <span class="col2Do<?php echo ($i==0 ? 'First' :'');?>" style="width:<?php echo ($columnWidth-1);?>px;height:<?php echo $dashboardHeight;?>px"><?php
   if ($displayDashBoardTitles)
   {?>
     <span class="colHeader" style="width:<?php echo ($columnWidth-1);?>px"><?php 
      if (isset($arrayStatus[$i]['link']))
	  {?>
	    <a href="<?php echo $arrayStatus[$i]['link'];?>"><?php echo $arrayStatus[$i]['colName'];?></a><?php
	  }
	  else
	  {
 	    echo $arrayStatus[$i]['colName'];
	  }	
	  if (isset($arrayStatus[$i]['colMeaning']))
	  {?>
	    <span class="colMeaning">
	      <img src="<?php echo $pathImages;?>app/infos.png" tooltip="<?php echo changeDoubleQuote($arrayStatus[$i]['colMeaning']);?>" />
		</span><?php
	  }?>
     </span>
   <span class="hidden-status"><?php echo $keys[$i].':'.$arrayStatusX[$keys[$i]];?></span> <?php
   }?>
   </span><?php
 }

if (!isset($specialClause))
{
  $specialClause='';
}

$request=new requete("SELECT ".$fieldsList." 
                      FROM ".$tableData." ".$tableDataLeftJoin." 
                      WHERE active=1 ".$clauseWhereElementsGetAllStd.$specialClause." 
                      ORDER BY ".$zPosField." ASC",$cnx->num);
$resultArray=$request->getArrayFields();

// Position de base pour la priorité en superposition
$posOver=2;
// Ajout de paramètre(s) pour le lien de mise à jour d'un postit
if (!isset($updateParameter))
{
  $updateParameter='';
}

$projectTagsList=array();
if ($currentProject->paramUseTags)
{
  // get tags for the project
  $wkf=new workflow('TAG','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
  $wkf->set_profile('framework_workflows_transitions_profiles','profile_id_fk',$_SESSION['user_profile']);

  $request->envoi("(SELECT tag_id,tag_label
                   FROM kados_tags,kados_tags_projects 
				   WHERE tag_id_fk=tag_id 
				     AND project_id_fk=".$_SESSION['current_project_id']."
					 AND tag_type IN('USR_FREE','ALL_FREE') AND tag_status_id_fk=".$wkf->id_etat_from_label('TAGACT').")
					UNION 
                   (SELECT tag_id,tag_label
                     FROM kados_tags
				     WHERE tag_type='ALL_MAND' AND tag_status_id_fk=".$wkf->id_etat_from_label('TAGACT').")
					 ORDER BY tag_label");
  $projectTagsList=$request->getArrayFields();
}

for ($i=0;$i<count($resultArray);$i++)
{
  $addonUpdateUrl='';
  $activateParentZone=false;
  $activateWarningZone=false;
  if ($updateParameter!='')
  {
    $addonUpdateUrl='&'.$updateParameter.'='.$resultArray[$i][$updateParameter];
  }
  // Checked if there is a link
  $linkExists= isset($resultArray[$i]['link']) ? ($resultArray[$i]['link']!='' ? true : false ) : false;
  // Checked if there is a leader
  $leaderExists= isset($resultArray[$i]['item_leader']) ? ($resultArray[$i]['item_leader']!='' ? true : false ) : false;
			
  $postitInfos='';			
  if ($resultArray[$i]['creator']!='')
  {  
    $postitInfos=$text_created_on_m.format_date(dateFromDatetime($resultArray[$i]['creation_date'])).' ';
    $postitInfos.=$text_by.' '.getUserName($resultArray[$i]['creator']).'<br />';
    $postitInfos.=$text_last_updated_on_m.format_date(dateFromDatetime($resultArray[$i]['last_update'])).' ';  
    $postitInfos.=$text_by.' '.getUserName($resultArray[$i]['last_updater']).'<br />';
  }
  // get Tags for the postit
  $request->envoi("SELECT tag_id,tag_label,tag_color
                   FROM kados_tags,kados_tags_postit
				   WHERE tag_id_fk=tag_id AND postit_id_fk=".$resultArray[$i][$itemIdName]."
				     AND postit_type='".strtoupper($simpleItemType)."'");
  $postitTagsList=$request->getArrayFields();
  
  // Warning and parent zones
  $parentZoneData=array();
  $warningZoneData=array();
  // display link between issue and US if exists	
  if ($simpleItemType=='us')
  {
    if ($displayWarningZone)
    {
      // Warning zone may be activated if link with issues
      $request->envoi("SELECT issue_type,impact,issue_number,probability,text,issue_id,status 
                       FROM kados_issues 
		       WHERE active=1 AND issue_us_id_fk=".$resultArray[$i][$itemIdName]);
      $warningZoneData=$request->getArrayFields();
    }	
		  
    if ($displayParentZone)
    {
      // Parent zone may be activated if link with an US
      $request->envoi("SELECT us_feature_id_fk 
                       FROM kados_user_stories 
                       WHERE active=1 AND us_id=".$resultArray[$i][$itemIdName]);
      $linkedFeatureData=$request->getArrayFields();
  		  
      $request->envoi("SELECT feature_short_label,feature_description,feature_name 
                      FROM kados_features 
	              WHERE feature_id=".$linkedFeatureData[0]['us_feature_id_fk']);
      $parentZoneData=$request->getArrayFields();
    }	
  }
  else if ($simpleItemType=='issue')
  {
    if ($displayParentZone)
    {
      // Parent zone may be activated if link with an US
      $request->envoi("SELECT issue_us_id_fk,issue_type 
                       FROM kados_issues 
                       WHERE active=1 AND issue_id=".$resultArray[$i][$itemIdName]);
      $linkedIssueData=$request->getArrayFields();
		  
      $request->envoi("SELECT us_number,us_id,status,business_value,text 
                       FROM kados_user_stories 
                       WHERE active=1 AND us_id=".$linkedIssueData[0]['issue_us_id_fk']);
      $parentZoneData=$request->getArrayFields();
    }	
  }		
  else if ($simpleItemType=='task')
  {
    if ($displayParentZone)
    {
      // Parent zone may be activated if link with an US
      $request->envoi("SELECT us_number,us_id,status,business_value,text 
                       FROM kados_user_stories 
                       WHERE active=1 AND us_id=".$resultArray[$i][$parentRefId]);
      $parentZoneData=$request->getArrayFields();
    }	
  }
  // compute display for zones		
  if (count($parentZoneData)!=0)
  {
    if (file_exists($pathBase.'parent_zone_'.$simpleItemType.'.php'))
    {
      require $pathBase.'parent_zone_'.$simpleItemType.'.php';
    }
  }  
  if (count($warningZoneData)!=0)
  {
    if (file_exists($pathBase.'warning_zone_'.$simpleItemType.'.php'))
    {
      require $pathBase.'warning_zone_'.$simpleItemType.'.php';
    }
  }
  $isIEbrowser=preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT']) && ($activateParentZone || $activateWarningZone);?>  

	<div class="<?php if ($allowMove) { echo 'note';} else { echo 'note_static'; }?> <?php echo $resultArray[$i]['color'];?>" id="note<?php echo $resultArray[$i][$itemIdName];?>" style="width:<?php echo $itemWidth;?>px;height:<?php echo $itemHeight+($isIEbrowser ? 16 : 0);?>px;left:<?php echo ($arrayStatusX[$resultArray[$i][$statusField]]+$resultArray[$i][$xPosField]);?>px;top:<?php echo $resultArray[$i][$yPosField];?>px;z-index:<?php echo $resultArray[$i][$zPosField];?>">
	<div class="upper-header" style="width:<?php echo $itemWidth;?>px;<?php if($isIEbrowser) {echo 'height:16px;';}?>">
		<!-- The PARENT ZONE --><?php
		if ($activateParentZone)
		{?>
		  <div class="parent_zone"><?php echo $parentZoneDisplay;?></div><?php
		}?>  
		<!-- The WARNING ZONE --><?php
     	if ($activateWarningZone)
		{?>
		  <div class="warning_zone"><?php echo $warningZoneDisplay;?></div><?php		
		} ?> 
	</div><?php
		// Call special function to disable update function (useful for activities)
		$enableUpdateFunction=true;
		if (isset($functionForDisableUpdate))
		{
		  $enableUpdateFunction=call_user_func($functionForDisableUpdate,array($resultArray[$i][$itemIdName],$cnx->num)); 
		}
		// Call special function to disable update function (useful for activities)
		$enableDeleteFunction=true;
		
		if (isset($functionForDisableDelete))
		{
		  $enableDeleteFunction=call_user_func($functionForDisableDelete,array($resultArray[$i][$itemIdName],$cnx->num)); 
		}?>
		<div class="item-header">
		  <?php if ($allowDelete && $enableDeleteFunction) { ?><span class="<?php echo $deleteModeInt;?>span bloc-header"><form action="<?php echo $targetFileAction;?>&action=del_item&item_id=<?php echo $resultArray[$i][$itemIdName];?>&object_id=<?php echo $parentId;?>#Block<?php echo $k;?>" method="post" name="form_del_item<?php echo $resultArray[$i][$itemIdName];?>"><img src="<?php echo $pathImages.$pictureTrash;?>" border="0" /></form></span><?php }?>			
		  <span class="editspan bloc-header"><?php if ($allowUpdate && $enableUpdateFunction) { ?><a href="<?php echo $pathBase;?>boards_buttons/update_<?php echo $simpleItemType;?>.php?item_id=<?php echo $resultArray[$i][$itemIdName];?>&item_type=<?php echo $itemType;?><?php echo $addonUpdateUrl;?>&blockId=<?php echo $k;?>" class="ulbtn"><img src="<?php echo $pathImages;?>app/update.png" border="0" /></a><?php }?></span>	<?php
          if ($postitInfos!='')
		  {?>
            <span class="postit_details bloc-header"><img src="<?php echo $pathImages;?>app/small_details.png" border="0" tooltip="<?php echo changeDoubleQuote($postitInfos);?>" /></span>	<?php
          }?>		  
		  <span class="postit_id"><?php echo $objectTag.$resultArray[$i][$itemNumberName];?></span>
		  <span class="postit_header-right"><?php 
		    if (isset($functionForHeaderStamp))
			{
		      call_user_func($functionForHeaderStamp,array($resultArray[$i][$itemIdName],$resultArray[$i]['header_stamp'],$allowActionHeaderStamp,$boardFinalStatusTag,'')); 
			}
            else
            {
              echo htmlspecialchars($resultArray[$i]['header_stamp']);
            }?>
		  </span>
		  <span class="hidden-parent_id"><?php echo $parentId;?></span>
		  <span class="hidden-title_displayed"><?php echo ($displayDashBoardTitles ? $displayTopLimit : 3);?></span>
		</div>
		<div class="postit_text" style="width:<?php echo ($itemWidth-$itemWidthBodyMargin);?>px;height:<?php echo ($itemHeight-$itemHeightBodyMargin);?>px;"><?php echo make_clickable(nl2br(htmlspecialchars($resultArray[$i]['text'])));?></div>
            <div class="postit_text_over" style="color:#CECEF3;right:<?php echo $posOver;?>px;display:<?php echo $_SESSION['display_priority'];?>"><?php if (isset($resultArray[$i]['priority'])) { echo $resultArray[$i]['priority']; }?></div>				
	    <div class="postit_text_over" style="color:#6969F3;right:<?php echo $posOver+2;?>px;display:<?php echo $_SESSION['display_priority'];?>"><?php if (isset($resultArray[$i]['priority'])) { echo $resultArray[$i]['priority']; }?></div>				
	    <div class="postit_text_over" style="color:navy;right:<?php echo $posOver+4;?>px;display:<?php echo $_SESSION['display_priority'];?>"><?php if (isset($resultArray[$i]['priority'])) { echo $resultArray[$i]['priority']; }?></div>				
	    <div class="item-footer">
	      <span class="postit_footer-left"><?php 
	  	if (isset($resultArray[$i]['infoBottomLeft']))
		{
	          if (isset($functionForBottomLeft)) 
		  { 
		    call_user_func($functionForBottomLeft,$resultArray[$i]['infoBottomLeft']);
		  }
		  else
		  {
		    echo $resultArray[$i]['infoBottomLeft'];
		  }
		} ?>
	      </span>
	      <span class="postit_footer-center1" style="position:relative;left:<?php echo (round($itemWidth/2,0)-11);?>px"><?php
	        if ($linkExists)
		{?>
		  <a href="<?php echo $resultArray[$i]['link'];?>" target="_ext"><img src="<?php echo $pathImages;?>app/link.png" title="<?php echo $resultArray[$i]['link'];?>" border="0" /></a><?php
                } ?>
              </span><?php
              $isUserStakeholder=false;
              if (isset($_SESSION['current_project_id']))
              {  
                $isUserStakeholder=$currentProject->isUserStakeholder($_SESSION['login'],$_SESSION['current_project_id'],(isset($_SESSION['current_release_id'])? $_SESSION['current_release_id'] : 0));
              }  
              $allowAllocate=in_array('ALLOC_TASK',$_SESSION['user_actions']) 
                          || in_array('ALLOC_TASK',$_SESSION['user_local_actions']); ?>
              <span class="postit_footer-center2<?php if ($allowAllocate || $isUserStakeholder) {echo ' allocate_user';}?>" style="position:relative;left:<?php echo (round($itemWidth/2,0)+($linkExists?-11:+3));?>px">
                  <?php
	        if ($leaderExists)
		{?>
		  <span class="user-head" ><img src="<?php echo $pathImages;?>app/user.png" title="<?php echo $text_assigned_to_f.' '.getUserName($resultArray[$i]['item_leader']);?>" border="0" /></span><?php
		}
		else if ($displayNoUser)
                {
		  //if (in_array($_SESSION['login'],$stakeholdersProjects))?>
		  <span class="user-head" ><img src="<?php echo $pathImages;?>app/no-user.png" border="0" tooltip="<?php echo changeDoubleQuote($text_assigned_to_nobody);?>" /></span><?php
		}
                if ($allowAllocate || $isUserStakeholder)
                {  ?>
                  <span class="user-list" style="left:12px;top:15px;display:none;position:absolute;" ><?php
	            for ($nbUsers=0;$nbUsers<count($projectUsers);$nbUsers++)
	            { 
                      if (!$allowAllocate && $isUserStakeholder && $projectUsers[$nbUsers]['login']==$_SESSION['login'] || $allowAllocate)
                      {  ?>		  
	                <a href="<?php echo $targetFileAction;?>&action=assign&item_id=<?php echo $resultArray[$i][$itemIdName];?>&username=<?php echo $projectUsers[$nbUsers]['login'];?>#Block<?php echo $k;?>" ><?php echo $projectUsers[$nbUsers]['name'];?></a><br /><?php
                      }
                    }?>	
                  </span><?php
                }?>  
		</span>
		<span class="postit_footer-right"><?php 
		  if (isset($resultArray[$i]['infoBottomRight']))
		  {
		    if (isset($functionForBottomRight)) 
		    { 
		      call_user_func($functionForBottomRight,$resultArray[$i]['infoBottomRight']);
		    }
		    else
		    {
		      echo $resultArray[$i]['infoBottomRight'];
		    }
                  } ?>		  
		</span>
	      </div>		
	      <span class="item-status"><?php echo $resultArray[$i][$statusField];?></span>
	      <span class="data"><?php echo $resultArray[$i][$itemIdName];?></span><?php
	  // display tags if postit are US or TASKS 
	  if (in_array($simpleItemType,array('us','task')) && $currentProject->paramUseTags)
	  {
	    unset($postitTagsListIds);
            $postitTagsListIds=array();?>
	    <!-- TAGS of the Postit --><?php
	    for ($nbtags=0;$nbtags<count($postitTagsList);$nbtags++)
            {
	      // add to local postit tags table
	      $postitTagsListIds[]=$postitTagsList[$nbtags]['tag_id'];
	      // display tag if it has just been created
	      $tagDisplay='display:none;';
	      if (isset($_REQUEST['tag2add_id'])) 
	      { 
	        if ($_REQUEST['tag2add_id']==$postitTagsList[$nbtags]['tag_id'] && $_REQUEST['item_id']==$resultArray[$i][$itemIdName]) 
		{ 
		  $tagDisplay='';
		}
	      }?>
	      <div class="tag-zone-out <?php echo $postitTagsList[$nbtags]['tag_color'];?>" style="left:<?php echo $itemWidth;?>px;top:<?php echo 22+$nbtags*22;?>px;"></div>			
	      <div class="tag-zone <?php echo $postitTagsList[$nbtags]['tag_color'];?>" style="left:<?php echo $itemWidth;?>px;top:<?php echo 22+$nbtags*22;?>px;<?php echo $tagDisplay;?>">
                <?php echo $postitTagsList[$nbtags]['tag_label'];   if (in_array('MNG_TAGS',$_SESSION['user_actions']) || in_array('MNG_TAGS',$_SESSION['user_local_actions'])) {?> <a href="<?php echo $targetFileAction;?>&action=remove_tag&item_id=<?php echo $resultArray[$i][$itemIdName];?>&tag2remove_id=<?php echo $postitTagsList[$nbtags]['tag_id'];?>#Block<?php echo $k;?>" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');"><img src="<?php echo $pathImages;?>app/delete.png" border="0" /></a><?php }?>
	      </div>		<?php
            }
            if (in_array('MNG_TAGS',$_SESSION['user_actions']) || in_array('MNG_TAGS',$_SESSION['user_local_actions']))
            {?>
	    <!-- ADD tags -->
	    <div class="tag-zone-add" style="left:<?php echo $itemWidth;?>px;top:2px;">
	      <img src="<?php echo $pathImages;?>app/pin.png" />
	      <div class="tag-list" style="left:12px;top:0;display:none"><?php
	      for ($nbTagsTpl=0;$nbTagsTpl<count($projectTagsList);$nbTagsTpl++)
	      { 
	        if (!in_array($projectTagsList[$nbTagsTpl]['tag_id'],$postitTagsListIds))
	        {?>		  
	          <a href="<?php echo $targetFileAction;?>&action=add_tag&item_id=<?php echo $resultArray[$i][$itemIdName];?>&tag2add_id=<?php echo $projectTagsList[$nbTagsTpl]['tag_id'];?>#Block<?php echo $k;?>" ><?php echo $projectTagsList[$nbTagsTpl]['tag_label'];?></a><br /><?php
	        }  
              }?>	
	      </div>
	    </div><?php
            }
	  }?>
	</div><?php
}?>	
	
</div>
<div class="clearleft"></div>