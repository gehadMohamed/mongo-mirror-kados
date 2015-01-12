<?php
/**
 * Script to prepare warning zone for an US
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */

            $impactDisplay[0]=$text_impact_2eval;
	        $impactDisplay[1]=$text_impact_low;
	        $impactDisplay[2]=$text_impact_medium;
	        $impactDisplay[3]=$text_impact_high;
			$tipTextRed='';
			$tipTextYellow='';
			$tipTextBlue='';
			$tipTextGreen='';
			// list all linked issues
            for ($nbIssues=0;$nbIssues<count($warningZoneData);$nbIssues++)
            {			
			  $tipText=$text_us_is_linked_with.' '.lcfirst( $warningZoneData[$nbIssues]['issue_type']=='risk' ? $text_risk : $text_problem).' I'.$warningZoneData[$nbIssues]['issue_number'].'<br />';
			  $tipText.=$text_impact.' : '.$impactDisplay[$warningZoneData[$nbIssues]['impact']].'<br />';
			  if ($warningZoneData[$nbIssues]['issue_type']=='risk')
			  {
			    $tipText.=$text_probability.' : '.$warningZoneData[$nbIssues]['probability'].'%<br />';
			  }
			  $tipText.=$text_content.' : '.nl2br($warningZoneData[$nbIssues]['text']);		
			
			  if ($warningZoneData[$nbIssues]['status']=='AWAY')
			  {
			    $tipTextGreen.=$tipText.'<br />';
			  }
			  else if($warningZoneData[$nbIssues]['impact']<2)
			  {
			    $tipTextBlue.=$tipText.'<br />';
			  }
			  else if ($warningZoneData[$nbIssues]['impact']<3)
			  {
			    $tipTextYellow.=$tipText.'<br />';
			  }			  
			  else
			  {
			    $tipTextRed.=$tipText.'<br />';
			  }			  
			}
            //	set red bulb infos
			$activateWarningZone=true;
			$warningZoneDisplay='';
			$whiteBulbImg='<img src="'.$pathImages.'app/bulb-white.png" />';
		    $warningZoneDisplay.= $tipTextRed!='' ? '<span id="warning_red"><span tooltip="'.changeDoubleQuote($tipTextRed).'"><img src="'.$pathImages.'app/bulb-red.png" /></span></span>' : $whiteBulbImg;
		    $warningZoneDisplay.= $tipTextYellow!='' ? '<span id="warning_yellow"><span tooltip="'.changeDoubleQuote($tipTextYellow).'"><img src="'.$pathImages.'app/bulb-yellow.png" /></span></span>' : $whiteBulbImg;
			$warningZoneDisplay.= $tipTextBlue!='' ? '<span id="warning_blue"><span tooltip="'.changeDoubleQuote($tipTextBlue).'"><img src="'.$pathImages.'app/bulb-blue.png" /></span></span>' : $whiteBulbImg;
		    $warningZoneDisplay.= $tipTextGreen!='' ? '<span id="warning_green"><span tooltip="'.changeDoubleQuote($tipTextGreen).'"><img src="'.$pathImages.'app/bulb-green.png" /></span></span>' : $whiteBulbImg;						
?>