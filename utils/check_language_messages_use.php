<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<link rel="stylesheet" type="text/css" href="../css/global.css" />
</head>
    <body><?php
include '../common_scripts/functions.php';
function analyseLibellesUsage($dir,$car,$start)
{
    $ffs = scandir($dir);
    foreach($ffs as $ff)
    {
      if(!in_array($ff,array('.','..','libraries','messages','images','.svn','fancybox','licence','nbproject','themes','sql','css','conf','classes')))
      {
        if(is_dir($dir.'/'.$ff)) 
        {
          analyseLibellesUsage($dir.'/'.$ff,$car,$start);
        }
        else 
        {
          if ($start!='')
          {
            if (substr($ff,0,strlen($start))!=$start)
            {
              continue;
            }
          }
          //  echo $dir.'/'.$ff.'<br />';
          $handle=fopen('concatFiles.txt','a');
          fwrite($handle,file_get_contents($dir.'/'.$ff));
          fclose($handle);
        }
      }
    }
    
}

function getMessages($dir,$car=';',$start='')
{
    $result=array();
    
    analyseLibellesUsage($dir,$car,$start);
    $fileString=file_get_contents('concatFiles.txt');
    $matches=array();
    if (preg_match_all('((text|button|msg|action|legend)_[a-z_]*('.$car.'| ))',$fileString,$matches))
    {
   /*   echo '<pre>'  ;
      var_dump($matches);
      echo '</pre>'  ;*/
      for ($i=0;$i<count($matches[0]);$i++)
      {
        $string=rtrim($matches[0][$i],$car.' ');
        if (!in_array($string,$result))
        {
          $result[]=$string;
        }
      }
    }    
    unlink('concatFiles.txt');
    return $result;
}

$usages=getMessages('../',';|,|\\.');
$listFR=getMessages('../messages','=','fr_ihm');

sort($usages);
sort($listFR);

for ($i=0;$i<count($listFR);$i++)
{
  if (!in_array($listFR[$i],$usages))
  {
    echo 'Inutilisé FR : '.$listFR[$i].'<br/>';
  }
}
echo '<br /><br />';

?></body></html>