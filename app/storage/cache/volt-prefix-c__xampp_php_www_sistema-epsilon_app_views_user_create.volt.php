               
               <form action="<?= $this->url->get('user/store') ?>" class="form-horizontal" method="POST">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="username">Username:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                    <input type="hidden" class="form-control" name="id" value="<?= $id ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="nama">Nama:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Enter nama"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Guardar</button>
                  </div>
                </div>
              </form>