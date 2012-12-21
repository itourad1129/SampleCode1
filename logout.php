<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<!doctype html>
<html>
  <head>
  <body>
<?php
session_start();

if (isset($_SESSION["USERID"])) {
  $errorMessage = "ログアウトしました。";
}
else {
  $errorMessage = "セッションがタイムアウトしました。";
}
// ???????????
$_SESSION = array();
// ???????
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// ????????
@session_destroy();
?>

    <title>ログアウト</title>
  </head>
  <div><?php echo $errorMessage; ?></div>
  <ul>
  <li><a href="logini.php">ログイン画面に戻る</a></li>
  </ul>
  </body>
</html>
