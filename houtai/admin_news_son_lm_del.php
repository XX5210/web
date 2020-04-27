<?php
require_once "conn.php";
header("Content-Type:text/html;charset=utf-8");
//1.接受传递的值
    $id=intval($_GET['id']);//删除的栏目ID
    $lm=$_GET['lm'];//删除的栏目级别
//2.判读栏目
if($lm == 'lm1')
{
    //删除一级
    $sql="delete from lm where id=$id";
    mysql_query($sql) or die("删除一级".mysql_error());
    //删除二级
    $sql2="select * from lm where lmid=$id";
    $query=mysql_query($sql2) or die("查询二级".mysql_error());
    $res=mysql_fetch_array($query);
    if(!empty($res))
    {
        $id2=$res['id'];//保存二级的id   
        $sql2="delete from lm where lmid=$id";
        mysql_query($sql2) or die("删除二级".mysql_error());       
        //删除三级
        $sql3="select * from lm where lmid=$id2"; 
        $res=mysql_query($sql3) or die("查询三级".mysql_error());
        if(!empty($res))
        {
            $sql3="delete from lm where lmid=$id2";
             mysql_query($sql3) or die("删除三处级".mysql_error());
        }
    }
   header("Location:admin_news_lm.php");  
}else if($lm =='lm2'){
   $sql="delete from lm where id=$id";
   mysql_query($sql) or die("删除二级".mysql_error());
   //判断二级下是否有三级
   $sql3="select * from lm where lmid=$id";
   $res=mysql_query($sql3) or die("查询三级".mysql_error());
   if(!empty($res))//真，则删除三级
   {
       $sql="delete from lm where lmid=$id";
       mysql_query($sql) or die("删除三级".mysql_error);
   }
    header("Location:admin_news_lm.php");
}else if($lm == 'lm3'){//只删除三级
    $sql="delete from lm where id=$id";
    mysql_query($sql) or die("三级".mysql_error());
    header("Location:admin_news_lm.php");
}
?>

