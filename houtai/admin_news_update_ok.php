<?php
    header("Content-Type:text/html;charset=utf-8");
    require_once "conn.php";
    $id=intval($_POST['id']);
    $title=$_POST['title'];
    $lm=$_POST['lm'];
    $lmid=explode("|",$lm);
    $content=$_POST['content'];
    $user=$_POST['user'];
    $time=date('Y-m-d');    
    $sql="update news set title='$title',lm1='$lmid[0]',lm2='$lmid[1]',lm3='$lmid[2]',content='$content',
        adduser='$user',time='$time' where id=$id";
    $query=mysql_query($sql) or die(mysql_error());
    header("Location:admin_news_list.php");
?>
