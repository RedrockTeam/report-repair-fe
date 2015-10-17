$(function() {
	var $submitBtn = $("#submit-btn");

	$submitBtn.click(function(){
		window.location.href = "submit-suc.html";
	});

	$("#submit-phone").blur(function() {
		var _this = $("#submit-phone");
		var tel = _this.val();
		var telReg = !!tel.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
		if(telReg == false){
 			_this.val("请输入正确的手机号");
 			_this.addClass("red-font");
		}
	});
	$("#submit-phone").focus(function() {
		var _this = $("#submit-phone");
		_this.val("");
		_this.removeClass("red-font");
	});
	$("#submit-title").blur(function() {
		var _this = $("#submit-title")
		var title = _this.val();
		var valReg = !!title.match(/^[\u4e00-\u9fa5]{1,10}$/);
		if(valReg == false){
 			_this.val("请输入正确格式标题");
 			_this.addClass("red-font");
		}
	});
	$("#submit-title").focus(function() {
		var _this = $("#submit-title");
		_this.val("");
		_this.removeClass("red-font");
	});
	$("#submit-place").blur(function() {
		var _this = $("#submit-place")
		var place = _this.val();
		var valReg = !!place.match(/^[\u4e00-\u9fa5]{1,10}$/);
		if(valReg == false){
 			_this.val("请输入正确格式地址");
 			_this.addClass("red-font");
		}
	});
	$("#submit-place").focus(function() {
		var _this = $("#submit-place");
		_this.val("");
		_this.removeClass("red-font");
	});

	var $serviceItem = $("#submit-service-item"),
		$serviceItemContainer = $("#submit-service-item-container"),
		$serviceArea = $("#submit-service-area"),
		$serviceAreaContainer = $("#submit-service-area-container");

		$("#service-item-controller").click(function(){
			if($("#service-item-controller").css("transform")==="rotate(0deg)" || $("#service-item-controller").css("-webkit-transform")==="matrix(1, 0, 0, 1, 0, 0)") {
				$("#service-item-controller").css({transform: "rotate(180deg)"});
				$("#service-item-controller").css({"-webkit-transform": "matrix(-1, 0, 0, -1, 0, 0)"});
				$serviceItemContainer.css({height: "auto",paddingTop: "0.5625rem",paddingBottom: "0.5625rem",borderBottom: "1px solid #ccc"});
			}else {
				$("#service-item-controller").css({transform: "rotate(0deg)"});
				$("#service-item-controller").css({"-webkit-transform": "matrix(1, 0, 0, 1, 0, 0)"});
				$serviceItemContainer.css({height: 0,paddingTop: 0,paddingBottom: 0,borderBottom: "0px"});
			}
		});
		$("#service-area-controller").click(function(){
			if($("#service-area-controller").css("transform")==="rotate(0deg)" || $("#service-area-controller").css("-webkit-transform")==="matrix(1, 0, 0, 1, 0, 0)") {
				$("#service-area-controller").css({transform: "rotate(180deg)"});
				$("#service-area-controller").css({"-webkit-transform": "matrix(-1, 0, 0, -1, 0, 0)"});
				$serviceAreaContainer.css({height: "auto",paddingTop: "0.5625rem",paddingBottom: "0.5625rem",borderBottom: "1px solid #ccc"});
			}else {
				$("#service-area-controller").css({transform: "rotate(0deg)"});
				$("#service-area-controller").css({"-webkit-transform": "matrix(1, 0, 0, 1, 0, 0)"});
				$serviceAreaContainer.css({height: 0,paddingTop: 0,paddingBottom: 0,borderBottom: "0px"});
			}
		});

		var addClick = function(element, toAdd) {
			element.addEventListener("click", function() {
				toAdd.text(element.innerHTML);
			});
		}

		for(var i=0; i<$("#submit-service-area li").length; i++) {
			addClick($("#submit-service-area li")[i], $("#service-area"));
		}
		for(var i=0; i<$("#submit-service-item li").length; i++) {
			addClick($("#submit-service-item li")[i], $("#service-item"));
		}
});