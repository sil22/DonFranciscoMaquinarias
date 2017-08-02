<?php
include("../class/SimpleImage.class.php");

function subir_imagen($name){
	ini_set("memory_limit","512M");
	$tempFile = $_FILES[$name]['tmp_name'];
	$targetPath = '/home/dfmdon32/public_html/usados/';
	$subida = 0;
	$targetFile =  $targetPath.$_FILES[$name]['name'];
	$sep=explode('image/',$_FILES[$name]['type']); // Separamos image/
	$tipo=$sep[1]; // Optenemos el tipo de imagen que es
	if($tipo == 'gif' || $tipo == 'jpeg' || $tipo == 'png' || $tipo == 'pjpeg'){ // Si el tipo de imagen a subir es el mismo de los permitidos, segimos.

		//var_dump($_FILES[$name]);
		//var_dump($targetFile);
		//var_dump($targetFile);
		//var_dump(move_uploaded_file( $_FILES[$name][ 'tmp_name' ], $targetFile));
		//die;

		if(move_uploaded_file( $_FILES[$name][ 'tmp_name' ], $targetFile)){  // Subimos el archivo
			$subida = 1;
		}

		chmod($targetFile,0644);
		if($subida == 1){ //si la subida fue correcta
			$obj_simpleimage = new SimpleImage(); //creamos un objeto de la clase SimpleImage
			$obj_simpleimage->load($targetFile); //leemos la imagen
			$var_nuevo_archivo = date("YmdHis"); //asignamos un nombre aleatorio al nuevo archivo, para evitar sobreescritura
			$ancho = $obj_simpleimage->getWidth();
			$alto = $obj_simpleimage->getHeight();
			$tipo = $obj_simpleimage->getType();
			$tipoFunction = $obj_simpleimage->getTypeFunction();
			//ahora calculo el % a redimensionar
			if($ancho>$alto){
				$porcent_escalar= (50*100) / 300;
				$porcent_escalar1= (300*100) / 800;
				$porcent_escalar2= (800*100) / $ancho;
			}
			else{
				$porcent_escalar= (50*100) / 200;
				$porcent_escalar1= (200*100) / 600;
				$porcent_escalar2= (600*100) / $alto;
			}
			$obj_simpleimage->scale($porcent_escalar2); //escalo la imagen
			$var_nuevo_archivo = strtolower(str_replace(' ', '_', $var_nuevo_archivo)); //reemplazamos los espacios en blanco con sub-guiones, para
			$obj_simpleimage->save($targetPath.$var_nuevo_archivo.'_800x600.'.$tipo, $tipoFunction); //guardamos los cambios efectuados en la imagen
			$obj_simpleimage->scale($porcent_escalar1); //escalo la imagen
			$var_nuevo_archivo = strtolower(str_replace(' ', '_', $var_nuevo_archivo)); //reemplazamos los espacios en blanco con sub-guiones, para
			$obj_simpleimage->save($targetPath.$var_nuevo_archivo.'_300x200.'.$tipo, $tipoFunction); //guardamos los cambios efectuados en la imagen
			}
			return 'http://donfranciscomaquinarias.com/usados/'.$var_nuevo_archivo.'__.'.$tipo;
		}
		return '';
}

?>
