<? session_start(); 
ini_set('memory_limit','128M');

//session_destroy();

include('subirimg.php');
if($_FILES["imagen"]["size"]<=1073741824){
	$url=subir_imagen("imagen");

}  

extract($_REQUEST);

if(isset($_SESSION['img'])){
	$img=$_SESSION['img'];  
	$i=count($img)+1;
	$img[$i]['url']=$url;  
	
	if($portada=='si')
		$img[$i]['portada']='si';
	else
		$img[$i]['portada']='';
	
	$_SESSION['img']=$img;}
else	
	{$img=array();
	
	$img[0]['url']=$url;  
	
	if($portada=='si')
		$img[0]['portada']='si';
	else
		$img[0]['portada']='';
	
	$_SESSION['img']=$img;}

  
?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="Refresh" CONTENT="3; URL=index.php" >
</head>

<body>
<img style=" margin-left:40%" src="../icono/cargando.gif" width="150" height="150" />
</body>
</html>