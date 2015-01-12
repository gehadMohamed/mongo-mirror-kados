<?php
class railway{
  var $chain=array();
  var $pathImg;
  function railway($pathImg)
  {
    $this->pathImg=$pathImg;
  }
  
  function add($text,$link='',$info='')
  {
    $nb=count($this->chain);
	$this->chain[$nb]['name']=$text;
	$this->chain[$nb]['link']=$link;	
	$this->chain[$nb]['info']=$info;
  }  
  
  function display($class="railway")
  {?>
    <div class="<?php echo $class;?>" ><?php
	  for ($i=0;$i<count($this->chain);$i++)
	  {
	    if ($this->chain[$i]['link']!='')
		{?>
          <a href="<?php echo $this->chain[$i]['link'];?>"><?php echo $this->chain[$i]['name'];?></a> <?php
		}
        else
		{?>
		  <span><?php echo $this->chain[$i]['name'];?></span><?php
		}
	    if ($this->chain[$i]['link']!='')
		{?>
		  <span class="railway_link_info"><?php echo $this->chain[$i]['info'];?></span><?php
		}
		if ($i!=(count($this->chain)-1))
		{?>
		  <img src="<?php echo $this->pathImg;?>" /><?php
		}  
	  }?>
    </div><?php
  }
}