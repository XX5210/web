<?php
include_once("db_class.php");
$db=new my_db("localhost","root","123456","liuyan");
if($_GET['submit']=="搜索" || !empty($_GET['so'])){
    $pagesize=4;
    $sql="select count(*) from user_message where `content` like '%$_GET[so]%'";
}else{
    $pagesize=4;/*规定每一页显示的记录数*/
    /*计算表中数据的条数*/
    $sql="select count(*) from user_message";
}
$query=mysql_query($sql) or die(mysql_error());
$res=mysql_fetch_array($query);
$num=$res[0];
$pagetotal=ceil($num/$pagesize);//
if(empty($_GET['page']) || $_GET['page']<=1){
    $curpage=1;/*获取当前页的页数*/
}else if($_GET['page']>=$pagetotal){
    $curpage=$pagetotal;
}else{
    $curpage=$_GET['page'];
}
$offsetrecords=($curpage-1)*$pagesize;
if($_GET['submit']=="搜索" || !empty($_GET['so'])){
    $sql="select *from user_message where `content` like '%$_GET[so]%' order by id desc limit  $offsetrecords,$pagesize";
}else{
    $sql="select * from user_message order by id desc limit $offsetrecords,$pagesize";
}
$query=mysql_query($sql);
$Floor_num=$num-$offsetrecords;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>留言系统</title>
<link rel="stylesheet" href="style/message.css"/>
<script type="text/javascript" src="http://ip.chinaz.com/getip.aspx"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script>
    function soso(){
        var s=document.form1; 
        if(s.so.value==""){
            alert("请输入内容后再点击搜索！！！");
            s.so.focus();
            return false;
        }
    }
</script>
<script>
	$(document).ready(function() {
       $(".message_pulish_right_shangchuan").hide();
	   $(".shangchuan").click(function(){
		   		$(".message_pulish_right_shangchuan").show();
				$(".shangchuan").remove();
		   });
    });
</script>
<script>
function checkemail(){
var temp = document.getElementById("eemail");
//对电子邮件的验证
var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
if(temp.value!=""){
		if(!myreg.test(temp.value)){
			alert('邮箱可以不写，但是不要乱写哦！！！');
			var txt1=document.getElementById("eemail");
  				txt1.value="";
  				txt1.focus();
			return false;
		}
				}
}
</script>
<script>
function tijiao(){
    var temp = document.getElementById("ttext");
    var yzm=document.getElementById("yanzheng");    
if(temp.value==""){
            alert("随便说点什么吧！！！");
            return false;
            } 
if(yzm.value==""){
             alert("请输入验证码！");
            return false; 
            }
}
</script>
</head>

