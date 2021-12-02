<?=$header?>
    Formulario Crear Empleados
    <?php if(session('msj')){ ?>
        <div class="alert alert-danger" role="alert">
            <strong>
                <?php echo session('msj');?>
            </strong>
        </div>
    <?php } ?>        

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Ingresar datos del Empleado</h4>
        <p class="card-text">
            <form action="<?=base_url('/guardar');?>" method="POST">
            <div class="form-group">
            <label for="fecha_ing">Fecha de Ingreso</label>
            <input type="date" name="fecha_ing" id="fecha_ing" class="form-control" value="<?=old('fecha_ing');?>" placeholder="Fecha de Ingreso" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Fecha de Ingreso</small>
            </div>
            <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control" name="nombres" id="nombres" aria-describedby="helpId" value="<?=old('nombres');?>" placeholder="Nombres y Apellidos">
            <small id="helpId" class="form-text text-muted">Nombres y Apellidos</small>
            </div>
            <div class="form-group">
            <label for="salario">Salario</label>
            <input type="number"
                class="form-control" name="salario" id="salario" aria-describedby="helpId" value="<?=old('salario');?>" placeholder="Salario">
            <small id="helpId" class="form-text text-muted">Salario o Sueldo, honorarios</small>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </p>
    </div>
</div>
<?=$footer?>