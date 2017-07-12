<?php session_start(); ?>
<?php
  session_unset();
  session_destroy();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <H1>LOGIN</H1>
    <FORM ACTION="home.php" METHOD="POST">
    <TABLE>
    <TR><TH>ID</TH><TD><INPUT TYPE="TEXT" NAME="id"></TD></TR>
    <TR><TH>Password</TH><TD><INPUT TYPE="PASSWORD" NAME="pass"></TD></TR>
    </TABLE>
    <INPUT TYPE="submit" VALUE="ログイン">
    </FORM>
    <hr />
    <a href='newuser.php'>新規登録</a>
  </body>
</html>
