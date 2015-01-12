<?php
/**
 * Script to prepare parent for an issue
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */

  $tipText=$text_problem_is_linked_with.' US'.$parentZoneData[0]['us_number'].'<br />';
  if ($linkedIssueData[0]['issue_type']=='risk')
  {			
    $tipText=$text_risk_is_linked_with.' US'.$parentZoneData[0]['us_number'].'<br />';
  }	
  $tipText.=$text_business_value.' : '.$parentZoneData[0]['business_value'].'<br />';
  $tipText.=$text_content.' : '.nl2br($parentZoneData[0]['text']);		 
  $activateParentZone=true;
  $parentZoneDisplay='<span tooltip="'.changeDoubleQuote($tipText).'">US'.$parentZoneData[0]['us_number'].'</span>';
?>			