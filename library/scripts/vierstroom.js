$(function(){
	if (slider.checkDom('.carousel')) {
		slider.Init();
	}
	
	if (gallery.checkDom('.gallery')) {
		gallery.Init('.gallery');
	}
	
	$('.google-map').each(function(){

		render_map( $(this) );

	});
	
	// Add formulier scroll anchor for member offer page
	if($('body').hasClass('single-ledenaanbieding')){
		$('div.action a').click(function(){
			$('.visual-form-builder').addClass('active');
			
			$('html, body').animate({
				scrollTop: $('.visual-form-builder').offset().top
			}, 500);
		});
	};
	
	
	
	 $.datepicker.setDefaults({
		yearRange: '1910:2015', 
        changeMonth: true,
		changeYear: true
    });	
   
	
/*
	if(slider.checkDom('.hasDatepicker')) {
		
		$( '.hasDatepicker' ).datepicker({
    	    changeMonth: true,
			changeYear: true
    	});
    }
	
*/
/*
	if(slider.checkDom('#Gmap')) {
		
		var map=new GMaps({
				div: '#Gmap',
				lat: 52.5142307,
				lng: 6.1069978,
				zoom:9
			});
		map.addMarker({
		  lat: 52.362536,
		  lng: 5.652324,
		  title: 'Van Rijn',
		  infoWindow: {
		  	content: '<a href="https://www.google.nl/maps/place/Nobelstraat+25,+3846+CE+Harderwijk/@52.362536,5.652324,17z/data=!3m1!4b1!4m2!3m1!1s0x47c6324f16b46c2b:0xa3bccd495d8199ba" target="_blank">Van Rijn,<br /> Bekijk op google maps</a>'
        	}
		});
		
		map.addMarker({
		  lat: 52.6010168,
		  lng: 6.0985107,
		  title: 'Kraanverhuur Dick ten Klooster',
		  infoWindow: {
		  	content: '<a href="https://www.google.nl/maps/place/Zwartsluizerweg+11,+8061+AB+Hasselt/@52.6010168,6.0985107,17z/data=!4m7!1m4!3m3!1s0x47c8769d15caa21b:0x87d25b84eda86e60!2sZwartsluizerweg+11,+8061+AB+Hasselt!3b1!3m1!1s0x47c8769d15caa21b:0x87d25b84eda86e60" target="_blank">Kraanverhuur Dick ten Klooster, <br />Bekijk op google maps</a>'
        	}
		});

	}
*/	

});//end line
