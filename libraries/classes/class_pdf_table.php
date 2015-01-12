<?php
class PDF extends FPDF
{
//Chargement des données
function LoadData($texte_sql)
{
    //Lecture des lignes du fichier
  $cnx=new connexion_db();
  $request= new requete($texte_sql,$cnx->num);
  $request->recup_array();
  $cnx->close();	

  return $request->array;
}

//Tableau simple
function BasicTable($header,$data)
{
    //En-tête
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    //Données
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

//Tableau amélioré
function ImprovedTable($header,$data,$w)
{
    //En-tête
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    //Données
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2],0,',',' '),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3],0,',',' '),'LR',0,'R');
        $this->Ln();
    }
    //Trait de terminaison
    $this->Cell(array_sum($w),0,'','T');
}

//Tableau coloré
function creer_listing($header,$data,$header_w="",$colonne_a_colorier="",$mode='C',$alternColor=true)
{
    //Couleurs, épaisseur du trait et police grasse
	$this->SetFillColor(255);
	if ($alternColor)
	{
      $this->SetFillColor(240);
	}  
    $this->SetTextColor(0);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
	
    //En-tête
	if ($header_w!="")
	{
	  $w=$header_w;
	}
	else
	{
	  for($i=0;$i<count($header);$i++)
	  {
	    $max_len=strlen($header[$i]);
	    for($j=0;$j<count($data);$j++)
	      $max_len=max($max_len,strlen($data[$j][$i]));
        $w[$i]=$max_len*4;
	  }  
	}  	  
	// entete du fichier
	$max_nbl=0;
    for($i=0;$i<count($header);$i++)
    {
   	  $nbl[$i]=$this->calcule_ligne_MultiCell($w[$i],7,$header[$i]);	
	  $max_nbl=max($max_nbl,$nbl[$i]);
	}	
    $y_cur=$this->GetY();
    $x_cur=$this->GetX();
    for($i=0;$i<count($header);$i++)
	{
 	  if ($i==$colonne_a_colorier)
		$this->SetTextColor(100); 
      if ($mode=='C')
      {	  
		if ($header[$i]=='')
        {
		  $this->Cell($w[$i],7,$header[$i],0,0,'C',0);
        }
        else  
		{
          $this->Cell($w[$i],7,$header[$i],1,0,'C',1);
		}  
	  }
	  else
	  {
	  	for ($j=0;$j<($max_nbl-$nbl[$i]);$j++)
	      $header[$i].="\n "; 
		if ($header[$i]=='')
        {
		  $this->MultiCell($w[$i],6,$row[$i],'','C',0);
        }
        else
        {		
	      $this->MultiCell($w[$i],7,$header[$i],'LRBT','C',1);
		}  
		$x_cur+=$w[$i];
		$this->SetXY($x_cur,$y_cur);
	  }
	  $this->SetTextColor(0);
	}  
    $this->SetY($this->GetY()+7*($max_nbl-1));
    $this->Ln();
	
    //Restauration des couleurs et de la police
    $this->SetFillColor(230);
    $this->SetTextColor(0);
    $this->SetFont('');
    //Données
    $fill=0;
  
    // creation des lignes  
    foreach($data as $row)
    {
	  // calcul du nombre de retour à la ligne pour cet élément
	  $max_nbl=0;
      for($i=0;$i<count($header);$i++)
      {
	    $nbl[$i]=$this->calcule_ligne_MultiCell($w[$i],6,$row[$i]);	
		$max_nbl=max($max_nbl,$nbl[$i]);
	  }
      // Placement aux bonnes coordonnées
      $x_cur=$this->GetX();
      for($i=0;$i<count($header);$i++)
	  {
	    for ($j=0;$j<($max_nbl-$nbl[$i]);$j++)
	      $row[$i].="\n "; 

		if ($i==$colonne_a_colorier)
		   $this->SetTextColor(200,0,0);
		if ($header[$i]=='')
        {
		  $this->MultiCell($w[$i],6,$row[$i],'','C',0);
        }
        else if ($header[$i]=="Nom")     
		{
		  $this->MultiCell($w[$i],6,correction_nom($row[$i]),'LRBT','C',$fill);
		}	
		else if ($header[$i]=="Prénom")     
		{
		  $this->MultiCell($w[$i],6,correction_prenom($row[$i]),'LRBT','C',$fill);
		}	
		else
		{
		  $this->MultiCell($w[$i],6,$row[$i],'LRBT','C',$fill);  
		}	
		$this->SetTextColor(0);
		$x_cur+=$w[$i];
		$this->SetXY($x_cur,$this->GetY()-6*$max_nbl);
	  } 
	  // decalage
	  $this->SetY($this->GetY()+6*($max_nbl-1));
      $this->Ln();
	  if ($alternColor)
	  {
        $fill=!$fill;
      }
    }
    $this->Cell(array_sum($w),0,'','T');
}

