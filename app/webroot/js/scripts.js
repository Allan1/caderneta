$(function() {
    // Side Bar Toggle
    $('.hide-sidebar').click(function() {
	  $('#sidebar').hide('fast', function() {
	  	$('#content').removeClass('span9');
	  	$('#content').addClass('span12');
	  	$('.hide-sidebar').hide();
	  	$('.show-sidebar').show();
	  });
	});

	$('.show-sidebar').click(function() {
		$('#content').removeClass('span12');
	   	$('#content').addClass('span9');
	   	$('.show-sidebar').hide();
	   	$('.hide-sidebar').show();
	  	$('#sidebar').show('fast');
	});
	
		
	$(".onlyNumbers").keyup(function() {
		$(this).val($(this).val().replace(/[\D]/g,''));
	}).change(function(){
		$(this).val($(this).val().replace(/[\D]/g,''));
	});
	
	$(".onlyFileFormats").keyup(function() {
		$(this).val($(this).val().toLowerCase().replace(/[^a-z0-9;]/g,''));
	}).change(function(){
		$(this).val($(this).val().toLowerCase().replace(/[^a-z0-9;]/g,''));
	});
  
  $(".notSpecialChars").keyup(function() {
		$(this).val($(this).val().replace(/[-!"#$%&'()*+,./:;<=>?@[\\\]_`{|}~]/g,''));
	}).change(function(){
		$(this).val($(this).val().replace(/[-!"#$%&'()*+,./:;<=>?@[\\\]_`{|}~]/g,''));
	});//
  
//  $(".dateFormat").keyup(function() {
//    if(!$(this).val().match(/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/g,''));
//		$(this).val($(this).val().replace(/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/g,''));
//	}).change(function(){
//		$(this).val($(this).val().replace(/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/g,''));
//	});
  
});

