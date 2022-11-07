<div class="container">
    <form action="<?= $this->url->get('index/updatePassword') ?>" class="form-horizontal" method="POST">
        <h2 class="form-signin-heading">Cambiar contraseña provisional</h2>
        <div class="form-group">
            <div class="col-sm-10">
              <input type="hidden" class="form-control" name="id" value="<?= $id ?>" required>
            </div>
          </div>
        <label for="clave" class="sr-only">Nueva contraseña</label>
        <input autocomplete="off" type="password" name="clave" id="clave" class="form-control" placeholder="Nueva contraseña">
        <br>
        <label for="clave-confirmar" class="sr-only">Confirmar nueva contraseña</label>
        <input autocomplete="off" type="password" name="clave-confirmar" id="clave-confirmar"class="form-control" placeholder="Escriba nuevamente la nueva contraseña">
        <br>
        <!--<label for="role" class="sr-only">Rol de usuario</label>
        <select class="form-control" name="idRol" id="user_role">
            <option value="">Seleccionar rol de usuario</option>
            <?php foreach ($roles as $role) { ?>
                <option value="<?= $role->IDROL ?>"><?= $role->IDROL ?></option>
            <?php } ?>
        </select>
        <br>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Confirmar</button>
    </form>
</div>