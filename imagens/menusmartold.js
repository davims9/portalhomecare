//©Xara Ltd
if(typeof(loc)=="undefined"||loc==""){var loc="";if(document.body&&document.body.innerHTML){var tt=document.body.innerHTML;var ml=tt.match(/["']([^'"]*)menusmart.js["']/i);if(ml && ml.length > 1) loc=ml[1];}}

var bd=0
document.write("<style type=\"text/css\">");
document.write("\n<!--\n");
document.write(".menusmart_menu {z-index:999;border-color:#000000;border-style:solid;border-width:"+bd+"px 0px "+bd+"px 0px;background-color:#354730;position:absolute;left:0px;top:0px;visibility:hidden;}");
document.write(".menusmart_plain, a.menusmart_plain:link, a.menusmart_plain:visited{text-align:left;background-color:#354730;color:#ffffff;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:9pt;font-family:Arial, Helvetica, sans-serif;}");
document.write("a.menusmart_plain:hover, a.menusmart_plain:active{background-color:#b4b49f;color:#000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:9pt;font-family:Arial, Helvetica, sans-serif;}");
document.write("\n-->\n");
document.write("</style>");

var fc=0x000000;
var bc=0xb4b49f;
if(typeof(frames)=="undefined"){var frames=0;}

startMainMenu("menusmart_left.gif",26,31,2,0,0)
mainMenuItem("menusmart_b1",".gif",26,213,loc+"../"+"Devolucao.php","","Devolução de Materiais",2,2,"menusmart_plain");
mainMenuItem("menusmart_b2",".gif",26,213,"javascript:;","","Associações",2,2,"menusmart_plain");
mainMenuItem("menusmart_b3",".gif",26,213,loc+"../"+"Relatorios.php","","Relatórios",2,2,"menusmart_plain");
endMainMenu("menusmart_right.gif",26,31)

startSubmenu("menusmart_b2","menusmart_menu",213);
submenuItem("Empresa - Serviço",loc+"../"+"Emp_Serv.php","","menusmart_plain");
submenuItem("Paciente - Empresa",loc+"../"+"Pac_Emp.php","","menusmart_plain");
endSubmenu("menusmart_b2");

loc="";
