<link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">

<script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>
<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="/content/index">内容管理</a> <span class="divider">/</span></li>
        <li class="active">分类管理</li>
    </ul>
    <ul class="nav nav-tabs">

        <li class="dropdown pull-right">
            <a href="/content/category/add">添加分类</a>
        </li>
    </ul>
    <table width="100%" class="table table-hover easyui-treegrid" title="分类表"  data-options="
				url: '/content/api/category',
				method: 'get',
				idField: 'id',
				treeField: 'name'
			">
        <thead>
        <tr>
            <th data-options="field:'id'"  align="middle" >ID</th>
            <th data-options="field:'sort'"  align="middle" >排序</th>
            <th data-options="field:'name'"  align="middle" >分类名称</th>
            <th data-options="field:'action'"  align="middle">操作</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <div class="pagination pagination-right">
        <ul></ul>
    </div>
</div>
<script type="text/javascript">
    function checkDelete(id){
        if(confirm("确定删除内容吗")){
            location.href = "/content/category/delete?id="+id;
        }
    }
</script>
