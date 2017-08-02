<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Estilos propios -->
	<link rel="shortcut icon" href="files/favicon0.png" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">


	<title>Don Francisco Maquinarias</title>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Scripts propios -->
	<script type="text/javascript" src="js/jquery00.js"></script>
	<script type="text/javascript" src="js/superfis.js"></script>
	<script type="text/javascript" src="js/jquery01.js"></script>
	<script type="text/javascript" src="js/jquery02.js"></script>
	<script type="text/javascript" src="js/jquery03.js"></script>
	<script type="text/javascript" src="js/sliding0.js"></script>

	<script type="text/javascript">
	jQuery(document).ready(function() {

		<!-- Superfish -->
		jQuery('.navigation ul').superfish({
			delay: 200,
			animation: {opacity:'show',height:'show'},
			speed: 500,
			autoArrows: false,
			dropShadows: false
		});

		var $j = jQuery.noConflict();

		<!-- Alert -->
		$j(".alert").delay(5000).slideUp(350);


	});
	</script>


</head>
<body>
	<header>
		<?php include('templates/navigation.php'); ?>
		<?php include('templates/featured.php'); ?>
	</header>

	<?php include('templates/container.php'); ?>

	<aside>
		<?php include('templates/sidebar.php'); ?>
	</aside>

	<article>
		<?php include('templates/latest.php'); ?>
		<?php include('templates/dealers.php'); ?>
	</article>

	<footer class="footer">
		<?php include('templates/footer.php'); ?>
	</footer>

</body>
</html>
