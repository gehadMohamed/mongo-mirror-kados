<?php
class filtres{
	var $liste=array();
	var $nb_filtres;
	var $clause;
	var $path;
	var $pathImg;
	var $return_clause='';
	var $fields_inline;
    var $clearleft=true;
    var $classFilter='';
    var $id;
	
	function filtres($path='./',$pathImg='./',$id=0)
	{
		$this->nb_filtres=0;
		$this->clause='';
		$this->path=$path;
		$this->pathImg=$pathImg;
		$this->fields_inline=0;
		$this->id=$id;
	}
	
	function annuler_filtres()
	{
	  $cles=array_keys($this->liste);
	  for ($i=0;$i<count($cles);$i++)
          {
            if (isset($_SESSION[$cles[$i]]))
            {    
	      unset($_SESSION[$cles[$i]]);
            }
	    if (isset($_SESSION[$cles[$i].'_addin']))
            {    
	      unset($_SESSION[$cles[$i].'_addin']);
            }
          }  
	}
	
	function add_display_function($key,$function_name)
	{
	  $this->liste[$key]['display_function']=$function_name;
    }
	
	function add_result_function($key,$function_name)
	{
	  $this->liste[$key]['result_function']=$function_name;
    }
  
	function add_javascript($key,$javascript_code)
	{
	  $this->liste[$key]['javascript']=$javascript_code;
    }  
	
	function add_field($key,$name,$type,$column)
	{
	  $this->nb_filtres++;
	  $this->liste[$key]['name']=$name;
	  $this->liste[$key]['type']=$type;		
	  $this->liste[$key]['column']=$column;
	  $this->liste[$key]['field']='';
	  $this->liste[$key]['table']='';
	  $this->liste[$key]['id']='';
	  $this->liste[$key]['clause']='';				
	  $this->liste[$key]['javascript']='';	
      $this->liste[$key]['display_function']='';
      $this->liste[$key]['result_function']='';		  
	  $this->liste[$key]['size']=10;
	  $this->liste[$key]['maxsize']=10;		     
	  $this->liste[$key]['display']='input';	
	  $this->liste[$key]['display_items_by_row']=50;	
      $this->liste[$key]['text_no_choice']='';	
      $this->liste[$key]['default_choice']='';	  
      $this->liste[$key]['use_no_choice']=true;	 
	  $this->liste[$key]['compare_mode']='=';	 	  
      if (in_array($type,array('requete_checkboxs','liste_checkboxs')))
	  {
	    $this->liste[$key]['compare_mode']=' IN';
	  }
      $this->liste[$key]['return_clause']='IN';	  
    }
	
	function define_field_list($key,$string_list)
	{
	  $this->liste[$key]['table']=$string_list;
    }

	function takeout_from_return_clause($key)
	{
     $this->liste[$key]['return_clause']='OUT';	  

    }
		
	function define_field_string($key,$string_size,$string_maxsize)
	{
	  $this->liste[$key]['size']=$string_size;
	  $this->liste[$key]['maxsize']=$string_maxsize;		
    }

	function define_field_checkbox($key,$valueWhenChecked)
	{
	  $this->liste[$key]['value_when_checked']=$valueWhenChecked;	
    }	
	
	function define_field_integer($key,$string_size,$string_maxsize)
	{
		$this->liste[$key]['size']=$string_size;
		$this->liste[$key]['maxsize']=$string_maxsize;		
  }

	function define_field_request($key,$field,$table,$id,$clause='')
	{
	  $this->liste[$key]['field']=$field;
	  $this->liste[$key]['table']=$table;
	  $this->liste[$key]['id']=$id;
	  $this->liste[$key]['clause']=$clause;				
    }
 
    function change_field_compare_mode($key,$mode)
	{
	  $this->liste[$key]['compare_mode']=$mode;	
	}
	
	/* Only available for list and request fields */  
    function display_as_line($field,$nb=50)
	{
	  $this->liste[$field]['display']='line';
	  $this->liste[$field]['display_items_by_row']=$nb;
	  // count fields inline (to check if filter button is displayed or not
      $this->fields_inline++;	  
	}

