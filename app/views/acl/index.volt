<div class="row">
    <div class="row py-lg-2">
      <div class="col-md-6">
           <h2>Recursos</h2>
      </div>
      <!--<div class="col-md-6">
        <a href="roles/create/" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo rol</a>
      </div>-->
    </div>
</div>
</br>
<table class="table table-dark table-hover " id="dataTableRecursos">
    <thead>
      <tr>
        <th>Nombre del recurso</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
    {% for componente in componentes %}
      <tr>
        <td>{{componente.componente}}</td>
        <td>
          <a href="acl/setAccessControl/{{componente.componente}}"><i class="fa fa-edit"></i></a>
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
      $("#dataTableRecursos").DataTable({
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

<!--<div class="page-header">
    <h1>
        Buscar lista de acceso
    </h1>
    <p>
        <?php echo Phalcon\Tag::linkTo(["acl/new", "Crear acl"]); ?>
    </p>
</div>

<?php echo $this->getContent() ?>

<?php
   echo Phalcon\Tag::formLegacy(
        [
            "acl/search",
            "autocomplete" => "off",
            "class" => "form-horizontal"
        ]
    );
?>

<div class="form-group">
    <label for="fieldRole" class="col-sm-2 control-label">Rol</label>
    <div class="col-sm-10">
        <?php echo Phalcon\Tag::textField(["IDROL", "size" => 30, "class" => "form-control", "id" => "fieldRole"]); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldAction" class="col-sm-2 control-label">Accion</label>
    <div class="col-sm-10">
        <?php echo Phalcon\Tag::textField(["accion", "size" => 30, "class" => "form-control", "id" => "fieldAction"]); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldResource" class="col-sm-2 control-label">Componente</label>
    <div class="col-sm-10">
        <?php echo Phalcon\Tag::textField(["componente", "size" => 30, "class" => "form-control", "id" => "fieldResource"]); ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo Phalcon\Tag::submitButton(["Buscar", "class" => "btn btn-default"]) ?>
    </div>
</div>

<?php echo Phalcon\Tag::endForm(); ?>-->

