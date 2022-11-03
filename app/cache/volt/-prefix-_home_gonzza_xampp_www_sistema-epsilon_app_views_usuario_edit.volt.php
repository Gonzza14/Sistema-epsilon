               
               <form action="<?= $this->url->get('usuario/update') ?>" class="form-horizontal" method="POST">
                <div class="form-group">
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id" value="<?= $id ?>" required>
                  </div>
                </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nombre" autocomplete="off" placeholder="Ingrese nombre" value="<?= $nombre ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Correo:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="correo" autocomplete="off" placeholder="Ingrerse correo" value="<?= $correo ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="role" class="control-label col-sm-2" >Rol de usuario</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="idRol" id="role">
                        <option value="<?= $rol ?>"><?= $rol ?></option>
                        <?php foreach ($roles as $role) { ?>
                        <option value="<?= $role->IDROL ?>"><?= $role->IDROL ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Guardar registro</button>
                    </div>
                  </div>
                </form>