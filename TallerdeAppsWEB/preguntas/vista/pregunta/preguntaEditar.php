<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->Pregunta : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Pregunta">Preguntas</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Titulo : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-pregunta" action="?c=Pregunta&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Titulo" value="<?php echo $alm->Titulo; ?>" class="form-control" placeholder="Titulo" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Fecha</label>
        <input type="text" name="Fecha" value="<?php echo $alm->Fecha; ?>" class="form-control" placeholder="Fecha" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Comentario</label>
        <input type="text" name="Comentario" value="<?php echo $alm->Comentario; ?>" class="form-control" placeholder="Comentario" data-validacion-tipo="requerido" />
    </div>
    
    
    <div class="form-group">
        <label>Archivo:</label>
        <input readonly type="text" name="Archivo" value="<?php echo $alm->Archivo; ?>" class="form-control" placeholder="Archivo" data-validacion-tipo="requerido" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-pregunta").submit(function(){
            return $(this).validate();
        });
    })
</script>
