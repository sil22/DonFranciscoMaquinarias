<?php
session_start();
if(!isset($_SESSION["admin"]))
	header("Location:../index.html");

include("clase_DB.php");  
$db = new DB();
$db->conectar();
extract($_REQUEST);

if(isset($form_modificar))
	{
	$query = "UPDATE titular_concesion SET nombre='$nombre', apellido='$apellido', dni='$dni', cuit='$cuit', direccion ='$direccion', telefono='$telefono', email='$email', comision=$comision WHERE id=$id_modificar_oculto ";
	$result = mysql_query($query);
	}

if(isset($cargar))
	{
		$query = "INSERT INTO titular_concesion (nombre, apellido, dni, cuit, direccion, telefono, email, comision ) 
				VALUES('$nombre', '$apellido', '$dni', '$cuit', '$direccion', '$telefono', '$email', $comision);";
		$result = mysql_query($query);
	}
	
if(isset($id_eliminar))
	{
	$query = " DELETE FROM titular_concesion WHERE id = ".$id_eliminar." ;";
	$resultado = mysql_query($query);
	}

if(isset($id_modificar))
	{
	$resultados =  $db->consulta("SELECT * FROM titular_concesion WHERE id=".$id_modificar);
	$mod=mysql_fetch_row($resultados);
	}

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
	<td height="30" background="../images/bg_boxlist.gif" class="index_html_item_title" style=" width:21%">
		Cargar titular de la Concesión
	</td>
	<td height="30" background="../images/bg_boxlist.gif" class="index_html_item_title" style=" width:25%">
		Titulares de Concesión
	</td>
	<td height="30" background="../images/bg_boxlist.gif" class="index_html_item_title" style=" width:50%">
		Autos a Concesión de: <strong><?php if(isset($nombre_titular)){ echo $nombre_titular; } ?></strong>
	</td>
