<!-- #latest-cars -->
<div id="latestCars" class="container">
	<div class="row">
		<div class="col-xs-10 col-sm-10 col-md-8 col-lg-12">
			<h4 class="section-title section-line">Usados Seleccionados</h4>
		</div>
				<div class="col-md-12">
					<div class="carousel slide multi-item-carousel" id="theCarousel">
						<div class="carousel-inner">


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
												vehiculos.used = "usado"
										  ORDER BY
											  	vehiculos.destacado ASC,vehiculos.fecha DESC
										  ');




			while($row=mysql_fetch_array($resultados)){

		?>

							 <div class="item active">
		            <div class="col-xs-4">
										<img src="<?=$row['min_url']?>" class="img-responsive">
								</div>
							</div>


							<div class="item">
								<div class="col-xs-4">
									<img src="<?=$row['min_url']?>" class="img-responsive">
								</div>
							</div>




					<?php }

					$db->desconectar();
					?>

				</div>
				</div>
				<a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
				<a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
				</div>
			</div>
		</div>
	</div>

	<!-- end - #latest-cars -->
<script type="text/javascript">
// Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
var next = $(this).next();
if (!next.length) {
	next = $(this).siblings(':first');
}
next.children(':first-child').clone().appendTo($(this));

if (next.next().length>0) {
	next.next().children(':first-child').clone().appendTo($(this));
} else {
	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
}
});
</script>
