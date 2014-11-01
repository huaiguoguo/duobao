<?php $this->renderpartial('/include/header');?><!--加载头部-->
<div class="nav">
	<ul class="cc">
		<li class="current"><a href="<?php echo HostName_Backed;?>/default/TransactionManagement">事务办理文章</a></li>
		<?php if($this->adminuserinfo['parent_id'] == 0):?>
		<li><a href="<?php echo HostName_Backed;?>/default/TransactionManagementCatelog">事务办理分类</a></li>
		<?php endif;?>
	</ul>
</div>
<!--==============================咨讯列表================================-->
	<div class="mb10">
		<a href="<?php echo HostName_Backed;?>/default/addpost" class="btn" title="添加文章"><span class="add"></span>添加咨讯</a>
	</div>
	<form class="J_ajaxForm" action="<?php echo HostName_Backed;?>/default/postdel" method="post">
	<div class="table_list">
		<table width="100%">
			<colgroup>
				<col width="80">
				<col>
				<col width="120">
				<col width="100">
				<col width="260">
				<col width="160">
			</colgroup>
			<thead>
				<tr>
					<td><label><input type="checkbox" name="checkAll" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label></td>

					<td>标题</td>
					<td>类别</td>
					<td>发布者</td>
					<td>发表时间</td>
					<td>操作</td>
				</tr>
			</thead>
			<tbody id="J_link_tr">
			<?php foreach($postlist as $key=>$value):?>
				<tr>
					<td>
					<input class="J_check" data-xid="J_check_x" data-yid="J_check_y" type="checkbox" name="pid[]" value="<?php echo $value['id'];?>">
					</td>
					<td><?php echo $value->title;?></td>
					<td><span class="green"><?php echo $value->Category->category_name;?></span></td>
					<td>admin</td>
					<td><?php echo date("Y-m-d H:i:s",$value->create_time);?></td>
					<td>
					<a href="<?php echo HostName_Backed;?>/default/Editpost?pid=<?php echo $value['id'];?>" title="编辑文章" class="mr10">[编辑]</a>
					<a href="<?php echo HostName_Backed;?>/default/postdel?pid=<?php echo $value['id'];?>" class="mr10 J_ajax_del" data-pdata="{'aid': '<?php echo $value['id'];?>'}">[删除]</a></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
		<div class="p10">

		<link href="<?php echo AdminAsset;?>/css/pager.css?v20130227" rel="stylesheet" />
		<div id="pages" class="clearfix">
		    <?php
			    $this->widget('CLinkPagerDiy',array(
			        'header'=>'',
			        'cssFile'=>AdminAsset.'/css/pager.css',
			        'firstPageLabel' => '首页',
			        'lastPageLabel' => '末页',
			        'prevPageLabel' => '«&nbsp;上一页',
			        'nextPageLabel' => '下一页&nbsp;»',
			        'pages' => $pages,
			        'maxButtonCount'=>5,
			        'htmlOptions'=>array(),
			        'footer'=>'',
			      )
			    );
		    ?>
		</div>


		</div>
	</div>
		<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<label class="mr20"><input type="checkbox" name="checkAll" class="J_check_all" data-direction="x" data-checklist="J_check_x">全选</label>
			<button type="button" id="J_link_del_all" class="btn /*btn_submit*/">删除</button>
		</div>
	</div>
		<input type="hidden" name="csrf_token" value="35a6a2ca65ef0268"/></form>
</div>

<script src="<?php echo AdminAsset;?>/common.js?v20130227"></script>



<script type="text/javascript">
Wind.use('dialog',function() {

	//分类筛选
	var link_tr = $('#J_link_tr > tr');
	$('#J_link_types').on('change', function(){
		link_tr.hide();
		var $this = $(this), v = $this.val();
		if(v) {
			$('.J_link_'+ v).parents('tr').show();
		}else{
			link_tr.show();
		}
	});

	//批量删除
	$('#J_link_del_all').on('click', function(e){
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定至一条记录');
			return;
		}
		Wind.dialog({
			message	: '确定删除选定的咨讯？',
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : "<?php echo HostName_Backed;?>/default/postdel",
					success	 : function(data, statusText, xhr, $form) {
						if(data.state === 'success') {
							var location = window.location;
							location.href = location.pathname + location.search;
						}else{
							Wind.dialog.alert(data.message);
						}
					}
				});
			}
		});

	});
});
</script>
