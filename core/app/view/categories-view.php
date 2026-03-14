<?php 
if(!isset($_SESSION["user_id"])){ Core::redir("./");}
$user= UserData::getById($_SESSION["user_id"]);
if($user==null){ Core::redir("./");}

if(isset($_GET["opt"]) && $_GET["opt"]=="all"):?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">Lista de Categorías</h2>
      </div>
      <div class="">
        <div class="btn-list">
          <a href="./?view=categories&opt=new" class="btn btn-primary">
            <i class='bi bi-plus'></i> Nueva Categoría
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-status-top bg-primary"></div>
      <div class="card-header">
        <h3 class="card-title"><i class="bi bi-tags"></i> Categorías</h3>
      </div>
      <div class="card-body">
        
    <?php
    $categories = CategoryData::getAll();
    if(count($categories)>0){
    ?>
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable">
          <thead>
            <tr>
              <th>Nombre</th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach($categories as $cat):
          ?>
            <tr>
              <td><?php echo htmlspecialchars($cat->name); ?></td>
              <td>
                <div class="btn-list flex-nowrap">
                  <a href="./?view=categories&opt=edit&id=<?php echo $cat->id;?>" class="btn btn-warning btn-sm"><i class="bi-pencil"></i></a>
                  <a href="./?action=categories&opt=del&id=<?php echo $cat->id;?>" class="btn btn-danger btn-sm"><i class="bi-trash"></i></a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
          </div>
      </div>
    <?php }else{ ?>
      <div class="card-body">
        <p class="alert alert-warning mb-0">No hay categorías.</p>
      </div>
    <?php } ?>
    </div>
  </div>
</div>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="new"):?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">Agregar Categoría</h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-status-top bg-success"></div>
      <div class="card-header">
        <h3 class="card-title">Nueva Categoría</h3>
      </div>
      <div class="card-body">
        <form method="post" action="./?action=categories&opt=add">
          <div class="mb-3">
            <label class="form-label">Nombre*</label>
            <input type="text" name="name" class="form-control" required placeholder="Nombre">
          </div>
          <div class="form-footer mt-4">
            <button type="submit" class="btn btn-primary w-100">Agregar Categoría</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="edit"):?>
<?php $cat = CategoryData::getById($_GET["id"]);?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">Editar Categoría</h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-status-top bg-info"></div>
      <div class="card-header">
        <h3 class="card-title">Editar Categoría</h3>
      </div>
      <div class="card-body">
        <form method="post" action="./?action=categories&opt=upd">
          <div class="mb-3">
            <label class="form-label">Nombre*</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($cat->name);?>" class="form-control" required placeholder="Nombre">
          </div>
          <div class="form-footer mt-4">
            <input type="hidden" name="cat_id" value="<?php echo $cat->id;?>">
            <button type="submit" class="btn btn-success w-100">Actualizar Categoría</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
