<?php
class sort_column{
	var $list=array();
	var $target_file;
	var $path_img;
	var $name;
	
	function sort_column($name,$target_file,$path_img)
	{
	  $this->name=$name;
	  $this->target_file=$target_file;
	  $this->path_img=$path_img;
    if (!isset($_SESSION[$name.'_sort_criterion']))
    { 
      $_SESSION[$name.'_sort_criterion']='';
    }
    if (!isset($_SESSION[$name.'_sort_direction']))
    { 
      $_SESSION[$name.'_sort_direction']='';
    }    
 
    if (isset($_REQUEST['sort_direction']))
    {  
      $_SESSION[$name.'_sort_direction']=$_REQUEST['sort_direction'];
    }
  
    if (isset($_REQUEST['sort_criterion']))
    {  
      $_SESSION[$name.'_sort_criterion']=$_REQUEST['sort_criterion'];
    }	  
  }
  
  function display_sort_buttons($column)
  {
    $this->list[]=$column;?>
    <a href="<?php echo add_param_url($this->target_file,'sort_direction=DESC&sort_criterion='.$column);?>"><img src="<?php echo $this->path_img;?>sort<?php if ($_SESSION[$this->name.'_sort_criterion']==$column && $_SESSION[$this->name.'_sort_direction']=='DESC') echo 'ed';?>upicon.gif" alt="Sorted Up" title="Sorted Up" border="0" /></a> 
    <a href="<?php echo add_param_url($this->target_file,'sort_direction=ASC&sort_criterion='.$column);?>"><img src="<?php echo $this->path_img;?>sort<?php if ($_SESSION[$this->name.'_sort_criterion']==$column && $_SESSION[$this->name.'_sort_direction']=='ASC') echo 'ed';?>downicon.gif" alt="Sorted Down" title="Sorted Down" border="0" /></a><?php
  }
  
  function return_sql_order_by()
  {
    $sql_return='';
    if ($_SESSION[$this->name.'_sort_criterion']!='' && $_SESSION[$this->name.'_sort_direction']!='')
    {    
      if (in_array($_SESSION[$this->name.'_sort_criterion'],$this->list))
      {
        $sql_return=' ORDER BY '.$_SESSION[$this->name.'_sort_criterion'].' '.$_SESSION[$this->name.'_sort_direction'];
      }
    }  
    return $sql_return;
  }

  function set_default_column($column,$order='ASC')
  {
    $this->list[]=$column;
	if ($_SESSION[$this->name.'_sort_criterion']=='')
	{
      $_SESSION[$this->name.'_sort_criterion']=$column;
	  $_SESSION[$this->name.'_sort_direction']=$order;
	}  
  }
}  