<div class="page-header">
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

<?php echo Phalcon\Tag::endForm(); ?>