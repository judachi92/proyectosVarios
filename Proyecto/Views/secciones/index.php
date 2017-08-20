<div class="box-principal">
    <h3 class="titulo">Listado de Secciones</h3><br>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Listado de Secciones</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($datos as $seccion)
                {
                    echo "<tr>";
                    echo "<td>".$seccion->getSeccionCodigo()."</td>";
                    echo "<td>".$seccion->getSeccionNombre()."</td>";
                    echo "<td>
                            <a class='btn btn-warning' href='".URL."secciones/editar/".$seccion->getSeccionCodigo()."'>Editar</a>
                           </td>";
                    echo "<td>
                            <a class='btn  btn-danger' href='".URL."secciones/eliminar/".$seccion->getSeccionCodigo()."'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
