<?php
/**
 * Languages management
 *
 * PHP versions 4 and 5
 *
 * @framework_ Scripts
 * @package  ProjectMngtAdministration
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     
$pathBase='../';
require_once $pathBase.'header.php';
$targetFile='languages.php?';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$displayTable=true;
  
     $sqlLanguages="SELECT language_tag,language_name FROM framework_languages"; 
     $request=new requete($sqlLanguages,$cnx->num); 	  	     
     $request->calc_nb_elt();
     $pageNumbering=new page_numbering('page_languages',$request->nb_elt,$targetFile,$pathImages,getParameter('PGNUBR',$cnx->num));
           
     $sortColumn=new sort_column('lang_sort',$targetFile,$pathImages);
     $pageNumbering->display_navigator($text_no_item);?>
     <table class="TableData">
       <tr>
	     <th></th>
         <th><?php echo $text_tag; $sortColumn->display_sort_buttons('language_tag');?></th> 
         <th><?php echo $text_language; $sortColumn->display_sort_buttons('language_name');?></th>
         <th><?php echo $text_situation;?></th>
       </tr><?php
       $request=new requete($sqlLanguages.$sortColumn->return_sql_order_by().$pageNumbering->return_sql_limit(),$cnx->num);
       $resultsArray=$request->getArrayFields();
              
       for ($i=0;$i<count($resultsArray);$i++)
       {
	     // Check if language is available
		 $isAvailable=true;
		 // file <lang>_ihm_messages.php exists
		 if (!file_exists($pathBase.'/messages/'.$resultsArray[$i]['language_tag'].'_ihm_messages.php'))
		 {
		   $isAvailable=false;
		 }
		 // file <lang>_js_messages.php exists 
		 if (!file_exists($pathBase.'/messages/'.$resultsArray[$i]['language_tag'].'_js_messages.php'))
		 {
		   $isAvailable=false;
		 }	
         $msg= $isAvailable ?  $msg_language_available : $msg_language_data_missing;	 ?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
		   <td><img src="<?php echo $pathImages.'/flags/'.$resultsArray[$i]['language_tag'].'.png';?>"></td>
           <td><?php echo $resultsArray[$i]['language_tag'];?></td>
           <td><?php echo $resultsArray[$i]['language_name'];?></td>
           <td><?php echo $msg;?></td>
         </tr><?php
       }?>
     </table><?php

$cnx->close();  

require_once $pathBase.'footer.php';?>