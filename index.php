<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link rel="stylesheet" href="index_css/base.css" type="text/css" />
<title>江別観光協会 [えべつコレクション.jp]</title>

<meta name="keywords" content="江別, えべつ, 北海道, 札幌, 小麦, ハルユタカ, 北海道遺産, れんが, 煉瓦, やきもの">
<meta name="description" content="北海道札幌市のとなり、幻の小麦「ハルユタカ」や北海道遺産「れんが」名産として有名。電車・バス・自動車のアクセス良好、人が輝く共生のまち「江別市」に遊びに来ませんか？">

<!-- FLASH Aのスライドショー制御 -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>  
<script type="text/javascript">google.load("jquery", "1.3");</script>  
<script type="text/javascript" src="js/jquery.cycle.js"></script>  
<script type="text/javascript" src="js/slideshow.js"></script>  

</head>

<body>
<?php

  $db_link = mysql_connect('localhost', 'root', 'root');
if (!$db_link) {
    die('データベース接続失敗'.mysql_error());
}

print('<p>データベースの接続に成功しました。</p>');


$db_selected = mysql_select_db('ebetu', $db_link);
if (!$db_selected){
    die('データベース選択失敗です。'.mysql_error());
}

$result = mysql_query('SELECT *  FROM event');
if (!$result) {
    die('クエリーが失敗しました。'.mysql_error());
}
?>

<!-- コンテナ -->
<div id="container">

<!-- ヘッダー -->
<div id="header">
	
	<?php include ("header.html"); ?>
	

</div>

<div class="clear"></div>



<!-- Flash Ａ -->
<div id="flash_a">

    <!-- flash.txtを貼付け -->

<img src="index_images/h1.jpg">




</div>
<!-- Flash Ａおわり -->



<!-- メニュー -->

<?php include ("menu.html"); ?>





<!-- メイン(左) -->

