<?php
class workflow{
	var $wf_id;
    var $table_objets;
    var $identifiant_objets;
	var $identifiant_statut_objet;
	var $etat_initial;
	var $tag;
	var $nom;
	var $table_workflows;
	var $table_status_list;
	var $table_transitions;
	var $language;
	var $path_conf;	
	var $profile_table='';
	var $profile_id_field;
	var $profile_id_value;
	var $favorite_profile=0;
	var $has_exclusive_status=false;
	
	function workflow($type,$table_workflows,$table_status_list,$table_transitions,$language='fr',$path='')
	{
	    $this->table_workflows=$table_workflows;
		$this->table_transitions=$table_transitions;
		$this->table_status_list=$table_status_list;
		$this->path_conf=$path;
		$cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
		$request=new requete("SELECT wf_id,workflow_translation_value AS wf_name,wf_objects_table,wf_initial_status_id,wf_object_id_field,wf_object_status_id_field,wf_favorite_profile_id_fk FROM ".$this->table_workflows.",".$this->table_workflows."_translations WHERE workflow_translation_language='".$language."' AND wf_id=workflow_id_fk AND wf_tag='".$type."'",$cnx->num);
		$wk=$request->recup_objet();
		$this->wf_id=$wk->wf_id;
		$this->table_objets=$wk->wf_objects_table;
		$this->etat_initial=$wk->wf_initial_status_id;
		$this->nom=$wk->wf_name;						
		$this->tag=$type;
        $this->identifiant_objets=$wk->wf_object_id_field;
		$this->identifiant_statut_objet=$wk->wf_object_status_id_field;
		$this->language=$language;
		$this->favorite_profile=$wk->wf_favorite_profile_id_fk;
		$request->envoi('SELECT status_id FROM '.$this->table_status_list." WHERE status_target_object='".$type."' AND status_exclusive_data!='NONE'");
		$request->calc_nb_elt();
        $this->has_exclusive_status=$request->nb_elt;
	}
	
	function set_profile($profiles_table,$profile_id_field,$profile_value)
	{
	  $this->profile_table=$profiles_table;
	  $this->profile_id_field=$profile_id_field;
	  $this->profile_value=$profile_value;
	}
	
	function setFavoriteProfile($profiles_table,$profile_id_field)
	{
	  $this->set_profile($profiles_table,$profile_id_field,$this->favorite_profile);
	}
	
	function is_final_status($status)
	{
		$cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
		$request=new requete("SELECT transition_final_status FROM ".$this->table_transitions." WHERE ".$this->table_transitions.".transition_wf_id_fk=".$this->wf_id." AND transition_initial_status=".$status,$cnx->num);
		$request->calc_nb_elt();
		if ($request->nb_elt!=0)
		{  return false;}
		else
		{  return true;  }
	}
	
	function fin_wf($objet_id)
    {
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
	  $request=new requete("SELECT ".$this->identifiant_statut_objet." AS status_id FROM ".$this->table_objets." WHERE ".$this->identifiant_objets."='".$objet_id."'",$cnx->num);
	  $objet=$request->recup_objet();
	  return $this->is_final_status($objet->status_id);
	}	
	
	function etats_suivants($objet_id)
	{
		$cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
		$request=new requete("SELECT ".$this->identifiant_statut_objet." AS status_id FROM ".$this->table_objets." WHERE ".$this->identifiant_objets."='".$objet_id."'",$cnx->num);
		$objet=$request->recup_objet();

		$request->envoi("SELECT status_id,status_translation_value FROM ".$this->table_status_list.",".$this->table_status_list."_translations WHERE status_id_fk=status_id AND status_translation_language='".$this->language."' AND status_id=".$objet->status_id);				 
		$request->recup_objet();
		$liste=$objet->status_id.":".$request->objet->status_translation_value.":def,";

        $sqlTransitions="SELECT status_id,status_translation_value FROM ".$this->table_status_list.",".$this->table_status_list."_translations,".$this->table_transitions." WHERE status_id_fk=status_id AND status_translation_language='".$this->language."' AND transition_final_status=".$this->table_status_list.".status_id AND transition_initial_status=".$objet->status_id." AND transition_wf_id_fk=".$this->wf_id; 				
        if ($this->profile_table!='')
		{
		  $sqlTransitions="SELECT status_id,status_translation_value FROM ".$this->table_status_list.",".$this->table_status_list."_translations,".$this->table_transitions.",".$this->profile_table." WHERE ".$this->profile_id_field."=".$this->profile_value." AND status_id_fk=status_id AND status_translation_language='".$this->language."' AND transition_id_fk=transition_id AND transition_final_status=".$this->table_status_list.".status_id AND transition_initial_status=".$objet->status_id." AND transition_wf_id_fk=".$this->wf_id; 		
		}
        
		$request->envoi($sqlTransitions);
		$liste_etats=$request->recup_array_champ();
		
		for ($i=0;$i<count($liste_etats);$i++)
		{
			$liste.=$liste_etats[$i]['status_id'].":".$liste_etats[$i]['status_translation_value'].",";
		}

		return trim($liste,",");
	}
	
