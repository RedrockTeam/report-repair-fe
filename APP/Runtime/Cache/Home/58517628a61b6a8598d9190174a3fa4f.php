<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>详情</title>
<link rel="stylesheet" href="/report/Public/styles/normalize.min.css">	
<link rel="stylesheet" href="/report/Public/styles/style.debug.css">	
</head>
<body>
	<div id="detail-report">
		<ul class="report-list">
			<li class="report-list-item">
				<i class="iconfont">&#xe616;</i>
				<div class="rli-item">
					申报人<span></span>
				</div>
				<div class="rli-itemDetail">
					陈定攀
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe611;</i>
				<div class="rli-item">
					电话<span></span>
				</div>
				<div class="rli-itemDetail">
					13500123456
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe609;</i>
				<div class="rli-item">
					标题<span></span>
				</div>
				<div class="rli-itemDetail">
					开关坏了！
				</div>
				<i id="detail-title-btn" class="iconfont iconfont-star" style="float: right;transform: rotate(0deg)">&#xe62b;</i>
			</li>
			<li class="report-list-item" id="detail-title-detail" style="height: 0">
				<div class="rli-itemDetail">
					重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe636;</i>
				<div class="rli-item">
					服务项目<span></span>
				</div>
				<div class="rli-itemDetail">
					电器
				</div>
				<div class="rli-itemDetailMore">
					<span>
						开关
					</span>
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe626;</i>
				<div class="rli-item">
					服务区域<span></span>
				</div>
				<div class="rli-itemDetail">
					教学区
				</div>
				<div class="rli-itemDetailMore">
					<span>
						第三教学楼
					</span>
				</div>
			</li>
		</ul>
	</div>
	<div id="detail-response">
		<ul class="report-list">
			<li class="report-list-item">
				<i class="iconfont">&#xe60c;</i>
				<div class="rli-item">
					负责人<span></span>
				</div>
				<div class="rli-itemDetail">
					隔壁老王
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe676;</i>
				<div class="rli-item">
					满意度<span></span>
				</div>
				<div class="rli-itemDetail">
					<i class="iconfont iconfont-star">&#xe686;</i>
					<i class="iconfont iconfont-star">&#xe686;</i>
					<i class="iconfont iconfont-star">&#xe686;</i>
					<i class="iconfont iconfont-star">&#xe686;</i>
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe7d8;</i>
				<div class="rli-item">
					反馈内容<span></span>
				</div>
				<div class="rli-itemDetail">
					
				</div>
				<div class="rli-itemDetailMore">
					<p>
						重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重庆邮电大学重
					</p>
				</div>
			</li>
		</ul>
	</div>	
	<div class="detail-btn">
		<input type="button" class="btn-confirm" value="确      认" id="detail-confirm">
	</div>
	<div id="fail-container" style="display: none">
		<div id="fail">
			<div class="fail-img">
			
			</div>
			<p class="fail-line1">
				提交失败
			</p>
			<p class="fail-line2">
				稍后再来试试吧
			</p>
			<input type="button" class="fail-btn" id="fail-btn" value="确定">
		</div>
	</div>
</body>
<script src="/report/Public/scripts/zepto.js"></script>
<script src="/report/Public/scripts/flexible.js"></script>
<script type="text/javascript">
(function(){
	var $detailBtn = $("#detail-title-btn");
	var $ditailDetail = $("#detail-title-detail");
	var $detailStars = $(".rli-itemDetail .iconfont-star");
	var $detailConfirm = $("#detail-confirm");
	var $failContainer = $("#fail-container");
	var $failConfirm = $("#fail-btn");

	$detailBtn.click(function(){
		if($detailBtn.css("transform")==="rotate(0deg)") {
			$detailBtn.css({transform: "rotate(180deg)"});
			$ditailDetail.css({height: "auto",paddingTop: "0.5625rem",paddingBottom: "0.5625rem"});
		}else {
			$detailBtn.css({transform: "rotate(0deg)"});
			$ditailDetail.css({height: 0,paddingTop: 0,paddingBottom: 0});
		}
	});

	for(var i=0; i<$detailStars.length; i++) {
		(function() {
			$detailStars[i].addEventListener('click', function(){
				this.innerHTML = "&#xe685;";
			}, false);
		}());
	}									/* 点星星有闭包问题 */

	$detailConfirm.click(function(){
		$failContainer.css({display: "block", marginTop: window.scrollY + "px", height: document.documentElement.clientHeight  + "px"});
	});

	$failConfirm.click(function(){
		$failContainer.css({display: "none"});
	});									/* 待做防止滑动 */

}());
</script>
</html>