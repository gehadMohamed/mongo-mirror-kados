<?php
if (!isset($_SESSION['annee']))
{    
if (isset($_SESSION['charset']))
{
  if ($_SESSION['charset']=='latin1')
  {
    $_SESSION['annee']=array('janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre');  
  }
  else
  {
    $_SESSION['annee']=array(utf8_encode('janvier'),utf8_encode('février'),utf8_encode('mars'),utf8_encode('avril'),utf8_encode('mai'),utf8_encode('juin'),utf8_encode('juillet'),utf8_encode('août'),utf8_encode('septembre'),utf8_encode('octobre'),utf8_encode('novembre'),utf8_encode('décembre'));      
  }
}
else
{
   $_SESSION['annee']=array(utf8_encode('janvier'),utf8_encode('février'),utf8_encode('mars'),utf8_encode('avril'),utf8_encode('mai'),utf8_encode('juin'),utf8_encode('juillet'),utf8_encode('août'),utf8_encode('septembre'),utf8_encode('octobre'),utf8_encode('novembre'),utf8_encode('décembre'));      
}  
if ($_SESSION['language']=='en')
{
  $_SESSION['annee']=array('January','February','March','April','May','June','July','August','September','October','November','December');
}
} 

function convert_date($date_tiret)
 {
   $date=explode("-",$date_tiret);
   return $date[2]."/".$date[1]."/".$date[0];
 }

 function convertHourFromHtoPoints($date_h)
 {
   $date=explode("h",$date_h);
   return $date[0].":".$date[1].":00";
 }
 
 function convertDateSlashToDash($date_slash)
 {
   $date=explode("/",$date_slash);
   return $date[2]."-".mois_texte($date[1])."-".mois_texte($date[0]);
 }
 
  function format_heure($heure)
  {
   	$chaine=substr($heure,0,2)."h".substr($heure,3,2);
  	return $chaine;
  }

  function format_date_mois_an($mois,$an)
  {
    return $_SESSION['annee'][$mois-1]." ".$an;
  }  

  function mois_texte($mois)
  {
    $mois=(int)ltrim($mois,'0');
    if ($mois<10)
	  return "0".$mois;
	else
	  return $mois;
  }    
  
  function zeroFirstIfLessThanTen($number)
  {
    $number=ltrim($number,'0');
    if ($number<10)
	{
	  return '0'.$number;
	}  
	else
	{
	  return $number;
	}  
  }      
  
  function format_date($date)
  {
	if ($date!="0000-00-00")
	{
      if ($_SESSION['language']=="fr")
	  {
	    if (substr($date,8,2)<10)
	      $chaine=substr($date,9,1)." ".$_SESSION['annee'][(integer)substr($date,5,2)-1]." ".substr($date,0,4);
	    else
  	      $chaine=substr($date,8,2)." ".$_SESSION['annee'][(integer)substr($date,5,2)-1]." ".substr($date,0,4);
	  }
	  else	  
 	    if (substr($date,8,2)<10)
		{
		  $plus="<sup>th</sup>";
		  if (substr($date,9,1)=="1")
		    $plus="<sup>st</sup>";
		  if (substr($date,9,1)=="2")
		    $plus="<sup>nd</sup>";			
		  if (substr($date,9,1)=="3")
		    $plus="<sup>rd</sup>";			
	      $chaine=$_SESSION['annee'][(integer)substr($date,5,2)-1]." ".substr($date,9,1).$plus." ".substr($date,0,4);
		}  
	    elseif (substr($date,8,2)>20)
		{
		  $plus="<sup>th</sup>";
		  if (substr($date,9,1)=="1")
		    $plus="<sup>st</sup>";
		  if (substr($date,9,1)=="2")
		    $plus="<sup>nd</sup>";			
		  if (substr($date,9,1)=="3")
		    $plus="<sup>rd</sup>";			
	      $chaine=$_SESSION['annee'][(integer)substr($date,5,2)-1]." ".substr($date,8,2).$plus." ".substr($date,0,4);
		}
		else
		  $chaine=$_SESSION['annee'][(integer)substr($date,5,2)-1]." ".substr($date,8,2)."<sup>th</sup> ".substr($date,0,4);

	}	
	else
	{
	  if ($_SESSION['language']=='en')
	  {
	    $chaine='No date';	
	  }
	  else if (isset($_SESSION['charset']))
	  {
        if ($_SESSION['charset']=='latin1')
        {
	      $chaine='Date non définie';	
	    }
	    else
	    {
	      $chaine=utf8_encode('Date non définie');	
	    }
	  } 
	  else
	  {
	    $chaine=utf8_encode('Date non définie');	
	  }
	}	
	return $chaine;
  }  

  function dateFromDatetime($datetime)
  {
    $onlyDate=substr($datetime,0,10);
	return $onlyDate;
  }
  
  function timeFromDatetime($datetime)
  {
    $onlyTime=substr($datetime,11);
	return $onlyTime;
  }

  function formatDateHour($date)
  {
    echo format_date(dateFromDatetime($date)).' '.format_heure(timeFromDatetime($date));
  }
  
  function format_date_pdf($date)
  {
	if ($date!='0000-00-00')
	{
      if ($_SESSION['language']=='fr')
	  {
	    if (substr($date,8,2)<10)
	      $chaine=substr($date,9,1).' '.$_SESSION['annee'][(integer)substr($date,5,2)-1].' '.substr($date,0,4);
	    else
  	      $chaine=substr($date,8,2).' '.$_SESSION['annee'][(integer)substr($date,5,2)-1].' '.substr($date,0,4);
	  }
	  else	  
 	    if (substr($date,8,2)<10)
		{
		  $plus='th';
		  if (substr($date,9,1)=='1')
		    $plus='st';
		  if (substr($date,9,1)=='2')
		    $plus='nd';			
		  if (substr($date,9,1)=='3')
		    $plus='rd';			
	      $chaine=$_SESSION['annee'][(integer)substr($date,5,2)-1].' '.substr($date,9,1).$plus.' '.substr($date,0,4);
		}  
	    elseif (substr($date,8,2)>20)
		{
		  $plus='th';
		  if (substr($date,9,1)=='1')
		    $plus='st';
		  if (substr($date,9,1)=='2')
		    $plus='nd';			
		  if (substr($date,9,1)=='3')
		    $plus='rd';			
	      $chaine=$_SESSION['annee'][(integer)substr($date,5,2)-1].' '.substr($date,8,2).$plus.' '.substr($date,0,4);
		}
		else
		  $chaine=$_SESSION['annee'][(integer)substr($date,5,2)-1].' '.substr($date,8,2).'th '.substr($date,0,4);

	}	
	else
	{
	  if ($_SESSION['language']=='en')
	  {
	    $chaine='No date';	
	  }
	  else if (isset($_SESSION['charset']))
	  {
        if ($_SESSION['charset']=='latin1')
        {
	      $chaine='Date non définie';	
	    }
	    else
	    {
	      $chaine=utf8_encode('Date non définie');	
	    }
	  } 
	  else
	  {
	    $chaine=utf8_encode('Date non définie');	
	  }	
	}  
	return $chaine;
  }  

  
  function format_date_slash($date)
  {
    $chaine=substr($date,8,2)."/".substr($date,5,2)."/".substr($date,2,2);
	return $chaine;
  }    
  
  
  function format_date2(&$date)
  {
  	$date=substr($date,8,2)." ".$_SESSION['annee'][(integer)substr($date,5,2)-1]." ".substr($date,0,4);
  }    
  
