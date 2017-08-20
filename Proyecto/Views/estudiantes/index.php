<div class="box-principal">
    <h3 class="titulo">Listado de Estudiantes</h3><br>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Listado de Estudiantes</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre Completo</th>
                        <th>Documento</th>
                        <th>Fecha Nacimiento</th>
                        <th>Seccion</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row = pg_fetch_array($datos))
                {
                    echo "<tr>";
                    echo "<td>
                            <a target='_blank' href=".URL."Views/template/imagenes/estudiantes/".$row['estudiante_imagenurl'].">
                            <img class='imagen_estudiante' src=".URL."Views/template/imagenes/estudiantes/".$row['estudiante_imagenurl']." >
                            </a>
                          </td>";

                    echo "<td>".$row['estudiante_nombrecompleto']."</td>";
                    echo "<td>".$row['estudiante_documento']."</td>";
                    echo "<td>".$row['estudiante_fechanacimiento']."</td>";
                    echo "<td>".$row['seccion_nombre']."</td>";

                    echo "<td>
                            <a class='btn btn-warning' href='".URL."estudiantes/editar/".$row['estudiante_codigo']."'>Editar</a>
                           </td>";
                    echo "<td>
                            <a class='btn  btn-danger' href='".URL."estudiantes/eliminar/".$row['estudiante_codigo']."'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
