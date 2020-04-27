<?php
header("Content-Type:text/html;charset=utf-8");
class my_db
{
    private $host;
    private $user;
    private $keyword;
    private $db;
    private function error ($smg='')
        {
            $msg.=mysql_error();
            die($msg);
        }
    public  function __construct($host,$user,$keyword,$db)
    {
        $this->host=$host;
        $this->user=$user;
        $this->keyword=$keyword;
        $this->db=$db;
        mysql_connect($this->host,$this->user,$this->keyword)or die($this->error("数据库链接失败"));
        mysql_query("set names utf8");
        mysql_select_db("$db")or($this->error("数据链接失败！"));
    }
    ////删除函数
    public function delete($table,$condition,$page){
       
        if(empty($condition)){
            $this->error("没有设置删除的条件");
            return false;
        }
        $sql="delete from $table where $condition";
        echo $sql;
        exit;
        $query=mysql_query("$sql");
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
    public function insert($table,$data,$page){
        $ziduan="";
        $value="";
    
        if(!is_array($data)|| count($data)<0)
        {
        $this->error("没有插入的数据");
        }
         while(list($key,$var)=each($data))//each 会自加。
        {
            $ziduan.="$key,";
            $value.="'$var',";
        } 
        $ziduan=substr($ziduan,0,-1);
        $value=substr($value,0,-1);
        $sql="insert into $table ($ziduan) values($value)";
        $query=mysql_query($sql) or ($this->error());
        if($query){
                if (mysql_insert_id()>0) {
                   echo "<script>
                alert('发布成功！');
                window.location.href='$page';
                </script>";
                }else{
                 echo "<script>
                alert('发布失败！');
                window.location.herf='$page';
                </script>";
                }
        }
    }
/*************************
/*************************
 *
 *
 *
 *
 ****************************/
    public function get_one_record($sql,$type=MYSQL_ASSOC)
    {
        $query=mysql_query($sql) or die ($this->error);
        $res=mysql_fetch_array($query,$type); 
        return $res;
    }
    /*
     * 功能：取出表中全部记录
     *参数：string $sql 接收sql字符串
     *             $type 关联数组
     *
     * */
    public function get_all_record($sql,$type=MYSQL_ASSOC)
    {
        $query=mysql_query($sql) or die ($this->error());
        $num=0;//
        $res=array();
        while ($ok=mysql_fetch_array($query,$type))
        {   
            echo "<pre>";
            $res[$num++]=$ok;
            echo"</pre>";
        }
        return $res;
    }
    /*
     *功能：根据传递的id,更新记录
     *参数：int      $id                记录的id
     *      string   $returnpage        更新结束返回的页面
     *      string   $
     *return void
     */
    public function update($table,$dataArray,$condition="",$rpage)
    {
        if(!is_array($dataArray)||count($dataArray)<=0)
        {
        echo "没有要更新的数据！</br>";
        return false;
        }
        $value="";
        $key="";
    while(list($key,$val)=each($dataArray))
    {
        $value.="$key='$val',";
    }//去掉字符串末尾的逗号
    $value=substr($value,0,-1);//组合更新语句
    $sql="update $table set $value where $condition";
      if (mysql_query($sql)) {
                   echo "<script>
                alert('更新成功！');
                window.location.href='$rpage';
                </script>";
                }else{
                 echo "<script>
                alert('更新失败！');
                window.location.herf='$rpage';
                </script>";
                }
    }
    }
?>
