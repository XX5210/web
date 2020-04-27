<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>欢迎光临陈靖的个人网站</title>
<link rel="stylesheet" href="css/style.css"/>
<!--...--><link rel="stylesheet" href="css/time.css"/>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script> 
<script src="js/top.js"></script>
<script src="js/bodybg.js"></script>
<script src="js/music.js"></script>
<script src="js/back.js"></script>
<!--/////-->
<script src="js/picture.js"></script>
<script type="text/javascript">
    $(function() {
        var bannerSlider = new Slider($('#pic'), {
            time: 3000,
            delay: 400,
            event: 'hover',
            auto: true,
            mode: 'fade',
            controller: $('#number'),
            activeControllerCls: 'active'
        });
        $('#pic .prev').click(function() {
            bannerSlider.prev()
        });
        $('#pic .next').click(function() {
            bannerSlider.next()
        });
    })
</script>
<script src="js/time.js"></script>
<script src="js/text_plugin.js"></script> 
<script src="js/texteffect.js"></script>

</head>


<body backgroundAttachment="fixed">

<header class="top">
	<div class="logo">
    	<a class="a_logo" href="index.php"></a>
    	<ul>
    	<li><a href="#">English</a></li>
    	<li><a href="#" onclick="javascript:window.external.AddFavorite('http://www.chenjing5210.com', '陈靖的个人网站-chenjing5210.com')" target="_self">收藏本站</a></li>
        <li><a><button onClick="setStyle();">换肤</button></a></li>
    	<li><a id="right_box_link" href="#right_box">友情链接</a></li>
   		</ul>
    </div>    
</header>

<div id="right_box" class="box">
	<h2>《《友情链接》》</h2>
    <ul>
    	<li><a>于茜</a><a><img src="images/logo_yuqian.gif" width="150"/></a></li>
        <li><a>陈靖</a><a><img src="images/logo_chenjing.png" width="150"/></a></li>
        <li><a>高倩</a><a><img src="images/logo_gaoqian.png" width="150"/></a></li>
        <li><a>刘侃</a><a><img src="images/logo_liukan.jpg" width="150"/></a></li>
        <li><a>刘锐敏</a><a><img src="images/logo_liuruiming.gif" width="150"/></a></li>
        <li><a>李艺华</a><a><img src="images/logo_liyihua.gif" width="150"/></a></li>
        <li><a>闵蕾蕾</a><a><img src="images/logo_minleilei.png" width="150"/></a></li>
        <li><a>撒拢峰</a><a><img src="images/logo_salongfeng.gif" width="150"/></a></li>
        <li><a>张敏</a><a><img src="images/logo_zhangmin.jpg" width="150"/></a></li>
        <li><a>赵娜娜</a><a><img src="images/logo_zhaonana.png" width="150"/></a></li>
        <li><a>苏静</a><a><img src="images/logo_sujing.gif" width="150"/></a></li>
        <li><a>王静</a><a><img src="images/logo_wangjing.jpg" width="150"/></a></li>
    </ul>
</div>

<div class="nav">
	<div class="nav_line"></div>
    <div class="nav_bg">
    	<div class="menu">
    		<ul>
        	<a href="index.php" target="_self"><li class="menu_bg">首页</li></a>
            <a href="grow.html" target="_self"><li>个人动态</li></a>
            <a href="college.html" target="_self"><li>大学四年</li></a>
        	<a href="products.html" target="_self"><li>作品展示</li></a>
        	<a href="message.html" target="_self"><li>给我留言</li></a>
        	<a href="contact_me.html" target="_self"><li>联系我</li></a>
        	</ul>
    	</div>
    </div>
</div>

<div id="left">
	<div class="music">
		<div class="music_con"><a  class="music_but"></a>
            <audio style="width:350px;height:30px;" controls>
            	<source src="music/piano.ogg" type="audio/ogg"/>
                <source src="music/piano.mp3" type="audio/mpeg"/>
            </audio>							 
        </div>
	</div>
	<div id="back"><a></a></div>
    <div id="home"><a href="index.php" target="_self"></a></div>
