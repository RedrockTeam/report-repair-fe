<?php if (!defined('THINK_PATH')) exit();?><!-- 
	css 命名规则
	页面-区域（以功能分）-功能
	一个 css 名称最多三级
	若有大于三级的情况，则后面两栏照常写，第一栏为缩写
	功能相同内容不同标签最后一个属性用驼峰
 -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>	
<link rel="stylesheet" href="/report-repair-fe/Public/styles/normalize.min.css">	
<link rel="stylesheet" href="/report-repair-fe/Public/styles/style.debug.css">
<link rel="stylesheet" href="/report-repair-fe/Public/styles/dropload.min.css">	
</head>
<body>
	<header id="home-header">
		<span class="home-header-name">
			<?php echo session('usrname'); ?>
		</span>
		<input type="button" id="home-header-submit" class="home-header-submit" value="报修提交">
	</header>
	<div class="home-nav">
		<div id="home-nav-unfinish" class="home-nav-focus">
			未完成
		</div>
		<div id="home-nav-finish">
			已完成
		</div>
	</div>

	<div id="home-unfinishItems" class="home-itemList home-inner-finish">
		<div class="lists">
			<ul>
				<li class="home-itemList-single">
					<p>
						<span class="hi-single-type">修电费</span>
						<span class="hi-single-status">派出中</span>
					</p>
					<span class="hi-single-date">
						2015-10-3
					</span>
				</li>
				<li class="home-itemList-single">
					<p>
						<span class="hi-single-type">修电费</span>
						<span class="hi-single-status">派出中</span>
					</p>
					<span class="hi-single-date">
						2015-10-3
					</span>
				</li>
				<li class="home-itemList-single">
					<p>
						<span class="hi-single-type">修电费</span>
						<span class="hi-single-status">派出中</span>
					</p>
					<span class="hi-single-date">
						2015-10-3
					</span>
				</li>
				<li class="home-itemList-single">
					<p>
						<span class="hi-single-type">修电费</span>
						<span class="hi-single-status">派出中</span>
					</p>
					<span class="hi-single-date">
						2015-10-3
					</span>
				</li>
				<li class="home-itemList-single">
					<p>
						<span class="hi-single-type">修电费</span>
						<span class="hi-single-status">派出中</span>
					</p>
					<span class="hi-single-date">
						2015-10-3
					</span>
				</li>
			</ul>
		</div>
	</div>

	<div id="home-finishItems" class="home-itemList home-inner-unfinish" style="display: none">
		<div class="lists">
			<ul>
				<li class="home-itemList-single">
					<p>
						<span class="hi-single-type">修电费</span>
						<span class="hi-single-status">已完成</span>
					</p>
					<span class="hi-single-date">
						2015-10-3
					</span>
				</li>
				<li class="home-itemList-single">
					<p>
						<span class="hi-single-type">修电费</span>
						<span class="hi-single-status">已完成</span>
					</p>
					<span class="hi-single-date">
						2015-10-3
					</span>
				</li>
				<li class="home-itemList-single">
					<p>
						<span class="hi-single-type">修电费</span>
						<span class="hi-single-status">已完成</span>
					</p>
					<span class="hi-single-date">
						2015-10-3
					</span>
				</li>
				<li class="home-itemList-single">
					<p>
						<span class="hi-single-type">修电费</span>
						<span class="hi-single-status">已完成</span>
					</p>
					<span class="hi-single-date">
						2015-10-3
					</span>
				</li>
				<li class="home-itemList-single">
					<p>
						<span class="hi-single-type">修电费</span>
						<span class="hi-single-status">已完成</span>
					</p>
					<span class="hi-single-date">
						2015-10-3
					</span>
				</li>
			</ul>
		</div>
	</div>
	<div id="home-nothing" style="display: none">
		<div class="home-nothing-bg">
			
		</div>
		<p class="home-nothing-line">
			东西保管的很好哦
		</p>
	</div>
</body>
<script src="/report-repair-fe/Public/scripts/zepto.js"></script>
<script src="/report-repair-fe/Public/scripts/flexible.js"></script>
<script src="/report-repair-fe/Public/scripts/dropload.min.js"></script>
<script src="/report-repair-fe/Public/scripts/home.js"></script>