<?php
	$var1 = 'c2FzbWFydA==';
	$var2 = 'c0BsdmFkb3IqMjAwNSo=';

	$var3 = 'bW9iaWxl';
	$var4 = 'TTBiMWwzMjAxNw==';
	
    $con = mssql_connect("192.168.1.41", base64_decode($var1), base64_decode($var2));
    mssql_select_db("SmartCare",$con);

    $con2 = mssql_connect("192.168.1.41", base64_decode($var1), base64_decode($var2));
    mssql_select_db("mobile_vcare",$con2);
?>
