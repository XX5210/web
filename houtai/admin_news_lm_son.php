<?php
header("Content-Type:text/html;charset=utf-8");
require_once "conn.php";
$parent_lmid=$_POST['parent_lmid'];//父栏目的id
$lmSonName=$_POST['lmSonName'];//子栏目的名字；
$lm_grade=$_POST['lm_grade'];
    //判断栏目
if ($lm_grade=='lm2') 
{
    $sql="insert into lm(lm2,lmid) values('$lmSonName','$parent_lmid')";
}else if($lm_grade=='lm3')
{
     $sql="insert into lm(lm3,lmid) values('$lmSonName','$parent_lmid')";
  
}


$query=mysql_query($sql)or die ("子栏目插入".mysql_error());
if (mysql_insert_id()>0) {
    
     header("Location:admin_news_lm.php");
}
?>
