        <div class="row">
          <div class="row py-lg-2">
            <div class="col-md-6">
                 <h2>Lista de usuarios</h2>
            </div>
            <div class="col-md-6">
              <a href="usuario/create/" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo usuario</a>
            </div>
          </div>
      </div>
      </br>
      <table class="table table-hover" id="dataTable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
          {% for v in data_usuario %}
            <tr>
              <td>{{v.id}}</td>
              <td>{{v.nombre}}</td>
              <td>{{v.correo}}</td>
              <td>
                <a href="usuario/edit/{{v.id}}"><i class="fa fa-edit"></i></a>
                <a href="usuario/del/{{v.id}}" data-toggle="modal" data-target="#deleteModal" data-categoriaid="{{v.id}}"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          {% endfor %}
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