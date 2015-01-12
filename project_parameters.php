<?php
/**
  * Project Parameters management
 *
 * PHP versions 4 and 5
 *
 * @framework_ Scripts
 * @package  ProjectMngt
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     
$pathBase='./';
require_once $pathBase.'header.php';
$targetFile='project_parameters.php?';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

if (isset($_SESSION['current_project_id']))
{
  switch ($_REQUEST['action'])
  {
    case 'change_overlapping':
      // switch between use or no use 
        $request=new requete("SELECT project_sprint_overlapping from kados_projects WHERE project_id='".$_SESSION['current_project_id']."'",$cnx->num);
        list($paramVal) = $request->recup_array_mono();
      $request=new requete("UPDATE kados_projects SET project_sprint_overlapping=NOT(project_sprint_overlapping) WHERE project_id=".$_SESSION['current_project_id'],$cnx->num);
      $mcnx->num->kados_projects->update(array('project_id'=>$_SESSION['current_project_id']),array('$set'=>array('project_sprint_overlapping'=>!$paramVal)),array('multiple' => true));
      $currentProject->paramSprintOver=!$currentProject->paramSprintOver;  
    break;		 
	
    case 'change_visibility':
      // switch between use or no use 
        $request=new requete("SELECT project_visibility from kados_projects WHERE project_id='".$_SESSION['current_project_id']."'",$cnx->num);
        list($paramVal) = $request->recup_array_mono();
      $request=new requete("UPDATE kados_projects SET project_visibility=IF(project_visibility='PRI','PUB','PRI') WHERE project_id=".$_SESSION['current_project_id'],$cnx->num);
        if($paramVal=='PRI'){
            $paramVal='PUB';
        }else{
            $paramVal='PRI';
        }
             
$mcnx->num->kados_projects->update(array('project_id'=>$_SESSION['current_project_id']),array('$set'=>array('project_visibility'=>$paramVal)),array('multiple' => true));
      $currentProject->paramVisibility=$currentProject->paramVisibility=='PRI' ? 'PUB': 'PRI';  
    break;		 	

    case 'change_tags_use':
      // switch between use or no use 
      $request=new requete("UPDATE kados_projects SET project_use_tags=NOT(project_use_tags) WHERE project_id=".$_SESSION['current_project_id'],$cnx->num);
        $currentProject->paramUseTags=!$currentProject->paramUseTags;
    break;	

    case 'change_block_raf':
      // switch between use or no use 
      $request=new requete("UPDATE kados_projects SET project_block_raf=NOT(project_block_raf) WHERE project_id=".$_SESSION['current_project_id'],$cnx->num);
        $mcnx->num->kados_projects->update(array('project_id'=>$_SESSION['current_project_id']),array('$set'=>array('project_block_raf'=>NOT(project_block_raf))),array('multiple' => true));
      $currentProject->paramBlockRaf=!$currentProject->paramBlockRaf;  
    break;	
  }  	 
 
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';
  require $pathBase.'common_scripts/project_data.php';

    // display parameters with switch
	
  if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
      || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$_SESSION['current_project_id'])
      || $currentProject->adminLogin==$_SESSION['login'])      
  {	?>
    <div class="MessageBox InformationMessageBox"><?php echo $msg_managing_parameters_switch;?></div><?php
    if (getParameter('SPOVL',$cnx->num)==1)	
    {
      $buttonText=$text_allow_sprint_overlapping;
      $urlButtonOnOff=$targetFile.'&action=change_overlapping';
      $boolOnOff=$currentProject->paramSprintOver;
      include $pathBase.'common_scripts/on_off_button.php';	
    }
  
    $buttonText=$text_project_is_private;
    $urlButtonOnOff=$targetFile.'&action=change_visibility';
    $boolOnOff=$currentProject->paramVisibility=='PRI';
    include $pathBase.'common_scripts/on_off_button.php';	
    
    $buttonText=$text_project_use_tags;
    $urlButtonOnOff=$targetFile.'&action=change_tags_use';
    $boolOnOff=$currentProject->paramUseTags;
    include $pathBase.'common_scripts/on_off_button.php';	   
    
    $buttonText=$text_project_block_raf;
    $urlButtonOnOff=$targetFile.'&action=change_block_raf';
    $boolOnOff=$currentProject->paramBlockRaf;
    include $pathBase.'common_scripts/on_off_button.php';?>
    <div class="clearleft"></div><br /><?php
  }	
  else
  {?>
    <table class="SimpleData" cellpadding="0" cellspacing="0"><?php
    if (getParameter('SPOVL',$cnx->num)==1)	
    {?>
	  <tr class="alt">
	     <td style="text-align:left;"> <?php 
		   echo $text_allow_sprint_overlapping;?>
		</td>
	    <td style="text-align:left;"><?php
	      echo ($currentProject->paramSprintOver==1 ? $text_yes : $text_no); ?>
	    </td>
	  </tr><?php
    }?>
    <tr>
      <td style="text-align:left;"> <?php 
	   if ($currentProject->paramVisibility=='PRI')
	   {
	     echo $text_this_project_is_private;
	   }
	   else
	   {
	     echo $text_this_project_is_public;
	   }?>
      </td>
	  <td style="text-align:left;"> </td>
    </tr>
    <tr class="alt">
	     <td style="text-align:left;"> <?php 
		   echo $text_project_use_tags;?>
		</td>
	    <td style="text-align:left;"><?php
	      echo $currentProject->paramUseTags==1 ? $text_yes : $text_no; ?>
	    </td>
	  </tr>
  <tr>
	    <td style="text-align:left;"> <?php 
		   echo $text_project_block_raf;?>
		</td>
	    <td style="text-align:left;"><?php
	      echo $currentProject->paramBlockRaf==1 ? $text_yes : $text_no; ?>
	    </td>
	  </tr>          
  </table><?php
  }    
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}

$cnx->close();  
require_once $pathBase.'footer.php';?>