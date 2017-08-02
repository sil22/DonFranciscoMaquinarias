<?php
session_start();
if(!isset($_SESSION["admin"]))
	header("Location:../index.html");

extract($_REQUEST);

include("clase_DB.php");
$db = new DB();
$db->conectar();
	
	$query = "
		DELETE FROM  vehiculos 
		WHERE id = $id;
	";
	
	$resultado = mysql_query($query);
	
	$resul =  $db->consulta("SELECT url FROM imagenes where id_vehiculo='$id' ");
	$re=mysql_num_rows($resul);
	  if($re>0)
	  	{
		while($url=mysql_fetch_row($resul))
			{
				if (!unlink('../usados/'.$url[0])){ 
					echo 'no se pudo borrar el archivo'; 
					}
			}							
		$query = "
		DELETE FROM  imagenes 
		WHERE id_vehiculos = $id;
	";
	
	$resultado = mysql_query($query);
		}
	
	
	$db->desconectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META HTTP-EQUIV="Refresh" CONTENT="2; URL=adm_nuevo_producto.php" >

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
</head>

<body class="home blog">

<div style="height:5px; background-color:#0F0"></div>


<?php include('templates/navigation.php'); ?>

	
<div class="container">
	<div class="container_12 clearfix">
<table width="100%" height="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><!-- LA NOTA -->      
      <div align="center"><span class="Estilo8">ELIMINANDO MAQUINARIA </span><br />
        <img src="icono/cargando.gif" width="200" height="200" /></div>
      <!-- end LA NOTA --></td>
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
