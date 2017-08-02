<?
include("../clase_DB.php");  
$db = new DB();
$db->conectar();
extract($_REQUEST);


if(isset($id_v))
	{
		if(isset($modificar))
			{
			$query = "UPDATE imagenes SET  portada = '' WHERE id_vehiculo='$id_v' "; $resultado = mysql_query($query);
			$query = "UPDATE imagenes SET  portada = 'si' WHERE id = '$id' "; $resultado = mysql_query($query);		
			}
	}
	
header('Location:modificar.php?id_vehiculo='.$id_v.'');	
	
?>
