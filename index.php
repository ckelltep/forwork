<?php
session_start();
setcookie('login');
setcookie('password');
?>
<html>
<head>
    <title>Main page</title>
    <meta charset="windows-1251">
</head>
<body>
 <h2>Main page</h2>
<form action="testreg.php" method="post">
    <p>
        <label>Your login<br></label>
        <input name="login" type="text" size="15" maxlength="15">
    </p>
    <p>
        <label>Your password:<br></label>
        <input name="password" type="text" size="15" maxlength="15">
    </p>
    <p>
        <input name="submit" type="submit" value="Login">

    <br>
    <a href="reg.php">Registr</a>
    </p>
</form>

 <?php
//checking is empty login or password
 if (empty($_SESSION['login']) || empty($_SESSION['password']))
 {
     echo "You login as Quest <a href=''>This link only for registered</a>";
 }
 else
 {
     echo "You login as ". $_SESSION['login'] . "<br> <a href='site.php'>This link only for registered</a>";
 }
 ?>

</body>
</html>