	function add_text_no_choice($field,$text)
	{
	  $this->liste[$field]['text_no_choice']=$text;				
	}

	function set_default_choice_mandatory($field,$default_value)
	{
	  $this->liste[$field]['default_choice']=$default_value;
      $this->liste[$field]['use_no_choice']=false;
	}	
	
	function set_default_choice($field,$default_value)
	{
	  $this->liste[$field]['default_choice']=$default_value;				
	}

	function set_clearleft($value)
	{
	  $this->clearleft=$value;				
	}	

	function set_class($value)
	{
	  $this->classFilter=$value;				
	}	
	
	function is_field_active($field)
	{
	  $answer=false;
	  if (isset($_SESSION[$field]))
	  {
	    $answer=true;
	  }
	  return $answer;
	}

	function get_field_value($field)
	{
	  if ($this->is_field_active($field))
	  {
	    return $_SESSION[$field];
	  }
	  else
	  {
	    return '';
	  }
	}
	
	function initialize_filters()
	{
		$cles=array_keys($this->liste);
		for ($k=0;$k<count($cles);$k++)
		{
		  $key=$cles[$k];
          switch($this->liste[$key]['type'])
	      {
	  	    case 'requete_checkboxs':	  
  		      $cnx=new connexion_db($this->path);
		      $request=new requete("SELECT ".$this->liste[$key]['id']." FROM ".$this->liste[$key]['table']." ".$this->liste[$key]['clause'],$cnx->num);
		      $liste_choix=$request->recup_array_mono();
		      $raz=false;
              for ($j=0;$j<count($liste_choix);$j++)
              {
		        if (isset($_REQUEST[$key.$liste_choix[$j]]))
			    {
			      if (!$raz)
			      { 
			        unset($_SESSION[$key]);
				    $_SESSION[$key]=array();
			        $raz=true;
      			  }	
		          if ($_REQUEST[$key.$liste_choix[$j]]!='')
		          {
 			        $_SESSION[$key]=array_merge($_SESSION[$key],array($_REQUEST[$key.$liste_choix[$j]]));
			      }  
		        }
              }  
		    break;
		
	  	    case 'liste_checkboxs':	 
	          $liste=explode(',',$this->liste[$key]['table']);
		      for ($i=0;$i<count($liste);$i++)
		      {
                $liste_choix[$i]=explode(':',$liste[$i]); 
              } 
		      $raz=false;
              for ($j=0;$j<count($liste_choix);$j++)
              {
  		        if (isset($_REQUEST[$key.$liste_choix[$j][0]]))
  			    {
	  		      if (!$raz)
		  	      { 
			          unset($_SESSION[$key]);
				      $_SESSION[$key]=array();
			          $raz=true;
			      }	
		          if ($_REQUEST[$key.$liste_choix[$j][0]]!='')
		          {
  			        $_SESSION[$key]=array_merge($_SESSION[$key],array($_REQUEST[$key.$liste_choix[$j][0]]));
	  		      }  
		        }
              }  
		    break;		

	  	    case 'checkbox':	 
		      if (isset($_REQUEST[$key]))
			  {
		        $_SESSION[$key]=$_REQUEST[$key];
              }  
			  else if (isset($_REQUEST['filtre_valide']))
			  {
			    unset($_SESSION[$key]);
			  }
		    break;				

                    default:
		      if (isset($_REQUEST[$key]))
		      {
  		        if ($_REQUEST[$key]!='')
  		        {
	  	          $_SESSION[$key]=$_REQUEST[$key];
		          if (isset($_REQUEST[$key.'_addin']))
                          {
	  	            $_SESSION[$key.'_addin']=$_REQUEST[$key.'_addin'];                          
                          }
		        }  
		        elseif(isset($_SESSION[$key]))
		        {
		          unset($_SESSION[$key]);
                          if (isset($_SESSION[$key.'_addin']))
                          {
                            unset($_SESSION[$key.'_addin']);  
                          }
		        }
                      }
                      if ($this->liste[$key]['default_choice']!='' && !isset($_SESSION[$key]))			  
		      {
			$_SESSION[$key]=$this->liste[$key]['default_choice'];
		      }
              } 
      // end of switch   
	    }		
	}	

