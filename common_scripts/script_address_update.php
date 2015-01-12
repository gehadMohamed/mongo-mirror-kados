<?php
/**
 * common address : script to update address
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:commons_scripts
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * 
 * */
  if (!isset($address_tag))
  {
    $address_tag='';
  }  
  $request=new requete("UPDATE framework_addresses  SET address_street='".$_POST['form_item_address'.$address_tag.'_street1']."',
                                                     address_street_comments='".$_POST['form_item_address'.$address_tag.'_street2']."',
                                                     address_zip_code='".$_POST['form_item_address'.$address_tag.'_zip_code']."',
                                                     address_city='".$_POST['form_item_address'.$address_tag.'_city']."',
                                                     address_country='".$_POST['form_item_address'.$address_tag.'_country']."'  
                                                     WHERE address_id=".$_POST['address'.$address_tag.'_id'],$cnx->num);
  $mcnx->num->framework_addresses->update(array('address_id'=>$_POST['address'.$address_tag.'_id']),array('$set'=>array('address_street'=>$_POST['form_item_address'.$address_tag.'_street1'],'address_street_comments'=>$_POST['form_item_address'.$address_tag.'_street2'],'address_zip_code'=>$_POST['form_item_address'.$address_tag.'_zip_code'],'address_city'=>$_POST['form_item_address'.$address_tag.'_city'],'address_country'=>$_POST['form_item_address'.$address_tag.'_country'])),array('multiple' => true));
?>
