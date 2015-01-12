<?php
/**
 * Display at the top of some board the features filter
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
 
if (($simpleItemType=='us' || $simpleItemType=='task') && $showFilterFeatures)
{
  $exclusiveUsFeaturesListRequest = isset($exclusiveUsFeaturesListRequest) ? $exclusiveUsFeaturesListRequest :'';
 
  $addClause='';
  if ($exclusiveUsFeaturesListRequest!='')
  {
    $addClause.=' AND feature_id IN ('.$exclusiveUsFeaturesListRequest.')';
  }    
    
  $request=new requete("SELECT feature_id,CONCAT(feature_short_label,' ',feature_name) AS feature 
                        FROM kados_features
			WHERE feature_project_id_fk=".$_SESSION['current_project_id'].$addClause,$cnx->num);	  
  $featuresList=$request->getArrayFields();

  if (isset($_SESSION['feature_filter']) && $simpleItemType=='us')
  {
    $clauseWhereElements.=' AND us_feature_id_fk='.$_SESSION['feature_filter'];
    $clauseWhereElementsGetAll.=' AND us_feature_id_fk='.$_SESSION['feature_filter'];
  } ?>  

<div class="featureBlockFilter" <?php if (isset($_SESSION['feature_filter'])) { echo ' id="actif"';}?>> 
 <form name="feature_filter_form" id="feature_filter_form" method="post" action="<?php echo $targetFile;?>&action=filter_feature" enctype="multipart/form-data">   
  <select name="filter_feature" style="font-size:8pt;"  onChange="javascript:document.feature_filter_form.submit();">
      <option></option><?php
   for ($i=0;$i<count($featuresList);$i++)
   {?>
      <option style="font-size:8pt;" value="<?php echo $featuresList[$i]['feature_id'];?>" <?php if (isset($_SESSION['feature_filter'])) { if ($_SESSION['feature_filter']==$featuresList[$i]['feature_id']){ echo 'selected="selected"';}};?>><?php echo $featuresList[$i]['feature'];?></option><?php
   }?>
  </select>
 </form>    
</div>    
<?php
}?>