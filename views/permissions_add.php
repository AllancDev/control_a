<div class="container-fluid">
  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Adicionar Permissões</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample" style="">
      <div class="card-body">
         <form method = "POST" >
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="permission_title">Nome da permissão</label>
              <input type="text" class="form-control" id="permission_title" name = "permission_title" placeholder="Digite o nome da permissão...">
            </div>
          </div>

          <button type="submit" class="btn btn-success">Adicionar</button>
          <button type="reset" class="btn btn-warning">Limpar</button>
        </form>
      </div>
    </div>
  </div>
</div>
