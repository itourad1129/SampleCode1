<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>ログインページ</title>
</head>
<body>

<?php
  session_start();
  
  $myid = @file_get_contents('system/data/userid.dat');
    $mypass = @file_get_contents('system/data/password.dat');

  
  // エラーメッセージ
  $errorMessage = "";
  // 画面に表示するため特殊文字をエスケープする
  $viewUserId = htmlspecialchars($_POST["userid"], ENT_QUOTES);
  

  // ログインボタンが押された場合      
  if (isset($_POST["login"])) {

    // 認証成功
    if ($_POST["userid"] == $myid && $_POST["password"] == $mypass) {
      // セッションIDを新規に発行する
      session_regenerate_id(TRUE);
      $_SESSION["USERID"] = $_POST["userid"];
      header("Location: newspost.php");
      exit;
    }
    else {
      $errorMessage = "ユーザIDあるいはパスワードに誤りがあります。";
    }
  }

?>
  <form id="loginForm" name="loginForm" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">
  <fieldset>
  <legend>ログインフォーム</legend>
  <div><?php echo $errorMessage ?></div>
  <label for="userid">ユーザID</label><input type="text" id="userid" name="userid" value="<?php echo $viewUserId ?>">
  <br>
  <label for="password">パスワード</label><input type="password" id="password" name="password" value="">
  <br>
  <label></label><input type="submit" id="login" name="login" value="ログイン">
  </fieldset>
  </form>
  
  
  
  


</body>
</html>
