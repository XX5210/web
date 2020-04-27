<?php
header("Content-Type:text/html;charset=utf-8");
require_once "conn.php";
   $id=$_POST['id'];
   $lm=$_POST['lm'];
   $lmname=$_POST['lmname'];
   if ($lm=='lm1') {
       $sql="update lm set lm1='$lmname' where id=$id";
   }else if($lm=='lm2'){
       $sql="update lm set lm2='$lmname' where id=$id";
   }else if($lm=='lm3'){
       $sql="update lm set lm3='$lmname' where id=$id";
   }
   $query=mysql_query($sql)or die(mysql_error());
   header("Location:admin_news_lm.php");
?>

