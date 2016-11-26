$(function() {
    $('.filmes').click(function() {
        $('.sub-filmes').slideToggle( "slow", function() {
            // Animation complete.
        });
    });
    
    $('.cliente').click(function() {
        $('.sub-cliente').slideToggle( "slow", function() {
            // Animation complete.
        });
    });
    $("#ano").mask("9999",{placeholder:"yyyy"});
    $("#duracao").mask("9hr 99min");
});
function getDetalhe(obj) {
    var id = $(obj).attr('rel');
    $.ajax({
        url:'/api/v1/search/'+id,
        type:'GET',
        dataType:'json',
        beforeSend:function () {
            var detalhe = document.getElementById('detalhe');
                detalhe.innerHTML = '';
               $('#loading-detalhe').fadeIn(300);
        },
        success: function(response) {
            var detalhe = document.getElementById('detalhe');
            $('#loading-detalhe').fadeOut(300);
            for (var i = 0; i < response.length; i++) {
                detalhe.innerHTML += '<div class="row"><div class="col col-md-4"><img src="/uploads/'+response[i].thumbnail+'" alt="" class="img-responsive"></div><div class="col col-md-8"><h2><strong>'+response[i].str_titulo_filme+'</strong></h2><label>Sinopse:</label><p>'+response[i].txt_sinopse_filme+'</p><ul><li>Categoria: '+response[i].str_nome_categoria+'</li><li>Ano: '+response[i].int_ano+'</li></ul></di></div><div><video preload="auto" style="position: relative;width: 100%;height: auto;margin: auto;" controls><source src="/filmes/'+response[i].anexo+'"/></video></div>';
            };
        },
        error: function(e) {
            console.log(e);
        }
    });
}
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
$(function () {
    $('.selectChosen').chosen()
})
