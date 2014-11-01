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
            <label for="classname" class="control-label">游戏标题:</label>
            <div class="controls">
              <input type="text" id="sitename" name="sitename" value="" class="input-medium" data-rule-required="true" />
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

          <div class="control-group">
            <label for="insertimage" class="control-label">游戏封面:</label>
            <div class="controls">
              <img type="img" src="<?=AdminAsset;?>/admin/img/home-300200.jpg" style="max-height:50px;" />
              <input type="hidden" id="picurl" name="picurl" value="<?=AdminAsset;?>/admin/img/home-300200.jpg" class="input-medium" />
              <a class="btn insertimage">选择封面</a>
              <span class="help-inline">建议尺寸：宽300像素，高200像素</span>
            </div>
            <input type="file" name="files" style="display:none;" id="files">
          </div>
          <div class="control-group">
            <label for="insertimage" class="control-label">游戏截图:</label>
            <div class="controls">
              <img type="img" src="<?=AdminAsset;?>/admin/img/home-300200.jpg" style="max-height:50px;" />
              <input type="hidden" id="jietu_url" name="jietu_url" value="<?=AdminAsset;?>/admin/img/home-300200.jpg" class="input-medium" />
              <a class="btn insertimage">选择封面</a>
              <span class="help-inline">建议尺寸：宽300像素，高200像素</span>
            </div>
            <input type="file" name="files" style="display:none;" id="files">
          </div>
          <div class="control-group">
            <label for="classname" class="control-label">应用介绍:</label>
            <div class="controls">
              <textarea id="info" name="website" data-rule-required="true"></textarea>
            </div>
          </div>
<!--                     <div class="control-group">
                        <label class="control-label">是否官网显示：</label>
                        <div class="controls">
                            <label class="radio inline"><input type="radio" value="1" name="is_home" checked="checked" />显示</label>
                            <label class="radio inline"><input type="radio" value="0" name="is_home" />隐藏</label>
                        </div>
                      </div> -->

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
      alert('请填写标题');
      return;
    }
    if(!category_id){
      alert('请选择分类');
      return;
    }
    if(!picurl){
      alert('请上传游戏封面');
      return;
    }
    if(!jietu_url){
      alert('请上传游戏截图');
      return;
    }
    if(!website){
      alert('请填写应用介绍');
      return;
    }
    var method = 'POST';
    var url         = '<?=HostName_Backed;?>/default/addsite?dosubmit=1';
    //var param   = "dosubmit=1&sitename="+sitename+"&category_id="+category_id+"&website="+website+"&picurl="+picurl;
    var param   = {dosubmit:1,sitename:sitename,category_id:category_id,website:website,picurl:picurl,jietu_url:jietu_url};
    var result    = '';
    result = diyAjax(method,url,param);
    if(result==1){
      G.ui.tips.suc('添加游戏成功', '/backed/default/sitelist');
      //pageNotification.success("添加分类成功", "提示");
    }else{
      G.ui.tips.die('添加游戏失败', '/backed/default/sitelist');
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


