<!-- #latest-cars -->
<div id="latestCars" class="container">
	<div class="container_12 clearfix">
		<div class="grid_12"><h4 class="section-title section-line">Usados Seleccionados</h4></div>
		
		<div id="latestCars_tj_container" class="grid_12 tj_container">
			
			<div class="tj_nav">
				<span id="tj_prev2" class="tj_prev">Anterior</span>
				<span id="tj_next2" class="tj_next">Siguiente</span>
			</div>
			
			<div class="tj_wrapper">
				<ul class="tj_gallery">
										
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
                                        
                                        
                                        
                                        
                                        
                                        
					<li class="grid_3 clearfix alpha">
                    	<!-- arriba -->
						<a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>" class="image-zoom home-thumb-zoom">
							<img width="220" height="146" src="<?=$row['min_url']?>" class="attachment-main" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" style="border:#CCC 1px solid">							
                            <span class="zoom-icon"></span>
						</a>
						<h6 class="marginT5" style="height:30px;"><a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>"><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></a></h6>
						<div class="clear"></div>
                    	<!-- arriba -->                        
                        <?php $row=mysql_fetch_array($resultados); ?>
                        <!-- abajo -->
                        <a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>" class="image-zoom home-thumb-zoom">
							<img width="220" height="146" src="<?=$row['min_url']?>" class="attachment-main" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" style="border:#CCC 1px solid">							
                            <span class="zoom-icon"></span>
						</a>
						<h6 class="marginT5"><a href="http://donfranciscomaquinarias.com/item.php?maquinaria=<?=$row['id_vehiculo']?>"><?=ucwords($row['model'])?> <?=ucwords($row['marc'])?></a></h6>
						<div class="clear"></div>
                        <!-- abajo -->
					</li>
					
										
				
					<?php } 
					
					$db->desconectar();
					?>
								</ul>
				<div class="clear"></div>
			</div>
		</div>	
		<div class="clear"></div>
	</div>	
</div>
<div class="clear"></div>

<script type="text/javascript">
	var $j = jQuery.noConflict();
	
	$j(function() {
		$j('#latestCars_tj_container').gridnav({
			rows	: 1,
			navL	: '#tj_prev2',
			navR	: '#tj_next2',
			type	: {
				mode		: 'seqfade', 	// use def | fade | seqfade | updown | sequpdown | showhide | disperse | rows
				speed		: 400,			// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
				easing		: '',			// for fade, seqfade, updown, sequpdown, showhide, disperse, rows	
				factor		: 100,			// for seqfade, sequpdown, rows
				reverse		: ''			// for sequpdown
			}
		});
	});	
</script>
<!-- end - #latest-cars -->