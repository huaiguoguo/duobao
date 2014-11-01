</div>
<script src="<?php echo AdminAsset;?>/js/dev/pages/admin/common/common.js?v20130227"></script>
<script src="<?php echo AdminAsset;?>/submenu_config.js"></script>
<script>

$(function(){
	//站点状态
	var status_title = {
		s1 : '允许任何人访问站点',
		s2 : '特定会员才能访问站点，通常用于站点内部测试、调试',
		s3 : '除创始人，其他用户不允许访问站点，一般用于站点关闭、系统维护等情况'
	};

	var checked = $('#J_status_type input:checked');
		statusAreaShow(checked.data('type'));
		statusTitle(checked.data('title'));

	$('#J_status_type input:radio').on('change', function(){
			statusAreaShow($(this).data('type'));
			statusTitle($(this).data('title'));
	});

	//切换显示版块
	function statusAreaShow(type) {
		var status_arr= new Array();
		status_arr = type.split(",");
		$('table.J_status_tbody').hide();
		$.each(status_arr, function(i, o){
			$('#'+ o).show();
		});
	}
	//切换提示文案
	function statusTitle(title){
		$('#J_status_tip').text(status_title[title]);
	}
});
</script>
</body>
</html>
