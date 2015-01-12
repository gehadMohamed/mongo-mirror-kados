<?php
/**
 * common address : script to create address
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
  $request=new requete("INSERT INTO framework_addresses (address_street, address_street_comments, address_zip_code, address_city,address_country) 
                                               VALUES('".$_POST['form_item_address'.$address_tag.'_street1']."',
                                                      '".$_POST['form_item_address'.$address_tag.'_street2']."',
                                                      '".$_POST['form_item_address'.$address_tag.'_zip_code']."',
                                                      '".$_POST['form_item_address'.$address_tag.'_city']."',
                                                      '".$_POST['form_item_address'.$address_tag.'_country']."')",$cnx->num);
  $mcnx->num->framework_addresses->insert(array("address_street"=>$_POST['form_item_address'.$address_tag.'_street1'],"address_street_comments"=>$_POST['form_item_address'.$address_tag.'_street2'],"address_zip_code"=>$_POST['form_item_address'.$address_tag.'_zip_code'],"address_city"=>$_POST['form_item_address'.$address_tag.'_city'],"address_country"=>$_POST['form_item_address'.$address_tag.'_country']));
  $id_address=$request->insert_id();
