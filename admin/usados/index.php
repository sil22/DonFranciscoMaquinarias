<? session_start();
//session_destroy();
if(isset($_SESSION['img']))
   $img=$_SESSION['img'];
else
   $img=false;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<form name="form1" id="form1" method="post" enctype="multipart/form-data" action="cargar_img.php" >
  <label>
    <input type="file" name="imagen" id="imagen" />
    <input name="portada" type="checkbox" value="si" checked="checked" />
    <span style="font-size:10px; font-family:Verdana, Geneva, sans-serif">Portada del vehiculo</span>
    <input type="submit" name="button" id="button" value="Agregar Imagen" />
  </label>
</form>
<br />
<?

//var_dump($img);

if($img){
	foreach($img as $k => $v){

	     $url=explode('__',$v['url']);
	?>
	<img src="<?php echo $url[0].'_300x200'.$url[1] ?>" width="150" />
	<?
	}
}


?>

</body>
</html>
