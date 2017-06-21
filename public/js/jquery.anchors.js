$(function(){
	$(".link-down").click(function(event){
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top-6}, 500);
	});
});