// Slider-banner
var Slider_banner=function(){
	if($('.slider-banner').length>0){
		$('.slider-banner').slick({
			autoplay: true,
			autoplaySpeed: 4000,
			infinite: true,
			speed: 800,
			arrows: false,
			dots: false
		});
	}
};

// Slider project hot
var Slider_project_hot=function(){
	if($('.slider-project-hot').length>0){
		$('.slider-project-hot').slick({
			autoplay: true,
			autoplaySpeed: 4000,
			infinite: true,
			speed: 800,
			arrows: false,
			dots: true
		});
	}
};

// Select 2
var Select2=function(){
	if($( ".select2" ).length>0) {
	$(".select2").select2({ 
		});
	}
};

// Back to top
var Backtotop = function(){
	$('.back-to-top').click(function(){
		$("html, body").animate({scrollTop: 0}, 700);
	});
};

var Menu_mobile=function(){
	$('.menu-mb').find("ul li").each(function() {
		if($(this).find("ul>li").length > 0){
			$(this).append('<i class="fa fa-angle-down btn-drop" aria-hidden="true"></i>');
			$(this).children('a').addClass('lili');
		}
	});
	$('.lili').click(function(){
		$(this).parent('li').children('.btn-drop').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
		$(this).parent('li').children('ul').toggleClass('open');
	});
	// $('.btn-menu-mobile').click(function(){
	// 	$(this).children('i').toggleClass('fa-bars').toggleClass('fa-close');

	// 	$('.menu-mobile').toggleClass('active');
	// });
	$('.close').click(function(){
		$('.menu-mb').addClass('close');
		$('.menu-mb').removeClass('open');
	});
	$('.btn-menu').click(function(){
		$('.menu-mb').addClass('open');
		$('.menu-mb').removeClass('close');
	})
}

// Slider-project-detail
var Slider_project_detail = function(){
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: false,
		arrows: false,
		centerMode: true,
		focusOnSelect: true,
		responsive: [
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 4,
		        slidesToScroll: 4
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3
		      }
		    }

		]
	});
};

// Dropzone
// var Dropzone = function(){
// 	var myDropzone = new Dropzone("div#myId", { url: "/file/post"});
// 	$("div#myId").dropzone({ url: "/file/post" });
// }

// Input-number
var Input_number = function(){
	var number=$('.inputnumber-bedroom').val();
	$('.plus-bedroom').click(function(){
		var val = parseInt(number);
	  	val= val + 1;
	  	number= val;
	  	$('.inputnumber-bedroom').val(val);
	});

	$('.minus-bedroom').click(function(){
		var val = parseInt(number);
	  	if(number ==0){
	  		val=0;
	  	}
	  	else{
	  		val= val - 1;
	  	}
	  	$('.inputnumber-bedroom').val(val);
	  	number = val;
	});

	var number=$('.inputnumber-wc').val();
	$('.plus-wc').click(function(){
		var val = parseInt(number);
	  	val= val + 1;
	  	number= val;
	  	$('.inputnumber-wc').val(val);
	});

	$('.minus-wc').click(function(){
		var val = parseInt(number);
	  	if(number ==0){
	  		val=0;
	  	}
	  	else{
	  		val= val - 1;
	  	}
	  	$('.inputnumber-wc').val(val);
	  	number = val;
	});
}

// Slider-news-detail-2
var Slider_news_detail_2 = function(){
	$('.slider-news-detail-2').slick({
		dots: false,
		arrows: false,
		infinite: true,
		speed: 500,
		cssEase: 'linear'
	});
}

$(function(){
	Slider_banner();
	Slider_project_hot();
	Select2();
	Backtotop();
	Menu_mobile();
	Slider_project_detail();
	// Dropzone();
	Input_number();
	Slider_news_detail_2();
});