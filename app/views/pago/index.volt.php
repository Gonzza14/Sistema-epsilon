<?php 
include "db_config.php";
?>  
<div class="container">     
  <div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Lista de pagos realizados</h2>
    </div>
    <div class="col-md-6">
      <a href="pago/create/" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Registrar nuevo pago</a>
    </div>
  </div>
        </br>
        <table class="table table-hover" id="dataTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>ID Asociado</th>
                <th>Asociado</th>
                <th>Fecha de pago</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result = mysqli_query($conn,"SELECT CONCAT(b.nombreAsociado, ' ',b.apellido) AS nombre, idPago, a.idAsociado,fechaPago FROM pago a 
              INNER JOIN asociado b ON b.idAsociado = a.idAsociado");
              while($row =mysqli_fetch_array($result)){
                ?>
                <tr>
                <td><?php echo $row['idPago']; ?></td>
                <td><?php echo $row['idAsociado']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['fechaPago']; ?></td>
                <td> <a href="detallePago/edit/<?php echo $row['idPago']; ?>"><i class="fa fa-edit"></i></a></td>
                </tr>
              <?php
              }
              ?>
  
            </tbody>
          </table>
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de que quieres eliminar esto?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Seleccione "eliminar" Si realmente desea eliminar este monto a pagar</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="">
                    <a href="detallePago/create ?>" class="btn btn-primary">Borrar</a>
                </form>
                </div>
            </div>
            </div>
        </div>
</div>
<script>
  $(function () {
    $("#dataTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#dataTable1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>