  function afficher_filtre($cle,$text_no_choice,$url='')
  {
    if ($this->liste[$cle]['text_no_choice']=='')
	{
	  $text_inactive=$text_no_choice;
	}
	else
	{
	  $text_inactive=$this->liste[$cle]['text_no_choice'];
	}
	$liste_choix=array();
    switch($this->liste[$cle]['type'])
	{
	  case 'requete_checkboxs':	  
	  case 'requete':
  		$cnx=new connexion_db($this->path);
		$request=new requete("SELECT ".$this->liste[$cle]['id'].",".$this->liste[$cle]['field']." FROM ".$this->liste[$cle]['table']." ".$this->liste[$cle]['clause'],$cnx->num);
		$request->recup_array();
        if ($this->liste[$cle]['display_function']!='')
        {
          if (function_exists($this->liste[$cle]['display_function']))
          {
            for ($i=0;$i<$request->nb_elt;$i++)
            {
              $liste_choix[$i][0]=$request->array[$i][0];
              $liste_choix[$i][1]=call_user_func($this->liste[$cle]['display_function'],$request->array[$i][1]);
            }  
          }
          else
          {
            $liste_choix=$request->array;
          }
        }
        else
        {
          $liste_choix=$request->array;
        }  		    
	  break;

	  case  'liste_checkboxs':		
	  case  'liste':
 	    $liste=explode(',',$this->liste[$cle]['table']);
		for ($i=0;$i<count($liste);$i++)
		{
		  $liste_choix[$i]=explode(':',$liste[$i]);
          if ($this->liste[$cle]['display_function']!='')
          {
            if (function_exists($this->liste[$cle]['display_function']))
            {
                $liste_choix[$i][1]=call_user_func($this->liste[$cle]['display_function'], $liste_choix[$i][1]);
            }  
          }
		}	
	  break;
	  
	}
		
    switch($this->liste[$cle]['type'])
	{
	  case 'requete':
	  case 'liste':
	    if ($this->liste[$cle]['display']=='input')
		{?>
		    <div class="case_filtre" <?php if (isset($_SESSION[$cle])) { echo 'id="actif"'; } ?>><?php echo $this->liste[$cle]['name'];?>
            <select name="<?php echo $cle;?>" class="filtre_select" id="<?php echo $cle?>" <?php echo $this->liste[$cle]['javascript']?>><?php
			  if ($this->liste[$cle]['use_no_choice'])
			  {?>
                <option value="">** <?php echo $text_inactive;?> **</option> <?php 
			  }	
              for ($j=0;$j<count($liste_choix);$j++)
  		      {?>
                 <option value="<?php echo $liste_choix[$j][0];?>"  <?php if (isset($_SESSION[$cle])) if ($_SESSION[$cle]==$liste_choix[$j][0]) { echo 'id="filtre_selected" selected="selected"'; } ?>><?php echo $liste_choix[$j][1]; ?></option>		 <?php 
              }?>
            </select>
			</div><?php
		}
        else if($this->liste[$cle]['display']=='line')
		{?>
		    <div class="clearleft"></div>
     	     
			<div class="filter_line"><?php
			if ($this->liste[$cle]['name']!='')
			{?>
		      <div class="filter_line_case_title"><?php echo $this->liste[$cle]['name'].' : ';?></div><?php
			}  
		    if ($this->liste[$cle]['use_no_choice'])
			{?>
			  <div class="filter_line_case" <?php if (!isset($_SESSION[$cle])) { echo 'id="actif"';  } ?>>
			    <a href="<?php echo $url.'&'.$cle.'=';?>" ><?php echo $text_inactive; ?></a>
			  </div><?php
			}  
            for ($j=0;$j<count($liste_choix);$j++)
  		    {?>
			    <div class="filter_line_case" <?php if (isset($_SESSION[$cle])) if ($_SESSION[$cle]==$liste_choix[$j][0]) { echo 'id="actif"';  } ?>>
                 <a href="<?php echo $url.'&'.$cle.'='.$liste_choix[$j][0];?>"  ><?php echo $liste_choix[$j][1]; ?></a>
				</div><?php if (fmod($j+1,$this->liste[$cle]['display_items_by_row'])==0) {?><div class="clearleft"></div><?php } 
            }?>
			</div><?php
		}
	  break;

	  case 'liste_checkboxs':		
	  case 'requete_checkboxs':
        for ($j=0;$j<count($liste_choix);$j++)
  	    {?>
		    <div class="case_filtre" <?php if (count($_SESSION[$cle])!=0) { echo 'id="actif"'; } ?>><?php echo $this->liste[$cle]['name'];?>
            <input type="checkbox" name="<?php echo $cle.$liste_choix[$j][0];?>" value="<?php echo $liste_choix[$j][0];?>"  <?php if (count($_SESSION[$cle])!=0) if (in_array($liste_choix[$j][0],$_SESSION[$cle])) { echo 'id="filtre_selected" checked="checked"'; } ?> /><?php echo $liste_choix[$j][1];?> 		 
			</div><?php 
        }
  	  break;

	  case 'checkbox':?>
		    <div class="case_filtre" <?php if (isset($_SESSION[$cle])) { echo 'id="actif"'; } ?>><?php echo $this->liste[$cle]['name'];?>
            <input type="checkbox" name="<?php echo $cle;?>" value="<?php echo $this->liste[$cle]['value_when_checked'];?>"  <?php if (isset($_SESSION[$cle])) { echo 'id="filtre_selected" checked="checked"'; } ?> /> 		 
			</div><?php 
  	  break;
	  
  	  case 'string':
      case 'integer':?>
		  <div class="case_filtre" <?php if (isset($_SESSION[$cle])) { echo 'id="actif"'; } ?>><?php echo $this->liste[$cle]['name'];?>
  		  <input type="text" class="filtre_input" size="<?php echo $this->liste[$cle]['size'];?>"  maxlength="<?php echo $this->liste[$cle]['maxsize'];?>" name="<?php echo $cle;?>" value="<?php if (isset($_SESSION[$cle])) echo $_SESSION[$cle];?>"  <?php if (isset($_SESSION[$cle])) if ($_SESSION[$cle]!='') { echo 'id="filtre_selected" checked="checked"'; } ?> />
		  </div><?php
  	  break;
	  
	  case 'calendar':?>
	     <div class="case_filtre" <?php if (isset($_SESSION[$cle])) { echo 'id="actif"'; } ?>><?php echo $this->liste[$cle]['name'];
               if ($this->liste[$cle]['compare_mode']=='choice')
               {?>
                 <select name="<?php echo $cle;?>_addin">
                       <option value="EGL" <?php if (isset($_SESSION[$cle.'_addin'])) { if ($_SESSION[$cle.'_addin']=='EGL') echo 'selected';}?>>=</option>
                       <option value="SUP" <?php if (isset($_SESSION[$cle.'_addin'])) { if ($_SESSION[$cle.'_addin']=='SUP') echo 'selected';}?>>>=</option>
                       <option value="INF" <?php if (isset($_SESSION[$cle.'_addin'])) { if ($_SESSION[$cle.'_addin']=='INF') echo 'selected';}?>><=</option>
                 </select><?php
               }?>
               <input class="date_form_field" readonly="readonly" name="<?php echo $cle;?>" id="<?php echo $cle;?>" value="<?php if (isset($_SESSION[$cle])) { echo $_SESSION[$cle];}?>" type="text" size="10"/> 
               <img src="<?php echo $this->pathImg;?>/eraser.png"  border="0" id="<?php echo $cle;?>_cancel_date" />
	        <script language="JavaScript">
                 $("#<?php echo $cle;?>").datepicker({
                       dateFormat:"dd/mm/yy"
                  }); 
                 $("#<?php echo $cle;?>_cancel_date").on('click',function(){
                     $.datepicker._clearDate("#<?php echo $cle;?>");
                 });
                 </script>
		 </div><?php
	  break;
	}	
    if (isset($_SESSION[$cle]))
    {
      if ($_SESSION[$cle]!=0)
      {
        $this->clause.=" AND ".$this->liste[$cle]['table'].".".$this->liste[$cle]['id']."=".$_SESSION[$cle]." ";
	  }  
	}  
  }
  
