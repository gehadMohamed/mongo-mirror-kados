<?php
/**
 * Project template management
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectMngt:Templates
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     
$pathBase='../';
require_once $pathBase.'header.php';
$targetFile='templates_project.php?';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
$displayTable=true;

  require_once $pathBase.'templates_projects_list.php';

  switch ($_REQUEST['action'])
  {
	
	case 'enable':
	  // add template id
	  array_push($templateList,$_REQUEST['tpl_id']);
      // set parameter
	  set_parameter('PRJTPL',implode(';',$templateList).':'.$defaultTemplate,$cnx->num);
	break;
	
	case 'disable':
	  // remove template id
	  $keyTable=array_search($_REQUEST['tpl_id'],$templateList);
	  unset($templateList[$keyTable]);
      // set parameter
	  set_parameter('PRJTPL',implode(';',$templateList).':'.$defaultTemplate,$cnx->num);
	break;	
	
	case 'set_default':
	  $defaultTemplate=$_REQUEST['tpl2set'];
	  set_parameter('PRJTPL',implode(';',$templateList).':'.$defaultTemplate,$cnx->num);	
	break;	
  }  	 
  
  if ($displayTable)
  {?>
     <table class="TableData">
       <tr> 
         <th><?php echo $text_template; ?></th>
		 <th><center><a href="#" class="<?php echo TipCssDisplay($text_actions);?>"><img src="<?php echo $pathImages;?>action.gif" border="0"  /><span><?php echo $text_actions;?></span></a></center></th>		 		 
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_workflow);?>"><img src="<?php echo $pathImages;?>workflow.gif" border="0"  /><span><?php echo $text_workflow;?></span></a></center></th>		 
       </tr><?php
	   for ($i=3;$i>0;$i--)
	   {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td><?php
		   	  if ($defaultTemplate==$i)
			  {?>
			    <img src="<?php echo $pathImages;?>set_default.gif" border="0"  /> <?php
			  }
			  echo $textProjectTemplates[$i]; ?>
	       </td>
		   <td class="nowrap"><center><?php
		   if (in_array($i,$templateList))
		   {	
             if ($defaultTemplate!=$i)
             {?>
			   <a href="<?php echo $targetFile;?>&action=set_default&tpl2set=<?php echo $i;?>" class="<?php echo TipCssDisplay($action_set_as_default);?>"><img src="<?php echo $pathImages;?>set_default.gif" border="0"  /><span><?php echo $action_set_as_default;?></span></a><?php
             }
		   } ?>   </center>
		   </td> 	
		   <td class="nowrap"><center><?php
		   if ($defaultTemplate!=$i)
		   {
             if (in_array($i,$templateList))
             {?>
			   <a href="<?php echo $targetFile;?>&action=disable&tpl_id=<?php echo $i;?>" ><img src="<?php echo $pathImages;?>set_inactive.gif" border="0"  /></a><?php
             }
			 else
			 {?>
			   <a href="<?php echo $targetFile;?>&action=enable&tpl_id=<?php echo $i;?>" ><img src="<?php echo $pathImages;?>set_active.gif" border="0"  /></a><?php
             }
		   }?></center>
		   </td> 			 
         </tr><?php
	   }?>
     </table><?php
  }

  
$cnx->close();  

require_once $pathBase.'footer.php';?>

