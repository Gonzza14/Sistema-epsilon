
<?php 
require ('db_config.php'); 
?>
<div class="container"> 
  <div class="row">
    <div class="row py-lg-4">
      <div class="col-sm-12">
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
    <div class="row">
      <div class="row py-lg-4">
        <div class="col-sm-12">
            <h3>Detalle cobro:</h3>
        </div>
      </div>
    </div> 
    <table class="table table-hover" id="dataTable2">
      <thead>
        <tr>
          <th>ID</th>
          <th>Concepto</th>
          <th>Monto ($)</th>
        </tr>
      </thead>
      <tbody>
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
        <tr class="bg-info">
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
          <td >Total ($)</td>
          <td><?php echo $total; ?></td>
        </tr>
      </tbody>
    </table>
   
</div>   
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
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script language="javascript">
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

