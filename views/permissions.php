<?php 
    if(!isset($_GET['a']) || empty($_GET['a'])) {
        $_GET['a'] = '0';
    }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link  <?= ($_GET['a'] == 0) ? "active" : "" ?>" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Grupos de permissões</a>
                    <a class="nav-item nav-link <?= ($_GET['a'] == 1) ? "active" : "" ?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Permissões</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade <?= ($_GET['a'] == 0) ? "show active" : "" ?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <a href="<?= BASE_URL ?>/permission/add_group"  style="margin: 15px;" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Adicionar grupo</span>
                  </a>
                  
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome do Grupo de Permissões</th>
                                <th width="160">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                    foreach($permissions_groups_list as $p) {
                                ?>
                            <tr>
                                <td>
                                    <?= $p['name'] ?>
                                </td>
                                <td>
                                    <a href="<?= BASE_URL ?>/permission/editgroup/<?= $p['id'] ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                    <a href="#"  data-attr-id = "<?= $p['id'] ?>" class="btn btn-danger btn-circle btn-group"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php 
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade <?= ($_GET['a'] == 1) ? "show active" : "" ?>"  id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <a href="<?= BASE_URL ?>/permission/add"  style="margin: 15px;" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Adicionar permissões</span>
                    </a>
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome de permissões</th>
                                <th width="80">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                    foreach($permissions_list as $p) {
                                ?>
                            <tr>
                                <td>
                                    <?= $p['name'] ?>
                                </td>
                                <td><a href="#" data-attr-id = "<?= $p['id'] ?>" class="btn btn-danger btn-circle btn-perm"><i class="fas fa-trash"></i></a></td>
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
</div>

<div class="modal fade" id="confirm_action" tabindex="-1" role="dialog" aria-labelledby="confirm_action_group" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletar registro?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja deletar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <a class="btn btn-danger" id = "btn-delete-perm" href="">Deletar</a>
            </div>
        </div>
    </div>
</div>

<script src="<?= BASE_URL ?>/assets/js/tabs.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/components/modal.js"></script>