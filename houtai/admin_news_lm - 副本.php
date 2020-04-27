<?php
include_once "conn.php";
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>栏目的操作</title>
    
</head>
<body>
<!--增加一级栏目-->
  <form action="admin_news_lm1.php" method="post" accept-charset="utf-8">
    增加一级栏目<input type="text" name="lm1" value="">
                <input type="submit" value="增加"></p>
  </form> 
<!------增加子栏目（二级或三级）------>
<?php
if (!empty($_GET['lm'])) {
    echo "父栏目：".$_GET['parentLmName'];
?>
<form action="admin_news_lm_son.php" method="post" accept-charset="utf-8">
<input type="hidden" name="parent_lmid" value="<?php echo $_GET['parent_lmid']; ?>">
<input type="hidden" name="lm_grade" value="<?php echo $_GET['lm'];?>">
    增加子栏目　<input type="text" name="lmSonName" value="">
              <input type="submit" value="增加">
              <a href="admin_news_lm.php" target="_self">取消</a>
</form>
<?php
}
?>
<!--栏目显示部分--> 
 <?php
 $sql1="select id,lm1 from lm where lm1 !=''";
 $query1=mysql_query($sql1) or die("1级".mysql_error());
 while($res1=mysql_fetch_array($query1))
 {
     echo $res1['lm1']."<a href='admin_news_lm.php?lm=lm2&parentLmName=$res1[lm1]&parent_lmid=$res1[id]'>【增加二级】</a>
         <a href='admin_news_son_lm_del.php?id=$res1[id]&lm=lm1'>【删除】</a>
         <a href='admin_edit_lm.php?id=$res1[id]&lm=lm1&lmname=$res1[lm1]'>【修改】</a>
         <br/>";
     
     $sql2="select id,lm2 from lm where lmid='$res1[id]'";
     $query2=mysql_query($sql2) or die("2级".mysql_error());
     while($res2=mysql_fetch_array($query2))
     {
         echo"---".$res2['lm2']."<a href='admin_news_lm.php?lm=lm3&parentLmName=$res2[lm2]&parent_lmid=$res2[id]'>【增加三级】</a>
             <a href='admin_news_son_lm_del.php?id=$res2[id]&lm=lm2'>【删除】</a>
             <a href='admin_edit_lm.php?id=$res2[id]&lm=lm2&lmname=$res2[lm2]'>【修改】</a>
             <br/>";  
          $sql3="select id,lm3 from lm where lmid='$res2[id]'";
          $query3=mysql_query($sql3) or die("3级".mysql_error());
     while($res3=mysql_fetch_array($query3))
     {
         echo"-------".$res3['lm3']."<a href='admin_news_son_lm_del.php?id=$res3[id]&lm=lm3'>【删除】</a>
             <a href='admin_edit_lm.php?id=$res3[id]&lm=lm3&lmname=$res3[lm3]'>【修改】</a>
             ";     
     }   
     }
     echo "<br></br>-------------------------------------------<br/>";

 }

?>
</body>
</html>

