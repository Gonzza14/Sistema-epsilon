<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>

.form-signin {
  font-family: Raleway;
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
</style>

<body class="text-center">
    
  <main class="form-signin">
  <form action="<?= $this->url->get('index/signin') ?>" class="form-horizontal" method="POST">
    <img class="mb-2 center imagen" src="<?= $this->url->get('dist/img/user-icon.png') ?>" alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal text">Inicio de sesion</h1>

    <div class="form-floating">
      <input autocomplete="off" type="email" name="correo" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Correo electronico</label>
    </div>
    <div class="form-floating">
      <input autocomplete="off" type="password" name="clave" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Recuerdame
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
    <p class="mt-5 mb-3 text-muted text">&copy;2022</p>
  </form>
</main>
</body>
</html>