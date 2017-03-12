/**
 * Created by Luiz Gustavo on 12/02/2017.
 */
(function($){
    $(function(){

        $('.button-collapse').sideNav();

    }); // end of document ready
})(jQuery); // end of jQuery name space

function alerta(texto,cor) {
    Materialize.toast(texto, 4000, cor);
}

$(window).load(function(){
    $('#preloader').fadeOut('slow',function(){$(this).remove();});
});


function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}

$(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
    $('select').material_select();
    $('.modal').modal();
});

$('#selectall').click(function () {
    if (this.checked) {

        $(':checkbox').each(function () {
            this.checked = true;
        });
    }

    else {
        $(':checkbox').each(function () {
            this.checked = false;
        });
    }
});