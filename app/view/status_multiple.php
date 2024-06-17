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
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reseña-tab" data-bs-toggle="tab" data-bs-target="#reseña" type="button" role="tab" aria-controls="reseña" aria-selected="false">Reseña</button>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="detalles" role="tabpanel" aria-labelledby="detalles-tab">
                <div class="row" id="servicios-multiples">
                    
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
            <div class="tab-pane" id="reseña" role="tabpanel" aria-labelledby="reseña-tab">
                <div class="card">
                    <div class="card-body">
                        <h3>¿Te gustaría dejarnos una reseña?</h3>
                        <form id="formGuardarReseña" class="row g-3">
                            <div class="col-12">
                                <label for="rsñ_resena" class="form-label"></label>
                                <textarea class="form-control" name="rsn_resena" id="rsn_resena" rows="3" placeholder="Escribe aquí tu reseña, nos ayudarías mucho a crecer" required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <h6>¿De 1 al 5 estrellas como calificas nuestro servicio?</h6>
                                <div class="d-flex justify-content-center">
                                    <div class="d-block" id="calificacion"></div>
                                    <input type="hidden" id="rsn_srv_id" name="rsn_srv_id">
                                    <input type="hidden" id="rsn_calificacion" name="rsn_calificacion">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-danger float-start d-none btnEliminarResena">
                                    Eliminar
                                </button>

                                <button type="submit" class="btn btn-primary float-end">
                                    Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var fragmentoURL = window.location.hash;
        if (fragmentoURL.includes("ticket")) {
            $('#ticket-tab').tab('show');
        }
    })

    function obtenerInformacion(srv_codigo, scl_id_sucursal_sp) {
        var respuesta;
        $.ajax({
            async: false,
            type: 'GET',
            url: '<?= URL_SOFTMOR ?>' + 'api/public/get-data-servicios-multiples/' + scl_id_sucursal_sp + '/' + srv_codigo,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                var data_notas = "";
                var data_evidences = "";
                if (res.status) {
                    console.log(res.data_service);
                    var servicios_multiples = "";
                    var servicios = res.data_service
                    servicios.forEach(srv => {
                        servicios_multiples += `
                        <div class="col-xl-6 col-md-12 col-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">ATRIBUTO</th>
                                            <th scope="col">INFORMACIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <td scope="row">Número de órden</td>
                                            <td><strong id="orden">${srv.orden}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">Cliente</td>
                                            <td><strong id="cliente">${srv.nombre}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">Fecha recepción</td>
                                            <td><strong id="fecha_recepcion">${srv.srv_fecha_recepcion}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">Estado</td>
                                            <td><strong id="estado">${srv.estado_equipo}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">Tipo de equipo</td>
                                            <td><strong id="tipo_equipo">${srv.equipo}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">Marca</td>
                                            <td><strong id="marca">${srv.marca}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">Modelo</td>
                                            <td><strong id="modelo">${srv.modelo}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">Color</td>
                                            <td><strong id="color">${srv.color}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">Estado fisico</td>
                                            <td><strong id="estado_fisico">${srv.estado_fisico}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">Problema</td>
                                            <td><strong id="problema">${srv.problema}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">Solución</td>
                                            <td><strong id="solucion">${srv.solucion}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                        `;
                    });

                    $("#servicios-multiples").html(servicios_multiples);

                    // $("#rsn_srv_id").val(res.data_service.srv_id);
                    // $("#orden").text(res.data_service.orden);
                    // $("#cliente").text(res.data_service.nombre);
                    // $("#fecha_recepcion").text(res.data_service.srv_fecha_recepcion);
                    // $("#estado").text(res.data_service.estado_equipo);
                    // $("#tipo_equipo").text(res.data_service.equipo);
                    // $("#marca").text(res.data_service.marca);
                    // $("#modelo").text(res.data_service.modelo);
                    // $("#color").text(res.data_service.color);
                    // $("#estado_fisico").text(res.data_service.estado_fisico);
                    // $("#problema").text(res.data_service.problema);
                    // $("#solucion").text(res.data_service.solucion);

                //     var estado = 0;
                //     var item = "";
                //     res.data_notas.forEach(nts => {
                //         if (estado == 0) {
                //             item = "start"
                //         } else if (estado == 1) {
                //             item = "end";
                //         }
                //         data_notas +=
                //             `
                //         <div class="timeline-item timeline-item-${item}">
                //             <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span class="fs-1 fas fa-mobile"></span></div>
                //             <div class="row">
                //                 <div class="col-lg-6 timeline-item-time">
                //                 <div>
                //                     <p class="fs--2 text-600">${nts.nts_fecha_creacion}</p>
                //                 </div>
                //                 </div>
                //                 <div class="col-lg-6">
                //                 <div class="timeline-item-content">
                //                     <div class="timeline-item-card">
                //                     <p class="fs--1 mb-0">${nts.nts_nota}</p>
                //                     </div>
                //                 </div>
                //                 </div>
                //             </div>
                //         </div>
                //         `;
                //         estado += 1;
                //         if (estado == 2) {
                //             estado = 0;
                //         }
                //     });
                //     $("#data-notas").html(data_notas);


                //     var estado2 = 0;
                //     var item2 = "";
                //     res.data_evidences.forEach(srve => {
                //         if (estado2 == 0) {
                //             item2 = "start"
                //         } else if (estado2 == 1) {
                //             item2 = "end";
                //         }
                //         data_evidences +=
                //             `
                //         <div class="timeline-item timeline-item-${item2}">
                //             <div class="timeline-icon icon-item icon-item-lg text-primary border-300"><span class="fs-1 fas fa-mobile"></span></div>
                //             <div class="row">
                //                 <div class="col-lg-6 timeline-item-time">
                //                 <div>
                //                     <p class="fs--2 text-600">${srve.srve_fecha}</p>
                //                     <p class="fs--2 text-600"><strong>Nota:</strong> ${srve.srve_descripcion}</p>
                //                 </div>
                //                 </div>
                //                 <div class="col-lg-6">
                //                 <div class="timeline-item-content">
                //                     <div class="timeline-item-card">
                //                         <p class="fs--1 mb-0">
                //                             <img src="${srve.srve_ruta}" width="100%">
                //                         </p>
                //                     </div>
                //                 </div>
                //                 </div>
                //             </div>
                //         </div>
                //         `;
                //         estado2 += 1;
                //         if (estado2 == 2) {
                //             estado2 = 0;
                //         }
                //     });
                //     $("#data_evidences").html(data_evidences);

                //     //ticket

                //     var ruta_ticket = '<?= URL_SOFTMOR ?>' + `/app/report/ticket_servicio_app.php?orden=${res.data_service.orden}&tipo=80mm&scl_id=${scl_id_sucursal_sp}`;
                //     $("#print_ticket").attr('src', ruta_ticket);


                //     //VALIDAR RESEÑAS   
                //     console.log(res.data_resenas)
                //     if (res.data_resenas) {
                //         $("#rsn_resena").val(res.data_resenas.rsn_resena);

                //         var rating = parseFloat(res.data_resenas.rsn_calificacion);
                //         var starRating1 = raterJs({
                //             starSize: 32,
                //             step: 0.5,
                //             element: document.querySelector("#calificacion"),
                //             rating: rating, // Utiliza 'rating' en lugar de 'initialRating'
                //             rateCallback: function ratingCallback(rating, done) {
                //                 this.clear();
                //                 this.setRating(rating);
                //                 done();
                //             }
                //         });
                //         $(".btnEliminarResena").removeClass('d-none');
                //     } else {
                //         $("#rsn_resena").val("");
                //         var starRating1 = raterJs({
                //             starSize: 32,
                //             step: 0.5,
                //             element: document.querySelector("#calificacion"),
                //             rateCallback: function ratingCallback(rating, done) {
                //                 this.clear();
                //                 this.setRating(rating);
                //                 done();
                //             }
                //         });
                //         $(".btnEliminarResena").addClass('d-none');
                //     }
                // }
                respuesta = res;

                }
            }
        });
        return respuesta;
    }


    $('#formGuardarReseña').on('submit', function(e) {
        e.preventDefault();
        var scl_id = $("#scl_id_sucursal_sp").val();
        var calificacion = $("#calificacion").attr('data-rating');
        (calificacion == undefined) ? $("#rsn_calificacion").val(0): $("#rsn_calificacion").val(calificacion)
        var datos = new FormData(this)
        datos.append('scl_id', scl_id);
        $.ajax({
            type: 'POST',
            url: '<?= URL_SOFTMOR ?>' + 'api/public/guardar/resena',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    toastr.success(res.mensaje, '¡Muy bien!');

                    // Obtener el elemento padre del elemento #calificacion
                    var padre = document.getElementById("calificacion").parentNode;

                    // Crear un nuevo elemento div
                    var nuevoElemento = document.createElement("div");
                    nuevoElemento.id = "calificacion";

                    // Reemplazar el elemento #calificacion con el nuevo elemento
                    padre.replaceChild(nuevoElemento, document.getElementById("calificacion"));





                    var srv_codigo = $("#srv_codigo").val();
                    obtenerInformacion(srv_codigo, scl_id);
                } else {
                    toastr.error(res.mensaje, '¡ERROR!');
                }
            }
        });
    });

    $(document).on('click', '.btnEliminarResena', function(e) {
        var rsn_srv_id = $("#rsn_srv_id").val();
        var scl_id = $("#scl_id_sucursal_sp").val();
        swal({
            title: '¿Esta seguro de eliminar la reseña?',
            text: 'Esta accion no es reversible',
            icon: 'warning',
            buttons: ['No', 'Si, eliminar reseña'],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append('rsn_srv_id', rsn_srv_id);
                datos.append('scl_id', scl_id);
                datos.append('btnEliminarResena', true);
                $.ajax({
                    type: 'POST',
                    url: '<?= URL_SOFTMOR ?>' + 'api/public/eliminar/resena',
                    data: datos,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res) {
                            toastr.success('La reseña se elimino correctamente', '¡Muy bien!');
                            // Obtener el elemento padre del elemento #calificacion
                            var padre = document.getElementById("calificacion").parentNode;

                            // Crear un nuevo elemento div
                            var nuevoElemento = document.createElement("div");
                            nuevoElemento.id = "calificacion";

                            // Reemplazar el elemento #calificacion con el nuevo elemento
                            padre.replaceChild(nuevoElemento, document.getElementById("calificacion"));


                            var srv_codigo = $("#srv_codigo").val();
                            obtenerInformacion(srv_codigo, scl_id);
                        } else {
                            toastr.error('Hubo un error al eliminar la reseña', '¡ERROR!');
                        }
                    }
                });
            } else {}
        });

    });
</script>