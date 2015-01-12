<?php
  class mt_ldap
  {
    var $ldap_cnx;
	var $base_dn;
    var $justthese;
    var $all_infos;
	var $uid_field;
	var $entry;
    
    function mt_ldap($server,$port,$base_dn,$uid_field,$attributes,$all_attributes)
	{
	  $this->ldap_cnx=ldap_connect($server,$port);
	  $this->cache=array();
	  $this->base_dn=$base_dn;
	  $this->justthese=$attributes;
	  $this->all_infos=$all_attributes;
	  $this->uid_field=$uid_field;
	  
      ldap_set_option($this->ldap_cnx, LDAP_OPT_PROTOCOL_VERSION, 3);
      ldap_set_option($this->ldap_cnx, LDAP_OPT_REFERRALS, 0);	  
    }

	function name($userId)
	{
	  $userId=strtolower($userId);
	  if (!in_array($userId,$this->cache))
	  {		
   	    $filter="(|(".$this->uid_field."=".$userId."))";
        $results=ldap_search($this->ldap_cnx,$this->base_dn,$filter,$this->justthese);	
        $infos=ldap_get_entries($this->ldap_cnx, $results);
		if ($infos['count'])
		  $this->cache[$userId]=$infos[0]['givenname'][0]." ".strtoupper($infos[0]['sn'][0]);	
		else
		  $this->cache[$userId]="User unknown";  
	  }	
	  return $this->cache[$userId];
	}

    function uid_valid($userId)
	{
	  $userId=strtolower($userId);	
   	  $filter="(|(".$this->uid_field."=".$userId."))";
      $results=ldap_search($this->ldap_cnx,$this->base_dn,$filter,$this->justthese);	
      $infos=ldap_get_entries($this->ldap_cnx, $results);
	  return $infos['count'];
	}

    function get_data($userId)
	{
	  $userId=strtolower($userId);	
   	  $filter="(|(".$this->uid_field."=".$userId."))";
      $results=ldap_search($this->ldap_cnx,$this->base_dn,$filter,$this->justthese);	
      $infos=ldap_get_entries($this->ldap_cnx, $results);
	  $user->nom=$infos[0]['givenname'][0]." ".strtoupper($infos[0]['sn'][0]);	  
	  if (isset($infos[0]['mail'][0]))
 	  {  $user->courriel=$infos[0]['mail'][0]; }
	  else
      {  $user->courriel="no_mail"; }
	  return $user;
	}
	
    function get_all_data($userId)
	{
	  $userId=strtolower($userId);	
   	  $filter="(&(objectclass=inetorgperson)(".$this->uid_field."=".$userId."))";
      $results=ldap_search($this->ldap_cnx,$this->base_dn,$filter,$this->justthese);	
      $infos=ldap_get_entries($this->ldap_cnx, $results);
	  $user->firstname=$infos[0]['givenname'][0];
	  $user->lastname=strtoupper($infos[0]['sn'][0]);	  
	  if (isset($infos[0]['mail'][0]))
 	  {  $user->mail=$infos[0]['mail'][0]; }
	  else
      {  $user->mail="no_mail"; }
	  return $user;
	}	

	function search_name_count_hits($nom,$prenom)
	{
	  // if firstname is used, filter has to be adapted
	  if ($prenom!="")
	  {
   	    $filter="(&(sn=*".$nom."*)(givenname=*".$prenom."*))";
	  }	
	  else
	  {
   	    $filter="(|(sn=*".$nom."*))";	  
	  }
      $results=ldap_search($this->ldap_cnx,$this->base_dn,$filter,$this->justthese);	
	  return ldap_count_entries($this->ldap_cnx, $results);
    }	  
	
	function search_name($nom,$prenom,&$nb_total,$depart=0,$nb=10)
	{
	  // if firstname is used, filter has to be adapted
	  if ($prenom!="")
	  {
   	    $filter="(&(sn=*".$nom."*)(givenname=*".$prenom."*))";
	  }	
	  else
	  {
   	    $filter="(|(sn=*".$nom."*))";	  
	  }
      $results=ldap_search($this->ldap_cnx,$this->base_dn,$filter,$this->justthese);	
	  $nb_total=ldap_count_entries($this->ldap_cnx, $results);
      $infos=ldap_get_entries($this->ldap_cnx, $results);
      $nb_resultats=min($depart+$nb,$infos['count']);
	  $cpt=0;
	  $tablo=array();
	  for ($i=$depart;$i<$nb_resultats;$i++)
	  {
	    $tablo[$cpt][$this->uid_field]=$infos[$i][$this->uid_field][0];
  	    $tablo[$cpt]['nom']=$infos[$i]['givenname'][0]." ".strtoupper($infos[$i]['sn'][0]);	
		$user=$this->get_data($tablo[$cpt][$this->uid_field]);
 	    $tablo[$cpt++]['mail']=$user->courriel;
	  }
	  return $tablo;
	}	
	
	function authenticate($userId,$pass)
	{
	  $userId=strtolower($userId);
	  if ($userId!="" && $pass!="")
	  {
	    $filter="(|(".$this->uid_field."=".$userId."))";
        $results=ldap_search($this->ldap_cnx,$this->base_dn,$filter,$this->justthese);	
        $infos=ldap_get_entries($this->ldap_cnx, $results);
        if ($infos['count']!=0)
	    {
          $entry=ldap_first_entry($this->ldap_cnx,$results);
          $bind = @ldap_bind($this->ldap_cnx, ldap_get_dn($this->ldap_cnx,$entry), $pass);
          if ($bind === false)
		    return false; 
		  else 
		    return true;
        }
		else
		  return false;
	  }
	  else
	    return false;
	}
	
	function mt_ldap_close()
	{
	  ldap_close($this->ldap_cnx);	
	}
  }
?>