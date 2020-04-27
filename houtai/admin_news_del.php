<?php
    require_once "conn.php";
    $id=intval($_GET['id']);
    $sql="delete from news where id=$id";
    $query=mysql_query($sql) or die(mysql_error());
    if(mysql_affected_rows()>0)
    {
        header("Location:admin_news_list.php");
    }
 
?>
