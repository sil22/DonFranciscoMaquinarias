<!DOCTYPE html> <!-- PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<!--<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">-->
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Don Francisco Maquinarias Agrícolas">


<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Estilos propios -->
<link rel="shortcut icon" href="files/favicon0.png" type="image/x-icon">

<link rel="stylesheet" id="dox_css_reset-css" href="css/reset000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_grid-css" href="css/grid0000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_google_font-css" href="css/css00000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_main-css" href="css/style000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_prettyphoto-css" href="css/prettyph.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_prettyphoto-css" href="css/prettypi.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_default-css" href="css/default0.css" type="text/css" media="all">

<title>Don Francisco Maquinarias</title>
</head>

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
