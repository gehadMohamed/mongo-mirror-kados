<?php
/**
 * Popup window to search the LDAP 
 * 
 * PHP version 5
 * 
 * @category Ldap
 * @package  Common_Scripts
 * @author   Charles Santucci <charles.santucci@renault.com>
 * @license  http://www.php.net/license/3_0.txt  PHP License 3.0
 * @link     http://baselinesvn.mc2.renault.fr:9090/svn/svn51311
*/

$Fname = isset($_REQUEST['Fname']) ? $_REQUEST['Fname'] : '';
$Ffirstname = isset($_REQUEST['Ffirstname']) ? $_REQUEST['Ffirstname'] : '';
$Flogin = isset($_REQUEST['Flogin']) ? $_REQUEST['Flogin'] : '';
$localTargetFile=$targetFile.'&Fname='.$Fname.'&Ffirstname='.$Ffirstname.'&Flogin='.$Flogin;

       if (isset($_REQUEST['Fname']))
       {
         if (strlen($_REQUEST['Fname'])<3 && strlen($_REQUEST['Flogin'])<3)
		     {
   		     $affiche_tab=false;?>
           <div class="MessageBox WarningMessageBox"><?php echo $msg_not_enough_char;?></div><?php    
         }
		     else
		     {
		       $affiche_tab=true;
		      }
	     }
	     else
	     {
		     $affiche_tab=false;
	     }?>		  
       
       <div class="searchForm" > 	   
     	   <form action="<?php echo $localTargetFile?>&action=search_ldap_uid" method="post" enctype="multipart/form-data" name="form_ldap_search_uid" id="form_ldap_search_uid" onkeypress="javascript:if(event.keyCode == 13){document.form_ldap_search_uid.submit();}">
		     <input type="hidden" name="form_nom" value="form_search_arca"/>
			 <input type="hidden" name="page_number" value="1"/>
	          <fieldset class="fieldset">
         		<legend class="legend"><?php echo $text_ldap_search;?></legend>

                <div class="label soft_grey bordertop borderbottom" style="padding:3px;margin-left:15px;"><?php echo $text_search_by_username;?></div>
			    <div class="clearleft"></div>							
				<br />
				<div>
                <label class="label required_field50"  ><?php echo $text_login;?> <img src="<?php echo $pathImages.'app/red_star.png';?>" alt=""/></label>
		        <input name="Flogin" type="text" class="std_form_field" size="50" <?php if (isset($_REQUEST['Flogin'])) { echo 'value="'.$_REQUEST['Flogin'].'"'; }?> ><div class="clearleft"></div>				
				</div><br />
          <div style="margin-left:15px;"><?php
   		   displayButton($button_submit,$pathImages.'search.png','javascript:document.form_ldap_search_uid.submit()');	
		   displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		  </div>                 
		</fieldset>
		</form>
		
		<br /><br />
     	   <form action="<?php echo $localTargetFile?>&action=search_ldap" method="post" enctype="multipart/form-data" name="form_ldap_search" id="form_ldap_search" onkeypress="javascript:if(event.keyCode == 13){document.form_ldap_search.submit();}">
		     <input type="hidden" name="form_nom" value="form_search_arca"/>
			 <input type="hidden" name="page_number" value="1"/>
	          <fieldset class="fieldset">				
                <span class="label soft_grey bordertop borderbottom" style="padding:3px;margin-left:15px;"><?php echo $text_search_by_name;?></span>
                <div class="clearleft"></div>							
				<br />
				<div>
                <label class="label required_field50"  ><?php echo $text_name;?> <img src="<?php echo $pathImages.'app/red_star.png';?>" alt=""/></label>
		        <input name="Fname" type="text" class="std_form_field" size="50" <?php if (isset($_REQUEST['Fname'])) { echo 'value="'.$_REQUEST['Fname'].'"'; }?> ><div class="clearleft"></div>
                <label class="label length50"  ><?php echo $text_firstname;?></label>
				<input name="Ffirstname" type="text" class="std_form_field" size="50" <?php if (isset($_REQUEST['Ffirstname'])) { echo 'value="'.$_REQUEST['Ffirstname'].'"'; }?> ><div class="clearleft"></div>	
				</div>
		
<br />
          <div style="margin-left:15px;"><?php
   		   displayButton($button_submit,$pathImages.'search.png','javascript:document.form_ldap_search.submit()');	
		   displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		  </div> 
		  </fieldset>
		  
       </form>
	   <div class="clearleft"></div>	
	   <script>document.form_ldap_search.Fname.focus();</script>
	   </div><?php
	   
    if ($affiche_tab)
    {
	  // connect to ldap
	  include $pathBase.'conf/ldap.conf';
	  $ldapConnection=new mt_ldap($ldap_server,$ldap_port,$ldap_base_dn,$ldap_uid_field,$ldap_attributes,$ldap_all_attributes);		 
	  // get number of hits
	  if ($_REQUEST['action']=='search_ldap')
	  {
	    $nbTotal=$ldapConnection->search_name_count_hits($_REQUEST['Fname'],$_REQUEST['Ffirstname']);
	  }	
	  else
	  {
	    $nbTotal=$ldapConnection->uid_valid($_REQUEST['Flogin']);
	  }
		 
	  if ($nbTotal==0)
      {?>
         <div class="MessageBox WarningMessageBox"><?php echo $msg_no_result;?></div>	  <?php
      }	  
	  else if ($nbTotal<100)
	  {
		// set paginator
        $pageNumbering=new page_numbering('page_search_ldap',$nbTotal,$localTargetFile,$pathImages,getParameter('PGNUBR',$cnx->num));		 		
        $pageNumbering->display_navigator($text_no_item);?>
        <table class="TableData" >
          <tr> 
            <th><?php echo $text_login;?></th>
            <th><?php echo $text_name;?></th>			
            <th><?php echo $text_email;?></th>						
          </tr>	  <?php

	    if ($_REQUEST['action']=='search_ldap')
	    {		  
          $ResultsArray=$ldapConnection->search_name($_REQUEST['Fname'],$_REQUEST['Ffirstname'],$nbTotal,$_SESSION['page_search_ldap'],$pageNumbering->max_items_by_page);  
		}  
		else
		{
	      $userFound=$ldapConnection->get_data($_REQUEST['Flogin']);  
		  $ResultsArray[0]['uid']=$_REQUEST['Flogin'];
		  $ResultsArray[0]['nom']=$userFound->nom;
		  $ResultsArray[0]['mail']=$userFound->courriel;
		}
        for ($i=0;$i<count($ResultsArray);$i++)
        {?>
          <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
	        <td><a href="<?php echo $targetFile;?>&action=add_user_from_ldap&username=<?php echo $ResultsArray[$i]['uid'];?>" class="small_link"><?php echo $ResultsArray[$i]['uid'];?></a></td>
	        <td><?php echo $ResultsArray[$i]['nom'];?></td>	
	        <td><?php echo $ResultsArray[$i]['mail'];?></td>		      
          </tr><?php 
		}?>
     	</table><?php  
	  }
      else
      {?>
         <div class="MessageBox WarningMessageBox"><?php echo $msg_too_much_results;?></div>	  <?php
      }	  
    }?>
