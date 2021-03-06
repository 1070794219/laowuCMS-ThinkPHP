<?php if (!defined('THINK_PATH')) exit();?><!-- 登录 -->
<title>管理员登录</title>
<link rel="stylesheet" href="/Public/css/index.css">
<script src="/Public/js/jquery.js"></script>
<script src="/Public/layui/layui.js"></script>
<link rel="stylesheet" href="/Public/layui/css/layui.css">

<div class="layui-main">
    <div class="login-main">
        <form class="layui-form" action="<?php echo U('Admin/Login/login');?>" method="post">
          <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
              <input type="text" name="username" lay-verify="required" autocomplete="off" placeholder="请输入手机号" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
              <input type="password" name="password" lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-input-block">
              <button class="layui-btn" lay-submit="" lay-filter="demo1">登录</button>
            </div>
          </div>

        </form>
    </div>
</div>
<script type="text/javascript">
    layui.use(['form'], function () {
        var form = layui.form(), $ = layui.jquery;
    });
</script>