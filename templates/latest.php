<!-- #latest-cars -->
<div id="latestCars" class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-md-8 col-lg-12">
			<h4 class="section-title section-line">Usados Seleccionados</h4>
		</div>
		<div class="col-xs-12 col-md-12">
			<div class="carousel slide " id="theCarousel" data-intervar="false">
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
						LIMIT 9
						');

						while($row=mysql_fetch_array($resultados)){

							?>

							<div class="item active">
								<div class="row">
								<div class="col-xs-4">
									<img src="<?=$row['min_url']?>" class="img-responsive attachment-main" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" target="_blank">
									<div class="carousel-caption">
										<h6><a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>"><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></a></h6>
									</div>
								</div>
								<div class="col-xs-4">
									<img src="<?=$row['min_url']?>" class="img-responsive attachment-main" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" target="_blank">
									<div class="carousel-caption">
										<h6><a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>"><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></a></h6>
									</div>
								</div>
								<div class="col-xs-4">
									<img src="<?=$row['min_url']?>" class="img-responsive attachment-main" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" target="_blank">
									<div class="carousel-caption">
										<h6><a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>"><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></a></h6>
									</div>
								</div>
							</div>
						</div>
								<div class="item">
									<div class="row">
									<div class="col-xs-4">
										<img src="<?=$row['min_url']?>" class="img-responsive attachment-main" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>">
										<div class="carousel-caption">
											<a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>"><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></a></h6>
										</div>
									</div>
									<div class="col-xs-4">
										<img src="<?=$row['min_url']?>" class="img-responsive attachment-main" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>">
										<div class="carousel-caption">
											<a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>"><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></a></h6>
										</div>
									</div>
									<div class="col-xs-4">
										<img src="<?=$row['min_url']?>" class="img-responsive attachment-main" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>">
										<div class="carousel-caption">
											<a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>"><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></a></h6>
										</div>
									</div>
								</div>
							</div>
							<?php }

							$db->desconectar();
							?>


					</div>
					<a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
					<a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
				</div>
			</div>
		</div>
	</div>

	<!-- end - #latest-cars -->
