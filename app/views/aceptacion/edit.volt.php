<?php 
include "db_config.php";
?>     
<div class="container">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Html2Pdf  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <form action="<?= $this->url->get('aceptacion/update') ?>" class="form-horizontal" method="POST">
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
      <div>
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

    <label class="control-label col-sm-2" for="data_asoc">Documentos</label><br>
    <div class="row">
    <?php
      $sql = "SELECT nombreTipoDoc, numeroDoc FROM tipo_documentos a INNER JOIN documento_asociado b ON a.idTipoDocumento = b.idTipoDocumento WHERE b.idAsociado = ". $idAsociado;
      $result = mysqli_query($conn, $sql);
      while($row =mysqli_fetch_array($result)){
      ?>
        <div class="col-2">
          <input type="text" class="form-control" name="data_asoc" autocomplete="off" value="<?php echo $row['nombreTipoDoc']; ?>: <?php echo $row['numeroDoc']; ?>" disabled>
        </div>
      <?php
      }
      ?>
    </div>
    <br>
    <?php if ($data_conyugue) { ?>
      <div class="form-group">
        <label class="control-label col-sm-2" for="data_conyugue">Conyugue:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="data_conyugue" autocomplete="off" value="Nombre: <?= $data_conyugue->nombreConyugue ?>" disabled>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="data_conyugue" autocomplete="off" value="Correo: <?= $data_conyugue->correoConyugue ?>" disabled>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="data_conyugue" autocomplete="off" value="Fecha de nacimiento: <?= $data_conyugue->fechaNacConyugue ?>" disabled>
        </div>
        <?php if ($data_conyugue->situacionLaboralConyugue == 0) { ?>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="data_conyugue" autocomplete="off" value="Situacion laboral: No trabaja" disabled>
          </div>
        <?php } else { ?>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="data_conyugue" autocomplete="off" value="Situacion laboral: Si trabaja" disabled>
          </div>
        <?php } ?>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="data_conyugue" autocomplete="off" value="Profesion: <?= $data_conyugue->profesionConyugue ?>" disabled>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="data_conyugue" autocomplete="off" value="Cargo: <?= $data_conyugue->cargoConyugue ?>" disabled>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="data_conyugue" autocomplete="off" value="Empresa en que labora: <?= $data_conyugue->empresaConyugue ?>" disabled>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="data_conyugue" autocomplete="off" value="Area de trabajo: <?= $data_conyugue->areaTrabajoConyugue ?>" disabled>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="data_conyugue" autocomplete="off" value="Direccion laboral: <?= $data_conyugue->direcLabConyugue ?>" disabled>
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
    <?php if ($data_refPer) { ?>
      <label class="control-label col-sm-2" for="data_refPer">Referencias personales</label><br>
      <?php foreach ($data_refPer as $ref) { ?>
        <div class="row">
          <div class="col-2">
            <input type="text" class="form-control" name="data_refPer" autocomplete="off" value="Nombre: <?= $ref->nombreRef ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_refPer" autocomplete="off" value="Telefono: <?= $ref->telefonoRef ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_refPer" autocomplete="off" value="Correo: <?= $ref->correoRef ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_refPer" autocomplete="off" value="Direccion: <?= $ref->direccionRef ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_refPer" autocomplete="off" value="Relacion con asociado: <?= $ref->relacionAsoc ?>" disabled>
          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <div class="form-group">
        <label class="control-label col-sm-2" for="data_refPer">No posee referencias personales</label>
      </div>
    <?php } ?>
    <br>
    <?php if ($data_refFam) { ?>
      <label class="control-label col-sm-2" for="data_refFam">Referencias familiares</label><br>
      <?php foreach ($data_refFam as $refam) { ?>
        <div class="row">
          <div class="col-2">
            <input type="text" class="form-control" name="data_refFam" autocomplete="off" value="Nombre: <?= $refam->nombreFa ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_refFam" autocomplete="off" value="Telefono: <?= $refam->telefonoFa ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_refFam" autocomplete="off" value="Correo: <?= $refam->correoFa ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_refFam" autocomplete="off" value="Direccion: <?= $refam->direccionFa ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_refFam" autocomplete="off" value="Relacion con asociado: <?= $refam->relacionFa ?>" disabled>
          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <div class="form-group">
        <label class="control-label col-sm-2" for="data_refFam">No posee referencias familiares</label>
      </div>
    <?php } ?>
    <br>

    <label class="control-label col-sm-2" for="data_asoc">Asociaciones</label><br>
    <div class="row">
    <?php
      $sql = "SELECT nombreAsociacion FROM asociaciones a INNER JOIN pertenece5 b ON a.idAsociacion = b.idAsociacion WHERE b.idAsociado = ". $idAsociado;
      $result = mysqli_query($conn, $sql);
      while($row =mysqli_fetch_array($result)){
      ?>
        <div class="col-2">
          <input type="text" class="form-control" name="data_asoc" autocomplete="off" value="Asociacion: <?php echo $row['nombreAsociacion']; ?>" disabled>
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
      <label class="control-label col-sm-2" for="empresario">Empresario:</label>
      <div class="col-sm-10">
        <?php if ($empresario == 0) { ?>
          <input type="text" class="form-control" name="empresario" autocomplete="off" value="No" disabled>
        <?php } else { ?>
          <input type="text" class="form-control" name="empresario" autocomplete="off" value="Si" disabled>
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
    <?php if ($data_benef) { ?>
      <label class="control-label col-sm-2" for="data_benef">Beneficiarios</label><br>
      <?php foreach ($data_benef as $ben) { ?>
        <div class="row">
          <div class="col-2">
            <input type="text" class="form-control" name="data_benef" autocomplete="off" value="Nombre: <?= $ben->nombreBenef ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_benef" autocomplete="off" value="Telefono: <?= $ben->telefonoBenef ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_benef" autocomplete="off" value="Correo: <?= $ben->correoBenef ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_benef" autocomplete="off" value="Direccion: <?= $ben->direccionBenef ?>" disabled>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="data_benef" autocomplete="off" value="Porcentaje: <?= $ben->porcentaje ?>" disabled>
          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <div class="form-group">
        <label class="control-label col-sm-2" for="data_benef">No posee beneficiarios</label>
      </div>
    <?php } ?>
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

  <form action="<?= $this->url->get('aceptacion/update2') ?>" class="form-horizontal" method="POST">
    <div class="form-group">
      <div class="col-sm-10">
        <input type="hidden" class="form-control" name="idAsociado" value="<?= $idAsociado ?>" required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn col-md-offset-6 btn-success btn-lg btn-block right" name="action">Dar por aceptado</button>
      </div>
    </div>
  </form>

 <!-- -----------------------------Comprobante de aceptacion--------------------------------------------->
 <div id="comprobante">

  <table class="table table-striped-columns table-dark" id="dataTable33">
      <tr class="text-dark"><b>COMPROBANTE DE ACEPTACIÓN</b>
      </tr>
      <tr>
        <td class="text-dark">Id Asociado</td>
        <td class="text-dark"><?= $idAsociado ?></td>
      </tr>
      <tr>
        <td class="text-dark">Nombre</td>
        <td class="text-dark"><?= $nombreAsociado ?></td>
      </tr>
      <tr>
        <td class="text-dark">Apellidos</td>
        <td class="text-dark"><?= $apellido ?></td>
      </tr>
      <tr>
        <td class="text-dark">Telefono</td>
        <td class="text-dark"><?= $telefono ?></td>
      </tr>
      <?php
      $sql = "SELECT nombreTipoDoc, numeroDoc FROM tipo_documentos a INNER JOIN documento_asociado b ON a.idTipoDocumento = b.idTipoDocumento WHERE b.idAsociado = ". $idAsociado;
      $result = mysqli_query($conn, $sql);
      while($row =mysqli_fetch_array($result)){
      ?>
      <tr>
        <td class="text-dark"><?php echo $row['nombreTipoDoc']?></td>
        <td class="text-dark"><?php echo $row['numeroDoc']?></td>
      </tr>
      <?php
      }
      ?>
        <td class="text-dark">Fecha autorización</td>
        <td id = "fechaAu" class="text-dark"></td>
      </tr>
      <tr  class="text-body table-success">
        <td class="text-body">Estado</td>
        <td class="text-body">AUTORIZADO</td>
      </tr>
  </table>
</div>

<!-- -----------------------------Comprobante de aceptacion--------------------------------------------->
  <div class="row py-lg-2">
    <div class="col-md-6">
      <button class="btn col-md-offset-6 btn-success btn-lg btn-block right" id="btnCrearPdf">Generar factura</button>
    </div>
  </div>
</div>
<script>
  function myFunction() {
    //alert("hola");
     //   let element = document.getElementById('receta');
        //html2pdf(element);
  }
  document.addEventListener("DOMContentLoaded", () => {
    // Escuchamos el click del botón
    const $boton = document.querySelector("#btnCrearPdf");
    $boton.addEventListener("click", () => {
      const $elementoParaConvertir = document.getElementById("comprobante"); // <-- Aquí puedes elegir cualquier elemento del DOM
        html2pdf()
            .set({
                margin: 0.2,
                filename: 'comprobante.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98,
                },
                html2canvas: {
                    scale: 5, // A mayor escala, mejores gráficos, pero más peso
                    letterRendering: true,
                },
                jsPDF: {
                    unit: "in",
                    format: "a4",
                    orientation: 'landscape' // landscape o portrait
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err => console.log(err));
    });
  });

  </script>
<!--
<script>
 document.addEventListener("DOMContentLoaded", () => {
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth()+1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    if(dia<10)
      dia='0'+dia; //agrega cero si el menor de 10
    if(mes<10)
      mes='0'+mes //agrega cero si el menor de 10
    document.getElementById('fechaAu').innerHTML =dia+"-"+mes+"-"+ano;
  $('#btnCrearPdf').click(function(){
      const $elementoParaConvertir = document.body; // <-- Aquí puedes elegir cualquier elemento del DOM
      html2pdf()
            .set({
                margin: 0.2,
                filename: 'comprobante.pdf',
                image: {
                    type: 'png',
                    quality: 0.98,
                },
                html2canvas: {
                    scale: 3, // A mayor escala, mejores gráficos, pero más peso
                    letterRendering: true,
                },
                jsPDF: {
                    unit: "in",
                    format: "a4",
                    orientation: 'landscape' // landscape o portrait
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err => console.log(err));
    });
  });
 
  </script>
  <script>
  document.addEventListener("DOMContentLoaded", () => {
    // Escuchamos el click del botón
    const $boton = document.querySelector("#btnCrearPdf");
    $boton.addEventListener("click", () => {
      const $elementoParaConvertir = document.getElementById("factura"); // <-- Aquí puedes elegir cualquier elemento del DOM
        html2pdf()
            .set({
                margin: 0.2,
                filename: 'factura.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98,
                },
                html2canvas: {
                    scale: 5, // A mayor escala, mejores gráficos, pero más peso
                    letterRendering: true,
                },
                jsPDF: {
                    unit: "in",
                    format: "a4",
                    orientation: 'portrait' // landscape o portrait
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err => console.log(err));
    });
  });

  </script>
-->