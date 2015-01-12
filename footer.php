<?php
/**
 * Standard page footer  
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:global
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */
$version='';
$versionFile=fopen($pathBase.'VERSION','r');
$version=fread($versionFile,60); ?>
</div>
</div>

<!-- BEGIN FOOTER!-->
<!--<div class="display_footer">
  <div class="credits"><?php echo $version;?> - <a href="http://www.kados.info" class="std_link" target="_ext">KADOS by Marmotte Technologies</a></div>
</div>  
  <div style="float:right;margin-right:8px;"><a href="http://docs.kados.info" class="std_link" target="_ext">KADOS documentation</a></div>-->
<!-- END FOOTER!-->

</body>
</html>