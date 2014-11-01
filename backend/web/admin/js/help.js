
function sAlert(titleStr,str){
    var msgw,msgh,bordercolor;
    msgw=400;//dialog hight
    msgh=100;//dialog width
    titleheight=25
    bordercolor="#336699";
    titlecolor="#99CCFF";

    var sWidth,sHeight;
    sWidth=document.body.offsetWidth;
    sHeight=screen.height;
    var bgObj=document.createElement("div");
    bgObj.setAttribute('id','bgDiv');
    bgObj.style.position="absolute";
    bgObj.style.top="0";
    bgObj.style.background="#777";
    bgObj.style.filter="progid:DXImageTransform.Microsoft.Alpha(style=3,opacity=25,finishOpacity=75";
    bgObj.style.opacity="0.6";
    bgObj.style.left="0";
    bgObj.style.width=sWidth + "px";
    bgObj.style.height=sHeight + "px";
    bgObj.style.zIndex = "10000";
    document.body.appendChild(bgObj);

    var msgObj=document.createElement("div")
    msgObj.setAttribute("id","msgDiv");
    msgObj.setAttribute("align","center");
    msgObj.style.background="white";
    msgObj.style.border="1px solid " + bordercolor;
    msgObj.style.position = "absolute";
    msgObj.style.left = "50%";
    msgObj.style.top = "50%";
    msgObj.style.font="12px/1.6em Verdana, Geneva, Arial, Helvetica, sans-serif";
    msgObj.style.marginLeft = "-225px" ;
    msgObj.style.marginTop = -75+document.documentElement.scrollTop+"px";
    msgObj.style.width = msgw + "px";
    msgObj.style.height =msgh + "px";
    msgObj.style.textAlign = "center";
    msgObj.style.lineHeight ="25px";
    msgObj.style.zIndex = "10001";

   var title=document.createElement("h4");
   title.setAttribute("id","msgTitle");
   title.setAttribute("align","left");
   title.style.margin="0";
   title.style.padding="3px";
   title.style.background=bordercolor;
   title.style.filter="progid:DXImageTransform.Microsoft.Alpha(startX=20, startY=20, finishX=100, finishY=100,style=1,opacity=75,finishOpacity=100);";
   title.style.opacity="0.75";
   title.style.border="1px solid " + bordercolor;
   title.style.height="18px";
   title.style.font="12px Verdana, Geneva, Arial, Helvetica, sans-serif";
   title.style.color="white";
   title.style.cursor="pointer";
   title.innerHTML=titleStr;
   title.onclick=function(){
        document.body.removeChild(bgObj);
        document.getElementById("msgDiv").removeChild(title);
        document.body.removeChild(msgObj);
        }
   document.body.appendChild(msgObj);
   document.getElementById("msgDiv").appendChild(title);
   var txt=document.createElement("p");
   txt.style.margin="1em 0"
   txt.setAttribute("id","msgTxt");
   txt.innerHTML=str;
   document.getElementById("msgDiv").appendChild(txt);
}

//sAlert(MSG_TITLE, MSG_SUCCESS_COMMIT );


function checkFormziliao(form){
              if(ImgSize == 1){
                alert('图像大小超过限制');
                return false;
              }
              if(form.nickname.value == '' || form.nickname.value == 'undefined'){
                alert("请输入姓名");
                return false;
              }

              if(form.email.value == '' || form.email.value == 'undefined'){
                alert("请输入邮件地址");
                return false;
              }

              if(form.jobphone.value == '' || form.jobphone.value == 'undefined'){
                alert("请输入值班电话");
                return false;
              }

              if(form.phone.value == '' || form.phone.value == 'undefined'){
                alert("请输入手机号码");
                return false;
              }


              var myReg = /^[0-9a-z][.-_A-Za-z0-9]*[0-9a-z]@([_A-Za-z0-9]+\.)+[A-Za-z0-9]{2,3}$/;
              if(form.email.value && !myReg.test(form.email.value)){
                alert('邮件格式不正确');
                return false;
              }

              var partten = /^((13|15|18)+\d{9})$/;
               if(!partten.test(form.phone.value)){
                  alert('手机号码不正确');
                  form.phone.focus();
                  return false;
               }

              var partten2 = /^((0\d{2,3})-?)(\d{7,8})(-(\d{3,}))?$/;
              if( !partten2.test(form.jobphone.value) )
                if ( !partten.test(form.jobphone.value) ) {
                  alert('值班电话不正确');
                  form.jobphone.focus();
                  return false;
              }

              if(!partten2.test(form.fax.value) && form.fax.value != '' && form.fax.value != 'undefined'){
                  alert('传真号码不正确');
                  form.fax.focus();
                  return false;
              }

            if(isNaN(form.QQ.value) == true){
              alert('请输入数字');
              form.QQ.focus();
              return false;
            }

            if(ImgSize == 2){
                alert('图片仅支持jpg、png格式');
                return false;
            }
            if(ImgSize == 1){
                alert('图像大小超过限制');
                return false;
            }

            form.submit();
}




String.prototype.Trim = function() {
    var m = this.match(/^\s*(\S+(\s+\S+)*)\s*$/);
    return (m == null) ? "" : m[1];
}
String.prototype.isMobile = function() {
    return (/^(?:13\d|18\d|15\d|15[89])-?\d{5}(\d{3}|\*{3})$/.test(this.Trim()));
}

String.prototype.isTel = function()
{
//"兼容格式: 国家代码(2到3位)-区号(2到3位)-电话号码(7到8位)-分机号(3位)"
    //return (/^(([0\+]\d{2,3}-)?(0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/.test(this.Trim()));
    return (/^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/.test(this.Trim()));
}






function checkPhone( strPhone ) {
    var phoneRegWithArea = /^[0][1-9]{2,3}-[0-9]{5,10}$/;
    var phoneRegNoArea = /^[1-9]{1}[0-9]{5,8}$/;
    var prompt = "您输入的电话号码不正确!"
    if( strPhone.length > 9 ) {
        if( phoneRegWithArea.test(strPhone) ){
          return true;
        }else{
          alert(prompt);
          return false;
        }
    }else{
        if( phoneRegNoArea.test( strPhone ) ){
            return true;
        }else{
          alert(prompt);
            return false;
        }
  }
}




 function checknumber(String)
{
    var Letters = "1234567890";
    var i;
    var c;
    for( i = 0; i < String.length; i ++ )
    {
        c = String.charAt( i );
        if (Letters.indexOf( c ) ==-1)
        {
            return true;
        }
    }
    return false;
}




//添加点播单

