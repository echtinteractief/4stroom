var mobileNav = {};

(function() {
	this.Init =function(obj) {
		this.obj=obj;
		
		if(!this.obj.hasClass('init-mobile')) {
			this.obj.addClass('init-mobile');
			this.checkSubNav();
		}
	};
	
	this.checkSubNav = function(){
		var self=this;
		

		this.obj.find('.sub-menu').each(function(){
			var obj=$(this);
			
			obj
				.after($('<a href="#" class="icn toggleSubNav">toggle</a>'))
				.parent()
				.children('.toggleSubNav')
				.bind('click', function(e){
					var obj=$(this);
					
					obj
						.parent()
						.children('.sub-menu')
						.toggleClass('active');
					e.preventDefault();
				})
		});
	}
	
	
}).apply(mobileNav);