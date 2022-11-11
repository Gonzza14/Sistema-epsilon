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
  max-width: 330px;
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
  <form action="{{url ("index/signin")}}" class="form-horizontal" method="POST">
    <img class="mb-2 center imagen" src="{{ url('dist/img/user-icon.png') }}" alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal text">Inicio de sesion</h1>
    <div class="form-floating">
      <input autocomplete="off" type="text" name="nombre" class="form-control" id="floatingInput" placeholder="Nombre de usuario" required>
      <label for="floatingInput">Nombre de usuario</label>
    </div>
    <div class="form-floating">
      <input autocomplete="off" type="password" name="clave" class="form-control" id="floatingPassword" placeholder="Contraseña" required>
      <label for="floatingPassword">Contraseña</label>
    </div>

   <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Recuerdame
      </label>
    </div>-->
    <button class="btn-ingresar w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
    <a class="btn-ingresar w-100 btn btn-lg btn-light" href="{{url('../index/signinGoogle')}}">Continuar con Google</a>

    <!--<a class="nav-link text" href="{{ url('../index/signup') }}" class="nav-link">Registrarse</a>-->
    <a class="nav-link text" href="{{ url('../index/recuperar') }}" class="nav-link">¿Olvido su nombre de usuario o contraseña?</a>
    <p class="mt-5 mb-3 text-muted text">&copy;2022</p>
  </form>
</main>
</body>
</html>