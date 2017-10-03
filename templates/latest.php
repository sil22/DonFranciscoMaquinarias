<!-- #latest-cars -->
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
	LIMIT 6
	');

	$imagenes = '';
	$i = 0;

	while($row=mysql_fetch_array($resultados)){
			$imagenes[$i]['url'] = $row['url'];
			$imagenes[$i]['model'] = $row['model'];
			$imagenes[$i]['id_vehiculo'] = $row['id_vehiculo'];
			$i++;
		}
		$db->desconectar();
		?>

<div id="latestCars" class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-md-8 col-lg-12">
			<h4 class="section-title section-line">Usados Seleccionados</h4>
		</div>
		<div class="col-xs-12 col-md-12">
			<div class="carousel slide " id="theCarousel" data-intervar="false">
				<div class="carousel-inner">

							<?php for ($i = 0; $i < count($imagenes); $i++) {
							 ?>
							<div class="item active">
								<div class="row">
									<div class="col-xs-4">
										<img src="<?php echo $imagenes[0]['url'];?>" class="img-responsive img-carousel" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" target="_blank">
										<div class="carousel-caption">
											<h5><a href="item.php?maquinaria=<?php echo $imagenes[0]['id_vehiculo']?>"><?php echo $imagenes[0]['model']?> </a></h5>
										</div>
									</div>
									<div class="col-xs-4">
										<img src="<?php echo $imagenes[1]['url'];?>" class="img-responsive img-carousel" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" target="_blank">
										<div class="carousel-caption">
											<h5><a href="item.php?maquinaria=<?php echo $imagenes[1]['id_vehiculo']?>"><?php echo $imagenes[1]['model']?> </a></h5>
										</div>
									</div>
									<div class="col-xs-4">
										<img src="<?php echo $imagenes[2]['url'];?>" class="img-responsive img-carousel" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" target="_blank">
										<div class="carousel-caption">
											<h5><a href="item.php?maquinaria=<?php echo $imagenes[2]['id_vehiculo']?>"><?php echo $imagenes[2]['model']?> </a></h5>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="row">
									<div class="col-xs-4">
										<img src="<?php echo $imagenes[3]['url'];?>" class="img-responsive img-carousel" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>">
										<div class="carousel-caption">
											<h5><a href="item.php?maquinaria=<?php echo $imagenes[3]['id_vehiculo']?>"><?php echo $imagenes[3]['model']?> </a></h5>
										</div>
									</div>
									<div class="col-xs-4">
										<img src="<?php echo $imagenes[4]['url'];?>" class="img-responsive img-carousel" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>">
										<div class="carousel-caption">
											<h5><a href="item.php?maquinaria=<?php echo $imagenes[4]['id_vehiculo']?>"><?php echo $imagenes[4]['model']?> </a></h5>
										</div>
									</div>
									<div class="col-xs-4">
										<img src="<?php echo $imagenes[5]['url'];?>" class="img-responsive img-carousel" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>">
										<div class="carousel-caption">
											<h5><a href="item.php?maquinaria=<?php echo $imagenes[5]['id_vehiculo']?>"><?php echo $imagenes[5]['model']?> </a></h5>
										</div>
									</div>
								</div>
							</div>

						<?php }

						?>

					</div>
					<a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
					<a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
				</div>
			</div>
		</div>
	</div>

	<!-- end - #latest-cars -->
