<?php
/**
 * Script to prepare parent for a feature
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */
  $tipText=$text_business_value.' : '.$parentZoneData[0]['business_value'].'<br />';
  $tipText.=$text_content.' : '.nl2br($parentZoneData[0]['text']);		 
  $activateParentZone=true;
  $parentZoneDisplay='<span tooltip="'.changeDoubleQuote($tipText).'">US'.$parentZoneData[0]['us_number'].'</span>';
?>			