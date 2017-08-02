<?
include("../clase_DB.php");  
$db = new DB();
$db->conectar();
extract($_REQUEST);



$resul =  $db->consulta("SELECT url FROM imagenes where id='$id' ");
	$re=mysql_num_rows($resul);
	  if($re>0)
	  	{
		$url=mysql_fetch_row($resul);
		$url=explode('/', $url[0]);
			
		if (!unlink($_SERVER['DOCUMENT_ROOT'].'/usados/'.$url[count($url)-1])){ 
					echo 'no se pudo borrar el archivo'; 
		}
										
		$query = "
		DELETE FROM  imagenes 
		WHERE id = $id;
	";
	
	$resultado = mysql_query($query);
		}
	
header('Location:modificar.php?id_vehiculo='.$id_vehiculo.'');	
	
?>
