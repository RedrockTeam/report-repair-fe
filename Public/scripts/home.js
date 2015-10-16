(function(){
	var $btn_unfinish = $("#home-nav-unfinish"),
		$btn_finish = $("#home-nav-finish"),
		$unfinishItems = $("#home-unfinishItems"),
		$finishItems = $("#home-finishItems"),
		$toSubmit = $("#home-header-submit"),
		$nothing = $("#home-nothing"),
		unfinishDrag = 0,
		finishDrag = 0,
		finishClick = 0;

	$btn_unfinish.click(function() {
		$btn_unfinish.addClass("home-nav-focus");
		$btn_finish.removeClass("home-nav-focus");
		$finishItems.css({display: "none"});
		if($("#home-unfinishItems ul").children().length===0) {
			$nothing.css({display: "block"});
		}else {
			$nothing.css({display: "none"});
			$unfinishItems.css({display: "block"});
		}
	});

	$btn_finish.click(function() {
		$btn_finish.addClass("home-nav-focus");
		$btn_unfinish.removeClass("home-nav-focus");
		$unfinishItems.css({display: "none"});
		if($("#home-finishItems ul").children().length===0) {
			$nothing.css({display: "block"});
		}else {
			$nothing.css({display: "none"});
			$finishItems.css({display: "block"});
		}
		if(finishDrag === 0 && finishClick === 0) {		//第一次加载的条件，点击数为 0，拖动数为 0
			$.ajax({
	            type: 'GET',
	            url: "index.php?m=Home&c=Index&a=LoadfinishedData&time="+finishDrag, 
	            dataType: 'json',
	            success: function(data){
	            	finishClick++;
	            	if(data.length===0) {
	            		$nothing.css({display: "block"});
	            	}else {
	            		$finishItems.css({display: "block"});
	            		$nothing.css({display: "none"});
	            	}
	            	var result = '';
	            	for(var i=0; i<data.length; i++){
	            		result += '<li class="home-itemList-single" dataid=' +
	            					data[i].wx_djh +
	            					'><p><span class="hi-single-type">' + 
	            					data[i].wx_bxlxm +
	            		 			'</span><span class="hi-single-status">' + 
	            		 			data[i].wx_wxztm + 
									'</span></p><span class="hi-single-date">' + 
									data[i].wx_bxsj.split(" ")[0] + 
									'</span></li>'
	            	}
	                $('.home-inner-finish .lists ul').append(result);
	                for(var i=0; i<$('.home-inner-finish .lists ul li').length; i++) {
	                	sayDataId($('.home-inner-finish .lists ul li')[i]);
	                }
	            },
	            error: function(xhr, type){
	                alert('Ajax error!');
	            }
	        });
		}
	});	

	$toSubmit.click(function() {
		window.location.href = "submit.html";
	});

	
	var pageLoad = function() {	//首页加载
			$.ajax({		//首页加载-未完成		
	            type: 'GET',
	            url: "index.php?m=Home&c=Index&a=firstLoad&time="+unfinishDrag,
	            dataType: 'json',
	            success: function(data){
	            	data.length===0 ? $nothing.css({display: "block"}) : $unfinishItems.css({display: "block"});
	            	var result = '';
	            	for(var i=0; i<data.length; i++){
	            		result += '<li class="home-itemList-single" dataid=' +
	            					data[i].wx_djh +
	            					'><p><span class="hi-single-type">' + 
	            					data[i].wx_bxlxm +
	            		 			'</span><span class="hi-single-status">' + 
	            		 			data[i].wx_wxztm + 
									'</span></p><span class="hi-single-date">' + 
									data[i].wx_bxsj.split(" ")[0] + 
									'</span></li>'
	            	}
	                $('.home-inner-unfinish .lists ul').append(result);
	                for(var i=0; i<$('.home-inner-unfinish .lists ul li').length; i++) {
	                	sayDataId($('.home-inner-unfinish .lists ul li')[i]);
	                }
	            },
	            error: function(xhr, type){
	                alert('Ajax error!');
	            }
	        });		
		}

	pageLoad();	//直接执行加载首页函数

	$('.home-inner-unfinish').dropload({  //未完成-下拉
	    scrollArea : window,
	    loadDownFn : function(me){
	    	unfinishDrag++;
	        $.ajax({
	            type: 'GET',
	            url: "index.php?m=Home&c=Index&a=LoadUnfinishedData&time="+unfinishDrag,
	            dataType: 'json',
	            success: function(data){
	            	var listLength = $('.home-inner-unfinish .lists ul li').length;
	            	var result = '';
	            	for(var i=0; i<data.length; i++){
	            		result += '<li class="home-itemList-single" dataid=' +
	            					data[i].wx_djh +
	            					'><p><span class="hi-single-type">' + 
	            					data[i].wx_bxlxm +
	            		 			'</span><span class="hi-single-status">' + 
	            		 			data[i].wx_wxztm + 
									'</span></p><span class="hi-single-date">' + 
									data[i].wx_bxsj.split(" ")[0] + 
									'</span></li>'
	            	}
	                setTimeout(function(){
	                	$('.home-inner-unfinish .lists ul').append(result);
	                	for(var i=listLength; i<$('.home-inner-unfinish .lists ul li').length; i++) {
	                		sayDataId($('.home-inner-unfinish .lists ul li')[i]);
	                	}
	                    me.resetload();
	                },500);
	            },
	            error: function(xhr, type){
	                alert('Ajax error!');
	                me.resetload();
	            }
	        });
	    }
	});

	$('.home-inner-finish').dropload({ //已完成-下拉
	    scrollArea : window,
	    loadDownFn : function(me){
	    	finishDrag++;
	        $.ajax({
	            type: 'GET',
	            url: "index.php?m=Home&c=Index&a=LoadFinishedData&time="+finishDrag,	
	            dataType: 'json',
	            success: function(data){
	            	var listLength = $('.home-inner-finish .lists ul li').length;
	            	var result = '';
	            	for(var i=0; i<data.length; i++){
	            		result += '<li class="home-itemList-single" dataid=' +
	            					data[i].wx_djh +
	            					'><p><span class="hi-single-type">' + 
	            					data[i].wx_bxlxm +
	            		 			'</span><span class="hi-single-status">' + 
	            		 			data[i].wx_wxztm + 
									'</span></p><span class="hi-single-date">' + 
									data[i].wx_bxsj.split(" ")[0] + 
									'</span></li>'
	            	}
	                setTimeout(function(){
	                	$('.home-inner-finish .lists ul').append(result);
	                	for(var i=listLength; i<$('.home-inner-finish .lists ul li').length; i++) {
	                		sayDataId($('.home-inner-finish .lists ul li')[i]);
	                	}
	                    me.resetload();
	                },500);
	            },
	            error: function(xhr, type){
	                alert('Ajax error!');
	                me.resetload();
	            }
	        });
	    }
	});


	var sayDataId = function(element) {
		element.addEventListener("click", function() {
			//console.log(element.getAttribute("dataId"));		// 这里写跳转，对接口
			//alert(element.getAttribute("dataId"));
			var dataId = element.getAttribute("dataid");
			console.log(dataId)
			window.location.href="index.php?m=Home&c=Detail&a=index&wx_djh="+dataId;
		}, false);
	}
}());