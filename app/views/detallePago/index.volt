
<?php 
require ('db_config.php'); 
?>

<div class="container"> 
  <div class="row">
    <div class="row py-lg-4">
      <div class="col-sm-12">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Html2Pdf  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
          <h3>Seleccione monto(s) que será cobrado:</h3>
      </div>
    </div>
  </div> 
  <input type="hidden" id="idConcepto" >             
    <div class="form-group">
      <div class="col-sm-10">
        <?php
              $result = mysqli_query($conn,"Select idPago from pago order by idPago DESC LIMIT 1");
              while($row =mysqli_fetch_array($result)){
                ?>
        <?php
            $id = $row['idPago'];
          ?>
        <input type="hidden" id="idPago" class="form-control" value="<?php echo $row['idPago']; ?>"name="concepto" placeholder="Ingrese nombre del monto a pagar"  required>
      <?php
      }
      ?>
      </div>
    </div>
    <table class="table table-hover" id="dataTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Concepto</th>
          <th>Monto ($)</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = mysqli_query($conn,"SELECT *
        FROM concepto a
        WHERE NOT EXISTS
        (SELECT idConcepto FROM detalle_pago b WHERE b.idConcepto = a.idConcepto AND idPago= $id)");
        while($row =mysqli_fetch_array($result)){
          ?>
          <tr>
          <td><?php echo $row['idConcepto']; ?></td>
          <td><?php echo $row['concepto']; ?></td>
          <td><?php echo $row['monto']; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <div id="factura">
      <div  class="row">
        <div class="row py-lg-4">
          <div class="col-sm-12">
              <h3 class="text-dark">Detalle cobro:</h3>
          </div>
        </div>
      </div> 
      <table class="table table-hover" id="dataTable2">
        <thead>
          <tr>
            <th class="text-dark">ID</th>
            <th class="text-dark">Concepto</th>
            <th class="text-dark">Monto ($)</th>
          </tr>
        </thead>
      
        <tbody class="text-dark">
          <?php
          $result = mysqli_query($conn,"SELECT a.idConcepto, b.concepto, b.monto
          FROM detalle_pago a
          INNER JOIN concepto b ON b.idConcepto = a.idConcepto 
          WHERE a.idPago = $id");
          while($row =mysqli_fetch_array($result)){
            ?>
            <tr>
            <td><?php echo $row['idConcepto']; ?></td>
            <td><?php echo $row['concepto']; ?></td>
            <td><?php echo $row['monto']; ?></td>
            </tr>
          <?php
          }
          ?>
          <tr class=" text-dark bg-info">
            <?php
                $result = mysqli_query($conn,"SELECT SUM(b.monto) as total
                FROM detalle_pago a
                INNER JOIN concepto b ON b.idConcepto = a.idConcepto 
                WHERE a.idPago = $id");
                while($row =mysqli_fetch_array($result)){
                  $total = $row['total'];
                }
                  ?>
            <td></td> 
            <td class="text-dark">Total ($)</td>
            <td><?php echo $total; ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="row py-lg-2">
      <div class="col-md-6">
        <button class="btn col-md-offset-6 btn-success btn-lg btn-block right" id="btnCrearPdf">Generar factura</button>
      </div>
      <div class="col-md-6">
        <a class="btn btn-success btn-lg btn-block "  href="../pago/">Finalizar</a>
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
<?php
// comprobar si tenemos los parametros w1 y w2 en la URL
if (isset($_GET["w1"]) && isset($_GET["w2"])) {
    // asignar w1 y w2 a dos variables
    $phpVar1 = $_GET["w1"];
    $phpVar2 = $_GET["w2"];
    agregar($phpVar1,$phpVar2);
    header('Location: /detallePago');
    die();
}
if (isset($_GET["z1"]) && isset($_GET["z2"])) {
  // asignar w1 y w2 a dos variables
  $phpVar1 = $_GET["z1"];
  $phpVar2 = $_GET["z2"];
  eliminar($phpVar1,$phpVar2);
  header('Location: /detallePago');
  die();
}
?>
<script>
$(document).ready(function(){
  $('#dataTable tr').on('dblclick', function(){
    var dato = $(this).find('td:first').html();
    $('#txtNombre').val(dato);
    var dato2 = $('#idPago').val();
    window.location.href = window.location.href + "?w1=" + dato + "&w2=" + dato2;
  });
  $('#dataTable2 tr').on('dblclick', function(){
    var dato = $(this).find('td:first').html();
    $('#txtNombre').val(dato);
    var dato2 = $('#idPago').val();
    window.location.href = window.location.href + "?z1=" + dato + "&z2=" + dato2;
  });
});

</script>

<?php 

function agregar($id1,$id2) {
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname= 'epsilon';
  $conn = mysqli_connect($servername,$username,$password,"$dbname");
  mysqli_query($conn,"INSERT INTO detalle_pago(idConcepto,idPago) VALUES ($id1,$id2)");
 }
 function eliminar ($id1,$id2){
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname= 'epsilon';
  $conn = mysqli_connect($servername,$username,$password,"$dbname");
  mysqli_query($conn,"DELETE FROM detalle_pago WHERE idConcepto = $id1 AND idPago = $id2 ");
 }
?>

