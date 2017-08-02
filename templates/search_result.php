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
		$pag = 1;
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

<div class="grid_12">
	<h3 class="page-title">
	<?php 
		if($title == '') echo 'Nuevos y Usados';
		else echo $title;
	?>
    </h3>
</div>

<div id="content" class="grid_8 listing">

			<!-- .entry-content -->
			<!--<div class="entry-content">No ad could be found matching your search criteria.</div>-->
            <!-- end - .entry-content -->
		
			<!-- .search-results -->
			<div class="search-results">
				
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


             
<div class="post-54 auto type-auto status-publish custom-post-type" id="post-54">
	<div class="grid_3 clearfix alpha">
    	<a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" class="image-zoom main-thumb-zoom" target="_blank">
    		<img width="220" height="146" src="<?=$row['min_url']?>" class="attachment-main" alt="default-thumb" title="default-thumb" />
            <span class="zoom-icon"></span>
        </a>
    </div>
	<div class="grid_5 clearfix omega">
    	<h3><a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>"><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></a></h3>
        <div class="grid_3 clearfix alpha">
        	<ul class="features">
            	<li><span>Marca</span> :<?=ucwords($row['marc'])?></li>
                <li><span>Modelo</span> : <?=ucwords($row['model'])?></li>
                <li><span>Estado</span> : <?=ucwords($row['used'])?> </li>
                <li><span>Año</span> : <?=ucwords($row['year'])?> </li>
	        </ul>
        </div>
		<div class="grid_2 clearfix omega">
        	<ul class="price"><li><span>Precio</span>$ <?=ucwords($row['price'])?></li></ul>
            <a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>" class="button" target="_blank" style="margin-top:60px">Ver detalles</a>
		</div>
	</div>
</div>




<?php } }  ?>

<!-- begin - .pagination -->                

<div class="dox_pager">
<?php if ($cantidad > 10){?>
<span>Páginas</span>
	<ul>
    	
        <?php 
		
						

		$page = 0;
		for($i=1; $i+10 < $cantidad; $i=$i+10) {
			$page++;	
			$url = 'http://donfranciscomaquinarias.com/search.php?marca='.$marca.'&modelo='.$modelo.'&anio='.$year.'&nuevo='.$estado.'&rubro='.$rubro.'&page='.$page.'&auto_search=true&searchAutosBoxButton=Buscar';		
		?>
    	<li <?php if($actual == $page) echo 'class="current"'; ?>><a href="<?=$url?>" class="pager"><?=$page?></a></li>
        <?php } ?>
<!--        <li class=""><a href="#" class="pager">2</a></li>
        <li class=""><a href="#" class="pager">3</a></li>-->
    </ul>
    <?php } ?>

</div>
<!-- end - .pagination -->                
                
	</div><!-- end - .search-results -->
</div>