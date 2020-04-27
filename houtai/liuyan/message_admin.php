<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员登陆</title>
<link rel="stylesheet" href="style/message_admin.css"/>
<script>
function denglu(){
    var temp = document.getElementById("sub");
    var aname = document.getElementById("adminname");
    var apwd = document.getElementById("adminpwd");   
if(temp.value==""){
            alert("请输入验证码！！！");
            return false;
             }
if (aname.value=="") {
             alert("请输入用户名！！！");
             return false;
        }
if (apwd.value=="") {
            alert("请输入密码！！！");
            return false;
    }
}
</script>
</head>

<body backgroundAttachment="fixed">

<div class="logn">
    <form action="admin_login_ok.php" method="post" accept-charset="utf-8">
     用户名<input id="adminname" type="text" name="admin" value=""/><br>  
     密　码<input id="adminpwd" type="password" name="password" value=""/><br>
     验证码<input id="sub" style="width:100px;" type="text" name="yanzheng" value=""/><img src="yanzhengma.php" onclick="this.src=this.src+'?'+Math.random()"/><br>
    <input type="submit" name="yes" value="登录" onClick="return denglu()" />
    <input type="reset" name="no" value="重置" />
    </form>
</div>

</body>
</html>
