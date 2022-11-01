<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo(["acl", "Back"]) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Editar lista de acceso
    </h1>
</div>

<?php echo $this->getContent(); ?>

<?php
    echo $this->tag->form(
        [
            "acl/save",
            "autocomplete" => "off",
            "class" => "form-horizontal"
        ]
    );
?>

<div class="form-group">
    <label for="fieldRole" class="col-sm-2 control-label">Rol</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(["IDROL", "size" => 30, "class" => "form-control", "id" => "fieldRole"]) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldAction" class="col-sm-2 control-label">Accion</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(["accion", "size" => 30, "class" => "form-control", "id" => "fieldAction"]) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldResource" class="col-sm-2 control-label">Componente</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(["componente", "size" => 30, "class" => "form-control", "id" => "fieldResource"]) ?>
    </div>
</div>


<?php echo $this->tag->hiddenField("id") ?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(["Guardar", "class" => "btn btn-default"]) ?>
    </div>
</div>

<?php echo $this->tag->endForm(); ?>