function Dianbo(news_id,tag){
      var method = 'POST';
      var url         = '/News/Add_dianbo';
      var param   = "news_id="+news_id;
      var result    = '';
      result          = diyAjax(method,url,param);

if(tag=='add'){
  var  str = '';
        str += '<a href="javascript:void(0)"';
        str += ' onclick="Dianbo('+news_id+',\'del\')">';
        str += '<p class=font_hd>删除点播</p>';
        str += '</a>';
         if(result == 1){
             $(".tag_"+news_id).html(str);
         }
}

if(tag == 'del'){

  var  str = '';
        str += '<a href="javascript:void(0)"';
       str += ' onclick="Dianbo('+news_id+',\'add\')">';
        str += '<p class=font_hd>添加点播</p>';
        str += '</a>';
           if(result == 1){
            $(".tag_"+news_id).html(str);
           }
}
}



//新闻列表 点击后 文字变灰色
function NewsLook(news_id){
      var method = 'POST';
      var url         = '/News/NewsLook';
      var param   = "news_id="+news_id;
      var result    = '';
            result   = diyAjax(method,url,param);
            $(".titleCorlor"+news_id).css("color","#bbb");
            window.open("/News/XingQing?news_id="+news_id);
            //window.location.href="/News/XingQing?news_id="+news_id;
}

//消息中心 私人信息或者新闻评论 开启或者关闭回复和评论
  function JiHuo(type,group_id,status){
      var method = 'POST';
      var url         = '/Msg/JiHuo';
      var param   = "group_id="+group_id+"&type="+type+"&status="+status;
      var result    = '';
      var string    = '';
            result   = diyAjax(method,url,param);
            if(status==1){
              $(".example").hide('slow');
              if(type == 2){
                $("#SendPrivateMessage").hide('slow');
                string = "<a href='javascript:void(0)' onclick=JiHuo('"+type+"','"+group_id+"','0')>激活评论</a>";
              }
              if(type==3){
                  string = "<a href='javascript:void(0)' onclick=JiHuo('"+type+"','"+group_id+"','0')>激活评论</a>";
              }

            }

            if(status == 0){
              $(".example").show();
              if(type == 2){
                $("#SendPrivateMessage").show();
                string = "<a href='javascript:void(0)' onclick=JiHuo('"+type+"','"+group_id+"','1')>禁用私信</a>";
              }
              if(type==3){
                string = "<a href='javascript:void(0)' onclick=JiHuo('"+type+"','"+group_id+"','1')>禁用评论</a>";
              }

            }

            $("#MessageStatus").html(string);

            //window.href.location="/News/XingQing?news_id="+news_id;
  }




/////////////////////////订阅////////////////////////
//添加到个性订阅
function DingYue(catelog_id,parent_type,ename){
        if(parent_type == "catelog"){
          var dingYue_tag = $("#dingYue_tag_catelog_"+catelog_id).html();
        }
        if(parent_type == "area"){
          var dingYue_tag = $("#dingYue_tag_area_"+catelog_id).html();
        }

            var method = 'POST';
            var url         = '/DingYue/AddDingYue';
            var param   = "catelog_id="+catelog_id+"&parent_type="+parent_type;
            var result    = '';
            if(dingYue_tag == "not_dingyue"){
                  result    = diyAjax(method,url,param);
                 if(result == -1){
                    alert('您已经订阅过此类目');
                    return false;
                 }

                 if(result == 1){
                      if(parent_type == "catelog"){
                         $("#catelog_"+catelog_id).html('[取消订阅]');
                         $("#dingYue_tag_catelog_"+catelog_id).html("is_dingyue");
                         $("#myorder").append('<li id="left_dingyue_'+catelog_id+'"><a href="?catelog_id='+catelog_id+'&catelog_name='+ename+'" class="font_12">'+ename+'</a></li>');
                      }
                      // if (parent_type == "area") {
                      //    $("#area_"+catelog_id).html('[取消订阅]');
                      //    $("#dingYue_tag_area_"+catelog_id).html("is_dingyue");
                      //    $("#myorder").append('<li><a href="?area_id='+catelog_id+'&area_name='+ename+'" class="font_12">'+ename+'</a></li>');
                      // }
                 }
         }
         if(dingYue_tag == "is_dingyue"){
                  result    = diyAjax(method,url,param);
                 if(result == 1){
                      if(parent_type == "catelog"){
                         $("#catelog_"+catelog_id).html('[订阅]');
                         $("#dingYue_tag_catelog_"+catelog_id).html("not_dingyue");
                         $("#myorder").find("#left_dingyue_"+catelog_id).remove();
                         //$("#myorder").append('<li><a href="?catelog_id='+catelog_id+'&catelog_name='+ename+'" class="font_12">'+ename+'</a></li>');
                      }
                      // if (parent_type == "area") {
                      //    $("#area_"+catelog_id).html('[订阅]');
                      //    $("#dingYue_tag_area_"+catelog_id).html("is_dingyue");
                      //    //$("#myorder").append('<li><a href="?area_id='+catelog_id+'&area_name='+ename+'" class="font_12">'+ename+'</a></li>');
                      // }
                 }
         }
}

//删除订阅
 function delDingYue(dingyue_id){
           // var dingYue_tag = $("#dingYue_tag"+catelog_id).html();
            var method = 'POST';
            var url         = '/DingYue/DelDingYue';
            var param   = "dingyue_id="+dingyue_id;
            var result    = '';

            result    = diyAjax(method,url,param);
            if(result == -1){
              alert('删除失败');
              return false;
            }
            if(result == 1){
                   $("#dingyue_"+dingyue_id).hide('slow');
            }
}

//删除选中的订阅
function delete_xuanzhong_dingyue(){

  var obj=document.getElementsByName('checkbox2');  //选择所有name="'test'"的对象，返回数组
  //取到对象数组后，我们来循环检测它是不是被选中
  var str="";
  for(var i=0; i<obj.length; i++){
    if(obj[i].checked) str+=obj[i].value+',';  //如果选中，将value添加到变量s中
  }

  str=str.substr(0,str.length-1);
  //判断是否有选中项
  if(str==''){
      alert('未选择！');
      return ;
  }

if(str.length<2){
  var arr = str;
}else{
  var arr = str.split(",");
}

  if(confirm('您确定要删除这些订阅吗？')){
            var method = 'POST';
            var url         = '/DingYue/DelDingYue';
            var param   = "dingyue_id="+arr;

            var result    = '';
            result    = diyAjax(method,url,param);

            if(result == "1"){
                if(arr.length>1){
                    for(var i=0; i<arr.length; i++){
                         $("#dingyue_"+arr[i]).hide("slow");
                    }
                }else{
                  $("#dingyue_"+arr[0]).hide("slow");
                }
            }
            if(result == "-1"){
                alert('删除失败');
            }
  }
}



