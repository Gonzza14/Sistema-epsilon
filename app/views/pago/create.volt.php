<div class="container"> 
  <div class="row">
    <div class="row py-lg-4">
      <div class="col-sm-12">
          <h2>Registrando Pago:</h2>
      </div>
    </div>
  </div>              
  <form action="<?= $this->url->get('pago/store') ?>" class="form-horizontal" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-12" for="nama">Id de asociado:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" autocomplete="off" name="idAsociado" placeholder="Ingrese el ID del asociado"  required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-12" for="email">Fecha de pago:</label>
      <div class="col-sm-10">
        <input type="date" class="form-control"  autocomplete="off"  id= "fechaPago" name="fechaPago" placeholder="Ingrese monto en dólares" required>
      </div>
    </div> 
    <div class="row">
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
            <button type="submit" class="btn btn-success btn-lg btn-block" value="Guardar" name="action">
                <i class="fa fa-save fa-fw">
                    <span class="sr-only">
                      Guardar monto a pagar
                    </span>
                </i>
                Guardar nuevo pago
                </button>
            </span>
      </div>
  </div>
</div>

  </form>
</div>   

<script>
window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fechaPago').value=ano+"-"+mes+"-"+dia;
}

</script>