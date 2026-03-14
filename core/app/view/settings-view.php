<?php if(isset($_GET["opt"]) && $_GET["opt"]=="all"):?>
<?php
$settings = SettingData::getAll();
?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">Ajustes Generales</h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="./?view=settings&opt=new" class="btn btn-primary">
            <i class="bi bi-plus"></i> Nueva Variable
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Ajustes Generales</h3>
      </div>
      <form method="post" action="./?action=settings&opt=update">
        <div class="table-responsive">
          <table class="table card-table table-vcenter">
            <tbody>
            <?php if(count($settings)>0):?>
            <?php foreach($settings as $cat):?>
              <tr>
                <td class="w-50"><?php echo $cat->label; ?></td>
                <td>
                  <input type="text" name="<?php echo $cat->name; ?>" class="form-control" value="<?php echo htmlspecialchars($cat->val);?>">
                </td>
              </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer text-end">
          <button type="submit" class="btn btn-success">Actualizar Ajustes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="new"):?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">Nueva Variable en Ajustes</h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-body">
        <form method="post" action="./?action=settings&opt=add">
          <div class="mb-3">
            <label class="form-label">Nombre corto / slug</label>
            <input type="text" required name="name" class="form-control" placeholder="Nombre corto /slug">
          </div>
          <div class="mb-3">
            <label class="form-label">Nombre / Etiqueta</label>
            <input type="text" required name="label" class="form-control" placeholder="Nombre / Etiqueta">
          </div>
          <div class="mb-3">
            <label class="form-label">Valor</label>
            <input type="text" required name="val" class="form-control" placeholder="Valor">
          </div>
          <div class="form-footer mt-4">
            <button type="submit" class="btn btn-primary w-100">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>