<?php
session_start();
if(!isset($_SESSION["admin"]))
	header("Location:../index.html");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Don Francisco Maquinarias</title>

<script language="javascript" type="text/javascript" src="js/barra.js"></script>
<link rel="stylesheet" id="dox_css_reset-css" href="../css/reset000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_grid-css" href="../css/grid0000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_google_font-css" href="../css/css00000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_main-css" href="../css/style000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_prettyphoto-css" href="../css/prettyph.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_default-css" href="../css/default0.css" type="text/css" media="all">
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="js/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
.Estilo20 {font-size: 10px}
.Estilo22 {font-size: 12px}
.margin_top { margin-top:150px;}
-->
</style>
</head>

<body class="home blog">

<div style="height:5px; background-color:#0F0"></div>


<?php include('templates/navigation.php'); ?>

	
<div class="container">
	<div class="container_12 clearfix">
		
<table width="100%" height="238" border="0" align="center" cellpadding="0" cellspacing="0" class="margin_top">
  <tr>
    <td width="25%" align="center">
    <span class="Estilo19">
    	<strong>
        	<a href="adm_nuevo_producto.php" style="text-decoration:none;" class="Estilo19">
            	<img src="icono/BlackNeonAgua_107.png" width="59" height="60" border="0" /><br />
      			<span class="Estilo22">NUEVOS Y USADOS</span>
            </a>
        </strong>    
    </span>
    </td>
    <td width="25%" align="center">
    	<span class="Estilo19">
      		<strong>
            	<a href="adm_modificar_pass.php" style="text-decoration:none;" class="Estilo19">
	      			<img src="icono/BlackNeonAgua_248.png" width="59" height="60" border="0" /><br />
      				<span class="Estilo22">CONTRASEÑA</span>
                </a>
            </strong>    
        </span>
    </td>
    <td width="25%" align="center">
    	<span class="Estilo19">
      		<strong>
            	<a href="adm_soporte.php" style="text-decoration:none;" class="Estilo19">
	      			<img src="icono/BlackNeonAgua_134.png" width="59" height="60" border="0" /><br />
      				<span class="Estilo22">SOPORTE</span>
                </a>
            </strong>    
        </span>
    </td>
    <td width="25%" align="center">
    <span class="Estilo19">
    	<strong>
    		<a href="adm_ventas.php" style="text-decoration:none;" class="Estilo19">
        		<img src="icono/BlackNeonAgua_194.png" width="59" height="60" border="0" /><br />
      			<span class="Estilo19 Estilo22">SALIR</span>
            </a>
        </strong>    
    </span>
    </td>
  </tr>
</table>

				
		<div class="clear"></div>
	</div> 
</div>
<div class="clear"></div>

		<?php include('../templates/footer.php'); ?>	

</body>
</html>
</html>
