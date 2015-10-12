(function(){
	var $btn_unfinish = $("#home-nav-unfinish"),
		$btn_finish = $("#home-nav-finish"),
		$unfinishItems = $("#home-unfinishItems"),
		$finishItems = $("#home-finishItems"),
		$toSubmit = $("#home-header-submit"),
		$nothing = $("#home-nothing");

	$btn_unfinish.click(function() {
		$btn_unfinish.addClass("home-nav-focus");
		$btn_finish.removeClass("home-nav-focus");
		$unfinishItems.css({display: "block"});
		$finishItems.css({display: "none"});
		$("#home-unfinishItems ul").children().length===0 ? $nothing.css({display: "block"}) : $unfinishItems.css({display: "block"});
	});

	$btn_finish.click(function() {
		$btn_finish.addClass("home-nav-focus");
		$btn_unfinish.removeClass("home-nav-focus");
		$unfinishItems.css({display: "none"});
		$("#home-finishItems ul").children().length === 0 ? $nothing.css({display: "block"}) : $finishItems.css({display: "block"});

	});	

	$unfinishItems.click(function() {
		window.location.href = "detail-undo.html";
	});
	$finishItems.click(function() {
		window.location.href = "detail.html";
	});
	$toSubmit.click(function() {
		window.location.href = "submit.html";
	});

	$('.home-inner-finish').dropload({
	    scrollArea : window,
	    loadDownFn : function(me){
	        $.ajax({
	            type: 'GET',
	            //url: 'json/more.json',
	            url: "index.php?m=Home&c=Index&a=firstLoad",
	            dataType: 'json',
	            success: function(data){
	            	var result = '';
	            	for(var i=0; i<5; i++){
	            		result += '<li class="home' + 
	            					'\-itemList' + 
	            					'\-single"><p><span class="hi' + 
	            					'\-single' + 
	            					'\-type">' + 
	            					'修电费' +
	            		 			'</span><span class="hi' +
	            		 			'\-single' + 
	            		 			'\-status">' + 
	            		 			'派出中' + 
									'</span></p><span class="hi' + 
									'\-single' + 
									'\-date">' + 
									'2015' +
									'\-10' +
									'\-5' +
									'</span></li>'
	            	}
	                // 为了测试，延迟1秒加载
	                setTimeout(function(){
	                	$('.home-inner-finish .lists ul').append(result);
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
	$('.home-inner-unfinish').dropload({
	    scrollArea : window,
	    loadDownFn : function(me){
	        $.ajax({
	            type: 'GET',
	            url: "index.php?m=Home&c=Index&a=loadValue",
	            dataType: 'json',
	            success: function(data){
	            	var result = '';
	            	for(var i=0; i<5; i++){
	            		result += '<li class="home' + 
	            					'\-itemList' + 
	            					'\-single"><p><span class="hi' + 
	            					'\-single' + 
	            					'\-type">' + 
	            					'修电费' +
	            		 			'</span><span class="hi' +
	            		 			'\-single' + 
	            		 			'\-status">' + 
	            		 			'已完成' + 
									'</span></p><span class="hi' + 
									'\-single' + 
									'\-date">' + 
									'2015' +
									'\-10' +
									'\-5' +
									'</span></li>'
	            	}
	                // 为了测试，延迟1秒加载
	                setTimeout(function(){
	                	$('.home-inner-unfinish .lists ul').append(result);
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
	var extendList = function(element) {

	}
}());