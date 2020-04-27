<?php
header("Content-Type:text/html;charset=utf-8");
include_once "db_class.php";
$db=new my_db();
//取出表中所有的记录
$sql="select * from news ";
$query=mysql_query($sql) or die("出错".mysql_error());
$res=$db->get_all_record("select * from news");
$num=count($res);//计算二维数组的行数
$num_records=$num;//总留言数
$page_size=5; //每一页的记录数
$page_count=ceil($num_records/$page_size);// 计算总页数       行数除以每一行的数
if(empty($_GET['page']))
{
    $cur_page=1; //  设置当前页的页码是1
}else{
    if($_GET['page']<=0){
       $cur_page=1;
    }
    else if($_GET['page']>=$page_count){
     $cur_page=$page_count;
    }
    else{
        $cur_page=$_GET['page'];
    }

}
$offset=($cur_page-1)*$page_size;
$sql="select * from news order by id desc limit $offset,$page_size";
$query=mysql_query($sql);
$res=$db->get_all_record($sql);
?>


<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>信息显示界面</title>
</head>
<body>
<form action="admin_news_list_submit" method="get" accept-charset="utf-8">
    <table border="1" cellpadding="1" >
        <tr><th>标题</th><th>栏目</th><th>操作1</th><th>操作2</th></tr>
<?php
while ($res=mysql_fetch_array($query)) {
    $resss=$res;
?>

    <tr> <td><?php echo $res['title']?></td>

        <td><?php
    //1.从news表中先取出三个栏目的id
            if (!empty($res['lm3'])) 
             {
                 $sql="select * from lm where id=$res[lm3]";
                 $query1=mysql_query($sql) or die(mysql_error());
                 $res=mysql_fetch_array($query1);
                 echo($res['lm3']);
              }else if (!empty($res['lm2'])) {
                  $sql="select * from lm where id=$res[lm2]";
                  $query1=mysql_query($sql) or die(mysql_error());
                  $res=mysql_fetch_array($query1);
                  echo $res['lm2'];
              }else if (!empty($res['lm1'])) {
                  $sql="select * from lm where id=$res[lm1]";
                  $query1=mysql_query($sql) or die(mysql_error());
                  $res=mysql_fetch_array($query1);
                  echo $res['lm1'];
              }
            
?> </td>

    <td><a href="admin_news_del.php?id=<?php echo $resss[id]?>">删除</a></td>
        <td><a href="admin_news_update.php?id=<?php echo $resss[id]?>">修改</a></td>
    </tr>
<?php
}
?>

    </table>

<?php
if($cur_page==1){
    echo "<div class=ok><a>首页</a>
         <a>上一页</a>
         <a href=admin_news_list.php?page=".($cur_page+1).">下一页</a>
         <a href=admin_news_list.php?page=".($page_count).">尾页</a></div>";
}
else if($cur_page==($page_count)){
    echo "<div class=ok><a href=admin_news_list.php?page=".(1).">首页</a>
         <a href=admin_news_list.php?page=".($cur_page-1).">上一页</a>
         <a>下一页</a>
        <a>尾页</a></div>";     
}else{
    echo
        "<div class=ok><a href=admin_news_list.php?page=".(1).">首页</a>
        <a href=admin_news_list.php?page=".($cur_page-1).">上一页</a>
        <a href=admin_news_list.php?page=".($cur_page+1).">下一页</a>
         <a href=admin_news_list.php?page=".($page_count).">尾页</a></div>";
}
?>


</form>
</body>
</html>