  function afficher($url,$titre_bouton='Filtrer',$text_no_choice='Inactif')
  {
    if (isset($_REQUEST['action_filter']))
	{
	  if ($_REQUEST['action_filter']=='cancel_all')
	  {
	    $this->annuler_filtres();
		$this->clause='';
	  }
	}
    ?>
    <div class="cadre_filtres <?php echo $this->classFilter;?>">
  	<form action="<?php echo $url?>" method="POST" name="form_filtre_special_<?php echo $this->id;?>">
	  <input type="hidden" name="filtre_valide" value="clic">
      <input type="submit" value="" style="display:none"><?php

      $this->initialize_filters(); 
	  $cles=array_keys($this->liste);
	  for ($i=0;$i<count($cles);$i++)
  	  {
        $this->afficher_filtre($cles[$i],$text_no_choice,$url);
        if (isset($_SESSION[$cles[$i]]) && $this->liste[$cles[$i]]['return_clause']=='IN')
        {
	  $resultVar=$_SESSION[$cles[$i]];
          if ($this->liste[$cles[$i]]['result_function']!='')
          {
            if (function_exists($this->liste[$cles[$i]]['result_function']))
            {
                $resultVar=call_user_func($this->liste[$cles[$i]]['result_function'],$_SESSION[$cles[$i]]);
            }
          }			
          switch($this->liste[$cles[$i]]['type'])
	  {
	    case 'string':
              $this->return_clause.=" AND LOCATE(LOWER('".$resultVar."'),LOWER(".$this->liste[$cles[$i]]['column']."))";
	    break;  
			
            case 'calendar':
	      $dates=explode('/',$resultVar);
              $filter_date=$dates[2].'-'.$dates[1].'-'.$dates[0];
              if ($this->liste[$cles[$i]]['compare_mode']=='choice')
              {
                $translateSign['EGL']='=';
                $translateSign['INF']='<=';
                $translateSign['SUP']='>=';
                $this->return_clause.=" AND ".$this->liste[$cles[$i]]['column'].$translateSign[$_SESSION[$cles[$i].'_addin']]."'".$filter_date."'";			 
              }  
              else
              {
                $this->return_clause.=" AND ".$this->liste[$cles[$i]]['column'].$this->liste[$cles[$i]]['compare_mode']."'".$filter_date."'";			
              }  
	    break;
			
	    case 'requete_checkboxs':
	    case 'liste_checkboxs':
	      if (count($resultVar)!=0)
	      {
	        $this->return_clause.=" AND ".$this->liste[$cles[$i]]['column'].$this->liste[$cles[$i]]['compare_mode']." (".implode(',',$resultVar).")";
	      }	
	    break;
						
            default:
              $this->return_clause.=" AND ".$this->liste[$cles[$i]]['column'].$this->liste[$cles[$i]]['compare_mode']."'".$resultVar."'";
          }  
        }  
      }
	  // if all fields are displayed inline, there is no need for the filter button
      if ($this->fields_inline!=$this->nb_filtres)
      {?>	  
        <a href="javascript:document.form_filtre_special_<?php echo $this->id;?>.submit();"><img src="<?php echo $this->path;?>images/filter_on.gif" style="padding-top:2px;padding-right:3px;" border="0"/></a>		
        <a href="<?php echo $url?>&action_filter=cancel_all"><img src="<?php echo $this->path;?>images/filter_off.gif" style="padding-top:2px;padding-right:3px;" border="0"/></a><?php
	  }?>	
  	</form>  
	  </div><?php
	  if ($this->clearleft)
	  {?>
	    <div class="clearleft"></div>  <?php
	  }
  }
  
  function return_sql_filter()
  {
    return $this->return_clause;
  }
  
  function return_sql_filter_direct()
  {
    return ltrim($this->return_clause,' AND');
  }  
  
  
}// fin classe 
?>