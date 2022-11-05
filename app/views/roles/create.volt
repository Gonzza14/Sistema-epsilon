               
               <form action="{{url ("roles/store")}}" class="form-horizontal" method="POST">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="nama">Nombre del rol:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" autocomplete="off" name="id" placeholder="Ingrese nombre"  required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Guardar</button>
                  </div>
                </div>
              </form>