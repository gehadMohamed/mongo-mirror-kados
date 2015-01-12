<?php
/**
 * Display at the top of some board the tags filter
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

if (($simpleItemType=='us' || $simpleItemType=='task') && $showFilterTags && $currentProject->paramUseTags)
{
/****************************** TAG FILTER basic actions ***********************************/
  if (!isset($_SESSION['tag_filter_plus']))
  {
    $_SESSION['tag_filter_plus']=array(0=>0);
  }
  if (!isset($_SESSION['tag_filter_minus']))
  {
    $_SESSION['tag_filter_minus']=array(0=>0);
  }  
  // Add to TAG FILTER
  if (isset($_GET['add_to_tag_filter']))
  {
    if (in_array($_GET['filter_type'],array('minus','plus')))
    {            
      if (array_search((int)$_GET['add_to_tag_filter'],$_SESSION['tag_filter_'.$_GET['filter_type']])==false)
      {
        array_push($_SESSION['tag_filter_'.$_GET['filter_type']],(int)$_GET['add_to_tag_filter']);
        // If tag is in the other array, get it out
        $inverseArray= $_GET['filter_type']=='minus' ? 'plus' : 'minus';
        $pos=array_search((int)$_GET['add_to_tag_filter'],$_SESSION['tag_filter_'.$inverseArray]);
        if ($pos>0)
        {
          unset($_SESSION['tag_filter_'.$inverseArray][$pos]);
        }
        // Add US to the deck storage of the user
      }  
    }	
  }
  // Remove from TAG FILTER
  if (isset($_GET['remove_from_tag_filter']))
  {
    if (in_array($_GET['filter_type'],array('minus','plus')))
    {
      $pos=array_search((int)$_GET['remove_from_tag_filter'],$_SESSION['tag_filter_'.$_GET['filter_type']]);
      if ($pos>0)
      {
        unset($_SESSION['tag_filter_'.$_GET['filter_type']][$pos]);
      }	
    }  
  }
    
 /* $exclusiveUsTagsListRequest = isset($exclusiveUsTagsListRequest) ? $exclusiveUsTagsListRequest :'';
 */
  $addClause='';
  /*if ($exclusiveUsTagsListRequest!='')
  {
    $addClause.=' AND tag_id IN ('.$exclusiveUsTagsListRequest.')';
  }*/    
  
  $wkf=new workflow('TAG','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language'],$pathBase);
    
  $request=new requete("(SELECT tag_id,tag_label,tag_color 
                         FROM kados_tags 
                         WHERE tag_type='ALL_MAND' 
                           AND tag_status_id_fk=".$wkf->id_etat_from_label('TAGACT').") 
                        UNION 
                        (SELECT tag_id,tag_label,tag_color 
                         FROM kados_tags,kados_tags_projects 
                         WHERE tag_type IN('ALL_FREE','USR_FREE') 
                           AND tag_status_id_fk=".$wkf->id_etat_from_label('TAGACT')." 
                           AND tag_id_fk=tag_id 
                           AND project_id_fk=".$_SESSION['current_project_id'].") 
                         ".$addClause,$cnx->num);	  
  $tagsList=$request->getArrayFields();

  if (isset($_SESSION['tag_filter_plus']))
  {
    if (count($_SESSION['tag_filter_plus'])>1)  
    {   
      $addClauseTag='';
      if ($simpleItemType=='us')  
      {
        $addClauseTag=" AND us_id IN(SELECT postit_id_fk 
                                     FROM kados_tags_postit,kados_user_stories  
                                     WHERE postit_type='US' 
                                       AND tag_id_fk IN(".implode(',',$_SESSION['tag_filter_plus']).") 
                                       AND postit_id_fk=us_id 
                                       AND us_project_id_fk=".$_SESSION['current_project_id'].") ";  
      }
      else if ($simpleItemType=='task')
      {
        $addClauseTag=" AND task_id IN(SELECT postit_id_fk 
                                     FROM kados_tags_postit,kados_user_stories,kados_tasks   
                                     WHERE postit_type='TASK' 
                                       AND tag_id_fk IN(".implode(',',$_SESSION['tag_filter_plus']).") 
                                       AND postit_id_fk=task_id AND us_id=us_id_fk 
                                       AND us_project_id_fk=".$_SESSION['current_project_id'].") ";  
      }    
      $clauseWhereElements.=$addClauseTag;
      $clauseWhereElementsGetAll.=$addClauseTag;
    }  
  } 
  
  if (isset($_SESSION['tag_filter_minus']))
  {
    if (count($_SESSION['tag_filter_minus'])>1)  
    {   
      $addClauseTag='';
      if ($simpleItemType=='us')  
      {
        $addClauseTag=" AND us_id NOT IN(SELECT postit_id_fk 
                                     FROM kados_tags_postit,kados_user_stories  
                                     WHERE postit_type='US' 
                                       AND tag_id_fk IN(".implode(',',$_SESSION['tag_filter_minus']).")                                              
                                       AND postit_id_fk=us_id 
                                       AND us_project_id_fk=".$_SESSION['current_project_id'].") ";  
      }
      else if ($simpleItemType=='task')
      {
        $addClauseTag=" AND task_id NOT IN(SELECT postit_id_fk 
                                     FROM kados_tags_postit,kados_user_stories,kados_tasks   
                                     WHERE postit_type='TASK' 
                                       AND tag_id_fk IN(".implode(',',$_SESSION['tag_filter_minus']).")                                            
                                       AND postit_id_fk=task_id AND us_id=us_id_fk 
                                       AND us_project_id_fk=".$_SESSION['current_project_id'].") ";  
      }    
      $clauseWhereElements.=$addClauseTag;
      $clauseWhereElementsGetAll.=$addClauseTag;
    }  
  }   
  
