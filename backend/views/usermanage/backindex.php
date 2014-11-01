<?php $this->renderpartial('/include/header');?><!--加载头部-->
    <div class="nav">
        <ul class="cc">
            <li class="current"><a href="<?php echo HostName_Backed;?>/Usermanage/backindex">用户管理</a></li>
        </ul>
    </div>
<!--     <div class="h_a">提示信息</div>
    <div class="mb10 prompt_text">
        <ol>
            <li>用户名和电子邮箱支持模糊搜索。用户名或电子邮箱输入“a” 则检索出所有以a开头的用户名或电子邮箱。</li>
            <li>可以对用户的基本信息、积分信息、用户组，以及用户产生的内容进行管理。</li>
        </ol>
    </div> -->
    <div class="mb10"><a class="btn J_dialog" href="<?php echo HostName_Backed;?>/Usermanage/addbackuser" title="添加用户" role="button"><span class="add"></span>添加用户</a></div>
<!--     <div class="h_a">搜索</div>
    <div class="search_type cc mb10">
        <form action="http://phpwind.com/admin.php?m=u&c=manage" method="post">
        <input type="hidden" name="page" value="1">
        <label>用户组：</label>
        <select name="gid[]" size="5" class="mr10" multiple>
            <option value="-1"  selected>不限制</option>
                            <option value="0" >普通组</option>
                            <option value="1" >会员</option>
                            <option value="2" >游客</option>
                            <option value="3" >管理员</option>
                            <option value="4" >总版主</option>
                            <option value="5" >论坛版主</option>
                            <option value="6" >禁止发言</option>
                            <option value="7" >未验证会员</option>
                            <option value="16" >VIP</option>
                    </select>
        <label>用户名包含：</label><input name="username" type="text" class="input length_2 mr10" value="">
        <label>UID：</label><input name="uid" type="number" class="input length_1 mr10" value="">
        <label>电子邮箱：</label><input name="email" type="text" class="input mr10" value="">
        <button type="submit" class="btn">搜索</button>
        <input type="hidden" name="csrf_token" value="8afcb4e958324467"/></form>
    </div> -->
            <div class="table_list">
        <table width="100%">
            <thead>
                <tr>
                    <td width="30">UID</td>
                    <td>用户名</td>
                    <td>注册时间</td>
                    <td>所属区域</td>
                    <td>操作</td>
                </tr>
            </thead>
            <?php foreach($userlist as $key=>$value):?>
                <tr>
                    <td><?php echo $value->id;?></td>
                    <td><?php echo $value->username;?></td>
                    <td><?php echo date("Y-m-d H:i:s",$value->addtime);?></td>
                    <td><?php echo $value->UserArea->area_name;?></td>
                    <td><a href="<?php echo HostName_Backed;?>/Usermanage/editbackuser?id=<?php echo $value->id;?>" class="mr10" title="编辑">[编辑]</a>
                        <a href="javascript:void()" class="mr10 J_dialog" title="清理">[清理]</a>
                        <a href="javascript:void()" title="禁止">[禁止]</a></td>
                </tr>
            <?php endforeach;?>
                </table>
    </div>
