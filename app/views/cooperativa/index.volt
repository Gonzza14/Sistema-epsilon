<?php 
include "db_config.php";
?>  
<div class="container">     
  <div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Lista de montos a pagar</h2>
    </div>
    <div class="col-md-6">
      <a href="concepto/create/" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo monto a pagar</a>
    </div>
  </div>
        </br>
        <table class="table table-hover" id="dataTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Concepto</th>
                <th>Monto ($)</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result = mysqli_query($conn,"SELECT * 
              FROM concepto");
              while($row =mysqli_fetch_array($result)){
                ?>
                <tr>
                <td><?php echo $row['idConcepto']; ?></td>
                <td><?php echo $row['concepto']; ?></td>
                <td><?php echo $row['monto']; ?></td>
                <td>
                  <a href="concepto/edit/<?php echo $row['idConcepto']; ?>"><i class="fa fa-edit"></i></a>
                  <?php
                    $id = $row['idConcepto'];
                  ?>
                  <a href="#deleteModal" data-toggle="modal" data-target="" data-categoriaid="<?php echo $row['idConcepto']; ?>"><i class="fas fa-trash-alt"></i></a>

                </td>
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
                    <a href="concepto/delete/<?php echo $id; ?>" class="btn btn-primary">Borrar</a>
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