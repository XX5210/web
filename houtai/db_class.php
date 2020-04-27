<?php
header("Content-type:text/html;charset=utf-8");
class my_db{
    private $host;
    private $user;
    private $keyworde;
    private $db;
    private function error($msg='')
    {
        $msg.=mysql_error();
        echo $msg;
    }
//构造函数
public function __construct($host="localhost",$user="root",$keyword="123456",$db="cms2016")
{
    $this->host=$host;
    $this->user=$user;
    $this->keyword=$keyword;
    $this->db=$db;
    //连接服务器
    mysql_connect($this->host,$this->user,$this->keyword,$this->db)or die($this->error("服务器连接失败"));
    mysql_query("set names utf8");//设置编码
    //连接数据库
    mysql_select_db("$this->db")or ($this->error("数据库连接失败"));
}
// 插入
public function insert($table,$data,$page)
{
    //判断有没有插入的值
    $ziduan="";
    $value="";
    if (!is_array($data)|| count($data)<0) {
        $this->error("没有插入数据！");
    }
    while(list($key,$var)=each($data)){
        $ziduan.="$key,";
        $value.="'$var',";
    }
    $ziduan=substr($ziduan,0,-1);
    $value=substr($value,0,-1);
    //构建sql语句
    $sql="insert into $table ($ziduan) values($value)";
    //执行
    $query=mysql_query($sql) or ($this->error());
    //执行结果
    if($query)
    {
        if (mysql_insert_id()>0) {
         echo "<script>
                 alert('恭喜您，公告发布成功！');
             window.location.href='$page';
             </script>";
        }else {
            echo "<script>
                 alert('信息插入失败！');
             window.location.href='$page';
             </script>"; 
        }
    }
} 

//功能：取出一条值
/*
 *参数：string  $sql
 $ type    关联数组
 返回值    一维
 */   

public function get_one_record($sql,$type=MYSQL_ASSOC)
{
    $query=mysql_query($sql)or die($this->error());
    $res=mysql_fetch_array($query,$type);
    return $res;
}
//取出全部值
///功能：取出一条值
/*
 *参数：string  $sql
 $ type    关联数组
 返回值    二维
 */   
public function get_all_record($sql,$type=MYSQL_ASSOC)
{
    $query=mysql_query($sql)or die($this->error("查询失败111"));
    $num=0;
    $res=array();
    while($ok=mysql_fetch_array($query,$type)){
        $res[$num++]=$ok;
    }
    return $res;

}
//删除
public function delete($table,$condition="",$page)
{
    if(empty($condition)){
        $this->error("没有设置删除的条件，您确定全部删除吗?");
        return false;
    }
    $sql="delete from $table where $condition";
    $query=mysql_query($sql)or ($this->error("sql错了吧！"));
    if($query){
        if(mysql_affected_rows()>0){
        echo "<script>
            alert('删除成功！');
        window.location.href='$page';
        </script>";
        
        }
        else{
         echo "<script>
            alert('删除失败！');
        window.location.href='$page';
        </script>";
        }
           
    }
}
/*
 *功能：根据传递的id，更新一条记录
 *参数：string  $table  表名
 *      string  $dataArray  更新的数组
 *      string  $condition  更新条件
 *      string   $rpage     更新后返回的页面
 *        return    bool
 * return  void
 *
 */
public function update($table,$dataArray,$condition="",$rpage)
{
    //检测数组dataArray是否存在
    if (!is_array($dataArray)|| count($dataArray)<=0) {
        echo"没有要更新的数据！";
        return false;
    }
    $value="";
    $key="";

    //组合表中字段和字段的值成字符串
    while(list($key,$val)=each($dataArray)){
       $value.="$key='$val',";
    }
    //去掉字符串末尾的逗号
      $value=substr($value,0,-1);
    //组合更新语句
    $sql="update $table set $value where $condition";
    //执行
    $query=mysql_query($sql) or die(mysql_error());
    
    //执行结果
    if($query){
        echo "<script type='text/javascript' charset='utf-8'>
            alert ('更新成功');
        window.location.href='$rpage';
        </script>";
    }else{
        echo "<script type='text/javascript' charset='utf-8'>
            alert ('更新失败');
        window.location.href='$rpage';
        </script>"; 
    }
}
}
?>
