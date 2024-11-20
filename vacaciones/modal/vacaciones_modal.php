<!-- Add -->
<div class="modal fade" id="addnewvacacion">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Agregar Solicitud de Vacaciones</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="vacaciones_add.php" enctype="multipart/form-data" onsubmit="return validarFechas()">
                    <div class="form-group">
                        <label for="fecha_inicio" class="col-sm-3 control-label">Fecha Inicio</label>

                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fecha_fin" class="col-sm-3 control-label">Fecha Fin</label>

                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comentarios" class="col-sm-3 control-label">Comentarios</label>

                        <div class="col-sm-9">
                            <textarea class="form-control" id="comentarios" name="comentarios"></textarea>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validarFechas() {
        // Obtener las fechas de inicio y fin
        var fechaInicio = document.getElementById("fecha_inicio").value;
        var fechaFin = document.getElementById("fecha_fin").value;

        // Verificar que las fechas estén definidas
        if (!fechaInicio || !fechaFin) {
            alert("Por favor, seleccione ambas fechas.");
            return false;
        }

        // Convertir las fechas a objetos Date
        var inicio = new Date(fechaInicio);
        var fin = new Date(fechaFin);

        // Calcular la diferencia en milisegundos
        var diferencia = (fin - inicio) / (1000 * 3600 * 24);

        // Verificar si la diferencia excede los 15 días
        if (diferencia > 15) {
            alert("La duración de las vacaciones no puede exceder los 15 días.");
            return false; // Impide el envío del formulario
        }

        // Si la validación pasa, permite enviar el formulario
        return true;
    }
</script>