/////////////////////////点播////////////////////////
//批量删除点播
function delete_xuanzhong_dianbo(){
        var obj=document.getElementsByName('checkbox2');  //选择所有name="'test'"的对象，返回数组
        //取到对象数组后，我们来循环检测它是不是被选中
        var str="";
        for(var i=0; i<obj.length; i++){
          if(obj[i].checked) str+=obj[i].value+',';  //如果选中，将value添加到变量s中
        }

        str=str.substr(0,str.length-1);

        //判断是否有选中项
        if(str==''){
            alert('未选择！');
            return ;
        }

      if(str.length<2){
        var arr = str;
      }else{
        var arr = str.split(",");
      }

        if(confirm('您确定要删除这些点播吗？')){
                  var method = 'POST';
                  var url         = '/DianBo/delDianBo';
                  var param   = "dianbo_id="+arr;

                  var result    = '';
                  result    = diyAjax(method,url,param);

                  if(result == "1"){
                      if(arr.length>1){
                          for(var i=0; i<arr.length; i++){
                               $("#dianbo_"+arr[i]).hide("slow");
                          }
                          location.reload();
                      }else{
                        $("#dianbo_"+arr[0]).hide("slow");
                        location.reload();
                      }
                  }
                  if(result == "-1"){
                      alert('删除失败');
                  }
        }
}



//导出点播单
function exports(){
        var obj=document.getElementsByName('checkbox2');  //选择所有name="'test'"的对象，返回数组
        //取到对象数组后，我们来循环检测它是不是被选中
        var str="";
        for(var i=0; i<obj.length; i++){
          if(obj[i].checked) str+=obj[i].value+',';  //如果选中，将value添加到变量str中
        }

        str=str.substr(0,str.length-1);
        //判断是否有选中项
        if(str==''){
            alert('未选择！');
            return ;
        }

      if(str.length<2){
        var arr = str;
      }else{
        var arr = str.split(",");
      }

      var method = 'POST';
      var url        = '/DianBo/ExportXml';
      var param   = "dianbo_id="+arr;
      var result    = '';
            result   = diyAjax(method,url,param);
            if(result == 1){
                alert('导出成功');
            }
            if(result == -1){
              alert('导出失败');
            }
}


//删除单条点播
function delDianBo(dianbo_id){
           // var dingYue_tag = $("#dingYue_tag"+catelog_id).html();
            var method = 'POST';
            var url         = '/DianBo/delDianBo';
            var param   = "dianbo_id="+dianbo_id;
            var result    = '';

            result    = diyAjax(method,url,param);
            if(result == -1){
              alert('删除失败');
              return false;
            }
            if(result == 1){
                   $("#dianbo_"+dianbo_id).hide('slow');
            }
}

//新闻评论
function SubMitPinglun(news_id){
    if(!news_id){
      return false;
    }
    var content = $(".xw_content2").find("textarea[name='content']").val();

    if(!content){
        alert('请填写评论内容' );
        return false;
    }
            var method = 'POST';
            var url         = '/News/XingQing';
            var param   = "news_id="+news_id+"&content="+content+"&do_submit=1";
            var result    = '';
            result    = diyAjax(method,url,param);
           if(result != -1){
              // alert('评论成功');
               $(".xw_content2").find("textarea[name='content']").val('');
               var json= eval("("+result+")");
               var str="";
                    str+="<tr>";
                    str+="<td width='62' height='76'><img src="+json.userphoto+" width='57' height='56' /></td>";
                    str+="<td width='347'><p class='red'>"+json.nickname+"</p>";
                    str+="<p>"+content+"</p></td>";
                    str+="<td width='147' align='right'><p>发表于："+json.date+"</p>";
                    str+="<p class='red'>&nbsp;</p>";
                    str+="<p class='red' style='cursor:pointer' onclick='disply("+json.message_id+")'>回复(0)</p></td>";
                    str+="</tr>";

                    str+="<tr class='messageReplylist_"+json.message_id+"' style='display:none'>";
                    str+="<td height='31' colspan='2' bgcolor='#f4f4f4'><label for='textarea'>&nbsp;&nbsp;&nbsp;</label></td>";
                    str+="<td height='31' align='right' valign='middle' bgcolor='#f4f4f4'>0/300&nbsp;&nbsp;&nbsp;</td>";
                    str+="</tr>";
                    str+="<form id='form1' class=form_"+json.message_id+" name='form1' method='post'>";
                    str+="<input type='hidden' name='message_id' value='"+json.message_id+"' />";
                    str+="<input type='hidden' name='news_id' value='"+news_id+"' />";
                    str+="<tr class='messageReplylist_"+json.message_id+"' style='display:none'>";
                    str+="<td height='132' colspan='3' align='center' bgcolor='#f4f4f4'><label for='textarea2'></label>";
                    str+="<textarea name='reply_content' cols='45' rows='5' class='text_wbqy' id='textarea2'></textarea></td>";
                    str+="</tr>";
                    str+="<tr  class='messageReplylist_"+json.message_id+"' style='display:none'>";
                    str+="<td height='33' colspan='3' align='right' bgcolor='#f4f4f4'>";
                    str+="<input name='button' type='button' class='text_anniu1' id='button' value='回复'  onclick=Reply(this.form) style='cursor:pointer'/>";
                    str+="<input name='button2' type='reset' class='text_anniu2' id='button2' value='取消'  style='cursor:pointer'/>";
                    str+="&nbsp;&nbsp;";
                    str+="</td>";
                    str+="</tr>";
                    str+="</form>";
                   $("#ttt").after(str);
                   window.location.reload();
               return false;
           }else{
               alert('评论失败');
               return false;
           }
}



