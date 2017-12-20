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
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 col-sm-12 title-search">
			<h4 class="section-line section-tittle">
				<?php
				if($title == '') echo 'Nuevos y Usados';
				else echo $title;
				?>
			</h4>
		</div>

		<div class="col-md-7 col-md-offset-1 col-xs-10 col-xs-offset-1 col-sm-6 maq-info">
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
					<div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12 maq-info-2">
						<div class="panel panel-default">
							<div class="col-md-6 col-xs-6 card">
								<img src="<?=$row['min_url']?>" class=" img-responsive imgFeatured img-thumbnail" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" />
							</div>
							<div class="panel-body item-panel">
								<div class="col-md-6 col-xs-6">
									<h4 class="panel-title section-title"><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></h4>
									<div class="col-md-12 col-sm-12	col-xs-12">
										<ul>
											<li class="features">Marca : <?=ucwords($row['marc'])?></li>
											<li class="features">Modelo : <?=ucwords($row['model'])?></li>
											<li class="features">Estado : <?=ucwords($row['used'])?> </li>
											<li class="features">Año: <?=ucwords($row['year'])?> </li>
											<li class="list-span col-md-6 col-sm-6 col-xs-12"><span>Precio $ <?=ucwords($row['price'])?></span></li>
											<li class="list-span col-md-6 col-sm-6 col-xs-12"><button type="button" class="btn btn-default detalles" name="button">
													<a href="item.php?maquinaria=<?=$row['id_vehiculo']?>" target="_blank">MAS INFORMACIÓN</a>
												</button>
											</li>
										</ul>
									</div>
									
								</div>
							</div>
						</div>
					</div>

				<?php } }  ?>

				<!-- begin - .pagination -->
				<div class="col-md-12 col-xs-12 num-navegacion">
					<ul class="pagination">
						<?php
						$page = 0;
						for($i=1; $i+10 < $cantidad; $i=$i+10) {
							$page++;
							$url = 'search.php?marca='.$marca.'&modelo='.$modelo.'&anio='.$year.'&nuevo='.$estado.'&rubro='.$rubro.'&page='.$page.'&auto_search=true&searchAutosBoxButton=Buscar';
							?>
							<li <?php if($actual == $page) echo 'class="page-item active"'; else {
								echo 'class="page-item"';
							} ?> >
							<a href="<?=$url?>" class="page-link"><?=$page?></a>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
			<!-- end - .pagination -->
		</div><!-- end - .search-results -->
		<div class="col-md-3 col-md-offset-0  col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 ">
			<?php include('templates/sidebar_interior.php'); ?>
		</div>
	</div>
</div>
