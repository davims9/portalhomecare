
<?php
session_start();
$usuario = $_SESSION["login"];
$nomeUsuario = $_SESSION["nome_usuario"];

//$Usuario = $user[1][nome];
//include_once("funcoes/TestaLogin.php");

include_once("conexao.php");
extract($_REQUEST);



$rsPermissao = mssql_query("select distinct fnc_descr from usr
							left join acs on acs_grp_cod = usr_grp
							left join fnc on fnc_cod = acs_fnc_cod
							where usr_login = '$usuario'
							and fnc_descr like 'Cx- Recebimentos%'",$con);

$per = mssql_fetch_row($rsPermissao);

if (trim($per[0]) == '')
  {
    header("location: principal.php?acesso=1");
  }

/**
************************************************************************************************************************
Sistema: PORTAL HOMECARE
Desenvolvimento:  Joуo Daniel Queiroz Lima
кltima Alteraчуo: 12/09/2011
Pсgina: Pac_Emp.php
Resumo: Tela de relacionamento de Paciente e Empresa
************************************************************************************************************************
**/
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.textfield1 {	font-family: Arial, Helvetica, sans-serif;
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
</style>
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
	   alert("Informaчѕes foram salvas com sucesso!");
	   document.frmCadastro.acao.value="LIMPAR";
	   document.frmCadastro.submit();
	}

</script>
<form name="frmCadastro" id="frmCadastro" method="post">

	<!-- Variacao de aчуo do formulсrio -->
    <input name="acao" type="hidden" value="<?php echo $acao; ?>">
    <input name="BuscaCodigo" type="hidden" value="<?php echo $BuscaCodigo; ?>">
    <input name="RetornoCampo" type="hidden" value="<?php echo $RetornoCampo; ?>">

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
      echo '<script Webstyle4 src="imagens/menusmart.js"></script>';
//						$principal = false;
						// Funчуo para criar o cabeчalho e menu da pсgina
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
                  <td><div align="center"><span class="style19">Paciente Empresa</span></div></td>
                </tr>
                <tr>
			  </table>
                <table width="682" border="0">
                  <tr>
                    <td class="style18"><div align="left">Usu&aacute;rio: <?php echo $nomeUsuario; ?>
                    </div></td>
                  </tr>
                </table>
                <table width="688" border="0">
                  <tr>
                    <td width="678" height="36">&nbsp;</td>
                  </tr>
                </table>
                <table width="687" border="0">
                  <tr>
                    <td width="80">&nbsp;</td>
                    <td width="597" class="texto" align="left"><span id="spryselect1">
                      <label for="selRel" class="texto">Selecione o nome de um relat&oacute;rio</label>
                      <br />
                      <select name="selRel" class="textfield1" id="selRel"  onchange="selecionaRelatorio(this.value)">>
                        <option value="SEL" <?php if ($acao == 'SEL') {echo 'selected="selected"';}?>>Selecione o Relat&oacute;rio Desejado</option>
                        <option value="RelFisio" <?php if ($acao == 'RelFisio') {echo 'selected="selected"';}?>>Relat&oacute;rio de Fisioterapia</option>
                        <option value="RelPacEmp" <?php if ($acao == 'RelPacEmp') {echo 'selected="selected"';}?>>Relaчуo Paciente Empresa</option>
                        <option value="RelValMod" <?php if ($acao == 'RelValMod') {echo 'selected="selected"';}?>>Relat&oacute;rio Valor Por Modalidade</option>
                        <option value="RelLucMod" <?php if ($acao == 'RelLucMod') {echo 'selected="selected"';}?>>Relat&oacute;rio Lucro por Modalidade</option>
                        <option value="RelVigi" <?php if ($acao == 'RelVigi') {echo 'selected="selected"';}?>>Relat Pac ID/AD por sexo e faixa etária</option>
                        <option value="RelGlosa" <?php if ($acao == 'RelGlosa') {echo 'selected="selected"';}?>>Relat&oacute;rio de Glosas</option>
                        <option value="RelEquipForn" <?php if ($acao == 'RelEquipForn') {echo 'selected="selected"';}?>>Rel. de Pagamento Mobi. e Equip.</option>
                        <option value="RelMatMed" <?php if ($acao == 'RelMatMed') {echo 'selected="selected"';}?>>Relat&oacute;rio de Margem Mat. Med.</option>
			            <option value="RelAlta" <?php if ($acao == 'RelAlta') {echo 'selected="selected"';}?>>Relat&oacute;rio de Alta de Pacientes.</option>
                        <option value="RelOrcamen" <?php if ($acao == 'RelOrcamen') {echo 'selected="selected"';}?>>Relat&oacute;rio de Orçamento</option>
                        <option value="RelPacGeap" <?php if ($acao == 'RelPacGeap') {echo 'selected="selected"';}?>>Informações de pacientes GEAP</option>
                        <!--                   option value="RelAgendaPeriodo" <?php if ($acao == 'RelAgendaPeriodo') {echo 'selected="selected"';}?>>Agenda de Profissionais</option> -->
                      </select>

                       <span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
</table>
    <table width="688" border="0">
      <tr>
        <td width="678">&nbsp;</td>
      </tr>
    </table>
    <table width="687" height="20" border="0">
      <tr>
        <td width="80">&nbsp;</td>
        <?php
        if (isset($acao) && ($acao != "RelPacEmp"  && $acao != 'RelVigi'  && $acao != 'RelMatMed' && $acao != 'RelAlta' && $acao != 'RelOrcamen' ))
        {
             echo '<td width="272" height="16" align="left"><label for="edtDataInicial" class="texto"> </label>';
             echo '<span id="sprytextfield1">';
             echo '   <label for="edtDataInicial" class="texto">Per&iacute;odo para emiss&atilde;o</label>';
             echo '   <br />';
             echo '   <input name="edtDataInicial" type="text" class="textfield1" id="edtDataInicial" onkeypress="MascaraData(this)" value="'.$edtDataInicial.'" size="13" maxlength="13"/>';
             echo '   <span class="textfieldRequiredMsg">A value is required.</span>a </span><span id="sprytextfield2">';

             echo '   <label for="edtDataFinal"></label>';
             echo '   <input name="edtDataFinal" type="text" class="textfield1" id="edtDataFinal" onkeypress="MascaraData(this)" value="'.$edtDataFinal.'" size="13" maxlength="13"/>';
             echo '   <span class="textfieldRequiredMsg">A value is required.</span></span></td>';

        }
        else
		{
		//echo '<table>';
		echo '<td ></td>';
		//echo '</table>';
		}
      if (isset($acao) && ($acao != 'RelPacGeap' && $acao != 'RelOrcamen')){  
        echo '   <td width="321" ><input type="button" name="button" id="button" value="Gerar Relat&oacute;rio"  onclick="GeraRelatorio()"/></td>';
      }
      echo ' </tr>';   

      ?>
</table>
<?php

	if (isset($acao) && $acao == "RelValMod")
    {
        echo '        <table width="686"  border="0">';
        echo '          <tr>';
        echo '            <td width="80">&nbsp;</td>';
        echo '            <td width="596"><div align="left">';
        echo '                <label for="edConvenio" class="texto">Conv&ecirc;nio</label>';
        echo '                <input name="edConvenio" type="text" class="textfield" id="edConvenio" value="'.$edConvenio.'"  size="20" maxlength="20"/>';
        echo '                <label for="selLiminar" class="texto">Liminar</label>';
		echo '                <select name="selLiminar" class="textfield1" id="selLiminar">>';
        echo '                    <option value="Ambos">Ambos</option>';
        echo '                    <option value="Sim">Sim</option>';
        echo '                    <option value="Nуo">N&atilde;o</option>';
        echo '                </select>';
        echo '            </td>';
        echo '          </tr>';
        echo '        </table>';
	}

	if (isset($acao) && $acao == "RelVigi")
    {
        echo '        <table border="0">';
        echo '          <tr>';
        echo '            <td width="80">&nbsp;</td>';
        echo '            <td width="250"><div align="left">';
        echo '                <label for="edMes" class="texto">M&ecirc;s</label>';
        echo '                <input name="edMes" type="text" class="textfield" id="edMes" value="'.$edMes.'"  size="4" maxlength="2"/>';
		echo '                <label for="edAno" class="texto">Ano</label>';
        echo '                <input name="edAno" type="text" class="textfield" id="edAno" value="'.$edAno.'"  size="8" maxlength="4"/>';
        echo '          </tr>';
        echo '          <tr>';
        echo '          <td width="80">&nbsp;</td>';
        echo '           <td width="500"><div align="left">';
        echo '                <label for="edConvenio" class="text">Conv&ecirc;nio</label>';
		echo '      <select name="edConvenio" class="textfield1" id="edConvenio">';
                    $result = mssql_query("select cnv_cod, cnv_nome from cnv where cnv_stat = 'A' order by cnv_nome",$con);
                    while ($Localiza = mssql_fetch_row($result))
                    {
                        echo '  <option value="'.$Localiza[0].'"';
                        echo '>'.$Localiza[1].'</option>';
                    }
        echo '      </select>';
        echo '            </td>';
        echo '     <td width="500"><div align="left">';
        echo '              <label for="selArea" class="texto">&aacute;rea</label>';
		echo '                <select name="selArea" class="textfield1" id="selArea">';
        echo '                    <option value="">Todas</option>';
        echo '                    <option value="Salvador">Salvador</option>';
        echo '                    <option value="Feira">Feira</option>';
        echo '                    <option value="Ilheus">Ilheus</option>';
        echo '                    <option value="Sao Luis">Sao Luis</option>';
        echo '                    <option value="Camacari">Camacari</option>';
        echo '                    <option value="V Conquista">V Conquista</option>';
        echo '                    <option value="Jequie<">Jequie</option>';
        echo '                    <option value="Itabuna">Itabuna</option>';
        echo '                    <option value="Alagoinhas">Alagoinhas</option>';
        echo '                    <option value="Recife">Recife</option>';
        echo '                    <option value="Aracaju">Aracaju</option>';
        echo '                </select>';
        echo '     </td>';
        echo '          </tr>';
        echo '        </table>';
	}

	if (isset($acao) && $acao == "RelLucMod")
    {
        echo '        <table width="686" border="0">';
        echo '          <tr>';
        echo '            <td width="80">&nbsp;</td>';
        echo '            <td width="596"><div align="left">';
        echo '                <label for="edConvenio" class="texto">Conv&ecirc;nio</label>';
		echo '      <select name="edConvenio" class="textfield1" id="edConvenio">';
                    $result = mssql_query("select cnv_cod, cnv_nome from cnv order by cnv_nome",$con);
                    while ($Localiza = mssql_fetch_row($result))
                    {
                        echo '  <option value="'.$Localiza[0].'"';
                        echo '>'.$Localiza[1].'</option>';
                    }
        echo '      </select>';
        echo '                <label for="selModalidade" class="texto">Modalidade</label>';
		echo '                <select name="selModalidade" class="textfield1" id="selModalidade">>';
        echo '                    <option value="TODOS">TODOS</option>';
        echo '                    <option value="38">6 Horas</option>';
        echo '                    <option value="37">12 Horas</option>';
        echo '                    <option value="36">24 Horas</option>';
        echo '                </select>';
        echo '            </td>';
        echo '          </tr>';
        echo '        </table>';
	}

	if (isset($acao) && $acao == "RelAgendaPeriodo")
    {
        echo '        <table width="686" border="0">';
        echo '          <tr>';
        echo '            <td width="80">&nbsp;</td>';
        echo '            <td width="596" class="texto"><div align="left">Profissional</div></td>';
        echo '          </tr>';
        echo '         </table>';
        echo '        <table width="686" border="0">';
        echo '          <tr>';
        echo '            <td width="80">&nbsp;</td>';
        echo '            <td width="596"><div align="left">';
        echo '              <input name="edProfissional" type="text" class="textfield" id="edProfissional" value="'.$edProfissional.'"  onblur="buscaInstantanea('."'select psv_cod, psv_nome from v_psv_tipo where psv_cod = ','edDescricaoProfissional','edProfissional');".'" size="5" maxlength="5"/>';
        echo '              <a href="javascript:BuscarProfissional('."'edProfissional','edDescricaoProfissional');".'"><img src="../imagens/27.png" alt="Buscar" width="18" height="18" border="0" /></a>';
        echo '              <input name="edDescricaoProfissional" type="text" class="textfield" id="edDescricaoProfissional" value="'.$edDescricaoProfissional.'"  size="40" maxlength="40"/>';
        echo '              <script>';
		echo '					document.frmCadastro.edDescricaoProfissional.readOnly=true;';
		echo '			    </script>';
        echo '            </div></td>';
        echo '          </tr>';
        echo '        </table>';
	}

	if (isset($acao) && $acao == "RelFisio")
    {
        echo '<table width="686" border="0">';
        echo '  <tr>';
        echo '    <td width="80">&nbsp;</td>';
        echo '    <td width="384" align="left"><span id="spryselect2">';
        echo '      <label for="edtEmpresa" class="texto">Empresa de Fisioterapia</label>';
        echo '      <br />';
        echo '      <select name="edtEmpresa" class="textfield1" id="edtEmpresa">';
                    $result = mssql_query("select distinct emp_cod, emp_nome_fantasia from emp
                                            left join emp_smk on emp_smk_emp_cod = emp_cod
                                            where emp_smk_smk_cod in ('98020021','98020030','FISIO 24','208','8007013','204','207')",$con);
                    while ($Localiza = mssql_fetch_row($result))
                    {
                        echo '  <option value="'.$Localiza[0].'"';

                        if ($edPlano == $Localiza[1])
                          {echo ' selected="selected"';}

                        echo '>'.$Localiza[1].'</option>';
                    }
          echo '      </select>';
          echo '    <span class="selectRequiredMsg">Please select an item.</span></span></td>';
          echo '  <td width="208">&nbsp;</td>';
          echo '</tr>';
          echo '<tr>';
          echo '  <td>&nbsp;</td>';
          echo '  <td ali gn="left">';
          echo ' <label for="edPaciente" class="texto">Paciente</label><br />';
          echo '  <input name="edPaciente" type="text" class="textfield1" id="edPaciente" value="'.$edPaciente.'"  onblur="buscaInstantanea('."'select pac_reg, pac_nome from pac where pac_reg = ','edDescricaoPaciente','edPaciente');".'" size="10" maxlength="10"/>';
          echo '    <a href="javascript:BuscarPaciente('."'edPaciente','edDescricaoPaciente');".'"><img src="../imagens/27.png" alt="Buscar" width="18" height="18" border="0" /></a>';
          echo '  <input name="edDescricaoPaciente" type="text" class="textfield1" id="edDescricaoPaciente" value="'.$edDescricaoPaciente.'"  size="50" maxlength="50"/></td>';
          echo '  <td>&nbsp;</td>';
          echo '</tr>';
          echo '<tr> </tr>';
        echo '</table>';
	}

    if (isset($acao) && $acao == "RelGlosa")
    {
        echo '<table width="686" border="0">';
        echo '  <tr>';
        echo '      <td width="80">&nbsp;</td>';
        echo '      <td width="596"><div align="left">';
        echo '          <label for="selModalidade" class="texto">De</label>';
		echo '            <select name="selModalidade" class="textfield1" id="selModalidade">>';
        echo '                <option value= "1">Gera&ccedil;&atilde;o da NS</option>';
        echo '                <option value= "2">Recebimento pela Glosa</option>';
        echo '            </select>';
        echo '      </td>';
        echo '  </tr>';
        echo '</table>';
	}

    if (isset($acao) && $acao == "RelEquipForn")
    {
        echo '<table width="400"  border="0">';
        echo '     <td width="100">';
        echo '<label for="selArea" class="texto">&aacute;rea</label>';
		echo '                <select name="selArea" class="textfield1" id="selArea">';
        echo '                    <option value="">Todas</option>';
        echo '                    <option value="Salvador">Salvador</option>';
        echo '                    <option value="Feira">Feira</option>';
        echo '                    <option value="Ilheus">Ilheus</option>';
	echo '                    <option value="Sao Luis">Sao Luis</option>';
	echo '                    <option value="Camacari">Camacari</option>';
	echo '                    <option value="V Conquista">V Conquista</option>';
	echo '                    <option value="Jequie">Jequie</option>';
	echo '                    <option value="Itabuna">Itabuna</option>';
	echo '                    <option value="Alagoinhas">Alagoinhas</option>';
	echo '                    <option value="Recife">Recife</option>';
	echo '                    <option value="Aracaju">Aracaju</option>';
        echo '                </select>';
        echo '     </td>';
        echo '            <td width="100"><div align="left">';
        echo '                <label for="edPaciente" class="texto">Paciente</label>';
        echo '                <input name="edPaciente" type="text" class="textfield" id="edPaciente" value="'.$edPaciente.'"  size="20" maxlength="20"/>';
        echo '      </td>';
        echo '  </tr>';
        echo '  <tr>';

        echo '            <td width="100"><div align="left">';
        echo '                <label for="edFornecedor" class="texto">Fornecedor</label>';
        echo '                <input name="edFornecedor" type="text" class="textfield" id="edFornecedor" value="'.$edFornecedor.'"  size="20" maxlength="20"/>';
        echo '      </td>';
        echo '              <td width="100"><div align="left">';
        echo '                <label for="edEquip" class="texto">Equipamento</label>';
        echo '               <input name="edEquip" type="text" class="textfield" id="edEquip" value="'.$edEquip.'"  size="20" maxlength="20"/>';
        echo '      </td>';

        echo '  </tr>';
        echo '  <tr>';
        echo '</table>';
	}

    if (isset($acao) && $acao == "RelMatMed")
    {

        echo '<table width="686" border="0">';
        echo '  <tr>';
        echo '      <td width="80">&nbsp;</td>';
        echo '      <td width="596"><div align="left">';
        echo '                <label for="edConvenio" class="texto">Conv&ecirc;nio</label>';
		echo '      <select name="edConvenio" class="textfield1" id="edConvenio">';
        echo '  <option value="">--SELECIONE--</option>';
                    $result = mssql_query("SELECT tab_cod, tab_nome FROM tab WHERE TAB_DEL_LOGICA = 'N' AND tab_svmm = 'M' ORDER BY tab_nome",$con);
                    while ($Localiza = mssql_fetch_row($result))
                    {
                        echo '  <option value="'.$Localiza[0].'"';
                        echo '>'.$Localiza[1].'</option>';
                    }
/*        echo '          <label for="selConv" class="texto">Conv&ecirc;nio:</label>';

        echo '<select name="selConv" class="textfield1" id="selConv">';
        echo '<option value="">--Selecione--</option>';
        while ($obj = mssql_fetch_row($rs)){
            echo '<option value="'.$obj[0].'" >'. $obj[1].'</option>';
        }*/
        echo'</select>';
        echo '      </td>';
        echo '  </tr>';
        echo '</table>';

    }

	if (isset($acao) && $acao == "RelAlta")
    {
        echo '        <table border="0">';
        echo '          <tr>';
        echo '            <td width="80">&nbsp;</td>';
        echo '            <td width="250"><div align="left">';
        echo '                <label for="edMes" class="texto">M&ecirc;s</label>';
        echo '                <input name="edMes" type="text" class="textfield" id="edMes" value="'.$edMes.'"  size="4" maxlength="2"/>';
		echo '                <label for="edAno" class="texto">Ano</label>';
        echo '                <input name="edAno" type="text" class="textfield" id="edAno" value="'.$edAno.'"  size="8" maxlength="4"/>';
        echo '          </tr>';
        echo '          <tr>';
        echo '          <td width="80">&nbsp;</td>';
        echo '           <td width="500"><div align="left">';
        echo '                <label for="edConvenio" class="text">Conv&ecirc;nio</label>';
		echo '      <select name="edConvenio" class="textfield1" id="edConvenio">';
                    $result = mssql_query("select cnv_cod, cnv_nome from cnv where cnv_stat = 'A' order by cnv_nome",$con);
                    while ($Localiza = mssql_fetch_row($result))
                    {
                        echo '  <option value="'.$Localiza[0].'"';
                        echo '>'.$Localiza[1].'</option>';
                    }
        echo '      </select>';
        echo '            </td>';
        echo '     <td width="500"><div align="left">';
        echo '              <label for="selArea" class="texto">&aacute;rea</label>';
		echo '                <select name="selArea" class="textfield1" id="selArea">';
        echo '                    <option value="">Todas</option>';
        echo '                    <option value="Salvador">Salvador</option>';
        echo '                    <option value="Feira">Feira</option>';
        echo '                    <option value="Ilheus">Ilheus</option>';
        echo '                    <option value="Sao Luis">Sao Luis</option>';
        echo '                    <option value="Camacari">Camacari</option>';
        echo '                    <option value="V Conquista">V Conquista</option>';
        echo '                    <option value="Jequie<">Jequie</option>';
        echo '                    <option value="Itabuna">Itabuna</option>';
        echo '                    <option value="Alagoinhas">Alagoinhas</option>';
        echo '                    <option value="Recife">Recife</option>';
        echo '                    <option value="Aracaju">Aracaju</option>';
        echo '                </select>';
        echo '     </td>';
        echo '     <td width="500"><div align="left">';
        echo '              <label for="selAlta" class="texto">Alta</label>';
	echo '                <select name="selAlta" class="textfield1" id="selAlta">';
        echo '                    <option value="">Todas</option>';
        echo '                    <option value="M">M&eacute;dica</option>';
        echo '                    <option value="P">A Pedido</option>';
        echo '                    <option value="A">Administrativa</option>';
        echo '                    <option value="E">Evas&atilde;o</option>';
        echo '                    <option value="O">&Oacute;bito</option>';
        echo '                    <option value="T">Transfer&ecirc;ncia</option>';  
        echo '                </select>';
        echo '     </td>';
        echo '          </tr>';
        echo '        </table>';
    }
    
    if (isset($acao) && $acao == "RelOrcamen")
    {
        echo '        <table width="500"  border="0">';
        echo '          <tr>';
        echo '            <td width="60">&nbsp;</td>';
        echo '            <td width="394"><div align="left">';
        echo '                <label for="edPaciente" class="texto">Cod. Paciente</label>';
        echo '                <input name="edPaciente" type="text" class="textfield" id="edPaciente" value="'.$edPaciente.'"  size="15" maxlength="15"/>';
        echo '            </td>';
        echo '          </tr>';
        echo '          <tr>';
        echo '            <td width="60">&nbsp;</td>';
        echo '            <td width="394"><div align="left">';
        echo '                <label for="edOrcamento" class="texto">Num. Orçamento</label>';
        echo '                <input name="edOrcamento" type="text" class="textfield" id="edOrcamento" value="'.$edOrcamento.'"  size="15" maxlength="15"/>';
        echo '            </td>';
        echo '          </tr>';
	echo '          <tr>';
	echo '            <td width="80">&nbsp;</td>';
	echo '            <td width="200" ><input type="button" name="button" id="orccapta" value="Orç Captação"  onclick="GeraRelatorio(this.id)"/></td>';
	echo '            <td width="200" ><input type="button" name="button" id="orcprorrog" value="Orç Prorrogação"  onclick="GeraRelatorio(this.id)"/></td>';
	echo '          </tr>';
        echo '        </table>';
  }
  
  if (isset($acao) && $acao == "RelPacGeap")
  {
      echo '        <table width="480"  border="0">';
      echo '          <tr>';
      echo '            <td width="80">&nbsp;</td>';
      echo '            <td width="200" ><input type="button" name="button" id="faturados" value="Faturados"  onclick="GeraRelatorio(this.id)"/></td>';
      echo '            <td width="200" ><input type="button" name="button" id="internados" value="Qtd Internados"  onclick="GeraRelatorio(this.id)"/></td>';
      echo '            <td width="200" ><input type="button" name="button" id="lstinternados" value="Lista internados"  onclick="GeraRelatorio(this.id)"/></td>';
      echo '          </tr>';
      echo '        </table>';
}

?>
                <table width="687" height="20" border="0">
                  <tr> </tr>
                </table>
                <table width="687" border="0">
                  <tr> </tr>
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
					if ($_SESSION["SubAcao"] != "LOCALIZA2")
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
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
</script>
</body>
</html>


<script>

// Funчуo que realiza a busca instantтnea
function buscaInstantanea(termo,retorno,campobusca) {
   if(document.getElementById) { // Para os browsers complacentes com o DOM W3C.
		//var termo = document.getElementById('q').value; // Pega o termo digitado no campo de texto.
		var exibeResultado = document.getElementById(retorno); // div que exibirс o resultado da busca.
		if(termo !== "" && termo !== null && termo.length >= 3) { // Verifica se o campo nуo estс vazio, ou se foi digitado no mэnimo trъs caracteres.
			var ajax = openAjax(); // Inicia o Ajax.
			termo = termo + "\'"+document.getElementById(campobusca).value+ "\'";
			ajax.open("GET", "padrao/buscaInstantanea.php?q=" + termo, true); // Envia o termo da busca como uma querystring, nos possibilitando o filtro na busca.
			ajax.onreadystatechange = function() {
				if(ajax.readyState == 1) { // Quando estiver carregando, exibe: carregando...
					exibeResultado.value = "Buscando...";
				}
				if(ajax.readyState == 4) { // Quando estiver tudo pronto.
					if(ajax.status == 200) {
						var resultado = ajax.responseText; // Coloca o resultado (da busca) retornado pelo Ajax nessa variсvel (var resultado).
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

function GeraRelatorio(click)
{
	   	var camposok, errors;
		errors = 'Caro usuсrio alguns erros ocorreram e seguem listados abaixo:\n';
		errors += '\n';
		camposok='S';
		// Se o campo descricao estiver em branco

		if (document.frmCadastro.selRel.value != 'RelPacEmp' && document.frmCadastro.selRel.value != 'RelVigi'  && document.frmCadastro.selRel.value != 'RelMatMed' && document.frmCadastro.selRel.value != 'RelAlta'&& document.frmCadastro.selRel.value != 'RelOrcamen')
		{
			if ( document.frmCadastro.edtDataInicial.value == '')
			{
				camposok = 'N';
				errors += '- A data inicial do perэodo esta em branco! \n';
			}

			if ( document.frmCadastro.edtDataFinal.value == '')
			{
				camposok = 'N';
				errors += '- A data final do perэodo esta em branco! \n';
			}
		}



		// Caso existam erros, mostra na tela
		if (camposok=='N')
		{
			alert(errors);
		}
		else
		{
        if (document.frmCadastro.selRel.value == 'RelMatMed')
			  window.open("Relatorios/rel_matmed.php?Convenio="+document.frmCadastro.edConvenio.value,"Atendimento","left=50,top=50,width=1000,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");

        if (document.frmCadastro.selRel.value == 'RelGlosa')
            window.open("Relatorios/rel_glosa.php?Modalidade="+document.frmCadastro.selModalidade.value+"&DataInicial="+document.frmCadastro.edtDataInicial.value+"&DataFinal="+document.frmCadastro.edtDataFinal.value,"Atendimento","left=50,top=50,width=1080,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");

        if (document.frmCadastro.selRel.value == 'RelEquipForn')
            window.open("Relatorios/rel_equip_prestador.php?DataInicial="+document.frmCadastro.edtDataInicial.value+"&DataFinal="+document.frmCadastro.edtDataFinal.value+"&Paciente="+document.frmCadastro.edPaciente.value+"&Fornecedor="+document.frmCadastro.edFornecedor.value+"&Equip="+document.frmCadastro.edEquip.value+"&Area="+document.frmCadastro.selArea.value,"Atendimento","left=50,top=50,width=1080,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");

	if (document.frmCadastro.selRel.value == 'RelVigi')
			  window.open("Relatorios/rel_vigilancia.php?&Mes="+document.frmCadastro.edMes.value+"&Ano="+document.frmCadastro.edAno.value+"&Area="+document.frmCadastro.selArea.value+"&Convenio="+document.frmCadastro.edConvenio.value,"Atendimento","left=50,top=50,width=850,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");

      	if (document.frmCadastro.selRel.value == 'RelFisio')
			  window.open("Relatorios/rel_fisioterapia.php?Empresa="+document.frmCadastro.edtEmpresa.value+"&Paciente="+document.frmCadastro.edPaciente.value+"&DataInicial="+document.frmCadastro.edtDataInicial.value+"&DataFinal="+document.frmCadastro.edtDataFinal.value,"Atendimento","left=50,top=50,width=810,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");

	if (document.frmCadastro.selRel.value == 'RelValMod')
			  window.open("Relatorios/RelValMod.php?Convenio="+document.frmCadastro.edConvenio.value+"&Liminar="+document.frmCadastro.selLiminar.value+"&DataInicial="+document.frmCadastro.edtDataInicial.value+"&DataFinal="+document.frmCadastro.edtDataFinal.value,"Atendimento","left=50,top=50,width=810,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");

	if (document.frmCadastro.selRel.value == 'RelAgendaPeriodo')
			  window.open("Relatorios/rel_agenda_periodo.php?Profissional="+document.frmCadastro.edProfissional.value+"&DataInicial="+document.frmCadastro.edtDataInicial.value+"&DataFinal="+document.frmCadastro.edtDataFinal.value,"Atendimento","left=50,top=50,width=810,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");

	if (document.frmCadastro.selRel.value == 'RelPacEmp')
			  window.open("Relatorios/rel_pac_emp.php","Atendimento","left=50,top=50,width=810,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");
	
	/*if (document.frmCadastro.selRel.value == 'RelLucMod')
			  window.open("Relatorios/rel_lucro_modalidade.php?DataInicial="+document.frmCadastro.edtDataInicial.value+"&DataFinal="+document.frmCadastro.edtDataFinal.value+"$Convenio="+document.frmCadastro.edConvenio.value+"$Modalidade="+document.frmCadastro.selModalidade.value,"Atendimento","left=50,top=50,width=810,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");*/
	
	if (document.frmCadastro.selRel.value == 'RelLucMod')
			  window.open("Relatorios/rel_lucro_modalidade.php?Convenio="+document.frmCadastro.edConvenio.value+"&Modalidade="+document.frmCadastro.selModalidade.value+"&DataInicial="+document.frmCadastro.edtDataInicial.value+"&DataFinal="+document.frmCadastro.edtDataFinal.value,"Atendimento","left=50,top=50,width=950,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");
	
	if (document.frmCadastro.selRel.value == 'RelAlta')
			  window.open("Relatorios/rel_alta.php?&Mes="+document.frmCadastro.edMes.value+"&Ano="+document.frmCadastro.edAno.value+"&Area="+document.frmCadastro.selArea.value+"&Convenio="+document.frmCadastro.edConvenio.value+"&Alta="+document.frmCadastro.selAlta.value,"Atendimento","left=50,top=50,width=1860,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");
    
    if (document.frmCadastro.selRel.value == 'RelOrcamen'){
    
      if (click == 'orccapta'){
        window.open("Relatorios/rel_orccapta.php?Paciente="+document.frmCadastro.edPaciente.value+"&Orcamento="+document.frmCadastro.edOrcamento.value,"Atendimento","left=50,top=50,width=950,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");
      }
      if (click == 'orcprorrog'){
        window.open("Relatorios/rel_orcprorrog.php?Paciente="+document.frmCadastro.edPaciente.value+"&Orcamento="+document.frmCadastro.edOrcamento.value,"Atendimento","left=50,top=50,width=950,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");
      }
     }
            
  
    if (document.frmCadastro.selRel.value == 'RelPacGeap'){
    
      if (click == 'faturados'){
        window.open("Relatorios/rel_pacgeapfat.php?DataInicial="+document.frmCadastro.edtDataInicial.value+"&DataFinal="+document.frmCadastro.edtDataFinal.value,"Atendimento","left=50,top=50,width=1080,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");
      }
      if (click == 'internados'){
        window.open("Relatorios/rel_pacgeapinter.php?DataInicial="+document.frmCadastro.edtDataInicial.value+"&DataFinal="+document.frmCadastro.edtDataFinal.value,"Atendimento","left=50,top=50,width=1080,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");
      }
      if (click== 'lstinternados'){
        window.open("Relatorios/rel_pacgeaplista.php?DataInicial="+document.frmCadastro.edtDataInicial.value+"&DataFinal="+document.frmCadastro.edtDataFinal.value,"Atendimento","left=50,top=50,width=1080,height=600,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes");
      }
     }
       
		}

}
function BuscarProfissional(Campo,Campo2)
{
     showPopWin("padrao/buscarProfissional.php?Tabela=REL&Campo="+Campo+"&Campo2="+Campo2+"&Proximo=3&Cadastro=Condutor&Diretorio=cadastro"+"", 595, 401, null);
}

function BuscarPaciente(Campo,Campo2)
{
           showPopWin("padrao/buscarpaciente.php?Tabela=REL&Campo="+Campo+"&Campo2="+Campo2+"&Proximo=3&Cadastro=Condutor&Diretorio=cadastro"+"", 595, 401, null);
}

function selecionaRelatorio(tipo)
{
    document.frmCadastro.acao.value=tipo;
	document.frmCadastro.submit();
}

</script>
