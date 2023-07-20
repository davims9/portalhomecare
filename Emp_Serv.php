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
							and fnc_descr like 'Cad- Empresas de Unid%'",$con);
							
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
	border-style: groove;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
}

.fontepequena {
	font-size: 10px;
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
.style20 {color: #FFFFFF}
.botton1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #CCC;
	text-decoration: none;
	font-weight: bold;
	background-color: #F00;
	border: thin outset #666;
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
	   alert("Informações foram salvas com sucesso!");
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
	if (isset($acao) && $acao == "LOCALIZAR") 
    {
		$rsCadastro = mssql_query("select emp_smk_emp_cod, emp_nome_fantasia, emp_smk_smk_cod, smk_nome from emp_smk
									left join smk on smk_cod = emp_smk_smk_cod
									left join emp on emp_cod = emp_smk_emp_cod
									where  smk_tipo = 'S' and emp_status = 'A' and emp_smk_emp_cod = '$edEmpresa'",$con);

	 // Preenche cesta - Peças
		unset($cesta2);
		session_unregister(cesta2);
		
		
		while($Localiza = mssql_fetch_row($rsCadastro))
		{

			$txtprod[$Localiza[2]][CODSERVICO] = $Localiza[2];
			$txtprod[$$Localiza[2]][DESCRICAO] = $Localiza[3];
			
			session_start(); 

			$cesta2[$Localiza[2]][CODSERVICO] = $Localiza[2];
			$cesta2[$Localiza[2]][DESCRICAO] = $Localiza[3];

			//GRAVA NA SESSÃO
			$_SESSION[cesta2] = $cesta2;
  		    $_SESSION["SubAcao"] = 'LOCALIZAR';		
			
			$edDescricaoEmpresa = $Localiza[1];
		}	
	}	

	if (isset($acao) && $acao == 'ALTERAR') 
	{
  		    $EMPRESA = $edEmpresa;

  		    $result = mssql_query("delete emp_smk where emp_smk_emp_cod = $EMPRESA",$con);

			$chave_cesta = array_keys($_SESSION[cesta2]);
			$erro = 0;
			for($i=0; $i<sizeof($chave_cesta); $i++) 
			{ 
				$indice = $chave_cesta[$i]; 

				$CODSERVICO = $_SESSION[cesta2][$indice][CODSERVICO];  
				$TIPOSERVICO = 'S';  
				
				$result = mssql_query("insert into emp_smk (emp_smk_emp_cod, emp_smk_smk_tipo, emp_smk_smk_cod) values ($EMPRESA, '$TIPOSERVICO', '$CODSERVICO')",$con);
				$testa2 = mssql_fetch_row($result);
				
			}	

			echo '<script>' ;
			echo '   limparvariaveis("acao");'; // Função necessaria para se evitar que um refresh na pagina gere um registro duplicado
			echo '</script>' ;
			$acao = '';
			$_SESSION["SubAcao"] = '';		
			
			$edServico = '';
			$edDescricaoServico = '';
			$_SESSION["SubAcao"] = '';		
			$edEmpresa = '';
			$edDescricaoEmpresa = '';
	}


	if (isset($acao) && $acao == 'INCLUIR') 
	{
									   
				// Gravação da tabela de movimentacao de material - Cesta1
				$chave_cesta = array_keys($_SESSION[cesta2]);
				$erro = 0;
				for($i=0; $i<sizeof($chave_cesta); $i++) 
				{ 
					$indice = $chave_cesta[$i]; 

					$EMPRESA = $edEmpresa;
					$CODSERVICO = $_SESSION[cesta2][$indice][CODSERVICO];  
					$TIPOSERVICO = 'S';  
					
					$result = mssql_query("insert into emp_smk (emp_smk_emp_cod, emp_smk_smk_tipo, emp_smk_smk_cod) values ($EMPRESA, '$TIPOSERVICO', '$CODSERVICO')",$con);
					$testa2 = mssql_fetch_row($result);
					
				}	
	
				echo '<script>' ;
				echo '   limparvariaveis("acao");'; // Função necessaria para se evitar que um refresh na pagina gere um registro duplicado
  			    echo '</script>' ;
				$acao = '';
				$_SESSION["SubAcao"] = '';		
				
				$edServico = '';
				$edDescricaoServico = '';
				$_SESSION["SubAcao"] = '';		
				$edEmpresa = '';
				$edDescricaoEmpresa = '';
	}   
	
	
	
	if (isset($acao) && $acao == 'LIMPAR') 
	{
		$acao = '';
		$edServico = '';
		$edDescricaoServico = '';
	    $_SESSION["SubAcao"] = '';		
		$edEmpresa = '';
		$edDescricaoEmpresa = '';
		// Limpa o vetor cesta
		unset($cesta2);
		session_unregister(cesta2);

	} 	
	
	
   if (isset($acao) and $acao == "excluiritem1")
    { 
	   $chave_cesta_anterior = array_keys($_SESSION[cesta2]);
	   unset($_SESSION[cesta2][$BuscaCodigo]);
    }
	
// Manipulacao de inclusão das cestas

   if (isset($acao) and $acao == "InclueItem1")
   {
			
		$txtprod[$edServico][CODSERVICO] = $edServico;
		$txtprod[$edServico][DESCRICAO] = $edDescricaoServico;

		session_start(); 

		//PEGA A CHAVE DO ARRAY
		$chave = array_keys($txtprod);

		$cesta2[$edServico][CODSERVICO] = $edServico;
		$cesta2[$edServico][DESCRICAO] = $edDescricaoServico;

		//GRAVA NA SESSÃO
		$_SESSION[cesta2] = $cesta2;
		$BuscaCodigo2 = '';

		$edServico = '';
		$edDescricaoServico = '';
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
                  <td><div align="center"><span class="style19">Empresa Servi&ccedil;os</span></div></td>
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
                    <td width="463"><div align="left"><span class="style18">Empresa</span>:</div> <div align="left"></div></td>
                  </tr>
                  <tr>
                    <td><div align="left">
                      <input name="edEmpresa" type="text" class="textfield" id="edEmpresa" value="<?php echo $edEmpresa;?>"  onblur="buscaInstantanea2('select emp_cod, emp_nome_fantasia from emp where emp_cod = ','edDescricaoEmpresa','edEmpresa');" size="10" maxlength="10"/>
                      <a href="javascript:BuscarEmpresa('edEmpresa','edDescricaoEmpresa');"><img src="imagens/27.png" alt="Buscar" width="18" height="18" border="0" /></a>
                      <input name="edDescricaoEmpresa" type="text" class="textfield" id="edDescricaoEmpresa" value="<?php echo  $edDescricaoEmpresa;?>"  size="70" maxlength="70"/>
                      <script>
							document.frmCadastro.edDescricaoEmpresa.readOnly=true;
					  </script>
                      </div><div align="left"></div></td>
                  </tr>
                </table>
                <table width="682" border="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <table width="681" border="0" bgcolor="#fffff5" bordercolor="#A6A4A0">
                  <tr bgcolor="#D4D0C8">
                    <td width="97" class="style19">C&oacute;digo</td>
                    <td width="394" class="style19">Descri&ccedil;&atilde;o</td>
                    <td width="32" class="style19">&nbsp;</td>
                  </tr>
              </table>
                <table width="681" height="60" border="0">
                  <tr>
                    <td width="681" valign="top">
                    <table width="681" border="0">
                      <?php
									   $chave_cesta = array_keys($_SESSION[cesta2]);
										for($i=0; $i<sizeof($chave_cesta); $i++) 
										{ 
											  $indice = $chave_cesta[$i]; 
											  echo '<td width="97" class="fontepequena" align="left">'.$_SESSION[cesta2][$indice][CODSERVICO].'</td>';
											  echo '<td width="394" class="fontepequena" align="left">'.$_SESSION[cesta2][$indice][DESCRICAO].'</td>';
											  echo '<td width="32" class="style19"><a href="javascript:cestaout('."'".$_SESSION[cesta2][$indice][CODSERVICO]."','','1'".')"><img src="imagens/X2.jpg" alt="Excluir" border="0" /></a></td>';
											  echo '</tr>';
										}
                      ?>
                    </table></td>
                  </tr>
              </table>
                <table width="466" border="0">
                  <tr>
                    <td width="80"><div align="left"><span class="style18">Codigo</span></div></td>
                    <td width="290"><div align="left"></div></td>
                    <td width="82"><div align="left"></div></td>
                  </tr>
              </table>
                <table width="466" border="0">
                  <tr>
                    <td width="90">
                      <div align="left">
                        <input name="edServico" type="text" class="textfield" id="edServico" value="<?php echo $edServico;?>"  onblur="buscaInstantanea('select smk_cod, smk_nome from smk where smk_cod=','edDescricaoServico','edServico');" size="8" maxlength="8"/>
                    </a><a href="javascript:BuscarServico('edServico','edDescricaoServico');"><img src="imagens/27.png" alt="Buscar" width="18" height="18" border="0" /></a></div></td>
                    <td width="281">
                      <div align="left">
                        <input name="edDescricaoServico" type="text" class="textfield" id="edDescricaoServico"   value= "<?php echo $edDescricaoServico; ?>" size="50" maxlength="50" />
                        <script>
								  document.frmCadastro.edDescricaoServico.readOnly=true;
					  </script>
                    </div></td>
                    <td width="81"><label>
                      <input name="idInserir" type="button" class="botton1" id="idInserir" value="Inserir" onclick="return cesta(1)"/>
                    </label></td>
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
				if ($chamada != 1)
  				{
					if ($_SESSION["SubAcao"] != "LOCALIZAR")
					{
						echo '<script>';                				  
						echo "var loc = 'layout/';";
						include_once("padrao/rodapeconsulta.php");
						echo '</script>';
					}
					else
					{
						echo '<script>';                				  
						echo "var loc = 'layout/';";
						include_once("padrao/rodapesemgravar.php");
						echo '</script>';
					}
				}
          ?>
	    </div></td>
  </table>  

  <table width="711" border="0" bgcolor="#FFFFFF">
     <td width="705"><img src="imagens/divider.jpg"     border="0" /></td>
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



function cesta(n)
{
	var camposok, errors;
		  errors = 'Caro usuário alguns erros ocorreram e seguem listados abaixo:\n';
		  errors += '\n';
		  camposok='S';

	if (n == 1)  // Inclue na cesta 1
	{
   // Se o nome estiver em branco exibe uma mensagem
			if (document.frmCadastro.edServico.value == '') 
			{
				camposok = 'N';
				errors += '- Campo Material está em branco! \n';	      
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

		if (document.frmCadastro.edEmpresa.value == '') 
	   	{
			camposok = 'N';
			errors += '- Você deve selecionar uma empresa para poder gravar! \n';	      
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
			termo = termo + "\'"+document.getElementById(campobusca).value+ "\'";
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

// Função que realiza a busca instantânea
function buscaInstantanea2(termo,retorno,campobusca) {
   if(document.getElementById) { // Para os browsers complacentes com o DOM W3C.
		//var termo = document.getElementById('q').value; // Pega o termo digitado no campo de texto.
		var exibeResultado = document.getElementById(retorno); // div que exibirá o resultado da busca.
		if(termo !== "" && termo !== null && termo.length >= 3) { // Verifica se o campo não está vazio, ou se foi digitado no mínimo três caracteres.
			var ajax = openAjax(); // Inicia o Ajax.
			termo = termo + "\'"+document.getElementById(campobusca).value+ "\'";
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
		document.frmCadastro.acao.value="LOCALIZAR";
		document.frmCadastro.submit();		
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


function BuscarServico(Campo,Campo2)
{
           showPopWin("padrao/buscarservico.php?Tabela=MAT&Campo="+Campo+"&Campo2="+Campo2+"&Proximo=1"+"", 595, 401, null);		   
}


function BuscarEmpresa(Campo,Campo2)
{
           showPopWin("padrao/buscaempresa.php?Tabela=pac&Campo="+Campo+"&Campo2="+Campo2+"&Proximo=3&Cadastro=Condutor&Diretorio=cadastro"+"", 595, 401, null);		   
}

	
	
</script>