function createForm($formItems,$data,$fieldsType,$size=3,$stretch=15)
{
    //Couleurs, épaisseur du trait et police grasse
	$this->SetFillColor(255);
    $this->SetTextColor(0);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
	
	// Size of the two columns
	if (is_array($size))
	{
	  $maxLenItems=$size[0];
	  $maxLenData=$size[1];	
	}
	else
	{
	  $maxLenItems=0;
	  $maxLenData=0;
      for($i=0;$i<count($formItems);$i++)
	  {
	    $maxLenItems=max($maxLenItems,$size*strlen($formItems[$i]));
	    if ($fieldsType[$i]=='text')
	    {
	      $maxLenData=max($maxLenData,$size*strlen($data[$i]));
	    } 	
	  }
	}
	  
	// Display Data  
    for($i=0;$i<count($formItems);$i++)
	{
      $this->Cell($maxLenItems,7,$formItems[$i],0,0,'L',1);
	  $x_cur=$this->GetX();
	  $y_cur=$this->GetY();
	  switch ($fieldsType[$i])
	  {
	    case 'textarea':
		  $nbl=$this->calcule_ligne_MultiCell($maxLenData,7,$data[$i]);
		  for ($j=0;$j<(4-$nbl);$j++)
	      {
		    $data[$i].="\n ";
          }			
		  $this->SetX($x_cur);
		  $this->MultiCell($maxLenData,7,$data[$i],1,'L');
		  $this->SetY($y_cur+20);
		break;
		
	    default:
	    case 'text':
	      $this->Cell($maxLenData,7,$data[$i],1,0,'L',1);
	  }
	  $this->Ln($stretch);
	}
}


function calcule_ligne_MultiCell($w,$h,$txt)
{
	//Output text with automatic or explicit line breaks
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$b=0;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$ns=0;
	$nl=1;
	while($i<$nb)
	{
		//Get next character
		$c=$s{$i};
		if($c=="\n")
		{
			//Explicit line break
			if($this->ws>0)
			{
				$this->ws=0;
				//$this->_out('0 Tw');
			}
			//$this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$ns=0;
			$nl++;
			continue;
		}
		if($c==' ')
		{
			$sep=$i;
			$ls=$l;
			$ns++;
		}
		$l+=$cw[$c];
		if($l>$wmax)
		{
			//Automatic line break
			if($sep==-1)
			{
				if($i==$j)
					$i++;
				if($this->ws>0)
				{
					$this->ws=0;
					//$this->_out('0 Tw');
				}
				//$this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
			}
			else
			{
				/*if($align=='J')
				{
					$this->ws=($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
					//$this->_out(sprintf('%.3f Tw',$this->ws*$this->k));
				}*/
				//$this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
				$i=$sep+1;
			}
			$sep=-1;
			$j=$i;
			$l=0;
			$ns=0;
			$nl++;
		}
		else
			$i++;
	}
	//Last chunk
	if($this->ws>0)
	{
		$this->ws=0;
		//$this->_out('0 Tw');
	}
	//$this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
	$this->x=$this->lMargin;
	return $nl;
}


}
