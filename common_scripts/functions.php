<?php
/**
 * functions.php
 * Useful functions for all scripts
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:functions
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */ 
 
if (phpversion()<5.3)
{  
  function lcfirst($string)
  {
    $chain=strtolower(substr($string,0,1)).substr($string,1);
    return $chain;
  }
}    


  
/*******************  FUNCTION  ***********************************************
NAME: add_zero_two_digits            
OBJECT: add zero if necessary in front of an hour to have a two-digit display 
IN:
- $number   -> number to be tested
OUT: the result
*******************************************************************************/  
function add_zero_two_digits($number)
{
  if ($number>=10)
  {
    return $number;
  }
  else
  {
    return '0'.$number;
  }
}

/*******************  FUNCTION  ***********************************************
NAME:  add_param_url           
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function add_param_url($cible,$param)
{
  if (strpos($cible,"?")) 
    $cible.="&".$param;
  else 
    $cible.="?".$param;
	
  return $cible;
}	

/*******************  FUNCTION  ***********************************************
NAME: convert_for_uri            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function convert_for_uri($text) { 
  // D�finition du s�parateur 
  define("SEPARATOR", "_"); 

  $tofind = "���������������������������"; // Lettre accentu�es 
  $replac = "aaaaaaooooooeeeeciiiiuuuuyn"; // Equivalant non accentu� 

  // Mise en minuscule + suppression des lettres accentu�es par leur �quivalant non accentu� 
  $text = strtr(strtolower($text),$tofind,$replac); 

  // Remplacement de caract�re non alphanum�rique par un s�parateur 
  $text = ereg_replace("[^a-z0-9]", SEPARATOR, $text); 

  // Suppression des doubles s�parateurs 
  while (strstr($text, SEPARATOR . SEPARATOR)) 
    $text = str_replace(SEPARATOR . SEPARATOR, SEPARATOR, $text); 

  // Retour avec suppression d�un possible s�parateur en fin de cha�ne 
  return(ereg_replace(SEPARATOR . "$", "", $text)); 
}

/*******************  FUNCTION  ***********************************************
NAME: getParameter            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function getParameter($param,$cnx_num)
{
  $request=new requete("SELECT parameter_value FROM framework_parameters WHERE parameter_tag_id='".$param."'",$cnx_num);
  $request->recup_array_mono();
  return $request->array[0];
}

/*******************  FUNCTION  ***********************************************
NAME: getParameter_name            
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function getParameter_name($param,$cnx_num)
{
  $request=new requete("SELECT parameter_name FROM framework_parameters WHERE parameter_tag_id='".$param."'",$cnx_num);
  $request->recup_array_mono();
  return $request->array[0];
}


/*******************  FUNCTION  ***********************************************
NAME: set_parameter            
OBJECT:  
IN:
- $   -> 
*******************************************************************************/
function set_parameter($param,$value,$cnx_num)
{
  $request=new requete("UPDATE framework_parameters SET parameter_value='".$value."' WHERE parameter_tag_id='".$param."'",$cnx_num);
  $mcnx->num->framework_parameters->update(array('parameter_tag_id'=>$param),array('$set'=>array('parameter_value'=>$value)),array('multiple' => true));
}



/*******************  FUNCTION  ***********************************************
NAME: address_fields_not_null            
OBJECT:  
IN:
 $list -> array of variables (POST)
 $tag  -> tag to specify a set of address variables  
OUT: the result
*******************************************************************************/
function address_exists($list,$tag='')
{
  $exit=true;
  if ($list['form_item_address'.$tag.'_street1']=='' && $list['form_item_address'.$tag.'_street2']=='' &&  $list['form_item_address'.$tag.'_zip_code']=='' &&  $list['form_item_address'.$tag.'_city']=='')
  {
    $exit=false;
  }  
  return $exit;
}

/*******************  FUNCTION  ***********************************************
NAME: add_zero            
OBJECT:  
IN:
- $value   -> value for which zero must be added (before) 
OUT: the result
*******************************************************************************/
function add_zero($value,$number=6)
{
  $return_string='';
  for ($i=0;$i<$number-strlen((string)$value);$i++)
  {
    $return_string.='0';
  }
  $return_string.=(string)$value;
  return $return_string;
}

