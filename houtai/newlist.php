<?php
header("Content-Type:text/html;charset=utf-8");
include_once('conn.php');
function getnews($grade_lm,$id)
{
    if($grade_lm=='lm3'){
        $sql="select *from  news where lm3='$id'";
    }else if($grade_lm=='lm2'){
        $sql="select *from  news where lm2='$id' and lm3='0'";
    }else if($grade_lm=='lm1'){
        $sql="select *from  news where lm1='$id' and lm3='0' and lm2='0'";
    }
    $query=mysql_query($sql);
    echo "<ol>";
    while($res=mysql_fetch_array($query)){
        echo "<li><a href='news_content.php?id=$res[id]'>$res[title]</a></li>";
    }
    echo "</ol>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Newlis</title>

</head>
<body>
    <div id="news1">
        <h2>地球往事</h2> 
<?php
 getnews('lm1',14);
?>           
    </div>
</body>
</html>
