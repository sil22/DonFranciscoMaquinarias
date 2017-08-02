<?php
session_start();
if(!isset($_SESSION["admin"]))
	header("Location:../index.html");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Automotores Harispuru</title>

<script language="javascript" type="text/javascript" src="js/barra.js"></script>

<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="js/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
label {
	font-size: 12px;
	font-weight:bold;
	margin-top:10px;
	font-family:Verdana, Geneva, sans-serif;
	display:block;
}

input,textarea,select {border:#AAA 1px solid; margin:2px; padding:2px; font-size:12px}
.enviar{ background-color:#999; color:#FFF; font-size:16px; font-weight:bold; padding:4px}
.contenedor {margin:5px;}
-->
</style>
</head>

<body>
<? require("header.php"); ?>

<div align="center" class="barra_nav" ></div>


<table class="table_body" border="0" style="border:1px solid #CCC">
<tr>
<td  height="30" background="../images/bg_boxlist.gif" class="index_html_item_title">
Cargar titular de la Concesión
</td>
<td  height="30" background="../images/bg_boxlist.gif" class="index_html_item_title">
Autos a Concesión
</td>
</tr>

<tr>
<td>
<div class="contenedor" align="left" style=" margin:5px;">
<div style=" border:1px solid #999; padding-left:10px; width:98%;">
<form>
	<label> <span class="Estilo6">Nombre:</span><br>
    	<input name="nombre" type="text" id="nombre" size="80" />
    </label>
    <label> <span class="Estilo6">Apellido:</span><br>
    	<input name="apellido" type="text" id="apellido" size="80" />
    </label>
	<label> <span class="Estilo6">DNI:</span><br>
    	<input name="dni" type="text" id="dni" size="80" />
    </label>
    <label> <span class="Estilo6">CUIT:</span><br>
    	<input name="cuit" type="text" id="cuit" size="80" />
    </label>
    <label> <span class="Estilo6">Dirección:</span><br>
    	<input name="direccion" type="text" id="direccion" size="80" />
    </label>
    <label> <span class="Estilo6">Teléfono:</span><br>
    	<input name="telefono" type="text" id="telefono" size="80" />
    </label>
    <label> <span class="Estilo6">Email:</span><br>
    	<input name="email" type="text" id="email" size="80" />
    </label>
    <label> <span class="Estilo6">Comision:</span><br>
    	<input name="comision" type="text" id="comision" size="80" />
    </label>
     <br>

        <input name="cargar" type="submit" class="enviar" id="button" value="Cargar Titular" />
</form>
</div>
</div>
</td>
<td>
Autos a Consecion
</td>
</tr>

</table>


<blockquote>
  <p>&nbsp;</p>
  <p><br />
  </p>
</blockquote>
</body>
</html>