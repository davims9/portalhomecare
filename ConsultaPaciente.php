<?php
session_start();
$usuario = $_SESSION["login"];
//$nomeUsuario = $_SESSION["nome_usuario"];

//$Usuario = $user[1][nome];
//include_once("funcoes/TestaLogin.php");

include_once("conexao.php");
extract($_REQUEST);
	

		
/**
************************
**/
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
body { font: normal 62.5% verdana; }
 
ul.menubar{
  margin: 0px;
  padding: 0px;
  background-color: #FFFFFF; /* IE6 Bug */
  font-size: 100%;
}
 
.tabela {
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
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
.style1 {	font-size: 18px;
	font-weight: bold;
}

.Botao {
	font-size: x-small;
	font-weight: bold;
	color: #707B77;
	background-color: #F5F5F3;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	background-image: url(imagens/btOK.jpg);
	background-repeat: no-repeat;
	width: 61px;
	height: 40px;
}

#apDiv1 {
	position:absolute;
	width:634px;
	height:115px;
	z-index:1;
	left: 332px;
	top: 228px;
	overflow: auto;
}
#apDiv2 {
	position:absolute;
	width:636px;
	height:115px;
	z-index:2;
	left: 331px;
	top: 385px;
	overflow: auto;
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

<?php

	if (isset($acao) && $acao == 'LIMPAR') 
	{
		$acao = '';
                $codigo_Setor = '';
                $codigo_Leito = '';
		
		$edPaciente = '';
		$edNoIH = '';
		$edDescricaoPaciente = '';
                $edDatanasc = '';
		$edInternamento = '';
		$edInternacao =  '';
		$edDataInternacao =  '';
                $edDataAlta = '';
		$edEvolucao = '';
		$edConvenio = '';

		$Localiza =  '';

		$edDataPRescricao1 = '';
		$edResponsavel1 = '';
		$edPrescricao1  = '';
		$edDataPRescricao2 = '';
		$edResponsavel2 =  '';
		$edPrescricao2  =  '';


	} 	


	if (isset($acao) && $acao == "DADOSPACIENTE") 
    {
		$rsCadastro = mssql_query("select  hsp_pac, hsp_num, hsp_stat, pac_nome, convert(char(10),pac_nasc, 103) as edDataNasc, convert(char(10),hsp_dthre,103) as Data_internacao, 
							convert(char(10),hsp_dthra,103) as Data_alta, cnv_nome, 
                                                        'Nro: '+ rtrim(cast(hsp_num as char)) + ',     Data: '+convert(char(10),hsp_dthre,103) + ',    Alta: ' + 
                                                         isnull(convert(char(10),hsp_dthra,103),'') as Descricao, smk_nome
							from 	hsp, pac, cnv, lac, smk		
					   where   hsp_pac = '$edPaciente' 
							and cnv_cod = hsp_cnv
							and pac_reg = hsp_pac
							and lac_pac = hsp_pac
							and lac_hsp = hsp_num
							and smk_cod = lac_cod
							and lac_dthrini = hsp_dthre
							and hsp_cnv='FES'
							order by hsp_num desc",$con);	
									
		$Localiza = mssql_fetch_row($rsCadastro);	

		$edNoIH = $Localiza[0];
		$edNoIH = $Localiza[1];
		$edDescricaoPaciente = $Localiza[3];
                $edDatanasc = $Localiza[4];
		$edInternamento = $Localiza[0];
		$edInternacao = $Localiza[8];
		$edDataInternacao = $Localiza[5];
                $edDataAlta = $Localiza[6];
		



		$rsCadastro = mssql_query("select  psc_pac, psc_hsp, psc_apm, convert(char(10),psc_dhini,103) as DataInicial, 
                                                   psv_nome, psc_obs  collate SQL_Latin1_General_CP1251_CI_AS as OBS, 
                                                   psc_txt, psc_txt_resumido, psc_calendario, convert(char(10),psc_dh_suspenso,103) as Data_suspenso
					   from 	psc, psv
					   where 	psc_pac = $edPaciente
					   		and psc_hsp = $edNoIH
							and psv_cod = psc_med 
					                and psc_tip = 'M'
							order by psc_dhini desc, psc_apm, psc_num",$con);	

		$Localiza = mssql_fetch_row($rsCadastro);	

		$edDataPRescricao1 = $Localiza[3];
		$edResponsavel1 = $Localiza[4];
		$edPrescricao1  = $Localiza[6];

                mssql_next_result($rsCadastro);

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
	  echo '	       </tr>';
	  echo '	  </table>   ';     
	  echo '</td></tr>';
	  echo '</table>';
  }
  ?>    

  <table width="701" height="565" border="0" align=top bgcolor="#FFFFFF">
	<td width="695" height="561" align="top" valign="top" >

		  <table width="697" height="545" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#999999">
            <tr>
              <td width="691" height="541" valign="top" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><table width="691" border="0" >
            <tr>
                    <td width="685" height="14" bgcolor="#999999" class="style18" ><div align="center">CONSULTA DE PACIENTE
                    </div></td>
                </tr>
                  
              </table>
                <table width="687" border="0" >
                  <tr>
                    <td width="675" height="25" class="style18"  >
                    <table width="681" border="0">
                      <tr>
                        <td width="571" height="40" colspan="2" valign="bottom"><div align="left">Paciente</div>                          <div align="left"></div>
                          <div align="left">
                            <input name="edPaciente" type="text" class="textfield" id="edPaciente" value="<?php echo $edPaciente;?>"  onblur="buscaInstantanea('select pac_reg, pac_nome from v_PAC_REG_FESF where pac_reg = ','edDescricaoPaciente','edPaciente');" size="10" maxlength="10"/>
                          <a href="javascript:BuscarPaciente('edPaciente','edDescricaoPaciente');"><img src="imagens/27.png" alt="Buscar" width="18" height="19" border="0" /></a>
                          <input name="edDescricaoPaciente" type="text" class="textfield" id="edDescricaoPaciente" value="<?php echo  $edDescricaoPaciente;?>"  size="70" maxlength="70"/>
                          </div>                          <div align="left"></div></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="440" class="style18" backgroundcolor="#000000"><div align="left">
                      <table width="675" border="0">
                        <tr>
                          <td width="86">Dt. Intern</td>
                          <td width="579"></td>
                        </tr>
                        <tr>
                          <td height="24"><input name="edDataInternacao" type="text" id="edDataInternacao" value="<?php echo $edDataInternacao;?>" size="7" maxlength="10" /></td>
                          <td></td>
                        </tr>
                      </table>
                      <table width="675" border="0">
                        <tr>
                          <td HEIGHT="20" width="675">Evolu&ccedil;&atilde;o Fisio</td>
                        </tr>
                        <tr>
                          <td height="132" valign="top">
                              <div id="apDiv1">
                                 <?php   
									$rsEvolucao = mssql_query("select cast(ltrim(replace(cast(rcl_txt as varchar(8000)), '@#410@1O', '')) as text) as rcl_txt, cnv_nome									
												from 	hsp, pac, cnv, rcl
												where   hsp_pac =  $edPaciente
													and rcl_hsp = $edNoIH
													and cnv_cod = hsp_cnv
													and pac_reg = hsp_pac
													and rcl_pac = hsp_pac
													and rcl_hsp = hsp_num
													and rcl_txt is not null
													and rcl_cod = 'EVOLMULT'
													order by rcl_dthr_atual desc",$con);	
							
									$edConvenio = $Localiza[1];
									while ($Localiza = mssql_fetch_row($rsEvolucao))
									  {
 											echo '<table width="600" height="111" border="0" class="tabela">';
											echo '  <tr>';
											echo '    <td align="left" valign="top">'.$Localiza[0].'</td>';
											echo '  </tr>';
											echo '</table>';
									  }
								?>
                              </div>
                          </td>

                        </tr>
                      </table>
                      <table width="675" height="155" border="0">
                            <tr>
                              <td width="671">Data &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Respons&aacute;vel  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      Prescri&ccedil;&atilde;o  </td>
                            </tr>
                            <tr>
                              <td height="142" >
                              		<div id="apDiv2">
                                             <?php   
                                                $rsPrescricao = mssql_query("select  psc_pac, psc_hsp, psc_apm, convert(char(10),psc_dhini,103) as DataInicial, 
                                                                                           psv_nome, psc_obs  collate SQL_Latin1_General_CP1251_CI_AS as OBS, 
                                                                                           psc_txt, psc_txt_resumido, psc_calendario, convert(char(10),psc_dh_suspenso,103) as Data_suspenso
                                                               from 	psc, psv
                                                               where 	psc_pac = $edPaciente
                                                                    and psc_hsp = $edNoIH
                                                                    and psv_cod = psc_med 
                                                                    order by psc_dhini desc, psc_apm, psc_num",$con);	

            
                                                while ($Localiza2 = mssql_fetch_row($rsPrescricao))
                                                  {
                                                        echo '<table width="600" height="111" border="0" class="tabela">';
                                                        echo '  <tr>';
                                                        echo '    <td align="left" valign="top">'.$Localiza2[3].'</td>';
                                                        echo '    <td align="left" valign="top">'.$Localiza2[4].'</td>';
                                                        echo '    <td align="left" valign="top">'.$Localiza2[6].'</td>';
                                                        echo '  </tr>';
                                                        echo '</table>';
                                                  }
                                             ?>
                                    </div>
                              </td>
                            </tr>
                      </table>
                      <table width="675" border="0">
                        <tr>
							<tr>
                            	 <td>&nbsp;</td>
							</tr>
                          	<td width="90"></td>
                          	<td width="180"></td>
							<td width="150">
                                <div align="right">
						          <input name="btEntrar" type="button" class="Botao" onClick="Sair('<?php echo trim($usuario) ?>')" value="               ">
					        	</div></td>
                          	<td width="350"></td>
                        </tr>
                      </table>
                  </tr>
                  <tr>
                    <td class="style18"><div align="left">
                        <script>
							document.frmCadastro.edDescricaoPaciente.readOnly=true;
					    </script>
                    </div>
                        <div> </div></td>
                  </tr>
                </table>                
            </tr>
            <?php
				if ($acesso == 1)
				  {
					echo '<tr>';
					echo '  <td height="46" valign="top" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><strong>USU&Aacute;RIO SEM ACESSO A ESSE RECURSO</strong></td>';
					echo '</tr>';
				  }
			?>
        </table>
          
	 </td>
  </table>  

<table width="643" border="0" bgcolor="#FFFFFF">
     <td><img src="imagens/divider.jpg"     border="0" /></td>
  </table>
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


function BuscarPaciente(Campo,Campo2)
{
     showPopWin("padrao/buscarpacienteFESF.php?Tabela=pac&Campo="+Campo+"&Campo2="+Campo2+"&Proximo=3&Cadastro=Condutor&Diretorio=cadastro"+"", 595, 401, null);		   
}

function Sair(U_user)
{
	if (U_user == 'FESF') 
	   {
        window.location="index.php";
	   }
	else
	   {
        window.location="Principal.php";
	   }
}



</script>