//项目评论
function SubMitPinglunProject(project_id){
    if(!project_id){
      return false;
    }
    var content = $(".xw_content2").find("textarea[name='content']").val();

    if(!content){
        alert('请填写评论内容' );
        return false;
    }
            var method = 'POST';
            var url         = '/Project/Show';
            var param   = "project_id="+project_id+"&content="+content+"&do_submit=1";
            var result    = '';
            result    = diyAjax(method,url,param);
            if(result == -2){
                alert('您没有参与此项目,暂时不能发表评论');
                return false;
            }
           if(result != -1){
              // alert('评论成功');
               $(".xw_content2").find("textarea[name='content']").val('');
               var json= eval("("+result+")");
               var str="";
                    str+="<tr>";
                    str+="<td width='62' height='76'><img src="+json.userphoto+" width='57' height='56' /></td>";
                    str+="<td width='347'><p class='red'>"+json.nickname+"</p>";
                    str+="<p>"+content+"</p></td>";
                    str+="<td width='147' align='right'><p>发表于："+json.date+"</p>";
                    str+="<p class='red'>&nbsp;</p>";
                    str+="<p class='red' style='cursor:pointer' onclick='disply("+json.message_id+")'>回复(0)</p></td>";
                    str+="</tr>";

                    str+="<tr class='messageReplylist_"+json.message_id+"' style='display:none'>";
                    str+="<td height='31' colspan='2' bgcolor='#f4f4f4'><label for='textarea'>&nbsp;&nbsp;&nbsp;</label></td>";
                    str+="<td height='31' align='right' valign='middle' bgcolor='#f4f4f4'>0/300&nbsp;&nbsp;&nbsp;</td>";
                    str+="</tr>";
                    str+="<form id='form1' class=form_"+json.message_id+" name='form1' method='post'>";
                    str+="<input type='hidden' name='message_id' value='"+json.message_id+"' />";
                    str+="<input type='hidden' name='project_id' value='"+project_id+"' />";
                    str+="<tr class='messageReplylist_"+json.message_id+"' style='display:none'>";
                    str+="<td height='132' colspan='3' align='center' bgcolor='#f4f4f4'><label for='textarea2'></label>";
                    str+="<textarea name='reply_content' cols='45' rows='5' class='text_wbqy' id='textarea2'></textarea></td>";
                    str+="</tr>";
                    str+="<tr  class='messageReplylist_"+json.message_id+"' style='display:none'>";
                    str+="<td height='33' colspan='3' align='right' bgcolor='#f4f4f4'>";
                    str+="<input name='button' type='button' class='text_anniu1' id='button' value='回复'  onclick=ReplyProject(this.form) style='cursor:pointer'/>";
                    str+="<input name='button2' type='reset' class='text_anniu2' id='button2' value='取消'  style='cursor:pointer'/>";
                    str+="&nbsp;&nbsp;";
                    str+="</td>";
                    str+="</tr>";
                    str+="</form>";
                   $("#ttt").after(str);
                   window.location.reload();
               return false;
           }else{
               alert('评论失败');
               return false;
           }
}



  //项目详情页面回复
  function ReplyProject(form){
        if(form.reply_content.value && form.message_id.value){
                var method = 'POST';
                var url         = '/Project/reply';
                var param   = "message_id="+form.message_id.value+"&content="+form.reply_content.value+"&type=1";
                var result    = '';
                result    = diyAjax(method,url,param);
                if(result == -2){
                    alert('您没有参与此项目,暂时不能发表评论');
                    return false;
                }
                if(result == -1){
                    alert('回复失败');
                    return false;
                }
                if(result == 1){
                  alert("回复成功");
                }
                var input = '';
                var uname = $(".xiala").find(".red").html();
               input +="<tr style='border-bottom:1px solid #CCC; margin:0 8px;' class=messageReplylist_"+form.message_id.value+">";
               input +="<td height='64' colspan='2' bgcolor='#F4F4F4'>";
               input +="<p>&nbsp;&nbsp;&nbsp;<span class='red'>"+uname+"：</span></p>";
               input +="<p>&nbsp;&nbsp;&nbsp;"+form.reply_content.value+"</p></td>";
               input +="<td height='64' align='right' bgcolor='#F4F4F4' class='red'>"+getNowTime()+"</td>";
               input +="</tr>";
                 $("#input_"+form.message_id.value).after(input);
                 var count = parseInt($("#count_"+form.message_id.value).html());
                 $("#count_"+form.message_id.value).html(count+1);
                 form.reply_content.value = '';
                 $("#textCount"+form.message_id.value).html(0);
      }else{
        alert('请输入内容');
        return false;
      }
  }

  //个人中心项目详情页面的评论删除
  function deleteProjectMessage(projectMessageId,type){
            var method = 'POST';
            var url         = '/Projects/MyShow';
            var param   = "projectMessageId="+projectMessageId+"&do_submit=1";
            var result    = '';
            var json      = '';
            var strhtml  = '';
                  result    = diyAjax(method,url,param);
            if(result == -1){
                alert('删除失败');
                return false;
            }

            if(type ==1){
              $("#parent_"+projectMessageId).remove();
              $(".messageReplylist_"+projectMessageId).remove();
            }
            if(type ==2){
                json= eval("("+result+")");
                if(json.count){
                  $("#count_"+json.parent_id).html(json.count);
                  $("#children"+projectMessageId).remove();
                }else{
                  $("#children"+projectMessageId).remove();
                  strhtml ="<a href='javascript:void(0)' onclick=deleteProjectMessage('"+json.parent_id+"','1')>删除</a>";
                  $("#del_or_tree"+json.parent_id).html(strhtml);
                }
            }

  }



//点击新闻列表左侧的栏目的时候 右侧的name=cateid的文本框的值
function addSearchInput(cate_id){
  $("#form1").find("input[name='cateid']").val(cate_id);
}

//删除订阅时候的全选与反选
  var isall = 0;
  function selcetAll(){
        if (isall==0) { // 全选
          $("input[name='checkbox2']").prop("checked", "checked");
           isall =1;
        } else { // 取消全选
           $("input[name='checkbox2']").prop("checked", "");
           isall =0;
        }
}


//检测旧密码是否
function CheckPassword(form){
            var method = 'POST';
            var url         = '/UserCenter/CheckOldPassword';
            var param   = "old_password="+form.old_password.value;
            var result    = '';
            result    = diyAjax(method,url,param);
           if(result == -1){
               alert('原密码错误');
               return false;
           }
           if(form.new_password.value != form.new_password_d.value){
               alert('两次密码输入不一致');
               return false;
           }
           if(!form.new_password.value  || !form.new_password_d.value){
               alert('密码不能为空 ');
               return false;
           }
           form.submit();
}


//发送私信息的时候 检查用户
function CheckUser(form){
            var method = 'POST';
            var url         = '/Msg/CheckUser';
            var param   = "username="+form.username.value;
            var result    = '';

           if(form.username.value == ''){
              alert('收件人不能为空');
              return false;
           }
  result    = diyAjax(method,url,param);
           if(result == -1){
               alert(form.username.value+'不存在');
               return false;
           }
           if(result == -2){
               alert('您不能给自己发送私信息');
               return false;
           }

           if(!form.userid.value || !form.username.value){
              alert('收件人不能为空');
              return false;
           }

           if(!form.title.value || !form.content.value){
               alert('请填写标题或私信内容');
               return false;
           }

           form.submit();
}

