<?php
Class mconnexion_db
{
	var $host;
    var $user;
	var $password;
	var $num;
	var $nom_db;
	
	// le constructeur cree la connexion physique.
	function mconnexion_db($path="")
	{
	  require($path."conf/connect.conf");
      $this->host=$PARAM_mdb_host;
      $this->nom_db=$PARAM_mdb_db;
      
      $this->num=new MongoClient();
      $this->num=$this->num->kados;
      }	  
	
	
	function select_db($chgt=false,$nlle_base="")
	{
	  if ($chgt)
	    $this->nom_db=$nlle_base;
	  $cr_select_db=mysqli_select_db($this->num,$this->nom_db);
      if (!$cr_select_db)
      {
        echo "base non selectionnee <br>";
	    echo mysqli_error($this->num)."<BR>\n";
      }
	}  	
		
	function close()
	{ mysqli_close($this->num); }
};//fin def classe connexion_db

class mrequete{
  var $objet;
  var $resultat;
  var $nb_elt;
  var $array;
  var $connex;
  var $array_obj;
  var $id_new;
  var $log;
  var $db;
  var $refs;
  var $maps;
 
  function mrequete($chaine,$db=null)
  {
	$this->resultat=$chaine;
        $this->db = $db;
    if ($this->resultat)
    {
        return $this->resultat;
                $this->id_new=mysqli_insert_id($this->connex);
	    mysqli_query($this->connex,'COMMIT');
		$this->log=true;
    }

  }
 
  function envoi($chaine)
  {
    $this->resultat=$chaine;
//    if ($this->resultat)
//	{
//	  $this->id_new=mysqli_insert_id($this->connex);	 
//	  $this->log=true;	  
//	  mysqli_query($this->connex,'COMMIT');	
//	}  
    return $this->log;	
  }
  
  function recup_objet()
  {
    $this->objet=(object) $this->resultat->getNext();
    if (!$this->objet)
     {  
       echo "Recuperation ligne resultat objet non effectuee <BR>\n";
	   echo mysqli_error($this->connex)."<BR>";
     }
	 return $this->objet;
	
  }
  
  function insert_id()
  {
    return $this->id_new;	
  }
  
  
function removeTrailings($arr=array())
  {
    foreach ($arr as $key => $value) {
        $arr[$key]=substr($value, 0,-1);
    }
    return $arr;
  }
  
  
  function recup_row()
  {
    $one_row = array_values($this->resultat->getNext());
    if (!$one_row)
    {  
      echo "Recuperation ligne resultat tablo non effectuee <BR>\n";
	  echo mysqli_error($this->connex)."<BR>";
    }
	else
	{ return $one_row; }
	
  } 
  
  function recup_row_champ()
  {
    $one_row = $this->process($this->resultat->getNext());
    if (!$one_row)
    {  
      echo "Recuperation ligne resultat tablo non effectuee <BR>\n";
	  echo mysqli_error($this->connex)."<BR>";
    }
	else
	{ return $one_row; }
	
  }      
   
  
  function calc_nb_elt()
  {
    $this->nb_elt=$this->resultat->count();  
	return  $this->nb_elt;
  }
  
  function countRows()
  {
    $this->nb_elt=mysqli_num_rows($this->resultat);  
	return  $this->nb_elt;
  }
  
  
  function positionne($pos)
  {
    $this->calc_nb_elt();
    if ($pos<=$this->nb_elt)
	{ 
	  $cr_dat_seek=mysqli_data_seek($this->resultat,$pos);
	  if (!$cr_dat_seek)
      {    
        echo "Positionnement non effectuee <BR>\n";
	    echo mysqli_error($this->connex)."<BR>";
      }
	}
	else
	{
	  echo "Position hors d'atteinte.";
	} 
  }		 
  
  function recup_array()
  {  
    $this->array=array();
	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { $this->array[$i]=$this->recup_row(); }
	return $this->array;
  }
  
  function recup_array_mono()
  {  
    $this->array=array();
  	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { 
	  $row=$this->recup_row();
	  $this->array[$i]=$row[0];
    }
	return $this->array;
  }  
  
  function recup_array_champ()
  {  
    $this->array=array();
	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { $this->array[$i]=$this->recup_row_champ(); }
	return $this->array;
	
  }  

  function getArrayFields()
  {  
    $this->array=array();
	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { $this->array[$i]=$this->recup_row_champ(); }
	return $this->array;
  } 

