<?php
$search = '';
$title = '';

if ((isset($_GET['marca']) && (trim($_GET['marca'])!='')))
{
	$search .= 'AND UPPER(marc)  like "%' .strtoupper($_GET['marca']). '%"';
	$title .= trim($_GET['marca']) . ' ';
	$marca =  trim($_GET['marca']);
} else $marca = '';

if ((isset($_GET['modelo']) && (trim($_GET['modelo'])!='')))
{
	$search .= 'AND UPPER(model)  like "%' .strtoupper($_GET['modelo']). '%"';
	$title .= trim($_GET['modelo']) . ' ';
	$modelo =  trim($_GET['modelo']);
} else $modelo = '';

if ((isset($_GET['anio']) && (trim($_GET['anio'])!='')))
{
	$search .= 'AND UPPER(year)  like "%' .strtoupper($_GET['anio']). '%"';
	$title .= ' (' . trim($_GET['anio']) . ') ';
	$year =  trim($_GET['anio']);
} else $year = '';

if ((isset($_GET['nuevo']) &&  (trim($_GET['nuevo'])!='')))
{
	$search .= 'AND UPPER(used)  like "%' .strtoupper($_GET['nuevo']). '%"';
	$title .= trim($_GET['nuevo']) . ' ';
	$estado = trim($_GET['nuevo']);
} else $estado = '';

if ((isset($_GET['rubro']) &&  (trim($_GET['rubro'])!='')))
{
	$search .= 'AND UPPER(rubro)  like "%' .strtoupper($_GET['rubro']). '%"';
	$title .= trim($_GET['rubro']) . ' ';
	$rubro = trim($_GET['rubro']);
} else $rubro = '';

if ((isset($_GET['page']) &&  (trim($_GET['page'])!='')))
$page =  (int) trim($_GET['page']);
else
$page = 1;
$actual = $page;
$page = $page*10;

require_once('admin/clase_DB.php');

$db = new DB();

$db->conectar();

// obtengo la cantidad para paginar
$sql_cantidad = 'SELECT id FROM vehiculos WHERE 1 '. $search;
$resultados1 =  $db->consulta($sql_cantidad);
$cantidad = mysql_num_rows($resultados1);

// obtengo el resultado de la busqueda
$sql = 'SELECT * FROM vehiculos,imagenes
WHERE
vehiculos.id  = imagenes.id_vehiculo AND
imagenes.portada = "si"
'. $search .'
ORDER BY vehiculos.fecha DESC LIMIT '.$page.',10';

$resultados =  $db->consulta($sql);

?>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<h3 class="section-line section-tittle">
				<?php
				if($title == '') echo 'Nuevos y Usados';
				else echo $title;
				?>
			</h3>
		</div>

		<div class="col-md-8 col-xs-12">
			<?php

			if($cantidad < 1){

				echo '<h3>LA BÚSQUEDA NO PRODUJO RESULTADOS.</h3>';

				echo '<br /><h3>INTENTE CON ALGUNO DE ESTOS ITEMS</h3>';


				include('templates/container.php');


			}
			else
			{

				while($row=mysql_fetch_array($resultados)){
					?>
					<div class="col-md-12">
						<div class="col-md-6">
							<a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" class="image-zoom main-thumb-zoom" target="_blank">
								<img src="<?=$row['min_url']?>" class="attachment-main img-responsive imgFeatured img-rounded" alt="default-thumb" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" />
								<span class="zoom-icon"></span>
							</a>
						</div>
						<div class="col-md-6">
							<h3><a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>"><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></a></h3>
							<div class="col-md-8">
								<ul>
									<li class="features">Marca :<?=ucwords($row['marc'])?></li>
									<li class="features">Modelo : <?=ucwords($row['model'])?></li>
									<li class="features">Estado : <?=ucwords($row['used'])?> </li>
									<li class="features">Año: <?=ucwords($row['year'])?> </li>
								</ul>
							</div>
							<div class="col-md-4">
								<ul>
									<li><span>Precio</span>$ <?=ucwords($row['price'])?></li>
								</ul>
								<a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>" class="button" target="_blank" style="margin-top:60px">Ver detalles</a>
							</div>
						</div>
					</div>




				<?php } }  ?>

				<!-- begin - .pagination -->

				<div class="col-md-12 col-xs-12 num-navegacion">
					<?php if ($cantidad > 10){?>
						<ul>
							<li class="pager">Páginas</li>
							<?php
							$page = 0;
							for($i=1; $i+10 < $cantidad; $i=$i+10) {
								$page++;
								$url = 'http://donfranciscomaquinarias.com/search.php?marca='.$marca.'&modelo='.$modelo.'&anio='.$year.'&nuevo='.$estado.'&rubro='.$rubro.'&page='.$page.'&auto_search=true&searchAutosBoxButton=Buscar';
								?>
								<li <?php if($actual == $page) echo 'class="current"'; ?> >
								<a href="<?=$url?>"class="pager"><?=$page?></a>
								</li>
							<?php
							}
							?>
						</ul>
					<?php } ?>

				</div>

				<!-- end - .pagination -->

			</div><!-- end - .search-results -->

		<div class="col-md-4 col-xs-8">
			<?php include('templates/sidebar_interior.php'); ?>
		</div>
	</div>
</div>
