<?php
/* @var $this yii\web\View */
?>
<h1>content/index</h1>

<!--<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>-->
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>�ޱ���ҳ</title>
<script src="js/jquery-2.1.4.js" type="text/javascript"></script>
<style type="text/css">
.clear{overflow:hidden; clear:both; width:0px; height:0px; }
.imgbox{width:640px; margin:0 auto; text-align:center; }
ul{padding:0px; margin:0px;}
ul li{float:left; list-style:none; }
ul li.select{display:block;}
.imgnum span{border-radius:10px; font:normal normal bold 12px/15px ΢���ź�; color:#FFF; margin-left:5px; padding:3px 6px 3px 6px; background-color:#F90; cursor:pointer;}
.imgnum span.onselect{background-color:#F00;}
.imgnum{text-align:center; float:right; margin:-30px 30px; position:relative;}
</style>
</head>
<body>
<div class="imgbox">
<ul id="banner_img">
<?php foreach($data as $v){?>
<li><img src="backend/web/uploads/<?php echo $v['c_photo']?>"/></li>
<?php }?>
</ul>
<div class="clear"></div>
<div class="imgnum">
<?php foreach($data as $v){?>
<span class="onselect">1</span>
<?php }?>
<span>2</span>
<span>3</span>
<span>4</span>
<span>5</span>
</div>
</div>
<script type="text/javascript">
var time = "";
var index = 1;
$(function () {
showimg(index);
//��������Ƴ�
$(".imgnum span").hover(function () {
clearTimeout(time);
var icon=$(this).text();
$(".imgnum span").removeClass("onselect").eq(icon-1).addClass("onselect");
$("#banner_img li").hide().stop(true,true).eq(icon-1).fadeIn("slow");
}, function () {
index=$(this).text()> 4 ? 1 :parseInt($(this).text())+1;
time = setTimeout("showimg(" + index + ")", 3000);
});
});
function showimg(num) {
index = num;
$(".imgnum span").removeClass("onselect").eq(index-1).addClass("onselect");
$("#banner_img li").hide().stop(true,true).eq(index-1).fadeIn("slow");
index = index + 1 > 5 ? 1 : index + 1;
time = setTimeout("showimg(" + index + ")", 3000);
}
</script>
</body>
</html>
