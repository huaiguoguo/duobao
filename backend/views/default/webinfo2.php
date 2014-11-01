
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-title">
                <div class="span10">
                    <h3><i class="icon-edit"></i>个人信息</h3>
                </div>
                <div class="span2"><a class="btn" href="Javascript:window.history.go(-1)">返回</a></div>
            </div>

            <div class="box-content">


                <form action="/backed/default/WebInfo" method="post" class="form-horizontal form-validate">
                <input type="hidden" name="dosubmit" value="1">
                    <div class="control-group">
                        <label for="name" class="control-label">姓名：</label>
                        <div class="controls">
                            <input type="text" name="name" id="name" class="input-medium" value="<?=$adminuserinfo['username'];?>" data-rule-required="true" /><span class="maroon">*</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="mobile" class="control-label">手机号码：</label>
                        <div class="controls">
                            <input type="text" name="mobile" id="mobile" class="input-medium" data-rule-required="true" value="<?=$adminuserinfo['username'];?>" />
                            <span class="maroon">*</span>
                            <span class="help-inline">
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="qq" class="control-label">常用QQ号码：</label>
                        <div class="controls">
                        <input type="text" name="qq" id="qq" class="input-medium" data-rule-required="true" value="<?=$adminuserinfo['QQ'];?>" />
                            <span class="maroon">*</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="email" class="control-label">常用email：</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" class="input-medium" data-rule-required="true" value="<?=$adminuserinfo['email'];?>" />
                            <span class="maroon">*</span>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">保存</button>
                        <a class="btn" href="Javascript:window.history.go(-1)">取消</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


















<!--                 <div class="box">
                    <div class="box-title">
                        <div class="span6">
                            <h3><i class="icon-table"></i>管理微信公众帐号</h3>
                        </div>
                    </div>

                    <div class="box-content nozypadding">
                        <div class="row-fluid">
                            <div class="span8 control-group">
                                <a class="btn" href="/wechat/autobind"><i class="icon-plus"></i>添加公众帐号</a>
                                <a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" target="_blank" class="btn btn-warning" style="cursor:pointer">微助手</a>
                            </div>
                        </div>

                        <div class="row-fluid dataTables_wrapper">
                            <div class="alert">
                                <strong>温馨提示</strong>：您还有1个微信公众号配额，请珍惜使用名额！ <span class="line hide">微盟交流QQ③群（245257246）</span>
                            </div>
                            <form method="post" action="" id="listForm">
                                <table id="listTable" class="table table-hover table-nomargin table-bordered usertable dataTable">
                                    <thead>
                                        <tr>
                                            <th>公众号名称</th>
                                            <th>会员套餐</th>
                                            <th>创建时间/到期时间</th>
                                            <th>已定义/上限</th>
                                            <th>请求数</th>
                                            <th>剩余请求数</th>
                                            <th>增值服务</th>
                                            <th>客服悬窗是否显示</th>
                                            <th>操作</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                 </tbody>
                                </table>
                            </form>
                      </div>
                    </div>
                </div> -->

