<?php
session_start();
$Usuario = $user[1][nome];
//include_once("funcoes/TestaLogin.php");

include_once("conexao.php");		
extract($_REQUEST);
		
include_once("padrao/calendario.php");				

/**
************************************************************************************************************************
Sistema: SGF
Desenvolvimento:  João Daniel Queiroz Lima
Última Alteração: 06/10/2011
Página: inclusao_agenda.php
Resumo: Tela de Cadastro de agenda de profissionais
************************************************************************************************************************
**/

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
body { font: normal 62.5% verdana; }
 
ul.menubar{
  margin: 0px;
  padding: 0px;
  background-color: #FFFFFF; /* IE6 Bug */
  font-size: 100%;
}

td {font-family: Tahoma, Verdana, sans-serif; font-size: 12px;}

.textfield {
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-small;
	font-style: normal;
	border-style: groove;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
}
 
ul.menubar .submenu{
  margin: 0px;
  padding: 0px;
  list-style: none;
  background-color: #FFFFFF;
  border: 0px solid #ccc;
  float:left;
}
 
ul.menubar ul.menu{
  display: none;
  position: absolute;
  margin: 0px;
}
 
ul.menubar a{
  padding: 5px;
  display:block;
  text-decoration: none;
  color: #777;
  padding: 5px;
}
 
ul.menu, ul.menu ul{
  margin: 0;
  padding: 0;
  border-bottom: 1px solid #ccc;
  width: 150px; /* Width of Menu Items */
  background-color: #FFFFFF; /* IE6 Bug */
}
 
ul.menu li{
  position: relative;
  list-style: none;
  border: 0px;
}
 
ul.menu li a{
  display: block;
  text-decoration: none;
  border: 1px solid #ccc;
  border-bottom: 0px;
  color: #777;
  padding: 5px 10px 5px 5px;
}
 
ul.menu li sup{
  font-weight:bold;
  font-size:7px;
  color: red;
}
 
/* Fix IE. Hide from IE Mac \*/
* html ul.menu li { float: left; height: 1%; }
* html ul.menu li a { height: 1%; }
/* End */
 
ul.menu ul{
  position: absolute;
  display: none;
  left: 149px; /* Set 1px less than menu width */
  top: 0px;
}
 
ul.menu li.submenu ul { display: none; } /* Hide sub-menus initially */
 
ul.menu li.submenu { background: transparent url(arrow.gif) right center no-repeat; }
 
ul.menu li a:hover { color: #E2144A; }

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #D3DDE7;
	background-repeat: repeat-x;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	text-decoration: none;
}

.botton {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
	text-decoration: none;
	font-weight: bold;
}
.subtitle {

	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #3C72C8;
	text-decoration: none;
	font-weight: bold;
}
.menu {
	FONT-SIZE: 10px; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}
