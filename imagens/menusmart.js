//©Xara Ltd
if(typeof(loc)=="undefined"||loc==""){var loc="";if(document.body&&document.body.innerHTML){var tt=document.body.innerHTML;var ml=tt.match(/["']([^'"]*)menusmart.js["']/i);if(ml && ml.length > 1) loc=ml[1];}}

var bd=0
document.write("<style type=\"text/css\">");
document.write("\n<!--\n");
document.write(".menusmart_menu {z-index:999;border-color:#000000;border-style:solid;border-width:"+bd+"px 0px "+bd+"px 0px;background-color:#2f4d30;position:absolute;left:0px;top:0px;visibility:hidden;}");
document.write(".menusmart_plain, a.menusmart_plain:link, a.menusmart_plain:visited{text-align:left;background-color:#2f4d30;color:#ffffff;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:9pt;font-family:Arial, Helvetica, sans-serif;}");
document.write("a.menusmart_plain:hover, a.menusmart_plain:active{background-color:#a2b49f;color:#000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:9pt;font-family:Arial, Helvetica, sans-serif;}");
document.write("a.menusmart_l:link, a.menusmart_l:visited{text-align:left;background:#2f4d30 url("+loc+"menusmart_l.gif) no-repeat right;color:#ffffff;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:9pt;font-family:Arial, Helvetica, sans-serif;}");
document.write("a.menusmart_l:hover, a.menusmart_l:active{background:#a2b49f url("+loc+"menusmart_l2.gif) no-repeat right;color: #000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:9pt;font-family:Arial, Helvetica, sans-serif;}");
document.write("\n-->\n");
document.write("</style>");

var fc=0x000000;
var bc=0xa2b49f;
if(typeof(frames)=="undefined"){var frames=0;}

startMainMenu("menusmart_left.gif",28,33,2,0,0)
mainMenuItem("menusmart_b1",".gif",28,211,"javascript:;","","Rotinas",2,2,"menusmart_plain");
mainMenuItem("menusmart_b2",".gif",28,211,"javascript:;","","Associações",2,2,"menusmart_plain");
mainMenuItem("menusmart_b3",".gif",28,211,loc+"../"+"Relatorios.php?acao=SEL","","Relatórios",2,2,"menusmart_plain");
endMainMenu("menusmart_right.gif",28,33)

startSubmenu("menusmart_b2","menusmart_menu",211);
submenuItem("Empresa -&gt; Serviços",loc+"../"+"Emp_Serv.php","","menusmart_plain");
submenuItem("Paciente -&gt; Empresa",loc+"../"+"Pac_Emp.php","","menusmart_plain");
endSubmenu("menusmart_b2");

startSubmenu("menusmart_b1_2","menusmart_menu",149);
submenuItem("Programação da Agenda",loc+"../"+"inclusao_agenda.php","","menusmart_plain");
submenuItem("Gestão da Agenda",loc+"../"+"gestao_agenda.php","","menusmart_plain");
endSubmenu("menusmart_b1_2");

startSubmenu("menusmart_b1","menusmart_menu",211);
submenuItem("Devolução de Materiais",loc+"../"+"C15.php","","menusmart_plain");
mainMenuItem("menusmart_b1_2","Agenda de Profissionais",0,0,"javascript:;","","",1,1,"menusmart_l");
submenuItem("Consulta de Paciente",loc+"../"+"consultapaciente.php","","menusmart_plain");
endSubmenu("menusmart_b1");

loc="";
