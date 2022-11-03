<div class="container">
    <form action="<?= $this->url->get('index/signup') ?>" class="form-horizontal" method="POST">
        <h2 class="form-signin-heading">Registro de usuario</h2>
        <label for="user" class="sr-only">Nombre de usuario</label>
        <input autocomplete="off" type="text" name="nombre" class="form-control" placeholder="Nombre de usuario">
        <br>
        <label for="inputEmail" class="sr-only">Correo electronico</label>
        <input autocomplete="off" type="text" name="correo" class="form-control" placeholder="Correo electronico">
        <br>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input autocomplete="off" type="password" name="clave" class="form-control" placeholder="Contraseña">
        <br>
        <!--<label for="role" class="sr-only">Rol de usuario</label>
        <select class="form-control" name="idRol" id="user_role">
            <option value="">Seleccionar rol de usuario</option>
            <?php foreach ($roles as $role) { ?>
                <option value="<?= $role->IDROL ?>"><?= $role->IDROL ?></option>
            <?php } ?>
        </select>
        <br>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
    </form>
</div>