<?php global $ruta?>
<div class="row pb-4">
    <div class="col-12 pt-4 text-end">
        <div class="form-group row">
            <div class="col-12">
                <a style="color:white;text-decoration:none;" href="<?php echo $ruta ?>employee/create/"><i class="fas fa-user-plus"><button type="submit" class="btn btn-primary-gm"></i> Crear</button></a>
            </div>
        </div>
    </div>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col"><i class="fas fa-user"></i> Nombre</th>
            <th scope="col"><i class="fas fa-at"></i> email</th>
            <th scope="col"><i class="fas fa-venus-mars"></i> Sexo</th>
            <th scope="col"><i class="fas fa-briefcase"></i> Area</th>
            <th scope="col"><i class="far fa-edit"></i> Boletín</th>
            <th scope="col" class="text-center">Modificar</th>
            <th scope="col" class="text-center">Eliminar</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach($employeeList as $employee){?>
        <tr>
            <th scope="row"><?php echo $employee ->name; ?></th>
            <td><?php echo $employee ->email; ?></td>
            <td><?php echo $employee ->sex; ?></td>
            <td><?php echo $employee ->area_id; ?></td>
            <td><?php echo $employee ->boletin; ?></td>
            <td class="text-center"><a style="color:black" href="<?php echo $ruta ?>employee/update/<?php echo $employee -> id;?>"><i class="far fa-edit"></i></a></td>
            <td class="text-center"><a style="color:black" href="<?php echo $ruta ?>employee/update/<?php echo $employee -> id;?>"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    <?php }?>
       
    </tbody>
</table>
