<?php
class page_numbering{
	var $target_file;
	var $path_img;
	var $nb_items;
	var $name;
	var $max_items_by_page;

	function page_numbering($name,$nb_items,$target_file,$path_img,$max_items_by_page,$default_item=0)
	{
	  $this->target_file=$target_file;
	  $this->path_img=$path_img;
	  $this->nb_items=$nb_items;
	  $this->name=$name;
	  $this->max_items_by_page=$max_items_by_page;
	  
      if (isset($_REQUEST[$this->name]))
      {  
        $_SESSION[$this->name]=$_REQUEST[$this->name];
      }

	  if (!isset($_SESSION[$this->name]))
	  {
	    if ($default_item<=$this->nb_items)
	    {
	      $_SESSION[$this->name]=$default_item;
		}
	  }	
	  
      while($this->nb_items<=$_SESSION[$this->name] && $_SESSION[$this->name]>=$max_items_by_page)
	  {
		$_SESSION[$this->name]-=$max_items_by_page;
		if ($_SESSION[$this->name]<0)
		{
		  $_SESSION[$this->name]=0;
		}
	  } 
    }

  
  function display_navigator($text_no_item,$img_rewind='back.gif',$img_previous='arrow_previous.gif',$img_next='arrow_next.gif')
  {?>
    <table class="PageNumbering">
    <tr>
    <td><?php
		 if ($_SESSION[$this->name]>=$this->max_items_by_page)
     {?>
        <a href="<?php echo add_param_url($this->target_file,$this->name.'=0')?>" class="std_link">	      
        <img src="<?php echo $this->path_img.$img_rewind;?>" alt="Back to first page" border="0"/></a> 
        <a href="<?php echo add_param_url($this->target_file,$this->name.'='.($_SESSION[$this->name]-$this->max_items_by_page))?>" class="std_link"><img src="<?php echo $this->path_img.$img_previous;?>" alt="View previous set" border="0"/> </a><?php
     }?> 
     (<?php if ($this->nb_items!=0) {echo ($_SESSION[$this->name]+1)." - ".min($_SESSION[$this->name]+$this->max_items_by_page,$this->nb_items)." / ".$this->nb_items;} else { echo $text_no_item;}?>) 
		  <?php if ($_SESSION[$this->name]<($this->nb_items-$this->max_items_by_page))
		  	    {?>				
		      		<a href="<?php echo add_param_url($this->target_file,$this->name.'='.($_SESSION[$this->name]+$this->max_items_by_page));?>" class="std_link"> <img src="<?php echo $this->path_img.$img_next;?>" alt="View next set" border="0" /></a>
		<?php   }
      ?>	   				
			</td>
    </tr>
    </table>
    <div class="clearright"></div> 	<?php  
  }
  
  function return_sql_limit()
  {
    return (' LIMIT '.$_SESSION[$this->name].','.$this->max_items_by_page);
  }

  function return_sql_limit_swiper()
  {
    if ($this->nb_items-$_SESSION[$this->name]<$this->max_items_by_page)
	{  
	  $start=$this->nb_items-$this->max_items_by_page;
	  $start = $start<0 ? 0: $start;
	  return (' LIMIT '.$start.','.$this->max_items_by_page);
	}
	else
	{
	  $start = $_SESSION[$this->name]<0 ? 0 : $_SESSION[$this->name];
      return (' LIMIT '.$start.','.$this->max_items_by_page);
	}  
  }
  
  /* Swiper display the same number of item by page.*/
  function display_swiper($text_no_item)
  { 
    
    if ($this->nb_items-$_SESSION[$this->name]<$this->max_items_by_page)
	{
      $firstItem=max($this->nb_items-$this->max_items_by_page+1,1);	
	}
	else
	{
	  $firstItem=($_SESSION[$this->name]+1);
	}
  ?>
    <table class="PageNumbering">
    <tr>
    <td><?php
	 if ($firstItem-1>0)
     {?>
        <a href="<?php echo add_param_url($this->target_file,$this->name.'=0')?>" class="std_link">	      
        <img src="<?php echo $this->path_img;?>/back.gif" alt="Back to first page" border="0"/></a> 
        <a href="<?php echo add_param_url($this->target_file,$this->name.'='.max(0,$firstItem-1-$this->max_items_by_page))?>" class="std_link"><img src="<?php echo $this->path_img?>arrow_previous.gif" alt="View previous set" border="0"/> </a><?php
     }?> 
     (<?php if ($this->nb_items!=0) {echo $firstItem." - ".min($_SESSION[$this->name]+$this->max_items_by_page,$this->nb_items)." / ".$this->nb_items;} else { echo $text_no_item;}?>) 
		  <?php if ($_SESSION[$this->name]<($this->nb_items-$this->max_items_by_page))
		  	    {?>				
		      		<a href="<?php echo add_param_url($this->target_file,$this->name.'='.($_SESSION[$this->name]+$this->max_items_by_page));?>" class="std_link"> <img src="<?php echo $this->path_img;?>arrow_next.gif" alt="View next set" border="0" /></a>
		<?php   }
      ?>	   				
			</td>
    </tr>
    </table>
    <div class="clearright"></div> 	<?php  
  }
  
}  