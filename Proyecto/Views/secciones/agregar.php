<div class="box-principal">
    <h3 class="titulo"> Agregar Seccion</h3>
    <?php if(count($datos) > 0){ ?>
        <?php if($datos["codigo_respuesta"] == 1){ ?>
                <div class="alert alert-success">
        <?php }elseif($datos["codigo_respuesta"] == 2){ ?>
                <div class="alert alert-danger">
        <?php }elseif($datos["codigo_respuesta"] == 3){ ?>
                <div class="alert alert-warning">
        <?php } ?>
            <?php echo $datos["mensaje_respuesta"]?>
        </div>
    <?php } ?>
    <div class="panel panel-primary">

        <div class="panel-heading">
            <h3 class="panel-title">Agregar un nueva Seccion</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-1"></div>

                <div class="col-md-10">
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Nombre de la Session</label>
                            <input class="form-control" name="session_nombre" id="session_nombre" type="text" required />
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