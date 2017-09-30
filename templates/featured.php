
<div class="container-fluid imgFront">
  <div class="row">
    <div class="col-xs-12 col-md-12 center-block">
      <img src="http://donfranciscomaquinarias.com/files/front_don_francisco.jpg" class="img-responsive center-block front" alt="front image">

    </div>
  </div>

</div>

<!-- #featured-cars -->
<div class="container" id="featuredCars">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <h4 class="section-title section-line">Maquinarias</h4>
      <ul>
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
          vehiculos.destacado = "si" AND
          imagenes.portada = "si"
          ORDER BY
          -- RAND(),
          vehiculos.id  DESC
          LIMIT 3 ');

          while($row=mysql_fetch_array($resultados)){


            $id = $row['id_vehiculo'];

            ?>
            <div class="col-xs-12 col-md-4 featured">
              <li>
                <div class="col-xs-6 col-md-6 text-center">
                  <img src="<?=$row['min_url']?>" class="img-responsive imgFeatured img-rounded" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>">
                </div>
                <div class=" col-xs-6 col-md-6 textFeatured">
                  <h4 class="title"><?=substr($row['model'], 0 ,15)?></h4>
                  <h5 class="descrip">Descripción:</h5>
                  <p>
                  <?=substr($row['note'], 0, 60);?>...
                </p>
                </div>
                <div class="col-md-6 col-xs-12 buttons">
                  <a href="item.php?maquinaria=<?=$row['id_vehiculo']?>">
                    <button type="button" class="btn btn-default mas" name="button">Más información</button>
                  </a>
                    <button data-id="<?=$row['id_vehiculo']?>" class="modalButton mas btn btn-default" type="button" name="button">
                      Mas imágenes</button>
                  </div>
                </li>
              </div>

            <?php }
            $db->desconectar();
            ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="modal-content center-block">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

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
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <?php
                      for($i=1;$i<count($imagenes);$i++){
                        ?>
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <img src="<?php echo $imagenes[$i]['min_url']; ?>" class="img-responsive img-rounded">
                        </div>
                        <div class="item">
                          <img src="<?php echo $imagenes[$i]['min_url']; ?>" class="img-responsive img-rounded">
                        </div>
                      </div>
                    <?php	} ?>

                      <!-- Controls -->
                      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- end - #featured-cars -->