</div>

<div id="main">
<!--start-->
	<div id="banner">
    	<div class="more">	
			<a href="#" class="more_re  more_re_f">查看更多</a>		
		</div>
		<div id="pic" class="picture">
        	<ul class="imge">
			<li><a><img src="images/picture_1.jpg"/></a></li>
            <li><a><img src="images/picture_2.jpg"/></a></li>
            <li><a><img src="images/picture_3.jpg"/></a></li>
            <li><a><img src="images/picture_4.jpg"/></a></li>
            <li><a><img src="images/picture_5.jpg"/></a></li>
			</ul>
			<ul class="switch">
       		<li><a class="prev" ></a></li>
        	<li><a class="next" ></a></li>
        	</ul>
        	<ol id="number" class="con_nav con_paging">
        	<li><a></a></li>
        	<li><a></a></li>
        	<li><a></a></li>
            <li><a></a></li>
            <li><a></a></li>
        	</ol>
		</div>	
    </div>
    
    <div class="text">
    	<div class="news">
        	<ul>
            <a href="grow.html" target="_self"><li>迷茫 我知道什么是玩物丧志，为了不让<span>2015-09-17</span></li></a>
            <a href="grow.html" target="_self"><li>大学第三年 我是不是应该庆该庆幸自己<span>2015-09-07</span></li></a>
            <a href="grow.html" target="_self"><li>集训第十天 代码什么的，最讨厌了。每<span>2015-08-20</span></li></a>
            <a href="grow.html" target="_self"><li>网站开发暑假班开课 从今天起开始自己<span>2015-08-10</span></li></a>
            <a href="grow.html" target="_self"><li>放假的感觉真好 我竟然有想看书的冲动<span>2015-07-25</span></li></a>
            <a href="grow.html" target="_self"><li>第一次外出打工 很累，但这就是成长。<span>2015-02-22</span></li></a>
            <a href="grow.html" target="_self"><li>waiting for you Wherever you go,<span>2014-09-07</span></li></a>
            </ul>
            <div class="n_icon">
            	<a><div class="n_share"></div></a>
            	<a href="grow.html" target="_self"><div class="n_views"></div></a>
            	<a><div class="n_comments"></div></a>
            </div>
        </div>
        <div class="time">
        	<div class="clock">
  				<div class="h shake shake-slow"></div>
  				<div class="m shake shake-slow"></div>
				<div class="s shake shake-slow"></div>
			</div>
            <div class="resume">
            	<a href="resume.html">
					<img class="img"  height="160" />
					<img class="imgH" src="image/job_H.png" height="160" />
					<span>就算不能永远面向阳光<br>也要抬起头勇往直前！！！</span>
				</a>
            </div>
        </div>
    </div>
    
    <div class="video text" >
    	<div id="video_pro">
        	<div class="word">
				<h3 id="effect">
					<span>欢</span>
					<span>迎</span>
					<span>光</span>
					<span>临</span>
					<span>我</span>
					<span>的</span>
					<span>网</span>
					<span>站</span>
				</h3>
			</div>
        </div>
        <div id="video_mid">
        	<div class="v_heart v_location">
            	<a></a>
            </div>
            <div class="v_clock v_location">
            	<a></a>
            </div>
            <div class="v_retrans v_location">
            	<a> </a>
            </div>
        </div>
    	<div id="video_con">
        	<video width="500" height="300" controls>
  			<source src="video/Jason.flv"/>
			</video>
        </div>
    </div>
<!--end-->  
    <div id="foot">
    	版权所有 © 2015 .　<a href="http://user.qzone.qq.com/457319737" target="_blank" title="">陈靖空间</a>
	</div>

</div>







<script type="text/javascript" src="js/right-box.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#right_box_link').boxslider({side: 'right',  duration: 200 });	
});
</script>
</body>
</html>
