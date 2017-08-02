<?php
session_start();
if(!isset($_SESSION["admin"]))
	header("Location:../index.html");
	

include("clase_DB.php");
$db = new DB();
$db->conectar();
$msj='Usados';
$destacado='';
extract($_REQUEST);

if(isset($id_vendido))
	{
	$query = "UPDATE vehiculos  SET  vendido='".$val."'  WHERE id = '$id_vendido'	";
	$resultado = mysql_query($query);
	if($val=='')
		$msj='Maquinaria desmarcada como Vendida';
	else
		$msj='Maquinaria marcada como Vendida';
	}
else
	{
	$tipo_marca=explode('/',$marcas);
	$msj='Agregando '.$nuevo;
	$query = "INSERT INTO vehiculos (marc, year, model, km, color, note, used, price, visit, rubro, destacado, video) 
				
				VALUES('".$tipo_marca[1]."', '$anio', '$modelo', '".$km."', '$color', '$descripcion', '$nuevo', '$precio', '14', '".$tipo_marca[0]."', '".$destacado."', '".$video."');";

$result = mysql_query($query);

	  $resultados =  $db->consulta("SELECT MAX(id) FROM vehiculos");
	  $row=mysql_fetch_row($resultados);

$id_vehiculo=$row[0];

if(isset($_SESSION['img']))  
$img=$_SESSION['img']; else $img=false;

	if($img)
	{
		foreach($img as $k => $v)
			{	
			$url=$v['url'];
			$url=explode('__',$url);
			$url800=$url[0].'_800x600'.$url[1];
			$url300=$url[0].'_300x200'.$url[1];
			$por=$v['portada'];
			$sql = "INSERT INTO imagenes  
						(id_vehiculo, url, min_url, portada)
					VALUES
						('$id_vehiculo','$url800', '$url300', '$por')";
			
			mysql_query($sql);
			
			}
	}
unset($_SESSION['img']);
}

$db->desconectar();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META HTTP-EQUIV="Refresh" CONTENT="2; URL=adm_nuevo_producto.php" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="STYLESHEET" type="text/css" href="estilo.css">
<title>Don Francisco Maquinarias</title>

<script language="javascript" type="text/javascript" src="js/barra.js"></script>
<link rel="stylesheet" id="dox_css_reset-css" href="../css/reset000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_grid-css" href="../css/grid0000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_google_font-css" href="../css/css00000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_main-css" href="../css/style000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_prettyphoto-css" href="../css/prettyph.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_default-css" href="../css/default0.css" type="text/css" media="all">
<link href="estilo.css" rel="stylesheet" type="text/css" />
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

<body class="home blog">

<div style="height:5px; background-color:#0F0"></div>


<?php include('templates/navigation.php'); ?>

	
<div class="container">
	<div class="container_12 clearfix">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top" bgcolor="#ffffff" style="background-repeat: no-repeat; background-position: top;"><div class="contenedor" align="left">
      <div align="center" style="border:1px solid #999; font-family:Arial, Helvetica, sans-serif; font-size:16px; height:400px; margin-top:20px; padding-left:10px;">
        <p><span class="Estilo6"><? echo $msj; ?></span><br />
          <img src="icono/cargando.gif" width="200" height="200" /></p>
      </div>
      <br />
    </div>
      
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