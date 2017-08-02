<?php
session_start();
if(!isset($_SESSION["admin"]))
	header("Location:../index.html");
	$msj='';
	extract($_REQUEST);
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

<?php include('templates/navigation.php'); ?>

	
<div class="container">
	<div class="container_12 clearfix">
    <?php echo $msj ?>
		<form id="form1" name="form1" method="post" action="enviar.php">
        
<table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0" >
 
  <tr>
    <td align="center"><span class="Estilo6">Soporte</span></td>
    <td align="left">&nbsp;</td>
    </tr>
  <tr>
    <td width="14%" align="right" valign="top" class="Estilo6" >Nombre:</td>
    <td width="36%" align="left">
      <input name="nombre" id="nombre" type="text" size="45" />
    </td>
    </tr>
  <tr>
    <td align="right" valign="top" class="Estilo6" >Asunto:</td>
    <td align="left"><input name="asunto" id="asunto" type="text"  size="45" /></td>
    </tr>
  <tr>
    <td align="right" valign="top" class="Estilo6">Mensaje:</td>
    <td align="left"><label for="textarea"></label>
      <textarea name="mensaje" id="mensaje" cols="35" rows="4"></textarea></td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button3" id="button3" value="Cancelar" />      <input type="submit" name="button" id="button" value="Enviar" /></td>
    </tr>
  
</table>

	</form>			
		<div class="clear"></div>
  </div> 
</div>
<div class="clear"></div>

		<?php include('../templates/footer.php'); ?>	

</body>
</html>
</html>
