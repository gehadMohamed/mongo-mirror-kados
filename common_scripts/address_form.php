<?php
/**
 * common address form : form to create and modify address
 *
 * PHP versions 4 and 5
 *
 * @category Script
 * @package  Project_Mngt:commons_forms
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://marmotech.free.fr/gestion_chantier  
 * 
 * IN : 
 *   - $address_data => object with all address data (may be empty for creation form)
 *   - $_REQUEST['action'] => action used by the form ("view_details" value for readonly address form)   
 *   - $field_length = length of the field labels
 *   - $address_required = > if the address fields are mandatory or not 
 * */
 if (!isset($field_length))
 {
  $field_length=150;
 }
 $field_required='length';
 if (isset($address_required))
 {
   if ($address_required==true)
   {
     $field_required='required_field';
   }
 }  
 
 if (!isset($address_tag))
 {
   $address_tag='';
 }   
?> 
    <label class="label <?php echo $field_required.$field_length;?>" ><?php echo $text_address;?></label>
    <input <?php if ($_REQUEST['action']=='view_details') {echo 'class="readonly_form_field"'; } else { echo 'class="std_form_field"'; } ?> name="form_item_address<?php echo $address_tag;?>_street1" type="text" size="45" value="<?php echo $address_data->address_street;?>" <?php if ($_REQUEST['action']=='view_details') {echo 'readonly="readonly"'; } ?> /><div class="clearleft"></div>
    <label class="label length<?php echo $field_length;?>" ><?php echo $text_address_comment;?></label>
    <input <?php if ($_REQUEST['action']=='view_details') {echo 'class="readonly_form_field"'; } else { echo 'class="std_form_field"'; } ?> name="form_item_address<?php echo $address_tag;?>_street2" type="text" size="45" value="<?php echo $address_data->address_street_comments;?>" <?php if ($_REQUEST['action']=='view_details') {echo 'readonly="readonly"'; } ?> /><div class="clearleft"></div>
    <label class="label <?php echo $field_required.$field_length;?>" ><?php echo $text_address_zip_code;?></label>
    <input <?php if ($_REQUEST['action']=='view_details') {echo 'class="readonly_form_field"'; } else { echo 'class="std_form_field"'; } ?> name="form_item_address<?php echo $address_tag;?>_zip_code" type="text" size="16" value="<?php echo $address_data->address_zip_code;?>" <?php if ($_REQUEST['action']=='view_details') {echo 'readonly="readonly"'; } ?> /><div class="clearleft"></div>
    <label class="label <?php echo $field_required.$field_length;?>" ><?php echo $text_address_city;?></label>
    <input <?php if ($_REQUEST['action']=='view_details') {echo 'class="readonly_form_field"'; } else { echo 'class="std_form_field"'; } ?> name="form_item_address<?php echo $address_tag;?>_city" type="text" size="30" value="<?php echo $address_data->address_city;?>" <?php if ($_REQUEST['action']=='view_details') {echo 'readonly="readonly"'; } ?> /><div class="clearleft"></div>
    <label class="label length<?php echo $field_length;?>" ><?php echo $text_address_country;?></label>
    <input <?php if ($_REQUEST['action']=='view_details') {echo 'class="readonly_form_field"'; } else { echo 'class="std_form_field"'; } ?> name="form_item_address<?php echo $address_tag;?>_country" type="text" size="30" value="<?php echo $address_data->address_country;?>" <?php if ($_REQUEST['action']=='view_details') {echo 'readonly="readonly"'; } ?> /><div class="clearleft"></div>
