<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa6HBo3kO-GFlORU58f_7QcenEI5uo0lg"></script>

<script>
  function init() {
   var map = new google.maps.Map(document.getElementById('map-canvas'), {
     center: {
       lat: 12.9715987,
       lng: 77.59456269999998
     },
     zoom: 12
   });


   var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
   map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));
   google.maps.event.addListener(searchBox, 'places_changed', function() {
     searchBox.set('map', null);

     var places = searchBox.getPlaces();
     var bounds = new google.maps.LatLngBounds();
     var i, place;
     for (i = 0; place = places[i]; i++) { (function(place) {
         var marker = new google.maps.Marker({

           position: place.geometry.location,
           draggable: true
         });
         marker.bindTo('map', searchBox, 'map');
         google.maps.event.addListener(marker, 'map_changed', function() {
          google.maps.event.addListener(marker, 'dragend', function (evt) {
                $("#lat").val(evt.latLng.lat().toFixed(4));
                $("#lon").val(evt.latLng.lng().toFixed(4));

                map.panTo(evt.latLng);
            });

           if (!this.getMap()) {
             this.unbindAll();
           }
         });
         bounds.extend(place.geometry.location);


       }(place));

       var vMarker = new google.maps.Marker({
                draggable: true,
            });

            // centers the map on markers coords
            map.setCenter(vMarker.position);

     }
     map.fitBounds(bounds);
     searchBox.set('map', map);
     map.setZoom(Math.min(map.getZoom(),12));

   });
 }
 google.maps.event.addDomListener(window, 'load', init);


</script>


<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #383838;
  margin: auto auto;
  font-family: Raleway;
  padding: 40px;
  font-size: 14px;
  width: 95%;
  min-width: 100px;
}

h2 {
  text-align: left;
  font-weight: bold;
}

h5 {
  font-weight: bold;
  text-align: left;
  color: #EBBD43;
}


