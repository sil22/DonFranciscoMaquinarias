<?
include("../clase_DB.php");  
$db = new DB();
$db->conectar();
extract($_REQUEST);


if(isset($id_vehiculo))
	{
		if(isset($button))
			{
			include('subirimg.php');
			$url=subir_imagen("imagen",545); 
			$url=explode('__',$url);
			$url800=$url[0].'_800x600'.$url[1];
			$url400=$url[0].'_300x200'.$url[1];
			if(!isset($por))
				$por='';
			$sql = "INSERT INTO imagenes  
						(id_vehiculo, url, min_url, portada)
					VALUES
						('$id_vehiculo','$url800', '$url400', '$por')";
			mysql_query($sql);
			}
			
		$resultados =  $db->consulta("SELECT * FROM imagenes where id_vehiculo='$id_vehiculo' ORDER BY id asc");
	  
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


<form action="modificar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <label>
    <input type="file" name="imagen" id="fileField" />
    <input name="id_vehiculo" type="hidden" value="<?php echo $id_vehiculo ?>" /> <input name="por" type="checkbox" value="si" />
    <input type="submit" name="button" id="button" value="Agregar Imagen" />
  </label>
</form>
<br />
<?

while($row=mysql_fetch_row($resultados))
	{
	?>
    <div style="float:left; margin:5px; ">
	<img src="<?php echo $row[3] ?>" width="150" /><a href="eliminar.php?id=<?php echo $row[0] ?>&id_vehiculo=<?php echo $id_vehiculo	; ?>"><img src="../icono/eliminar.png" width="10" border="0" style="margin:5px;" /></a>
    <form action="modificar_portada.php" method="post">
    <input name="id_v" type="hidden" value="<?php echo $id_vehiculo; ?>" />
    <input name="id" type="hidden" value="<?php echo $row[0]; ?>" />
    <input name="portada" type="checkbox"  value="si" <? if($row[4]=='si') { ?> checked="checked" <? } ?> /><input name="modificar" type="submit" value="Portada" />
    </form>
    </div>
	<?
	}

?>

</body>
</html>