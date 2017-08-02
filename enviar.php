<?

extract($_REQUEST);

$body='<body style="margin: 10px;"><div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;"><div align="left">';
$body.='Fecha: '.date('d/m/Y').'<br>';
$body.='Nombre y Apellido: '.$name.'<br>';
$body.='Email: '.$email.'<br>';
if(isset($telefono))
	{$body.='Telefono: '.$telefono.'<br>';
	$body.='Localidad: '.$localidad.'<br>';}

if(isset($url))
	{$body.='Maquinaria: <a href="'.$url.'">Ver aqui</a><br>';}

$body.='Mensaje: '.$message.'<br><br></div></div></body>';

// Varios destinatarios
$para  = 'info@donfranciscomaquinarias.com'; // atención a la coma

// subject
$titulo = 'A llegado un contacto a www.donfranciscomaquinarias.com';


// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: info@donfranciscomaquinarias.com'. "\r\n";
$cabeceras .= 'From: '.$name.' '.$email.' '. "\r\n";

$cabeceras .= 'Bcc: carina@donfranciscomaquinarias.com' . "\r\n";

$msj='Error al enviar el mensaje';
// Mail it

if (!ereg("^([a-zA-Z0-9._]+)@([a-zA-Z0-9.-]+).([a-zA-Z]{2,4})$",$email)){ 
     $msj='Direccion de Correo invalido';	
  } else { 
       if(mail($para, $titulo, $body, $cabeceras))
			$msj='Mensaje enviado correctamente';
  }

if(isset($url))
	header('Location:'.$url.'&msj='.$msj);
else	
	header('Location:contacto.php?msj='.$msj);

?>
