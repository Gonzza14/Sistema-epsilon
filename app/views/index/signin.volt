<form action="{{url ("index/signin")}}" class="form-horizontal" method="POST">
    <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Inicio de sesion</h1>

    <div class="form-floating">
      <input type="email" name="correo" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Correo electronico</label>
    </div>
    <div class="form-floating">
      <input type="password" name="clave" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Recuerdame
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
    <p class="mt-5 mb-3 text-muted">&copy;2022</p>
  </form>