	function etats_suivants_tablo($objet_id,$with_current_status=false)
	{
		$cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
	 
        $request=new requete("SELECT ".$this->identifiant_statut_objet." AS status_id FROM ".$this->table_objets." WHERE ".$this->identifiant_objets."='".$objet_id."'",$cnx->num);
		$objet=$request->recup_objet();

		$sqlTransitions="SELECT status_id,status_translation_value AS status_value,status_icon FROM ".$this->table_status_list.",".$this->table_status_list."_translations,".$this->table_transitions." WHERE status_id_fk=status_id AND status_translation_language='".$this->language."' AND transition_final_status=".$this->table_status_list.".status_id AND transition_initial_status=".$objet->status_id." AND transition_wf_id_fk=".$this->wf_id;
		if ($this->profile_table!='')
		{
		  $sqlTransitions="SELECT status_id,status_translation_value AS status_value,status_icon FROM ".$this->table_status_list.",".$this->table_status_list."_translations,".$this->table_transitions.",".$this->profile_table." WHERE ".$this->profile_id_field."=".$this->profile_value." AND status_id_fk=status_id AND status_translation_language='".$this->language."' AND transition_id_fk=transition_id AND transition_final_status=".$this->table_status_list.".status_id AND transition_initial_status=".$objet->status_id." AND transition_wf_id_fk=".$this->wf_id;		
		}
	    $request->envoi($sqlTransitions);
		$liste_etats=$request->recup_array_champ();
		
		if ($with_current_status)
		{
		  $request->envoi("SELECT status_id,status_translation_value,status_icon FROM ".$this->table_status_list.",".$this->table_status_list."_translations WHERE status_id_fk=status_id AND status_translation_language='".$this->language."' AND status_id=".$objet->status_id);				 
		  $request->recup_objet();
		  $actuel['status_id']=$objet->status_id;
		  $actuel['status_value']=$request->objet->status_translation_value;
		  $actuel['status_icon']=$request->objet->status_icon;
		  array_unshift($liste_etats,$actuel);
		}
		
		return ($liste_etats);
	}	

	function statut_objet($objet_id)
    {
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
	  $request=new requete("SELECT ".$this->identifiant_statut_objet." AS status_id FROM ".$this->table_objets." WHERE ".$this->identifiant_objets."='".$objet_id."'",$cnx->num);
	  $objet=$request->recup_objet();
	  return $objet->status_id;
	}	
	
	function valeur_etat($etat_id)
	{
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
	  $request=new requete("SELECT status_translation_value FROM ".$this->table_status_list.",".$this->table_status_list."_translations WHERE status_id_fk=status_id AND status_translation_language='".$this->language."' AND status_id=".$etat_id,$cnx->num);				 
	  $request->recup_objet();
      return $request->objet->status_translation_value;
	}
	
	function label_etat($etat_id)
	{
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
	  $request=new requete("SELECT status_tag FROM ".$this->table_status_list." WHERE status_id=".$etat_id,$cnx->num);				 
	  $request->recup_objet();
      return $request->objet->status_tag;
	}
	