</tr>
<tr>
	<td valign="top">
    <? if (!isset($mod)){ ?>
		<div style="margin:2px; border:1px solid #999; padding-left:10px;">
		<form action="adm_concesiones.php" method="post" style="width:20%" >
            <label> <span class="Estilo6">Nombre:</span><br>
                <input name="nombre" type="text" id="nombre"  />
            </label>
            <label> <span class="Estilo6">Apellido:</span><br>
                <input name="apellido" type="text" id="apellido"  />
            </label>
            <label> <span class="Estilo6">DNI:</span><br>
                <input name="dni" type="text" id="dni"  />
            </label>
            <label> <span class="Estilo6">CUIT:</span><br>
                <input name="cuit" type="text" id="cuit"  />
            </label>
            <label> <span class="Estilo6">Dirección:</span><br>
                <input name="direccion" type="text" id="direccion"  />
            </label>
            <label> <span class="Estilo6">Teléfono:</span><br>
                <input name="telefono" type="text" id="telefono"  />
            </label>
            <label> <span class="Estilo6">Email:</span><br>
                <input name="email" type="text" id="email"  />
            </label>
            <label> <span class="Estilo6">Comision: %</span><br>
                <input name="comision" type="text" id="comision"  />
            </label>
		    <br>
			<input name="cargar" type="submit" class="enviar" id="button" value="Cargar Titular" />
		</form>
		</div>
        <? } else { ?>
        <div style="margin:2px; border:1px solid #999; padding-left:10px;">
		<form action="adm_concesiones.php" method="post" style="width:20%" >
            <label> <span class="Estilo6">Nombre:</span><br>
                <input name="nombre" type="text" id="nombre" value="<? echo $mod[1] ?>" />
            </label>
            <label> <span class="Estilo6">Apellido:</span><br>
                <input name="apellido" type="text" id="apellido" value="<? echo $mod[2] ?>" />
            </label>
            <label> <span class="Estilo6">DNI:</span><br>
                <input name="dni" type="text" id="dni" value="<? echo $mod[3] ?>" />
            </label>
            <label> <span class="Estilo6">CUIT:</span><br>
                <input name="cuit" type="text" id="cuit" value="<? echo $mod[4] ?>" />
            </label>
            <label> <span class="Estilo6">Dirección:</span><br>
                <input name="direccion" type="text" id="direccion" value="<? echo $mod[5] ?>" />
            </label>
            <label> <span class="Estilo6">Teléfono:</span><br>
                <input name="telefono" type="text" id="telefono" value="<? echo $mod[6] ?>" />
            </label>
            <label> <span class="Estilo6">Email:</span><br>
                <input name="email" type="text" id="email"  value="<? echo $mod[7] ?>" />
            </label>
            <label> <span class="Estilo6">Comision: %</span><br>
                <input name="comision" type="text" id="comision" value="<? echo $mod[8] ?>"  />
                <input name="id_modificar_oculto" type="hidden" value="<? echo $mod[0] ?>" />
            </label>
		    <br>
			<input name="form_modificar" type="submit" class="enviar" id="button" value="Modificar Titular" />
		</form>
		</div>
        <? } ?>
	</td>
	<td valign="top">
			<div style=" border:1px solid #999; margin:2px;  padding-left:10px;">
            <table cellspacing="4" cellpadding="4" border="0" class="tabla_listado">
            <tr>
            	<th height="30" class="Estilo6">Nombre y Apellido</th>
            	<th height="30" class="Estilo6">Tel</th>
            	<th height="30" class="Estilo6">Email</th>
            	<th height="30" class="Estilo6">Accion</th>
            </tr>
            <?	
			$resultados =  $db->consulta("SELECT * FROM titular_concesion ORDER BY nombre DESC");
			while ($row=mysql_fetch_row($resultados)){
			?>
            <tr>
            	<td><a href="adm_concesiones.php?id_concesion=<?php echo $row[0] ?>&nombre_titular=<?php echo $row[1].' '.$row[2] ?>"><?php echo $row[1].' '.$row[2] ?></a></td>
            	<td><?php echo $row[6] ?></td>
				<td><?php echo $row[7] ?></td>
				<td>
                <a href="adm_concesiones.php?id_modificar=<? echo $row[0]; ?>"  title="Modificar"><img src="icono/modificar.jpeg" width="12" height="12" border="0" style="margin:5px;" /></a>
                <a href="adm_concesiones.php?id_eliminar=<? echo $row[0]; ?>" onclick = "if (! confirm('Seguro que desea eliminar este titular?')) { return false; }" title="ELIMINAR"><img src="icono/eliminar.jpeg" width="12" height="12" border="0" style="margin:5px;" /></a></td>
            </tr>
            <?php } ?>
            </table>
            </div>
	</td>
	<td valign="top" >
		<div style=" border:1px solid #999; padding-left:10px;  margin:2px;">
       <table cellspacing="4" cellpadding="4" border="0" width="100%" class="tabla_listado">
        <tr class="index_html_item_title">
          <td height="30" class="Estilo6">Descripcion</td>
          <td align="left" class="Estilo6" >Marca</td>
          <td align="center" class="Estilo6" >Accion</td>
          </tr>
		<?	
		if(isset($id_concesion)){
			$resultados =  $db->consulta("SELECT * FROM vehiculos WHERE concesion=".$id_concesion." ORDER BY marc DESC");
			while ($row=mysql_fetch_row($resultados)){ ?> 
		
      <tr class="index_html_item_title">
          <td width="39%"  ><? echo (substr(utf8_decode($row[7]), 0, 80)); ?> ...</td>
          <td width="24%" align="left"  ><? echo (utf8_decode($row[1])); ?></td>
          <td width="21%" align="center" ><a href="adm_modificar_producto.php?id=<?=$row[0]; ?>" title="MODIFICAR"><img src="icono/modificar.jpeg" width="12" height="12" border="0" style="margin:5px;" /></a><a href="adm_gastos_auto.php?id=<? echo $row[0]; ?>" title="GASTOS"><img src="icono/gastos.jpg" width="12" height="12" border="0" style="margin:5px;" /></a><a href="adm_borrar_producto.php?id=<? echo $row[0]; ?>" onclick = "if (! confirm('Seguro que desea eliminar este vehiculo?')) { return false; }" title="ELIMINAR"><img src="icono/eliminar.jpeg" width="12" height="12" border="0" style="margin:5px;" /></a></td>
        </tr>
        
        
	     <?  } }  $db->desconectar();	  ?>
         
         </table>
         </div>
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