?>  
<div class="tagBlockFilter" ><?php
   for ($i=0;$i<count($tagsList);$i++)
   {
     if (array_search($tagsList[$i]['tag_id'],$_SESSION['tag_filter_plus'])>0)
     {?>
       <div class="tag-filter <?php echo $tagsList[$i]['tag_color'];?>"><a href="<?php echo $targetFileAction;?>&remove_from_tag_filter=<?php echo $tagsList[$i]['tag_id'];?>&filter_type=plus"><img border="0" src="<?php echo $pathImages;?>app/plus_green.png"></a> <?php echo $tagsList[$i]['tag_label'];?>
           <a href="<?php echo $targetFileAction;?>&add_to_tag_filter=<?php echo $tagsList[$i]['tag_id'];?>&filter_type=minus"><img border="0" src="<?php echo $pathImages;?>app/minus_grey.png"></a> 
       </div> <?php
     }  
     else if (array_search($tagsList[$i]['tag_id'],$_SESSION['tag_filter_minus'])>0)
     {?>
       <div class="tag-filter <?php echo $tagsList[$i]['tag_color'];?>">
           <a href="<?php echo $targetFileAction;?>&add_to_tag_filter=<?php echo $tagsList[$i]['tag_id'];?>&filter_type=plus"><img border="0" src="<?php echo $pathImages;?>app/plus_grey.png"></a> 
           <?php echo $tagsList[$i]['tag_label'];?> 
           <a href="<?php echo $targetFileAction;?>&remove_from_tag_filter=<?php echo $tagsList[$i]['tag_id'];?>&filter_type=minus"><img border="0" src="<?php echo $pathImages;?>app/minus_red.png"></a> 
       </div> <?php
     }
     else
     {?>
       <div class="tag-filter <?php echo $tagsList[$i]['tag_color'];?>">
           <a href="<?php echo $targetFileAction;?>&add_to_tag_filter=<?php echo $tagsList[$i]['tag_id'];?>&filter_type=plus"><img border="0" src="<?php echo $pathImages;?>app/plus_grey.png"></a> 
           <?php echo $tagsList[$i]['tag_label'];?> 
           <a href="<?php echo $targetFileAction;?>&add_to_tag_filter=<?php echo $tagsList[$i]['tag_id'];?>&filter_type=minus"><img border="0" src="<?php echo $pathImages;?>app/minus_grey.png"></a> 
       </div> <?php
     }

   }?>
</div>    
<?php
}?>