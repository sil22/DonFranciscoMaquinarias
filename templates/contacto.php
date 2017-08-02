<? 

$msj='';
extract($_REQUEST); 
if($msj!='')
 echo '<div style=" padding:5px; background-color:#FFC; margin:5px; height:20px; color:#000; font-size:14px; text-align:center; width:100%; " >'.$msj.'</div>';
 
 ?>

		<div class="grid_12"><h3 class="page-title">Contacto</h3></div>

		<!-- .single-auto-alert -->
		<div class="single-auto-alert alert" style="display:none">
			<p></p>
		</div><!-- end .single-auto-alert -->
			
		<!-- #content -->
		<div id="content" class="grid_8">					
		<!-- .contact-seller -->
			<div class="contact-seller">
				<h3 class="section-title section-line">Dejanos tu mensaje</h3>
				<!-- .step-form -->
					<div class="step-form-alt">
					<!-- .step-form-wrap -->
						<div class="step-form-wrap" >					
							<form id="contactForm" action="enviar.php" method="post">															
								<div class="form-input clearfix">
									<label for="name">Nombre y Apellido</label>							
									<input type="text" name="name" id="name" size="25" maxlength="40" value>
								</div>									
								<div class="form-input clearfix">
									<label for="email">Email</label>							
									<input type="text" name="email" id="email" size="30" maxlength="60" value>
								</div>
                                <div class="form-input clearfix">
									<label for="telefono">Telefono</label>							
									<input type="text" name="telefono" id="telefono" size="35" maxlength="60" value>
								</div>
                                <div class="form-input clearfix">
									<label for="localidad">Localidad</label>							
									<input type="text" name="localidad" id="localidad" size="40" maxlength="60" value>
								</div>										
								<div class="form-input clearfix">
									<label for="message">Mensaje</label>							
									<textarea name="message" id="message" cols="50" rows="5"></textarea>
								</div>
								<div class="form-input clearfix">
									<input type="submit" id="submitButton" name="submitButton" value="Enviar Mensaje">
								</div>							
							</form>
						<div class="clear"></div>
							</div><!-- .step-form-wrap -->
							<div class="clear"></div>
						</div><!-- end - .step-form -->	
						
					</div><!-- end - .contact-seller -->				
				
				<div class="grid_3 omega">
					
					
                    <div class="auto-features">
                        <h4 class="section-title section-line">Datos del vendedor</h4>
                       	<ul>
							<li><span>Vendedor</span> : Carina Cools</li>
                            <li><span>Telefono</span> : (02262) 421369</li>
                            <li><span>Celular</span> :  (02262) 15567543</li>							
                        </ul>
                        <div class="clear"></div> 
					</div>										
															
					<!-- end - auto features -->					
					
					
				</div>
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

