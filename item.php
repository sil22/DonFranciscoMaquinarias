<?php

$id = (int) $_GET['maquinaria'];

include('admin/clase_DB.php');

$db = new DB();

$db->conectar();

$resultados =  $db->consulta('SELECT * FROM vehiculos WHERE id='.$id . ' LIMIT 1');

$row=mysql_fetch_array($resultados);

$db->desconectar();

extract($row);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Don Francisco Maquinarias | <?=$model?> <?=$marc?></title>


	<meta name="description" content="<?=$model?> <?=$marc?> - Don Francisco Maquinarias - Venta de maquinarias agrícolas nuevas y usadas de marcas como Legar, Bertini, Pozzi, Erca, Pauny, Baima, Praba, Cestari, Don Roque, De Grande. Tractores, cosechadoras, tolvas, pulverizadoras." />
	<meta name="keywords" content="Maquinaria, maquinaria, tractores, cosechadoras, sembradoras, pulverizadoras, Legar, Bertini, Pozzi, Erca, Pauny, Baima, Praba, Cestari, Don Roque, De Grande, rotoenfardadoras, picadoras de forraje, mixers, implementos agricolas, acoplados y semiremolques, casillas rurales, rastras, segadoras, moledoras, tolvas, arados, enfardadora, maquinas viales" />
	<meta property="og:description" content="<?=$model?> <?=$marc?> - Don Francisco Maquinarias - Venta de maquinarias agrícolas nuevas y usadas de marcas como Legar, Bertini, Pozzi, Erca, Pauny, Baima, Praba, Cestari, Don Roque, De Grande." />
	<meta name="robots" content="index, follow" />

	<!-- Bootstrap -->

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

	<!-- Estilos propios -->

	<link rel="shortcut icon" href="files/favicon0.png" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">


	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/master.js" charset="utf-8"></script>
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">

				<header>
					<?php include('templates/navigation.php'); ?>
				</header>
				<section>
					<?php include('templates/single.php'); ?>
					<?php include('templates/latest.php'); ?>
				</section>
				<footer class="footer">
					<?php include('templates/footer.php'); ?>
				</footer>

			</div>
		</div>
	</div>

</body>
</html>
