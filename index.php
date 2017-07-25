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

  $result = $db->query("select mid, uid, body, parent, timestamp, name from messages left join users using (uid) order by mid asc");
  print("<table border>");
  while ( $mes = $result->fetch_assoc()) {
    print("<tr>");
    $reslink = "res.php?res={$mes['mid']}";
    print("<td><a href='$reslink'>{$mes['mid']}</a> ");

    print( "<td>" . $mes['name'] . " : "."<td>");
    if( $mes['parent'] != 0 )
      print ">" . $mes['parent'] . " ";
    print( $mes['body'] ."<td>". $mes['timestamp']);

    print( "<td><a href='eval.php?mid={$mes['mid']}'>評価</a>");

    print ("<br />");
  }
  $result->close();
 ?>

  <form action='res.php' method='GET'>
    <input type=hidden name=res value='0'>
    <input type=submit value='新規書き込み'>
  </form>


  </body>
</html>
