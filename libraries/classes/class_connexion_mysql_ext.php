<?php
class connexion_mysql
{
	var $host;
    var $user;
	var $password;
	var $num;
	var $nom_db;
	
	// set variables
	function connexion_mysql($PARAM_host,$PARAM_user,$PARAM_password,$PARAM_db,$PARAM_charset='utf8')
	{
      $this->host=$PARAM_host;
      $this->user=$PARAM_user;
	  $this->password=$PARAM_password;
	  $this->nom_db=$PARAM_db;
      $this->charset=$PARAM_charset;      	  
	}

    function createConnection()	
	{  
	  $this->num=mysqli_connect($this->host,$this->user,$this->password);
	  if (!$this->num)
	  {
	    return 'KO:connect';
      }
	  else
	  {
        if ($this->selectDatabase())
		{
          mysqli_query($this->num,"SET NAMES '".$this->charset."'");
		  return 'OK:connected';
		}
        return 'KO:database';		
      }	  
	}
	
	function selectDatabase($chgt=false,$nlle_base="")
	{
	  if ($chgt)
	  {
	    $this->nom_db=$nlle_base;
	  }	
	  $cr_select_db=mysqli_select_db($this->num,$this->nom_db);
      if (!$cr_select_db)
      {
        return false;
      }
	  return true;
	}  	
		
	function close()
	{ 
	  mysqli_close($this->num); 
	}
};//fin def classe connexion_mysql
