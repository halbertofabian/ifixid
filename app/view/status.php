<!-- Nav tabs -->
<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="detalles-tab" data-bs-toggle="tab" data-bs-target="#detalles" type="button" role="tab" aria-controls="detalles" aria-selected="true">Detalles</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="proceso-tab" data-bs-toggle="tab" data-bs-target="#proceso" type="button" role="tab" aria-controls="proceso" aria-selected="false">Proceso</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="evidencias-tab" data-bs-toggle="tab" data-bs-target="#evidencias" type="button" role="tab" aria-controls="evidencias" aria-selected="false">Evidencias</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ticket-tab" data-bs-toggle="tab" data-bs-target="#ticket" type="button" role="tab" aria-controls="ticket" aria-selected="false">Ticket</button>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="detalles" role="tabpanel" aria-labelledby="detalles-tab">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ATRIBUTO</th>
                                <th scope="col">INFORMACIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row">Número de órden</td>
                                <td><strong id="orden"></strong></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Cliente</td>
                                <td><strong id="cliente"></strong></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Fecha recepción</td>
                                <td><strong id="fecha_recepcion"></strong></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Estado</td>
                                <td><strong id="estado"></strong></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Tipo de equipo</td>
                                <td><strong id="tipo_equipo"></strong></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Marca</td>
                                <td><strong id="marca"></strong></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Modelo</td>
                                <td><strong id="modelo"></strong></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Color</td>
                                <td><strong id="color"></strong></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Estado fisico</td>
                                <td><strong id="estado_fisico"></strong></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Problema</td>
                                <td><strong id="problema"></strong></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Solución</td>
                                <td><strong id="solucion"></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="tab-pane" id="proceso" role="tabpanel" aria-labelledby="proceso-tab">
                <div class="card-body px-sm-4 px-md-8 px-lg-6 px-xxl-8">
                    <div class="timeline-vertical" id="data-notas">


                    </div>
                </div>
            </div>
            <div class="tab-pane" id="evidencias" role="tabpanel" aria-labelledby="evidencias-tab">
                <div class="card-body px-sm-4 px-md-8 px-lg-6 px-xxl-8">
                    <div class="timeline-vertical" id="data_evidences">

                    </div>
                </div>
            </div>
            <div class="tab-pane" id="ticket" role="tabpanel" aria-labelledby="ticket-tab">
                <div class="card-body px-sm-4 px-md-8 px-lg-6 px-xxl-8">
                    <div class="timeline-vertical" id="data_ticket" style="height: 100vh;">
                        <iframe src="" id="print_ticket" width="100%" height="100%" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function obtenerInformacion(srv_codigo, scl_id_sucursal_sp) {
        var respuesta;
        $.ajax({
            async: false,
            type: 'GET',
            url: '<?= URL_SOFTMOR ?>' + 'api/public/get-data-serviceV2/' + scl_id_sucursal_sp + '/' + srv_codigo,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                var data_notas = "";
                var data_evidences = "";
                if (res.status) {
                    $("#orden").text(res.data_service.orden);
                    $("#cliente").text(res.data_service.nombre);
                    $("#fecha_recepcion").text(res.data_service.srv_fecha_recepcion);
                    $("#estado").text(res.data_service.estado_equipo);
                    $("#tipo_equipo").text(res.data_service.equipo);
                    $("#marca").text(res.data_service.marca);
                    $("#modelo").text(res.data_service.modelo);
                    $("#color").text(res.data_service.color);
                    $("#estado_fisico").text(res.data_service.estado_fisico);
                    $("#problema").text(res.data_service.problema);
                    $("#solucion").text(res.data_service.solucion);

                    var estado = 0;
                    var item = "";
                    res.data_notas.forEach(nts => {
                        if (estado == 0) {
                            item = "start"
                        } else if (estado == 1) {
                            item = "end";
                        }
                        data_notas +=
                            `
                        <div class="timeline-item timeline-item-${item}">
                            <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span class="fs-1 fas fa-mobile"></span></div>
                            <div class="row">
                                <div class="col-lg-6 timeline-item-time">
                                <div>
                                    <p class="fs--2 text-600">${nts.nts_fecha_creacion}</p>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="timeline-item-content">
                                    <div class="timeline-item-card">
                                    <p class="fs--1 mb-0">${nts.nts_nota}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        `;
                        estado += 1;
                        if (estado == 2) {
                            estado = 0;
                        }
                    });
                    $("#data-notas").html(data_notas);


                    var estado2 = 0;
                    var item2 = "";
                    res.data_evidences.forEach(srve => {
                        if (estado2 == 0) {
                            item2 = "start"
                        } else if (estado2 == 1) {
                            item2 = "end";
                        }
                        data_evidences +=
                            `
                        <div class="timeline-item timeline-item-${item2}">
                            <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span class="fs-1 fas fa-mobile"></span></div>
                            <div class="row">
                                <div class="col-lg-6 timeline-item-time">
                                <div>
                                    <p class="fs--2 text-600">${srve.srve_fecha}</p>
                                    <p class="fs--2 text-600"><strong>Nota:</strong> ${srve.srve_descripcion}</p>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="timeline-item-content">
                                    <div class="timeline-item-card">
                                        <p class="fs--1 mb-0">
                                            <img src="${srve.srve_ruta}" width="100%">
                                        </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        `;
                        estado2 += 1;
                        if (estado2 == 2) {
                            estado2 = 0;
                        }
                    });
                    $("#data_evidences").html(data_evidences);

                    //ticket

                    var ruta_ticket = '<?= URL_SOFTMOR ?>' + `/app/report/ticket_servicio_app.php?orden=${res.data_service.orden}&tipo=80mm&scl_id=${scl_id_sucursal_sp}`;
                    $("#print_ticket").attr('src', ruta_ticket);
                }
                respuesta = res;


            }
        });
        return respuesta;
    }
</script>