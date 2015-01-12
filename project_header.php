<?php
/**
 * Project Header display
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectMngt
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */   

    // line with project data and possible actions?>
      
      <table class="LineData" cellpadding="0" cellspacing="0">
       <tr> 
	     <th></th>
		 <th><?php echo $text_name;?></th>
		 <th><?php echo $text_project_admin;?></th>
                 <th><?php echo $text_status;?></th>
		 <th><?php echo $text_us_total;?></th>
		 <th><?php echo $text_us_in_product_backlog;?></th>
		 <th><?php echo $text_business_value_total;?></th>
		 <th><?php echo $text_complexity_total;?></th>
       </tr>
         <tr>
		   <td><a href="projects.php?menu_lev1=projects&action=change_project" class="std_link"><?php echo $button_change_project;?></a></td>
		   <td><a href="manage_kanban.php?menu_lev1=cockpit&menu_lev2=prj_kanban&project_id=<?php echo $currentProject->projectId;?>"><?php echo $currentProject->name;?></a></td>
		   <td><?php echo $currentProject->adminName;?></td>
                   <td><?php echo $currentProject->status;?></td>
		   <td><?php echo $currentProject->getUsCount();?></td>
		   <td><?php echo $currentProject->getPblCount();?></td>
		   <td><?php echo $currentProject->getBusinessvalueSum();?></td>
		   <td><?php echo $currentProject->getComplexitySum();?></td>
         </tr>
      </table>
     <div class="spacer_br"></div>  