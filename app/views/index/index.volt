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

.container {
  padding-top: 200px;
  padding-bottom: 200px;
  width: 100%;
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
<section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Bienvenido</h1>
            <p class="lead text-muted">Sistema de cooperativa Epsilon</p>
            <p>
              {% if session.has('AUTH') === false%}
              <a href="{{ url('../index/signin') }}" class="btn btn-primary my-2">Iniciar sesion</a>
              {% endif %}
            </p>
          </div>
        </div>
      </section>


