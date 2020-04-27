<?php
header("Content-Type:text/html;charset=utf-8");
require_once "conn.php";
//接传过来的值
$title=$_POST['title'];
$lm=$_POST['lm'];
$user=$_POST['user'];
$content=$_POST['content'];
$time=date('Y-m-d');
$auther=$_POST['adduser'];
$lmid=explode("|",$lm);
//echo stripslashes() ;
//判断信息的完整性
if (empty($title)||empty($lm)||empty($user)||empty($content)) {
    echo "<script>
        alert('请输入完整的信息后再点击提交！！！');
        histroy.go(-1);
        </script>";
    exit;
        }
//构建sql语句入库
$sql="insert into news(lm1,lm2,lm3,title,content,time,hit,adduser)values
    ('$lmid[0]','$lmid[1]','$lmid[2]','$title','$content','$time',10,'$auther')";
$query=mysql_query($sql)or die ("插入失败".mysql_error());
if (mysql_insert_id()>0) {
   echo" <script>
       alert('插入成功');
    window.location.href='admin_news_add.php';
    </script>"; 
}else{
    echo" <script>
       alert('插入失败');
       window.location.href='admin_news_add.php';
    </script>"; 
}
?>
