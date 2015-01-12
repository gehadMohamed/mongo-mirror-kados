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
  $tipText=$text_feature.' : '.$parentZoneData[0]['feature_name'].'<br />';
  $tipText.=$text_description.' : '.$parentZoneData[0]['feature_description'].'<br />';
  $activateParentZone=true;
  $parentZoneDisplay='<span tooltip="'.changeDoubleQuote($tipText).'">'.$parentZoneData[0]['feature_short_label'].'</span>';
?>			