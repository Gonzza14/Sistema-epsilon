
<div class="container">  
  <div class="row">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Ingrese sus documentos</h3>
          </div>
          <div class="card-body">
            <form  action="../upload.php"  method="post" enctype="multipart/form-data">
              <input type="hidden" value="<?= $this->session->get('AUTH')['id'];?>" id="usuario" name="usuario">
              <p>Archivos:</p>
              <div>
                  <input type="file" class="form-control" name="Filename"> 
              </div>
              <p><br></p>
              <div>
                  <p>Descripción</p>
                  <textarea class="form-control" rows="5" cols="12" name="Description"></textarea>
                  <br/>
                  <input class="btn btn-primary" type="submit" name="upload" value="Enviar"/>
              </div>
              
          </form>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>

</div>
