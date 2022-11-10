        <div class="row">
          <div class="row py-lg-2">
            <div class="col-md-6">
                 <h2>Lista de usuarios</h2>
            </div>
            <!--<div class="col-md-6">
              <a href="usuario/create/" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo usuario</a>
            </div>-->
          </div>
      </div>
      </br>
      <table class="table table-dark table-hover " id="dataTableUsuario">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Rol</th>
              <th>Creado</th>
              <th>Actualizado</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($data_usuario as $v) { ?>
            <tr>
              <td><?= $v->IDUSUARIO ?></td>
              <td><?= $v->NOMBREUSUARIO ?></td>
              <td><?= $v->CORREOUSUARIO ?></td>
              <td><?= $v->IDROL ?></td>
              <td><?= $v->CREADO ?></td>
              <td><?= $v->ACTUALIZADO ?></td>
              <td>
                <a href="usuario/edit/<?= $v->IDUSUARIO ?>?rol=<?= $v->IDROL ?>"><i class="fa fa-edit"></i></a>
                <a href="usuario/delete/<?= $v->IDUSUARIO ?>"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          <?php } ?>
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
                  <a id="btn-eliminar" class=" btn btn-primary" onclick="$(this).closest('form').submit();">Borrar</a>
              </form>
              </div>
          </div>
          </div>
      </div>
  </div>
  <div class="card-footer small text-muted"></div>
</div>
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var categoria_id = button.data('categoriaid') 
        console.log(categoria_id);
        var modal = $(this)
        // modal.find('.modal-footer #user_id').val(user_id)
       $("#btn-eliminar").attr("href","usuario/delete/" + categoria_id);
    })
</script>
        <script>
          $(function () {
            $("#dataTableUsuario").DataTable({
              "language": {
                  "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
              },
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