<body>
<div class="message">
	<div class="message_tile">留言板
    </div>
    
    <div class="message_master">
   		<a>主人寄语</a><a style="margin-left:10px">编辑我的寄语</a>
    	<span><marquee loop="-1" direction="left">就算不能永远向着阳光，也要抬起头勇往直前！</marquee></span>
    </div>
    <form action="message_ok.php" method='post' enctype="multipart/form-data">
    <div class="message_pulish" id="liuyankuang">
    	<span>发表您的留言</span>
        <div id="message_pulish_left">
        
			<input name="username" type="text" placeholder="你的名字" onFocus="this.placeholder = '';" onBlur="if (this.value == '') {this.placeholder = 'Your Name';}"/>
			<input id="eemail" name="useremail" style="width:365px;" type="text" placeholder="你的邮箱(仅站长可见)" onFocus="this.placeholder = '';" onBlur="if (this.placeholder == '') {this.placeholder = 'Your Email';}checkemail();"/>
			<textarea id="ttext" name="content" type="text" placeholder="要给我说些什么吗？（留言默认公开，想对我说悄悄话？请点击下方☟<私密留言>后提交。）" onFocus="this.placeholder = '';" onBlur="if (this.placeholder == '') {this.placeholder = 'Your Message Here ...';}" required></textarea>
			<input type="submit" value="提交" onClick="return tijiao();"/>
            <input id="checkbok_select" type="checkbox"/><label for="checkbok_select">私密留言</label>
            <input type="code" id="yanzheng" name="yanzheng" placeholder="请输入验证码☛" onFocus="this.placeholder = '';" onBlur="if (this.placeholder == '') {this.placeholder = 'verification code';}"/><img src="yanzhengma.php" align="absbottom" onclick="this.src=this.src+'?'+Math.random()" style=""/>
            
        </div>
        
        <div id="message_pulish_right">
                <label for="user_1"><img src="image/user.jpg"/></label><input id="user_1" type="radio" name="radio" value="image/user.jpg"/>
                <label for="user_2"><img src="image/user1.png"/></label><input id="user_2" type="radio" name="radio" value="image/user1.png"/>
                <label for="user_3"><img src="image/user2.png"/></label><input id="user_3" type="radio" name="radio" value="image/user2.png"/>
                <label for="user_4"><img src="image/user3.png"/></label><input id="user_4" type="radio" name="radio" value="image/user3.png"/>
                <label for="user_5"><img src="image/user4.png"/></label><input id="user_5" type="radio" name="radio"value="image/user4.png"/>
                <label for="user_6"><img src="image/user5.png"/></label><input id="user_6" type="radio" name="radio" value="image/user5.png"/>
                <label for="user_7"><img src="image/user6.png"/></label><input id="user_7" type="radio" name="radio" value="image/user6.png"/>
                <label for="user_8"><img src="image/user7.png"/></label><input id="user_8" type="radio" name="radio" value="image/user7.png"/>
            <a class="shangchuan">（☛点击这里☚）上传你喜欢的头像☺</a>
            <div class="message_pulish_right_shangchuan"><input type="file" name="picture"></div>
        </div>      
    </div>
    </form>
    <div class="user_message_title" id="fenye">
        留言(<?php echo $num;?>)
            <?php
            if(empty($_GET['so'])){if($curpage==1 & $pagetotal==1){
            ?>
            <a>下一页</a>
            <a style="margin-right:10px">上一页</a>
            <?php
            }else if($curpage==1){
            ?>
            <a href="message.php?page=<?php echo $curpage+1; ?>">下一页</a>
            <a style="margin-right:10px">上一页</a>
            <?php
            }else if($curpage==$pagetotal){
            ?>
            <a>下一页</a>
            <a style="margin-right:10px" href="message.php?page=<?php echo $curpage-1; ?>">上一页</a>
            <?php
            }else{
            ?>
            <a href="message.php?page=<?php echo $curpage+1; ?>">下一页</a>
            <a style="margin-right:10px" href="message.php?page=<?php echo $curpage-1; ?>">上一页</a>
            <?php
             }}else{if($curpage==1 & $pagetotal==1){
            ?>
            <a>下一页</a>
            <a style="margin-right:10px" >上一页</a>
            <?php
             }else if($curpage==1){
            ?>
            <a href="message.php?page=<?php echo $curpage+1; ?>&so=<?php echo $_GET['so']; ?>">下一页</a>
            <a style="margin-right:10px" >上一页</a>
            <?php
            }else if($curpage==$pagetotal){
            ?>
            <a>下一页</a>
            <a style="margin-right:10px" href="message.php?page=<?php echo $curpage-1; ?>&so=<?php echo $_GET['so']; ?>">上一页</a>
            <?php
            }else{
            ?>
            <a href="message.php?page=<?php echo $curpage+1; ?>&so=<?php echo $_GET['so']; ?>">下一页</a>
            <a style="margin-right:10px" href="message.php?page=<?php echo $curpage-1; ?>&so=<?php echo $_GET['so']; ?>">上一页</a>
            <?php
            }}
            ?>
        <form name="form1" onsubmit="return soso()" method="get" action="message.php">
        <input type="text" name="so" style="width:120px"/>
        <input type="submit" name="submit" value="搜索" style="border:0"/>
        </form>
    </div>

<?php

while($res=mysql_fetch_array($query))
{
    $sqlhf="select * from admin_replay where userid=$res[id]";
    $queryhf=mysql_query($sqlhf); 
    $reshf=mysql_fetch_array($queryhf);
?>    
	<div class="user_message">
		<div class="user_message_image"><img src="<?php echo $res['url']?>"/></div>
        <div class="user_message_floor">第<?php echo $Floor_num--;?>楼</div>
        <div class="user_message_mail"><?php echo $res['useremail']?></div>
    	<div class="user_message_name"><?php echo $res['username'];?></div>
        
        <div class="user_message_content">
    <?php 
    if ($_GET['submit']=="搜索" || !empty($_GET['so'])) {
        $res['content']=str_replace($_GET['so'],
            "<span style='color:red;font-weight:bold;'>".$_GET['so']."</span>",$res['content']);
             }
        echo $res['content'];  
    ?>
        </div>
    	<div class="user_message_time"><?php echo $res['usertime'];?><a href="">【删除】</a><a href="" style="margin-right:20px">【回复】</a></div> 
    	<div class="admin_reply">
    	<div class="admin_reply_image"><img src="image/cortana.jpg"/></div>
    	<div class="admin_reply_name">管理员</div>
        <div class="admin_reply_content"><?php echo $reshf['content'];?></div>
        <div class="admin_reply_time">2016-02-09　08:39</div>
    	</div>
    </div>  
<?php
}
?>
<?php

