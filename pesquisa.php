<?php

$parceiroId = $_GET["parceiroId"];
$resposta = $_GET["resposta"];
$celular = $_GET["celular"];
$mensagem = substr($_GET["mensagem"],0,2);
$respostaDescricao = $_GET["respostaDescricao"];
$respostaData = $_GET["respostaData"];
$id = $_GET["id"];


	$var1 = 'c2F2';
	$var2 = 'U0B2YWNlc3NvMjAwOQ==';

    $con = mssql_connect("192.168.1.9", base64_decode($var1), base64_decode($var2));

	if (substr($parceiroId,0,1) == '1')
		mssql_select_db("BD_SAV",$con);

	if (substr($parceiroId,0,1) == '2')
		mssql_select_db("BD_SAV2",$con);

	if (substr($parceiroId,0,1) == '3')
		mssql_select_db("BD_SAV3",$con);

	if (substr($parceiroId,0,1) == '4')
		mssql_select_db("BD_SAV4",$con);

	if (substr($parceiroId,0,1) == '5')
		mssql_select_db("BD_SAV5",$con);

	if (substr($parceiroId,0,1) == '6')
		mssql_select_db("BD_SAV6",$con);


    $idatendimento = substr($parceiroId,1,30);


if ($parceiroId == '')
  echo 'PARCEIROID INV�LIDO';

if ($resposta == '')
  echo 'RESPOSTA INV�LIDA';

//https://portalvitalcare.vitalmed.com.br/pesquisa.php?id=00000884000003882018041716032866fd317cda0eeb69d41236376cf2f76b1&parceiroId=12008531&celular=11988776655&mensagem=+8+teste&resposta=9&respostaDescricao=RESPOSTA&respostaData=2018-04-13+09%3A56%3A46

if ($respostaDescricao == 'RESPOSTA')
{
	if (is_numeric($mensagem))
	{
		$rsPermissao = mssql_query("insert into pas_pos_atendimento_sms (pas_id_atendimento, pas_nota, pas_data, pas_id, pas_celular, pas_mensagem, pas_respostaDescricao)
									values ('$idatendimento', '$mensagem', '$respostaData', '$id', '$celular', '$resposta', '$respostaDescricao')",$con);

		$per = mssql_fetch_row($rsPermissao);							
	}
}
echo 'OK'



?>

