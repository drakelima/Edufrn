// Função para animação do submenu

$(function(){
	$('#wrap-sub').hide()

	$(".mostra-submenu").click(function(){
			$("#wrap-sub").slideToggle(400);
		});		       
});

// Função para mostrar as instruções de compra


/*
$(function(){
	$('#box_como_comprar').hide()

	$(".mostra_box").click(function(){
			$("#box_como_comprar").slideToggle(400);
		});		       
});

*/
var estado_box = 0;


$(document).ready(
	function() {
		$('#box_como_comprar').hide()
	});



$(function(){
	$(".mostra_box").click(function(){
			if(estado_box == 0)
			{
				$(".mostra_box").addClass("ativo");
				$("#box_como_comprar").slideDown();
				estado_box = 1;
				
			}
			
			else if (estado_box == 1)
			{		
				$("#box_como_comprar").slideUp();							
				estado_box = 0;
				$(".mostra_box").removeClass("ativo");
			}
	});		       
});


 
// Função para slideshow da página inicial

	$(function(){
		$('#slides').slides({
			preload: true,
			preloadImage: 'img/loading.gif',
			play: 5000,
			pause: 2500,
			hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});