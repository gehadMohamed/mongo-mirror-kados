<?php
class myDateTime extends DateTime
{
  function endOfMonth()
  {
    $date=new DateTime();
    $date->setDate($this->format('Y'),$this->format('m')+1,1);
    if (class_exists('DateInterval'))
	{	
	  $date->sub(new DateInterval('P1D'));
	}
    else
	{
	  $date->modify('-1 day');
	}
	return $date;
  }
  
  function startOfMonth()
  {
    $date=new DateTime();
    $date->setDate($this->format('Y'),$this->format('m'),1);
	return $date;
  }

  function shiftToEndOfMonth()
  {
    $this->setDate($this->format('Y'),$this->format('m')+1,1);
    if (class_exists('DateInterval'))
	{	
	  $this->sub(new DateInterval('P1D'));
	}
    else
	{
	  $this->modify('-1 day');
	}
  }
  
  function shiftToEndOfYear()
  {
    $this->setDate($this->format('Y'),12,31);
  }
  
  function shiftToStartOfMonth()
  {
    $this->setDate($this->format('Y'),$this->format('m'),1);
  }
  
  function getDiff($date)
  {
    $count=0;
	if ($this<$date)
	{
	  $dateTmp=new DateTime($this->format('Y-m-d'));
      while ($dateTmp<$date)
	  {
	    $count++;
	    $dateTmp->add(new DateInterval('P1D'));
	  }
	}
	else if ($dateTmp>$date)
	{
	  $dateTmp=new DateTime($date->format('Y-m-d'));
      while ($dateTmp<$this)
	  {
  	    $count++;
	    $dateTmp->add(new DateInterval('P1D'));
	  }
	}  
	unset($dateTmp);
	return $count;
  }
}