<div id="main">
<div id="main_box">
	
	<?php include ("menu_left.html"); ?>
	
	
	
	
	
	    
	
	<!-- メイン(中央) -->    
		<div id="main_center">
	
			<div id="main_center_news_title">
				<div id="main_center_news_title1"></div>
				<div id="main_center_news_title2"> <!-- <a href="index.html"></a> --> <img src="/index_images/all_news_info_coming.gif"></div>
				<div class="clear"></div>
			</div>
			<div id="main_center_news1_box">
				<div class="main_center_news_date"><? include("system/data/printnews_date1.php"); ?></div>
				<div class="main_center_news_icon"><img src="<? include("system/data/printnews_icon1.php"); ?>"></div>
				<div class="main_center_news_tx"><!-- <a href="/news/news01.php"> --><a href="<? include("system/data/printnews_link1.php"); ?>"><? include("system/data/printnews_text1.php"); ?><!--リニューアルオープンいたしました！ --></a></div>
				<div class="main_center_news_line"></div>
			</div>
			
			<div id="main_center_news2_box">
				<div class="main_center_news_date"><? include("system/data/printnews_date2.php"); ?></div>
				<div class="main_center_news_icon"><img src="<? include("system/data/printnews_icon2.php"); ?>"></div>
				<div class="main_center_news_tx"><a href="<? include("system/data/printnews_link2.php"); ?>"><? include("system/data/printnews_text2.php"); ?></a></div>
				<div class="main_center_news_line"></div>
			</div>
	
			<div id="main_center_news3_box">
				<div class="main_center_news_date"><? include("system/data/printnews_date3.php"); ?></div>
				<div class="main_center_news_icon"><img src="<? include("system/data/printnews_icon3.php"); ?>"></div>
				<div class="main_center_news_tx"><a href="<? include("system/data/printnews_link3.php"); ?>"><? include("system/data/printnews_text3.php"); ?></a></div>
				<div class="main_center_news_line"></div>
			</div>
			
	    		<div class="clear"></div>
			
			<div id="main_center_event_title">
				<div id="main_center_event_title1"></div>
				<div id="main_center_event_title2"><a href="/event/index.php"></a></div>
				<div class="clear"></div>
			</div>
			<div id="main_center_event1_box">
				
			<!-- イベント1 -->
				<div class="main_center_event_img">
				<!-- 画像無しの場合 -->
				<img src="event/event_images/165x115/004.jpg" width="165" height="115" class="main_center_event_img-menu" />
				<!-- 画像有りの場合 -->
				<img src="<?php 
				$nowtime = time(); 		//現在時刻をタイムスタンプで取得
				$event_kiji1_1 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 1 ');
				
				while ($row1_1 = mysql_fetch_assoc($event_kiji1_1)) {
					print($row1_1['db_image_url']);
				} ?>" width="165" height="115"class="order" />
				</div>
				<div class="main_center_event_date"><?php 
				$event_kiji1_2 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 1 ');
				
				while ($row1_2 = mysql_fetch_assoc($event_kiji1_2)) {
					print(date("Y/m/d",$row1_2['db_timestamp']));
				} ?></div>
				<div class="main_center_event_title"><a href="<?php 
				$event_kiji1_3 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 1 ');
				
				while ($row1_3 = mysql_fetch_assoc($event_kiji1_3)) {
					print($row1_3['db_link']);
				} ?>"><?php 
				$event_kiji1_4 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 1 ');
				
				while ($row1_4 = mysql_fetch_assoc($event_kiji1_4)) {
					print($row1_4['db_title']);
				} ?></a></div>
				<div class="main_center_event_tx"><?php 
				$event_kiji1_5 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 1 ');
				
				while ($row1_5 = mysql_fetch_assoc($event_kiji1_5)) {
					print($row1_5['db_text']);
				} ?></div>
				
				<div class="main_center_event_line"></div>

			<!-- イベント2 -->
				<div class="main_center_event_img">
				<img src="event/event_images/165x115/004.jpg" width="165" height="115" class="main_center_event_img-menu" />
				<img src="<?php 
				$event_kiji2_1 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 2 ,1 ');
				
				while ($row2_1 = mysql_fetch_assoc($event_kiji2_1)) {
					print($row2_1['db_image_url']);
				} ?>" width="165" height="115"class="order" />
				</div>
				<div class="main_center_event_date"><?php 
				$event_kiji2_2 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 2 ,1 ');
				
				while ($row2_2 = mysql_fetch_assoc($event_kiji2_2)) {
					print(date("Y/m/d",$row2_2['db_timestamp']));
				} ?></div>
				<div class="main_center_event_title"><a href="<?php 
				$event_kiji2_3 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 2 ,1 ');
				
				while ($row2_3 = mysql_fetch_assoc($event_kiji2_3)) {
					print($row2_3['db_link']);
				} ?>"><?php 
				$event_kiji2_4 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 2 ,1 ');
				
				while ($row2_4 = mysql_fetch_assoc($event_kiji2_4)) {
					print($row2_4['db_title']);
				} ?></a></div>
				<div class="main_center_event_tx"><?php 
				$event_kiji2_5 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 2 ,1 ');
				
				while ($row2_5 = mysql_fetch_assoc($event_kiji2_5)) {
					print($row2_5['db_text']);
				} ?></div>
				
				<div class="main_center_event_line"></div>

			<!-- イベント3 -->
				<div class="main_center_event_img">
				<img src="event/event_images/165x115/004.jpg" width="165" height="115" class="main_center_event_img-menu" />
				<img src="<?php 
				$event_kiji3_1 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 3 ,1 ');
				
				while ($row3_1 = mysql_fetch_assoc($event_kiji3_1)) {
					print($row3_1['db_image_url']);
				} ?>" width="165" height="115"class="order" />
				</div>
				<div class="main_center_event_date"><?php 
				$event_kiji3_2 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 3 ,1 ');
				
				while ($row3_2 = mysql_fetch_assoc($event_kiji3_2)) {
					print(date("Y/m/d",$row3_2['db_timestamp']));
				} ?></div>
				<div class="main_center_event_title"><a href="<?php 
				$event_kiji3_3 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 3 ,1 ');
				
				while ($row3_3 = mysql_fetch_assoc($event_kiji3_3)) {
					print($row3_3['db_link']);
				} ?>"><?php 
				$event_kiji3_4 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 3 ,1 ');
				
				while ($row3_4 = mysql_fetch_assoc($event_kiji3_4)) {
					print($row3_4['db_title']);
				} ?></a></div>
				<div class="main_center_event_tx"><?php 
				$event_kiji3_5 = mysql_query('select * from event where "'.$nowtime.'" < db_timestamp order by db_timestamp limit 3 ,1 ');
				
				while ($row3_5 = mysql_fetch_assoc($event_kiji3_5)) {
					print($row3_5['db_text']);
				} ?></div>
				
				<div class="main_center_event_line"></div>

				
			</div>
	
			<div id="top_model">
				<div id="top_model_title"><img src="index_images/top_model_title.jpg"></div>
				<div id="top_model_car"><img src="index_images/top_model_car.jpg"></div>
				<div id="top_model_01"><a href="/course/course01.php"></a></div>
				<div id="top_model_sp01"><img src="index_images/top_model_sp01.gif"></div>
				<div id="top_model_02"><a href="/course/course02.php"></a></div>
				<div id="top_model_sp02"><img src="index_images/top_model_sp02.gif"></div>
				<div id="top_model_03"><a href="/course/course03.php"></a></div>
				<div id="top_model_sp03"><img src="index_images/top_model_sp03.jpg"></div>
				
				<div id="top_model_walk"><img src="index_images/top_model_walk.jpg"></div>
				<div id="top_model_04"><a href="/course/course04.php"></a></div>
				<div id="top_model_sp04"><img src="index_images/top_model_sp04.gif"></div>
				<div id="top_model_05"><a href="/course/course05.php"></a></div>
				<div id="top_model_sp05"><img src="index_images/top_model_sp05.gif"></div>
				<div id="top_model_06"><a href="/course/course06.php"></a></div>
				<div id="top_model_sp06"><img src="index_images/top_model_sp06.gif"></div>
				
				<div id="top_model_bottom"><img src="index_images/top_model_bottom.gif"></div>
				<div class="clear"></div>
			</div>
	
	
	
		</div>
	
	
	<!-- メイン(右) ※トップページのみ表示-->
	    <div id="main_right">
	
	        <div id="main_right_live_title"></div>
	        <div id="main_right_live">
	            <!--ウェザーニュースブログパーツ-->
	<div id="weathernews_blog_parts"></div><script type="text/javascript">document.write('<scr' + 'ipt type="text/javascript" src="http://weathernews.jp/blog/js/blog.js?' + (new Date().valueOf()) + '"></scr' + 'ipt>');</script><script type="text/javascript">// <![CDATA[
	wni_blog('blog/livecam:dataHandle=410003008',200,91,false);// ]]></script>
	
	        <div id="main_right_tw_title"></div>
	        <div id="main_right_tw">
	            <script src="http://widgets.twimg.com/j/2/widget.js"></script>
	            <script>
	            new TWTR.Widget({
	            version: 2,
	            type: 'profile',
	            rpp: 3,
	            interval: 30000,
	            width: 200,
	            height: 300,
	            theme: {
	            shell: {
	            background: '#c7ac77',
	            color: '#ffffff'
	            },
	            tweets: {
	            background: '#665a43',
	            color: '#ffffff',
	            links: '#48ff30'
	            }
	            },
	            features: {
	            scrollbar: true,
	            loop: false,
	            live: true,
	            behavior: 'all'
	            }
	            }).render().setUser('ebetsu_kanko').start();
	           </script>
	        </div>
	    </div>
	</div>
	
	<div class="clear"></div>
	
	
	<!-- バナー広告 -->
	<div id="bunner">
	    <div id="bunner_box">
	        <div class="bunner1"><a href="http://ebetsu-jc.com/"><img src="index_images/banner01.jpg"></a></div>
	        <div class="bunner234"><a href="http://xn--r8jo3ddv2a6f2it1b904ul2f.jp/tv/"><img src="index_images/banner02.jpg"></a></div>
	        <div class="bunner234"><a href="http://e-kentei.ebetsu-i.net/index.html"><img src="index_images/banner03.jpg"></a></div>
	        <div class="bunner234"><a href="http://www.hokkaidoisan.org/"><img src="index_images/banner04.jpg"></a></div>
	        <div class="bunner5"><a href="http://www.welcome.city.sapporo.jp/"><img src="index_images/banner05.jpg"></a></div>
	        <div class="clear"></div>
	        <div class="bunner1"><a href="http://www.bfh.jp/"><img src="index_images/banner06.gif"></a></div>
	        <div class="bunner234"><a href="http://www.city.ebetsu.hokkaido.jp/"><img src="index_images/banner07.jpg"></a></div>
	        <div class="bunner234"><a href="http://www.do-johodai.ac.jp/"><img src="index_images/banner08.jpg"></a></div>
	        <div class="bunner234"><a href="http://www.city.ebetsu.hokkaido.jp/welcome/"><img src="index_images/banner09.png"></a></div>
	        <div class="bunner5"><a href="http://ebechun.jp/index.html"><img src="index_images/banner10.jpg"></a></div>
	        <div class="clear"></div>
		    <div id="bunner_b1"><a href="/siteout/index.php"></a></div>
		    <div class="clear"></div>
	    </div>
	</div>

</div> <!-- main_boxの閉じタグ -->



<?php include ("footer.html"); ?>

</div>

<script type="text/javascript" charset="UTF-8" src="http://badge.heartrails.com/javascripts/badge.js"></script>
<script type="text/javascript">
HeartRailsBadge.domain = 'http://badge.heartrails.com/';
HeartRailsBadge.right.top = [80];
HeartRailsBadge.right.backgroundImage = ['http://'];
HeartRailsBadge.right.backgroundColor = ['69463D'];
HeartRailsBadge.right.fontColor = ['FFFFFF'];
HeartRailsBadge.right.copy = ['Facebook'];
HeartRailsBadge.right.url = ['http://www.facebook.com/pages/%E6%B1%9F%E5%88%A5%E8%A6%B3%E5%85%89%E5%8D%94%E4%BC%9A/313918865312967'];
HeartRailsBadge.showBadges();
</script>

</body>
</html>
