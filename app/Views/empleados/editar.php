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
        <h4 class="card-title">Editar datos del Empleado</h4>
        <p class="card-text">
            <form action="<?=base_url('/actualizar')?>" method="POST">
            <input type="hidden" name="id" value="<?=$empleado['id']?>">
            <div class="form-group">
            <label for="fecha_ing">Fecha de Ingreso</label>
            <input type="date" name="fecha_ing" id="fecha_ing" class="form-control" value="<?=$empleado['fecha_ing']?>" placeholder="Fecha de Ingreso" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Fecha de Ingreso</small>
            </div>
            <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control" name="nombres" id="nombres" aria-describedby="helpId" value="<?=$empleado['nombres']?>"placeholder="Nombres y Apellidos">
            <small id="helpId" class="form-text text-muted">Nombres y Apellidos</small>
            </div>
            <div class="form-group">
            <label for="salario">Salario</label>
            <input type="number"
                class="form-control" name="salario" id="salario" aria-describedby="helpId" value="<?=$empleado['salario']?>" placeholder="Salario">
            <small id="helpId" class="form-text text-muted">Salario o Sueldo, honorarios</small>
            </div>
            <button type="submit" class="btn btn-warning">Editar</button>
            <a href="<?=base_url('/listar')?>" class="btn btn-info">Cancelar</a>
            
        </form>
        </p>
    </div>
</div>

<?=$footer?>