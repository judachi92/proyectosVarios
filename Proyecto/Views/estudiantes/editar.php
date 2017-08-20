<div class="box-principal">
    <h3 class="titulo">Editar Estudiante <?php echo ucwords(strtolower($datos["datos_estudiante"]->getEstudianteNombrecompleto()))  ;?></h3>

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
            <h3 class="panel-title">Editar Estudiante <?php echo ucwords(strtolower($datos["datos_estudiante"]->getEstudianteNombrecompleto()))  ;?></h3>
        </div>
        <div class="panel panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a target='_blank' href="<?php echo URL;?>Views/template/imagenes/estudiantes/<?php echo $datos["datos_estudiante"]->getEstudianteImagenurl();?>">
                                <img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/estudiantes/<?php echo $datos["datos_estudiante"]->getEstudianteImagenurl();?>">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Nombre del Estudiante</label>
                            <input class="form-control" name="estudiante_nombrecompleto" id="estudiante_nombrecompleto" type="text" required value="<?php echo $datos["datos_estudiante"]->getEstudianteNombrecompleto();?>">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Numero de Documento</label>
                            <input class="form-control"  name="estudiante_documento" id="estudiante_documento" type="number" disabled  value="<?php echo $datos["datos_estudiante"]->getEstudianteDocumento();?>"/>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Edad</label>
                            <input class="form-control" name="estudiante_edad" id="estudiante_edad" type="number" required value="<?php echo $datos["datos_estudiante"]->getEstudianteEdad();?>"/>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Fecha Nacimiento</label>
                            <input class="form-control" name="estudiante_fechanacimiento" id="estudiante_fechanacimiento" type="date" required value="<?php echo $datos["datos_estudiante"]->getEstudianteFechanacimiento();?>"/>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Promedio</label>
                            <input class="form-control" name="estudiante_promedio" id="estudiante_promedio" type="text" required value="<?php echo $datos["datos_estudiante"]->getEstudiantePromedio();?>" />
                        </div>
                        <div class="form-group">
                            <label for="inputSeccion" class="control-label">Seccion </label>
                            <select class="form-control" name="seccion_codigo" id="seccion_codigo" required >
                                <?php foreach ($datos["datos_secciones"]  as $seccion){ ?>

                                    <?php if( $seccion->getSeccionCodigo() == $datos["datos_estudiante"]->getSeccionCodigo() ) { ?>
                                    <option value="<?php echo $seccion->getSeccionCodigo();?>" selected>
                                    <?php }else{ ?>
                                        <option value="<?php echo $seccion->getSeccionCodigo();?>">
                                    <?php } ?>
                                        <?php echo $seccion->getSeccionNombre();?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Imagen</label>
                            <input class="form-control" name="estudiante_imagen" id="estudiante_imagenurl" type="file" />
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Fecha Creaci&oacute;n</label>
                            <input class="form-control"  name="estudiante_fechacreacion" id="estudiante_fechacreacion" type="date" disabled  value="<?php echo $datos["datos_estudiante"]->getEstudianteFechacreacion();?>"/>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Fecha Modificaci&oacute;n</label>
                            <input class="form-control"  name="estudiante_fechamodificacion" id="estudiante_fechamodificacion" type="date" disabled  value="<?php echo $datos["datos_estudiante"]->getEstudianteFechamodificacion();?>"/>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Editar</button>
                            <button type="reset" class="btn btn-warning">Borrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>