	function cmp_etat_label($etat_id,$label)
	{
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);	
	  $request=new requete("SELECT status_tag FROM ".$this->table_status_list." WHERE status_id=".$etat_id,$cnx->num);				 
	  $request->recup_objet();
	  if ($request->objet->status_tag==$label)
	  {
        return true;
      }
      else
      {
        return false;
      }
	}
	
	function valeur_etat_from_label($etat_label)
	{
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
	  $request=new requete("SELECT status_translation_value FROM ".$this->table_status_list.",".$this->table_status_list."_translations WHERE status_id_fk=status_id AND status_translation_language='".$this->language."' AND status_tag='".$etat_label."'",$cnx->num);				 
	  $request->recup_objet();
      return $request->objet->status_translation_value;
	}	
	
	function id_etat_from_label($etat_label)
	{
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
	  $request=new requete("SELECT status_id FROM ".$this->table_status_list." WHERE status_tag='".$etat_label."'",$cnx->num);				 
	  $request->recup_objet();
      return $request->objet->status_id;
	}		
	
    function init_statut()	
    {
	  return $this->etat_initial;
	}
	
 /*   function historique($objet_id)
    {
	  $cnx=new connexion_db();
	  $request=new requete("SELECT * FROM objets_historiques WHERE objet_tag='".$this->tag."' AND objet_id=".$objet_id." ORDER BY date_histo DESC,heure_histo DESC",$cnx->num);				 
	  $liste_chgts=$request->recup_array_champ();
	  $histo="";
	  for ($i=0;$i<count($liste_chgts);$i++)
	  {
  		$histo.=format_date($liste_chgts[$i]['date_histo'])." - ".format_heure($liste_chgts[$i]['heure_histo'])." : ".$this->valeur_etat($liste_chgts[$i]['etat_init'])." >> ".$this->valeur_etat($liste_chgts[$i]['etat_fin'])." par ".$arca->nom($liste_chgts[$i]['auteur'])." (".$liste_chgts[$i]['commentaire'].")\n";
	  }	
	return $histo;
    }
	
	function historise($objet_id,$ancien_etat,$comment)
	{
	  $cnx=new connexion_db();
      $request=new requete("INSERT INTO objets_historiques (etat_init,etat_fin,objet_id,objet_tag,date_histo,heure_histo,auteur,commentaire) VALUES (".$ancien_etat.",".$this->statut_objet($objet_id).",".$objet_id.",'".$this->tag."','".aujourdhui()."','".heure_brute()."','".$_SESSION['ipn']."','".addslashes($comment)."')",$cnx->num);
	}
*/
	function liste_etats_pour_filtre()
	{
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
      $request=new requete("SELECT status_id,status_translation_value FROM ".$this->table_status_list.",".$this->table_status_list."_translations WHERE status_target_object='".$this->tag."' AND status_id_fk=status_id AND status_translation_language='".$this->language."' GROUP BY ".$this->table_status_list.".status_id ORDER BY status_order",$cnx->num);
	  $liste_etats=$request->recup_array_champ();
	  $liste="";
	  for ($i=0;$i<count($liste_etats);$i++)
	  {
		$liste.=$liste_etats[$i]['status_id'].":".$liste_etats[$i]['status_translation_value'].",";
	  }
	  return trim($liste,",");
	}
	
	function get_status_actions()
	{
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
      $request=new requete("SELECT status_id,status_delete_available,status_update_available FROM ".$this->table_status_list." WHERE status_target_object='".$this->tag."'",$cnx->num);
	  $liste_etats=$request->recup_array_champ();
	  $tablo=array();
	  for ($i=0;$i<count($liste_etats);$i++)
	  {
		$tablo[$liste_etats[$i]['status_id']]=$liste_etats[$i];
	  }
	  return $tablo;
	}
	
	function change_object_status($object_id,$statut_id)
	{
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
	  // if status has an exclusive aspect
	  if ($this->has_exclusive_status)
	  {
	    // If target status is a MONO status, the object having the MONO status must be set to NEXT status
		if ($this->getStatusExclusiveValue($statut_id)=='MONO')
		{
		  $request=new requete("UPDATE ".$this->table_objets." SET ".$this->identifiant_statut_objet."=".$this->getStatusIdFromExclusiveValue('NEXT')." WHERE ".$this->identifiant_statut_objet."=".$this->getStatusIdFromExclusiveValue('MONO'),$cnx->num);
                  $table_objets = $this->table_objets;
                  $mcnx->num->$table_objets->update(array($this->identifiant_statut_objet=>$this->getStatusIdFromExclusiveValue('MONO')),array('$set'=>array($this->identifiant_statut_objet=>$this->getStatusIdFromExclusiveValue('NEXT'))),array('multiple' => true));
		}
	  }
	  $request=new requete("UPDATE ".$this->table_objets." SET ".$this->identifiant_statut_objet."=".$statut_id." WHERE ".$this->identifiant_objets."='".$object_id."'",$cnx->num);
          $table_objets = $this->table_objets;
          $mcnx->num->$table_objets->update(array($this->identifiant_objets=>$object_id),array('$set'=>array($this->identifiant_statut_objet=>$statut_id)),array('multiple' => true));
    }
	
	function display_status_buttons($objetId,$targetFile,$param,$msgChangeStatus,$buttonText)
	{
	  $statusList=$this->etats_suivants_tablo($objetId);
	  for ($i=0;$i<count($statusList);$i++)
	  {?>
	     <a href="<?php echo $targetFile.$param.$statusList[$i]['status_id'];?>" class="button" onclick="return confirm('<?php echo $msgChangeStatus.' '.$statusList[$i]['status_value'].' ?';?>');"><?php echo $buttonText.' : '.$statusList[$i]['status_value'];?></a><?php
	  } 
	}
	
	function getFavoriteProfile()
	{
	  return $this->favorite_profile; 
	}
	
	function getStatusExclusiveValue($statusId)
	{
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
	  $request=new requete("SELECT status_exclusive_data FROM ".$this->table_status_list." WHERE status_id=".$statusId,$cnx->num);
	  $request->calc_nb_elt();
	  $returnData=0;
	  if ($request->nb_elt!=0)
	  {
	    $request->recup_objet();
	    $returnData=$request->objet->status_exclusive_data;
	  }	
	  return $returnData;
	}
	
	function getStatusIdFromExclusiveValue($value)
	{
	  $cnx=new connexion_db($this->path_conf);     $mcnx=new mconnexion_db($this->path_conf);
	  $request=new requete("SELECT status_id FROM ".$this->table_status_list." WHERE status_exclusive_data='".$value."' AND status_target_object='".$this->tag."'",$cnx->num);
	  $request->calc_nb_elt();
	  $returnData=0;
	  if ($request->nb_elt!=0)
	  {
	    $request->recup_objet();
	    $returnData=$request->objet->status_id;
	  }	
	  return $returnData;
    }	  
}
?>