<?php 
include "db_config.php";
?>     
<div class="container">
<div class="row py-lg-2">
  <div class="col-md-6">
     <h2>Lista de documentos</h2>
  </div>
  <div class="col-md-6">
    <a href="tipoDocumento/create/" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo tipo documento</a>
  </div>
</div>
<div>
      </br>
      <table class="table table-hover" id="dataTable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Máscara</th>
              <th>Tipo</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            

              <?php
              $result = mysqli_query($conn,"SELECT
              idTipoDocumento,
              nombreTipoDoc,
              mascara,
              CASE 
                WHEN extranjeroTipoDoc = '0' THEN 'Nacional' 
                  ELSE 'Extranjero' 
                  END AS extranjeroTipoDoc
              FROM tipo_documentos");
              while($row =mysqli_fetch_array($result)){
                ?>
                <tr>
                <td><?php echo $row['idTipoDocumento']; ?></td>
                <td><?php echo $row['nombreTipoDoc']; ?></td>
                <td><?php echo $row['mascara']; ?></td>
                <td><?php echo $row['extranjeroTipoDoc']; ?></td>
                <td>
                  <a href="tipoDocumento/edit/<?php echo $row['idTipoDocumento']; ?>"><i class="fa fa-edit"></i></a>
                  <a href="usuario/del/<?php echo $row['idTipoDocumento']; ?>" data-toggle="modal" data-target="#deleteModal" data-categoriaid="<?php echo $row['idTipoDocumento']; ?>"><i class="fas fa-trash-alt"></i></a>
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
              <div class="modal-body">Seleccione "eliminar" Si realmente desea eliminar a este usuario</div>
              <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <form method="POST" action="">
                  <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Borrar</a>
              </form>
              </div>
          </div>
          </div>
      </div>
  </div>
  <div class="card-footer small text-muted"></div>
</div>
</div>
  <script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var categoria_id = button.data('categoriaid') 
        
        var modal = $(this)
        // modal.find('.modal-footer #user_id').val(user_id)
        modal.find('form').attr('action','/categoria/' + categoria_id + '/destroy');
    })
</script>
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