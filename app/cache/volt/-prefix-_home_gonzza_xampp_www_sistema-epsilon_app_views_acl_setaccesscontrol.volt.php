<h3>Establecer control de acceso para el componente <b><?= $componente ?></b> Controller</h3>
<?php
    echo Phalcon\Tag::formLegacy(
        [
            "acl/saveAccessControl",
            "autocomplete" => "off",
            "class" => "form-horizontal"
        ]
    );
?>
<input type="hidden" name="componente" value="<?= $componente ?>">
<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Metodos</th>
                <?php foreach ($roles as $role): ?>
                    <th><?= $role->NOMBREROL; ?></th>
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
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo Phalcon\Tag::submitButton(["Guardar", "class" => "btn btn-success"]) ?>
    </div>
</div>

<?php echo Phalcon\Tag::endForm(); ?>