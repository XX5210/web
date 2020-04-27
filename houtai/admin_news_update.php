<?php
require_once "conn.php";
$id=$_GET['id'];
$sql="select * from news where id=$id";
$query=mysql_query($sql) or die(mysql_error());
$res=mysql_fetch_array($query);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>提交信息</title>
        <script charset="utf-8" src="./kindeditor/kindeditor.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : './kindeditor/plugins/code/prettify.css',
				uploadJson : './kindeditor/php/upload_json.php',
				fileManagerJson : './kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=my]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=my]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
</head>
<body><h2>更新数据</h2>
    <form action="admin_news_update_ok.php" method="post" name="my">
    <input type="hidden" name="id" value="<?php  echo $id; ?>">
    标题<input type="text" name="title" value="<?php echo $res['title']; ?>"><br/><br/>
    栏目<select name="lm">
    <?php 
        $sql1="select * from lm where lm1!=''";
        $query1=mysql_query($sql1) or die("一级栏目".mysql_error());
        while($res1=mysql_fetch_array($query1)){  //explode()    implode    
    ?>
        <option value="<?php echo $res1['id'];?>|0|0"<?php ?><?php $ch=($res['lm1']==$res1['id']?"selected":'');echo $ch;?>><?php echo $res1['lm1']; ?></option>
        <?php
                $sql2="select * from lm where lmid=$res1[id]";
                $query2=mysql_query($sql2) or die(mysql_error());
                while($res2=mysql_fetch_array($query2)){        
        ?>
        <option value="<?php echo $res1['id'];?>|<?php echo $res2['id'];?>|0"<?php $ch=($res['lm2']==$res2['id']?"selected":'');echo $ch;?>>-----|<?php echo $res2['lm2']; ?></option>
         <?php
                    $sql3="select * from lm where lmid=$res2[id]";
                    $query3=mysql_query($sql3) or die(mysql_error());
                    while($res3=mysql_fetch_array($query3)){
         ?>
        <option value="<?php echo $res1['id'];?>|<?php echo $res2['id'];?>|<?php echo $res3['id'];?>"<?php $ch=($res['lm3']==$res3['id']?"selected":'');echo $ch;?>>-----------|<?php echo $res3['lm3']; ?></option>
<?php
 } }}
?>
    </select><br/><br/>
    作者<input type="text" name="user" value="<?php echo $res['adduser']; ?>"><br/><br/>
    <textarea name="content" rows="8" cols="40">
    <?php
        echo $res['content'];
    ?>
      </textarea>   
    <p><input type="submit" value="提交">
    <input type="reset" value="重置"/>
    </p>
    </form>
</body>
</html>


