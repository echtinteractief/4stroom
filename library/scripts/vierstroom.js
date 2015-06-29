var vierstsroom = (function(){
	var vier = {};

	vier.Init = function(){
			initCarousel();
			initGallery();
debugger;
			if(window.location.url.indexOf('werkenbijdevierstroom/vacatures/') < -1)
			{
				initVacatures();
			}
	};

	var initCarousel = function(){
		if (slider.checkDom('.carousel')) {
			slider.Init();
		}
	}

	var initGallery = function(){
		if (gallery.checkDom('.gallery')) {
			gallery.Init('.gallery');
		}
	}

	var initVacatures = function(){
		$('.sort-options select').change(function(){
			alert($('.sort-options select option:selected').text());
		});
	}

});//end line

vierstroom.init();