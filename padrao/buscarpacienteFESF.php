<?php
/**
************************************************************************************************************************
Sistema: SGF
Desenvolvimento:  João Daniel
Última Alteração: 08/02/2011
Página: buscarpaciente.php
Resumo: Tela que possibilita a verificação nomes no cadastro evitando cadastro repetido
************************************************************************************************************************
**/
/**
 Instruções:
 				O form da janela chamadora deverá ter o nome frmCadastro e o mesmo possuir a variavel hidden BuscaCodigo
				Passar as seguintes variaveis:
				
				Tabela: Tabela que sera consultada
				
				Exemplo: Localizacao.php?Tabela=cor

**/

?>

<html>
<head>
<title>Buscar Paciente</title>
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

<script type='text/javascript' src='../functions/funcoes.js'></script>
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

</script>

<?php
if ($Tabela != 'winop')
{
    if ($Tabela != 'PACEMP')
	{
		echo '<script>';
		echo 'function retornar(codigo,descricao,Campo,Campo2) ';
		echo '{';
		if ($Tabela != 'REL')
		   {echo "	   window.top.frmCadastro.acao.value = 'DADOSPACIENTE';";}
		echo '     window.top.frmCadastro.'.$Campo.'.value = codigo;';
		echo '     window.top.frmCadastro.'.$Campo2.'.value = descricao;';
		echo '	   window.top.frmCadastro.RetornoCampo.value = codigo;';
		echo '	   window.top.frmCadastro.submit();';
		
		echo '	   window.top.hidePopWin(); ';
		echo '}';
		echo '</script>';
	}
	else
	{
		echo '<script>';
		echo 'function retornar(codigo,descricao,Campo,Campo2) ';
		echo '{';
		echo "	   window.top.frmCadastro.acao.value = 'LOCALIZA2';";
		echo '     window.top.frmCadastro.'.$Campo.'.value = codigo;';
		echo '     window.top.frmCadastro.'.$Campo2.'.value = descricao;';
		echo '	   window.top.frmCadastro.RetornoCampo.value = codigo;';
		echo '	   window.top.frmCadastro.submit();';
  	    echo '	   window.top.hidePopWin(); ';
		echo '}';
		echo '</script>';
	}
}
else
{
		echo '<script>';
		echo 'function retornar(codigo,descricao,Campo,Campo2) ';
		echo '{';
		echo "	   window.opener.frmCadastro.acao.value = 'DADOSPACIENTE';";
		echo '     window.opener.frmCadastro.'.$Campo.'.value = codigo;';
		echo '     window.opener.frmCadastro.'.$Campo2.'.value = descricao;';
		echo '	   window.opener.frmCadastro.RetornoCampo.value = codigo;';
		echo '	   window.opener.frmCadastro.submit();';
		echo '	   window.close();';
		echo '}';
		echo '</script>';
}
?>

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
    <input name="Campo" type="hidden" value="<?php echo $Campo;?>">
    <input name="Campo2" type="hidden" value="<?php echo $Campo2;?>">
    <input name="Cadastro" type="hidden" value="<?php echo $Cadastro;?>">
    <input name="Diretorio" type="hidden" value="<?php echo $Diretorio;?>">
    <input name="Proximo" type="hidden" value="<?php echo $Proximo;?>">  
<?php 
	//  Função para Conexão com o Banco
     include_once("../conexao.php");

  // Novo 01/04/2009

	$rsCampo = mssql_query($comando,$con);
	$Retorno = mssql_fetch_row($rsCampo);
	
	$Nome_Campo1 = $Retorno[0];
	
	//$Retorno = mssql_fetch_row($rsCampo);

	for ($i=1; $i<$Proximo; $i++)
	  {
		$Retorno = mssql_fetch_row($rsCampo);
	  }
	
	$Nome_Campo2 = $Retorno[0];
	$TipoCampo = $Retorno[1];

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
                    <td width="535" bgcolor="#FFFFFF"><img src="../imagens/vitalcare.jpg" width="137" height="45"></td>
                    <td width="42" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
              </table>
              </td>
            </tr>
          </table>
          <div id="Layer3" style="position:absolute; width:580px; height:303px; z-index:2; top: 60px; overflow: auto; left: 1px;">
    <table width="550" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
                  <tr>
                    <td bgcolor="#FFFFFF">Localizar</td>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
                  <tr>
                    <td bgcolor="#FFFFFF">
                        <label>
                          <input name="edLocalizar" type="text" class="textfield" id="edLocalizar" size="60" maxlength="100";>
                        </label>
                        <input name="btnLocalizar" type="button" class="Botao" value="Localizar" onClick="Confirmar()"></td>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
            </table> 			
            
            <table width="530" height="5" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
			  <tr>
     			<td width="530" align="left">
                  <img src="../imagens/divider.jpg" width="530" height="7" border="0" />
                </td>
			  </tr>
			</table>
		  
		  <table width="530" border="0" bordercolor="#000000" bgcolor="#666666">
			  <tr>
				<td width="68" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Código</div></td>
				<td width="425" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Descrição</div></td>
				<td width="37" bgcolor="#CCCCCC"><div align="center" class="style5"></div></td>
			  </tr>
    	  </table>
	      <table width="530" border="0" bordercolor="#000000" bgcolor="#000000">
			  <?php
//			  and pac_pront is not null 
				if (isset($acao) && $acao == "LOCALIZAR") 
				{
					$query = "select distinct pac_reg, pac_nome, pac_reg, pac_pront
							from pac
							left join hsp on hsp_pac = pac_reg
							where PAC_REG <> 0 and hsp_cnv='FES' and  pac_nome like '%".$edLocalizar."%' 
							order by pac_nome";
				}
				else
				{
					$query = "select distinct pac_reg, pac_nome, pac_reg, pac_pront
							from pac
							left join hsp on hsp_pac = pac_reg
							where PAC_REG <> 0 and hsp_cnv='FES'
							order by pac_nome";
				}
				//and hsp_dthra is null and PAC_DT_OBITO is null  
                $result = mssql_query($query,$con);
                
                if  (mssql_num_rows($result) <> 0)
                {
                    while ($Localiza = mssql_fetch_row($result)){
                         echo ' <tr bgcolor="#FFFFFF">';
                         echo '   <td width="68"><div align="center" class="letraCinza">'.$Localiza[0].'</div></td>';
                         echo '   <td width="425"><div align="left" class="letraCinza">'.$Localiza[1].'</div></td>';
                         echo '   <td width="37"><div align="center" class="letraCinza">';
                         echo '<a href="javascript:retornar(';
						 echo "'";
                         echo $Localiza[0];
						 echo "',";
						 echo "'";
                         echo $Localiza[1];
						 echo "',";
						 echo "'";
                         echo $Campo;
						 echo "',";
						 echo "'";
                         echo $Campo2;
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
function Confirmar()
{
		  document.frmLocalizacao.acao.value='LOCALIZAR';
		  document.frmLocalizacao.submit();
}

</script>
