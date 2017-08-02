<?php
session_start();
if(!isset($_SESSION["admin"]))
	header("Location:../index.html");

include("clase_DB.php");  
$db = new DB();
$db->conectar();
extract($_REQUEST); 

if(isset($agregar))
	{
		$fecha=$anio."-".$mes."-".$dia;
	$query = "INSERT INTO gastos_vehiculos (id_vehiculo, descripcion, monto, fecha, cancelado) 
				VALUES('$id_vehiculo', '$descripcion', '$monto', '$fecha', '$cancelado');";
	$result = mysql_query($query);	
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

<?	
	if(isset($id)){
	$resultados =  $db->consulta("SELECT V.model, V.marc, V.fuel, V.color, T.nombre, T.apellido, V.id FROM vehiculos as V, titular_concesion as T WHERE V.concesion=T.id AND V.id=".$id);
	$row=mysql_fetch_row($resultados); }
?>
<div style=" border:1px solid #999; padding-left:10px;  margin:20px; padding:10px;">
<table>
<tr>
	<td colspan="5"></td>
</tr>
<tr>
	<td colspan="5" height="30" class="Estilo6">&nbsp;&nbsp;&nbsp;&nbsp;Vehiculo:</td>
</tr>
<tr>	
    <td width="100" height="30" class="Estilo6">&nbsp;&nbsp;&nbsp;&nbsp;Marca</td>
    <td width="100" height="30" class="Estilo6">Modelo</td>
    <td width="100" height="30" class="Estilo6">Combustible</td>
    <td width="100" height="30" class="Estilo6">Color</td>
    <td width="200" height="30" class="Estilo6">Propietario</td>
</tr>
<tr class="index_html_item_title">
	<td >&nbsp;&nbsp;&nbsp;&nbsp;<? echo $row[1] ?></td>
    <td><? echo $row[0] ?></td>
    <td><? echo $row[2] ?></td>
    <td><? echo $row[3] ?></td>
    <td><? echo $row[4] ?> <? echo $row[5] ?></td>
</tr>
</table>
</div>

<div style=" border:1px solid #999; padding-left:10px;  margin:20px; padding:10px">
<table>
<tr>
	<td colspan="5"></td>
</tr>
<tr>
	<td colspan="5" height="30" class="Estilo6">&nbsp;&nbsp;&nbsp;&nbsp;Gastos:</td>
</tr>
<tr>	
    <td width="100" height="30" class="Estilo6">&nbsp;&nbsp;&nbsp;&nbsp;Fecha</td>
    <td width="100" height="30" class="Estilo6">Descripcion</td>
    <td width="100" height="30" class="Estilo6">Monto</td>
    <td width="100" align="center" height="30" class="Estilo6">Cancelado</td>
    <td align="center" width="100" height="30" class="Estilo6">ACCIONES</td>
</tr>
<?	
	$id_vehiculo=$row[6];
	$resultados =  $db->consulta("SELECT * FROM gastos_vehiculos WHERE id_vehiculo=".$row[6]);
	while($row=mysql_fetch_row($resultados)){ $aux=explode('-',$row[4]);
?>
<tr class="index_html_item_title">
	<td >&nbsp;&nbsp;&nbsp;&nbsp;<? echo $aux[2].'/'.$aux[1].'/'.$aux[0] ?></td>
    <td><? echo $row[2] ?></td>
    <td><? echo $row[3] ?></td>
    <td align="center"><? echo $row[5] ?></td>
    <td align="center"><a href="adm_gastos_auto.php?id=<?=$row[0]; ?>" title="MODIFICAR"><img src="icono/modificar.jpeg" width="12" height="12" border="0" style="margin:5px;" /></a><a href="adm_gastos_auto.php?id=<? echo $row[0]; ?>" onclick = "if (! confirm('Seguro que desea eliminar este gasto?')) { return false; }" title="ELIMINAR"><img src="icono/eliminar.jpeg" width="12" height="12" border="0" style="margin:5px;" /></a></td>
</tr>
<? } ?>

<form action="adm_gastos_auto.php" method="post" name="add_gasto">
<tr class="index_html_item_title">
	<td width="170"><input type="text" name="dia" maxlength="2" size="2" /><input size="2" type="text" name="mes" maxlength="2" /><input size="4" type="text" name="anio" maxlength="4" /></td>
    <td><input type="text" name="descripcion" size="60" height="40" /></td>
    <td><input type="text" name="monto" /></td>
    <td align="center">
    <select name="cancelado">
    	<option value="no">No</option>
        <option value="si">Si</option>
    </select>
    </td>
    <td align="center">
    <input type="hidden" value="<?php echo $id_vehiculo; ?>" name="id_vehiculo" />
    <input type="hidden" value="<?php echo $id; ?>" name="id" />
    <input type="submit" name="agregar" value="Agregar Gasto"/>
    </td>
</tr>
</form>


</table>
</div>

<blockquote>
  <p>&nbsp;</p>
  <p><br />
  </p>
</blockquote>
</body>
</html>