  function getArrayFieldsGroup($groupField)
  {  
    $this->array=array();
	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { 
	  $row=$this->recup_row_champ();
	  $this->array[$row[$groupField]][]=$row; 
	}
	return $this->array;
  }   
  
  function getArrayFieldsPivot($pivotField)
  {  
    $this->array=array();
	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { 
	  $row=$this->recup_row_champ();
	  $this->array[$row[$pivotField]]=$row; 
	}
	return $this->array;
  } 

  function getArrayPivotDouble()
  {  
    $this->array=array();
	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { 
	  $row=$this->recup_row();
	  $this->array[$row[0]][$row[1]]=$row; 
	}
	return $this->array;
  }   
  
  
  function getArrayFieldsOneField()
  {  
    $this->array=array();
	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { 
	  $row=$this->recup_row();
	  $this->array[$row[0]]=$row[1]; 
	}
	return $this->array;
  }   
  
  function getArrayFieldsPivotDouble($pivotFields,$targetField='')
  {  
    $this->array=array();
	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { 
	  $row=$this->recup_row_champ();
	  if ($targetField=='')
	  {
	    $this->array[$row[$pivotFields[0]]][$row[$pivotFields[1]]]=$row; 
	  }
      else	  
	  {
	    $this->array[$row[$pivotFields[0]]][$row[$pivotFields[1]]]=$row[$targetField]; 
	  }	  
	}
	return $this->array;
  }

  function getArrayFieldsPivotDoubleMultipleRows($pivotFields,$targetField='')
  {  
    $this->array=array();
	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { 
	  $row=$this->recup_row_champ();
	  if ($targetField=='')
	  {
	    $this->array[$row[$pivotFields[0]]][$row[$pivotFields[1]]][]=$row; 
	  }
          else	  
	  {
	    $this->array[$row[$pivotFields[0]]][$row[$pivotFields[1]]][]=$row[$targetField]; 
	  }	  
	}
	return $this->array;
  }  
  
  function setRefAndMap($refKeys = array(),$mapKeys = array()){
      $this->refs = $refKeys;
      $this->maps = $mapKeys;
  }
  
 function process($document){
//     foreach($this->refs as $group){
    foreach($this->refs as $ref){
            if(isset($document[$ref]) && MongoDBRef::isRef($document[$ref])){
                $refArr=MongoDBRef::get($this->db,$document[$ref]);
                if(is_array($refArr) && !empty($refArr)){
                    unset($refArr['_id']);
                    $document = array_merge($document,$refArr);
                    $document[$ref] = $document[$ref]['$id'];
                }
            }
//        }
     }
     foreach ($this->maps as $key => $val){
         if(isset($document[$key])){
             $document[$val]=$document[$key];
             unset($document[$key]);
         }elseif(strpos($key,'.')){
             $keys = explode('.',$key);
             $document[$val]=$document[$keys[0]]->$keys[1];
         }
     }
     
     return $document;
  }

  
  function recup_array_objet()
  {  
    $this->array=array();
	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { $this->array[$i]=mysqli_fetch_object($this->resultat); }
	return $this->array;
  }  
  
  function getObject($refKeys = array(),$mapKeys = array())
  {
     $document = $this->resultat->getNext();
     foreach($refKeys as $ref){
         if(isset($document[$ref]) && MongoDBRef::isRef($document[$ref])){
             $refArr=MongoDBRef::get($this->db,$document[$ref]);
             if(is_array($refArr) && !empty($refArr)){
                 unset($refArr['_id']);
                 $document = array_merge($document,$refArr);
                 $document[$ref] = $document[$ref]['$id'];
             }
         }
     }
     foreach ($mapKeys as $key => $val){
         if(isset($document[$key])){
             $document[$val]=$document[$key];
             unset($document[$key]);
         }
     }
    $this->objet= (object) $document;
    
    if (!$this->objet)
     {  
       echo "Recuperation ligne resultat objet non effectuee <BR>\n";
	   echo mysqli_error($this->connex)."<BR>";
     }
	 return $this->objet;
	
  }

  function addLog($chaine)
  {
    $this->log=false;	
    if (filesize('sql_log.txt')>100000)
    {
      unlink('sql_log.txt');
    }
    $file=fopen('sql_log.txt',"a");
	fwrite($file,date('Y-m-d H:i:s',time()).' => '.mysqli_error($this->connex)." - ".$_SERVER['PHP_SELF']." - (".$chaine.")\n\r");
	fclose($file);
  }
}
?>