//回复(个人中心私人消息回复)
  function checkReply(form,type){
        if(form.content.value && form.message_id.value){
                var method = 'POST';
                var url         = '/Msg/reply';
                var param   = "message_id="+form.message_id.value+"&content="+form.content.value+"&type="+type;
                var result    = '';
                result    = diyAjax(method,url,param);
                if(result == -1){
                    alert('回复失败');
                }
                //$('#replyTag_'+form.message_id.value).html('已回复');
                $('#blk'+form.message_id.value).hide('slow');
        }else{
          alert('请输入内容');
          return false;
        }
  }

  //点击消息  上面的数字减1
  function weidu(msg_id){
    //var count     = document.getElementById('count').innerHTML;
    var count     = $(".an_wz22").html();

    var result     = '';
    var method   = 'POST';
    var url         = '/Msg/Look';
    var param    = "message_id="+msg_id;
    var imgTagcount = parseInt($("#messageCount").html());
    var imtcount = '';
         result = diyAjax(method,url,param);
         if(result ==1){
            if(count>1){
                $("#count").find(".an_wz22").html(count-1);
            }
            if(count==1){
              $("#count").html('');
            }

            $("#messageCount").html(imgTagcount-1);
            var messageCount = parseInt($("#messageCount").html());
            if(messageCount=='' || messageCount == 0 || messageCount < 0){
                $("#newImgTag").remove();
            }
         }
  }


  //点击消息  上面的数字减1    系统消息专用js
  function systemweidu(msg_id,news_id,type){
    //var count     = document.getElementById('count').innerHTML;
    var count     = $(".an_wz22").html();
    var result     = '';
    var method   = 'POST';
    var url         = '/Msg/Look';
    var param    = "message_id="+msg_id;

         result = diyAjax(method,url,param);
         if(result ==1){
            if(count>1){
                $("#count").find(".an_wz22").html(count-1);
            }
            if(count==1){
              $("#count").html('');
            }
         }
         //接受别人的邀请
         if(type==1){
            window.location.href ='join?project_id='+news_id+'&msg_id='+msg_id;
         }
         //拒绝别人的邀请
         if(type==2){
            window.location.href ='Inject?msg_id='+msg_id;
         }
          //批准别人的申请
         if(type == 3){
            window.location.href ='commitMember?project_id='+news_id+'&msg_id='+msg_id+"&type="+type;
         }
         //拒绝别人的申请
         if(type == 4){
            window.location.href ='commitMember?project_id='+news_id+'&msg_id='+msg_id+"&type="+type;
         }
         //申请加入别人创建的项目
         if(type == 5){
                var result     = '';
                var method   = 'POST';
                var url         = '/Project/ajaxGetProInfo';
                var param    = "project_id="+news_id+"&msg_id="+msg_id;
                      result = diyAjax(method,url,param);
                      if(result==1){
                           alert("申请成功");
                           window.location.href=window.location.href;
                      }
                      if(result == -1){
                        alert("申请失败");
                        return false;
                      }
         }
  }




  //新闻详情页面回复
  function Reply(form){
        if(form.reply_content.value && form.message_id.value){
                var method = 'POST';
                var url         = '/Msg/reply';
                var param   = "message_id="+form.message_id.value+"&content="+form.reply_content.value+"&type=3";
                var result    = '';
                result    = diyAjax(method,url,param);
                if(result == -1){
                    alert('回复失败');
                    return false;
                }
                if(result == 1){
                  alert("回复成功");
                }
                var input = '';
                var uname = $(".xiala").find(".red").html();
               input +="<tr style='border-bottom:1px solid #CCC; margin:0 8px;' class=messageReplylist_"+form.message_id.value+">";
               input +="<td height='64' colspan='2' bgcolor='#F4F4F4'>";
               input +="<p>&nbsp;&nbsp;&nbsp;<span class='red'>"+uname+"：</span></p>";
               input +="<p>&nbsp;&nbsp;&nbsp;"+form.reply_content.value+"</p></td>";
               input +="<td height='64' align='right' bgcolor='#F4F4F4' class='red'>"+getNowTime()+"</td>";
               input +="</tr>";
                 $("#input_"+form.message_id.value).after(input);
                 var count = parseInt($("#count_"+form.message_id.value).html());
                 $("#count_"+form.message_id.value).html(count+1);
                 form.reply_content.value = '';
                 $("#textCount"+form.message_id.value).html(0);
      }else{
        alert('请输入内容');
        return false;
      }
  }

  //js获得当前年月日

  function getNowTime(){
      //取得当前时间
      var now= new Date();
      var year=now.getFullYear();
      var month=now.getMonth()+1;
      var day=now.getDate();
      var hour=now.getHours();
      var minute=now.getMinutes();
      var second=now.getSeconds();
      var week=now.getDay();
      var weekname="星期"+"天一二三四五六".split('')[week];
      var nowdate=year+"-"+month+"-"+day+" "+hour+":"+minute+":"+second;
      return nowdate;
      // document.getElementById("break_date").value = nowdate;
      // window.setTimeout("getNowTime()",1000);
 }


//新闻详情页面评论字数时实变化
function tongji(val){
              var curLength=val.length;
              $("#textCount").html(500-val.length)
              if(curLength >500){
                var num=val.substr(0,500);
                $(".content_Text").val(num);
              }else{
                $("#textCount").html(500-val.length)
              }
}

//新闻详情页面评论字数时实变化
function tongji_reply(val,id){
              var curLength=val.length;
              $("#textCount").html(500-val.length);
              if(curLength >300){
                var num=val.substr(0,300);
                $(".content_Text"+id).val(num);
              }else{
                $("#textCount"+id).html(300-val.length)
              }
}



  //显示或隐藏回复框（新闻详情页面）
  function disply(message_id){
    var messageReplylist= $(".messageReplylist_"+message_id).css('display');
    if(messageReplylist=='none'){
      $(".messageReplylist_"+message_id).show();
    }else{
      $(".messageReplylist_"+message_id).hide();
    }

  }

  //

//添加点播单

function DianboXiangqing(news_id,type){

      var method = 'POST';
      var url         = '/News/Add_dianbo';
      var param   = "news_id="+news_id;
      var result    = '';
      var htmlstr  = '';
      result          = diyAjax(method,url,param);
         if(result == '-2') {
            alert('添加失败');
            return false;
         }
         if(result == 1){

            if(type == 1){
                    htmlstr = "<a style='color:#fff;' href='javascript:void(0);' onclick=DianboXiangqing('"+news_id+"','2')>删除点播</a>";
            }else{
                    htmlstr+= "<a href='javascript:void(0);' onclick=DianboXiangqing('"+news_id+"','1')>";
                    htmlstr+="<img src='http://static.cptn.tv/public/images/images/tjdb_03.png' width='72' height='24'>";
                    htmlstr+="</a>";
            }
            $(".tagDianbo").html(htmlstr);
            return false;
         }
   }
