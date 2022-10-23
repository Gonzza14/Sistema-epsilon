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
              <th>Edit</th>
              <th>Del</th>
            </tr>
          </thead>
          <tbody>
          {% for v in data_usuario %}
            <tr>
              <td>{{v.id}}</td>
              <td>{{v.nombre}}</td>
              <td>{{v.correo}}</td>
              <td><a href="usuario/edit/{{v.id}}">edit</a> </td>
              <td><a href="usuario/del/{{v.id}}">del</a></td>
            </tr>
          {% endfor %}
          </tbody>
        </table>
        
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