if(!empty($res)){
    echo "<script>
        alert('对不起，您搜索的内容不存在！！！');
        history.go(-1);
    </script>";}
?>
    <div class="message_foot">
    	<div class="message_foot_left">
    	<a href="#liuyankuang">我要留言</a><a style="margin-left:10px">批量管理</a>
    	</div>
       
    <?php
if(empty($_GET['so'])){
    if($curpage==1 & $pagetotal==1){
    ?>
            <div class="message_foot_right">
                <a style="margin-right:10px">首页</a>
                <a style="margin-right:10px">上一页</a>
                <a style="margin-right:10px">下一页</a>
                <a style="margin-right:10px">尾页</a>
            </div>
<?php
}else if($curpage==1){
?>  
            <div class="message_foot_right">
                <a style="margin-right:10px">首页</a>
                <a style="margin-right:10px">上一页</a>
                <a style="margin-right:10px" href="message.php?page=<?php echo $curpage+1; ?>#fenye">下一页</a>
                <a style="margin-right:10px" href="message.php?page=<?php echo $pagetotal; ?>#fenye">尾页</a>
            </div>  
<?php
}else if($curpage==$pagetotal){
?>
            <div class="message_foot_right">
                 <a style="margin-right:10px" href="message.php?page=1#fenye">首页</a>
                 <a style="margin-right:10px"  href="message.php?page=<?php echo $curpage-1; ?>#fenye">上一页</a>
                 <a style="margin-right:10px">下一页</a>
                 <a style="margin-right:10px">尾页</a>
            </div>
<?php
}else{
?>
            <div class="message_foot_right">
                <a style="margin-right:10px" href="message.php?page=1#fenye">首页</a>
                <a style="margin-right:10px"  href="message.php?page=<?php echo $curpage-1; ?>#fenye">上一页</a>
                <a style="margin-right:10px" href="message.php?page=<?php echo $curpage+1; ?>#fenye">下一页</a>
                <a style="margin-right:10px" href="message.php?page=<?php echo $pagetotal; ?>#fenye">尾页</a>
            </div>
<?php
} }else { if($curpage==1 & $pagetotal==1){
?>
            <div class="message_foot_right">
                <a style="margin-right:10px">首页</a>
                <a style="margin-right:10px">上一页</a>
                <a style="margin-right:10px">下一页</a>
                <a style="margin-right:10px">尾页</a>
            </div>
    <?php
}else if($curpage==1){
        ?>
            <div class="message_foot_right">
                <a style="margin-right:10px">首页</a>
                <a style="margin-right:10px">上一页</a>
                <a style="margin-right:10px" href="message.php?page=<?php echo $curpage+1; ?>&so=<?php echo $_GET['so']; ?>#fenye">下一页</a>
                <a style="margin-right:10px" href="message.php?page=<?php echo $pagetotal; ?>&so=<?php echo $_GET['so']; ?>#fenye">尾页</a>
            </div>
<?php
}else if($curpage==$pagetotal){
?>  
            <div class="message_foot_right">
                <a style="margin-right:10px" href="message.php?page=1&so=<?php echo $_GET['so']; ?>#fenye">首页</a>
                <a style="margin-right:10px"  href="message.php?page=<?php echo $curpage-1; ?>&so=<?php echo $_GET['so']; ?>#fenye">上一页</a>
                <a style="margin-right:10px">下一页</a>
                <a style="margin-right:10px">尾页</a>
            </div>  
        <?php
          } else{
        ?>
            <div class="message_foot_right">
                <a style="margin-right:10px" href="message.php?page=1&so=<?php echo $_GET['so']; ?>#fenye">首页</a>
                <a style="margin-right:10px"  href="message.php?page=<?php echo $curpage-1; ?>&so=<?php echo $_GET['so']; ?>#fenye">上一页</a>
                
                <a style="margin-right:10px" href="message.php?page=<?php echo $curpage+1; ?>&so=<?php echo $_GET['so']; ?>#fenye">下一页</a>
                <a style="margin-right:10px" href="message.php?page=<?php echo $pagetotal; ?>&so=<?php echo $_GET['so']; ?>#fenye">尾页</a>
            </div>
<?php
}}
?>
    </div> 
</div>


</body>
</html>
