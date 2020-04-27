<?php
header("Content-Type:text/html;charset=utf-8");
require_once "conn.php";
$lm1=$_POST['lm1'];
$sql="insert into lm(lm1)values('$lm1')";
$query=mysql_query($sql)or die (mysql_error());
if (mysql_insert_id()>0) {
    
     header("Location:admin_news_lm.php");
}
?>
