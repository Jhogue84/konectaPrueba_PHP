<?=$header?>
Listado de Empleados
    <table class="table table-striped table-inverse table-responsive">
        <caption>Listado de empleados</caption>
        <thead class="thead-inverse">
            <tr>
                <th>Id</th>
                <th>Fecha Ingreso</th>
                <th>Nombres</th>
                <th>Salario</th>
                <th>
                    <a class="btn btn-primary" href="<?=base_url('crear')?>" role="button">Adicionar Empleado</a>
                </th>
            </tr>
            </thead>
            <tbody>
                
                <?php foreach($empleados as $item): ?> 
                <tr>
                    <td scope="row"><?=$item['id']?></td>
                    <td><?=$item['fecha_ing']?></td>
                    <td><?=$item['nombres']?></td>
                    <td><?=$item['salario']?></td>
                    <td>
                        <a href="<?=base_url('editar/'.$item['id'])?>" class="btn btn-warning">Editar</a>
                        <a href="<?=base_url('eliminar/'.$item['id'])?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
    </table>
<?=$footer?>