<?=$header?>
<?php if(session('msj')){ ?>
        <div class="alert alert-danger" role="alert">
            <strong>
                <?php echo session('msj');?>
            </strong>
        </div>
    <?php } ?> 
<div class="card">
    <img class="card-img-top" src="holder.js/100x180/" alt="">
    <div class="card-body">
        <h4 class="card-title">Editar datos de la Solicitud</h4>
        <p class="card-text">
            <form action="<?=base_url('/actualizarSol')?>" method="POST">
            <input type="hidden" name="id" value="<?=$solicitud['id']?>">
            <div class="form-group">
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="<?=$solicitud['codigo']?>" placeholder="Codigo" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Fecha de Ingreso</small>
            </div>
            <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" value="<?=$solicitud['descripcion']?>"placeholder="Descripcion">
            <small id="helpId" class="form-text text-muted">Descripcion y detalles</small>
            </div>
            <div class="form-group">
            <label for="resumen">Resumen</label>
            <input type="text"
                class="form-control" name="resumen" id="resumen" aria-describedby="helpId" value="<?=$solicitud['resumen']?>" placeholder="Resumen">
            <small id="helpId" class="form-text text-muted">Resumen</small>
            </div>
            <div class="form-group">
              <label for="id_empleado">Empleado</label>
              <select class="form-control" name="id_empleado" id="id_empleado">
                <option value="0">Seleccione un Empleado</option>
                <?php foreach ($empleados as $item):
                    if ($solicitud['id_empleado'] == $item['id']) $selected="selected=selected";
                    else $selected=""; 
                ?>
                    <option value="<?=$item['id']?>" <?=$selected?> ><?=$item['nombres']?></option>
                <?php endforeach ?>
              </select>
            </div>
            <button type="submit" class="btn btn-warning">Editar</button>
            <a href="<?=base_url('/listarSol')?>" class="btn btn-info">Canelar</a>
        </form>
        </p>
    </div>
</div>

<?=$footer?>