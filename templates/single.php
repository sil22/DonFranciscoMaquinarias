<?
$msj='';
extract($_REQUEST);
if($msj!='')
echo '<div style=" padding:5px; background-color:#FFC; margin:5px; height:20px; color:#000; font-size:14px; text-align:center; width:100%; " >'.$msj.'</div>';
?>

<!--- #single ---->
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-8 col-sm-12">
      <h4 class="section-line section-tittle">Detalles</h4>
    </div>
    <div class="col-md-8 col-xs-12 col-sm-12">

      <h4><?=ucwords($model)?></h4>

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

      <div class="col-md-6">
        <a href="<?php echo $imagenes[0]['url']; ?>">
          <img class="img-responsive img-rounded" src="<?php echo $imagenes[0]['url']; ?>">
        </a>
      </div>
      <div class="col-md-6">
        <ul>
          <?php
          for($i=1;$i<count($imagenes);$i++){
            ?>
            <li class="single">
              <a href="<?php echo $imagenes[$i]['url']; ?>">
                <img src="<?php echo $imagenes[$i]['min_url']; ?>" class="img-responsive img-rounded img-mini">
              </a>
            </li>
          <?php	} ?>
        </ul>
      </div>
      <!-- end - .auto-photos -->
      <div class="col-md-8">
        <!-- .entry-content -->
        <h4 class="section-line">
        <span style="float:right">
          <a href="http://www.facebook.com/share.php?u=<?=$_SERVER['SCRIPT_URI'].'?maquinaria='.$id ?>&t=<?=$model?> <?=$marc?>" target="_blank"><img src="files/facebook-3-m.png" class="img-responsive"></a>
        </span>
        Descripción</h4>
        <p class="parrafo">
          <?=nl2br($note)?>
        </p>

        <?php if ($video!=''){?>
          <!-- .video-embed -->
          <div class="video-embed">
            <h4 class="section-line">Video</h4>
            <iframe width="380" height="228" src="<?=str_replace('watch?v=','embed/',$video)?>" frameborder="0" allowfullscreen></iframe>
          </div>

          <!-- end - .video-embed -->
        <?php } ?>

        <!-- .contact-seller -->
        <h4 class="section-line">Contactar al vendedor</h4>
        <!-- .step-form -->
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
            <label for="email">Mensaje</label>
            <textarea name="message" id="message" cols="65" rows="5"></textarea>
          </div>
          <div class="form-group">
            <input type="hidden" name="url" id="url" value="<?=$_SERVER['SCRIPT_URI'].'?maquinaria='.$id ?>">
            <button type="submit" id="submitButton" name="submitButton" class="btn btn-default">Enviar Mensaje</button>
          </div>
        </form>
      </div>

      <!-- end - .contact-seller -->
      <div class="col-md-4 browser-cat">
        <!-- .auto-main-features -->
        <h4 class="auto-features section-line">Características</h4>
        <ul>
          <li><span>Precio</span> : $ <?=$price?></li>
          <li><span>Marca</span> : <?=ucwords($marc)?></li>
          <li><span>Condición</span> : <?=ucwords($used)?></li>
          <li><span>Año</span> : <?=$year?></li>
          <li><span>Color</span> : <?=$color?></li>
          <li><span>Horas/Km</span> : <?=$km?></li>
        </ul>

        <!-- end - .auto-main-features -->

        <!-- auto features -->

        <h4 class="auto-features section-line">Datos del vendedor</h4>
        <ul>
          <li><span>Vendedor</span> : Carina Cools</li>
          <li><span>Telefono</span> : (02262) 421369</li>
          <li><span>Celular</span> :  (02262) 15567543</li>
          <li><span>Actualizado</span> : <?=$fecha?></li>
        </ul>
      </div>
      <!-- end - auto features -->
    </div>

    <div class="col-md-4 col-xs-12 col-sm-12">
      <?php include('templates/sidebar_interior.php'); ?>
    </div>
  </div>
</div><!-- end - .post -->
