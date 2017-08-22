<?

$msj='';
extract($_REQUEST);
if($msj!='')
echo '<div style=" padding:5px; background-color:#FFC; margin:5px; height:20px; color:#000; font-size:14px; text-align:center; width:100%; " >'.$msj.'</div>';

?>

<div class="container">
  <div class="row">
    <div class="col-xs-12  col-md-12">
      <h3 class="section-line section-tittle">Contacto</h3>
    </div>
    <!-- .single-auto-alert -->
    <div class="single-auto-alert alert" style="display:none">
      <p></p>
    </div><!-- end .single-auto-alert -->

    <!-- #content -->
    <div class="col-xs-12 col-md-6 col-md-offset-1">
      <!-- .contact-seller -->
        <h4 class="section-title section-line">Dejanos tu mensaje</h4>

        <form id="contactForm" action="enviar.php" method="post">
          <div class="form-group">
            <label for="name">Nombre y Apellido</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre y apellido">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Ej: juan_perez@gmail.com">
          </div>
          <div class="form-group">
            <label for="email">Telefono</label>
            <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ej: 02262-421369">
          </div>
          <div class="form-group">
            <label for="email">Localidad</label>
            <input type="text" class="form-control" name="localidad" id="localidad" placeholder="Localidad">
          </div>
          <div class="form-group">
            <label for="email">Mensaje</label>
            <textarea name="message" id="message" cols="90" rows="5"></textarea>
          </div>
          <button type="submit" id="submitButton" name="submitButton" class="btn btn-default">Enviar Mensaje</button>
        </form>

        <div class="col-xs-10 col-md-6">
            <h4 class="section-title section-line">Datos del vendedor</h4>
            <ul>
              <li>Vendedor: Carina Cools</li>
              <li>Telefono: (02262) 421369</li>
              <li>Celular:  (02262) 15567543</li>
            </ul>

          </div>
  </div>

    <div class="col-md-4 col-xs-4 col-md-offset-1">
      <?php include('templates/sidebar_interior.php'); ?>
    </div>
</div>
</div>
