<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simple BBS</title>
  </head>
  <body>

<h1>Simple BBS</h1>

<?php
  if( isset($_SESSION['login']) && strlen($_SESSION['login'])>0 )
    print "{$_SESSION['name']} としてログイン中です。";
  print "<a href='login.php'>LOGIN</a>";
?>

<hr />

<?php
  include_once('database.php');
  $query = "select mid, body, messages.uid as uid, coalesce(avg(eval),0) as av, count(*) as count, name from evals ";
  // ここが left join だとどうなるでしょう？
  $query = $query . "right join messages using(mid) ";
  $query = $query . "left join users on messages.uid=users.uid ";
  $query = $query . "group by mid ";
  $query = $query . "order by mid";

  print "実行コマンド : " . $query;

  print "<hr />";

  $result = $db->query($query);
  while ( $mes = $result->fetch_assoc()) {
    var_dump($mes);

    print ("<br />");
  }
  $result->close();
 ?>

  </body>
</html>
