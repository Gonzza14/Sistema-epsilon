        <div class="row">
          <div class="row py-lg-2">
            <div class="col-md-6">
                 <h2>Lista de roles</h2>
            </div>
            <div class="col-md-6">
              <a href="roles/create/" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo rol</a>
            </div>
          </div>
      </div>
      </br>
      <table class="table table-dark table-hover " id="dataTableRol">
          <thead>
            <tr>
              <th>Nombre del rol</th>
              <th>Creado</th>
              <th>Actualizado</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
          {% for rol in roles %}
            <tr>
              <td>{{rol.IDROL}}</td>
              <td>{{rol.CREADO}}</td>
              <td>{{rol.ACTUALIZADO}}</td>
              <td>
                <a href="roles/edit/{{rol.IDROL}}"><i class="fa fa-edit"></i></a>
                <a href="roles/delete/{{rol.IDROL}}"><i class="fas fa-trash-alt"></i></a>
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
            $("#dataTableRol").DataTable({
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