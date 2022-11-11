<?php 
include "db_config.php";
?>

<form action="<?= $this->url->get('revision/update') ?>" class="form-horizontal" method="POST">
  <div class="form-group">
    <div class="col-sm-10">
      <input type="hidden" class="form-control" name="idAsociado" value="<?= $idAsociado ?>" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="nombreAsociado">Nombre:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nombreAsociado" autocomplete="off" value="<?= $nombreAsociado ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="apellido">Apellido:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="apellido" autocomplete="off" value="<?= $apellido ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="apellidoConyugue">Apellido de conyugue:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="apellidoConyugue" autocomplete="off" value="<?= $apellidoConyugue ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="data_estCiv">Estado civil:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="data_estCiv" autocomplete="off" value="<?= $data_estCiv->nombreEstCivil ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="fechaNacimiento">Fecha de nacimiento:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="fechaNacimiento" autocomplete="off" value="<?= $fechaNacimiento ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="extranjeroAsoc">Extranjero:</label>
    <div class="col-sm-10">
      <?php if ($extranjeroAsoc == 0) { ?>
        <input type="text" class="form-control" name="extranjeroAsoc" autocomplete="off" value="No" disabled>
      <?php } else { ?>
        <input type="text" class="form-control" name="extranjeroAsoc" autocomplete="off" value="Si" disabled>
      <?php } ?>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="genero">Genero:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="genero" autocomplete="off" value="<?= $data_genero->nombreGenero ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="telefono">telefono:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="telefono" autocomplete="off" value="<?= $telefono ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="correo">Correo:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="correo" autocomplete="off" value="<?= $correo ?>" disabled>
    </div>
  </div>

  <div class="border border-4 border-warning">
    <div class="form-group"></div>
      <label class="control-label col-sm-2">Documentos</label><br>
      <?php
        $sql = "SELECT nombreTipoDoc, numeroDoc FROM tipo_documentos a INNER JOIN documento_asociado b ON a.idTipoDocumento = b.idTipoDocumento WHERE b.idAsociado = ". $idAsociado;
        $result = mysqli_query($conn, $sql);
        while($row =mysqli_fetch_array($result)){
      ?>
        <div class="col-sm-6"">
          <label class="control-label col-sm"><?php echo $row['nombreTipoDoc']; ?>: <?php echo $row['numeroDoc']; ?></label>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
  <br>

  <?php if ($data_conyugue) { ?>
    <div class="border border-4 border-warning">
      <div class="form-group">
        <label class="control-label col-sm-2" for="data_conyugue">Conyugue:</label>
        <div class="col-sm-6">
          <label class="col-sm control-label">Nombre: <?= $data_conyugue->nombreConyugue ?></label>
        </div>
        <div class="col-sm-6">
          <label class="col-sm control-label">correo: <?= $data_conyugue->correoConyugue ?></label>
        </div>
        <div class="col-sm-6">
          <label class="col-sm control-label">Fecha de nacimiento: <?= $data_conyugue->fechaNacConyugue ?></label>
        </div>
        <?php if ($data_conyugue->situacionLaboralConyugue == 0) { ?>
          <div class="col-sm-6">
            <label class="col-sm control-label">Situacion laboral: No trabaja</label>
          </div>
        <?php } else { ?>
          <div class="col-sm-6">
            <label class="col-sm control-label">Situacion laboral: Si trabaja</label>
          </div>
        <?php } ?>
        <div class="col-sm-6">
          <label class="col-sm control-label">Profesion: <?= $data_conyugue->profesionConyugue ?></label>
        </div>
        <div class="col-sm-6">
          <label class="col-sm control-label">Cargo: <?= $data_conyugue->cargoConyugue ?></label>
        </div>
        <div class="col-sm-6">
          <label class="col-sm control-label">Empresa en que labora: <?= $data_conyugue->empresaConyugue ?></label>
        </div>
        <div class="col-sm-6">
          <label class="col-sm control-label">Area de trabajo: <?= $data_conyugue->areaTrabajoConyugue ?></label>
        </div>
        <div class="col-sm-6">
          <label class="col-sm control-label">Direccion laboral: <?= $data_conyugue->direcLabConyugue ?></label>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="form-group">
      <label class="control-label col-sm-2" for="data_conyugue">No posee conyugue</label>
    </div>
  <?php } ?>

  <div class="form-group">
    <label class="control-label col-sm-2" for="data_pais">Pais:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="data_pais" autocomplete="off" value="<?= $data_pais->nombrePais ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="data_region">Region:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="data_region" autocomplete="off" value="<?= $data_region->nombreRegion ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="data_subregion">Subregion:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="data_subregion" autocomplete="off" value="<?= $data_subregion->nombreSubRegion ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="barrioColRes">Barrio/Colonia/Residencia:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="barrioColRes" autocomplete="off" value="<?= $barrioColRes ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="callePasaj">Calle/Pasaje:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="callePasaj" autocomplete="off" value="<?= $callePasaj ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="numCasDep">Numero de casa/Departamento:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="numCasDep" autocomplete="off" value="<?= $numCasDep ?>" disabled>
    </div>
  </div>

  <div class="border border-4 border-warning">
    <?php if ($data_refPer) { ?>
      <label class="control-label col-sm-2" for="data_refPer">Referencias personales</label><br>
      <?php foreach ($data_refPer as $ref) { ?>
        <div class="border-top border-4 border-light">
          <div class="form-group">              
            <div class="col-sm-6">
              <label class="col-sm control-label">Nombre: <?= $ref->nombreRef ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Telefono: <?= $ref->telefonoRef ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Correo: <?= $ref->correoRef ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Direccion: <?= $ref->direccionRef ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Relacion con asociado: <?= $ref->relacionAsoc ?></label>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <div class="form-group">
        <label class="control-label col-sm" for="data_refPer">No posee referencias personales</label>
      </div>
    <?php } ?>
  </div>
  <br>

  <div class="border border-4 border-warning">
    <?php if ($data_refFam) { ?>
      <label class="control-label col-sm-2" for="data_refFam">Referencias familiares</label><br>
      <?php foreach ($data_refFam as $refam) { ?>
        <div class="border-top border-4 border-light">
          <div class="form-group">              
            <div class="col-sm-6">
              <label class="col-sm control-label">Nombre: <?= $refam->nombreFa ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Telefono: <?= $refam->telefonoFa ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Correo: <?= $refam->correoFa ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Direccion: <?= $refam->direccionFa ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Relacion con asociado: <?= $refam->relacionFa ?></label>
            </div>
          </div>
        </div>          
      <?php } ?>
    <?php } else { ?>
      <div class="form-group">
        <label class="control-label col-sm-2" for="data_refFam">No posee referencias familiares</label>
      </div>
    <?php } ?>
  </div>
  <br>

  <div class="border border-4 border-warning">
    <label class="control-label col-sm-2" for="data_asoc">Asociaciones</label><br>
      <?php
        $sql = "SELECT nombreAsociacion FROM asociaciones a INNER JOIN pertenece5 b ON a.idAsociacion = b.idAsociacion WHERE b.idAsociado = ". $idAsociado;
        $result = mysqli_query($conn, $sql);
        while($row =mysqli_fetch_array($result)){
        ?>
          <div class="border-top border-4 border-light">
            <div class="form-group">
              <div class="col-sm-6">
                <label class="col-sm control-label">Asociacion: <?php echo $row['nombreAsociacion']; ?></label>
              </div>
            </div>
          </div>
        <?php
        }
      ?>
    </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="data_profesion">Profesion:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="data_profesion" autocomplete="off" value="<?= $data_profesion->nombreProfesion ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="capacidadPago">Capacidad de pago:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="capacidadPago" autocomplete="off" value="<?= $capacidadPago ?>" disabled>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-10">
      <?php if ($empresario == 0) { ?>
        <label class="control-label col-sm-2" for="empresario">Empresario: No</label>
      <?php } else { ?>
        <label class="control-label col-sm-2" for="empresario">Empresario: Si</label>
      <?php } ?>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="cargo">Cargo:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="cargo" autocomplete="off" value="<?= $cargo ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="deparDesempena">Departamento en que desempeña:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="deparDesempena" autocomplete="off" value="<?= $deparDesempena ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="direccLaboral">Direccion laboral:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="direccLaboral" autocomplete="off" value="<?= $direccLaboral ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="capAhorro">Capacidad de ahorro:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="capAhorro" autocomplete="off" value="<?= $capAhorro ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="formaPago">Forma de pago:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="formaPago" autocomplete="off" value="<?= $formaPago ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="direccionPagos">Direccion de pagos:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="direccionPagos" autocomplete="off" value="<?= $direccionPagos ?>" disabled>
    </div>
  </div>

  <div class="border border-4 border-warning">
    <?php if ($data_benef) { ?>
      <label class="control-label col-sm-2" for="data_benef">Beneficiarios</label><br>
      <?php foreach ($data_benef as $ben) { ?>
        <div class="border-top border-4 border-light">
          <div class="form-group">
            <div class="col-sm-6">
              <label class="col-sm control-label">Nombre: <?= $ben->nombreBenef ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Telefono: <?= $ben->telefonoBenef ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Correo: <?= $ben->correoBenef ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Direccion: <?= $ben->direccionBenef ?></label>
            </div>
            <div class="col-sm-6">
              <label class="col-sm control-label">Porcentaje: <?= $ben->porcentaje ?></label>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <div class="form-group">
        <label class="control-label col-sm-2" for="data_benef">No posee beneficiarios</label>
      </div>
    <?php } ?>
  </div>
    <br>

  <?php if ($data_archivos) { ?>
    <label class="control-label col-sm-2" for="data_archivos">Documentos anexos</label>
    <div class="row"></div>
      <?php foreach ($data_archivos as $arch) { ?>
        <div class="col-2">
            <a href="<?= $ruta ?>/../../../public/<?= $arch->ruta ?>" download="<?= $arch->nombre ?>"><?= $arch->nombre ?></a>
        </div>
      <?php } ?>
    </div>
  <?php } else { ?>
    <div class="form-group">
      <label class="control-label col-sm-2" for="data_archivos">No posee archivos anexos</label>
    </div>
  <?php } ?>
  <br>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn col-md-offset-6 btn-danger btn-lg btn-block right" name="action">Denegar</button>
    </div>
  </div>
</form>


<form action="<?= $this->url->get('revision/update2') ?>" class="form-horizontal" method="POST">
  <div class="form-group">
    <div class="col-sm-10">
      <input type="hidden" class="form-control" name="idAsociado" value="<?= $idAsociado ?>" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn col-md-offset-6 btn-success btn-lg btn-block right" name="action">Dar por revisado</button>
    </div>
  </div>
</form>