<?php
session_start();
$usuario = $_SESSION["login"];
$nomeUsuario = $_SESSION["nome_usuario"];

//$Usuario = $user[1][nome];
include_once("funcoes/TestaLogin.php");

include_once("conexao.php");	
extract($_REQUEST);



$rsPermissao = mssql_query("select distinct fnc_descr from usr
							left join acs on acs_grp_cod = usr_grp
							left join fnc on fnc_cod = acs_fnc_cod
							where usr_login = '$usuario'
							and fnc_descr like 'Sol- Devol%'",$con);
							
$per = mssql_fetch_row($rsPermissao);							

if (trim($per[0]) == '')	
  {
    header("location: principal.php?acesso=1");					
  }
		
/**
************************************************************************************************************************
Sistema: PORTAL HOMECARE
Desenvolvimento:  João Daniel Queiroz Lima
Última Alteração: 31/08/2011
Página: Devolucao.php
Resumo: Tela de Cadastro de Devolução de Medicamentos
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
 
.textfield {
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-small;
	font-style: normal;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-top-style: groove;
	border-right-style: groove;
	border-bottom-style: groove;
	border-left-style: groove;
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
 
.fontepequena {
	font-size: 10px;
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
.style20 {color: #FFFFFF}
.botton1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #CCC;
	text-decoration: none;
	font-weight: bold;
	background-color: #F00;
	border: thin outset #666;
}
.textfield1 {	font-family: Arial, Helvetica, sans-serif;
	font-size: x-small;
	font-style: normal;
	border-style: groove;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PORTAL HOMECARE</title>
</head>

<body>
<link rel="stylesheet" type="text/css" href="funcoes/submodal/subModal.css" />

    <script type="text/javascript" src="funcoes/submodal/common.js"></script>
    <script type="text/javascript" src="funcoes/submodal/subModal.js"></script>
	<script language="JavaScript" src="funcoes/calendar2.js"></script>
	<script language="JavaScript" src="funcoes/mascaras2.js"></script>

<script src="layout\xaramenu.js"></script>
<script type='text/javascript' src='funcoes/funcoes.js'></script>	
<script>
    function limparvariaveis(variavel) 
	{
	   alert("A Devolução foi realizada com sucesso!");
	   document.frmCadastro.acao.value="LIMPAR";
	   document.frmCadastro.submit();	
	}

</script>
<form name="frmCadastro" id="frmCadastro" method="post">

	<!-- Variacao de ação do formulário -->
    <input name="acao" type="hidden" value="<?php echo $acao; ?>">
    <input name="BuscaCodigo" type="hidden" value="<?php echo $BuscaCodigo; ?>">
    <input name="RetornoCampo" type="hidden" value="<?php echo $RetornoCampo; ?>">
    <input name="qtd" type="hidden" value="<?php echo $qtd; ?>">
    <input name="codigo_Setor" type="hidden" value="<?php echo $codigo_Setor; ?>">
    <input name="codigo_Leito" type="hidden" value="<?php echo $codigo_Leito; ?>">
    <input name="edDataAtual" type="hidden" value="<?php echo $edDataAtual; ?>">
    <input name="BuscaSerie" type="hidden" value="<?php echo $BuscaSerie; ?>">
    <input name="BuscaSMA" type="hidden" value="<?php echo $BuscaSMA; ?>">

    <input name="InsCodigo" type="hidden" value="<?php echo $InsCodigo; ?>">
    <input name="InsQuantidade" type="hidden" value="<?php echo $InsQuantidade; ?>">
    <input name="InsDescricao" type="hidden" value="<?php echo $InsDescricao; ?>">
  
<?php

	if (isset($acao) && $acao == "DADOSPACIENTE") 
    {
		$rsCadastro = mssql_query("SELECT hsp_num as Internamento, convert(char(10),hsp_dthre,103) + ' '+ 
								   rtrim(rtrim(replicate('0',2-len(cast(datepart(hh,hsp_dthre) as char)))+cast(datepart(hh,hsp_dthre) as char))+':'+
								   rtrim(replicate('0',2-len(cast(datepart(mi,hsp_dthre) as char)))+cast(datepart(mi,hsp_dthre) as char))) as Admissao,
									hsp_pac, pac_nome, pac_pront as Prontuario, pac_cnv as Convenio, psv_apel as Medico, loc_str as Setor, str_nome, loc_cod, loc_nome,
									'1'+substring(cast(datepart(yyyy,getdate()) as char),3,2) as Serie, convert(char(10),getdate(),103) + ' '+ 
								    rtrim(rtrim(replicate('0',2-len(cast(datepart(hh,getdate()) as char)))+cast(datepart(hh,getdate()) as char))+':'+
								    rtrim(replicate('0',2-len(cast(datepart(mi,getdate()) as char)))+cast(datepart(mi,getdate()) as char))) as Admissao, 
									rtrim(cast(datepart(m,getdate()) as char))+'-'+rtrim(cast(datepart(d,getdate()) as char))+'-'+rtrim(cast(datepart(yy,getdate()) as char))+' '+convert(char(12), getdate(),114) as Dta_Atual
									FROM hsp 
									left join pac on pac_reg = hsp_pac 
									left join psv on psv_cod = hsp_mde
									left join loc on loc_cod = hsp_loc
									left join str on str_cod = loc_str
									where hsp_pac = '$edPaciente' and hsp_dthra is null",$con);
									
									
		$Localiza = mssql_fetch_row($rsCadastro);	

        $codigo_Setor = $Localiza[7];
   	    $edDataAtual = $Localiza[13];

		$_SESSION["CodSetor"] = $Localiza[7];
		$_SESSION["DataAtual"] = $Localiza[13];

        $codigo_Leito = $Localiza[9];
		
		$edConvenio = $Localiza[5];
		$edNoIH = $Localiza[0];
		$edAdmissao = $Localiza[1];
		$edMedico = $Localiza[6];
		$edUnidade = $Localiza[8];
		$edLeito = $Localiza[10];
		$edDescricaoPaciente = $Localiza[3];
		
		$edNumero = $Localiza[11];
		$edInternamento = $Localiza[0];
		$edSetor = $Localiza[8];
		$edData = $Localiza[12];
   	    $edDataAtual = $Localiza[13];
		$edSubAlmoxarifado = 'FARMACIA';
		
	}


	if (isset($acao) && $acao == 'INCLUIR') 
	{
			
			$result = mssql_query("select cnt_num, cnt_num + 1 from cnt where cnt_tipo = 'sma' and cnt_serie = '$edNumero'",$con);
			
			$Localiza = mssql_fetch_row($result);
			
			$SMA_NUM = $Localiza[1];

			$edNumeroComplemento = $Localiza[1];
			
			$rsUpdate = mssql_query("update cnt set cnt_num = '$SMA_NUM' where cnt_tipo = 'sma' and cnt_serie = '$edNumero'",$con);
			
			if ($rsUpdate)
			{
				$DataAtual = $_SESSION["DataAtual"];
				$CodSetor = $_SESSION["CodSetor"];
				$result = mssql_query("INSERT INTO SMA ( SMA_SERIE, SMA_NUM, SMA_DATA, SMA_USR_LOGIN_SOL, SMA_USR_LOGIN_AUT, sma_tipo, sma_pac_reg, sma_hsp_num, sma_str_cod, sma_sba_cod, sma_status, SMA_DTHR_AUT) 
									   VALUES ($edNumero, $SMA_NUM, '$DataAtual', '$usuario', '$usuario', 'D1', $edPaciente, $edNoIH, '$CodSetor', 'FARMA', 'A', '$DataAtual')",$con);			
									   
				// Gravação da tabela de movimentacao de material - Cesta1
				$chave_cesta = array_keys($_SESSION[cesta]);
				$erro = 0;
				$Item = 0;
				for($i=0; $i<sizeof($chave_cesta); $i++) 
				{ 
					$Item++;
					$indice = $chave_cesta[$i]; 

					$CODMATERIAL = $_SESSION[cesta][$indice][CODMATERIAL];  
					$QUANTIDADE = number_format($_SESSION[cesta][$indice][QUANTIDADE],10);  
					
					$result = mssql_query("INSERT INTO ism ( ism_mat_cod, ism_sma_serie, ism_sma_num, ism_seq, ism_qtde_solicitada, ism_data_aplicacao, ism_ind_aplic_direta, ism_status, ism_str_cod, ism_falha_os, ism_qtde_solic_extra ) 
 										   VALUES ($CODMATERIAL, $edNumero, $SMA_NUM, $Item, $QUANTIDADE, '$DataAtual', 'N', 'A', '$CodSetor', '?', $QUANTIDADE)",$con);
					$testa2 = mssql_fetch_row($result);

				}	
	
				echo '<script>' ;
				echo '   limparvariaveis("acao");'; // Função necessaria para se evitar que um refresh na pagina gere um registro duplicado
				echo '</script>';
				$acao = '';
				$_SESSION["SubAcao"] = '';		
				
				$edCondutor = '';
				$edDescricaoCondutor = '';
			}
	}   
	
	


	if (isset($acao) && $acao == 'LIMPAR') 
	{
		$acao = '';
        $codigo_Setor = '';
        $codigo_Leito = '';
		
		$edNoIH = '';
		$edAdmissao = '';
		$edMedico = '';
		$edUnidade = '';
		$edLeito = '';
		$edDescricaoPaciente = '';
		
		$edNumero = '';
		$edInternamento = '';
		$edSetor = '';
		$edData = '';
		$edPaciente = '';
		
		$edMaterial = '';
		$edQuantidade = '';
		$edDescricaoMaterial = '';
		
		// Limpa o vetor cesta
		unset($cesta);
		session_unregister(cesta);			

	} 	
	
	
   if (isset($acao) and $acao == "excluiritem1")
    { 
	   $chave_cesta_anterior = array_keys($_SESSION[cesta]);
	   unset($_SESSION[cesta][$BuscaCodigo]);
    }
	
// Manipulacao de inclusão das cestas

   if (isset($acao) and $acao == "InclueItem1")
   {
		
		$CodMaterial = $InsCodigo;
		$DescMaterial = $InsDescricao;
		$QtdDevolucao = $InsQuantidade;	
		
		$rsMat = mssql_query("SELECT mat_unm_venda FROM MAT WHERE MAT_COD = '$CodMaterial'",$con);
									
		$Busca = mssql_fetch_row($rsMat);
	
	
		$txtprod[$CodMaterial][CODMATERIAL] = $CodMaterial;
		$txtprod[$CodMaterial][QUANTIDADE] = $QtdDevolucao;
		$txtprod[$CodMaterial][DESCRICAO] = $DescMaterial;
		$txtprod[$CodMaterial][UNIDADE] = $Busca[0];
	
		session_start(); 
	
		//PEGA A CHAVE DO ARRAY
		$chave = array_keys($txtprod);
	
		$cesta[$CodMaterial][CODMATERIAL] = $CodMaterial;
		$cesta[$CodMaterial][QUANTIDADE] = $QtdDevolucao;
		$cesta[$CodMaterial][DESCRICAO] = $DescMaterial;
		$cesta[$CodMaterial][UNIDADE] = $Busca[0];
	
		//GRAVA NA SESSÃO
		$_SESSION[cesta] = $cesta;
		$BuscaCodigo2 = '';
	
		$CodMaterial = '';
		$QtdDevolucao = '';
		$DescMaterial = '';
   }
  
?>


<div align="center">
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
                  <td><div align="center"><span class="style19">Devolu&ccedil;&atilde;o</span></div></td>
                </tr>
                <tr>
			  </table>
                <table width="682" border="0">
                  <tr>
                    <td class="style18"><div align="left">Usu&aacute;rio: <?php echo $nomeUsuario; ?>
                    </div></td>
                  </tr>
                </table>
                <table width="683" border="0">
                  <tr>
                    <td width="463"><div align="left"><span class="style18">Paciente</span>:</div> <div align="left"></div></td>
                    <td width="210"><div align="left"><span class="style18">Conv&ecirc;nio</span>:</div></td>
                  </tr>
                  <tr>
                    <td><div align="left">
                      <input name="edPaciente" type="text" class="textfield" id="edPaciente" value="<?php echo $edPaciente;?>"  onblur="buscaInstantanea('select pac_reg, pac_nome from pac where pac_reg = ','edDescricaoPaciente','edPaciente');" size="10" maxlength="10"/>
                      <a href="javascript:BuscarPaciente('edPaciente','edDescricaoPaciente');"><img src="imagens/27.png" alt="Buscar" width="18" height="18" border="0" /></a>
                      <input name="edDescricaoPaciente" type="text" class="textfield" id="edDescricaoPaciente" value="<?php echo  $edDescricaoPaciente;?>"  size="70" maxlength="70"/>
                      <script>
							document.frmCadastro.edDescricaoPaciente.readOnly=true;
					  </script>
                      </div><div align="left"></div></td>
                    <td><div align="left">
                      <input name="edConvenio" type="text" class="textfield" id="edConvenio"   value= "<?php echo $edConvenio; ?>" size="15" maxlength="15" />
                    </div></td>
                  </tr>
                </table>
                <table width="682" border="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <table width="682" border="0" bgcolor="#D4D0C8">
                  <tr>
                    <td width="62" class="style18"><div align="left">IH No.:                    </div></td>
                    <td width="58" class="style18"><div align="left">
                      <input name="edNoIH" type="text" class="textfield" id="edNoIH"   value= "<?php echo $edNoIH; ?>" size="5" maxlength="5" />
                      <script>
							document.frmCadastro.edNoIH.readOnly=true;
					  </script>                      
                    </div></td>
                    <td width="89" class="style18"><div align="left">Admiss&atilde;o:</div></td>
                    <td width="107" class="style18"><div align="left">
                      <input name="edAdmissao" type="text" class="textfield" id="edAdmissao"   value= "<?php echo $edAdmissao; ?>" size="15" maxlength="15" />
                      <script>
							document.frmCadastro.edAdmissao.readOnly=true;
					  </script>                      
                    </div></td>
                    <td width="56" class="style18"><div align="left">M&eacute;dico:</div></td>
                    <td width="284" class="style18"><div align="left">
                      <input name="edMedico" type="text" class="textfield" id="edMedico"   value= "<?php echo $edMedico; ?>" size="40" maxlength="0" />
                      <script>
							document.frmCadastro.edMedico.readOnly=true;
					  </script>                      
                    </div></td>
                  </tr>
                </table>
                <table width="681" border="0" bgcolor="#D4D0C8">
                  <tr>
                    <td width="63" class="style18"><div align="left">Unidade: </div></td>
                    <td width="260" class="style18"><div align="left">
                      <input name="edUnidade" type="text" class="textfield" id="edUnidade"   value= "<?php echo $edUnidade; ?>" size="46" maxlength="46" />
                      <script>
							document.frmCadastro.edUnidade.readOnly=true;
					  </script>                      
                    </div></td>
                    <td width="57" class="style18"><div align="left">Leito:</div></td>
                    <td width="283" class="style18"><div align="left">
                      <input name="edLeito" type="text" class="textfield" id="edDescricaoNaoConformidade6"   value= "<?php echo $edLeito; ?>" size="40" maxlength="40" />
                      <script>
							document.frmCadastro.edLeito.readOnly=true;
					  </script>                      
                    </div></td>
                  </tr>
                </table>
                <table width="681" border="0">
                  <tr>
                    <td width="175"><div align="left"><span class="style18">N&uacute;mero</span></div></td>
                    <td width="110"><div align="left"><span class="style18">Data</span></div></td>
                    <td width="52"><div align="left"><span class="style18">IH</span></div></td>
                    <td width="137"><div align="left"><span class="style18">Setor Solicitante</span></div></td>
                    <td width="185"><div align="left"><span class="style18">Subalmoxarifado</span></div></td>
                  </tr>
                  <tr>
                    <td><div align="left"><span class="style18">
                      <input name="edNumero" type="text" class="textfield" id="edDescricaoNaoConformidade7"   value= "<?php echo $edNumero; ?>" size="5" maxlength="5" />
                      <script>
							document.frmCadastro.edNumero.readOnly=true;
					  </script>                      
                    </span><span class="style18">
                    <input name="edNumeroComplemento" type="text" class="textfield" id="edDescricaoNaoConformidade8"   value= "<?php echo $edNumeroComplemento; ?>" size="15" maxlength="15" />
                      <script>
							document.frmCadastro.edNumeroComplemento.readOnly=true;
					  </script>                      
                    </span></div></td>
                    <td><div align="left">
                      <input name="edData" type="text" class="textfield" id="edData" value="<?php echo $edData;?>" size="19" maxlength="10"/>
                      <script>
							document.frmCadastro.edData.readOnly=true;
					  </script>                      
                    </div></td>
                    <td><div align="left"><span class="style18">
                      <input name="edInternamento" type="text" class="textfield" id="edDescricaoNaoConformidade9"   value= "<?php echo $edInternamento; ?>" size="5" maxlength="5" />
                      <script>
							document.frmCadastro.edInternamento.readOnly=true;
					  </script>                      
                    </span></div></td>
                    <td><div align="left"><span class="style18">
                      <input name="edSetor" type="text" class="textfield" id="edDescricaoNaoConformidade10"   value= "<?php echo $edSetor; ?>" size="20" maxlength="20" />
                      <script>
							document.frmCadastro.edSetor.readOnly=true;
					  </script>                      
                    </span></div></td>
                    <td><div align="left"><span class="style18">
                      <input name="edSubAlmoxarifado" type="text" class="textfield" id="edDescricaoNaoConformidade11"   value= "<?php echo $edSubAlmoxarifado; ?>" size="20" maxlength="20" />
                      <script>
							document.frmCadastro.edSubAlmoxarifado.readOnly=true;
					  </script>                      
                    </span></div></td>
                  </tr>
                </table>
                <table width="678" border="0" bgcolor="#CCE4CB">
                  <tr>
                    <td width="128" class="style18">Devolver do Per&iacute;odo:</td>
                    <td width="244"><input name="edDataInicial" type="text" class="textfield" id="edDataInicial" value="<?php echo $edDataInicial;?>" size="19" maxlength="10" onkeypress="MascaraData(this)"/> 
                    <span class="style18">a</span>                      <input name="edDataFinal" type="text" class="textfield" id="edDataFinal" value="<?php echo $edDataFinal;?>" size="19" maxlength="10" onkeypress="MascaraData(this)"/></td>
                    <td width="292"><input name="idSelecionar" type="button" class="botton1" id="idSelecionar" value="Seleciona Per&iacute;odo" onclick="return FiltraPeriodo()"/></td>
                  </tr>
                </table>
                <table width="682" border="0" bgcolor="D4D0C8">
                  <tr>
                    <td class="style18"><div align="left">&Uacute;ltimas Dispensa&ccedil;&otilde;es Semanais: </div></td>
                  </tr>
                </table>
               <?php
			      if ($acao != 'MUDARFILTRO')
				  {
				  $result = mssql_query("select top 1 convert(char(10),apm_dthr,103)+' - '+convert(char(5), apm_dthr,108) as Data, apm_pac, 
										apm_hsp, upper(psv_nome), 'Série/Num: '+rtrim(cast(apm_sma_serie as char)) +'/'+ rtrim(cast(apm_sma_num as char)) as Descricao, apm_sma_serie, apm_sma_num, convert(char(10),apm_dthr,120)
										from apm left join psv on psv_cod = apm_med
										where apm_pac = '$edPaciente' and apm_hsp = '$edNoIH' and apm_sma_num is not null
										order by apm_dthr desc",$con);
				  }
				  else
				  {
				  $result = mssql_query("select top 1 convert(char(10),apm_dthr,103)+' - '+convert(char(5), apm_dthr,108) as Data, apm_pac, 
										apm_hsp, upper(psv_nome), 'Série/Num: '+rtrim(cast(apm_sma_serie as char)) +'/'+ rtrim(cast(apm_sma_num as char)) as Descricao, apm_sma_serie, apm_sma_num, convert(char(10),apm_dthr,120)
										from apm left join psv on psv_cod = apm_med
										where apm_pac = '$edPaciente' and apm_hsp = '$edNoIH' and apm_sma_num is not null and apm_dthr between convert(datetime,'".$edDataInicial."',103) and convert(datetime,'".$edDataFinal."',103)
										order by apm_dthr desc",$con);
				  }

				  while ($LD = mssql_fetch_row($result))
				  {//bgcolor = "FFFFFF"
				    $DataApm = strtotime($LD[7]);


					if ($DataApm <= strtotime(date("Y-m-d")))
					  $cor = "#CAFFDB";
					else
					  $cor = "#CAEBFF";
					
					
					echo '<table width="682" border="0">';
					echo '  <tr>';
					echo '	<td width="379" bgcolor="'.$cor.'" class="texto"><div align="left"><strong>'.$LD[3].'</strong> </div></td>';
					echo '	<td width="130" bgcolor="'.$cor.'" class="texto"><div align="left"><strong>'.$LD[0].'</strong></div></td>';
					echo '	<td width="150" bgcolor="'.$cor.'" class="texto"><div align="left"><strong>'.$LD[4].'</strong></div></td>';
					if ($BuscaSerie == $LD[5] && $BuscaSMA == $LD[6])
 					  {
						  echo '	<td width="23" class="texto"><a href="javascript:RemoveDetalhe()"><img src="imagens/icoMenos.jpg" width="16" height="16" border="0"/></a></td>';
					  }
					else
 					  {
						  echo '	<td width="23" class="texto"><a href="javascript:Detalhe('.$LD[5].','.$LD[6].')"><img src="imagens/icoMais.jpg" width="16" height="16" border="0"/></a></td>';
					  }
					 
					echo '  </tr>';
					echo '</table>';
					
					if ($BuscaSerie == $LD[5] && $BuscaSMA == $LD[6])
					  {
						  $result2 = mssql_query("select ism_seq, ism_qtde_baixa, mat_desc_completa, ism_mat_cod
													from ism
													left join mat on mat_cod = ism_mat_cod
													where ism_sma_serie = '$BuscaSerie' and ism_sma_num = '$BuscaSMA' --and ism_status = 'X'",$con);
		
						  while ($Detalhes = mssql_fetch_row($result2))
						  {
							echo '<table width="656" border="0">';
							echo '  <tr>';
							echo '	<td width="47" bgcolor="#E2E2E2" align="center">'.$Detalhes[0].'</td>';
							echo '	<td width="47" bgcolor="#E2E2E2" align="center">'.$Detalhes[3].'</td>';
							echo '	<td width="492" bgcolor="#E2E2E2" align="left">'.$Detalhes[2].'</td>';
							echo '	<td width="74" bgcolor="#E2E2E2" align="left">'.number_format($Detalhes[1],0).'</td>';

							if ($DataApm <= strtotime(date("Y-m-d")))
							{
								echo '	<td width="23" class="texto"><a href="javascript:Devolver('.$Detalhes[3];
								echo ",'".trim($Detalhes[2])."'";
								echo ",'".trim($edPaciente)."'";
								echo ",'".trim($edNoIH)."'";
								echo ')"><img src="imagens/remove.jpg" width="16" height="16" border="0"/></a></td>';
								echo '  </tr>';
							}
							else
							{
								echo '	<td width="23" class="texto"><img src="imagens/icoBranco.jpg" width="16" height="16" border="0"/></a></td>';
								echo '  </tr>';
							}
							echo '</table>';
	
						  }
					  }
				  }

// Solicitacao diretamente no almoxarifado (SOLIC)

			      if ($acao != 'MUDARFILTRO')
				  {
					  $result = mssql_query("select top 1 convert(char(10),SMA_DATA,103)+' - '+convert(char(5), SMA_DATA,108) as Data, sma_pac_reg, 
											sma_hsp_num, '', 'Série/Num: '+rtrim(cast(SMA_SERIE as char)) +'/'+ rtrim(cast(SMA_NUM as char)) as Descricao, SMA_SERIE, SMA_NUM, convert(char(10),SMA_DATA,103)
											from sma
											where sma_pac_reg = '$edPaciente' and sma_hsp_num = '$edNoIH'
											and sma_num not in (select apm_sma_num from apm where apm_pac = '$edPaciente' and apm_hsp = '$edNoIH' and apm_sma_num is not null)
											and sma_tipo = 'S1'
											order by sma_data desc
											",$con);
				  }
				  else
				  {
					  $result = mssql_query("select top 1 convert(char(10),SMA_DATA,103)+' - '+convert(char(5), SMA_DATA,108) as Data, sma_pac_reg, 
											sma_hsp_num, '', 'Série/Num: '+rtrim(cast(SMA_SERIE as char)) +'/'+ rtrim(cast(SMA_NUM as char)) as Descricao, SMA_SERIE, SMA_NUM, convert(char(10),SMA_DATA,103)
											from sma
											where sma_pac_reg = '$edPaciente' and sma_hsp_num = '$edNoIH' and SMA_DATA between convert(datetime,'".$edDataInicial."',103) and convert(datetime,'".$edDataFinal."',103) 
											and sma_num not in (select apm_sma_num from apm where apm_pac = '$edPaciente' and apm_hsp = '$edNoIH' and apm_sma_num is not null)
											and sma_tipo = 'S1'
											order by sma_data desc",$con);
				  }

				  while ($LD = mssql_fetch_row($result))
				  {//bgcolor = "FFFFFF"

					if ($DataApm <= strtotime(date("Y-m-d")))
					  $cor = "#CAFFDB";
					else
					  $cor = "#CAEBFF";
					
					
					echo '<table width="682" border="0">';
					echo '  <tr>';
					echo '	<td width="379" bgcolor="'.$cor.'" class="texto"><div align="left"><strong>Solicitação via SOLIC</strong> </div></td>';
					echo '	<td width="130" bgcolor="'.$cor.'" class="texto"><div align="left"><strong>'.$LD[0].'</strong></div></td>';
					echo '	<td width="150" bgcolor="'.$cor.'" class="texto"><div align="left"><strong>'.$LD[4].'</strong></div></td>';
					if ($BuscaSerie == $LD[5] && $BuscaSMA == $LD[6])
 					  {
						  echo '	<td width="23" class="texto"><a href="javascript:RemoveDetalhe()"><img src="imagens/icoMenos.jpg" width="16" height="16" border="0"/></a></td>';
					  }
					else
 					  {
						  echo '	<td width="23" class="texto"><a href="javascript:Detalhe('.$LD[5].','.$LD[6].')"><img src="imagens/icoMais.jpg" width="16" height="16" border="0"/></a></td>';
					  }
					 
					echo '  </tr>';
					echo '</table>';
					
					if ($BuscaSerie == $LD[5] && $BuscaSMA == $LD[6])
					  {
						  $result2 = mssql_query("select ism_seq, ism_qtde_baixa, mat_desc_completa, ism_mat_cod
													from ism
													left join mat on mat_cod = ism_mat_cod
													where ism_sma_serie = '$BuscaSerie' and ism_sma_num = '$BuscaSMA' --and ism_status = 'X'",$con);
		
						  while ($Detalhes = mssql_fetch_row($result2))
						  {
							echo '<table width="656" border="0">';
							echo '  <tr>';
							echo '	<td width="47" bgcolor="#E2E2E2" align="center">'.$Detalhes[0].'</td>';
							echo '	<td width="47" bgcolor="#E2E2E2" align="center">'.$Detalhes[3].'</td>';
							echo '	<td width="492" bgcolor="#E2E2E2" align="left">'.$Detalhes[2].'</td>';
							echo '	<td width="74" bgcolor="#E2E2E2" align="left">'.number_format($Detalhes[1],0).'</td>';

							echo '	<td width="23" class="texto"><a href="javascript:Devolver('.$Detalhes[3];
							echo ",'".trim($Detalhes[2])."'";
							echo ",'".trim($edPaciente)."'";
							echo ",'".trim($edNoIH)."'";
							echo ')"><img src="imagens/remove.jpg" width="16" height="16" border="0"/></a></td>';
							echo '  </tr>';
							echo '</table>';
	
						  }
					  }
				  }
               ?>
                <table width="681" border="0" bgcolor="#fffff5" bordercolor="#A6A4A0">
                  <tr bgcolor="#D4D0C8">
                    <td width="97" class="style18">C&oacute;digo</td>
                    <td width="394" class="style18">Descri&ccedil;&atilde;o</td>
                    <td width="87" class="style18">Quantidade</td>
                    <td width="49" class="style18">Unidade</td>
                    <td width="32" class="style19">&nbsp;</td>
                  </tr>
              </table>
                <table width="681" height="60" border="0">
                  <tr>
                    <td width="681" valign="top">
                    <table width="681" border="0">
                      <?php
						   $chave_cesta = array_keys($_SESSION[cesta]);
							for($i=0; $i<sizeof($chave_cesta); $i++) 
							{ 
								  $indice = $chave_cesta[$i]; 
								  echo '<tr>';
								  echo '<td width="97" class="fontepequena" align="left">'.$_SESSION[cesta][$indice][CODMATERIAL].'</td>';
								  echo '<td width="394" class="fontepequena" align="left">'.$_SESSION[cesta][$indice][DESCRICAO].'</td>';
								  echo '<td width="87" class="fontepequena">'.$_SESSION[cesta][$indice][QUANTIDADE].'</td>';
								  echo '<td width="49" class="fontepequena">'.$_SESSION[cesta][$indice][UNIDADE].'</td>';
								  echo '<td width="32" class="style19"><a href="javascript:cestaout('."'".trim($_SESSION[cesta][$indice][CODMATERIAL])."','','1'".')"><img src="imagens/X2.jpg" alt="Excluir" border="0" /></a></td>';
								  echo '</tr>';
							}
                      ?>
                    </table></td>
                  </tr>
              </table>
                <table width="684" border="0">
                  <tr>
                    <td width="110"><div align="left"><span class="style18">Material</span></div></td>
                    <td width="274"><div align="left"></div></td>
                    <td width="286"><div align="left"></div></td>
                  </tr>
                  <tr>
                    <td><div align="left">
                      <input name="edMaterial" type="text" class="textfield1" id="edMaterial" value="<?php echo $edMaterial;?>"  onblur="buscaInstantanea2('select MAT_COD, MAT_DESC_RESUMIDA from mat where MAT_COD = ','edDescricaoMaterial','edMaterial');" size="8" maxlength="8"/>
                    <a href="javascript:BuscarMaterial('edMaterial','edDescricaoMaterial');"><img src="imagens/27.png" alt="Buscar" width="18" height="18" border="0" /></a></div></td>
                    <td><div align="left">
                      <input name="edDescricaoMaterial" type="text" class="textfield1" id="edDescricaoMaterial"   value= "<?php echo $edDescricaoMaterial; ?>" size="50" maxlength="50" />
                    </div></td>
                    <td><div align="left">
                      <input name="idInserir" type="button" class="botton1" id="idInserir" value="Inserir Devolu&ccedil;&atilde;o Item" onclick="return Devolver('<?php echo $edMaterial;?>','<?php echo $edDescricaoMaterial; ?>','<?php echo $edPaciente;?>','<?php echo $edNoIH; ?>')"/>
                    </div></td>
                  </tr>
              </table></td>
            </tr>
        </table>
          
	 </td>
  </table>  

  <table width="713" border="0" bgcolor="#FFFFFF">
     <td width="703">
		<div align="center">
		  <?php
			echo '<script>';                				  
			echo "var loc = 'layout/';";
			include_once("padrao/rodapeconsulta.php");
			echo '</script>';
          ?>
	    </div></td>
  </table>  

  <table width="643" border="0" bgcolor="#FFFFFF">
     <td><img src="imagens/divider.jpg"     border="0" /></td>
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

function Detalhe(serie, sma)
{
	document.frmCadastro.BuscaSerie.value=serie;
	document.frmCadastro.BuscaSMA.value=sma;
	document.frmCadastro.submit();	 
}

function RemoveDetalhe()
{
	document.frmCadastro.BuscaSerie.value='';
	document.frmCadastro.BuscaSMA.value='';
	document.frmCadastro.submit();	 
}


function cestaout(codigo, codigo2, ac)
{
	if (window.confirm("Confirma a exclusão do item?"))
	{
		if (ac == 1)
		{
			document.frmCadastro.acao.value="excluiritem1";
			document.frmCadastro.BuscaCodigo.value=codigo;
			document.frmCadastro.submit();	 
		}
	}
}

function Devolver(cod, des, pac, int)
{
   if (cod == '')
    {
     cod = document.frmCadastro.edMaterial.value;
	 des = document.frmCadastro.edDescricaoMaterial.value;
	}
	
   showPopWin("boxDevolucao.php?Codigo="+cod+"&Descricao="+des+"&Paciente="+pac+"&Internacao="+int+"", 400, 180, null);		   
}


function cesta(n)
{
	var camposok, errors;
		  errors = 'Caro usuário alguns erros ocorreram e seguem listados abaixo:\n';
		  errors += '\n';
		  camposok='S';

	if (n == 1)  // Inclue na cesta 1
	{
   // Se o nome estiver em branco exibe uma mensagem
			if (document.frmCadastro.edMaterial.value == '') 
			{
				camposok = 'N';
				errors += '- Campo Material está em branco! \n';	      
			}
	
			if (document.frmCadastro.edQuantidade.value == '') 
			{
				camposok = 'N';
				errors += '- Campo Quantidade está em branco! \n';	      
			}
		   
			
			if (camposok=='N') 
				{
				  alert(errors);
				  return false;
				}
            else 
 		       {
					document.frmCadastro.acao.value="InclueItem1";
					document.frmCadastro.submit();
				}			
	}

}

	// Função para validação do formulário
    function validar(v) 
	{
	   
	   	var camposok, errors;
		errors = 'Caro usuário alguns erros ocorreram e seguem listados abaixo:\n';
		errors += '\n';
		camposok='S';
		
		// Se o campo descricao estiver em branco

		if (document.frmCadastro.edPaciente.value == '') 
	   	{
			camposok = 'N';
			errors += '- Você deve selecionar um paciente para poder gravar! \n';	      
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
		}
	}


function LimparFormulario() 
{
	document.frmCadastro.acao.value="LIMPAR";
	document.frmCadastro.submit();
}	

function LocalizarBanco()
{
           showPopWin("padrao/Localizacao.php?Tabela=V01_Condutor&passo=1", 595, 406, null);// Passo é a quantidade de campos não int que deve pular
}

function Localiza(Busca) 
{
    Busca.style.backgroundColor='#E5E5E5'

	document.frmCadastro.acao.value="LOCALIZAR";
	document.frmCadastro.BuscaCodigo.value=Busca.value;
	
   	document.frmCadastro.submit();
}


/**
* Formata o Campo de acordo com a mascara informada.
* Ex de uso: onkeyup="AplicaMascara('00:00:00', this);".
* @author Igor Escobar (blog@igorescobar.com)
* @param Mascara String que possui a mascara de formatação do campo.
* @param elemento Campo que será formatado de acordo com a mascara, voce pode informar o id direto ou o próprio elemento usando o this.
* @returns {void}
*/
function AplicaMascara(Mascara, elemento){
    
    // Seta o elemento
    var elemento = (elemento) ? elemento : document.getElementById(elemento); 
    if(!elemento) return false;
    
    // Método que busca um determinado caractere ou string dentro de uma Array
    function in_array( oque, onde ){
            for(var i = 0 ; i <onde.length; i++){
            if(oque == onde[i]){
                return true;
            }
        }
        return false;
    }
    // Informa o array com todos os caracteres que podem ser considerados caracteres de mascara
    var SpecialChars = [':', '-', '.', '(',')', '/', ',', '_'];
    var oValue = elemento.value;
    var novo_valor = '';
    for( i = 0 ; i <oValue.length; i++){
        //Recebe o caractere de mascara atual
        var nowMask = Mascara.charAt(i);
        //Recebe o caractere do campo atual
        var nowLetter = oValue.charAt(i);
        //Aplica a masca
        if(in_array(nowMask, SpecialChars) == true && nowLetter != nowMask){
            novo_valor +=  nowMask + '' + nowLetter;
        } else {
            novo_valor += nowLetter;
        }
        // Remove regras duplicadas
        var DuplicatedMasks = nowMask+''+nowMask;
        while (novo_valor.indexOf(DuplicatedMasks)>= 0) {
         novo_valor = novo_valor.replace(DuplicatedMasks, nowMask);
        }
    }
    // Retorna o valor do elemento com seu novo valor
    elemento.value = novo_valor;
    
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
		document.frmCadastro.acao.value="DADOSPACIENTE";
		document.frmCadastro.submit();		
	}
}


// Função que realiza a busca instantânea
function buscaInstantanea2(termo,retorno,campobusca) {
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

function BuscarMaterial(Campo,Campo2)
{
     Pac = document.frmCadastro.edPaciente.value;
	 hsp = document.frmCadastro.edNoIH.value;

     showPopWin("padrao/buscarmaterial2.php?Tabela=MAT&Campo="+Campo+"&Campo2="+Campo2+"&Proximo=1&pac="+Pac+"&hsp="+hsp+"", 595, 401, null);		   
}


function BuscarPaciente(Campo,Campo2)
{
     showPopWin("padrao/buscarpaciente.php?Tabela=pac&Campo="+Campo+"&Campo2="+Campo2+"&Proximo=3&Cadastro=Condutor&Diretorio=cadastro"+"", 595, 401, null);		   
}

function FiltraPeriodo()
{
		if (document.frmCadastro.edDataInicial.value == '' || document.frmCadastro.edDataFinal.value == '')
  		  { document.frmCadastro.acao.value="";}
		else
		  { document.frmCadastro.acao.value="MUDARFILTRO";}
		document.frmCadastro.submit();		
}


	
</script>