/**
 * Choose the good css style to display for the tip
 *  
 * @param varchar $text tip text to display
 * @return varchar $css_sheet CSS sheet to display
 */

function TipCssDisplay($text)
{
  $length=strlen($text);
  if ($length>21)
  {
    $css_sheet='info_huge';
  }  
  else if ($length>15)
  {
    $css_sheet='info_long';
  }
  else if ($length>6)
  {
    $css_sheet='info';
  }
  else
  {
    $css_sheet='info_short';
  }
  return $css_sheet;
}

/**
 * Choose the good css style to display for the warning
 *  
 * @param varchar $text tip text to display
 * @return varchar $css_sheet CSS sheet to display
 */
function WarningCssDisplay($text)
{
  $length=strlen($text);
  if ($length>21)
  {
    $css_sheet='warning_huge';
  }  
  else if ($length>15)
  {
    $css_sheet='warning_long';
  }
  else if ($length>6)
  {
    $css_sheet='warning';
  }
  else
  {
    $css_sheet='warning_short';
  }
  return $css_sheet;
}

/**
 * Check if address is ok
 *  
 * @param int      $address_id id of the address record to test
 * @param object   $num        connection to database ressource
 * @return varchar $css_sheet  CSS sheet to display
 */
function address_ok($address_id,$num)
{
  $answer=false;
  $request=new requete('SELECT * FROM framework_addresses WHERE address_id='.$address_id,$num);
  $request->calc_nb_elt();
  if ($request->nb_elt!=0)
  {
    $address=$request->getObject();
	if ($address->address_street!='' &&  $address->address_zip_code!='' && $address->address_city!='')
	{
	  $answer=true;
	}
  }
  return $answer;
}

/**
 * Display a value with a money style
 *  
 * @param float $value value to display
 * @return varchar formatted value
 */
  function DisplayMoney($value)
  {
    echo number_format($value,2, ',', ' ');
  }

/**
 * Display a text formatted with utf8
 *  
 * @param varchar $text text to display
 * @return varchar formatted value
 */  
  function TextDisplay($text)
  {
    echo utf8_encode($text);
  }
  

/**
 * get name of a user
 *  
 * @param varchar $userLogin user login
 * @return varchar name of the user or nothing if user does not exist
 */    
function getUserName($userLogin)  
{
  $cnx=new connexion_db();
  $request=new requete("SELECT CONCAT(user_firstname,' ',user_name) AS name FROM framework_users WHERE user_login='".$userLogin."'",$cnx->num);
  $request->calc_nb_elt();
  if($request->nb_elt!=0)
  {
    $request->getObject();
    return $request->objet->name;
  }
  else
  {
    return '';
  }
}

/**
 * get label of an action of the profile
 *  
 * @param varchar $actionTag tag of the action
 * @param varchar $language  language
 * @return varchar action label
 */
