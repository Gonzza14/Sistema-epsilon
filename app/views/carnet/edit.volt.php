<?php 
include "db_config.php";
?>     
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
  #carnetComp{
    background-color: darkgray;
  }
</style>

<div class="container">
  <div id="carnetComp" class="border border-4 border-primary">
    <div class="row">
      <div class="col-4">
        <img src="../../../public/files/user.jpg" alt="usuario">
      </div>

      <div class="col-8">
        <div class="row">

          <div class="col-8 text-body">
            <label>Nombre: <?= $nombreAsociado ?></label>
          </div>

          <div class="col-8 text-body">
            <label>Apellido: <?= $apellido ?></label>
          </div>

          <div class="col-8 text-body">
            <label>No Carnet: <?= $carnet ?></label>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<br>
<br>
<br>

<div class="container">
  <div class="col-md-6">
    <button class="btn offset-6 btn-primary btn-lg btn-block right" id="btnCrearCarnet">Generar carnet</button>
  </div>
    
  <form action="<?= $this->url->get('carnet/update') ?>" class="form-horizontal" method="POST" enctype="application/x-www-form-urlencoded">
    <div class="form-group">
      <div class="col-sm-10">
        <input type="hidden" class="form-control" name="idAsociado" value="<?= $idAsociado ?>" required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-10">
        <input type="hidden" class="form-control" name="carnet" id="carnet" value="<?= $carnet ?>" required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6">
        <button type="submit" class="btn btn-success offset-6 btn-lg btn-block right" name="action">Guardar carnet</button>
      </div>
    </div>
  </form>
</div>



<script>
  document.addEventListener("DOMContentLoaded", () => {
    // Escuchamos el click del botón
    const $boton = document.querySelector("#btnCrearCarnet");
    const $carnet = document.getElementById("carnet").value; 
    $boton.addEventListener("click", () => {
      const $elementoParaConvertir = document.getElementById("carnetComp"); // <-- Aquí puedes elegir cualquier elemento del DOM
      html2pdf()
      .set({
        margin: 0.2,
        filename: $carnet + '.pdf',
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
          format: "a6",
          orientation: 'landscape' // landscape o portrait
        }
      })
      .from($elementoParaConvertir)
      .save()
      .catch(err => console.log(err));
    });
  });
</script>