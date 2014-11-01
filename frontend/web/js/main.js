$(function(){

  $(".topr").hover(function(){
	  $(".topr_m").show();
  },function(){
	  $(".topr_m").hide();
  });

  $(".tsearm .select").hover(function(){
	  $(this).children(".selectbox-wrapper").show();
  },function(){
	  $(this).children(".selectbox-wrapper").hide();
  });

  $("#keyword").click(function(){
	  $("#suggestlist").slideDown();
  });

  $(".tsearm").hover(function(){
  },function(){
	  $("#suggestlist").slideUp();
  });
  
});

$(document).ready(function () {
	$('#slider2').width(document.documentElement.clientWidth);
	$('#slider2 li').width(document.documentElement.clientWidth);
	
	$("#tclass").selectbox();
	$("#tclass2").selectbox();
	
	var mainh = document.documentElement.clientHeight-321;
	$(".login_main").css("margin-top",(document.documentElement.clientHeight-$(".login_box").height())/2-$(".login_logo").height()-45);
	if($('.userr').height() < mainh){
	$('.userr').height(mainh);
	}
	
});
	  
$(window).resize(function () {
	$('#slider2').width(document.documentElement.clientWidth);
	$('#slider2 li').width(document.documentElement.clientWidth);
	
	var mainh = document.documentElement.clientHeight-321;
	$(".login_main").css("margin-top",(document.documentElement.clientHeight-$(".login_box").height())/2-$(".login_logo").height()-45);
	if($('.userr').height() < mainh){
	$('.userr').height(mainh);
	}
}).resize();

