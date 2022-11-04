<?php 
include "db_config.php";
?>  

<?
function buscar() {
  $result = mysqli_query($conn,"Select idPago from pago order by idPago DESC LIMIT 1");
  return $result;
}
?>

<div class="container"> 
  <div class="row">
    <div class="row py-lg-4">
      <div class="col-sm-12">
          <h2>Detalle de cobro:</h2>
      </div>
    </div>
  </div>              
    <div class="form-group">
      <label class="control-label col-sm-12" for="nama">Concepto:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="idPago" autocomplete="off" name="concepto" placeholder="Ingrese nombre del monto a pagar"  required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-12" for="email">Monto: ($)</label>
      <div class="col-sm-10">
        <input type="number" step="0.01"  min="0"  class="form-control"  autocomplete="off" name="monto" placeholder="Ingrese monto en dólares" required>
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
                Guardar monto a pagar
                </button>
            </span>
      </div>
  </div>
</div>

  </form>
</div>   


<script>
window.onload = function(){

  //var result = <?php echo buscar();?>
  document.getElementById('fechaPago').value=result;
}
</script>