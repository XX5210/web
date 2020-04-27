/**$(function(){
	$(window).scroll(function(){
		if($(window).scrollTop()>100){
			$("#back .gotop").fadeIn();	
		}
		else{
			$("#back .gotop").hide();
		}
	});
	$("#side-bar .gotop").click(function(){
		$('html,body').animate({'scrollTop':0},500);
	});
});
*/

// JavaScript Document

$(document).ready(function(){

$("#back").hide();

$(function () {

$(window).scroll(function(){

if ($(window).scrollTop()>100){

$("#back").fadeIn(900);

}

else

{

$("#back").fadeOut(900);

}

});

$("#back").click(function(){

$('body,html').animate({scrollTop:0},800);

return false;

});

});

});


