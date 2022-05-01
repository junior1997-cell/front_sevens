
//Función que se ejecuta al inicio
function init() {

    contactos();

}

//:::::::: D A T O S  C O N T A C T O S :::::::::
    function contactos() {

        $.post("admin/ajax/web.php?op=datos_generales", { }, function (e, status) {

        e = JSON.parse(e);  console.log(e); 

            if (e.data) {
                
                var mapa = ` <div class="container space-1 space-lg-3">
                    <div class="row justify-content-md-end">
                    <div class="col-md-6 col-lg-5">
                        <div class="card bg-white position-relative z-index-999 p-5 p-sm-7">
                        <div class="mb-5">
                            <span class="d-block font-size-2 text-dark text-lh-sm">3 medios para</span>
                            <span class="d-block font-size-4 text-dark font-weight-bold text-lh-sm">contactarse</span>
                        </div>
                        <!-- Contacts -->
                        <div id="contactanos_web">
                            <div class="media mb-5">
                            <span class="icon icon-xs icon-soft-primary icon-circle mr-3">
                                <i class="fas fa-phone"></i>
                            </span>
                            <div class="media-body">
                                <h5 class=" mb-1">llámanos</h5>
                                <span class="d-block text-body font-size-1">${e.data.telefono_fijo!=null || e.data.telefono_fijo!="" ?e.data.telefono_fijo:'<i class="fas fa-spinner fa-pulse fa-lg text-danger"></i>'}</span>
                            </div>
                            </div>
                            <!-- End Contacts -->

                            <!-- Contacts -->
                            <div class="media mb-5">
                            <span class="icon icon-xs icon-soft-primary icon-circle mr-3">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <div class="media-body text-truncate">
                                <h5 class=" mb-1">Envíenos un correo</h5>
                                <span class="d-block text-body font-size-1">${
                                    e.data.correo!="" ?e.data.correo:'<i class="fas fa-spinner fa-pulse fa-lg text-danger"></i>'
                                }</span>
                            </div>
                            </div>
                            <!-- End Contacts -->

                            <!-- Contacts -->
                            <div class="media">
                            <span class="icon icon-xs icon-soft-primary icon-circle mr-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <div class="media-body">
                                <h5 class=" mb-1">Visítanos</h5>
                                <span class="d-block text-body font-size-1">${ e.data.direccion!="" ?e.data.direccion:'<i class="fas fa-spinner fa-pulse fa-lg text-danger"></i>' }</span>
                            </div>
                        </div>
                        <!-- End Contacts -->
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Gmap -->
                <div class="position-md-absolute top-0 right-0 bottom-0 left-0">
                    <div id="map" class="min-h-300rem h-100 rounded-lg"
                        data-hs-leaflet-options='{
                            "map": {
                            "scrollWheelZoom": false,
                            "coords": [-6.762046182671631, -79.85085256094776]
                            },
                            "marker": [
                            {
                                "coords": [ ${e.data.latitud},${e.data.longitud}],
                                "icon": {
                                "iconUrl": "./assets/img/contacto/giphy.gif",
                                "iconSize": [50, 45]
                                },
                                "popup": {
                                "text": "${e.data.direccion}",
                                "title": "SEVEN’S INGENIEROS S.A.C"
                                }
                            }
                            ]
                    }'></div>
                </div>
                <!-- End Gmap -->`

                $(".mapa").html(mapa);

                // INITIALIZATION OF LEAFLET
                // =======================================================
                var leaflet = $.HSCore.components.HSLeaflet.init($('#map')[0]);

                leaflet.fire('movestart');
                leaflet._rawPanBy([leaflet.getCenter().lng + 250, leaflet.getCenter().lat]);
                leaflet.fire('move');
                leaflet.fire('moveend');

                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    id: 'mapbox/light-v9'
                }).addTo(leaflet);

            } 

        }).fail( function(e) { console.log(e); ver_errores(e); } );


    }
    



init();