//后台积分管理时 选择机构查出本机构的积分
function jifen(group_id,form){
              var method = 'POST';
              var url         = '/Admin/JiFenManage';
              var param   = "group_id="+group_id+"&is_ajax=1";
              var result    = '';
                    result = diyAjax(method,url,param);
              $("#jifen").html(result);
      var radio = GetRadioValue(form.Radios);
            if(radio == 1){
              if(form.changevalue.value == ''){
                var jifen = parseInt(result);
              }else{
                var jifen = parseInt($("#jifen").html()) + parseInt(form.changevalue.value);
              }
              $("#jifen_change_value").html("加分后余额:"+jifen);
            }
            if(radio == 2){
              if(form.changevalue.value == ''){
                var jifen = parseInt(result);
              }else{
                var jifen = parseInt($("#jifen").html()) - parseInt(form.changevalue.value);
              }
              $("#jifen_change_value").html("减分后余额:"+jifen);
            }
}
//后台积分管理运算结果
function change_value(form){
      if(isNaN(form.changevalue.value) == true){
          alert('请输入数值');
          form.changevalue.value = '';
          return false;
      }

    if(form.changevalue.value.indexOf("-") == 0 || form.changevalue.value.indexOf(".") != -1){
        alert('请输入正整数');
        form.changevalue.value = '';
        return false;
    }


      var radio = GetRadioValue(form.Radios);
      //加
      if(radio == 1){
                  if(form.changevalue.value == ''){
                              var jifen = parseInt($("#jifen").html());
                  }else if(form.changevalue.value.length>8){
                              alert('数值不能大于8位');
                              return false;
                  }else{
                            var jifen = parseInt($("#jifen").html()) + parseInt(form.changevalue.value);
                  }
                  $("#jifen_change_value").html("加分后余额:"+jifen);
      }

      //减
      if(radio == 2){
                if(form.changevalue.value == ''){
                            var jifen = parseInt($("#jifen").html());
                }else if(parseInt($("#jifen").html()) <  parseInt(form.changevalue.value)){
                            alert('请输入小于等于此机构积分的数值');
                            return false;
                }else if(form.changevalue.value.length>8){
                            alert('数值不能大于8位');
                            return false;
                }else{
                            var jifen = parseInt($("#jifen").html()) - parseInt(form.changevalue.value);
                }
                $("#jifen_change_value").html("减分后余额:"+jifen);
      }
      if(radio == 0){
          alert('请选择加分或减分');
          return false;
      }
}


function GetRadioValue(Radios){
      var radio = '';
        for(i=0; i<Radios.length; i++){
            if(Radios[i].checked){
               radio = Radios[i].value;
            }
      }
      return radio;
}


function checkFormJiFenManage(form){
      if(form.changevalue.value == '' || form.changevalue.value == undefined){
          alert('请输入加分或减分值');
          return false;
      }
      if(form.change_reason.value =='' ||  form.change_reason.value == undefined){
          alert('请输入加分或减分原因');
          return false;
      }
      var radio = GetRadioValue(form.Radios);
      if(radio == 0){
          alert('请选择加分或减分');
          return false;
      }
      if(radio == 2){
          if(parseInt($("#jifen").html()) <  parseInt(form.changevalue.value)){
              alert('请输入小于等于此机构积分的数值');
              return false;
          }
      }
      var method = 'POST';
      var url         = '/Admin/JiFenManage';
      var param   = "type="+radio+"&group_id="+form.group.value+"&changevalue="+form.changevalue.value+"&change_reasons="+form.change_reason.value+"&do_submit=1";

      var result    = '';
      var selectid = "#select"+form.group.value;

      result = diyAjax(method,url,param);
      var jifen = 0;
      if(result == 1){
          alert('操作成功');
          if(radio == 1)
            jifen = parseInt($("#jifen").html()) + parseInt(form.changevalue.value);
          else if(radio == 2)
            jifen = parseInt($("#jifen").html()) - parseInt(form.changevalue.value);
          $("#jifen").html(jifen);
      }
      if(result == -1){
          alert('操作失败');
          window.location.href=url;
      }
}


   //后台新闻审批列表
function newsShenPi(newid,type,form){
      if(type == 2 && (form.reason.value == undefined || form.reason.value == '')){
        alert('请填写退修原因');
        return false;
      }
      if(type == 3 && (form.reason.value == undefined || form.reason.value == '')){
        alert('请填写拒绝原因');
        return false;
      }
      var method = 'POST';
      var url         = '/Admin/NewsShenPi';
      if(type == 2 || type == 3){
        var param   = "news_id="+newid+"&type="+type+"&reason="+form.reason.value+"&do_submit=1";
      }else{
        var param   = "news_id="+newid+"&type="+type+"&do_submit=1";
      }

      var result    = '';
      result          = diyAjax(method,url,param);
         if(result == -1){
            alert('此条新闻已审核过');
            return false;
         }

         if(result == -2) {
            alert('操作失败');
            return false;
         }
        if(type==1 || type==-1){
          //$("#news"+newid).hide('slow');
            $("#ele"+newid).hide('slow');
            var deletehtml = "<span href='javascript:void()' class='jujue"+newid+"' style='color:white;width:47px; height:21px; line-height:21px; text-align:center; display:block; background:#666; margin:0 auto;'>已批准</a>";
            $(".jujue"+newid).html(deletehtml);
             $(".deleteDiv"+newid).css("display","block");
              $(".xiajiaDiv"+newid).css("display","block");

            $("#ele_tuixiu"+newid).hide('slow');
            $("#blk"+newid).hide('slow');
            //window.location.reload;
        }else if(type == 2){
            $("#ele"+newid).hide('slow');
            var deletehtml = "<span href='javascript:void()' class='jujue"+newid+"' style='width:47px; height:21px; line-height:21px; text-align:center; display:block; background:; margin:0 auto;'>已退修</a>";
            $(".jujue"+newid).html(deletehtml);
            $(".deleteDiv"+newid).css("display","block");
            $("#ele_tuixiu"+newid).hide('slow');
            $("#tuixiu_blk"+newid).hide('slow');
            //$(".main2").hide('slow');

        }else if(type == 3){
            $("#ele"+newid).hide('slow');
            var deletehtml = "<span class='jujue"+newid+"' style='color:white;width:47px; height:21px; line-height:21px; text-align:center; display:block; background:#666; margin:0 auto;'>已拒绝</span>";

             $(".jujue"+newid).html(deletehtml);

            $("#ele_jujue"+newid).hide('slow');
            $("#jujue_blk"+newid).hide('slow');

             $(".deleteDiv"+newid).css("display","block");
            $("#ele_tuixiu"+newid).hide('slow');
        }
}

//新闻审批列表里面的删除

function shenpiDelete(newsid){
      if(confirm('确认要删除此条新闻吗?')){
            var method = 'POST';
            var url         = '/Admin/NewsShenPi';
            var param   = "news_id="+newsid+"&type=5&do_submit=1";
            var result    = '';
                  result   = diyAjax(method,url,param);
               if(result == -1){
                  alert('此条新闻尚未批准');
                  return false;
               }

               if(result == -2) {
                  alert('操作失败');
                  return false;
               }
              $(".deleteDiv"+newsid).css("display","none");
              var deletehtml = "<span href='javascript:void()' class='jujue"+newsid+"' style='color:white;width:47px; height:21px; line-height:21px; text-align:center; display:block; background:#666; margin:0 auto;'>已删除</a>";

              $(".jujue"+newsid).html(deletehtml);
              $(".xiajiaDiv"+newsid).css("display","none");
      }
}




   //后台新闻审批详情
