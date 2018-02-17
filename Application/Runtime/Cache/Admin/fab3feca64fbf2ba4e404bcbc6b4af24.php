<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/Public/layui/css/layui.css">
<link rel="stylesheet" href="/Public/css/admin.css">
<script src="/Public/layui/layui.js"></script>
<div class="layui-main add-message-main">
	<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
	  <legend>个人信息</legend>
	</fieldset>
	<form class="layui-form" action="<?php echo U('Admin/Article/changeFunc');?>" method="post">
	  	<div class="layui-form-item">
	    	<label class="layui-form-label">标题</label>
	    	<div class="layui-input-block">
	      	<input type="text" name="title" autocomplete="off" class="layui-input" value="<?php echo ($arc['title']); ?>">
	    	</div>
		</div>
		<input type="hidden" name="type" value="<?php echo I('get.type');?>">
		<div class="layui-form-item layui-form-text">
		    <label class="layui-form-label">正文</label>
		    <div class="layui-input-block">
		    	<textarea placeholder="请输入内容" class="layui-textarea" name="body"><?php echo ($arc['body']); ?></textarea>
		    </div>
		</div>
	  <input type="hidden" name="id" value="<?php echo ($arc['id']); ?>">
	  <div class="layui-form-item">
	    <button class="layui-btn" lay-submit="" lay-filter="demo2" style="margin-left:110px">修改信息</button>
	  </div>
	</form>
</div>
<script>
	layui.use('table');
</script>