<?php
Class connexion_db
{
	var $host;
    var $user;
	var $password;
	var $num;
	var $nom_db;
	
	// le constructeur cree la connexion physique.
	function connexion_db($path="")
	{
	  require($path."conf/connect.conf");
      $this->host=$PARAM_host;
      $this->user=$PARAM_user;
	  $this->password=$PARAM_password;
	  $this->nom_db=$PARAM_db;
      if (isset($PARAM_charset))
      {
        $this->charset=$PARAM_charset;      	  
      }
      else
      {
	    $this->charset='utf8';
	  }  
      $this->num=mysqli_connect($this->host,$this->user,$this->password);
	  if (!$this->num)
	  {
	    echo "<br>Erreur d ouverture de la base de donnees<br>";
	    echo mysqli_error($this->num)."<BR>\n";
      }
	  else
	  {
      $this->select_db();
      mysqli_query($this->num,"SET NAMES '".$this->charset."'");
      }	  
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

class requete{
  var $objet;
  var $resultat;
  var $nb_elt;
  var $array;
  var $connex;
  var $array_obj;
  var $id_new;
  var $log;
  
  public $keyArray = array(
      'kados_issues' => 'issue_id',
      'kados_tasks'  => 'task_id',
      'kados_template_activities' => 'template_activity_id',
      'kados_user_stories' => 'us_id',
      'kados_actions' => 'action_id',
      'kados_activities' => 'activity_id'
  );
 
  function requete($chaine,$cnx)
  {
    $this->connex=$cnx;
	$this->resultat=mysqli_query($this->connex,$chaine);
    if ($this->resultat)
    {
	    $this->id_new=mysqli_insert_id($this->connex);
	    mysqli_query($this->connex,'COMMIT');
		$this->log=true;
    }
	else
	{
      $this->addLog($chaine);
	}  
  }
 
  function envoi($chaine)
  {
    $this->resultat=mysqli_query($this->connex,$chaine);
    if ($this->resultat)
	{
	  $this->id_new=mysqli_insert_id($this->connex);	 
	  $this->log=true;	  
	  mysqli_query($this->connex,'COMMIT');	
	}  
	else
	{
      $this->addLog($chaine);
	}
    return $this->log;	
  }
  
  function recup_objet()
  {
    $this->objet=mysqli_fetch_object($this->resultat);
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
  
  function recup_row()
  {
    $one_row=mysqli_fetch_row($this->resultat);
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
    $one_row=mysqli_fetch_assoc($this->resultat);
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
    $this->nb_elt=mysqli_num_rows($this->resultat);  
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
  
  function recup_array_objet()
  {  
    $this->array=array();
	$this->calc_nb_elt();
    for($i=0;$i<$this->nb_elt;$i++)
    { $this->array[$i]=mysqli_fetch_object($this->resultat); }
	return $this->array;
  }  
  
  function getObject()
  {
    $this->objet=mysqli_fetch_object($this->resultat);
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
