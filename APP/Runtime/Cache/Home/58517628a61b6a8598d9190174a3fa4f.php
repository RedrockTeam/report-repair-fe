<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>详情</title>
<link rel="stylesheet" href="/report-repair-fe/Public/styles/normalize.min.css">	
<link rel="stylesheet" href="/report-repair-fe/Public/styles/style.debug.css">
	
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
					<?php echo ($resarr['wx_bxr']); ?>
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe611;</i>
				<div class="rli-item">
					电话<span></span>
				</div>
				<div class="rli-itemDetail">
					<?php echo ($resarr['wx_bxdh']); ?>
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe609;</i>
				<div class="rli-item">
					标题<span></span>
				</div>
				<div class="rli-itemDetail">
					<?php echo ($resarr['wx_bt']); ?>
				</div>
				<i id="detail-title-btn" class="iconfont iconfont-star" style="float: right;transform: rotate(0deg)">&#xe62b;</i>
			</li>
			<li class="report-list-item" id="detail-title-detail" style="height: 0">
				<div class="rli-itemDetail">
					<?php echo ($resarr['wx_bxnr']); ?>
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe636;</i>
				<div class="rli-item">
					服务项目<span></span>
				</div>
				<div class="rli-itemDetail">
					<?php echo ($resarr['wx_bxlxm']); ?>
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
					<?php echo ($resarr['wx_fwqym']); ?>
				</div>
				<div class="rli-itemDetailMore">
					<span>
						<?php echo ($resarr['wx_bxdd']); ?>
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
					<?php echo ($resarr['wx_slr']); ?>
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe676;</i>
				<div class="rli-item">
					满意度<span></span>
				</div>
				<div class="rli-itemDetail">
					<i class="iconfont iconfont-mark">&#xe686;</i>
					<i class="iconfont iconfont-mark">&#xe686;</i>
					<i class="iconfont iconfont-mark">&#xe686;</i>
					<i class="iconfont iconfont-mark">&#xe686;</i>
				</div>
			</li>
			<li class="report-list-item">
				<i class="iconfont">&#xe7d8;</i>
				<div class="rli-item">
					反馈内容<span></span>
				</div>
				<div class="rli-itemDetail">
					
				</div>
			</li>
			<div class="rli-itemDetailMore" style="margin-top: 0;font-size: 20px;">
				<textarea class="submit-text">请在这里输入内容
					
				</textarea>
			</div>
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
<script src="/report-repair-fe/Public/scripts/zepto.js"></script>
<script src="/report-repair-fe/Public/scripts/flexible.js"></script>
<script src="/report-repair-fe/Public/scripts/detail.js"></script>
</html>