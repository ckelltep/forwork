<?php
$bd = mysqli_connect("127.0.0.1", "users", "1234");
mysqli_select_db($bd, "users" );
//checking login and password
if (isset($_POST['login']))
{
    $login = $_POST['login'];
} if ($_POST['login'] == '') { unset($login);}
if (isset($_POST['password']))
{
    $password = $_POST['password'];
} if ($_POST['password'] == '') {unset($password);}
if (empty($login) || empty($password))
{
    exit('login or password is empty. please retry again');
}
//delete chunk in login and password
$login = stripslashes($login);
$login = htmlspecialchars($login);
$login = trim($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$password = trim($password);

//checking of same login
include 'bd.php';
$result = mysqli_query($bd, "SELECT id FROM users WHERE login = '$login'");
$myRow = mysqli_fetch_array($result);
if (!empty($myRow['id'])) { exit("This login is already used. Please try again later");}
$result2 = mysqli_query($bd, "INSERT INTO users (login,password) VALUES ('$login','$password')");
if ($result2 === true)
{
    echo "you successfully registered, you can go to <a href='index.php'>Main page</a>";
}
else {echo  'Error. Try again later.';}


