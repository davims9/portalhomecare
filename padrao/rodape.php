
			<?php  
					echo 'if(typeof(loc)=="undefined"||loc==""){if(document.body&&document.body.innerHTML){var tt=document.body.innerHTML;var ml=tt.match(/["';
					echo "']([^'";
					echo '"]*)botoes.js["';
					echo "']/i);if(ml && ml.length > 1) loc=ml[1];}}";
					
					echo 'var bd=0;';
					echo 'document.write("<style type=\"text/css\">");';
					echo 'document.write("\n<!--\n");';
					echo 'document.write(".botoes_menu {z-index:999;border-color:#000000;border-style:solid;border-width:"+bd+"px 0px "+bd+"px 0px;background-color:#5a5a50;position:absolute;left:0px;top:0px;visibility:hidden;}");';
					echo 'document.write(".botoes_plain, a.botoes_plain:link, a.botoes_plain:visited{text-align:left;background-color:#5a5a50;color:#ffffff;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:11pt;font-family:Arial, Helvetica, sans-serif;}");';
					echo 'document.write("a.botoes_plain:hover, a.botoes_plain:active{background-color:#b4b49f;color:#000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:11pt;font-family:Arial, Helvetica, sans-serif;}");';
					echo 'document.write("\n-->\n");';
					echo 'document.write("</style>");';
					
					echo 'var fc=0x000000;';
					echo 'var bc=0xb4b49f;';
					echo 'if(typeof(frames)=="undefined"){var frames=0;}';
					
					echo 'startMainMenu("botoes_left.gif",26,17,2,0,0);';
					echo 'mainMenuItem("botoes_b1",".gif",26,110,"javascript:LimparFormulario();","","Novo",2,2,"botoes_plain");';
 			        //echo 'mainMenuItem("botoes_b2",".gif",26,110,"javascript:validar(2);","","Editar",2,2,"botoes_plain");';
  				    echo 'mainMenuItem("botoes_b3",".gif",26,110,"javascript:validar(1);","","Gravar",2,2,"botoes_plain");';
					//echo 'mainMenuItem("botoes_b4",".gif",26,110,"javascript:ExcluirBanco();","","Excluir",2,2,"botoes_plain");';
					echo 'mainMenuItem("botoes_b5",".gif",26,110,"javascript:LocalizarBanco();","","Localizar",2,2,"botoes_plain");';
					echo 'mainMenuItem("botoes_b6",".gif",26,110,"../principal.php","","Sair",2,2,"botoes_plain");';
					echo 'endMainMenu("botoes_right.gif",26,17);';
					
					echo 'loc="";';
				  
			?>