input {
  padding: 10px;
  width: 100%;
  height: 75%;
  font-size: 13px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 13px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
<body>
  <script language="javascript">
    $(document).ready(function(){
        $("#pais").on('change', function () {
            $("#pais option:selected").each(function () {
                id_pais=$(this).val();
                $.post("getRegion.php",{ id_pais: id_pais},function(data){
                $("#region").html(data);
              })		
            });
       });
    });
  
    $(document).ready(function(){
        $("#region").on('change', function () {
            $("#region option:selected").each(function () {
                id_region=$(this).val();
                $.post("getSubregion.php",{ id_region: id_region},function(data){
                $("#subregion").html(data);
              })		
            });
       });
    });
    </script>

<?php 
include "db_config.php";
?>

<form id="regForm" action="/action_page.php">
  <h2>Solicitud de admisión de cooperativa</h2>
  <div class="bg-gray row col-12 "></div></br>

  <!-------------------------Datos personales--------------------------------------------------------->
  <div class="tab">
    <div class="row col-12"><h5><b>Agregar datos personales</b></h5></div>

    <div class="row">

     <div class="col-sm-6">
        <div class="form-group row">
          <label class="col-sm col-form-label">Nombre</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Primer Apellido</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Segundo Apellido</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Apellido casada</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Genero</label>
          <div class="col-sm-8">
            <select class="custom-select" name="genero"  value="">
              <option selected='true' disabled='disabled'>Seleccionar genero</option>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM  genero");
              while($row =mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['IDGENERO'];?>"> <?php echo $row['NOMBREGENERO']; ?></option>
              <?php
              }
              ?>
                  <!-- <?php foreach ($data_genero as $v) { ?>
                  <option value="<?= $v->IDGENERO ?>"><?= $v->NOMBREGENERO ?></option>
                  <?php } ?> -->
          </select>
          </div>
        </div>
      </div>


      <div class="col-sm-6">
        <div class="form-group row">
          <label class="col-sm col-form-label">Fecha de nacimiento</label>
          <div class="col-sm-8">
            <input type="date" placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Pais nacimiento</label>
          <div class="col-sm-8">
            <select class="custom-select" name="pais" id="pais" value="">
              <option selected='true' disabled='disabled'>Seleccionar pais</option>
              <?php
              $resultP = mysqli_query($conn,"SELECT * FROM  pais");
              while($rowP =mysqli_fetch_array($resultP)){
                ?>
                <option value="<?php echo $rowP['IDPAIS'];?>"> <?php echo $rowP['NOMBREPAIS']; ?></option>
              <?php
              }
              ?>
                  <!-- <?php foreach ($data_pais as $p) { ?>
                  <option value="<?= $p->IDPAIS ?>"><?= $p->NOMBREPAIS ?></option>
                  <?php } ?> -->
          </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm col-form-label">Región nacimiento</label>
          <div class="col-sm-8">
            <select class="custom-select" name="region" id="region" value="">
          </select>

          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm col-form-label">Subregión nacimiento</label>
          <div class="col-sm-8">
            <select class="custom-select" name="subregion" id="subregion" value="">
            </select>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm col-form-label">Nacimiento</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
      </div>

    </div>

    

    <div class="bg-gray row col-12 "></div></br>

    <div class="row">
      <div class="col-sm-6">
        <h5>Documentos</h5>
        <div class="form-group row">
          <label class="col-sm col-form-label">Documento legal</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Tipo de documento legal</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">NIT</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">NUP</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">ISSS</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <h5>Dirección</h5>
        <div class="form-group row">
          <label class="col-sm col-form-label">Colonia/Residencial</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm col-form-label">Calle/Pasaje</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">N° de casa/apartamento</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">País</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Región</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>  
        <div class="form-group row">
          <label class="col-sm col-form-label">Subregión</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-sm-12">
        <h4>Geolocalización</h4>
      </div>
      <div class="col-sm-8">
          <div class="form-group row">
            <label>Busca tú dirección en el mapa</label>
            <input id="pac-input"  class="form-control" type="text" placeholder="Busque su dirección aqui">
              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa6HBo3kO-GFlORU58f_7QcenEI5uo0lg&sensor=false&libraries=places"></script>
              <div class="container" id="map-canvas" style="height:400px; width: 100%;"></div>
          </div>
      </div>

      <div class="col-sm-1">
      </div>

      <div class="col-sm-2">
        <div class="form-group row">
          <label>Coordenadas</label>
          <p></p>
          <p></p>
          <label for="lat">Longitud</label>
            <input id="lon"  class="form-control" type="text"></br>
            <label for="lat">Latitud</label>
            <input id="lat"  class="form-control" type="text">
        </div>
      </div>
      <div class="col-sm-1">
      </div>
    </div>


  </div>

  <!-------------------------Datos estado civil--------------------------------------------------------->
  <div class="tab">
    <div class="row col-sm"><h5>Estado civil asociado</h5></div>
    <div class="bg-gray row"></div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group row">
            <label class="col-sm col-form-label">Estado civil</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

        </div>
      </div>

      <div class="row col-12"><h5><b>Datos conyugue</b></h5></div>

      <div class="bg-gray row col-12"></div>
      <p></p>

      <div class="row">
        <div class="col-sm">

          <div class="form-group row">
            <label class="col-sm col-form-label">Nombres</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Apellidos</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Fecha de nacimiento</label>
            <div class="col-sm-8">
              <input type="date" placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Situacion laboral</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Profesión</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Cargo</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Empresa trabajo</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Dirección laboral</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>


        </div>
       </div>
  </div>

  <!-------------------------Datos actividad economica--------------------------------------------------------->
  <div class="tab">
    <div class="row col-sm"><h5>Actividad economica</h5></div>
    <div class="bg-gray row"></div>


      <div class="row">
        <div class="col-sm">

          <div class="form-group row">
            <label class="col-sm col-form-label">Capacidad de pago</label>
            <div class="col-sm-8">
              <input type="number" placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Profesión</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Es empresario</label>
            <div class="col-sm-8">
              <div class="form-check form-check-inline">
                <input id="inlineCheckbox1" type="radio" placeholder="" oninput="this.className = ''" name="fname">
                <label class="form-check-label" for="inlineCheckbox1">SI</label>
              </div>
              <div class="form-check form-check-inline">
                <input id="inlineCheckbox2" type="radio" placeholder="" oninput="this.className = ''" name="fname">
                <label class="form-check-label" for="inlineCheckbox2">No</label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Situacion laboral</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Profesión</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Cargo</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Empresa trabajo</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Dirección laboral</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>


        </div>
        </div>

        <div class="row col-12"><h5><b>Datos si es empresario</b></h5></div>

        <div class="bg-gray row col-12"></div>
        <p></p>
        <div class="row">
        <div class="col-sm">
          <div class="form-group row">
            <label class="col-sm col-form-label">Tarjeta del IVA</label>
            <div class="col-sm-8">
              <input placeholder="" oninput="this.className = ''" name="fname">
            </div>
          </div>

        </div>
      </div>


  </div>

  <!-------------------------Datos referencias personales y familiares--------------------------------------------------------->
  <div class="tab">
    <div class="row col-12"><h5><b>Referencias personales</b></h5></div>

    <div class="row">

     <div class="col-sm-6">
        <div class="form-group row">
          <label class="col-sm col-form-label">Nombre</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Telefono</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Correo</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Dirección</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Relacion</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group row">
          <label class="col-sm col-form-label">Nombre</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Telefono</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Correo</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Dirección</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Relacion</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
      </div>

    </div>

    <div class="bg-gray row col-12 "></div></br>

    <div class="row col-12"><h5><b>Referencias familiares</b></h5></div>

    <div class="row">

     <div class="col-sm-6">
        <div class="form-group row">
          <label class="col-sm col-form-label">Nombre</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Telefono</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Correo</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Dirección</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Relacion</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group row">
          <label class="col-sm col-form-label">Nombre</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Telefono</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Correo</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Dirección</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Relacion</label>
          <div class="col-sm-8">
            <input placeholder="" oninput="this.className = ''" name="fname">
          </div>
        </div>
      </div>

    </div>


  </div>

  <div class="tab">

  </div>




  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

</script>


</body>
</html>