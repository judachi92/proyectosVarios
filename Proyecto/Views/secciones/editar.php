<div class="box-principal">
    <h3 class="titulo">Editar Seccion <?php echo ucwords(strtolower($datos["datos_seccion"]->getSeccionNombre()))  ;?></h3>

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
                    <h3 class="panel-title">Editar Seccion <?php echo ucwords(strtolower($datos["datos_seccion"]->getSeccionNombre()))  ;?></h3>
                </div>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-md-1"></div>

                        <div class="col-md-10">
                            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Codigo</label>
                                    <input class="form-control" name="seccion_codigo" id="seccion_codigo" type="text" disabled value="<?php echo $datos["datos_seccion"]->getSeccionCodigo();?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Nombre de la Seccion</label>
                                    <input class="form-control"  name="seccion_nombre" id="seccion_nombre" type="text" required value="<?php echo $datos["datos_seccion"]->getSeccionNombre();?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Fecha Creaci&oacute;n</label>
                                    <input class="form-control"  name="seccion_fechacreacion" id="seccion_fechacreacion" type="date" disabled  value="<?php echo $datos["datos_seccion"]->getSeccionFechacreacion();?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Fecha Modificaci&oacute;n</label>
                                    <input class="form-control"  name="seccion_fechamodificacion" id="seccion_fechamodificacion" type="date" disabled  value="<?php echo $datos["datos_seccion"]->getSeccionFechamodificacion();?>"/>
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