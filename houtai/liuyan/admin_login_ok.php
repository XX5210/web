<?php
header("Content-Type:text/html;charset=utf-8");
    session_start();
    mysql_connect("localhost","root","123456")or die(mysql_error());
    mysql_select_db("liuyan")or die(mysql_error());
    mysql_query("set names utf8");
    $admin=$_POST['admin'];
    $password=md5($_POST['password']);
    $yz=$_POST['yanzheng'];//用户验证码
    if($yz==$_SESSION['code']){
        //对用户名和密码验证
        //1,构建sql语句，进行查询
        $sql="select * from admin where admin='$admin' and password='$password'";
        $query=mysql_query($sql)or die(mysql_error());
        $res=mysql_fetch_assoc($query);
        if (empty($res)) {
            echo "<script>
                alert('用户名或密码错误');
            history.go(-1);
            </script>";// code...
            exit;
        }else{
            $_SESSION['user']="ok";
                echo "<script>
                    alert('您已登陆成功');
                window.location.href='in.php';
                 </script>";// code...
        }
    }else {
        echo "<script>
            alert('请输入正确验证码！');
        history.go(-1);
        </script>";
    }
?>
