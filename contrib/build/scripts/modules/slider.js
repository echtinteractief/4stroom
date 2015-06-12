var slider = {};

(function() {
	
	this.checkDom = function(obj) {
		var objExist = false;
		
		if($(obj).length > 0) 
			objExist =true;
		return objExist;
	};
	
	this.Init = function () {
		
		this.objContainer = $('.carousel .wrapper');
		this.timerTrigger=(this.objContainer.parent().data('duration')) ? this.objContainer.parent().data('duration') : 8000; //ms when switch to next item
		this.timer=''; //global var for timer function
		this.currentItem=''; // global var for remember current state
		this.loadItem=0;
		this.items = []; //array used for carousel items
		
		//check old ie browsers
		this.shittyUA = $('html').hasClass('ieLT');
		
		this.setIndicator(); //set indicator obj
		this.getCarouselItems(); //get carousel items information
		this.setPagination(); //set pagination obj
		this.setItemImage(); //load images
		
		if (this.objContainer.parent().data('prevnext'))
			this.setPrevNextBtn();
		
	};
	
	this.setIndicator = function() {
		var self=this;	
			indiBox=$('<div class="Indicator" />');
		
		self.objContainer
			.parent()
			.append(indiBox);
	};

	this.getCarouselItems = function() {
		var self=this,
			obj = self.objContainer.children();
			
		obj.each(function(i){
			var obj = $(this),
				id = 'Item-'+i,
				img = obj.children().children('.crop').attr('data-img'),
				title = obj.find('h1').text();
				

			obj.attr('id',id); //set id to obj (easy to find)
			self.items.push([id, img, title]);
		});
	};
	
	
	this.setPagination = function() {
		var self=this, 
			box=$('<ol class="pagination" />');
		
		
		if (self.items.length > 1) {
			for(var i in data = self.items) {
				//console.log(data);
				var html='<li class="'+data[i][0]+'">';
					html += '<a href="#" data-id="'+data[i][0]+'">'+data[i][2];
					//html += '<figure class="crop"><img src="'+data[i][1]+'" /></figure>';
					html += '</a></li>';
					
				box.append($(html));
					
			}

			//place pagination
			self.objContainer
				.parent()
				.append(box);

			$('.pagination')
				.children()
				.children('a')
				.bind('click', function(e){
					var obj=$(this);
					
					//clearInterval(self.timer);
					self.goToItem(obj.attr('data-id'));
					 //clear interval
					e.preventDefault();
				});
		}
		
	};
	
	this.setPrevNextBtn = function() {
		var self=this,
			btnObj=$('<a href="#next" class="btn paging next">Verder</a><a href="#vorige" class="btn paging prev">Vorige</a>');
		
		if (self.items.length > 1) {
			btnObj
				.bind('click', function(e){
					var obj=$(this);
	
					//clear timer
					//clearInterval(self.timer);
					
					if(obj.hasClass('next')) {
						self.posPrevNext();
					} else if(obj.hasClass('prev')) {
						//prev
						self.posPrevNext('right');
						
					}
	
					e.preventDefault();
				})
				.appendTo(self.objContainer.parent());
		}
		
		
		
	};
	
	this.setItemImage = function() {
		var self=this,
			obj=self.objContainer.children();
		
		//obj.nextAll().addClass('pre-load'); //set all items on preload
		self.loadImg(self.items);		
	};

	//load images
	this.loadImg = function(data) {
		var self = this,
			img = new Image();
		
			$(img)
				.load(function () {
					//console.log(self.items.length-1);
					var imgObj=$(this),
						imgBox = $('#'+data[self.loadItem][0]).children().children('.crop');
					
					
					imgBox
						.append(imgObj);
						//.parent()
						//.parent();
						//.removeClass('pre-load');
					
					//if first item 
					if (self.loadItem===0) {
						self.goToItem(data[self.loadItem][0]);
						self.objContainer.parent().children('.Indicator').remove();
					}

					
					//if last item 
					if (self.loadItem >= (self.items.length-1)) {
						
						self.objContainer
							.parent()
							.children('.pagination')
							.addClass('active');
							
							//setTimer
							//self.setTimer();
					
					} else {
						self.loadItem++;
						self.setItemImage();
					}
				})
				.error(function () {
					self.objContainer.parent().children('.Indicator').remove();
					
				})
				.attr('src', data[self.loadItem][1]);
	};
		
	this.goToItem = function(obj) {
		var self=this;
		
		////old browser check
		if(self.shittyUA) 
			self.objContainer.children('.active').fadeOut('slow');
		
		self.objContainer.children('.active').removeClass('active') //remove active state.
		self.currentItem = obj; //update global active item
		
		
		$('#'+obj).addClass('active');
		
		//old browser check
		if(self.shittyUA) {
			$('#'+obj).fadeIn('slow');
			
		}
		
		//console.log('active');
		clearInterval(self.timer);
		self.setTimer();
		self.updatePagination(obj);//update pagination
		//update pagination	
	};
	
	this.updatePagination = function(obj) {
		var self=this;
		
		self.objContainer
			.parent()
			.children('.pagination')
			.children('li')
			.removeClass('active')
			.parent()
			.find('.'+obj)
			.addClass('active');
	};
	
	this.posPrevNext = function(nextPos) {
		var self = this,
			next=1;
		
			
		//console.log(nextPos);
//var count=self.currentItem.replace("Item-", "");
		
		for (var index in data = self.items) {
			
			if(self.items[index][0] == self.currentItem) {
				
				//if not last item	
				if(index < data.length-1) {
					if(nextPos=='left') {
						//console.log('next');
						next=self.items[parseFloat(index)+1][0];
					} else if(nextPos=='right' && index >0) {
						//console.log('prev');
						next=self.items[parseFloat(index)-1][0];
					} else if(nextPos=='right' && index===0) {
						next=self.items[data.length-1][0];
					} else {
						next=self.items[parseFloat(index)+1][0];
					}
					
				} else {
					if(nextPos=='right' && index >0) {
						next=self.items[parseFloat(index)-1][0];
					} else {
											
						next=self.items[0][0];
					}
				}
			}
		}
	 		//go to position
	 	self.goToItem(next);
		
	};

	this.setTimer = function () {
		var self= this;
		
		self.timer=setInterval(function() {
			// Do something after 5 seconds

			self.posPrevNext(true);
	  	}, self.timerTrigger);
	};

}).apply(slider);