function newsShenPiXiangQing(newid,type,form){
      if(type == 2 && (form.reason.value == undefined || form.reason.value == '')){
        alert('请填写退修原因');
        return false;
      }
      if(type == 3 && (form.reason.value == undefined || form.reason.value == '')){
        alert('请填写拒绝原因');
        return false;
      }
      var method = 'POST';
      var url         = '/Admin/NewsShenPi';
      if(type == 2 || type == 3){
        var param   = "news_id="+newid+"&type="+type+"&reason="+form.reason.value+"&do_submit=1";
      }else{
        var param   = "news_id="+newid+"&type="+type+"&do_submit=1";
      }

      var result    = '';
      result          = diyAjax(method,url,param);
         if(result == -1){
            alert('此条新闻已审核过');
            return false;
         }

         if(result == -2) {
            alert('操作失败');
            return false;
         }
        if(type==1 || type==-1){
          //$("#news"+newid).hide('slow');
            $("#ele"+newid).hide('slow');
            var deletehtml = "<span href='javascript:void()' class='jujue"+newid+"' style='color:white;width:47px; height:21px; line-height:21px; text-align:center; display:block; background:#666; margin:0 auto;'>已批准</a>";
            $(".tag"+newid).html(deletehtml);
            $(".tag"+newid).css("display","block");
            $("#ele_jujue"+newid).css("display","none");

             $(".deleteDiv"+newid).css("display","block");
              $(".tag_shanchu"+newid).css('display','block');
              $(".tag_shangxiajia"+newid).css("display","block");
            $("#ele_tuixiu"+newid).hide('slow');
            $("#blk"+newid).hide('slow');

            //window.location.reload;
        }else if(type == 2){
            $("#ele"+newid).hide('slow');
            var deletehtml = "<span href='javascript:void()' class='jujue"+newid+"' style='width:47px; height:21px; line-height:21px; text-align:center; display:block; background:; margin:0 auto;'>已退修</a>";
            $("#ele_jujue"+newid).html("已退修");
            $(".deleteDiv"+newid).css("display","block");
            $(".tag_shanchu"+newid).css('display','block');
            $("#ele_tuixiu"+newid).hide('slow');
            $("#tuixiu_blk"+newid).hide('slow');
            //$(".main2").hide('slow');

        }else if(type == 3){
            $("#ele"+newid).hide('slow');
            var deletehtml = "<span class='jujue"+newid+"' style='color:white;width:47px; height:21px; line-height:21px; text-align:center; display:block; background:#666; margin:0 auto;'>已拒绝</span>";

            $("#ele_jujue"+newid).html("已拒绝");
            $(".deleteDiv"+newid).css("display","block");
            $(".tag_shanchu"+newid).css('display','block');
            $(".tag_bianji"+newid).css('display','none');

            //$("#ele_jujue"+newid).hide('slow');
            $("#jujue_blk"+newid).hide('slow');

             $(".deleteDiv"+newid).css("display","block");
            $("#ele_tuixiu"+newid).hide('slow');

        }
}

 //后台新闻审批详情里面的删除
function shenpiXiangqingDelete(newid){
           if(confirm('确认要删除此条新闻吗?')){
                        var method = 'POST';
                        var url         = '/Admin/NewsShenPi';
                        var param   = "news_id="+newid+"&type=5&do_submit=1";
                        var result    = '';
                        result          = diyAjax(method,url,param);

                             if(result == -1){
                                alert('此条新闻尚未批准');
                                return false;
                             }

                             if(result == -2) {
                                alert('操作失败');
                                return false;
                             }
            var deletehtml = "<span class='jujue"+newid+"' style='color:white;width:47px; height:21px; line-height:21px; text-align:center; display:block; background:#666; margin:0 auto;'>已删除</span>";
            $(".tag"+newid).html(deletehtml);
             $(".tag"+newid).css("display","block");

            $(".tag_shanchu"+newid).hide('slow');
            $(".tag_bianji"+newid).hide('slow');
            $("#ele_jujue"+newid).hide('slow');
            $("#jujue_blk"+newid).hide('slow');
            $(".tag_tag"+newid).css("display","none");
            $(".tag_shangxiajia"+newid).css("display","none");

             //$(".deleteDiv"+newid).css("display","block");
            $("#ele_tuixiu"+newid).hide('slow');
              $("#ele"+newid).hide('slow');

          }
}





//后台新闻管理 推荐 幻灯
function newsManage(newsid,type){

      var method = 'POST';
      var url         = '/Admin/NewsManage';
      var param   = "news_id="+newsid+"&type="+type+"&do_submit=1";
      var result    = '';
            result   = diyAjax(method,url,param);
         if(result == -5){
            alert('操作失败');
            return false;
         }
         if(result == -1){
            alert('推荐位已经满,请先取消其它推荐位');
            return false;
         }
         if(result == -2){
            alert('幻灯位已经满,请先取消其它幻灯位');
            return false;
         }

        if(type==1){
          $("#tuijian"+newsid).html('');
          var str = "<div  class='tigger222' onclick=newsManage('"+newsid+"','"+3+"')>取消推荐</div>";
            $("#tuijian"+newsid).html(str);
            $("#huandeng"+newsid).hide("slow");
        }
        if(type==3){
          $("#tuijian"+newsid).html('');
          var str = "<div  class='tigger222' onclick=newsManage('"+newsid+"','"+1+"')>推荐</div>";
            $("#tuijian"+newsid).html(str);

            var huandeng = "<div  class='tigger222' onclick=newsManage('"+newsid+"','"+2+"')>幻灯</div>";
            $("#huandeng"+newsid).html(huandeng);
            $("#huandeng"+newsid).show();
        }
        if(type==2){
          $("#huandeng"+newsid).html('');
          var str = "<div  class='tigger222' onclick=newsManage('"+newsid+"','"+4+"')>取消幻灯</div>";
            $("#huandeng"+newsid).html(str);

            var tuijian = "<div  class='tigger222' onclick=newsManage('"+newsid+"','"+3+"')>推荐</div>";
            $("#tuijian"+newsid).html(tuijian);
            $("#tuijian"+newsid).hide('slow');
        }
        if(type==4){
          $("#huandeng"+newsid).html('');
          var str = "<div  class='tigger222' onclick=newsManage('"+newsid+"','"+2+"')>幻灯</div>";
            $("#huandeng"+newsid).html(str);
            $("#huandeng"+newsid).show();

            var tuijian = "<div  class='tigger222' onclick=newsManage('"+newsid+"','"+3+"')>推荐</div>";
            $("#tuijian"+newsid).html(tuijian);
            $("#tuijian"+newsid).show();
        }
}

    //创建项目
    function verifyProject() {
        if($("#title").val()=="")
        {
            alert("请输入项目标题");
            return false;
        }
        if($("#endDate").val()=="")
        {
            alert("请输入项目结束时间");
            return false;
        }
        return true;
    }

   //删除单条群组
  function delOpposite(oid){

      if(!confirm('删除群组，会同时删除群组机构设置，确定删除吗？'))
        return false;
      var method = 'POST';
      var url         = '/Admin/DelOpp';
      var param   = "oid="+oid;
      var result    = '';

      result = diyAjax(method,url,param);
      if(result == 1){
         alert('删除成功');
         //$("#opplist_"+oid).hide('slow');
         location.href="oppIndex";
      } else {
        alert('删除失败');
        return false;
      }
  }

  //点击编辑单条群组
  function editOpposite(oid){
      $("#opptext_"+oid).hide();
      $("#oppipt_"+oid).show();
      $("#update_"+oid).hide();
      $("#forupdate_"+oid).show();
  }

  //点击编辑单条群组
  function cancleEdit(oid){
      $("#opptext_"+oid).show();
      $("#oppipt_"+oid).hide();
      $("#update_"+oid).show();
      $("#forupdate_"+oid).hide();
  }

  //确定编辑单条群组
  function confirmEdit(oid){
      //$("#opptext_"+oid).show();
      $("#oppipt_"+oid).hide();
      $("#update_"+oid).show();
      $("#forupdate_"+oid).hide();
      var method = 'POST';
      var url         = '/Admin/EditOppName';
      var param   = "oid="+oid+"&otext="+$("#oppipt_"+oid).val();
      var result    = '';
      result = diyAjax(method,url,param);
      if(result == 1){
         alert('重命名成功');
         $("#opptext_"+oid).text($("#oppipt_"+oid).val());
         $("#opptext_"+oid).show();
      } else {
        alert('重命名失败');
        $("#opptext_"+oid).show();
        return false;
      }

  }

  //删除单条敌对台
  function delOppGroup(pkid){

      if(!confirm('确定将该机构从敌对组中删除吗？'))
        return false;
      var method = 'POST';
      var url         = '/Admin/delOppGroup';
      var param   = "pkid="+pkid;
      var result    = '';

      result = diyAjax(method,url,param);
      if(result == 1){
         alert('删除成功');
         $("#oppgrouplist_"+pkid).hide('slow');
      } else {
        alert('删除失败');
        return false;
      }
  }


