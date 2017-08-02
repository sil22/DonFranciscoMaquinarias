<!--
<div class="container_12 clearfix" style="background-color:#ffe373; width:100%; margin-top:-25px; padding:-5px">
  <img src="http://donfranciscomaquinarias.com/files/front_don_francisco.jpg" width="960" height="285" style="margin-left:-17%;" />
</div>
-->
<div class="container">
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="imgFront">
    <img src="http://donfranciscomaquinarias.com/files/front_don_francisco.jpg" class="img-responsive" alt="front image">
        </div>
  </div>
</div>

</div>

<!-- INICIO DE CARTEL -->
<!-- BORRAR DESDE ACÁ -->

<div style="display:none; position:absolute; top:1" id="invitacion2">
<ul>
    <li>
        <a id="invitacion" href="http://donfranciscomaquinarias.com/files/Invitacion.jpg" rel="prettyPhoto[gallery]" class="image-zoom slide-thumb-zoom">
            <span class="zoom-icon"></span>
        </a>
    </li>
</ul>
</div>

<script>
$j("a[rel^='prettyPhoto']").prettyPhoto( { opacity: '0.40', show_title: false, social_tools: '' } );

$j(function() {
$j('.thumb-container').gridnav({
	rows: 3,
	type	: {
		mode		: 'fade', 	// use def | fade | seqfade | updown | sequpdown | showhide | disperse | rows
		speed		: 500,			// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
		easing		: '',			// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
		factor		: '',			// for seqfade, sequpdown, rows
		reverse		: ''			// for sequpdown
	}
});
});

</script>
<script>


/*jQuery(document).ready(function() {


jQuery('a#invitacion').click();

});*/


</script>

<!-- FIN DE CARTEL -->
<!-- BORRAR HASTA ACÁ -->


<!-- #featured-cars -->
<div class="container clearfix" id="featuredCars">
<div class="row">
  <div class="col-md-12">
    <h4 class="section-title section-line">Maquinarias</h4>
  </div>
  <div id="featuredCars_tj_container">
      <div class="tj_nav">
				<span id="tj_prev" class="tj_prev">Anterior</span>
				<span id="tj_next" class="tj_next">Siguiente</span>
			</div>

			<div class="tj_wrapper">
				<ul class="tj_gallery">


<!--
<div id="featuredCars" class="container">
	<div class="container_12 clearfix">
		<div class="grid_12 clearfix"><h4 class="section-title section-line">Maquinarias</h4></div>

		<div id="featuredCars_tj_container" class="grid_12 tj_container">

			<div class="tj_nav">
				<span id="tj_prev" class="tj_prev">Anterior</span>
				<span id="tj_next" class="tj_next">Siguiente</span>
			</div>

			<div class="tj_wrapper">
				<ul class="tj_gallery">
        -->
			 <?php

			require_once('admin/clase_DB.php');

			$db = new DB();

			$db->conectar();

			$resultados =  $db->consulta('SELECT
												*
										  FROM
										  		vehiculos,imagenes
										  WHERE
												vehiculos.id  = imagenes.id_vehiculo AND
												imagenes.portada = "si" AND
												vehiculos.destacado = "si"
											ORDER BY
                        vehiculos.id DESC
										  LIMIT 9 ');



			while($row=mysql_fetch_array($resultados)){

		?>
					<li class="col-md-4">
						<a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>" class="image-zoom" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>">
							<img src="<?=$row['min_url']?>" class="img-responsive imgFeatured attachment-featured" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>">
                            <span class="zoom-icon"></span> <!-- icono + arriba de la foto -->
						</a>
						<h5 class="marginT5"><a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" ><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></a></h5>
					</li>
                    <?php }

					$db->desconectar();

					 ?>

				</ul>
			</div>
		</div>
  </div>
</div>



<script type="text/javascript">
	var $j = jQuery.noConflict();

	$j(function() {
		$j('#featuredCars_tj_container').gridnav({
			rows: 1,
			type	: {
				mode		: 'seqfade', 	// use def | fade | seqfade | updown | sequpdown | showhide | disperse | rows
				speed		: 800,			// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
				easing		: '',			// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
				factor		: 100,			// for seqfade, sequpdown, rows
				reverse		: ''			// for sequpdown
			}
		});
	});
</script>
<!-- end - #featured-cars -->
