<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>パスワード設定</title>  <body bgcolor="#FFFFFF" text="#006666">
</head>
<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: http://www.ebetsu-kanko.jp/logout.php");
  exit;
}

echo "ようこそ" . $_SESSION["USERID"] . "さん";
?>

<?php
  	
		$idfile = "data/userid.dat";
		$passfile = "data/password.dat";
		
?>
<?php
 if(isset($_POST['change'])){
 		print("<p>");
        print("現在のID: ".$_POST['newid']);
        print("<br>");
        $file = fopen($idfile, "w");
        flock($file, 2);
        fwrite($file, $_POST['newid']);
        flock($file, 3);

        fclose($file);
 }
        

?>

<?php
 if(isset($_POST['change'])){
        print("現在のパスワード: ".$_POST['newpass']);
        print("<br>");
        $file = fopen($passfile, "w");
        flock($file, 2);
        fwrite($file, $_POST['newpass']);
        flock($file, 3);

        fclose($file);
 }
        

?>
<p>
<form method="post" action="ChangePassword.php">
      変更後のID:<br><input type"text" name="newid" value="" size="25" maxlength="256">
      <br>
      変更後のパスワード:<br><input type"text" name="newpass" value="" size="25" maxlength="256">
      <p>
      <input type="submit" name="change" value="IDとパスワードを変更する"> 

    </form>
    <p>
    <a href="../newspost.php">管理者ページに戻る。</a>

</body>
</html>