//后后用户管理 禁止
function ManageUser(thi,id,type){
             var method = 'POST';
             if(type == 'admin'){
                var url = '/Admin/Disab';
             }
             if(type == 'front'){
               var url = '/UserCenter/Disab';
             }

                if(thi.checked == true){
                    var param   = "uid="+id+"&is_disable="+1;
                    var result    = '';
                          result = diyAjax(method,url,param);
                           $(".down_"+id).prop('disabled',true);
                           $(".up_"+id).prop('disabled',true);
                           if(type == 'admin') $(".wuxian_"+id).prop('disabled',true);

                }else{
                    var param   = "uid="+id+"&is_disable="+2;
                    var result    = '';
                          result = diyAjax(method,url,param);
                        $(".down_"+id).prop('disabled',false);
                        $(".up_"+id).prop('disabled',false);
                        if(type == 'admin') $(".wuxian_"+id).prop('disabled',false);
                }
}

//删除机构总账号或者子账号
function deleteManagerUser(uid,type){
         var method = 'POST';
         var url = '/Admin/DeleteManagerUser';
        var param   = "uid="+uid+"&type="+type;
        var result    = '';
             result    = diyAjax(method,url,param);
            $("#user_"+uid).remove();
            window.location.reload();
            //$(".up_"+id).prop('disabled',false);
}

function resetPassword(uid){
    if(confirm('你确定要重置此用户的密码吗?')){
           var method = 'POST';
           var url = '/Admin/ResetManagerUser';
          var param   = "uid="+uid;
          var result    = '';
               result    = diyAjax(method,url,param);
               if(result == 1) alert('重置成功');
               if(result == -1) alert('重置失败');
    }
}



//新闻列表页面

function checkSearchValue(thi){
      if(thi.checked=='true' || thi.value=='all'){
          $(".search_title").prop("checked",false);
          $(".search_group").prop("checked",false);
          $(".search_content").prop("checked",false);
      }else{
        $(".search_all").prop("checked",false);
      }
}



//首页



function tabList(tag){
var onclic = {
                      "float":'left',
                      "width":'82px',
                      "height":'26px',
                      "background":'#666',
                      "margin-top":'10px',
                      "margin-right":'10px',
                      "text-align":'center',
                      "line-height":'26px',
                      "font-size":'14px',
                      "font-family":'微软雅黑',
                      "color":'#FFF',
};

var noclic = {
            "float":'left',
            "width":'62px',
            "height":'46px',
            "text-align":'center',
            "line-height":'46px',
            "font-size":'14px',
  };

  if(tag==1){
    $("#click_desc").attr('class','indexblock');
    $("#download_desc").attr('class','indexnone');
    $(".tab1").show();
    $(".tab2").hide();
  }
  if(tag==2){
     $("#click_desc").attr('class','indexnone');
    $("#download_desc").attr('class','indexblock');
    $(".tab1").hide();
    $(".tab2").show();
  }
}



//首页主编推荐和热点新闻切换
function setTab(name,cursel,n){
  for(i=1;i<=n;i++){
  var menu=document.getElementById(name+i);
  var con=document.getElementById("con_"+name+"_"+i);

  menu.className=i==cursel?"hover":"";
  con.style.display=i==cursel?"block":"none";
  }
          if(cursel == 1){
                  $(".tab1").show();
                  $(".tab2").hide();
                  $("#click_desc").attr("class",'indexblock');
                  $("#download_desc").attr("class",'indexnone');
                  $(".con_rig_wz").show();
          }

          if(cursel  == 2){
                  $(".tab1").hide();
                  $(".tab2").hide();
                   $(".con_rig_wz").hide();
          }
    }


//后台超级管理员激活 与删除
function ManagerJiHuo(managerId,type){
            var method = 'POST';
            var url         = '/Admin/JiHuo';
            var param   = "managerId="+managerId+"&type="+type;
            var result    = '';
            var str        = '';
                  result   = diyAjax(method,url,param);
                  if(result == -2){
                      alert('不能删除,系统只剩一个管理员了');
                      return false;
                  }
                 if(result == -1){
                    if(type == 1) {
                       alert('激活失败');
                       return false;
                    }
                    if(type == 2) {
                       alert('删除失败');
                       return false;
                    }
                 }
                 if(result == 1){
                    if(type == 1) {
                       alert('激活成功');
                       str = "<a href='javascript:void(0)' class='ht_anniu'>已激活</a>";
                       $("#jihuo"+managerId).html(str);
                       return false;
                    }
                    if(type == 2) {
                       alert('删除成功');
                       // str = "<a href='javascript:void(0)' class='ht_anniu'>已激活</a>";
                       $("#delete"+managerId).remove();
                       window.location.href=window.location.href;
                       return false;
                    }
                 }
}







//封装的AJAX
function diyAjax(method,url,param){
          var tmpvar = "";
          $.ajax({
                type: method,
                url: url,
                async: false,
                data: param,
                success: function(res){
                    tmpvar = res;
                }
          });
          return tmpvar;
}
