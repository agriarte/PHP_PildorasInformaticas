<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Pregunta&a=Crud">Nueva Pregunta Frecuente</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th style="width:120px;">Sexo</th>
            <th style="width:120px;">Nacimiento</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Id; ?></td>
            <td><?php echo $r->Titulo; ?></td>
            <td><?php echo $r->Fecha; ?></td>
            <td><?php echo $r->Comentario; ?></td>
            <td><?php echo $r->Fichero; ?></td>
            <td>
                <a href="?c=Pregunta&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Pregunta&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

