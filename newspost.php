<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: http://www.ebetsu-kanko.jp/logout.php");
  exit;
}

echo "ようこそ" . $_SESSION["USERID"] . "さん";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>管理者ページ</title>  <body bgcolor="#FFFFFF" text="#006666">
</head>
<ul>
<li><a href="logout.php">ログアウト</a></li>
<li><a href="system/ChangePassword.php">ID・パスワードを変更する。</a></li>
</ul>




    <br>
    管理者ページ<br>
    <br> 
    <form method="post" action="newspost.php">
    <input type="submit" name="submit4" value="新しい記事を投稿する">
     <?php 
     if(isset($_POST['submit4'])){
        print('<font color="red"><br>新しい記事の準備が出来ました。<br>↓記事１に投稿内容を入力してください。</font>');
     }
        
        ?>
  </form>
    記事１：<br> 

    <form method="post" action="newspost.php">
      投稿日:<br><input type"text" name="date1" value="<?php $today = getdate(); 
      	echo $today['year'] . "/";
      	echo $today['mon'] . "/";
      	echo $today['mday']; 
    ?>" size="50" maxlength="256">&nbsp;&nbsp;現在の投稿日：<?if($_POST['date1'] == 0){include("system/data/printnews_date1.php");} else {echo $_POST['date1'];} ?>
      <br>
      アイコン画像選択:<br>&nbsp;<input type="radio" name="icon1" value="/index_images/news_banner_news.jpg"/><img src="/index_images/news_banner_news.jpg">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="icon1" value="/index_images/news_banner_blog.jpg"/><img src="/index_images/news_banner_blog.jpg">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="icon1" value="/index_images/news_banner_event.jpg"/><img src="/index_images/news_banner_event.jpg">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="icon1" value="/index_images/news_banner_sonohoka.jpg"/><img src="/index_images/news_banner_sonohoka.jpg">&nbsp;&nbsp;現在のアイコン画像：<img src="<? echo $_POST['icon1']; if(!$_POST['icon1']){include("system/data/printnews_icon1.php");} ?>">
      <br>
      タイトル名:<br><input type"text" name="text1" value="" size="50" maxlength="256">&nbsp;&nbsp;現在のタイトル：<? echo $_POST['text1']; if(!$_POST['text1']){include("system/data/printnews_text1.php");} ?>      <br> 
      リンク先URL:<br><input type"text" name="link1" value="" size="50" maxlength="256">&nbsp;&nbsp;現在のリンク先：<? echo $_POST['link1']; if(!$_POST['link1']){include("system/data/printnews_link1.php");} ?>
      <br><br>
      <input type="submit" name="submit1" value="送信"> 

    </form>
    <br>    



    <?php

      $datefile1 = "system/data/news_date1.dat";
      $iconfile1 = "system/data/news_icon1.dat";
      $textfile1 = "system/data/news_text1.dat";
      $linkfile1 = "system/data/news_link1.dat"; 
      
       
      
      if(isset($_POST['submit1'])){
        print('<font color="red">ーー送信結果ーー</font>');
        print("<br>");
        print("投稿日: ".$_POST['date1']);
        print("<br>");
        $file = fopen($datefile1, "w");
        flock($file, 2);
        fwrite($file, $_POST['date1']);
        flock($file, 3);
        
        fclose($file); 
        if(preg_match("/[\x7F-\xFF]/",$_POST['date1'])){
        	print('<h1><font color="red">エラー：投稿日に全角文字が含まれています。</font></h1>');
        }
      }
      
      if(isset($_POST['submit1'])){
        print("アイコン画像URL: ".$_POST['icon1']);
        print("<br>");
        $file = fopen($iconfile1, "w");

        flock($file, 2);
        fwrite($file, $_POST['icon1']);
        flock($file, 3);

        fclose($file); 
      }

      
      if(isset($_POST['submit1'])){
        print("タイトル: ".$_POST['text1']);
        print("<br>");
        $file = fopen($textfile1, "w");

        flock($file, 2);
        fwrite($file, $_POST['text1']);
        flock($file, 3);

        fclose($file); 
      }
      
      if(isset($_POST['submit1'])){
        print("リンク先URL: ".$_POST['link1']);
        print("<br>");
        $file = fopen($linkfile1, "w");

        flock($file, 2);
        fwrite($file, $_POST['link1']);
        flock($file, 3);
        fclose($file);
        if(preg_match("/[\x7F-\xFF]/",$_POST['link1'])){
        	print('<h1><font color="red">エラー：リンク先URLに全角文字が含まれています。</font></h1>');
        }
             
      }
      
    
    
    
    ?> 
    <p>
    
    記事２：<br>
    
    <form method="post" action="newspost.php">
      投稿日:<br><input type"text" name="date2" value="" size="50" maxlength="256">&nbsp;&nbsp;現在の投稿日：<? echo $_POST['date2']; if(!$_POST['date2']){include("system/data/printnews_date2.php");} ?>
      <br>
      アイコン画像選択:<br>&nbsp;<input type="radio" name="icon2" value="/index_images/news_banner_news.jpg"/><img src="/index_images/news_banner_news.jpg">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="icon2" value="/index_images/news_banner_blog.jpg"/><img src="/index_images/news_banner_blog.jpg">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="icon2" value="/index_images/news_banner_event.jpg"/><img src="/index_images/news_banner_event.jpg">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="icon2" value="/index_images/news_banner_sonohoka.jpg"/><img src="/index_images/news_banner_sonohoka.jpg">&nbsp;&nbsp;現在のアイコン画像：<img src="<? echo $_POST['icon2']; if(!$_POST['icon2']){include("system/data/printnews_icon2.php");} ?>">
      <br>
      タイトル名:<br><input type"text" name="text2" value="" size="50" maxlength="256">&nbsp;&nbsp;現在のタイトル：<? echo $_POST['text2']; if(!$_POST['text2']){include("system/data/printnews_text2.php");} ?>
      <br> 
      リンク先URL:<br><input type"text" name="link2" value="" size="50" maxlength="256">&nbsp;&nbsp;現在のリンク先：<? echo $_POST['link2']; if(!$_POST['link2']){include("system/data/printnews_link2.php");} ?>
      <br><br>
      <input type="submit" name="submit2" value="送信"> 

    </form>
    <br>    

    <?php

      $datefile2 = "system/data/news_date2.dat";
      $iconfile2 = "system/data/news_icon2.dat";
      $textfile2 = "system/data/news_text2.dat";
      $linkfile2 = "system/data/news_link2.dat"; 
      
       
      

      if(isset($_POST['submit2'])){
      	print('<font color="red">ーー送信結果ーー</font>');
        print("<br>");
        print("投稿日: ".$_POST['date2']);
        print("<br>");
        $file = fopen($datefile2, "w");
        flock($file, 2);
        fwrite($file, $_POST['date2']);
        flock($file, 3);

        fclose($file);
        if(preg_match("/[\x7F-\xFF]/",$_POST['date2'])){
        	print('<h1><font color="red">エラー：投稿日に全角文字が含まれています。</font></h1>');
        } 
      }
      
      if(isset($_POST['submit2'])){
        print("アイコン画像URL: ".$_POST['icon2']);
        print("<br>");
        $file = fopen($iconfile2, "w");

        flock($file, 2);
        fwrite($file, $_POST['icon2']);
        flock($file, 3);

        fclose($file); 
      }

      
      if(isset($_POST['submit2'])){
        print("タイトル: ".$_POST['text2']);
        print("<br>");
        $file = fopen($textfile2, "w");

        flock($file, 2);
        fwrite($file, $_POST['text2']);
        flock($file, 3);

        fclose($file); 
      }
      
      if(isset($_POST['submit2'])){
        print("リンク先URL: ".$_POST['link2']);
        print("<br>");
        $file = fopen($linkfile2, "w");

        flock($file, 2);
        fwrite($file, $_POST['link2']);
        flock($file, 3);

        fclose($file); 
        if(preg_match("/[\x7F-\xFF]/",$_POST['link2'])){
        	print('<h1><font color="red">エラー：リンク先URLに全角文字が含まれています。</font></h1>');
        }
      }


      

    ?> 
    <p>
    
    記事3：<br>
    
    <form method="post" action="newspost.php">
      投稿日:<br><input type"text" name="date3" value="" size="50" maxlength="256">&nbsp;&nbsp;現在の投稿日：<? echo $_POST['date3']; if(!$_POST['date3']){include("system/data/printnews_date3.php");} ?>
      <br>
      アイコン画像選択:<br>&nbsp;<input type="radio" name="icon3" value="/index_images/news_banner_news.jpg"/><img src="/index_images/news_banner_news.jpg">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="icon3" value="/index_images/news_banner_blog.jpg"/><img src="/index_images/news_banner_blog.jpg">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="icon3" value="/index_images/news_banner_event.jpg"/><img src="/index_images/news_banner_event.jpg">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="icon3" value="/index_images/news_banner_sonohoka.jpg"/><img src="/index_images/news_banner_sonohoka.jpg">&nbsp;&nbsp;現在のアイコン画像：<img src="<? echo $_POST['icon3']; if(!$_POST['icon3']){include("system/data/printnews_icon3.php");} ?>">
      <br>
      現在のタイトル:<br><input type"text" name="text3" value="" size="50" maxlength="256">&nbsp;&nbsp;現在のタイトル：<? echo $_POST['text3']; if(!$_POST['text3']){include("system/data/printnews_text3.php");} ?>
      <br> 
      現在のリンク先:<br><input type"text" name="link3" value="" size="50" maxlength="256">&nbsp;&nbsp;現在のリンク先：<? echo $_POST['link3']; if(!$_POST['link3']){include("system/data/printnews_link3.php");} ?>
      <br><br>
      <input type="submit" name="submit3" value="送信"> 

    </form>
    <br>    
       

    <?php

      $datefile3 = "system/data/news_date3.dat";
      $iconfile3 = "system/data/news_icon3.dat";
      $textfile3 = "system/data/news_text3.dat";
      $linkfile3 = "system/data/news_link3.dat"; 
      
       
      

      if(isset($_POST['submit3'])){
      	print('<font color="red">ーー送信結果ーー</font>');
        print("<br>");
        print("投稿日: ".$_POST['date3']);
        print("<br>");
        $file = fopen($datefile3, "w");
        flock($file, 2);
        fwrite($file, $_POST['date3']);
        flock($file, 3);

        fclose($file);
        if(preg_match("/[\x7F-\xFF]/",$_POST['date3'])){
        	print('<h1><font color="red">エラー：投稿日に全角文字が含まれています。</font></h1>');
        } 
      }
      
      if(isset($_POST['submit3'])){
        print("アイコン画像URL: ".$_POST['icon3']);
        print("<br>");
        $file = fopen($iconfile3, "w");

        flock($file, 2);
        fwrite($file, $_POST['icon3']);
        flock($file, 3);

        fclose($file); 
      }

      
      if(isset($_POST['submit3'])){
        print("タイトル: ".$_POST['text3']);
        print("<br>");
        $file = fopen($textfile3, "w");

        flock($file, 2);
        fwrite($file, $_POST['text3']);
        flock($file, 3);

        fclose($file); 
      }
      
      if(isset($_POST['submit3'])){
        print("リンク先URL: ".$_POST['link3']);
        print("<br>");
        $file = fopen($linkfile3, "w");

        flock($file, 2);
        fwrite($file, $_POST['link3']);
        flock($file, 3);

        fclose($file);
        if(preg_match("/[\x7F-\xFF]/",$_POST['link3'])){
        	print('<h1><font color="red">エラー：リンク先URLに全角文字が含まれています。</font></h1>');
        } 
      }
    ?>
    
    
    
    
    
    
    <?php
    
    
	if(isset($_POST['submit4'])){
		$logfilename = "news_log.dat";
    
    $log_date = @file_get_contents('system/data/news_date3.dat');
    $log_text = @file_get_contents('system/data/news_text3.dat');
    $log_icon = @file_get_contents('system/data/news_icon3.dat');
    $log_link = @file_get_contents('system/data/news_link3.dat');
    $getlog   = @file_get_contents('system/data/news_log.dat');
    $logfile = fopen($logfilename, "w");	
	
	if(copy($datefile2, $datefile3)){
	 copy($datefile1, $datefile2);
	
	 }
	 
	 if(copy($iconfile2, $iconfile3)){
	 copy($iconfile1, $iconfile2);
	
	 }
	 
	 if(copy($textfile2, $textfile3)){
	 copy($textfile1, $textfile2);
	
	 }
	 
	 if(copy($linkfile2, $linkfile3)){
	 copy($linkfile1, $linkfile2);
	
	 } 
	
	fwrite($logfile, "<p>投稿日:" . $log_date . "<br>タイトル:" . $log_text . "<br>アイコン画像URL:" . $log_icon . "<br>リンク:" . $log_link . $getlog);
	
	fclose($logfile);	
	}		
?>



   
        
  </body> 
</html>
