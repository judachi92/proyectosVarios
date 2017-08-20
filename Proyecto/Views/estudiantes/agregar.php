<div class="box-principal">
    <h3 class="titulo"> Agregar Estudiantes</h3>

    <?php if(count($datos["datos_respuesta"]) > 0){
        $datos_respuesta = $datos["datos_respuesta"];
        if($datos_respuesta["codigo_respuesta"] == 1){ ?>
    <div class="alert alert-success">
        <?php }elseif($datos_respuesta["codigo_respuesta"] == 2){ ?>
        <div class="alert alert-danger">
            <?php }elseif($datos_respuesta["codigo_respuesta"] == 3){ ?>
            <div class="alert alert-warning">
                <?php } ?>
                <?php echo $datos_respuesta["mensaje_respuesta"]?>
            </div>
            <?php } ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Agregar un nuevo Estudiante</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Nombre del Estudiante</label>
                            <input class="form-control" name="estudiante_nombrecompleto" id="estudiante_nombrecompleto" type="text" required />
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Numero de Documento</label>
                            <input class="form-control" name="estudiante_documento" id="estudiante_documento" type="number" required />
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Edad</label>
                            <input class="form-control" name="estudiante_edad" id="estudiante_edad" type="number" required />
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Fecha Nacimiento</label>
                            <input class="form-control" name="estudiante_fechanacimiento" id="estudiante_fechanacimiento" type="date" required />
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Promedio</label>
                            <input class="form-control" name="estudiante_promedio" id="estudiante_promedio" type="text" required />
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Seccion</label>
                            <select class="form-control" name="seccion_codigo" id="seccion_codigo" required>
                                <?php foreach ($datos["datos_secciones"]  as $seccion){ ?>
                                    <option value="<?php echo $seccion->getSeccionCodigo();?>"><?php echo $seccion->getSeccionNombre();?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Imagen</label>
                            <input class="form-control" name="estudiante_imagen" id="estudiante_imagenurl" type="file" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Registrar</button>
                            <button type="reset" class="btn btn-warning">Borrar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>