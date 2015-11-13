var gallery = {};
(function() {
	this.checkDom = function(obj) {
		var objExist = false
		
		if($(obj).length > 0) 
			objExist =true;
		return objExist;
	}
	
	this.Init = function (obj) {
		this.items = [];
		this.obj=$(obj);
		
		this.getItems();
		this.initScreen();
		
	};
	
	this.getItems = function () {
		var self=this,
			obj = self.obj;
		
		//check count of gallery on page	
		obj.each(function(i){
			var obj = $(this),
				gallery_v=i,
				subItems= [],
				subObj=obj.children('.gallery-item'),
				id = obj.attr('id');
				
			subObj.each(function(i){
				var x=$(this),
					id='Gal-'+gallery_v+'-Item-'+i,
					img=x.find('a').attr('href');
					
					x.attr('id',id); //set id to item
					
					subItems.push([id, img]);
			});
			
			self.items.push([id, subItems]);
				
		});
	};
	
	this.initScreen = function() {
		var self=this;
		
		for (var i in data = self.items) {
			var obj=$('#'+data[i][0]),
				firstItem=data[i][1][0][0];
			
			//set screen	
			obj
				.prepend($('<div class="placeholder load" />'))
				.append('<a href="#" class="btn next">next</a><a href="#" class="btn prev hide">prev</a>')
				.find('a.btn')
				.bind('click', function(e){
					self.nextItem($(this),data[i]);
					e.preventDefault();
				});
			
			//load firs titem in screen
			self.updateItem(data[i],$('#'+firstItem));	

			
			//bind click thumbs
			obj.children('.gallery-item').each(function(){
				var obj2=$(this).find('a');
				
				obj2.bind('click',function(e){
					var uri=$(this).attr('href');

					self.updateItem(data[i],$(this).parent().parent());
					e.preventDefault();
				});
			});
			
			//turn pagination off by one item
			if(data[i][1].length <= 1) {
				$('.btn, .gallery-item').addClass('hide');
			}
			
		}
	};
	
	this.nextItem = function(pos, data) {
		var self=this,
			nextItem=false;
			activeItem=$('#'+data[0]).find('.gallery-item.active').attr('id');
		
		//check pos in data array
		for (var i in items = data[1]) {

			if(activeItem==items[i][0]) {
				if(pos.hasClass('next')) {						
					nextItem=items[parseFloat(i)+1][0];
				} else {
					nextItem=items[parseFloat(i)-1][0];
				}
				
			}
		}
			
		self.updateItem(data,$('#'+nextItem));
		
	};
	
	this.updateItem = function(data, item) {
		var self=this,
			obj=$('#'+data[0]),
			activeItem=item.attr('id'),
			uri=item.children().children().attr('href');
		
		if($('.gallery-item').hasClass('active')) {
			$('.gallery-item.active').removeClass('active');
		}
		
		item.addClass('active');
		
		self.getImg(obj.children('.placeholder'),uri);			
		
		for (var i in items = data[1]) {
			if(activeItem==items[i][0]) {
				
				
				//check next btn
				if(parseFloat(i)+1 > data[1].length-1) {
					obj.find('.btn.next').addClass('hide');
				}else {
					obj.find('.btn.next').removeClass('hide');
				}
				//check prev btn
				if(i==0) {
					obj.find('.btn.prev').addClass('hide');
				} else {
					obj.find('.btn.prev').removeClass('hide');
				}				
			}
		}
	};
	
	this.getImg = function(obj, uri) {
		var self=this,
			img = new Image();
			
		obj.addClass('load');
		
		$(img).load(function () {
			var objImage=$(this);
			
			
			obj
				.removeClass('load')
				.html(objImage);
		})
		.error(function () {
			
		})
		.attr('src', uri);	
	};
	
}).apply(gallery);
