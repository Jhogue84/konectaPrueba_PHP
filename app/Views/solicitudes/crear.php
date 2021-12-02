<?=$header?>
    Formulario Crear Solicitudes
    <?php if(session('msj')){ ?>
        <div class="alert alert-danger" role="alert">
            <strong>
                <?php echo session('msj');?>
            </strong>
        </div>
    <?php } ?>        

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Ingresar datos de la Solicitud</h4>
        <p class="card-text">
            <form action="<?=base_url('/guardarSol');?>" method="POST">
            <div class="form-group">
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="<?=old('codigo');?>" placeholder="Codigo de la solicitud" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Codigo de la Solicitud</small>
            </div>
            <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" value="<?=old('descripcion');?>" placeholder="Descripcion de la solicitud">
            <small id="helpId" class="form-text text-muted">Descripcion, detalle de la solicitud</small>
            </div>
            <div class="form-group">
            <label for="resumen">Resumen</label>
            <input type="text"
                class="form-control" name="resumen" id="resumen" aria-describedby="helpId" value="<?=old('resumen');?>" placeholder="Resumen de la solicitud">
            <small id="helpId" class="form-text text-muted">Resumen de la solicitud</small>
            </div>
            <div class="form-group">
              <label for="id_empleado">Empleado</label>
              <select class="form-control" name="id_empleado" id="id_empleado">
                <option value="0">Seleccione un Empleado</option>
                <?php foreach ($empleados as $item): ?>
                    <option value="<?=$item['id']?>"><?=$item['nombres']?></option>
                <?php endforeach ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </p>
    </div>
</div>
<?=$footer?>