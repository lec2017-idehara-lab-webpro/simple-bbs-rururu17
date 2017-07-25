<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Response</title>
  </head>
  <body>

<?php
  include_once('database.php');

  if( !isset($_SESSION['login']) || strlen($_SESSION['login']) == 0 )
  {
    print "書き込むまえに、<a href='login.php'>ログイン</a>してください";
    die('</body></html>');
  }

  // GET メソッドで res の番号が送られてくることを想定
  if( !isset($_GET['res']) || strlen($_GET['res']) == 0 )
    die('無効な呼び出しです</body></html>');

  $resnr = $_GET['res'];
  if( $resnr > 0 )
    print( $resnr . " への返信です。<hr />");
  else
    print( "<h1>新規書き込み</h1>" );

  // 本当は、ログインしていないと書けない

//  if(!isset($_SESSION['login']) || strlen($_SESSION['login'])==0)
//    die('返信前に<a href="login.php">ログイン</a>してください。</body></html>');

print "
 <form action='postres.php' method='post'>
   <input type='text' name='mes' size=100>
   <input type='hidden' name='resnr' value='$resnr'>
   <input type='submit' value='送信'>
 </form>
 ";
?>

  </body>
</html>
