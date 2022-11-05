<div class="container">
    <form action="{{url ("index/signup")}}" class="form-horizontal" method="POST">
        <h2 class="form-signin-heading">Registro de usuario</h2>
        <label for="nombre" class="sr-only">Nombres</label>
        <input autocomplete="off" type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" required>
        <br>
        <label for="apellido" class="sr-only">Apellidos</label>
        <input autocomplete="off" type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos" required>
        <br>
        <label for="fechaNacimiento" class="sr-only">Fecha de nacimiento</label>
        <input autocomplete="off" type="date" name="nacimiento" class="form-control" id="fechaNacimiento" placeholder="Fecha de nacimiento" required>
        <br>
        <label for="inputEmail" class="sr-only">Correo electronico</label>
        <input autocomplete="off" type="text" name="correo" class="form-control" id="inputEmail" placeholder="Correo electronico" required>
        <br>
        <label for="telefono" class="sr-only">Telefono</label>
        <input autocomplete="off" type="tel" name="telefono" class="form-control" id="telefono" placeholder="Telefono celular" required>
        <br>
        <!--<label for="inputPassword" class="sr-only">Contraseña</label>
        <input autocomplete="off" type="password" name="clave" class="form-control" placeholder="Contraseña">
        <br>-->
        <!--<label for="role" class="sr-only">Rol de usuario</label>
        <select class="form-control" name="idRol" id="user_role">
            <option value="">Seleccionar rol de usuario</option>
            {% for role in roles %}
                <option value="{{role.IDROL}}">{{role.IDROL}}</option>
            {% endfor %}
        </select>
        <br>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
    </form>
</div>