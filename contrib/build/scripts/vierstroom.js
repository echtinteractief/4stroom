function getParameterByName(name) {
	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
			results = regex.exec(location.search);
	return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

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
	
    $('.sort-category').change(function(){
		window.location.href = "?category=" + $('.sort-category option:selected').val();
	});

	$('.sort-date').change(function(){
		var $searchText = getParameterByName('text');
		var $category = getParameterByName('category');
		
		//console.log($category, $(this));
		
		if($category){
			window.location.href = "?category=" + $category + "&sort=" + $('.sort-date option:selected').val();
		}
		else if($searchText){
			window.location.href = "?text=" + $searchText + "&sort=" + $('.sort-date option:selected').val();
		} else {
			window.location.href = "?sort=" + $('.sort-date option:selected').val();
		}
	});
	
	
	$('.results-options #searchjobs').submit(function(event){
		//console.log($(this).serializeArray()[0].value);
		if($(this).serializeArray()[0].value)
		{
			window.location.href = "?text=" + $(this).serializeArray()[0].value;
		}
		
		event.preventDefault();
	});
	
	if ($('.mobileNav h1').is(':visible')) {
		var obj=$('.mobileNav'),
			objSearch=$('.topHeader .search-box .btn--search');
		
		mobileNav.Init(obj);
		
		obj.children('h1:visible').bind('click', function() {
			var obj=$(this);
			obj.toggleClass('active');
		});
		
		
		objSearch.bind('click', function(e) {
			var obj=$('.topHeader .search-box'),
				obj2=$(this);
				
				if(!obj.hasClass('active')) {
					obj.addClass('active');
				} else {

					if(obj.children().children('.search').val()) {
						window.location.href = "/?s="+obj.children().children('.search').val();
					} else {
						obj.removeClass('active');
					}
				}
				
			e.preventDefault();
		});	
	} 
	
	
	// double click fix
	$('.topNav a').on('touchend', function(e) {
	  var el = $(this);
	  var link = el.attr('href');
	  window.location = link;
	});
	
	$.datepicker.setDefaults({
		yearRange: '1910:2015', 
        changeMonth: true,
		changeYear: true
    });	

});//end line
