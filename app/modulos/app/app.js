
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 16/01/2023 13:25
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

var urlApp = $(".urlApp").attr("urlApp");
var urlAPI = $(".urlAPI").attr("urlAPI");

function startLoadButton() {
    $(".btn-load").attr("disabled", true);
    $(".btn-load").html(` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Por favor espere...`)
}
function stopLoadButton(label) {
    $(".btn-load").attr("disabled", false);
    $(".btn-load").html(label)
}
