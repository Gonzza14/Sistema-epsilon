               
               <form action="{{url ("roles/update")}}" class="form-horizontal" method="POST">
                <div class="form-group">
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id" value="{{id}}" required>
                  </div>
                  <div class="col-sm-10">
                    <label class="control-label col-sm-2" for="idRol">Nombre del rol:</label>
                    <input type="text" class="form-control" name="idRol" value="{{idRol}}" required>
                  </div>
                </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Guardar registro</button>
                    </div>
                  </div>
                </form>