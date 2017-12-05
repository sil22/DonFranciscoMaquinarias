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
	LIMIT 8
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

	<div id="latestCars">
		<div class="container-fluid">
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
					<h4 class="section-title section-line">Usados Seleccionados</h4>


					<div class="carousel slide " id="theCarousel" data-intervar="false">
						<div class="carousel-inner">
							<?php
							for ($i=0;$i<8;$i+=4)	{?>
								<div class="item <?php if ($i == 0) echo 'active'; ?>">
									<div class="row">
										<?php
										for ($j = $i; $j < $i+4; $j++) {
											?>
											<div class="col-xs-3">
												<img src="<?php echo $imagenes[$j]['url'];?>" class="img-responsive img-carousel" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" target="_blank">
												<div class="carousel-caption">
													<h5><a href="item.php?maquinaria=<?php echo $imagenes[$j]['id_vehiculo']?>"><?php echo $imagenes[$j]['model']?> </a></h5>
												</div>
											</div>
										<?php 	} ?>
									</div>
								</div>
							<?php 	} ?>
						</div>
						<a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
						<a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end - #latest-cars -->
