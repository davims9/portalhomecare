<?php 
    header("Content-Type: text/html;  charset=ISO-8859-1",true);
	//  Função para Conexão com o Banco
	include_once("../conexao.php");
?>

<?php
$colname_rsBusca = "-1";
if (isset($_GET['q'])) {
  $colname_rsBusca = (get_magic_quotes_gpc()) ? $_GET['q'] : addslashes($_GET['q']);
}

$colname_rsBusca = str_replace("\'", "'", $colname_rsBusca);

$rsBusca = mssql_query("$colname_rsBusca",$con);
$LIN = mssql_fetch_row($rsBusca)

?>
<?php 
if (trim($LIN[1])!='')
{   echo $LIN[1]; }
else
{ 
echo 'Dado não Encontrado...';
}
?>  

<?php
   mssql_free_result($rsBusca);
?>