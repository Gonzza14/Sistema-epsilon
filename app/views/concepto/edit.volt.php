<div class="container"> 
  <div class="row">
    <div class="row py-lg-4">
      <div class="col-sm-12">
          <h2>Modificando monto a pagar:</h2>
      </div>
    </div>
  </div>              
  <form action="<?= $this->url->get('concepto/update') ?>" class="form-horizontal" method="POST">
    <div class="form-group">
      <div class="col-sm-10">
        <input type="hidden" class="form-control" name="idConcepto" value="<?= $idConcepto ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-12" for="nama">Concepto:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" autocomplete="off" value="<?= $concepto ?>" name="concepto" placeholder="Ingrese nombre del monto a pagar"  required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-12" for="email">Monto: ($)</label>
      <div class="col-sm-10">
        <input type="number" step="0.01"  min="0"  class="form-control"  value="<?= $monto ?>" autocomplete="off" name="monto" placeholder="Ingrese monto en dólares" required>
      </div>
    </div> 
    <div class="row">
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
            <button type="submit" class="btn btn-success btn-lg btn-block" value="Guardar" name="action">
                <i class="fa fa-save fa-fw">
                    <span class="sr-only">
                      Actualizar monto a pagar
                    </span>
                </i>
                Actualizar monto a pagar
                </button>
            </span>
      </div>
  </div>
</div>

  </form>
</div>                  
            






