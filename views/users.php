<div class="container-fluid">

    <div class="card shadow mb-4">
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Usuários</h6>
        </a>
        <div class="collapse show" id="collapseCardExample" style="">
            <div class="card-body">
                <a href="<?= BASE_URL ?>/users/add" style="margin: 15px;" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Adicionar usuários</span>
                </a>

                <table class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Grupo de Permissões</th>
                            <th width="160">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          foreach($users_list as $us) {
                        ?>
                        <tr>
                          <td><?= $us['email'] ?></td>
                          <td><b><?= $us['name'] ?></b></td>
                          <td>
                              <a href="<?= BASE_URL ?>/users/editgroup/<?= $us['id'] ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                              <a href="#" data-attr-id="<?= $us['id'] ?>" class="btn btn-danger btn-circle btn-group"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php 
                          }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

