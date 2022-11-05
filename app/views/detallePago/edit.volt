
<?php 
require ('db_config.php'); 
?>
<?php
$url= $_SERVER["REQUEST_URI"];
$split = explode("/", $url);
$id = $split[3];


?>
<div class="container"> 
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

