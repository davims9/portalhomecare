<?php
/**
************************************************************************************************************************
Sistema: CIAC
Desenvolvimento:  João Daniel
Última Alteração: 01/04/2008
Página: Localizacao.php
Resumo: Tela que possibilita a verificação nomes no cadastro evitando cadastro repetido
************************************************************************************************************************
**/
/**
 Instruções:
 				O form da janela chamadora deverá ter o nome frmCadastro e o mesmo possuir a variavel hidden BuscaCodigo
				Passar as seguintes variaveis:
				
				Tabela: Tabela que sera consultada.
				
				Proximo: Campo que deverá ser mostrado na descrição (Se for omitido assumirá o valor 2)
				
				PR: Consulta especial, devera ser colocada nessa pagina (Se for omitido usará o nome da tabela)
				
				Exemplo: Localizacao.php?Tabela=cor&Proximo=3

**/

$comando = "PR_Localizacao 'CamposTabela','$Tabela','0'";


?>

<html>
<head>
<title>Cadastro do Tipo de Mem&oacute;ria</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">

body 
{
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>
<script type='text/javascript' src='../functions/funcoes.js'> </script>
<script src="../layout/xaramenu.js"></script>
<script language="JavaScript" type="text/JavaScript">

<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->

function retornar2(codigo1,codigo2) 
{
	    window.top.frmCadastro.acao.value = 'LOCALIZAR';
	    window.top.frmCadastro.edNumPermissao.value = codigo1;
	    window.top.frmCadastro.edNumTipoPermissao.value = codigo2;
	    window.top.frmCadastro.submit();
		window.top.hidePopWin();
}
</script>
<?php
    if (! isset($Proximo))
	  $Proximo = 2;
?>
<form name="frmLocalizacao" id="frmLocalizacao">

	<!-- Variacao de ação do formulário -->
    <input name="acao" type="hidden" value="teste">
    <input name="Tabela" type="hidden" value="<?php echo $Tabela;?>">
    <input name="VarBusca" type="hidden" value="<?php echo $VarBusca;?>">
    <input name="camposel" type="hidden" value="<?php echo $camposel;?>">
    <input name="Todos" type="hidden" value="<?php echo $Todos;?>">
    <input name="MaisCampos" type="hidden" value="<?php echo $MaisCampos;?>">
    <input name="Proximo" type="hidden" value="<?php echo $Proximo;?>">
    
	
<?php 
	//  Função para Conexão com o Banco
     include_once("../../conexao13.php");

// Novo 18/06/2008

	$rsCampo = mssql_query($comando,$con13);
	$Retorno = mssql_fetch_row($rsCampo);
	
	$Nome_Campo1 = $Retorno[0];
	
	//$Retorno = mssql_fetch_row($rsCampo);

	for ($i=1; $i<$Proximo; $i++)
	  {
		$Retorno = mssql_fetch_row($rsCampo);
	  }
	
	$Nome_Campo2 = $Retorno[0];
	$TipoCampo = $Retorno[1];


     if (isset($acao) && $acao == "Localizar") 
     {
		if (trim($TipoCampo) != 'datetime') // Essa condição testa se o segundo campo de retorno é to tipo datetime para colocar a mascara correta.
		{		
			if ($Todos == 1)
			$ComandoConsulta = "select PermissaoPessoa.NumeroPermissao, PermissaoPessoa.NumeroTipoPermissao, Alvara.NumeroAlvara, Pessoa.NomePessoa 
								from PermissaoPessoa, alvara, Pessoa
								where Alvara.NumeroPermissao = PermissaoPessoa.NumeroPermissao and
									  Alvara.NumeroTipoPermissao = PermissaoPessoa.NumeroTipoPermissao and
									  Pessoa.NumeroPessoa = PermissaoPessoa.NumeroPessoa and (PermissaoPessoa.NumeroTipoPessoa = '1' or PermissaoPessoa.NumeroTipoPessoa = '6')
								order by NumeroAlvara";
			else
			

			$ComandoConsulta = "select PermissaoPessoa.NumeroPermissao, PermissaoPessoa.NumeroTipoPermissao, Alvara.NumeroAlvara, Pessoa.NomePessoa 
								from PermissaoPessoa, alvara, Pessoa
								where Alvara.NumeroPermissao = PermissaoPessoa.NumeroPermissao and
									  Alvara.NumeroTipoPermissao = PermissaoPessoa.NumeroTipoPermissao and
									  Pessoa.NumeroPessoa = PermissaoPessoa.NumeroPessoa and (PermissaoPessoa.NumeroTipoPessoa = '1' or PermissaoPessoa.NumeroTipoPessoa = '6')
									  and $camposel like '%".$VarBusca."%'
								order by NumeroAlvara";
		}
		else
		{		
			if ($Todos == 1)
			$ComandoConsulta = "select ".$Nome_Campo1.", convert(char(10),".$Nome_Campo2.",103) from $Tabela order by ".$Nome_Campo2."";
			else
			$ComandoConsulta = "select ".$Nome_Campo1.", convert(char(10),".$Nome_Campo2.",103) from $Tabela where $camposel like '%".$VarBusca."%' order by ".$Nome_Campo2."";
		}
		
	 }

// Comentado no novo retirar para retornar ao antigo
//     if (isset($acao) && $acao == "Localizar") 
//     {
//		if ($Todos == 1)
//		$ComandoConsulta = "select * from $Tabela";
//		else
//		$ComandoConsulta = "select * from $Tabela where $camposel like '%".$VarBusca."%'";
//	 }

// Fim Novo 18/06/2008

?>

<table width="591" height="396" border="0" bordercolor="#000000" bgcolor="#000000">
  <tr>
    <td width="770" height="" bordercolor="#000000" bgcolor="#FFFFFF">
		<div id="Layer1" style="position:absolute; width:590px; height:45px; z-index:1; left: 1px; top: 1px;">
          <table width="589" border="0" bordercolor="#000000" bgcolor="#000000">
            <tr>
              <td width="575" height="20" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
              <table width="575" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
                  <tr>
                    <td width="535" bgcolor="#FFFFFF"><img src="../imagens/SIGETAXLocalizar.gif" width="155" height="19"></td>
                    <td width="42" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
              </table>
              </td>
            </tr>
          </table>
	<div id="Layer2" style="position:absolute; width:196px; height:35px; z-index:1; left: 346px; top: 355px;">
<table width="195" border="0">
                    <tr>
                      <td width="5">&nbsp;</td>
                      <td width="180">
						<script>
							if(typeof(loc)=="undefined"||loc==""){var loc="";if(document.body&&document.body.innerHTML){var tt=document.body.innerHTML;var ml=tt.match(/["']([^'"]*)btlistadescricao.js["']/i);if(ml && ml.length > 1) loc=ml[1];}}
	
							var bd=0
							document.write("<style type=\"text/css\">");
							document.write("\n<!--\n");
							document.write(".btlistadescricao_menu {z-index:999;border-color:#000000;border-style:solid;border-width:"+bd+"px 0px "+bd+"px 0px;background-color:#5a5a50;position:absolute;left:0px;top:0px;visibility:hidden;}");
							document.write(".btlistadescricao_plain, a.btlistadescricao_plain:link, a.btlistadescricao_plain:visited{text-align:left;background-color:#5a5a50;color:#ffffff;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:11pt;font-family:Arial, Helvetica, sans-serif;}");
							document.write("a.btlistadescricao_plain:hover, a.btlistadescricao_plain:active{background-color:#9c9c7d;color:#000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:11pt;font-family:Arial, Helvetica, sans-serif;}");
							document.write("\n-->\n");
							document.write("</style>");
							
							var fc=0x000000;
							var bc=0x9c9c7d;
							if(typeof(frames)=="undefined"){var frames=0;}
							
							startMainMenu("../layout/btlistadescricao_left.gif",20,13,2,0,0)
							mainMenuItem("../layout/btlistadescricao_b1",".gif",20,85,"javascript:validarFormulario();","","Ignorar e Gravar",2,2,"btlistadescricao_plain");
							mainMenuItem("../layout/btlistadescricao_b2",".gif",20,85,"javascript:window.top.hidePopWin();","","Sair",2,2,"btlistadescricao_plain");
							endMainMenu("../layout/btlistadescricao_right.gif",20,13)
							
							loc="";
						</script>
					  </td>
                    </tr>
            </table>
		  </div>
		  <div id="Layer3" style="position:absolute; width:580px; height:288px; z-index:2; top: 48px; overflow: auto; left: 4px;">
		<table width="550" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
                  <tr>
                    <td width="387" bgcolor="#FFFFFF">Campo</td>
                    <td width="153" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
                  <tr>
                    <td bgcolor="#FFFFFF"><label>
                    <select name="edCampos" class="textfield" id="edCampos">
							<?php
								// Retorna do banco todos os tipos de contrato e preenche o comboBox com a descrição e o código
								$rsCampo = mssql_query($comando,$con13);
									
								// percorre preenchendo todos os Tipo de Software
								while($Campos = mssql_fetch_row($rsCampo))
								{
										
									// armazena na variavel os nomes dos campos
									$Nome_Campos = $Campos[0];
  
							?>
						<option value="<?php echo $Nome_Campos; ?>" <?php if ($Nome_Campos == $edCampos) echo "selected" ?>> <?php echo $Nome_Campos; }?> </option>
				    </select>
                    </label></td>
                    <td bgcolor="#FFFFFF"><label>
                      <input type="checkbox" name="box" id="box" onChange="checa_campo(this.name,'','<?php echo $Tabela; ?>')">
                    </label>
                      <span class="style2">Todos os registros</span></td>
                  </tr>
                  <tr>
                    <td bgcolor="#FFFFFF">Localizar</td>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
                  <tr>
                    <td bgcolor="#FFFFFF">
                        <label>
                          <input name="edLocalizar" type="text" class="textfield" id="edLocalizar" size="60" maxlength="100" onKeyUp="checa_campo(this.name,this.value, '<?php echo $Tabela; ?>')";>
                        </label>
                        <input name="btnNovo" type="button" class="Botao" value="Confirmar" onClick="Confirmar('<?php echo $Tabela; ?>')"></td>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
            </table> 			
            
            
            
            <table width="530" height="5" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
			  <tr>
     			<td width="530" align="left">
                  <img src="../imagens/linha.gif" width="530" height="7" border="0" />
                </td>
			  </tr>
			</table>
		  
		  <table width="532" border="0" bordercolor="#000000" bgcolor="#666666">
			  <tr>
				<td width="135" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Código</div></td>
				<td width="360" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Descrição</div></td>
				<td width="37" bgcolor="#CCCCCC"><div align="center" class="style5"></div></td>
			  </tr>
    	  </table>
	      <table width="530" border="0" bordercolor="#000000" bgcolor="#000000">
			  <?php
                $result = mssql_query($ComandoConsulta,$con13);
                
                if  (mssql_num_rows($result) <> 0)
                {
                    while ($Localiza = mssql_fetch_row($result)){
                         echo ' <tr bgcolor="#FFFFFF">';
                         echo '   <td width="135"><div align="center" class="letraCinza">'.$Localiza[2].'</div></td>';
                         echo '   <td width="360"><div align="left" class="letraCinza">'.$Localiza[3].'</div></td>';
                         echo '   <td width="37"><div align="center" class="letraCinza">';

							 echo '<a href="javascript:retornar2(';
							 echo "'";
        	                 echo $Localiza[0];
							 echo "',";
							 echo "'";
        	                 echo $Localiza[1];
							 echo "'";
                	       	 echo ")";
                    	     echo '">';
                         echo '<img src="../imagens/adicionar1.gif" alt="Editar" width="13" height="13" border="0">';
                         echo '</a>';
                         echo '</div></td>';
                         echo ' </tr>';
                    }
                }
              ?>
    	  </table>
		  </div>
		</div>
	</td>
  </tr>
</table>
</form>
</body>
</html>
<script>
function Confirmar(command)
{
		  document.frmLocalizacao.acao.value='Localizar';
		  document.frmLocalizacao.VarBusca.value=document.frmLocalizacao.edLocalizar.value;
		  document.frmLocalizacao.Tabela.value=command;
		  document.frmLocalizacao.camposel.value=document.frmLocalizacao.edCampos.value;
		  document.frmLocalizacao.Proximo.value=document.frmLocalizacao.Proximo.value;
		  document.frmLocalizacao.Todos.value='0';
		  document.frmLocalizacao.submit();
}

function checa_campo(campo,opc,command)
{
	switch (campo)
	{
		case "edLocalizar" : {
			if(window.event.keyCode == 13)
			{
 			  document.frmLocalizacao.acao.value='Localizar';
 			  document.frmLocalizacao.VarBusca.value=opc;
 			  document.frmLocalizacao.Tabela.value=command;
 			  document.frmLocalizacao.camposel.value=document.frmLocalizacao.edCampos.value;
			  document.frmLocalizacao.Proximo.value=document.frmLocalizacao.Proximo.value;			  
			  document.frmLocalizacao.Todos.value='0';
			  document.frmLocalizacao.submit();
			}
			break;
		}	
		case "box" : {
		  if (document.frmLocalizacao.box.checked) 
			{
 			  document.frmLocalizacao.acao.value='Localizar';
 			  document.frmLocalizacao.Tabela.value=command;
 			  document.frmLocalizacao.camposel.value=document.frmLocalizacao.edCampos.value;
		  	  document.frmLocalizacao.Proximo.value=document.frmLocalizacao.Proximo.value;
		  	  document.frmLocalizacao.Todos.value='1';
			  document.frmLocalizacao.submit();	
			}	
			break;
		}		
	}
}

</script>
