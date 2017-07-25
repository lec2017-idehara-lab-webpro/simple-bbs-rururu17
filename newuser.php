﻿<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>New User</title>
  </head>
  <body>

<?php
  include_once('database.php');
  if( isset($_POST['uid']) && strlen($_POST['uid'])>0 )
  {
    $q = $db->prepare("insert into users (uid, name, password) values (?, ?, ?)");
    $q->bind_param("sss", $_POST['uid'], $_POST['name'], $_POST['pass']);
    $q->execute();
    if( $q->errno != 0 )
      print("登録失敗。ID が既に取得されています");
    else
    {
      print("登録しました");
      $_SESSION['login'] = $_POST['uid'];
      $_SESSION['name'] = $_POST['name'];
    }
  }
  else
  {
    print "
    <form action='' method='POST'>
    <table>
    <tr><td>uid : <td><input type=text name=uid><br>
    <tr><td>name : <td><input type=text name=name>
    <tr><td>password : <td><input type=password name=pass>
    <input type='submit' value='送信'>
    </table>
    </form>
    ";
  }
 ?>

  </body>
</html>
