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


 
  // simplify types of objects
$simpleItemType=getSimpleItemType($_REQUEST['item_type']);

if (!isset($topPosition))
{
  $topPosition=210;
}
switch ($simpleItemType)
{
  case 'task':
  case 'us':
    $request=new requete("(SELECT color AS color_name,use_color_default  AS color_default,
	                       use_color_meaning AS object_color_meaning 
                           FROM kados_colors_uses
			   WHERE use_color_postit_type='".strtoupper($simpleItemType)."' 
                                 AND use_color_lock=1)
			   UNION
			  (SELECT color_name,object_color_default AS color_default,object_color_meaning
			   FROM kados_projects_colors,kados_colors 
			   WHERE project_id_fk=".$_SESSION['current_project_id']."
		 	     AND color_id_fk=color_id 
			     AND object_type='".strtoupper($simpleItemType)."')",$cnx->num);	  	     
    $colorList=$request->getArrayFields();
  break;	

  case 'issue':
    $request=new requete("SELECT color AS color_name,color AS color_default,'".$$text_object."' AS object_color_meaning 
                          FROM kados_colors_uses
	  	          WHERE use_color_postit_type='".strtoupper($_REQUEST['topic'])."'",$cnx->num);	  	     
    $colorList=$request->getArrayFields();
  break;
  
  case 'action':
  case 'activity':
    $request=new requete("SELECT color AS color_name,use_color_default AS color_default,
                                 use_color_meaning AS object_color_meaning 
                          FROM kados_colors_uses 
	                  WHERE use_color_postit_type='".strtoupper($simpleItemType)."'",$cnx->num);	  	     
    $colorList=$request->getArrayFields();
  break;	
  
  case 'color':
    $request=new requete("SELECT color_name,color_name AS color_default,'' AS object_color_meaning  
                          FROM kados_colors",$cnx->num);	  	     
    $colorList=$request->getArrayFields();
  break;      
}?>

<div class="colorBlock" style="left:0;top:<?php echo $topPosition;?>px;z-index:1">
<div class="colorTitle"><?php echo $text_color;?></div> 
<!-- Clicking one of the divs changes the color of the preview --><?php
  $defaultColor='';
  for ($i=0;$i<count($colorList);$i++)
  {?>
    <div class="color <?php echo $colorList[$i]['color_name'];?>" title="<?php echo $colorList[$i]['object_color_meaning']; ?>"></div><?php     
    if (fmod($i,6)==5)
    {?>
      <div class="clearleft"></div><?php
    }
    $defaultColor= $colorList[$i]['color_default'] ? $colorList[$i]['color_name'] : $defaultColor; 
  }
  // If default color is not set, set the first color as default color 
  if ($defaultColor=='')
  {
    if (isset($colorList[0]['color_name']))
	{
	  $defaultColor=$colorList[0]['color_name'];
	}
  }?>
  <div class="clearleft"></div>
</div>