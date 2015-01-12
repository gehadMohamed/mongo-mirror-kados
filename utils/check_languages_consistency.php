<?php

/**
 * zzzzzzzzzzzzzz
 *
 * @category YYYYYYYYY
 * @package  XXXXXXXXX
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */

include '../common_scripts/functions.php';

function analyseLibellesUsage($dir,$car,$start)
{
    $ffs = scandir($dir);
    foreach($ffs as $ff)
    {
      if(!in_array($ff,array('.','..','index.php')))
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
      /*echo '<pre>'  ;
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


  $listeLangues=array();
  $listeFichiers=array();
  $ffs = scandir('../messages/');
    foreach($ffs as $ff)
    {
      if(!in_array($ff,array('.','..','check_languages_consistency.php','index.php')))
      {
         $data=explode('_',$ff);
         $tag=$data[0];
         if (!in_array($tag,$listeLangues))
         {
            $listeLangues[]=$tag;   
         }
         $reste=$data[1];
         if (!in_array($reste,$listeFichiers))
         {
            $listeFichiers[]=$reste;   
         }         
      }
    }

  $matrice=array();  
  for($j=0;$j<count($listeFichiers);$j++)  
  {
    for ($i=0;$i<count($listeLangues);$i++)  
    {
       $matrice[$listeFichiers[$j]][$listeLangues[$i]]=getMessages('../messages/','=',$listeLangues[$i].'_'.$listeFichiers[$j]);     
    }
  }
  
  $displayAll=false;
  $langueRef='fr';
  for($j=0;$j<count($listeFichiers);$j++)  
  { echo $listeFichiers[$j];?>
    <table border="2">
        <tr><td><?php echo strtoupper($langueRef);?></td><?php
      for ($i=0;$i<count($listeLangues);$i++)  
      {?> <td><?php
        echo $listeLangues[$i];?></td>    <?php
      }?>
        
        </tr>  <?php
    $ref=$matrice[$listeFichiers[$j]][$langueRef];
    for ($k=0;$k<count($ref);$k++)  
    {
      $display=false; 
      $line='<tr><td>'.$ref[$k].'</td>';
      
      for ($i=0;$i<count($listeLangues);$i++)  
      {
        $line.='<td>';
        $lg=$matrice[$listeFichiers[$j]][$listeLangues[$i]];
        if (in_array($ref[$k],$lg))
        {
          $line.='X';
        }
        else
        {
         $display=true;   
        }
        $line.='</td>';
      }
      $line.='</tr>';
      if ($display || $displayAll)
      {
        echo $line;  
      }
    }
    ?>
    </table><br /><br />  <?php
  }  
    
?>
