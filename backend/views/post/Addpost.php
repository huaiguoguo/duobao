	<?php $this->renderpartial('/include/header');?><!--加载头部-->
	<div class="nav">
		<div class="return"><a href="<?php echo HostName_Backed;?>/Post/index">返回上一级</a></div>
	</div>
	<?php
	$lang = array(
		'catelog'=>'',
		'forum' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
		'sub' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
		'sub2' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
		);
		?>
		<!--==============================添加文章================================-->
		<form id="J_announce_form" action="<?php echo HostName_Backed;?>/Post/Addpost" method="post">
			<input type="hidden" name="dosubmit" value="1">
			<div class="h_a">添加咨讯</div>
			<div class="table_full">
				<table width="100%">
					<colgroup>
					<col class="th">
					<col width="400">
				</colgroup>

				<tr class="J_radio_change">
					<th>文章类别</th>
					<td><span class="must_red">*</span>
						<select style="width:150px;" name="category_id">
							<?php foreach($cataloglist as $key=>$value):?>
								<option value="<?php echo $value['id'];?>">
									<?php echo $lang[$value['type']];?></span><?php echo $value['category_name'];?>
								</option>
								<?php foreach($value['forum'] as $ke=>$val):?>
									<option value="<?php echo $val['id'];?>">
										<?php echo $lang[$val['type']];?></span><?php echo $val['category_name'];?>
									</option>
									<?php foreach ($val['sub'] as $kk => $vv):?>
										<option value="<?php echo $vv['id'];?>">
											<?php echo $lang[$vv['type']];?></span><?php echo $vv['category_name'];?>
										</option>
										<?php foreach ($vv['sub2'] as $k => $v):?>
											<option value="<?php echo $v['id'];?>">
												<?php echo $lang[$v['type']];?></span><?php echo $v['category_name'];?>
											</option>
										<?php endforeach;?>
									<?php endforeach;?>
								<?php endforeach;?>
							<?php endforeach;?>
						</select>
					</td>
					<td></td>
				</tr>
				<tr>
					<th>文章标题</th>
					<td><span class="must_red">*</span><input name="subject" type="text" class="input length_6" placeholder="公告标题"></td>
					<td></td>
				</tr>
				<tbody id="J_announce_content" class="J_radio_tbody">
					<tr>
						<th>文章内容</th>
						<td colspan="2"><span class="must_red">*</span><textarea id="J_textarea" name="content" style="width:800px;height:300px;"></textarea></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="btn_wrap">
			<div class="btn_wrap_pd">
				<button class="btn btn_submit" id="J_announce_sub" type="submit">提交</button>
			</div>
		</div>
		<input type="hidden" name="csrf_token" value="35a6a2ca65ef0268"/></form>
		<script src="<?php echo AdminAsset;?>/common.js?v20130227"></script>
		<script>
			Wind.js(GV.JS_ROOT + '/pages/announce/admin/announceSub.js?v=' + GV.JS_VERSION);
		</script>
