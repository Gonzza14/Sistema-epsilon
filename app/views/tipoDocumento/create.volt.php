<div class="container"> 
  <div class="row">
    <div class="row py-lg-4">
      <div class="col-sm-12">
          <h2>Creando tipos de documentos</h2>
      </div>
    </div>
  </div>              
  <form action="<?= $this->url->get('tipoDocumento/store') ?>" class="form-horizontal" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-12" for="nama">Nombre del documento:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" autocomplete="off" name="nombreTipoDoc" placeholder="Ingrese nombre del documento"  required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-12" for="email">Máscara:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  autocomplete="off" name="mascara" placeholder="Ingrese máscara" required>
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-12" for="email">Tipo:</label>
      <div class="col-sm-10">
        <select class="extranjeroTipoDoc form-control" name="extranjeroTipoDoc" id="extranjeroTipoDoc" value="">
          <option selected='true' disabled='disabled'>Seleccionar tipo</option>
            <option value="0">Documento Nacional</option>
            <option value="1">Documento Extranjero</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
            <button type="submit" class="btn btn-success btn-lg btn-block" value="Guardar" name="action">
                <i class="fa fa-save fa-fw">
                    <span class="sr-only">
                      Guardar tipo documento
                    </span>
                </i>
                Guardar tipo documento
                </button>
            </span>
      </div>
  </div>
</div>

  </form>
</div>   