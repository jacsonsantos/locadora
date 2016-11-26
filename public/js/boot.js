$('.carousel').carousel({
  interval: 5000
})
$(function () {
	$.ajax({
		url:'/api/v1/category',
		type:'GET',
        dataType:'json',
        beforeSend:function () {
               $('#loading').fadeIn(300);
        },
		success: function(response) {
			var categoria = document.getElementById('categorias');
			$('#loading').fadeOut(300);
			for (var i = 0; i < response.length; i++) {
				categoria.innerHTML += '<div class="col-md-12"><label for=""><input type="checkbox" name="'+response[i].str_nome_categoria+'" value="'+response[i].int_categoria_id+'"> '+capitalizeFirstLetter(response[i].str_nome_categoria)+'</label></div>';
			};
		},
		error: function(e) {
			console.log(e);
		}
	});

$('.form-search').submit(function() {
	var s = $('.s').val();
	$.ajax({
		url:'/api/v1/search?s='+s,
		type:'GET',
        dataType:'json',
        beforeSend:function () {
        	var content = document.getElementById('search-content');
        		content.innerHTML = '';
        		$('.slide').hide();
        	    window.scrollTo(0, 200);
                $('#loading-search').fadeIn(300);
        },
		success: function(response) {
			var content = document.getElementById('search-content');
			$('#loading-search').fadeOut(300);
			if (response.length){
				for (var i = 0; i < response.length; i++) {
					content.innerHTML += '<div class="col-md-2" data-toggle="modal" onclick="getDetalhe(this)" rel="'+response[i].int_filme_id+'" data-target="#myModal"><img src="/uploads/'+response[i].thumbnail+'" alt="" class="img-responsive"><h2 class="text-center">'+response[i].str_titulo_filme+'</h2></div>';
				};	
			} else {
				content.innerHTML = "Indisponível no momento...";
			}
			
		},
		error: function(e) {
			console.log(e);
		}
	})
});

});
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
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
			console.log(response);
			var detalhe = document.getElementById('detalhe');
			$('#loading-detalhe').fadeOut(300);
			for (var i = 0; i < response.length; i++) {
				detalhe.innerHTML += '<div class="row"><div class="col col-md-4"><img src="/uploads/'+response[i].thumbnail+'" alt="" class="img-responsive"></div><div class="col col-md-8"><h2>'+response[i].str_titulo_filme+'</h2><p>'+response[i].txt_sinopse_filme+'</p><ul><li>'+response[i].str_nome_categoria+'</li><li>'+response[i].int_ano+'</li></ul></di></div>';
				$('.btn-success').attr('href','/admin/my-film?tmp='+response[i].int_filme_id);
			};
		},
		error: function(e) {
			console.log(e);
		}
	});
}