    <?php $this->renderpartial('/include/header');?><!--加载头部-->
    <div class="nav">
        <div class="return"><a href="<?php echo HostName_Backed;?>/Usermanage/frontindex">返回上一级</a></div>
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
    <form id="J_announce_form" action="<?php echo HostName_Backed;?>/Usermanage/DoAddfrontuser" method="post">
    <div class="h_a">添加用户</div>
    <div class="table_full">
        <table width="100%">
            <colgroup>
                <col class="th">
                <col width="400">
            </colgroup>
            <tr>
                <th>用户名</th>
                <td><span class="must_red">*</span><input name="username" type="text" class="input length_6" placeholder="用户名"></td>
                <td></td>
            </tr>
            <tr>
                <th>用户密码</th>
                <td><span class="must_red">*</span><input name="password" type="text" class="input length_6" placeholder="用户密码"></td>
                <td></td>
            </tr>
            <tr>
                <th>用户邮箱</th>
                <td><span class="must_red">*</span><input name="email" type="text" class="input length_6" placeholder="用户邮箱"></td>
                <td></td>
            </tr>
            <tr class="J_radio_change">
                <th>所属机构</th>
                <td><span class="must_red">*</span>
                    <select style="width:150px;" name="area_id">
                        <?php foreach($servicelist as $key=>$value):?>
                            <option value="<?php echo $value['id'];?>"><?php echo $value['area_name'];?></option>
                        <?php endforeach;?>
                    </select>
                </td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="btn_wrap">
        <div class="btn_wrap_pd">
            <button class="btn btn_submit" id="J_announce_sub" type="submit">提交</button>
        </div>
    </div>
    </form>
    <script src="<?php echo AdminAsset;?>/common.js?v20130227"></script>
    <script>
        Wind.js(GV.JS_ROOT + '/pages/announce/admin/announceSub.js?v=' + GV.JS_VERSION);
    </script>
