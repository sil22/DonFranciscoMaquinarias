<? 
session_start(); 
if (!isset($_SESSION["admin"])) 
{header('Location:../');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>By By, hasta luego, que tengas buen dia </title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/barra.js"></script>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
.Estilo21 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Estilo22 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo23 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; color: #FFCC00; }
-->
</style>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td  height="70" align="left" bgcolor="#666666" class="Estilo3" style="padding-left:80px"><span class="Estilo3" style="padding-left:80px"><a href="adm.php" style="text-decoration:none; color:#CCCCCC;">Panel de Control</a><br />
www.automotoresharispuruhnos.com</span></td>
    <td  align="right" bgcolor="#666666" style="padding-right:80px"><span class="Estilo6">E-mail:</span> <span class="Estilo3">info@automotoresharispuruhnos.com</span><br />
      <span class="Estilo6"><br />
      </span></td>
  </tr>
</table>



<div align="center" class="barra_nav" ></div>
<p align="center" class="Estilo23">&nbsp;</p>
<p align="center" class="Estilo23">&nbsp;</p>
<p align="center" class="Estilo23"><a href="../index.html" style="text-decoration:none; color:#FFCC00">SE HA CERRADO LA SESION</a></p>
<div align="center">
  <span class="Estilo23">
  <?php session_destroy(); ?>
</span><span class="Estilo22"></span><span class="Estilo21"></span></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
</p>
<div align="center" class="barra_nav" ></div>
</body>
</html>
