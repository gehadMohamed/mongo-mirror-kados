<table class="ButtonOnOff" cellpadding="0" cellspacing="0">
  <tr>   
   <th class="blueButton"><?php echo $buttonText;?></th>
   <td>
   <div class="SmallButtonOnOff" cellpadding="0" cellspacing="0">
     <div class="SmallButtonPart <?php echo !$boolOnOff ? 'orangeSmallButton white_colorButton' : ' grey_colorButton' ;?>">OFF</div>
     <div class="SmallButtonPart "><a href="<?php echo $urlButtonOnOff;?>"><img src="<?php echo $pathImages;?>switch<?php echo $boolOnOff ? '1' :'0';?>.png" border="0" /></a></div>
     <div class="SmallButtonPart <?php echo $boolOnOff ? 'middlegreenSmallButton white_colorButton' : 'grey_colorButton' ;?>">ON</div>
   </div>
  </td>   
 </tr>
</table> 