.form {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	background-color: #f0f0f0;
	background-image: url(Imagens/Bg_index.gif);
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
}
.texto {
	FONT-SIZE: 10px; COLOR: #333333; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}
.style18 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; text-decoration: none; font-weight: bold; }
.style19 {
	color: #FFFFFF;
	font-weight: bold;
}
a:link {
	color: #000;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VITALMED - SGF</title>
</head>

<body>
<link rel="stylesheet" type="text/css" href="funcoes/submodal/subModal.css" />
<link rel="stylesheet" type="text/css" href="css/calendario.css">

<script type="text/javascript" src="funcoes/submodal/common.js"></script>
    <script type="text/javascript" src="funcoes/submodal/subModal.js"></script>
	<script language="JavaScript" src="funcoes/calendar2.js"></script>
	<script language="JavaScript" src="funcoes/mascaras2.js"></script>

   
<script src="layout\xaramenu.js"></script>
<script type='text/javascript' src='funcoes/funcoes.js'></script>	
<script>
    function limparvariaveis(variavel) 
	{
	   abrirResposta("A Escala foi Cadastrada!","INCLUIR");
	   document.frmCadastro.acao.value="LIMPAR";
	   document.frmCadastro.submit();	
	}

</script>

<script language="JavaScript">

// months as they appear in the calendar's title
var ARR_MONTHS = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
		"Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
// week day titles as they appear on the calendar
var ARR_WEEKDAYS = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"];
// day week starts from (normally 0-Su or 1-Mo)
var NUM_WEEKSTART = 1;
// path to the directory where calendar images are stored. trailing slash req.
var STR_ICONPATH = '../imagens/';

var re_url = new RegExp('datetime=(\\-?\\d+)');
var dt_current = (re_url.exec(String(window.location))
	? new Date(new Number(RegExp.$1)) : new Date());
var re_id = new RegExp('id=(\\d+)');
var num_id = (re_id.exec(String(window.location))
	? new Number(RegExp.$1) : 0);
var obj_caller = (window.opener ? window.opener.calendars[num_id] : null);

if (obj_caller && obj_caller.year_scroll) {
	// get same date in the previous year
	var dt_prev_year = new Date(dt_current);
	dt_prev_year.setFullYear(dt_prev_year.getFullYear() - 1);
	if (dt_prev_year.getDate() != dt_current.getDate())
		dt_prev_year.setDate(0);
	
	// get same date in the next year
	var dt_next_year = new Date(dt_current);
	dt_next_year.setFullYear(dt_next_year.getFullYear() + 1);
	if (dt_next_year.getDate() != dt_current.getDate())
		dt_next_year.setDate(0);
}

// get same date in the previous month
var dt_prev_month = new Date(dt_current);
dt_prev_month.setMonth(dt_prev_month.getMonth() - 1);
if (dt_prev_month.getDate() != dt_current.getDate())
	dt_prev_month.setDate(0);

// get same date in the next month
var dt_next_month = new Date(dt_current);
dt_next_month.setMonth(dt_next_month.getMonth() + 1);
if (dt_next_month.getDate() != dt_current.getDate())
	dt_next_month.setDate(0);

// get first day to display in the grid for current month
var dt_firstday = new Date(dt_current);
dt_firstday.setDate(1);
dt_firstday.setDate(1 - (7 + dt_firstday.getDay() - NUM_WEEKSTART) % 7);

// function passing selected date to calling window
function set_datetime(n_datetime, b_close) {



	if (!obj_caller) return;

	var dt_datetime = obj_caller.prs_time(
		(document.cal ? document.cal.time.value : ''),
		new Date(n_datetime)
	);

	if (!dt_datetime) return;
	if (b_close) {
		obj_caller.target.value = (document.cal
			? obj_caller.gen_tsmp(dt_datetime)
			: obj_caller.gen_date(dt_datetime)
		);
	}
	else obj_caller.popup(dt_datetime.valueOf());
}

</script>    

<form name="frmCadastro" id="frmCadastro" method="post">

	<!-- Variacao de ação do formulário -->
    <input name="acao" type="hidden" value="<?php echo $acao; ?>">
    <input name="BuscaCodigo" type="hidden" value="<?php echo $BuscaCodigo; ?>">
    <input name="BuscaCodigo2" type="hidden" value="<?php echo $BuscaCodigo2; ?>">
    <input name="RetornoCampo" type="hidden" value="<?php echo $RetornoCampo; ?>">
    <input name="BuscaDIA" type="hidden" value="<?php echo $BuscaDIA; ?>">
    <input name="BuscaMES" type="hidden" value="<?php echo $BuscaMES; ?>">
    <input name="BuscaANO" type="hidden" value="<?php echo $BuscaMES; ?>">
    <input name="BuscaDATA" type="hidden" value="<?php echo $BuscaDATA; ?>">
    <input name="BuscaHORA" type="hidden" value="<?php echo $BuscaHORA; ?>">
    <input name="subacao" type="hidden" value="<?php echo $subacao; ?>">
    <input name="PSVTIPO" type="hidden" value="<?php echo $PSVTIPO; ?>">
    

<?php
	 $chave_cesta = array_keys($_SESSION[cesta]);	
	 $QTD = count($chave_cesta);	
	 $indice = $chave_cesta[$QTD-1];
		
	 if ($_SESSION[cesta][$indice][ID_Condutor] != '')
	 {
		 $edCondutor 			= $_SESSION[cesta][$indice][ID_Condutor];
		 $edDescricaoCondutor 	= $_SESSION[cesta][$indice][DES_Condutor];
		 $edVeiculo 			= $_SESSION[cesta][$indice][ID_Veiculo];
		 $edDescricaoVeiculo 	= $_SESSION[cesta][$indice][DES_Veiculo];
		 
		 if (isset($RetornoCampo) && $RetornoCampo != $_SESSION["EscalaAtual"])
		 {
		   $_SESSION["EscalaAtual"] = $RetornoCampo;
		   $_SESSION["DescricaoAtual"] = $edDescricaoEscala;
		 }
		 else
		 {
			 $edEscala 				= $_SESSION["EscalaAtual"];
			 $edDescricaoEscala 	= $_SESSION["DescricaoAtual"];
		 }
	 }
		 
	if (isset($acao) && $acao == "LOCALIZAR") 
    {
		$rsCadastro = mssql_query("PTb_ces_Condutor_Escala_Localizar 'ID_Condutor','$BuscaCodigo','0'",$con);
		
		 // Preenche cesta
		unset($cesta);
		session_unregister(cesta);
		 
		while($Localiza = mssql_fetch_row($rsCadastro))
		{
			if ($Localiza[5] < 10) 
			  $Dia = '0'.$Localiza[5];
			else
			  $Dia = $Localiza[5];

			if ($Localiza[6] < 10) 
			  $Mes = '0'.$Localiza[6];
			else
			  $Mes = $Localiza[6];
			 
			$BuscaCodigo2 = $Dia.$Mes.$Localiza[7];
			
			$edVeiculo = $Localiza[1];
			$edEscala = $Localiza[2];
			$edCondutor = $Localiza[3];
			$edDescricaoCondutor = $Localiza[9];
			$edDescricaoVeiculo = $Localiza[8];
			$edDescricaoEscala = $Localiza[10];
			
			$_SESSION["EscalaAtual"]   = $edEscala;
			$_SESSION["DescricaoAtual"] = $edDescricaoEscala;
			$_SESSION["SubAcao"] = 'LOCALIZAR';

			$txtprod[$BuscaCodigo2][ID_Condutor] = $Localiza[3];
			$txtprod[$BuscaCodigo2][DES_Condutor] = $Localiza[9];
			$txtprod[$BuscaCodigo2][ID_Veiculo] = $Localiza[1];
			$txtprod[$BuscaCodigo2][DES_Veiculo] = $Localiza[8];
			$txtprod[$BuscaCodigo2][ID_Escala] = $Localiza[2];
			$txtprod[$BuscaCodigo2][DES_Escala] = $Localiza[10];

			$txtprod[$BuscaCodigo2][DIA] = $Dia;
			$txtprod[$BuscaCodigo2][MES] = $Mes;
			$txtprod[$BuscaCodigo2][ANO] = $Localiza[7];
			$txtprod[$BuscaCodigo2][DATA] = $Localiza[4];

			session_start(); 
	
			//PEGA A CHAVE DO ARRAY
			$chave = array_keys($txtprod);

			//POPULA CESTA
			for($i=0; $i<sizeof($chave); $i++)
			{
				$indice = $chave[$i];

				$cesta[$indice][ID_Condutor] = $txtprod[$indice][ID_Condutor];
				$cesta[$indice][DES_Condutor] = $txtprod[$indice][DES_Condutor];
				$cesta[$indice][ID_Veiculo] = $txtprod[$indice][ID_Veiculo];
				$cesta[$indice][DES_Veiculo] = $txtprod[$indice][DES_Veiculo];
				$cesta[$indice][ID_Escala] = $txtprod[$indice][ID_Escala];
				$cesta[$indice][DES_Escala] = $txtprod[$indice][DES_Escala];

				$cesta[$indice][DIA] = $txtprod[$indice][DIA];
				$cesta[$indice][MES] = $txtprod[$indice][MES];
				$cesta[$indice][ANO] = $txtprod[$indice][ANO];
				$cesta[$indice][DATA] = $txtprod[$indice][DATA];
			}
			//GRAVA NA SESSÃO
			$_SESSION[cesta] = $cesta;
		}	
	}	
	
	if (isset($acao) && $acao == 'INCLUIR') 
	{
			$chave_cesta = array_keys($_SESSION[cesta]);
			$erro = 0;
			
			for($i=0; $i<sizeof($chave_cesta); $i++) 
			{ 

				$indice = $chave_cesta[$i]; 

				$Data = $_SESSION[cesta][$indice][DATA]; 
				$Escala =  $_SESSION[cesta][$indice][ID_Escala];

				$result = mssql_query("PTb_ces_Condutor_Escala_Inserir $edVeiculo, $Escala, $edCondutor, '$Data'",$con);
				$testa2 = mssql_fetch_row($result);
			
			}	

			echo '<script>' ;
			echo '   limparvariaveis("acao");'; // Função necessaria para se evitar que um refresh na pagina gere um registro duplicado
			echo '</script>';
			$acao = '';
			
			$_SESSION["SubAcao"] = '';
			$edVeiculo = '';
			$edEscala = ''; 
			$edCondutor = '';
			$edDescricaoCondutor = '';
			$edDescricaoVeiculo = '';
			$edDescricaoEscala = '';				

			// Limpa o vetor cesta
			unset($cesta);
			session_unregister(cesta);				
	}  
	
	
	if (isset($acao) && $acao == 'ALTERAR') 
	{
  		    $result = mssql_query("PTb_ces_Condutor_Escala_Excluir $BuscaCodigo",$con);

			$chave_cesta = array_keys($_SESSION[cesta]);
			$erro = 0;
			for($i=0; $i<sizeof($chave_cesta); $i++) 
			{ 

				$indice = $chave_cesta[$i]; 

				$Data = $_SESSION[cesta][$indice][DATA]; 
				$Escala =  $_SESSION[cesta][$indice][ID_Escala];

				$result = mssql_query("PTb_ces_Condutor_Escala_Inserir $edVeiculo, $Escala, $edCondutor, '$Data'",$con);
				
				$testa2 = mssql_fetch_row($result);
			
			}	

			echo '<script>';
           	echo '   abrirResposta("A Escala foi Alterada!","INCLUIR");';
			echo '</script>';
			
			$acao = '';
			
			$_SESSION["SubAcao"] = '';
			$edVeiculo = '';
			$edEscala = ''; 
			$edCondutor = '';
			$edDescricaoCondutor = '';
			$edDescricaoVeiculo = '';
			$edDescricaoEscala = '';			

			// Limpa o vetor cesta
			unset($cesta);
			session_unregister(cesta);					
			
	} 	
	

	if (isset($acao) && $acao == 'LIMPAR') 
	{
			$acao = '';
			$edVeiculo = '';
			$edEscala = ''; 
			$edCondutor = '';
			$edDescricaoCondutor = '';
			$edDescricaoVeiculo = '';
			$edDescricaoEscala = '';
			$_SESSION["SubAcao"] = '';
			
			// Limpa o vetor cesta
			unset($cesta);
			session_unregister(cesta);				
	} 	
			
// Manipulacao de inclusão das cestas

   if (isset($acao) and $acao == "InclueItem1")
   {
		$chave_cesta = array_keys($_SESSION[cesta]);		
		 $indice = $chave_cesta[1];	
		 
		 if ($_SESSION[cesta][$BuscaCodigo2][DATA] == $BuscaDATA)
		   {
			   $chave_cesta_anterior = array_keys($_SESSION[cesta]); // Remove um dia se o mesmo já foi selecionado
			   unset($_SESSION[cesta][$BuscaCodigo2]);			   
		   }
		 else
		 {
			$txtprod[$BuscaCodigo2][ID_Profissional] = $edProfissional;
			$txtprod[$BuscaCodigo2][DES_Profissional] = $edDescricaoProfissional;
			$txtprod[$BuscaCodigo2][ID_Paciente] = $edPaciente;
			$txtprod[$BuscaCodigo2][DES_Paciente] = $edDescricaoPaciente;
			$txtprod[$BuscaCodigo2][Hora] = $BuscaHORA;
			
			$txtprod[$BuscaCodigo2][DIA] = $BuscaDIA;
			$txtprod[$BuscaCodigo2][MES] = $BuscaMES;
			$txtprod[$BuscaCodigo2][ANO] = $BuscaANO;
			$txtprod[$BuscaCodigo2][DATA] = $BuscaDATA;
	
			session_start(); 
	
			//PEGA A CHAVE DO ARRAY
			$chave = array_keys($txtprod);
	
			$cesta[$BuscaCodigo2][ID_Profissional] = $edProfissional;
			$cesta[$BuscaCodigo2][DES_Profissional] = $edDescricaoProfissional;
			$cesta[$BuscaCodigo2][ID_Paciente] = $edPaciente;
			$cesta[$BuscaCodigo2][DES_Paciente] = $edDescricaoPaciente;
			$cesta[$BuscaCodigo2][Hora] = $BuscaHORA;

			$cesta[$BuscaCodigo2][DIA] = $BuscaDIA;
			$cesta[$BuscaCodigo2][MES] = $BuscaMES;
			$cesta[$BuscaCodigo2][ANO] = $BuscaANO;
			$cesta[$BuscaCodigo2][DATA] = $BuscaDATA;
	
			//GRAVA NA SESSÃO
			$_SESSION[cesta] = $cesta;
			$BuscaCodigo2 = '';
	
			$BuscaDIA = '';
			$BuscaMES = '';
			$BuscaDATA = '';
		 }
   }
			
?>


<div align="center">
  <table width="200" border="0">
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
  <?php
  if ($chamada != 1)
  {
  //NOVO
	  echo '<table width="643" height="70" border="0" bgcolor="#FFFFFF">';
	  echo '	<tr>';
	  echo '	  <td height="70" align="left" valign="top">';
	  echo '	  <table width="643" border="0">';
	  echo '		<tr>';
	  echo '			<td><img src="imagens/banner.jpg" border="0" /></td>';
	  echo '	    </tr>';
	  echo '		<tr>';
	  echo '		<tr>';
	  echo '			<td>&nbsp;</td>';
	  echo '	    </tr>';
	  echo '		  <td align="center">';
      echo '<script src="xaramenu.js"></script><script Webstyle4 src="imagens/menusmart.js"></script>';
//						$principal = false;
						// Função para criar o cabeçalho e menu da página
//						echo '<script>';                				  
//						echo "var loc = 'layout/';";
//						include_once("cabecalho.php");
//						echo '<script>';
	  echo '		  </td>';
	  echo '		  </tr>';
	  echo '	  </table>   ';     
	  echo '</td></tr>';
	  echo '</table>';
  }

  ?>
  <table width="713" height="360" border="0" align=top bgcolor="#FFFFFF">
     <td width="703" align="top" valign="top" >

		  <table width="691" height="349" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#999999">
            <tr>
              <td width="663" height="46" valign="top" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><table width="684" border="0" bgcolor="#999999">
                <tr>
                  <td><div align="center"><span class="style19">Programa&ccedil;&atilde;o de Agenda de Profissionais</span></div></td>
                </tr>
                <tr>
			  </table>
		        <table width="684" border="0">
                  <tr>
                    <td width="63"><div align="left"></div></td>
                    <td colspan="2"><div align="left">&nbsp;</div></td>
                  </tr>
                  <tr>
                    <td><div align="left"></div></td>
                    <td width="297"><div align="left"><span class="style18">Profissional</span></div>                      <div align="left"></div></td>
                    <td width="310"><div align="left"><span class="style18">Paciente</span></div></td>
                  </tr>
                  <tr>
                    <td><div align="left"></div></td>
                    <td><div align="left">
                      <input name="edProfissional" type="text" class="textfield" id="edProfissional" value="<?php echo $edProfissional;?>"  onblur="buscaInstantanea('select psv_cod, psv_nome from psv where psv_cod = ','edDescricaoProfissional','edProfissional');" size="5" maxlength="5"/>
                      <a href="javascript:BuscarProfissional('edProfissional','edDescricaoProfissional');"><img src="../imagens/27.png" alt="Buscar" width="18" height="18" border="0" /></a>
                      <input name="edDescricaoProfissional" type="text" class="textfield" id="edDescricaoProfissional" value="<?php echo  $edDescricaoProfissional;?>"  size="40" maxlength="40"/>
                      <script>
							document.frmCadastro.edDescricaoProfissional.readOnly=true;
					  </script>
                    </div></td>
                    <td><div align="left">
                      <input name="edPaciente" type="text" class="textfield" id="edPaciente" value="<?php echo $edPaciente;?>"  onblur="buscaInstantanea('select pac_reg, pac_nome from pac where pac_reg = ','edDescricaoPaciente','edPaciente');" size="5" maxlength="5"/>
                      <a href="javascript:BuscarPaciente('edPaciente','edDescricaoPaciente');"><img src="../imagens/27.png" alt="Buscar" width="18" height="18" border="0" /></a>
                      <input name="edDescricaoPaciente" type="text" class="textfield" id="edDescricaoPaciente" value="<?php echo  $edDescricaoPaciente;?>"  size="40" maxlength="40"/>
                      <script>
							document.frmCadastro.edDescricaoPaciente.readOnly=true;
					  </script>
                    </div></td>
                  </tr>
                  <tr>
                    <td colspan="3"><div align="center">
                      <table width="155" border="0">
                        <tr>
                          <td width="72" class="calendario_dias_hoje">Hoje</td>
                          <td width="73" class="calendario_selecionado">Agendado</td>
                          </tr>
                      </table>
                    </div></td>
                  </tr>
                </table>
		        <div align="center">
		          <table width="300" border="0">
		            <tr>
						<?php
							$teste = new calendario;
							$teste->cria($_GET["data"]);
						?>
	                </tr>
	              </table>
                </div>
              </td>
            </tr>
        </table>
          
	 </td>
  </table>  

  <table width="713" border="0" bgcolor="#FFFFFF">
<td width="703">
	<div align="center">
	  <?php
			//NOVO
                // Função para criar o rodape e menu da página
				if ($chamada != 1)
  				{
					if ($_SESSION["SubAcao"] != "LOCALIZAR")
					{
						echo '<script>';                				  
						echo "var loc = '../layout/';";
						include_once("../padrao/rodape.php");
						echo '</script>';
					}
					else
					{
						echo '<script>';                				  
						echo "var loc = '../layout/';";
						include_once("../padrao/rodapesemgravar.php");
						echo '</script>';
					}
				}
				else
  				{
					echo '<script>';                				  
					echo "var loc = '../layout/';";
					include_once("../padrao/rodapeconsulta.php");
					echo '</script>';
				}
            ?>
	    </div></td>
  </table>  

  <table width="643" border="0" bgcolor="#FFFFFF">
     <td><img src="../imagens/linha.gif"     border="0" /></td>
  </table>
  <?php
	  // NOVO
	  if ($chamada != 1)
	  { 
		echo '<p><span class="style18">Vitalmed - Copyright &copy; 2011</span> </p>';
	  }
  ?>
</div>
</form>
</body>
</html>

<script>
	// Função para validação do formulário
    function validar(v) 
	{
	   
	   	var camposok, errors;
		errors = 'Caro usuário alguns erros ocorreram e seguem listados abaixo:\n';
		errors += '\n';
		camposok='S';
		
		if (document.frmCadastro.edVeiculo.value == '') 
	   	{
			camposok = 'N';
			errors += '- Campo Veículo está em branco! \n';	      
	   	}

		if (document.frmCadastro.edEscala.value == '') 
	   	{
			camposok = 'N';
			errors += '- Campo Escala está em branco! \n';	      
	   	}
				
		if (document.frmCadastro.edCondutor.value == '') 
	   	{
			camposok = 'N';
			errors += '- Campo Condutor está em branco! \n';	      
	   	}

		// Caso existam erros, mostra na tela
		if (camposok=='N') 
		{
			alert(errors);
		}
		else 
		{
		   // Caso não existam erros
		   //document.frmCadastro.acao.value="INCLUIR";

		 if (v==1)  
		 {  
		   document.frmCadastro.acao.value="INCLUIR";
		   document.frmCadastro.submit();
		 }

		 else
		 {  
		   document.frmCadastro.acao.value="ALTERAR";
		   document.frmCadastro.submit();
		 }
		}
	}


function LimparFormulario() 
{
	document.frmCadastro.acao.value="LIMPAR";
	document.frmCadastro.submit();
}	

function LocalizarBanco()
{
           showPopWin("padrao/Localizacao.php?Tabela=V01_Condutor&passo=1", 595, 406, null); // passo = Qtd de vezes que passa campo nao string
}

function Localiza(Busca) 
{
    Busca.style.backgroundColor='#E5E5E5'

	document.frmCadastro.acao.value="LOCALIZAR";
	document.frmCadastro.BuscaCodigo.value=Busca.value;
	
   	document.frmCadastro.submit();
}


// Função que realiza a busca instantânea
function buscaInstantanea(termo,retorno,campobusca) {
   if(document.getElementById) { // Para os browsers complacentes com o DOM W3C.
		//var termo = document.getElementById('q').value; // Pega o termo digitado no campo de texto.
		var exibeResultado = document.getElementById(retorno); // div que exibirá o resultado da busca.
		if(termo !== "" && termo !== null && termo.length >= 3) { // Verifica se o campo não está vazio, ou se foi digitado no mínimo três caracteres.
			var ajax = openAjax(); // Inicia o Ajax.
			termo = termo + document.getElementById(campobusca).value;
			ajax.open("GET", "padrao/buscaInstantanea.php?q=" + termo, true); // Envia o termo da busca como uma querystring, nos possibilitando o filtro na busca.
			ajax.onreadystatechange = function() {
				if(ajax.readyState == 1) { // Quando estiver carregando, exibe: carregando...
					exibeResultado.value = "Buscando...";
				}
				if(ajax.readyState == 4) { // Quando estiver tudo pronto.
					if(ajax.status == 200) {
						var resultado = ajax.responseText; // Coloca o resultado (da busca) retornado pelo Ajax nessa variável (var resultado).
						resultado = resultado.replace(/\+/g," "); // Resolve o problema dos acentos (saiba mais aqui: http://www.plugsites.net/leandro/?p=4)
						resultado = unescape(resultado); // Resolve o problema dos acentos
 					    exibeResultado.value= resultado;
						//exibeResultado.innerHTML = resultado;
					} else {
						exibeResultado.value = "Erro: ";
					}
				}
			}
			ajax.send(null); // submete
		} 
	}
}

// Funcao ajax
function openAjax() {

var ajax;

try{
    ajax = new XMLHttpRequest(); // XMLHttpRequest para browsers decentes, como: Firefox, Safari, dentre outros.
}catch(ee){
    try{
        ajax = new ActiveXObject("Msxml2.XMLHTTP"); // Para o IE da MS
    }catch(e){
        try{
            ajax = new ActiveXObject("Microsoft.XMLHTTP"); // Para o IE da MS
        }catch(E){
            ajax = false;
        }
    }
}
return ajax;
}

function BuscarPaciente(Campo,Campo2)
{
     showPopWin("padrao/buscarpaciente.php?Tabela=pac&Campo="+Campo+"&Campo2="+Campo2+"&Proximo=3&Cadastro=Condutor&Diretorio=cadastro"+"", 595, 401, null);		   
}

function BuscarProfissional(Campo,Campo2)
{
     showPopWin("padrao/buscarprofissional.php?Tabela=pac&Campo="+Campo+"&Campo2="+Campo2+"&Proximo=3&Cadastro=Condutor&Diretorio=cadastro"+"", 595, 401, null);		   
}

function pegaData(Data) 
{
	   	var camposok, errors;
		errors = 'Caro usuário alguns erros ocorreram e seguem listados abaixo:\n';
		errors += '\n';
		camposok='S';
		
		// Se o campo descricao estiver em branco

		if (document.frmCadastro.edProfissional.value == '') 
	   	{
			camposok = 'N';
			errors += '- Nenhum profissional foi selecionado! \n';	      
	   	}

		if (document.frmCadastro.edPaciente.value == '') 
	   	{
			camposok = 'N';
			errors += '- Nenhum Paciente foi selecionado! \n';	      
	   	}
		// Caso existam erros, mostra na tela
		if (camposok=='N') 
		{
			alert(errors);
		}
		else 
		{	
			Dia = Data.substr(0,2);
			Mes = Data.substr(3,2);
			Ano = Data.substr(6,4);
			
			document.frmCadastro.BuscaCodigo2.value = Dia+Mes+Ano;
			document.frmCadastro.BuscaDIA.value = Dia;
			document.frmCadastro.BuscaMES.value = Mes;
			document.frmCadastro.BuscaANO.value = Ano;
			document.frmCadastro.BuscaDATA.value = Data;
			
		   // colocar consistencia de campos vazios
		
			 med = document.frmCadastro.edDescricaoProfissional.value;
			 pac = document.frmCadastro.edDescricaoPaciente.value;
		
			showPopWin("boxDataHora.php?Data="+Data+"&Profissional="+med+"&Paciente="+pac+"", 400, 180, null);		   
		}
}
</script>