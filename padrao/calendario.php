<?php
class calendario{ 
  var $mes = array(
                   '01' => 'JANEIRO',
                   '02' => 'FEVEREIRO',
                   '03' => 'MARCO',
                   '04' => 'ABRIL',
                   '05' => 'MAIO',
                   '06' => 'JUNHO',
                   '07' => 'JULHO',
                   '08' => 'AGOSTO',
                   '09' => 'SETEMBRO',
                   '10' => 'OUTUBRO',
                   '11' => 'NOVEMBRO',
                   '12' => 'DEZEMBRO'
                  );

  function mes_anterior($dia,$mes,$ano){
    if($mes == 1){
       $man = 12;
       $aan = $ano - 1;
    } else {
       $man = $mes - 1;
       $aan = $ano;
    }

    $val = checkdate($man,$dia,$aan);
    if($val == 0){
      $dia = 1;
    }
	
    echo '<a href="Condutor_Escala.php?data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$man).'/'.$aan.'"><img src="../imagens/anterior.gif" width="16" height="16" border="0" alt="Ano Anterior"></a>';

  }

  function mes_proximo($dia,$mes,$ano){
    if($mes == 12){
       $mpr = 1;
       $apr = $ano + 1;
    } else {
       $mpr = $mes + 1;
       $apr = $ano;
    }

    $val = checkdate($mpr,$dia,$apr);
    if($val == 0){
      $dia = 1;
    }
    echo '<a href="inclusao_agenda.php?data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$mpr).'/'.$apr.'"><img src="../imagens/proximo.gif" width="16" height="16" border="0" alt="Ano Anterior"></a>';
  }

  function ano_anterior($dia,$mes,$ano){
    $aan = $ano - 1;
    echo '<a href="inclusao_agenda.php?data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$mes).'/'.$aan.'"><img src="../imagens/anteriorDuplo.gif" width="16" height="16" border="0" alt="Ano Anterior"></a>';
  }

  function ano_proximo($dia,$mes,$ano){
    $apr = $ano + 1;
    echo '<a href="inclusao_agenda.php?data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$mes).'/'.$apr.'"><img src="../imagens/proximoDuplo.gif" width="16" height="16" border="0" alt="Proximo Ano"</a>';
  }
  
  function cria($data){
    $arr = explode("/",$data);
    $dia = $arr[0];
    $mes = $arr[1];
    $ano = $arr[2];

    if(($dia == '') OR ($mes = '') OR ($ano = '')){
      $data = date("d/m/Y");
      $arr = explode("/",$data);
      $dia = $arr[0];
      $mes = $arr[1];
      $ano = $arr[2];
    }

    $arr = explode("/",$data);
    $dia = $arr[0];
    $mes = $arr[1];
    $ano = $arr[2];

    $val = checkdate($mes,$dia,$ano); // Verifica se a data é válida
    if($val == 1){
      $ver = date('d/m/Y', mktime(0,0,0,$mes,$dia,$ano));
    } else {
      $ver = date('d/m/Y', mktime(0,0,0,date(m),date(d),date(Y)));
    }

    $arr = explode("/",$ver);
    $dia = $arr[0];
    $mes = $arr[1];
    $ano = $arr[2];

    $ult = date("d", mktime(0,0,0,$mes+1,0,$ano));
    $dse = date("w", mktime(0,0,0,$mes,1,$ano));

    $tot = $ult+$dse;
    if($tot != 0){
      $tot = $tot+7-($tot%7);
    }

    for($i=0;$i<$tot;$i++){
      $dat = $i-$dse+1;
      if(($i >= $dse) AND ($i < ($dse+$ult))){
        $aux[$i]  = '
          <td ';
		  
//Marca os dias selecionados

		$chave_cesta = array_keys($_SESSION[cesta]);		
		 $indice = $chave_cesta[$i];
		 
		 if ($dat < 10)
		   $diaatual = '0'.$dat;
		 else
		   $diaatual = $dat;
		   
		 $dtsis = $diaatual.$mes.$ano;

        if(($diaatual == $_SESSION[cesta][$dtsis][DIA]) AND ($mes == $_SESSION[cesta][$dtsis][MES]) AND ($ano == $_SESSION[cesta][$dtsis][ANO]))
		{
          if ($_SESSION[cesta][$dtsis][ID_Escala] == $_SESSION["EscalaAtual"] )
		  $aux[$i] .= 'class="calendario_selecionado"';
		  else
		  $aux[$i] .= 'class="calendario_EscalaAnterior"';
        } 
		else
		{
			if(($dat == date(d)) AND ($mes == date(m)) AND ($ano == date(Y))){
			  $aux[$i] .= 'class="calendario_dias_hoje"';
			} else {
			  $aux[$i] .= 'class="calendario_dias"';
			}
		}
        if(($dat == date(d)) AND ($mes == date(m)) AND ($ano == date(Y))){
          $aux[$i] .= 'class="calendario_links_hoje"';
        } else {
          $aux[$i] .= 'class="calendario_links"';
        }
	
        $aux[$i] .= '><a href="javascript:pegaData('."'".sprintf("%02.0f",$dat).'/'.$mes.'/'.$ano."'".')" title="'. $_SESSION[cesta][$dtsis][Hora].'" >'.$dat.'</a>
          </td>
        ';
      } else {
        $aux[$i] = '
          <td>
          </td>
        ';
    }

    if(($i%7) == 0){
      $aux[$i] = '<tr align="center">'.$aux[$i];
    }

    if(($i%7) == 6){
      $aux[$i] .= '</tr>';
    }
  }

  echo '
  <table cellspacing="0" cellpadding="0" class="calendario_tabela">
    <tr>
      <td>
        <table cellspacing="1" cellpadding="1">
          <tr class="calendario_mes_ano">
            <td>
  ';
  $this->mes_anterior($dia,$mes,$ano);
  echo '
            </td>
            <td colspan="5">'.$this->mes[$mes].'</td>
            <td>
  ';
  $this->mes_proximo($dia,$mes,$ano);
  echo '
</td>
          </tr>

          <tr class="calendario_mes_ano">
            <td>
  ';
  $this->ano_anterior($dia,$mes,$ano);
  echo '
            </td>
            <td colspan="5">'.$ano.'</td>
            <td>
  ';
  $this->ano_proximo($dia,$mes,$ano);
  echo '
            </td>
          </tr>

          <tr class="calendario_semana">
            <td WIDTH="30">D</td>
            <td WIDTH="30">S</td>
            <td WIDTH="30">T</td>
            <td WIDTH="30">Q</td>
            <td WIDTH="30">Q</td>
            <td WIDTH="30">S</td>
            <td WIDTH="30">S</td>
          </tr>
  ';
  echo implode(' ',$aux);
  if(count($aux) == 35){
    echo '
          <tr>
            <td colspan="7">&nbsp;</td>
          </tr>
    ';
  };
  echo '
          <tr>
            <td class="calendario_mes_ano" colspan="7" align="center">[ <a href="Condutor_Escala.php?data='.date(d).'/'.date(m).'/'.date(Y).'"> Hoje</a> ]</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  ';
   } 
} 

?>