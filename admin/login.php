<?
session_start();
include("clase_DB.php");
$db = new DB();
$db->conectar();
extract($_REQUEST);
$resultados =  $db->consulta("SELECT id FROM usuarios where name='$user' and pass='$pass' ");
$res=mysql_num_rows($resultados);
if($res > 0)
	{	$_SESSION['admin']=$user;
		header('Location:adm.php');}
else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INGRESAR</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-color:#ccdeea; background-image:url(../img/bg-log.jpg); background-position:top; background-repeat:repeat-x;"  >

<div align="center" >
    <div style=" background-image:url(../img/cu-log.jpg); width:580px; height:369px; margin-left:30%; margin-top:100px; position:absolute;" align="center">
    	<div align="center" style="background-image:url(../img/bg-for.jpg); width:553px; height:190px; margin-top:100px; position:relative;">
    
    
    <form action="login.php" method="post" style="margin:0px; padding:0px;" >
   
   
   <div style="width:95%; height:45px;">
   		<div style=" margin-top:45px; float:left; height:30px; width:38%; text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:100;" >Usuario</div>
   		<div align="left" style="margin-top:35px; width:60%; height:43px; background-image:url(../img/inp-bg.jpg); background-repeat:repeat-x; float:right;">
        	<div style="background-image:url(../img/inp-izq.jpg); height:43px; width:6px; float:left;"></div>
        <span id="sprytextfield1">
      			<input class="input_log" type="text" name="user" id="user" style="width:94%; margin-top:5px;" />
      			
            </span>
            <div style="background-image:url(../img/inp-der.jpg); height:43px; width:6px; float:right;"></div>
        </div>
   </div>
    
  
   <div style="width:95%; height:45px;">
   		<div style="float:left; margin-top:38px; height:30px; width:38%; text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:100;" >Contraseña</div>
   		<div align="left" style="margin-top:20px; width:60%; height:43px; background-image:url(../img/inp-bg.jpg); background-repeat:repeat-x; float:right;">
        	<div style="background-image:url(../img/inp-izq.jpg); height:43px; width:6px; float:left;"></div>
    <span id="sprytextfield2">
      			<input class="input_log" type="password" name="pass" id="pass" style="width:50%;  margin-top:5px; margin-right:18px; "/>
      			
            <a href="#" style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#6c7cd1;"> Olvido su contraseña?</a>
            </span>
            <div style="background-image:url(../img/inp-der.jpg); height:43px; width:6px; float:right;"></div>
        </div>
   </div>
      <div style="width:100%; height:30px; margin-top:70px; font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:100;">
      <input name="recordar" type="checkbox" value="recordar" checked="checked" />Recordar en este terminal?
      </div>   
      <div style="width:70%; height:34px; margin-top:20px; text-align:right;">
<input name="button" type="submit" class="boton" id="button" value=" " style="background-image:url(../img/boton.jpg); width:80px; height:32px; cursor:pointer" />
      </div>
    </form>
    
    
    	</div>
    </div>
</div>

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>
<? } ?>