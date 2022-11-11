<?php 
include "db_config.php";
?>     
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- -----------------------------Comprobante de aceptacion--------------------------------------------->
<div class="imprimir">
  <div class="col-sm-12">
    <h5 class="text-body">COMPROBANTE DE ACEPTACIÓN</h5>
    <table class="table table-striped-columns" id="dataTable33">
        <tr class="text-dark"><b>COMPROBANTE DE ACEPTACIÓN</b> </tr>
        <tr>
          <td class="text-dark">Id Asociado</td>
          <td class="text-dark">{{idAsociado}}</td>
        </tr>
        <tr>
          <td class="text-dark">Nombre</td>
          <td class="text-dark">{{nombreAsociado}}</td>
        </tr>
        <tr>
          <td class="text-dark">Apellidos</td>
          <td class="text-dark">{{apellido}}</td>
        </tr>
        <tr>
          <td class="text-dark">Telefono</td>
          <td class="text-dark">{{telefono}}</td>
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
</div>
<div class="container">
  <div class="row py-lg-2">
    <div class="col-md-6">
      <button class="btn col-md-offset-6 btn-primary btn-lg btn-block right" id="btnCrearPdf">Generar Comprobante</button>
    </div>
    <div class="col-md-6">
      <a class="btn btn-success btn-lg btn-block "  href="../../aceptacion/">Finalizar</a>
    </div>
  </div>
</div>


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
    document.getElementById('fechaAu').innerHTML=ano+"-"+mes+"-"+dia;
    // Escuchamos el click del botón
    const $boton = document.querySelector("#btnCrearPdf");
    $boton.addEventListener("click", () => {
    
   var $elementoParaConvertir = document.querySelector(".imprimir"); // <-- Aquí puedes elegir cualquier elemento del DOM
        html2pdf()
            .set({
                margin: 0.2,
                filename: 'comprobante.pdf',
                image: {
                    type: 'jpg',
                    quality: 0.98,
                },
                html2canvas: {
                    scale: 3, // A mayor escala, mejores gráficos, pero más peso
                    letterRendering: true,
                },
                jsPDF: {
                    unit: "in",
                    format: "letter",
                    orientation: 'portrait' // landscape o portrait
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err => console.log(err));
          
    });
  });

  </script>