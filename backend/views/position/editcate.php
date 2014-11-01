<?php $this->renderpartial('/layouts/header');?>
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-title">
                <div class="span12">
                    <h3><i class="icon-cog"></i>编辑分类</h3>
                </div>
            </div>
            <form action="<?=HostName_Backed;?>/product/editcategory" method="post" class="form-horizontal form-validate">
            <input type="hidden" name="dosubmit" value="1">
            <input type="hidden" name="cid" value="<?php echo $CateInfo->id;?>">
                <div class="box-content">
                    <div class="control-group">
                        <label for="classname" class="control-label">分类名称：</label>
                        <div class="controls">
                            <input type="text" id="cname" name="cname" value="<?php echo $CateInfo->category_name;?>" class="input-medium" data-rule-required="true" />
                            <span class="maroon">*</span><span class="help-inline"></span>
                        </div>
                    </div>
                     <div class="control-group">
                        <label for="category_id" class="control-label">所属分类：</label>
                        <div class="controls">
                            <select id="parent_id" name="parent_id" class="input-medium valid">
                            <option value="0">根分类</option>
                              <?=$string;?>
                            </select>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label">是否左侧显示：</label>
                        <div class="controls">
                            <label class="radio inline"><input type="radio" value="1" name="type" checked="checked" />显示</label>
                            <label class="radio inline"><input type="radio" value="0" name="type" />隐藏</label>
                        </div>
                    </div>

                    <div id="res_block">
                        <div class="form-actions">
                            <button type="button" class="btn btn-primary sub">保存</button>
                            <button type="button" class="btn" onclick="window.history.go(-1);">取消</button>
                        </div>
                    </div>
                </form>
                <script type="text/javascript">

                KISSY.use('gallery/pageNotification/1.0/index', function (S, PageNotification) {
                     var pageNotification = new PageNotification({
                                                  "closeButton": false,
                                                  "positionClass": "page-notification-top-full-width",
                                                  "onHidden": test,
                                                  "showDuration": "50",
                                                  "hideDuration": "1000",
                                                  "timeOut": "1000",
                                                  "extendedTimeOut": "1000",
                                                  "showEasing": "swing",
                                                  "hideEasing": "linear",
                                                  "showMethod": "fadeIn",
                                                  "hideMethod": "fadeOut"


                    });
                     $(".sub").on('click',function(){
                              var cname = $("#cname").val();
                              var parent_id = $("#parent_id").val();
                              var type = $("input[name='type']:checked").val();
                              if(!cname ){
                                alert('请填写分类名称');
                                return;
                              }
                              if(parent_id == <?php echo $CateInfo->id;?>){
                                alert('请选择分类');
                                return;
                              }
                              var method = 'POST';
                              var url         = '<?=HostName_Backed;?>/product/editcategory';
                              var param   = "dosubmit=1&cname="+cname+"&parent_id="+parent_id+"&cid="+<?php echo $CateInfo->id;?>+"&type="+type;

                              var result    = '';
                                  result = diyAjax(method,url,param);
                                  if(result==1){
                                    G.ui.tips.suc('编辑分类成功', '/backed/product/category');
                                    //pageNotification.success("添加分类成功", "提示");
                                  }else{
                                   //G.ui.tips.die('编辑分类失败', '/backed/default/category');
                                    //pageNotification.error("添加分类失败", "提示");
                                  }

                     })
                    function test(){
                        window.history.back();
                    }

                })

                </script>
            </div>
        </div>
    </div>
    <?php $this->renderpartial('/layouts/footer');?>


