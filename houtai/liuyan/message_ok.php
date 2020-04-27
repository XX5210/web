<?php
include_once("db_class.php");
$db=new my_db("localhost","root","123456","liuyan");
session_start();

//图片处理程序
if (is_uploaded_file($_FILES["picture"]["tmp_name"])) {
    $upfile=$_FILES["picture"];
    $name=$upfile["name"];
    $type=$upfile["type"];
    $size=$upfile["size"];
    $tmp_name=$upfile["tmp_name"];//
    $error=$upfile["error"];
    switch($type){
        case "image/jpg":$ok=1;
        break;
        case "image/pjpeg":$ok=1;
        break;
        case "image/jpeg":$ok=1;
        break;
        case "image/gif":$ok=1;
        break;
        case "image/png":$ok=1;
        break;
        default:$ok=0;
        break;
    }
 
    if ($ok && $error=="0") {      
        if(move_uploaded_file($tmp_name,"image_ok/"."2016".iconv("UTF-8","GB2312",$name) )){
            $url="image_ok/"."2016".$name;
         //  echo $url; exit;
        }
    }
}
//echo $url;
if (empty($url) && empty($_POST['radio'])) {
    unset($_POST['radio']);
    $_POST['url']="image/user.jpg";
}else if(empty($url) && !empty($_POST['radio']))
{
    $_POST['url']=$_POST['radio'];
     unset($_POST['radio']);
}else{
    unset($_POST['radio']);
    $_POST['url']=$url;
}
//姓名判断
if(empty($username)){
        $_POST['username']="游客";
}
//
$yz=$_POST['yanzheng'];//用户验证码
    if($yz==$_SESSION['code']){//验证码验证
        unset($_POST['yanzheng']);
        unset($_POST['submit']);
        $_POST['usertime']=date("Y-m-d");//取出留言发布时间
       // print_r($_POST);
       $db1=new my_db("localhost","root","123456","liuyan");
       $db1->insert("user_message",$_POST,"message.php");  
    }else{
        echo "<script>
            alert('输入正确的验证码！！！');
        history.go(-1);
        </script>";
    }
?>

