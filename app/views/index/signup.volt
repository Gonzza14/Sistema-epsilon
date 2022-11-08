<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

html,
body{
  height: 100%;
}
body {
  align-items: center;
}

.form-signin {
  padding-top: 100px;
  padding-bottom: 100px;
  width: 100%;
  max-width: 500px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.imagen{
  padding-bottom: 5px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}
.text{
  text-align:center
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.btn-ingresar{
  margin-bottom: 10px;
}
.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
</style>

<body class="text-center">
    <main class="form-signin">
    <form action="{{url ("index/signup")}}" class="form-horizontal" method="POST" id="form-registrar" name="formulario">
        <h2 class="h3 mb-3 fw-normal text">Registro de usuario</h2>
        <div class="form-floating">
            <input autocomplete="off" type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombres" required>
            <label for="nombre">Nombres del usuario</label>
        </div>
        <br>
        <div class="form-floating">
            <input autocomplete="off" type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellidos" required>
            <label for="apellido">Apellidos del usuario</label>
        </div>
        <br>
        <div class="form-floating">
            <input autocomplete="off" type="date" name="nacimiento" class="form-control" id="fechaNacimiento" placeholder="Fecha de nacimiento" required>
            <label for="fechaNacimiento">Fecha de nacimiento</label>
        </div>
        <br>
        <div class="form-floating">
            <input autocomplete="off" type="text" name="correo" class="form-control" id="correo" placeholder="Correo electronico" required>
            <label for="correo">Correo electronico</label>
        </div>
        <br>
        <div class="form-floating">
            <input autocomplete="off" type="tel" name="telefono" class="form-control" id="telefono" placeholder="Telefono celular" required>
            <label for="telefono">Telefono</label>
        </div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" name="btnEnviar" id="submitId" type="submit">Registrarse</button>
    </form>
</main>
</body>
<script>
        /*$(document).ready(function(){
            $("#submitId").click(function(event){
            $("#submitId").prop('disabled',true)
            return false;
            })
        })*/
        /*function confirmEnviar() {
          formulario.btnEnviar.disabled = true; 
          miformulario.btnEnviar.value = "Enviando...";
          setTimeout(function(){
            miformulario.btnEnviar.disabled = false;
            miformulario.btnEnviar.value = "Registrarse";
          }, 3000);
          return false;
        }
        miformulario.btnEnviar.addEventListener("click", function(){ 
          return confirmEnviar();
          }, false);*/
</script>
</html>