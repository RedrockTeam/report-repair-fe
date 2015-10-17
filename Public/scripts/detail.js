(function(){
	var $detailBtn = $("#detail-title-btn");
	var $ditailDetail = $("#detail-title-detail");
	var $detailStars = $(".rli-itemDetail .iconfont-mark");
	var $detailConfirm = $("#detail-confirm");
	var $failContainer = $("#fail-container");
	var $failConfirm = $("#fail-btn");
	var mark = 2;
	var feedback = '';

	if($("#detail-response-people").text().toString().length === 10) {
			$("#detail-response-satisfy").css({display: "none"});
			$("#detail-response-detail").css({display: "none"});
			$("#detail-response-text").css({display: "none"});
			$("#detail-response-people").text("后台处理中，请稍等");
			$("#detail-response-people").css({borderBottom: "0px",color: "#ccc"});
		}

	$detailBtn.click(function(){
		if($detailBtn.css("transform")==="rotate(0deg)" || $detailBtn.css("-webkit-transform")==="matrix(1, 0, 0, 1, 0, 0)") {
			$detailBtn.css({transform: "rotate(180deg)"});
			$detailBtn.css({"-webkit-transform": "matrix(-1, 0, 0, -1, 0, 0)"});
			$ditailDetail.css({height: "auto",paddingTop: "0.5625rem",paddingBottom: "0.5625rem",borderBottom: "1px solid #ccc"});
		}else {
			$detailBtn.css({transform: "rotate(0deg)"});
			$detailBtn.css({"-webkit-transform": "matrix(1, 0, 0, 1, 0, 0)"});
			$ditailDetail.css({height: 0,paddingTop: 0,paddingBottom: 0,borderBottom: "0px"});
		}
	});

	for(var i=0; i<$detailStars.length; i++) {
		$detailStars[i].index=i;
		(function() {
			$detailStars[i].addEventListener('click', function(){
				starMark(this.index);
				mark=this.index+1;
			}, false);
		}());
	}

	var starMark = function(index) {
		for(i=0; i<=$detailStars.length-1; i++) {
			$detailStars[i].innerHTML = i <= index ? "&#xe685;" : "&#xe686;"; 
		}
	}

	starMark(1); //默认给两颗星

	$detailConfirm.click(function(){
		//$failContainer.css({display: "block", marginTop: window.scrollY + "px", height: document.documentElement.clientHeight  + "px"});
		feedback = $("#detail-text").val();
		$.ajax({
			type: 'POST',
			url: "index.php?m=Home&c=Detail&a=returnVisit",
			data: {"hfmyd": mark, "hfjy": feedback},
			dataType: 'json',
			success: function(data) {
				window.location.href = "index.php?m=Home&c=Detail&a=thanks";
			},
			error: function(xhr, type) {
				$failContainer.css({display: "block", marginTop: window.scrollY + "px", height: document.documentElement.clientHeight  + "px"});
				$(window).scroll(function() {
					$failContainer.css({marginTop: window.scrollY + "px", height: document.documentElement.clientHeight  + "px"});
				});
			}
		});
	});

	$failConfirm.click(function(){
		$failContainer.css({display: "none"});
	});									
}());