function getActionLabel($actionTag,$language)  
{
  $label='';
  
  $cnx=new connexion_db();
  $request=new requete("SELECT action_translation_value 
                        FROM framework_profiles_actions_translations 
                        WHERE action_translation_language='".$language."' AND action_tag_fk='".$actionTag."'",$cnx->num);
  $request->calc_nb_elt();
  
  if($request->nb_elt!=0)
  {
    $request->getObject();
    $label=$request->objet->action_translation_value;
	if ($pos=strrpos($label,']'))
	{
	  $label=substr($label,$pos+1);
	}
  }
  return $label;
}

/**
 * get profile id from a profile tag
 *  
 * @param varchar $profileTag tag of the profile
 * @return varchar id
 */
function getProfileIdFromTag($profileTag)  
{
  global $pathBase;
  $id=0;
  
  $cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
  $request=new requete("SELECT profile_id
                        FROM framework_profiles
                        WHERE profile_tag='".$profileTag."'",$cnx->num);
  $request->calc_nb_elt();
  
  if($request->nb_elt!=0)
  {
    $request->getObject();
    $id=$request->objet->profile_id;
  }
  return $id;
}

function displayButton($text,$image,$target,$class='',$specific='')
{?>
  	<table class="button_shell" cellpadding="0" cellspacing="0">
	<tr>
	  <td class="button_img"><a href="<?php echo $target;?>" class="<?php echo $class.' '.$specific.'_img';?>" ><img src="<?php echo $image;?>" border="0" /></a> </td>
	  <td> <a href="<?php echo $target;?>" class="button <?php echo $class.' '.$specific.'_link';?>"><?php echo $text;?></a></td>	
	</tr>
	</table><?php
}

function displayButtonImg($text,$image,$target,$class='',$specific='')
{?>
  	<table class="button_shell" cellpadding="0" cellspacing="0">
	<tr>
	  <td class="button_img"><a href="<?php echo $target;?>" class="<?php echo $class.' '.$specific.'_img';?>" ><img src="<?php echo $image;?>" border="0" title="<?php echo $text;?>"  /></a> </td>
	</tr>
	</table><?php
}


/*******************  FUNCTION  ***********************************************
NAME:  setUrlForParam           
OBJECT:  
IN:
- $   -> 
OUT: the result
*******************************************************************************/
function setUrlForParam($cible)
{
  if (strpos($cible,"?")) 
    $cible.="&";
  else 
    $cible.="?";
	
  return $cible;
}	

function strftimeSpecial($format,$time=-1)
{
  // V�rifie sous Windows, pour trouver et remplacer le modificateur %e 
  // correctement
  if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
    $format = preg_replace('#(?<!%)((?:%%)*)%e#', '\1%#d', $format);
  }
  if ($time==-1)
  {
    $time=time();
  }	
  
  if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {  
    return TextFormat(strftime($format,$time));
  }
  else
  {
    return strftime($format,$time);
  }
}


// PHP < 5.5.0
if (!function_exists('array_column')) {
    function array_column($input, $column_key, $index_key = null)
    {
        if ($index_key !== null) {
            // Collect the keys
            $keys = array();
            $i = 0; // Counter for numerical keys when key does not exist
           
            foreach ($input as $row) {
                if (array_key_exists($index_key, $row)) {
                    // Update counter for numerical keys
                    if (is_numeric($row[$index_key]) || is_bool($row[$index_key])) {
                        $i = max($i, (int) $row[$index_key] + 1);
                    }
                   
                    // Get the key from a single column of the array
                    $keys[] = $row[$index_key];
                } else {
                    // The key does not exist, use numerical indexing
                    $keys[] = $i++;
                }
            }
        }
       
        if ($column_key !== null) {
            // Collect the values
            $values = array();
            $i = 0; // Counter for removing keys
           
            foreach ($input as $row) {
                if (array_key_exists($column_key, $row)) {
                    // Get the values from a single column of the input array
                    $values[] = $row[$column_key];
                    $i++;
                } elseif (isset($keys)) {
                    // Values does not exist, also drop the key for it
                    array_splice($keys, $i, 1);
                }
            }
        } else {
            // Get the full arrays
            $values = array_values($input);
        }
       
        if ($index_key !== null) {
            return array_combine($keys, $values);
        }
       
        return $values;
    }
}

function getServerURL()
{
 $pageURL = 'http';
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") 
 {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
 } 
 else 
 {
  $pageURL .= $_SERVER["SERVER_NAME"];
 }
 $app=substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/'));
 return $pageURL.$app;    
}

function getAppPath()
{
  $result=$_SERVER['DOCUMENT_ROOT'].substr($_SERVER['SCRIPT_NAME'],0,strpos($_SERVER['SCRIPT_NAME'],'/',1));;
  return $result;
}

function getServerROOT()
{
 $pageURL = 'http';
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") 
 {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
 } 
 else 
 {
  $pageURL .= $_SERVER["SERVER_NAME"];
 }
 return $pageURL;    
}

function varDump($var)
{
  echo '<pre>'.var_dump($var).'</pre>';
}

function stripAccents($string)
{
  return strtr($string,'���������������������������������������������������',
                       'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

function stripSpaces($string)
{
  return strtr($string," ()'",
                       "-__-");
}

?>