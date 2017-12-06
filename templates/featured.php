<!--- img-front
<div class="container-fluid imgFront">
<div class="row">
<div class="col-xs-12 col-md-12 center-block">
<img src="http://donfranciscomaquinarias.com/files/front_don_francisco.jpg" class="img-responsive center-block front" alt="front image">
</div>
</div>
</div>
--->

<!-- #featured-cars -->
<!-- <div  class="imgFront"> -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-12" id="featuredCars">

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
            LIMIT 6 ');

            while($row=mysql_fetch_array($resultados)){


              $id = $row['id_vehiculo'];

              ?>
                <li>
                  <div class="col-xs-6 col-md-4 col-sm-4">

                  <div class="panel panel-default">
                    <img src="<?=$row['min_url']?>" class="img-responsive imgFeatured img-thumbnail" alt="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>" title="<?=ucwords($row['model'])?> <?=ucwords($row['marc'])?>">
                    <div class="panel-body">
                      <h4 class="panel-title"><?=substr($row['model'],0,19);?></h4>
                      <div class="hidden-xs">
                        <?php $count = str_word_count($row['note']);
                        if($count >= 11){
                          ?>
                          <p> <?=substr($row['note'], 0, 60);?>[..] </p>
                          <?php
                        }
                        else{
                          ?>
                         <p> <?=$row['note']; ?> </p>
                          <?php
                        }
                        ?>
                    </div>
                      <a href="item.php?maquinaria=<?=$row['id_vehiculo']?>">
                        <button type="button" class="btn btn-default mas" name="button">Más información</button>
                      </a>
                    </div>
                  </div>
                </div>

                </li>

            <?php }
            $db->desconectar();
            ?>
          </ul>
        </div>

      </div>
    </div>
  <!-- </div> -->


  <!-- end - #featured-cars -->