function aujourdhui($ecart=0)
{
  $datej=date("j",time()+$ecart*3600*24);
  $datem=date("m",time()+$ecart*3600*24);
  $datea=date("y",time()+$ecart*3600*24);
  if ($datej<10)
  {
    $datej="0".$datej;
  }	
  $datej="20".$datea."-".$datem."-".$datej;
  return $datej;
}

function heure()
{
  $dateh=date("H",time());
  $datem=date("i",time());
  $heure_loc=$dateh."h".$datem;
  return $heure_loc;
}

function heure_brute($decalage=0)
{
  $dateh=date("H",time()+$decalage);
  $datem=date("i",time()+$decalage);
  $dates=date("s",time()+$decalage);
  $heure_loc=$dateh.":".$datem.":".$dates;
  return $heure_loc;
}

function ecart_date($date)
  {
    $today=floor(time()/(86400));
	$date_j=ceil(mktime(0,0,0,substr($date,5,2),substr($date,8,2),substr($date,0,4))/86400);
	return $today-$date_j;
  }  
  
function temps_secondes($heure,$date="")
{
  $elt_heure=explode(":",$heure);
  if ($date!="")
    $elt_date=explode("-",$date);
  else
    $elt_date=array(0,0,0);
	
  return mktime($elt_heure[0],$elt_heure[1],$elt_heure[2],$elt_date[1],$elt_date[2],$elt_date[0]);
}
  
  
function diff_date($date1,$date2)
{
  $ecart=abs(mktime(0,0,0,substr($date1,5,2),substr($date1,8,2),substr($date1,0,4))-mktime(0,0,0,substr($date2,5,2),substr($date2,8,2),substr($date2,0,4)));
  return round($ecart/86400,0);
}

function decale_date($date,$nb_jour)
{
  return date("Y-m-d",mktime(0,0,0,substr($date,5,2),substr($date,8,2),substr($date,0,4))+$nb_jour*86400);
}   

function day_of_week($date)
{
  echo JDDayOfWeek(gregoriantojd(substr($date,5,2),substr($date,8,2),substr($date,0,4)));
}

function dayOfWeek($date)
{
  return JDDayOfWeek(gregoriantojd(substr($date,5,2),substr($date,8,2),substr($date,0,4)));
}

function format_month($nb)
{
  return $_SESSION['annee'][(int)$nb-1];
}
  
  function my_date_diff($date1, $date2) 
  {
    $current = $date1;
    $datetime2 = date_create($date2);
    $count = 0;
    while(date_create($current) < $datetime2){
        $current = gmdate("Y-m-d", strtotime("+1 day", strtotime($current)));
        $count++;
    }
    return $count;
  }  
  
 
function getMonth($date)
{
  return substr($date,5,2);
} 

function getYear($date)
{
  return substr($date,0,4);
}?>