        <div class="row">
          <div class="row py-lg-2">
            <div class="col-md-6">
                 <h2>Lista de usuarios</h2>
            </div>
            <div class="col-md-6">
              <a href="user/create/" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuvo usuario</a>
            </div>
          </div>
      </div>
      </br>
      <table class="table table-hover" id="dataTable">
          <thead>
            <tr>
              <th>Username</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Edit</th>
              <th>Del</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($data_user as $v) { ?>
            <tr>
              <td><?= $v->username ?></td>
              <td><?= $v->nama ?></td>
              <td><?= $v->email ?></td>
              <td><a href="user/edit/<?= $v->id ?>">edit</a> </td>
              <td><a href="user/del/<?= $v->id ?>">del</a></td>
            </tr>
          <?php } ?>
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