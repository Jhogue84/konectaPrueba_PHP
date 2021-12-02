<?=$header?>

Listado de Solicitudes
    <table class="table table-striped table-inverse table-responsive">
        <caption>Listado de Solicitudes</caption>
        <thead class="thead-inverse">
            <tr>
                <th>Id</th>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Resumen</th>
                <th>Empleado</th>
                <th>
                    <a class="btn btn-primary" href="<?=base_url('crearSol')?>" role="button">Adicionar Solicitud</a>
                </th>
            </tr>
            </thead>
            <tbody>
                
                <?php foreach($solicitudes as $item): ?> 
                <tr>
                    <td scope="row"><?=$item['id']?></td>
                    <td><?=$item['codigo']?></td>
                    <td><?=$item['descripcion']?></td>
                    <td><?=$item['resumen']?></td>
                    <td>
                        <?php foreach( $empleados as $empleado):
                            if ($item['id_empleado'] == $empleado['id']) echo $empleado['nombres'];
                        endforeach;
                        ?>
                    </td>
                    <td>
                        <a href="<?=base_url('editarSol/'.$item['id'])?>" class="btn btn-warning">Editar</a>
                        <a href="<?=base_url('eliminarSol/'.$item['id'])?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
    </table>
<?=$footer?>