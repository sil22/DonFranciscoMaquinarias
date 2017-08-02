<?

extract($_REQUEST);

$body='<body style="margin: 10px;"><div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;"><div align="left">';
$body.='Fecha: '.date('d/m/Y').'<br>';
$body.='Asunto: '.$asunto.'<br>';
$body.='Nombre y Apellido: '.$nombre.'<br>';
$body.='Mensaje: '.$mensaje.'<br><br></div></div></body>';

// Varios destinatarios
$para  = 'bravo_edu700@hotmail.com'; // atención a la coma

// subject
$titulo = 'Pedido de soporte de www.donfranciscomaquinarias.com';


// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: bravo_edu700@hotmail.com'. "\r\n";
$cabeceras .= 'From: donfranciscomaquinarias info@donfranciscomaquinarias.com '. "\r\n";

$msj='Error al enviar el mensaje';
// Mail it

if (!ereg("^([a-zA-Z0-9._]+)@([a-zA-Z0-9.-]+).([a-zA-Z]{2,4})$",$para)){ 
     $msj='Direccion de Correo invalido';	
  } else { 
       if(mail($para, $titulo, $body, $cabeceras))
			$msj='Mensaje enviado correctamente';
  }
	
	header('Location:adm_soporte.php?msj='.$msj);

?>
