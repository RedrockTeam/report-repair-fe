

//		不能获取的那个接口在第 169 行
/*
	+	我通过 ajax 获取的 data 是这种 [Object,Object,...] （一个 Object 是一条信息）
		(放在数组里的，目前获取数据长度是每次获取 1 个数组，数组里有 1 个，像这样 [Object] )

	+	以后传值的时候也是这么（几条放在数组里）传哈？
		我写法默认是这样的（每次 ajax 的时候我能获取的数量是你控制，比如说五条还是啥的，给几条我就渲染几条）

	+	添加了拖动计数的变量

	+	还有个小小的建议，未完成和已完成方不方便分别写在
		index.php?m=Home&c=Index&a=finishFirstLoad 
		index.php?m=Home&c=Index&a=unfinishFirstLoad
		里？（不方便的话拿到 已完成数据 的接口我改也行，不难）

		（因为首页加载的时候是写的 index.php?m=Home&c=Index&a=firstLoad ）
		只渲染了 未完成 的页面， 已完成 并没有初始化

	+	有什么需要我准备的跟我说嘛，我对接口之前提前准备一下，这样都快一些
	
	+	Thanks	

*/
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
		if(finishDrag === 0 && finishClick === 0) {
			$.ajax({	//首页加载-已完成
	            type: 'GET',
	            url: "index.php?m=Home&c=Index&a=firstLoad", //地址对么？
	            dataType: 'json',
	            success: function(data){
	            	finishClick++;
	            	data.length===0 ? $nothing.css({display: "block"}) : $finishItems.css({display: "block"});
	            	var result = '';
	            	for(var i=0; i<data.length; i++){
	            		result += '<li class="home' + 
	            					'\-itemList' + 
	            					'\-single"><p><span class="hi' + 
	            					'\-single' + 
	            					'\-type">' + 
	            					data[i].wx_bxlxm +
	            		 			'</span><span class="hi' +
	            		 			'\-single' + 
	            		 			'\-status">' + 
	            		 			data[i].wx_wxztm + 
									'</span></p><span class="hi' + 
									'\-single' + 
									'\-date">' + 
									data[i].wx_bxsj.split(" ")[0].split("-")[0] + '\-' +
									data[i].wx_bxsj.split(" ")[0].split("-")[1] + '\-' +
									data[i].wx_bxsj.split(" ")[0].split("-")[1] + '\-' +
									'</span></li>'
	            	}
	                $('.home-inner-finish .lists ul').append(result);
	            },
	            error: function(xhr, type){
	                alert('Ajax error!');
	            }
	        });
		}
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

	
	var pageLoad = function() {	//首页加载
			$.ajax({		//首页加载-未完成		
	            type: 'GET',
	            url: "index.php?m=Home&c=Index&a=firstLoad",
	            dataType: 'json',
	            success: function(data){
	            	data.length===0 ? $nothing.css({display: "block"}) : $unfinishItems.css({display: "block"});
	            	var result = '';
	            	for(var i=0; i<data.length; i++){
	            		result += '<li class="home' + 
	            					'\-itemList' + 
	            					'\-single"><p><span class="hi' + 
	            					'\-single' + 
	            					'\-type">' + 
	            					data[i].wx_bxlxm +
	            		 			'</span><span class="hi' +
	            		 			'\-single' + 
	            		 			'\-status">' + 
	            		 			data[i].wx_wxztm + 
									'</span></p><span class="hi' + 
									'\-single' + 
									'\-date">' + 
									data[i].wx_bxsj.split(" ")[0].split("-")[0] + '\-' +
									data[i].wx_bxsj.split(" ")[0].split("-")[1] + '\-' +
									data[i].wx_bxsj.split(" ")[0].split("-")[1] + '\-' +
									'</span></li>'
	            	}
	                $('.home-inner-unfinish .lists ul').append(result);
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
	        $.ajax({
	            type: 'GET',
	            url: "index.php?m=Home&c=Index&a=LoadUnfinishedData",
	            dataType: 'json',
	            success: function(data){
	            	if(data.length !== 0) {
	            		unfinishDrag ++;
	            	}
	            	var result = '';
	            	for(var i=0; i<data.length; i++){
	            		result += '<li class="home' + 
	            					'\-itemList' + 
	            					'\-single"><p><span class="hi' + 
	            					'\-single' + 
	            					'\-type">' + 
	            					data[i].wx_bxlxm +
	            		 			'</span><span class="hi' +
	            		 			'\-single' + 
	            		 			'\-status">' + 
	            		 			data[i].wx_wxztm + 
									'</span></p><span class="hi' + 
									'\-single' + 
									'\-date">' + 
									data[i].wx_bxsj.split(" ")[0].split("-")[0] + '\-' +
									data[i].wx_bxsj.split(" ")[0].split("-")[1] + '\-' +
									data[i].wx_bxsj.split(" ")[0].split("-")[1] + '\-' +
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

	$('.home-inner-finish').dropload({ //已完成-下拉
	    scrollArea : window,
	    loadDownFn : function(me){
	        $.ajax({
	            type: 'GET',
	            url: "index.php?m=Home&c=Index&a=LoadFinishedData",		//这里获取不到数据？我换成 LoadunFinishedData 可以获取，应该是接口有问题
	            dataType: 'json',
	            success: function(data){
	            	console.log(data);
	            	if(data.length !== 0) {
	            		finishDrag++;
	            		console.log(finishDrag);
	            	}
	            	var result = '';
	            	for(var i=0; i<data.length; i++){
	            		result += '<li class="home' + 
	            					'\-itemList' + 
	            					'\-single"><p><span class="hi' + 
	            					'\-single' + 
	            					'\-type">' + 
	            					data[i].wx_bxlxm +
	            		 			'</span><span class="hi' +
	            		 			'\-single' + 
	            		 			'\-status">' + 
	            		 			data[i].wx_wxztm + 
									'</span></p><span class="hi' + 
									'\-single' + 
									'\-date">' + 
									data[i].wx_bxsj.split(" ")[0].split("-")[0] + '\-' +
									data[i].wx_bxsj.split(" ")[0].split("-")[1] + '\-' +
									data[i].wx_bxsj.split(" ")[0].split("-")[1] + '\-' +
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

}());