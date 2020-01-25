<div class="container-fluid">
      <?php 
        if(isset($error_msg) && !empty($error_msg)) {
            ?>
        <div class="card mb-4 py-3 border-bottom-danger">
            <div class="card-body">
                <?= $error_msg ?>
            </div>
        </div>
    <?php
        }
    ?>
  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Adicionar usuários</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample" style="">
      <div class="card-body">
         <form method = "POST" >
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="permission_title">E-mail</label>
              <input type="email" require class="form-control" id="users_email" name = "users_email" placeholder="Digite o nome da permissão...">
            </div>
            <div class="form-group col-md-6">
              <label for="permission_title">Senha</label>
              <input type="password" class="form-control" id="users_password" name = "users_password" placeholder="Digite sua senha...">
            </div>
          </div>

          <div class = "form-row">
            <div class="form-group col-md-6">
            <label for="permission_title">Definir grupo</label>
            <select class="custom-select" id = "users_group" name = "users_group">
              <?php 
                foreach ($group_list as $g) {
                    ?>
                <option value="<?= $g['id'] ?>"><?= $g['name'] ?></option>
              <?php
                }
              ?>
            </select>
            </div>
          </div>

          <button type="submit" class="btn btn-success">Adicionar</button>
          <button type="reset" class="btn btn-warning">Limpar</button>
        </form>
      </div>
    </div>
  </div>
</div>