<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>提交</title>
<link rel="stylesheet" href="/report-repair-fe/Public/styles/normalize.min.css">	
<link rel="stylesheet" href="/report-repair-fe/Public/styles/style.debug.css">	
<style type="text/css">
	.red-font {
		color: #ff5b5b;
	}
</style>
</head>
<body>
	<div id="submit-report">
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
				<div class="rli-itemDetail" >
					<input type="text" class="submit-input" id="submit-phone" placeholder="请输入常用手机号">
				</div>
			</li>
			<li class="report-list-item">
				<div class="placetaker">
					
				</div>
				<div class="rli-item">
					服务项目<span></span>
				</div>
				<div class="rli-itemDetail">
					请选择分类
				</div>
				<i class="iconfont iconfont-star" style="float: right">&#xe62b;</i>
				<div class="rli-itemDetailMore">
					<div class="placetaker">
					
					</div>
					<div class="rli-item">
						<span></span>
					</div>
					<div class="rli-itemDetail">
						请选择分类
					</div>
					<i class="iconfont iconfont-star" style="float: right">&#xe62b;</i>
				</div>
			</li>
			<li class="report-list-item">
				<div class="placetaker">
					
				</div>
				<div class="rli-item">
					服务区域<span></span>
				</div>
				<div class="rli-itemDetail">
					请选择分类
				</div>
				<i class="iconfont iconfont-star" style="float: right">&#xe62b;</i>
				<div class="rli-itemDetailMore">
					<div class="placetaker">
					
					</div>
					<div class="rli-item">
						<span></span>
					</div>
					<div class="rli-itemDetail">
						请选择样式
					</div>
					<i class="iconfont iconfont-star" style="float: right">&#xe62b;</i>
				</div>
			</li>
		</ul>
	</div>
	<div id="submit-response">
		<ul class="report-list">
			<li class="report-list-item">
				<i class="iconfont">&#xe609;</i>
				<div class="rli-item">
					标题<span></span>
				</div>
				<div class="rli-itemDetail" >
					<input type="text" class="submit-input" id="submit-title" placeholder="请输入十字以内">
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe655;</i>
				<div class="rli-item">
					申报内容<span></span>
				</div>
				<div class="rli-itemDetail" >

				</div>
			</li>
			<div class="rli-itemDetailMore"  style="margin-top: 0">
				<textarea class="submit-text" id="submit-text" placeholder="请在这里输入内容"></textarea>
			</div>
		</ul>
	</div>	
	<div class="detail-btn">
		<input type="button" class="btn-confirm" id="submit-btn" value="提      交">
	</div>
</body>
<script src="/report-repair-fe/Public/scripts/zepto.js"></script>
<script src="/report-repair-fe/Public/scripts/flexible.js"></script>
<script src="/report-repair-fe/Public/scripts/submit.js"></script>
<script type="text/javascript">
$(function() {
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
});	
</script>
</html>