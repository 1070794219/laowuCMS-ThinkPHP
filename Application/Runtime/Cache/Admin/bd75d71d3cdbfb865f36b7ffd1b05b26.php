<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/Public/css/admin.css">
<script src="/Public/js/jquery.js"></script>
<script src="/Public/layui/layui.js"></script>
<link rel="stylesheet" href="/Public/layui/css/layui.css">

<div class="layui-main classify-main">
	<div style="margin-left:50px;margin-top:50px">
		<button class="layui-btn layui-btn-normal" id="addData">添加</button>
		<table id="list" lay-filter="list"></table>
	</div>
</div>

<script>
layui.use('table', function(){
  var table = layui.table;
  var type = "<?php echo ($type); ?>";
  var url = "<?php echo U('Admin/Classify/getList');?>";
  //第一个实例
  table.render({
    elem: '#list'
    ,height: 500
    ,width:550
    ,where:{type:type}
    ,url: url //数据接口
    ,page: true //开启分页
    ,cols: [[ //表头
    	{checkbox: true, fixed: true}
      ,{field: 'id', title: 'ID', width:100, sort: true, fixed: 'left'}
      ,{field: 'name', title: '名称', width:100}
      ,{field: 'time', title: '添加时间', width:150, sort: true}
      ,{field:'right', title: '操作', width:150,toolbar:"#listBar"}
    ]]
  });

  var list = new Array();
  table.on('checkbox(list)', function(res){
	   //得到checkbox原始DOM对象
	  if (res.checked == true) {
		list.push(res.data.id)
	  }else{
  	    $.each(list,function(index,item){  
	        // index是索引值（即下标）   item是每次遍历得到的值；
	        if(item==res.data.id){
	       	    list.splice(index,1);
	    	}
     	});
	  }
	  console.log(list);
	}); 

  //监听工具条
  table.on('tool(list)', function(obj){
    var data = obj.data;
    var tr = obj.tr; //获得当前行 tr 的DOM对象
    var id = parseInt(tr.find("td[data-field='id']").find("div").html());
	if(obj.event === 'del'){
      	window.location.href = "<?php echo U('Admin/Classify/delete');?>" + "?type=<?php echo ($type); ?>&id=" + id;
    } else if(obj.event === 'edit'){
        layer.prompt({
            formType: 0
            ,title: '修改 ID 为 ['+ data.id +'] 的名称'
            ,value: data.name
        }, function(value, index){
         //这里一般是发送修改的Ajax请求
            // window.location.href =  + "?type=<?php echo ($type); ?>&id=" + id + "&name=" + value;
            $.post("<?php echo U('Admin/Classify/change');?>",{type:"<?php echo ($type); ?>",id:id,name:value},function(res){
            	layer.msg('修改成功');
            	layer.close(index);
    	        obj.update({
                    name: value
                });
            })
        });
    }
  });
});

</script>

<script>
    var table = layui.table;
	$(function(){
		$('#addData').click(function(){
			layer.prompt({
	            formType: 0
	            ,title: '添加新数据'
	        }, function(value, index){
	         //这里一般是发送修改的Ajax请求
	            // window.location.href =  + "?type=<?php echo ($type); ?>&id=" + id + "&name=" + value;
	            $.post("<?php echo U('Admin/Classify/add');?>",{type:"<?php echo ($type); ?>",name:value},function(res){
	            	layer.msg("添加成功");
	            	layer.close(index);
	            	table.reload();
	            	// window.location.reload();
	            })
	        });
		});
	});
</script>

<script type="text/html" id="listBar">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
</script>