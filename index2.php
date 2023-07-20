<?php
session_start();

/**
************************************************************************************************************************
Sistema: SAV - Vendas on-line
Desenvolvimento: João Daniel Queiroz Lima
Data de criação: 09/08/2010
Última Alteração: 09/08/2010
Página: index.php
Resumo: Tela index/login
************************************************************************************************************************
**/

include_once("conexao.php");
extract($_REQUEST);


?>

<?php
    /* function getBrowser
     * returns the detected browser
     */
    function getBrowser()
    {
        $var = $_SERVER['HTTP_USER_AGENT'];
        $info['browser'] = "OTHER";
        
        // valid brosers array
        $browser = array ("MSIE", "OPERA", "FIREFOX", "MOZILLA",
                          "NETSCAPE", "SAFARI", "LYNX", "KONQUEROR","CHROME");

        // bots = ignore
        $bots = array('GOOGLEBOT', 'MSNBOT', 'SLURP');

        foreach ($bots as $bot)
        {
            // if bot, returns OTHER
            if (strpos(strtoupper($var), $bot) !== FALSE)
            {
                return $info;
            }
        }
        
        // loop the valid browsers
        foreach ($browser as $parent)
        {
            $s = strpos(strtoupper($var), $parent);
            $f = $s + strlen($parent);
            $version = substr($var, $f, 5);
            $version = preg_replace('/[^0-9,.]/','',$version);
			
            if (strpos(strtoupper($var), $parent) !== FALSE)
            {
                $info['browser'] = $parent;
                //$info['version'] = $version;
                return $parent;
				//return $info;
            }
        }
        //return $info;
		return $parent;
    }
  
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>VITALMED - PORTAL HOMECARE</title>
<style type="text/css">
<!--
body {
	background-color: #FFF;
	background-image: url();
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
}
.Edit {
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
.LinhaFina {
	font-size: 1px;
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
-->
</style>
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
</head>

<body>
<form name="frmLogin" method="post" action="">
  <input name="acao" type="hidden" value="<?php echo $acao; ?>">

<table width="792" height="566" border="0" bordercolor="#ECECEE" background="imagens/tela_login.jpg" align="center">
  <tr align="center">
    <td width="775" height="544">
    <table width="375" height="276" border="0">
      <tr>
        <?php
          if (getBrowser() == 'FIREFOX')
		  	echo '<td height="28">&nbsp;</td>';
          else
		    //if (getBrowser() == 'MSIE')
        	echo '<td height="13">&nbsp;</td>';
		
		?>        
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="36">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr class="LinhaFina">
        <td height="7">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr class="LinhaFina">
        <td height="24">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td width="186" height="41">&nbsp;</td>
        <td colspan="2"><div align="left">
          <input name="edLogin" type="text" class="Edit" size="24">
        </div></td>
      </tr>
      <tr class="LinhaFina">
        <td height="4" class="LinhaFina">&nbsp;</td>
        <td colspan="2" class="LinhaFina">&nbsp;</td>
      </tr>
      <tr>
        <td height="24" class="style1">&nbsp;</td>
        <td colspan="2"><div align="left">
          <input name="edSenha" type="password" class="Edit" onKeyPress="return submitenter(this,event)" size="24">
        </div></td>
      </tr>
      <tr class="LinhaFina">
        <?php
          if (getBrowser() == 'FIREFOX')
		  	echo '<td height="14">&nbsp;</td>';
          else
		    //if (getBrowser() == 'MSIE')
        	echo '<td height="4">&nbsp;</td>';
//        <td height="4">&nbsp;</td>
		
		?> 
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="43">&nbsp;</td>
        <td width="170"><div align="right">
            <input name="btEntrar" type="button" class="Botao" onClick="validar()" value="               ">
        </div></td>
        <td width="5">&nbsp;</td>
      </tr>
      <tr class="LinhaFina">
        <td height="4">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

</form>  

<?php
if (isset($acao) && $acao == "LOGAR") 
{
		$rsLogin = mssql_query("select usr_login, usr_nome, usr_nivel from usr where usr_login = '$edLogin' and usr_senha = '$edSenha'",$con);
		$Usuario = mssql_fetch_row($rsLogin);

		if ($Usuario[0] != '') // Verifica se retornou algum registro na consulta.
		{
		   // colocar sessao
		   $_SESSION["login"]   = $Usuario[0];
		   $_SESSION["nome_usuario"] = stripslashes($Usuario[1]);

		   if (trim($Usuario[0]) == 'FESF') 
		   {
		     header("location: consultapaciente.php");
		   }
		   else
		   {
 		     header("location: principal.php");
		   }
		   
		} 
		else
		{
			echo '<script>';
			echo '  alert("Usuário inexistente ou sem acesso a este recurso!!!");';
			echo '</script>';	
		} 
		
		
       mssql_free_result($rsLogin);
}


function desencripta($_entrada)
  {
	 $chave = 16;
     $saida = '';
     $tamstr = strlen($_entrada);
	 $final = floor($tamstr/8);

	 for($i=1;$i<=floor($tamstr/8);$i++)	 
     {
		 $valorsenha = 0;
         for ($j=1;$j<=8;$j++)
         {
			  $valorsenha = $valorsenha + ( (ord(substr($_entrada,((($i-1)*8) + $j)-1,1)) - 40 - $j) * round(pow(200,$j-1)));
         }

		 $valorsenha = floor($valorsenha/$chave);

  	     for ($j=1;$j<=4;$j++)
         {
             $valorasc = $valorsenha % 200;
             $charcrip = chr($valorasc);
			 $valorsenha = floor(($valorsenha - $valorasc) / 200);
             if ($valorasc != 0) 
                  $saida = $saida.$charcrip;
         }
     }
	 return ($saida);
  }
?>
</body>
</html>


<script>
	// Função para validação do formulário
    function validar() 
	{
	   	var camposok, errors;
		errors = 'Caro usuário alguns erros ocorreram e seguem listados abaixo:\n';
		errors += '\n';
		camposok='S';
		
		// Se o campo descricao estiver em branco
		if (document.frmLogin.edLogin.value == '') 
	   	{
			camposok = 'N';
			errors += '- Campo Login não pode ser deixado em branco! \n';	      
	   	}

		if (document.frmLogin.edSenha.value == '') 
	   	{
			camposok = 'N';
			errors += '- Campo Senha não pode ser deixado em branco! \n';	      
	   	}

		// Caso existam erros, mostra na tela
		if (camposok=='N') 
		{
			alert(errors);
		}
		else 
		{		
 	     document.frmLogin.acao.value="LOGAR";
		 document.frmLogin.submit();
		}
	}
	
function submitenter(myfield,e)
{
var keycode;
if (window.event) keycode = window.event.keyCode;
else if (e) keycode = e.which;
else return true;

if (keycode == 13)
   {
   validar();
   return false;
   }
else
   return true;
}
//-->
	
</script>