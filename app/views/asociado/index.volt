<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa6HBo3kO-GFlORU58f_7QcenEI5uo0lg"></script>
<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css"> -->
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
  margin: auto auto;
  font-family: Raleway;
  padding: 40px;
  font-size: 14px;
  width: 95%;
  min-width: 100px;
}


h5 {
  font-weight: bold;
  text-align: left;
  color: #EBBD43;
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

    $(document).ready(function(){
        $("#paisResi").on('change', function () {
            $("#paisResi option:selected").each(function () {
                id_pais=$(this).val();
                $.post("getRegion.php",{ id_pais: id_pais},function(data){
                $("#regionResi").html(data);
              })		
            });
       });
    });
  
    $(document).ready(function(){
        $("#regionResi").on('change', function () {
            $("#regionResi option:selected").each(function () {
                id_region=$(this).val();
                $.post("getSubregion.php",{ id_region: id_region},function(data){
                $("#subregionResi").html(data);
              })		
            });
       });
    });
    </script>

<?php 
include "db_config.php";
?>

<form id="regForm" action="{{url ("asociado/store")}}" method="POST">
  <h2 class="h2">Solicitud de admisión de cooperativa</h2>
  <div class="bg-gray row col-12 "></div></br>

  <!-------------------------Datos personales--------------------------------------------------------->
  <div class="tab">
    <div class="row col-12"><h5 class="h5 text-warning"><b>Agregar datos personales</b></h5>
      <p></br></p>
      <h5 class="h5 text-warning">Datos personales</h5>
    </div>

  <!--Columna superior izquierda ------------------------------------------------------------------------------->
    <div class="row">

      <div class="col-sm-6">
        <div class="form-group row">
          <label for="nombreAsociado" class="col-sm col-form-label">Nombre asociado</label>
          <div class="col-sm-8">
            <input  class="form-control" maxlength="100" placeholder="Nombre Asociado" name="nombreAsociado" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="primerApellido" class="col-sm col-form-label">Primer Apellido</label>
          <div class="col-sm-8">
            <input placeholder="Primer Apellido" maxlength="100" class="form-control" name="primerApellido" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="segundoApellido" class="col-sm col-form-label">Segundo Apellido</label>
          <div class="col-sm-8">
            <input placeholder="Segundo Apellido" maxlength="100" class="form-control" name="segundoApellido" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="apellidoConyugue" class="col-sm col-form-label">Apellido casada</label>
          <div class="col-sm-8">
            <input placeholder="Apellido casada" maxlength="100" class="form-control" name="apellidoConyugue">
          </div>
        </div>
        <div class="form-group row">
          <label for="telefonoA" class="col-sm col-form-label">Telefono</label>
          <div class="col-sm-8">
            <input placeholder="Telefono" maxlength="10" class="form-control" name="telefonoA">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm col-form-label">Genero</label>
          <div class="col-sm-8">
            <select class="form-select" name="genero" required>
              <option selected='true' disabled='disabled'>Seleccionar genero</option>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM  genero");
              while($row =mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['idGenero'];?>"> <?php echo $row['nombreGenero']; ?></option>
              <?php
              }
              ?>
          </select>
          </div>
        </div>
      </div>

  <!--Columna superior derecha -->

      <div class="col-sm-6">
        <div class="form-group row">
          <label class="col-sm col-form-label">Fecha de nacimiento</label>
          <div class="col-sm-8">
            <input type="date" placeholder="Fecha nacimiento" class="form-control" name="fechaNacimiento" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Pais nacimiento</br><span>(Alpha2 | Alpha3 | Num | COI)</span></label>
          <div class="col-sm-8">
            <select class="form-select" name="pais" id="pais" required>
              <option selected='true' disabled='disabled'>Seleccionar pais</option>
              <?php
              $resultP = mysqli_query($conn,"SELECT * FROM  pais");
              while($rowP =mysqli_fetch_array($resultP)){
                ?>
                <option value="<?php echo $rowP['idPais'];?>"> <?php echo $rowP['nombrePais']."\n|\n".$rowP['alpha2']."\n|\n".$rowP['alpha3']."\n|\n".$rowP['numerico']."\n|\n".$rowP['coi']; ?></option>
              <?php
              }
              ?>
          </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm col-form-label">Región nacimiento</label>
          <div class="col-sm-8">
            <select class="form-select" name="region" id="region" required>
          </select>

          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm col-form-label">Subregión nacimiento</label>
          <div class="col-sm-8">
            <select class="form-select" name="subregion" id="subregion" required>
            </select>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm col-form-label">Nacionalidad</label>
          <div class="col-sm-8">
            <input placeholder="Nacionalidad" class="form-control" name="nacionalidad">
          </div>
        </div>
      </div>

    </div>

    <div class="bg-gray row col-12 "></div></br>


  <!--Columna inferior izquierda ---------------------------------------------------------------------------->
    <div class="row">
      
      <div class="col-sm-6">
        <h5 class="h5 text-warning">Documentos</h5>
        <div class="form-group row">
          <label class="col-sm col-form-label">Tipo de documento</label>
          <div class="col-sm-8">
            <select class="form-select" name="tipoDocumento" id="tipoDocumento" required>
              <option selected='true' disabled='disabled'>Seleccionar Tipo de documento</option>
                  {% for v in data_tipo_doc %}
                  <option value="{{ v.idTipoDocumento }}">{{ v.nombreTipoDoc }}</option>
                  {%endfor%}
          </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Documento legal</label>
          <div class="col-sm-8">
            <input placeholder="Documento" class="form-control" name="numeroDoc" id="numeroDoc" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">NIT</label>
          <div class="col-sm-8">
            <input placeholder="NIT"  class="form-control" name="nit" id="nit">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">NUP</label>
          <div class="col-sm-8">
            <input placeholder="NUP"  class="form-control" name="nup" id="nup">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">ISSS</label>
          <div class="col-sm-8">
            <input placeholder="ISSS" class="form-control" name="isss" id="isss">
          </div>
        </div>
      </div>

      <script>
        $(document).ready(function(){
                $("#tipoDocumento").on('change', function () {
                  if($("#tipoDocumento").val() != 1){
                    $('#nit').removeAttr('required');
                    $('#nit').val('  ');
                    $('#nup').removeAttr('required');
                    $('#nup').val('  ');
                    $('#isss').removeAttr('required');
                    $('#isss').val('  ');


              }else{
                $('#nit').prop('required','required');
                $('#nit').val('');
                $('#nup').prop('required','required');
                $('#nup').val('');
                $('#isss').prop('required','required');
                $('#isss').val('');
              }
                 
               });
            });
        
        </script>

      <div class="col-sm-6">
        <h5 class="h5 text-warning">Dirección</h5>
        <div class="form-group row">
          <label class="col-sm col-form-label">Colonia/Residencial</label>
          <div class="col-sm-8">
            <input placeholder="Barrio/Colonia/Residencial" class="form-control" name="barrioColRes" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm col-form-label">Calle/Pasaje</label>
          <div class="col-sm-8">
            <input placeholder="Calle/Pasaje" class="form-control" name="callePasaj" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="numCasDep" class="col-sm col-form-label">N° de casa/apartamento</label>
          <div class="col-sm-8">
            <input placeholder="N° casa/departamento" id="numCasDep" class="form-control" name="numCasDep" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Pais residencia</br><span>(Alpha2 | Alpha3 | Num | COI)</span></label>
          <div class="col-sm-8">
            <select class="form-select" name="paisResi" id="paisResi" required>
              <option selected='true' disabled='disabled'>Seleccionar pais</option>
              <?php
              $resultP = mysqli_query($conn,"SELECT * FROM  pais");
              while($rowP =mysqli_fetch_array($resultP)){
                ?>
                <option value="<?php echo $rowP['idPais'];?>"> <?php echo $rowP['nombrePais']."\n|\n".$rowP['alpha2']."\n|\n".$rowP['alpha3']."\n|\n".$rowP['numerico']."\n|\n".$rowP['coi']; ?></option>
              <?php
              }
              ?>
          </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm col-form-label">Región residencia</label>
          <div class="col-sm-8">
            <select class="form-select" name="regionResi" id="regionResi"  required>
          </select>

          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm col-form-label">Subregión residencia</label>
          <div class="col-sm-8">
            <select class="form-select" name="subregionResi" id="subregionResi" required>
            </select>
          </div>
        </div>
      </div>
    </div>
    
    <!--GEOLOCALIZACION ---------------------------------------------------------------------------->

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
            <input id="lon" placeholder="X" name="x" max="15" class="form-control" type="number" required></br>
            <label for="lat">Latitud</label>
            <input id="lat"  placeholder="Y" name="y" max="15" class="form-control" type="number" required>
        </div>
      </div>
      <div class="col-sm-1">
      </div>
    </div>


  </div>

<!-------------------------Disable and enable--------------------------------------------------------->

<script>

$(document).ready(function(){
        $("#estadoCivil").on('change', function () {
          if($("#estadoCivil").val() == 1){
            $('#nombreConyugue').removeAttr('disabled');
            $('#nombreConyugueA').removeAttr('disabled');
            $('#fechaNacConyugue').removeAttr('disabled');
            $('#situacionLaboralConyugue').removeAttr('disabled');
            $('#profesionConyugue').removeAttr('disabled');
            $('#cargoConyugue').removeAttr('disabled');
            $('#empresaConyugue').removeAttr('disabled');
            $('#direcLabConyugue').removeAttr('disabled');

      }else{
        $("#nombreConyugue").val(' '); $('#nombreConyugue').prop('disabled','disabled');
        $("#nombreConyugueA").val(' '); $('#nombreConyugueA').prop('disabled','disabled');       
        $("#fechaNacConyugue").val(' '); $('#fechaNacConyugue').prop('disabled','disabled');       
        $("#situacionLaboralConyugue").val(' '); $('#situacionLaboralConyugue').prop('disabled','disabled');       
        $("#profesionConyugue").val(' '); $('#profesionConyugue').prop('disabled','disabled');       
        $("#cargoConyugue").val(' '); $('#cargoConyugue').prop('disabled','disabled');       
        $("#empresaConyugue").val(' '); $('#empresaConyugue').prop('disabled','disabled');       
        $("#direcLabConyugue").val(' '); $('#direcLabConyugue').prop('disabled','disabled');       

      }
         
       });
    });

</script>
  <!-------------------------Datos estado civil--------------------------------------------------------->
  <div class="tab">
    <div class="row col-sm"><h5>Estado civil asociado</h5></div>
    <div class="bg-gray row"></div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group row">
            <label class="col-sm col-form-label">Estado civil</label>
            <div class="col-sm-8">
              <select class="form-select" name="estadoCivil" id="estadoCivil" required>
                <option selected='true' disabled='disabled'>Seleccionar estado civil</option>
                    {% for v in data_estado_civil %}
                    <option value="{{ v.idEstCivil }}">{{ v.nombreEstCivil }}</option>
                    {%endfor%}
            </select>
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
              <input placeholder="Nombre Conyugue" class="form-control" name="nombreConyugue" id="nombreConyugue" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Apellidos</label>
            <div class="col-sm-8">
              <input placeholder="Apellido Conyugue" class="form-control" name="nombreConyugueA" id="nombreConyugueA" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Fecha de nacimiento</label>
            <div class="col-sm-8">
              <input type="date" placeholder="Fecha de nacimiento" class="form-control" name="fechaNacConyugue" id="fechaNacConyugue" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Situacion laboral</label>
            <div class="col-sm-8">
              <input placeholder="Situacion Laboral" class="form-control"  type="number" name="situacionLaboralConyugue" id="situacionLaboralConyugue" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Profesión</label>
            <div class="col-sm-8">
              <input placeholder="Profesión" class="form-control" name="profesionConyugue" id="profesionConyugue" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Cargo</label>
            <div class="col-sm-8">
              <input placeholder="Cargo" class="form-control" name="cargoConyugue" id="cargoConyugue" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Empresa trabajo</label>
            <div class="col-sm-8">
              <input placeholder=""  class="form-control" name="empresaConyugue" id="empresaConyugue" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Dirección laboral</label>
            <div class="col-sm-8">
              <input placeholder=""  class="form-control" name="direcLabConyugue" id="direcLabConyugue" required>
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
              <input type="number" placeholder="Capacidad Pago" class="form-control" name="capacidadPago" id="capacidadPago">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Profesión</label>
            <div class="col-sm-8">
              <select class="form-select" name="profesion" required>
                <option selected='true' disabled='disabled'>Seleccionar Profesión</option>
                <?php
                $result = mysqli_query($conn,"SELECT * FROM  profesion");
                while($row =mysqli_fetch_array($result)){
                  ?>
                  <option value="<?php echo $row['idProfesion'];?>"> <?php echo $row['nombreProfesion']; ?></option>
                <?php
                }
                ?>
            </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Es empresario</label>
            <div class="col-sm-8">
              <input type="hidden" value="" name="empresario" id="empresario">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Si
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  No
                </label>
              </div>
            </div>
          </div>
          <script>
            flexRadioDefault1.addEventListener('change', function (e) {
            if (this.checked) {
              document.getElementById("empresario").value = 1;
              $('#iva').removeAttr('disabled');
            }
          });

          flexRadioDefault2.addEventListener('change', function (e) {
            if (this.checked) {
              document.getElementById("empresario").value = 0;
              $("#iva").val(' '); $('#iva').prop('disabled','disabled');
            }
          });
          </script>

          <div class="form-group row">
            <label class="col-sm col-form-label">Cargo</label>
            <div class="col-sm-8">
              <input placeholder="Cargo" class="form-control" name="cargo">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Empresa trabajo</label>
            <div class="col-sm-8">
              <input placeholder="Nombre Empresa" class="form-control" name="nombreEmpresa">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm col-form-label">Dirección laboral</label>
            <div class="col-sm-8">
              <input placeholder="Dirección Laboral" class="form-control" name="direccLaboral	">
            </div>
          </div>


        </div>
        </div>

        <div class="row col-12"><h5 class="h5 text-warning">Datos si es empresario</h5></div>

        <div class="bg-gray row col-12"></div>
        <p></p>
        <div class="row">
        <div class="col-sm">
          <div class="form-group row">
            <label class="col-sm col-form-label">Tarjeta del IVA</label>
            <div class="col-sm-8">
              <input placeholder="Tarjeta IVA" class="form-control" name="iva" id="iva">
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
            <input placeholder="Nombre Completo" class="form-control" name="nombreRef" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Telefono</label>
          <div class="col-sm-8">
            <input placeholder="Telefono Referencia"  class="form-control"  name="telefonoRef" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Correo</label>
          <div class="col-sm-8">
            <input placeholder="Correo"  type="email" class="form-control"  name="correoRef" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Dirección</label>
          <div class="col-sm-8">
            <input placeholder="Dirección"  class="form-control"  name="direccionRef" required>
          </div>
        </div>
        <div class="form-group row">  
          <label class="col-sm col-form-label">Relacion</label>
          <div class="col-sm-8">
            <input placeholder="Relación con asociado" class="form-control"  name="relacionAsoc" required>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group row">
          <label class="col-sm col-form-label">Nombre</label>
          <div class="col-sm-8">
            <input placeholder="Nombre Completo"  class="form-control"  name="nombreRef1" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Telefono</label>
          <div class="col-sm-8">
            <input placeholder="Telefono Referencia"  class="form-control"  name="telefonoRef1" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Correo</label>
          <div class="col-sm-8">
            <input placeholder="Correo" type="email" class="form-control"  name="correoRef1" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Dirección</label>
          <div class="col-sm-8">
            <input placeholder="Dirección"  class="form-control"  name="direccionRef1" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm col-form-label">Relacion</label>
          <div class="col-sm-8">
            <input placeholder="Relación con asociado"  class="form-control"  name="relacionAsoc1" required>
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
             <input placeholder="Nombre Completo" class="form-control" name="nombreFa" required>
           </div>
         </div>
         <div class="form-group row">
           <label class="col-sm col-form-label">Telefono</label>
           <div class="col-sm-8">
             <input placeholder="Telefono"  class="form-control"  name="telefonoFa" required>
           </div>
         </div>
         <div class="form-group row">
           <label class="col-sm col-form-label">Correo</label>
           <div class="col-sm-8">
             <input placeholder="Correo"  type="email" class="form-control"  name="correoFa" required>
           </div>
         </div>
         <div class="form-group row">
           <label class="col-sm col-form-label">Dirección</label>
           <div class="col-sm-8">
             <input placeholder="Dirección"  class="form-control"  name="direccionFa" required>
           </div>
         </div>
         <div class="form-group row">  
           <label class="col-sm col-form-label">Relacion</label>
           <div class="col-sm-8">
             <input placeholder="Relación con asociado" class="form-control"  name="relacionFa" required>
           </div>
         </div>
       </div>
 
       <div class="col-sm-6">
         <div class="form-group row">
           <label class="col-sm col-form-label">Nombre</label>
           <div class="col-sm-8">
             <input placeholder="Nombre Completo"  class="form-control"  name="nombreFa1" required>
           </div>
         </div>
         <div class="form-group row">
           <label class="col-sm col-form-label">Telefono</label>
           <div class="col-sm-8">
             <input placeholder="Telefono"  class="form-control"  name="telefonoFa1" required>
           </div>
         </div>
         <div class="form-group row">
           <label class="col-sm col-form-label">Correo</label>
           <div class="col-sm-8">
             <input placeholder="Correo" type="email" class="form-control"  name="correoFa1" required>
           </div>
         </div>
         <div class="form-group row">
           <label class="col-sm col-form-label">Dirección</label>
           <div class="col-sm-8">
             <input placeholder="Dirección"  class="form-control"  name="direccionFa1" required>
           </div>
         </div>
         <div class="form-group row">
           <label class="col-sm col-form-label">Relacion</label>
           <div class="col-sm-8">
             <input placeholder="Relación con asociado"  class="form-control"  name="relacionFa1" required>
           </div>
         </div>
       </div>
 
     </div>
 
  </div>

  <div class="tab">
    <div class="container">
      <h1 class="title has-text-centered">Input Dinámico</h1>
      <div id="jsonDiv">
          
      </div>
      <!-- <form action="" id="frmUsers">
          <label class="label">Username</label>
          <div class="field is-grouped">
              <div class="control has-icons-left">
                <input class="input" name="name" id="name" type="text" placeholder="Name" autocomplete="off">
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <div class="control has-icons-left">
                  <input class="input" name="lastName"  id="lastName" type="text" placeholder="Lastname" autocomplete="off">
                  <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                  </span>
                </div>
                <div class="control">
                  <button id="btnAdd" type="button" class="button is-danger">
                      <span class="icon">
                          <i class="fas fa-plus"></i>
                      </span>
                    </button>
                </div>
                <div class="control">
                  <button id="btnSave" type="button" class="button is-info">
                      Save
                    </button>
                </div>
          </div>
      </form> -->
      <hr>
      <div id="divElements">

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
    const $form = document.getElementById("frmUsers")
    const $divElements = document.getElementById("divElements")
    const $btnSave = document.getElementById("btnSave")
    const $btnAdd = document.getElementById("btnAdd")

    const templateElement = (data, position) => {
        return (`
            <button class="delete" onclick="removeElement(event, ${position})"></button>
            <strong>User - </strong> ${data}
        `)
    }
    $btnAdd.addEventListener("click", (event) => {
      var v1 = document.getElementById("name").value;
      var v2 = document.getElementById("lastName").value;

        if( v1 != "" && v2  != ""){
            let index = addJsonElement({
                name: document.getElementById("name").value,
                lastName: document.getElementById("lastName").value
            })
            const $div = document.createElement("div")
            $div.classList.add("notification", "is-link", "is-light", "py-2", "my-1")
            $div.innerHTML = templateElement(`"xdxd"${v1} ${v2}`, index)
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
        $.post('json.php', {
              v1: JSON.stringify(parameters),
            }, (response) => {
              // response from PHP back-end
              console.log(response);
            });
        $divElements.innerHTML = ""
        parameters = []
    })


})()


  </script>


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

  <button type="submit" class="btn btn-default">Guardar</button>

</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      nextBtn.addEventListener('click', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

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