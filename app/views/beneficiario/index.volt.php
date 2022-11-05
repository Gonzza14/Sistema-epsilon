<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa6HBo3kO-GFlORU58f_7QcenEI5uo0lg"></script>
<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css"> -->



<body>


<?php 
include "db_config.php";
?>

<form id="regForm1"  action="<?= $this->url->get('asociado/store') ?>" method="POST" class="needs-validation" novalidate>
  <h2 class="h2">Solicitud de admisión de cooperativa</h2>
  <div class="bg-gray row col-12 "></div></br>



  <div class="tab">
    <div class="container">
      <h5><b>Beneficiarios</b></h5>
      <div id="jsonDiv" hidden>
      </div>
      <div class="row">
          <div class="form-group row">
            <label class="col-sm col-form-label">Parentesco</label>
            <div class="col-sm-8">
              <select class="form-select" name="parentesco" id="parentesco">
                <option selected='true' disabled='disabled'>Seleccionar Parentesco</option>
                <?php
                $result = mysqli_query($conn,"SELECT * FROM  parentesco");
                while($row =mysqli_fetch_array($result)){
                  ?>
                  <option value="<?php echo $row['idParentesco'];?>"> <?php echo $row['nombreParentesco']; ?></option>
                <?php
                }
                ?>
            </select>
            </div>
          </div>

          <div class="form-group row">
              <label class="col-sm col-form-label">Nombre Beneficiario</label>
              <div class="col-sm-8">
                <input placeholder="Nombre Completo" class="form-control" name="nombreBenef" id="nombreBenef">
              </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Telefono Beneficiario</label>
            <div class="col-sm-8">
              <input placeholder="Telefono" type="tel" class="form-control" name="telefonoBenef" id="telefonoBenef">
            </div>
            </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Correo Beneficiario</label>
            <div class="col-sm-8">
              <input placeholder="Correo" type="email" class="form-control" name="correoBenef" id="correoBenef">
            </div>
            </div>
      

          <div class="form-group row">
            <label class="col-sm col-form-label">Direccion Beneficiario</label>
            <div class="col-sm-8">
              <input placeholder="Direccion" class="form-control" name="direccionBenef" id="direccionBenef">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Fecha de nacimiento</label>
            <div class="col-sm-8">
              <input  class="form-control" name="fechaBenef" id="fechaBenef" type="text">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Porcentaje</label>
            <div class="col-sm-8">
              <input placeholder="Porcentaje" type="number" max="100" min="1" class="form-control" name="porcentaje" id="porcentaje">
            </div>
          </div>

      <div class="row">
                  <button id="btnAdd" type="button" class="btn btn-secondary">Añadir Beneficiario</button>
                  
                    <button id="btnSave" type="button" class="btn btn-warning">Guardar Registro</button>
                </div>
      <hr>
 
      </div>

      <div id="divElements" class="form-group">

      </div>
    </div>

<script>
let parameters = []
function removeElement(event, position) {
    event.target.parentElement.remove()
    delete parameters[position]
}

const addJsonElement = json => {
    parameters.push(json)
    return parameters.length - 1
}

(function load(){
    const $form = document.getElementById("regForm1")
    const $divElements = document.getElementById("divElements")
    const $btnSave = document.getElementById("btnSave")
    const $btnAdd = document.getElementById("btnAdd")

    const templateElement = (data, position) => {
        return (`
          <div class="alert-dark">
            <strong>Beneficiario</strong> 
            <p>${data}</p>
            <button class="btn btn-danger" onclick="removeElement(event, ${position})"></button>
           </div>
        `)
    }
    $btnAdd.addEventListener("click", (event) => {
      var v1 = document.getElementById("parentesco").value;
      var v2 = document.getElementById("nombreBenef").value;
      var v3 = document.getElementById("telefonoBenef").value;
      var v4 = document.getElementById("correoBenef").value;
      var v5 = document.getElementById("direccionBenef").value;
      var v6 = document.getElementById("fechaBenef").value;
      var v7 = document.getElementById("porcentaje").value;



        if( v1 != "" && v2  != ""){
            let index = addJsonElement({
              v1 : document.getElementById("parentesco").value,
              v2 : document.getElementById("nombreBenef").value,
              v3 : document.getElementById("telefonoBenef").value,
              v4 : document.getElementById("correoBenef").value,
              v5 : document.getElementById("direccionBenef").value,
              v6 : document.getElementById("fechaBenef").value,
              v7 : document.getElementById("porcentaje").value,

            })
            const $div = document.createElement("div")
            $div.classList.add("row","col-12")
            $div.innerHTML = templateElement(`Nombre:\n\n${v2}<p>Telefono:\n\n${v3}<p>Telefono:\n\n${v3}<p>Correo:\n\n${v4}<p>Dirección:\n\n${v5}<p>Fecha nacimiento\n\n${v3}<p>Porcentaje:\n\n${v3}`, index)
 // jQuery Ajax Post Request
            $divElements.insertBefore($div, $divElements.firstChild)

            $form.reset()
        }else{
            alert("Complete los campos")
        }
    })


    $btnSave.addEventListener("click", (event) =>{
        parameters = parameters.filter(el => el != null)
        const $jsonDiv = document.getElementById("jsonDiv")
        $jsonDiv.innerHTML = `JSON: ${JSON.stringify(parameters)}`
        $.post('json.php', {jason: JSON.stringify(parameters),}, (response) => {
              console.log(response);
            });
        $divElements.innerHTML = ""
        parameters = []
    })


})()


  </script>


  </div>

</form>



</body>
</html>