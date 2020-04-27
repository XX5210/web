<?php
$lm=$_GET['lm'];
$id=$_GET['id'];
$lmname=$_GET['lmname'];
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>Admin_edit_lm</title>
    
</head>
<body>
    <form action="admin_edit_lm_ok.php" method="post">
    <input type="hidden" name="lm" value="<?php echo $lm;?>"/>
    <input type="hidden" name="id" value="<?php echo $id;?>"/>
    <input type="text" name="lmname" value="<?php echo $lmname;?>"/>
     <input type="submit" name="" value="提交"/>    
    
   
    </form>
</body>
</html>
