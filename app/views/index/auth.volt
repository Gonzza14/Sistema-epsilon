<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Autenticacion</title>
    <style>
      html,
      body {
        height: 100%;
      }
      body {
        align-items: center;
      }

      .form {
        width: 100%;
        max-width: 500px;
        margin: auto;
      }

      p {
        text-align: justify;
        text-justify: inter-word;
        margin-top: 20px;
      }
      svg{
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      .imagen {
        padding-bottom: 5px;
      }

      .form-floating {
        padding-bottom: 10px;
      }
      .form .form-floating:focus-within {
        z-index: 2;
      }
      .text {
        text-align: center;
      }
      .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      .form input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }

      .form input[type="password"] {
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
  </head>
  <main class="form">
    <body>
      <ol>
        <form
          action="{{ url('index/confirmAuth') }}"
          class="form-horizontal"
          method="POST"
        >
          <div class="form-group">
            <div class="col-sm-10">
              <input
                type="hidden"
                class="form-control"
                name="id"
                value="{{ id }}"
                required
              />
            </div>
          </div>
          <h1 class="h3 mb-3 fw-normal text">Autenficacion de doble factor</h1>
          {% if login === 2 %}
          <!--<img class="mb-2 center imagen" src="{{qr}}" >-->
          {{ qr }}
          <!--<div class="visible-print text-center">

              <p>Scan me to return to the original page.</p>
          </div>-->
         
          <!--<p>Please enter the following code in your app: {{qr}}</p>-->
          <p>
            Por favor instale <strong>Google Authenticator App en su
            telefono, abralo y scanee el codigo de barra para añadirlo a su
            aplicacion, Despues de añadirlo en su aplicacion ingrese el codigo
            que ve en Google Authenticator App en la siguiente caja de texto
            para poder completar el proceso de inicio de sesion
          </p>
          {% endif %}
          {% if login !== 2 %}
          <p>
            Por favor abra su aplicacion <strong>Google Authenticator App</strong> en su
            telefono, e ingrese el codigo que aparece en pantalla de la cuenta <strong>Epsilon</strong>.
          </p>
          {% endif %}
          <div class="form-floating">
            <input
              autocomplete="off"
              type="text"
              name="verification"
              class="form-control"
              id="floatingInput"
            />
            <label for="floatingInput">Codigo de verificacion</label>
          </div>
          <!-- <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Recuerdame
              </label>
            </div>-->
          <button
            class="w-100 btn btn-lg btn-primary"
            name="enviar"
            type="submit"
          >
            Ingresar
          </button>
          <p class="mt-5 mb-3 text-muted text">&copy;2022</p>
        </form>
      </ol>
    </body>
  </main>
</html>
