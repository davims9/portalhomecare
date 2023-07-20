
			<?php  
				  echo 'if(typeof(loc)=="undefined"||loc==""){if(document.body&&document.body.innerHTML){var tt=document.body.innerHTML;var ml=tt.match(/["';
				  echo "']([^'";
				  echo '"]*)sigetax.js["';
				  echo "']/i);if(ml && ml.length > 1) loc=ml[1];}}";
						
				  echo '		var bd=0;';
				  echo '		document.write("<style type=\"text/css\">");';
				  echo '		document.write("\n<!--\n");';
				  echo '		var tr="filter:alpha(opacity=80);-moz-opacity:0.8;";if(IE5) tr="";';
				  echo '		document.write(".sigetax_menu {"+tr+"z-index:999;border-color:#000000;border-style:solid;border-width:"+bd+"px 0px "+bd+"px 0px;background-color:#f1f1ed;position:absolute;left:0px;top:0px;visibility:hidden;}");';
				  echo '		document.write(".sigetax_plain, a.sigetax_plain:link, a.sigetax_plain:visited{text-align:left;background-color:#f1f1ed;color:#272525;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:8pt;font-family:Arial, Helvetica, sans-serif;}");';
				  echo '		document.write("a.sigetax_plain:hover, a.sigetax_plain:active{background-color:#dbd4d4;color:#000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:8pt;font-family:Arial, Helvetica, sans-serif;}");';
				  echo '		document.write("a.sigetax_l:link, a.sigetax_l:visited{text-align:left;background:#f1f1ed url("+loc+"sigetax_l.gif) no-repeat right;color:#272525;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:8pt;font-family:Arial, Helvetica, sans-serif;}");';
				  echo '		document.write("a.sigetax_l:hover, a.sigetax_l:active{background:#dbd4d4 url("+loc+"sigetax_l2.gif) no-repeat right;color: #000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:8pt;font-family:Arial, Helvetica, sans-serif;}");';
				  echo '		document.write("\n-->\n");';
				  echo '		document.write("</style>");';
				  echo '		var fc=0x000000;';
				  echo '		var bc=0xdbd4d4;';
				  echo '		if(typeof(frames)=="undefined"){var frames=4;if(frames>0)animate();}';
						
				  echo '		startMainMenu("sigetax_left.gif",26,32,2,0,0);';
				  echo '		mainMenuItem("sigetax_b1",".gif",26,91,"javascript:;","","Cadastro",2,2,"sigetax_plain");';
				  echo '		mainMenuItem("sigetax_b6",".gif",26,91,"javascript:;","","Consulta",2,2,"sigetax_plain");';
				  echo '		mainMenuItem("sigetax_b7",".gif",26,91,"javascript:;","","Relatórios",2,2,"sigetax_plain");';
				  echo '		mainMenuItem("sigetax_b2",".gif",26,91,"javascript:;","","Vistoria",2,2,"sigetax_plain");';
				  echo '		mainMenuItem("sigetax_b3",".gif",26,91,"javascript:;","","Fiscalização",2,2,"sigetax_plain");';
				  echo '		mainMenuItem("sigetax_b4",".gif",26,91,"javascript:;","","Teste",2,2,"sigetax_plain");';
				  echo '		mainMenuItem("sigetax_b5",".gif",26,91,"../index.php","","Atendimento",2,2,"sigetax_plain");';

				  echo '		endMainMenu("sigetax_right.gif",26,32);';
						
				  if ($principal)
				    echo '		loc="";';
				  else
				    echo '		loc="/";';
				  
				// Forma menu de acordo com as permissoes do grupo do usuário.				  
				  	$result = mssql_query("PR_Configuracao_Menu '3'",$con);
					while ($Menu = mssql_fetch_row($result))
					{
					   //echo ereg_replace (',loc+//"', ',loc+"../', $Menu[0]);
					   echo $Menu[0];
					}
			?>