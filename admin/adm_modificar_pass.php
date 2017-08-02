<?php 
session_start();
if(!isset($_SESSION["admin"]))
header("Location:../index.html"); 

include("clase_DB.php");  
$db = new DB();
$db->conectar();
extract($_REQUEST);
$ms='<span style=" margin-left:10px;">Modificar Contraseña </span>';
if(isset($modificar))
{
	
	if($nueva==$repetir)
	{

   	  $resultados =  $db->consulta("SELECT id FROM usuarios where pass='$antigua'");
	  $row=mysql_num_rows($resultados);

	if($row==1)
		{
		$id=$_SESSION["admin"];
		$query = "
			UPDATE usuarios 
			SET  pass = '$nueva' WHERE name = '$id' and pass='$antigua'
		";
		$resultado = mysql_query($query);		
		$ms='<span style="color:#060; margin-left:10px;">La Contraseña se a modificado correctamente</span>';
		}
	else
		{$ms='<span style="color:#F00; margin-left:10px;">La Antigua Contraseña NO es correcta</span>';}
	}
	else
	{
		$ms='<span style="color:#F00; margin-left:10px; ">Las Nuevas Contraseñas NO coinciden</span>';
		}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="STYLESHEET" type="text/css" href="../css/formato.css">
	<link rel="STYLESHEET" type="text/css" href="css/formato_adm.css">  <!-- CSS para admin -->
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

form div{ width:100%; height:50px; float:left; display:block; position:relative;}
-->
</style>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body class="home blog">

<div style="height:5px; background-color:#0F0"></div>


<?php include('templates/navigation.php'); ?>

	
<div class="container">
	<div class="container_12 clearfix">
  <table width="100%" border="0" cellpadding="0"  cellspacing="0">
  <tr>
    <td width="284" align="center" valign="top" >&nbsp;</td>
    <td width="623" height="650" align="left" valign="top" class="contenedor" >

      <table cellspacing="0" cellpadding="0" border="0" width="100%" class="tabla_listado">
        <tr>
          <td  height="30" background="../images/bg_boxlist.gif" class="index_html_item_title"><?=$ms ?></td>
          </tr>
        </table>
      <div style=" border:1px solid #999; padding-left:10px; width:98%; float:left">
        <form action="adm_modificar_pass.php" method="post" name="form1" id="form1">
       	<div> 
        	<label> <span class="Estilo6">Antigua Contraseña:</span><br /><input name="antigua" type="password" id="antigua" style="width:280px" /></label>
		</div>
        <div>
        	<label> <span class="Estilo6">Nueva Contraseña:</span><br /><input name="nueva" type="password" id="nueva" style="width:280px" /></label>
        </div>
        <div>          
      	    <label> <span class="Estilo6">Repetir Nueva Contraseña</span><br /><input name="repetir" type="password" id="repetir" style="width:280px" /></label></div>
        <div>
        <div>
       		<label><input name="modificar" type="submit" value="Modificar Contrase&ntilde;a" /><br /></label>
		</div>
        </form>
        </div>
      
    </td>
    <td width="310" align="center" valign="top" >&nbsp;</td>
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