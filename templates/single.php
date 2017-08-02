<? 
$msj='';
extract($_REQUEST); 
if($msj!='')
 echo '<div style=" padding:5px; background-color:#FFC; margin:5px; height:20px; color:#000; font-size:14px; text-align:center; width:100%; " >'.$msj.'</div>';
?>

		<div class="grid_12"><h3 class="page-title">Detalles</h3></div>

		<!-- .single-auto-alert -->
		<div class="single-auto-alert alert" style="display:none">
			<p></p>
		</div><!-- end .single-auto-alert -->
			
		<!-- #content -->
		<div id="content" class="grid_8">	
						
			<!-- .post -->
			<div class="post-54 auto type-auto status-publish hentry custom-post-type clearfix" id="post-54">
				
				<h3 class="title" style=""><?=ucwords($model)?> <?=ucwords($marc)?></h3>
				
				<!-- .auto-photos -->
				<div class="auto-photos grid_8 alpha">
					
<?php 
	$db->conectar();	
	$resultados =  $db->consulta('SELECT * FROM imagenes WHERE id_vehiculo='.$id.' ORDER BY portada DESC');
	$imagenes = '';
	$i = 0;
	while ($imagen=mysql_fetch_array($resultados)){
		$imagenes[$i]['min_url'] = $imagen['min_url'];
		$imagenes[$i]['url'] = $imagen['url'];
		$imagenes[$i]['portada']=$imagen['portada'];
		$i++;
	}
	$db->desconectar();
?>
                    			
                                
                                					
						<div class="post-image grid_5 alpha">
							<a href="<?php echo $imagenes[0]['url']; ?>" rel="prettyPhoto[gallery]" class="image-zoom single-thumb-zoom">
                            <img src="<?php echo $imagenes[0]['url']; ?>" width="380" height="253" ><span class="zoom-icon"></span></a><div class="clear"></div>
						</div>	
					
					<div class="post-thumbs grid_3 omega">
						<div class="thumb-container tj_container clearfix">
						
													
							<div class="tj_wrapper">
                            	<ul class="tj_gallery">
                                
							<?php 
								for($i=1;$i<count($imagenes);$i++){
							?>    
                        			<li><a href="<?php echo $imagenes[$i]['url']; ?>" rel="prettyPhoto[gallery]" class="image-zoom slide-thumb-zoom">
                                    		<img src="<?php echo $imagenes[$i]['min_url']; ?>" width="90"><span class="zoom-icon"></span>
                                       	</a>
                                    </li>
                            <?php	} ?>
      <!--                            	<li><a href="files/default6.jpg" rel="prettyPhoto[gallery]" class="image-zoom slide-thumb-zoom"><img src="files/default6.jpg" width="90"><span class="zoom-icon"></span></a></li>
                                	<li><a href="files/default6.jpg" rel="prettyPhoto[gallery]" class="image-zoom slide-thumb-zoom"><img src="files/default6.jpg" width="90"><span class="zoom-icon"></span></a></li>
                                	<li><a href="files/default6.jpg" rel="prettyPhoto[gallery]" class="image-zoom slide-thumb-zoom"><img src="files/default6.jpg" width="90"><span class="zoom-icon"></span></a></li>
                                	<li><a href="files/default6.jpg" rel="prettyPhoto[gallery]" class="image-zoom slide-thumb-zoom"><img src="files/default6.jpg" width="90"><span class="zoom-icon"></span></a></li>
          -->                          </ul>
                                    </div>						
                                    </div>
						<div class="clear"></div>
					</div>
					
				</div><!-- end - .auto-photos -->			
				
				<div class="grid_5 alpha">
					<!-- .entry-content -->
					<div class="entry-content">
					  <h4 class="section-title section-line">
                      <span style="float:right"><a href="http://www.facebook.com/share.php?u=<?=$_SERVER['SCRIPT_URI'].'?maquinaria='.$id ?>&t=<?=$model?> <?=$marc?>" class="" target="_blank"><img src="files/facebook-3-m.png" border="0"></a></span>
                      Descripción</h4>
						<p>
                        <?=nl2br($note)?>
                        </p>
					</div><!-- end - .entry-content -->

					<?php if ($video!=''){?>
					<!-- .video-embed -->
										<div class="video-embed">
                        
                                        
						<h4 class="section-title section-line">Video</h4>
						
                        
                        

						<iframe width="380" height="228" src="<?=str_replace('watch?v=','embed/',$video)?>" frameborder="0" allowfullscreen></iframe>
                        										
                        
						<div class="clear"></div>
					</div>
					<!-- end - .video-embed -->
					<?php } ?>

				
					
					<!-- .contact-seller -->
					<div class="contact-seller">
						<h4 class="section-title section-line">Contactar al vendedor</h4>
						
						<!-- .step-form -->
						<div class="step-form-alt">
								
							<!-- .step-form-wrap -->
							<div class="step-form-wrap">					
								<form id="contactForm" action="enviar.php" method="post">															
									
                                    
									
									<div class="form-input clearfix">
										<label for="name">Nombre y Apellido</label>							
										<input type="text" name="name" id="name" size="25" maxlength="40" value>
									</div>									
									
									<div class="form-input clearfix">
										<label for="email">Email</label>							
										<input type="text" name="email" id="email" size="35" maxlength="60" value>
									</div>										

									<div class="form-input clearfix">
										<label for="message">Mensaje</label>							
										<textarea name="message" id="message" cols="50" rows="5"></textarea>
									</div>
									<div class="form-input clearfix">
										<input type="hidden" name="url" id="url" value="<?=$_SERVER['SCRIPT_URI'].'?maquinaria='.$id ?>">
										<input type="submit" id="submitButton" name="submitButton" value="Enviar Mensaje">
									</div>							
										
								</form>
								
								<div class="clear"></div>
							</div><!-- .step-form-wrap -->
							<div class="clear"></div>
						</div><!-- end - .step-form -->	
						
					</div><!-- end - .contact-seller -->				
				</div>
				<div class="grid_3 omega">
					
					<!-- .auto-main-features -->
					<div class="auto-features">
						<h4 class="section-title section-line">Características</h4>
						<ul>
							<li><span>Precio</span> : $ <?=$price?></li>
                            <li><span>Marca</span> : <?=ucwords($marc)?></li>
                            <!--<li><span>Modelo</span> : <?=ucwords($model)?></li>-->
                            <li><span>Condición</span> : <?=ucwords($used)?></li>
                            <li><span>Año</span> : <?=$year?></li>
                            <li><span>Color</span> : <?=$color?></li>
                            <li><span>Horas/Km</span> : <?=$km?></li>
                        </ul>
						<div class="clear"></div>
					</div><!-- end - .auto-main-features -->	
					
					<!-- auto features -->
					
                    <div class="auto-features">
                        <h4 class="section-title section-line">Datos del vendedor</h4>
                       	<ul>
							<li><span>Vendedor</span> : Carina Cools</li>
                            <li><span>Telefono</span> : (02262) 421369</li>
                            <li><span>Celular</span> :  (02262) 15567543</li>							
                            <li><span>Actualizado</span> : <?=$fecha?></li>	
						</ul>
                        <div class="clear"></div> 
					</div>										
															
					<!-- end - auto features -->					
					
					
				</div>
			
			</div><!-- end - .post -->
							
					</div><!-- end - #content -->
		
		
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

