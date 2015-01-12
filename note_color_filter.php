<?php
/**
 * Small list of colors to choose one for a note as a background
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
 
$exclusiveColorsListRequest = isset($exclusiveColorsListRequest) ? $exclusiveColorsListRequest :'';
 
$addClause='';
$addClause2='';
if ($exclusiveColorsListRequest!='')
{
  $addClause.=' AND color_name IN ('.$exclusiveColorsListRequest.')';
  $addClause2.=' AND color IN ('.$exclusiveColorsListRequest.')';
}
 
if (in_array($shortItemType,array('us','task')))
{
  $request=new requete("(SELECT color AS color_name,use_color_default  AS color_default, 
	                        use_color_meaning AS object_color_meaning 
                         FROM kados_colors_uses 
			 WHERE use_color_postit_type='".strtoupper($shortItemType)."' 
                                 AND use_color_lock=1 ".$addClause2.") 
			 UNION
			(SELECT color_name,object_color_default AS color_default,object_color_meaning 
			 FROM kados_projects_colors,kados_colors 
			 WHERE project_id_fk=".$_SESSION['current_project_id']."
		 	   AND color_id_fk=color_id 
			   AND object_type='".strtoupper($shortItemType)."' ".$addClause.")",$cnx->num);	  
  $colorList=$request->getArrayFields();
}
else
{
  $request=new requete("(SELECT color AS color_name,use_color_default AS color_default,'".$text_risk."' AS object_color_meaning 
                         FROM kados_colors_uses 
	  	         WHERE use_color_postit_type='RISK' )
			 UNION
			(SELECT color AS color_name,use_color_default AS color_default,'".$text_problem."' AS object_color_meaning 
                         FROM kados_colors_uses 
			 WHERE use_color_postit_type='PROBLEM')",$cnx->num);	  	     
  $colorList=$request->getArrayFields();  
}  
  
  $text='text_'.$shortItemType.'_filter'; ?>  
<div class="colorBlockFilter"><?php
if (isset($_SESSION['filter_'.$shortItemType]))
{?>
  <div class="resetFilter"><a href="<?php echo $targetFileAction;?>&filter_<?php echo $shortItemType;?>="><img border="0" src="<?php echo $pathImages;?>app/reset-button-on.png"></a></div><?php
}
else
{?>
  <div class="resetFilter" style="cursor:default;"><img border="0" src="<?php echo $pathImages;?>app/reset-button-off.png"></a></div><?php
}?>  
<div class="colorTitleFilter"><?php echo $$text;?></div> 
<!-- Clicking one of the divs changes the color of the preview --><?php
  for ($i=0;$i<count($colorList);$i++)
  {?>
    <a href="<?php echo $targetFileAction;?>&filter_<?php echo $shortItemType;?>=<?php echo $colorList[$i]['color_name'];?>"><div class="colorFilter <?php echo $colorList[$i]['color_name'];?>" title="<?php echo $colorList[$i]['object_color_meaning']; ?>"></div></a><?php     
    if (fmod($i,6)==5)
    {?>
      <div class="clearleft"></div><?php
    }
  }?>
</div>