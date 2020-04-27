<?php
header("Content-Type:image/png");
session_start();
$authnum_session='';
$str="abcdefghigklmnopqrstuvwxyzab1234567890";
$n=strlen($str);
for ($i = 1; $i<=4; $i++) {
    $num=rand(0,$n-1);// code...
    $authnum_session.=$str[$num];
}
$_SESSION['code']=$authnum_session;////////////////////yz随便给
$im=imagecreate(50,20);//生成一个大小为50*20 大小图片
$black=ImageColorAllocate($im,150,170,172);//当前画布分配颜色（背景色）
$white=ImageColorAllocate($im,0,0,0);//文字颜色
$gray=ImageColorAllocate($im,255,255,180);//点颜色
//区域填充
imagefill($im,68,30,$black);
$li=ImageColorAllocate($im,220,220,220);
for ($i = 0; $i <1; $i++) {
     imageline($im,rand(0,30),rand(0,21),rand(20,40),rand(0,21),$li);// 
}
//字符在图片中的位置
//将四位数验证码汇入图片
imagestring($im,4,8,2,$authnum_session,$white);//字体xy坐标
for ($i = 0; $i <90; $i++) { 
     imagesetpixel($im,rand()%70,rand()%30,$gray);// code...
}
ImagePNG($im);
ImageDestroy($im);
?>

