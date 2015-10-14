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
<link rel="stylesheet" href="/repair-report/Public/styles/normalize.min.css">	
<link rel="stylesheet" href="/repair-report/Public/styles/style.debug.css">
<link rel="stylesheet" href="/repair-report/Public/styles/dropload.min.css">	
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

	<div id="home-unfinishItems" class="home-itemList home-inner-unfinish">
		<div class="lists">
			<ul>

			</ul>
		</div>
	</div>

	<div id="home-finishItems" class="home-itemList home-inner-finish" style="display: none">
		<div class="lists">
			<ul>
				
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
	<div id="footer" style="width: 100%; height: 20px; background-color: #ccc; position: fixed; bottom:0">
		
	</div>
</body>
<script src="/repair-report/Public/scripts/zepto.js"></script>
<script src="/repair-report/Public/scripts/flexible.js"></script>
<script src="/repair-report/Public/scripts/dropload.min.js"></script>
<script src="/repair-report/Public/scripts/home.js"></script>