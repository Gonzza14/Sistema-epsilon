<h3>Establecer permisos para el recurso <b><?= $componente ?></b></h3>
<?php
    echo Phalcon\Tag::formLegacy(
        [
            "acl/saveAccessControl",
            "autocomplete" => "off",
            "class" => "form-horizontal"
        ]
    );
?>
<style>
    .btn-guardar{
        float: right;
        margin-top: 20px;
        width: 200px;
        height: 50px;
    }
</style>
<input type="hidden" name="componente" value="<?= $componente ?>">
<div class="row">
    <table class="table table-dark table-hover" id="dataTableAcl">
        <thead>
            <tr>
                <th>Metodos</th>
                <?php foreach ($roles as $role): ?>
                    <th><?= $role->IDROL; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($acciones as $accion): ?>
            <tr>
                <td><?php  echo $accion->accion; ?></td>
                <?php foreach ($roles as $role): ?>
                    <td>
                        <?php
                            $thisAction = $accion->accion;
                            $thisRole = $role->IDROL;
                            $hasAccess = false;

                            foreach ($aclItems as $item) {
                                if ($item->IDROL == $role->IDROL && $item->accion == $accion->accion && $item->componente == $componente) {
                                    $hasAccess = true;
                                }
                            }
                            if ($hasAccess) {
                                echo "<input type='checkbox' name='aclItem[$thisRole][$thisAction]' checked>";
                            } else {
                                echo "<input type='checkbox' name='aclItem[$thisRole][$thisAction]'>";
                            }
                        ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="form-group">
    <div>
        <?php echo Phalcon\Tag::submitButton(["Guardar", "class" => "btn btn-primary btn-guardar"]) ?>
    </div>
</div>

<?php echo Phalcon\Tag::endForm(); ?>

<script>
    $(function () {
      $("#dataTableAcl").DataTable({
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