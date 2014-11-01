<?php $this->renderpartial('/layouts/header');?>
<div class="row-fluid">
                <div class="span12">
                    <div class="box">
                        <div class="box-title">
                            <div class="span12">
                                <h3>
                                    <i class="icon-table"></i>职位列表
                                    <!-- <small>设置好分类，新建图文回复，编辑的时候就可以选择分类，系统会自动生成一个3G网站。</small> -->
                                </h3>
                                <!-- <a class="btn preview pull-right btn-success" href="javascript:void(0);">微官网预览</a> -->
                                <script type="text/javascript">
                                    $("a.preview").click(function() {
                                        if ($.browser.msie) {
                                            alert("不支持在IE浏览器下预览，建议使用谷歌浏览器或者360极速浏览器或者直接在微信上预览。");
                                            return;
                                        }

                                        var left = ($(window.parent.parent).width() - 450) / 2;
                                          window.open("http://www.weimob.com/Weisite/Home?pid=123818&bid=251334&wechatid=fromUsername", "我的微官网", "height=650,width=450,top=0,left=" + left + ",toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no");
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="box-content">
                            <div class="row-fluid">
                                <div class="span8 control-group">
                                    <a href="<?=HostName_Backed;?>/<?=$this->id;?>/addproduct" class="btn"><i class="icon-plus"></i>添加产品</a>
                                </div>
                            </div>
                            <div class="row-fluid dataTables_wrapper">
                                <table id="listTable" class="table table-bordered table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th class="span3">名称</th>
                                            <th class="span3">分类</th>
                                            <th class="span2">操作</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($sitelist as $key=>$value):?>
                                        <tr>
                                                <td><?=$value->pname;?></td>
                                                <td><?=$value->Category->category_name;?></td>
                                                <td>
                                                <a href="<?=HostName_Backed;?>/<?=$this->id;?>/editproduct?id=<?=$value['id'];?>" class="btn">编辑</a>
                                                <a href="javascript:G.ui.tips.confirm('确定要删除吗？', '<?=HostName_Backed;?>/<?=$this->id;?>/DelProduct/id/<?=$value['id'];?>');" class="btn">删除</a>
                                                </td>
                                        </tr>
                                    <?php endforeach;?>
                              </table>
                            </div>
                                  <div  class="pagination alternate" style="padding-top:0px;">
                                        <?php
                                        $this->widget('CLinkPager',array(
                                            'header'=>'',
                                            'cssFile'=>AdminAsset.'/css/pager.css',
                                            'firstPageLabel' => '首页',
                                            'lastPageLabel' => '尾页',
                                            'prevPageLabel' => '上一页',
                                            'nextPageLabel' => '下一页',
                                            'pages' => $pages,
                                            'maxButtonCount'=>6,
                                           'htmlOptions'=>array(),
                                                   'footer'=>'',
                                          )
                                        );
                                        ?>
                                  </div>
                        </div>
                    </div>
                </div>
</div>
            <?php $this->renderpartial('/layouts/footer');?>
