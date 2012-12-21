<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>イベント管理者ページ</title>  <body bgcolor="#FFFFFF" text="#006666">
</head>
<ul>
<li><a href="logout.php">ログアウト</a></li>
<li><a href="system/ChangePassword.php">ID・パスワードを変更する。</a></li>
</ul>

<form method="post" action="eventpost.php" enctype="multipart/form-data">
      投稿日:<br>
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

	
	

echo "<select name=\"yard1\">";
for ($i = 2012; $i < 2050; $i++) {
    echo "<option>".$i;
}
echo "</select> 年　";

echo "<select name=\"month1\">";
for ($i = 1; $i < 13; $i++) {
    echo "<option>".$i;
}
echo "</select> 月　";

echo "<select name=\"day1\">";
for ($i = 1; $i < 32; $i++) {
    echo "<option>".$i;
}
echo "</select> 日　";

echo "<p>選択された日付：".$_POST["yard1"].
"/".$_POST["month1"]."/".$_POST["day1"];


?>
<d1>
<dt>画像アップロード</dt>
<dd>
<input name="my_img" type="file" id="my_img" size="50" /></dd>
</d1>
イベントのタイトル名:<br><input type"text" name="text1" value="" size="50" maxlength="256">&nbsp;&nbsp;現在のタイトル：<? echo $_POST['text1']; if(!$_POST['text1']){include("system/data2/printevent_text1.php");} ?>
<br>
リンク先URL:<br><input type"text" name="link1" value="" size="50" maxlength="256">&nbsp;&nbsp;現在のリンク先：<? echo $_POST['link1']; if(!$_POST['link1']){include("system/data2/printevent_link1.php");} ?>
<br>
イベントの内容:※全角72文字まで。<br><textarea name="moji1" rows="5" cols="60"></textarea>
<br>
<input type="submit" name="submit1" value="送信">
</form>
 
<?php
	$stampfile1 = "system/data2/event_stamp1.dat";
	$timestamp1 = mktime(0, 0, 0, $_POST["month1"], $_POST["day1"], $_POST["yard1"]);
	$imgfile1 = "system/data2/event_img1.dat";
	$copyfile1 = $_FILES['my_img'];
	$textfile1 = "system/data2/event_text1.dat";
	$linkfile1 = "system/data2/event_link1.dat";
	$mojifile1 = "system/data2/event_moji1.dat";
	
	$copytextfile1 = $_POST['text1'];
	$copylinkfile1 = $_POST['link1'];
	$copymojifile1 = $_POST['moji1'];
	$count = "system/data2/count.dat";
	
if(isset($_POST['submit1']) && isset($_POST['text1'])){
	
	print('ファイル名(name): ' . $copyfile1['name'] . '<br />');
	print('ファイルタイプ(type): ' . $copyfile1['type'] . '<br />');
	print('アップロードしたファイル(tmp_name): ' . $copyfile1['tmp_name'] . 
	'<br />');
	print('エラー内容(error): ' . $copyfile1['error'] . '<br />');
	print('サイズ(size): ' . $copyfile1['size'] . '<br />');
	
	//ファイルアップロードの処理をする
	$ext = substr($copyfile1['name'], -3);
	if ($ext == 'gif' || $ext == 'jpg' || $ext == 'png') {
		$copyfilePath1 = './user_img/' . $copyfile1['name'];
		move_uploaded_file($copyfile1['tmp_name'], $copyfilePath1);
		print('<img src="' . $copyfilePath1 . '" />');
		$img_files1 = fopen($imgfile1, "w");
        flock($img_files1, 2);
        fwrite($img_files1, $copyfilePath1);
        flock($img_files1, 3);
        
        fclose($img_files1);
	} 
	else {print('拡張子が.gif, .jpg, .pngのいずれかのファイルをアップロードしてください');}
			
		print('<font color="red">ーー送信結果ーー</font>');	
		echo "<br>","タイムスタンプ:",$timestamp1;
        print("<br>");
        $stamp_file1 = fopen($stampfile1, "w");
        flock($stamp_file1, 2);
        fwrite($stamp_file1, $timestamp1);
        flock($stamp_file1, 3);

        fclose($stamp_file1);
        
        
        print("イベントタイトル: ".$_POST['text1']);
        print("<br>");
        $text_file1 = fopen($textfile1, "w");

        flock($text_file1, 2);
        
        fwrite($text_file1, $_POST['text1']);
        flock($text_file1, 3);

        fclose($text_file1);
        
        
        
        print("リンク先URL: ".$_POST['link1']);
        print("<br>");
        $link_file1 = fopen($linkfile1, "w");

        flock($link_file1, 2);
        fwrite($link_file1, $_POST['link1']);
        flock($link_file1, 3);
        fclose($link_file1);
        if(preg_match("/[\x7F-\xFF]/",$_POST['link1'])){
        	print('<h1><font color="red">エラー：リンク先URLに全角文字が含まれています。</font></h1>');
    	}
        
        print("イベント内容: ".$_POST['moji1']);
        print("<br>");
        $moji_file1 = fopen($mojifile1, "w");

        flock($moji_file1, 2);
        
        fwrite($moji_file1, $_POST['moji1']);
        flock($moji_file1, 3);

        fclose($moji_file1);

 		//DBカウント
 		
 		$i_count = fopen($count, "w");
 		
 		$count_no = @file_get_contents('system/data2/count.dat');
 		
 		flock($i_count, 2);
 		
 		fwrite($i_count, $count_no++);
 		flock($i_count, 3);
 		
 		fclose($i_count);
 		
 		echo "現在のカウント",$count_no;
 		
 		mysql_query('insert into event (
 		post_time,
 		db_image_url,
 		db_title,
 		db_link,
 		db_text,
 		db_timestamp) values (now(),
 		"'.$copyfilePath1.'",
 		"'.$copytextfile1.'",
 		"'.$copylinkfile1.'",
 		"'.$copymojifile1.'",
 		"'.$timestamp1.'")');
 		
	

         
}
      	
$nowtime = time(); 		//現在時刻をタイムスタンプで取得
	$event_kiji1 = mysql_query('select * from event order by db_timestamp desc limit 0 ,10 ');
	//現在時刻より高い数値のタイムスタンプを出力。
	
	//where "'.$nowtime.'" < db_timestamp'      	

while ($row = mysql_fetch_assoc($event_kiji1)) {
    	print('<p>');
    	print('記事のタイトル：「'.$row['db_title']);
    	print('」：日付け：'.date("Y/m/d",$row['db_timestamp']));
    	print('ばん：'.$row['post_number']);
    	print('<form method="post" action="eventpost.php" enctype="multipart/form-data">');
    	print('<input type="submit" name=""'.$row['post_number'].'"" value="削除"></p>');
    	print('</form>');
    	if(isset($_POST[$row['post_number'].'"'])){
    	
    	mysql_query('delete from event where post_number = "'.$row['post_number'].'"');
      		
      	}
}   	
      	
      	
      	
      	
 //$close_flag = mysql_close($db_link);

//if ($close_flag){
    //print('<p>データベースの切断に成功しました。</p>');
//}
?>





</html>
