<?php $this->renderpartial('/layouts/header');?>
<div class="row-fluid">
  <div class="span12">
    <div class="box">
      <div class="box-title">
        <div class="span10">
          <h3><i class="icon-cog"></i>添加游戏</h3>
        </div>
        <div class="span2">
          <a class="btn" href="Javascript:window.history.go(-1)">返回</a>
        </div>
      </div>
      <form action="<?=HostName_Backed;?>/default/addsite" method="post" class="form-horizontal form-validate">
        <input type="hidden" name="dosubmit" value="1">
        <div class="box-content">
          <div class="control-group">
            <label for="classname" class="control-label">目标地址:</label>
            <div class="controls">
              <input type="text" id="sitename" name="url" value="" class="input-medium" data-rule-required="true" style="width:640px" />
              <span class="maroon">*</span><span class="help-inline"></span>
            </div>
          </div>
          <div class="control-group">
            <label for="category_id" class="control-label">所属分类：</label>
            <div class="controls">
              <select id="category_id" name="category_id" class="input-medium valid">
                <?=$string;?>
              </select>
            </div>
          </div>


                      <div id="res_block">
                        <div class="form-actions">
                          <button type="button" class="btn btn-primary sub">保存</button>
                          <button type="button" class="btn" onclick="window.history.go(-1);">取消</button>
                        </div>
                      </div>
                    </form>

                    <script>
                      $(document).ready(function(){
                        var resource = Resource.create();
                        var ins = Resource.instance['res_block'];
                        ins.result = ins.result || {};
                        ins.result.wuid = 123818;


                        window.ICON();
                      });

                    var seting = {
                      themeType: "default",
                      resizeType: 1,
                      syncType:"",
                      allowPreviewEmoticons: false,
                      items: [
                      'source', 'undo', 'redo', 'plainpaste', 'plainpaste', 'wordpaste', 'clearhtml', 'quickformat', 'selectall', 'fullscreen', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'hr',
                      'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                      'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'unlink', 'baidumap'],
                      allowFileManager: true,
                      minWidth: 400,
                      width: 700,
                      filterMode:false,
                      afterCreate: function () {
                        this.sync();
                      },
                      afterBlur: function () {
                        this.sync();
                      }
                    }
                      KindEditor.ready(function(K){
                        var editor1 = K.create('#info', seting);
                        var editor = K.editor({
                          themeType: 'default',
                          allowFileManager: true,
                          filterMode:false
                        });
                        $('a.insertimage').live('click', function(e){
                          editor.loadPlugin('smimage', function(){
                            editor.plugin.imageDialog({
                              imageUrl: $(e.target).prev().val(),
                              clickFn: function(url, title, width, height, border, align){
                                $(e.target).prev().val(url);
                                if ('img' == $(e.target).prev().prev().attr('type')) {
                                  $(e.target).prev().hide();
                                  $(e.target).prev().prev().attr('src', url);
                                  $(e.target).prev().prev().show();
                                }
                                editor.hideDialog();
                              }
                            });
                          });
                        });
                      });
</script>

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
    var sitename = $("#sitename").val();
    var category_id = $("#category_id").val();
    var website = $("#info").val();
    var picurl = $("#picurl").val();
    var jietu_url = $("#jietu_url").val();
    if(!sitename ){
      alert('请填写目标地址');
      return;
    }
    if(!category_id){
      alert('请选择分类');
      return;
    }


    var method = 'POST';
    var url         = '<?=HostName_Backed;?>/default/CaijiSubmit';
    //var param   = "dosubmit=1&sitename="+sitename+"&category_id="+category_id+"&website="+website+"&picurl="+picurl;
    var param   = {dosubmit:1,url:sitename,category_id:category_id};
    var result    = '';
    result = diyAjax(method,url,param);
    if(result==1){
      G.ui.tips.suc('采集完成', '/backed/default/caiji');
      //pageNotification.success("添加分类成功", "提示");
    }else if(2){
      G.ui.tips.suc('此地址已经采过了', '/backed/default/caiji');
    }else{
      G.ui.tips.die('采集失败', '/backed/default/caiji');
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


