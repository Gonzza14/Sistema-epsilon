
<?php 
include "db_config.php"; 
?>

<div class="container"> 
  <div class="row">
    <div class="row py-lg-4">
      <div class="col-sm-12">
          <h2>Creando nuevo monto a pagar:</h2>
      </div>
    </div>
  </div>              
  <form action="<?= $this->url->get('concepto/store') ?>" class="form-horizontal" method="POST">
    <div class="form-group">

      <label class="control-label col-sm-12" for="nama">Concepto:</label>
      <div class="col-sm-10">
        <?php
              $result = mysqli_query($conn,"Select idPago from pago order by idPago DESC LIMIT 1");
              while($row =mysqli_fetch_array($result)){
                ?>
        <input type="text" class="form-control" autocomplete="off" value="<?php echo $row['idPago']; ?>"name="concepto" placeholder="Ingrese nombre del monto a pagar"  required>
      <?php
      }
      ?>
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
