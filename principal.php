<?php
session_start();
$usuario = $_SESSION["login"];
$nomeUsuario = $_SESSION["nome_usuario"];

//$Usuario = $user[1][nome];
include_once("funcoes/TestaLogin.php");

include_once("conexao.php");	
extract($_REQUEST);


		
/**
************************
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
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PORTAL HOMECARE</title>
</head>

<body>
<link rel="stylesheet" type="text/css" href="funcoes/submodal/subModal.css" />
<script src="layout\xaramenu.js"></script>
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
              <td width="663" height="46" valign="top" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><table width="682" border="0">
                  <tr>
                    <td class="style18"><div align="left">Bem vindo, <?php echo $nomeUsuario; ?>
                    </div></td>
                  </tr>
                </table></td>
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
  <?php
  // NOVO
  if ($chamada != 1)
  { 
    echo '<p><span class="style18">Vitalmed - Copyright &copy; 2011</span> </p>';
  }
  ?>
</div>
</body>
</html>
