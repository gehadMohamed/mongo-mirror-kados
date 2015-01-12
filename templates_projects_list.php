<?php
/**
 * list of templates for projects
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:projects
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */
 
  // Get values from parameter to initiate template list
  $tmp=explode(':',getParameter('PRJTPL',$cnx->num));
  $defaultTemplate=$tmp[1];
  $templateList=explode(';',$tmp[0]); 
 
  // set list of labels
  $textProjectTemplates[3]=$text_3levels;
  $textProjectTemplates[2]=$text_2levels;
  $textProjectTemplates[1]=$text_1level;