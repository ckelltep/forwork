<?php
   session_start();
   setcookie('login');
   setcookie('password');
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
$result = mysqli_query($bd, "SELECT * FROM users WHERE login = '$login'");
$myRow = mysqli_fetch_array($result);
if (!empty($myRow['password'])) { exit("This login or password incorrect. Please try again.");}
else
{
    if ($myRow['password']===$password)
    {
        $_SESSION['login'] = $myRow['login'];
        $_SESSION['id'] = $myRow['id'];
        echo "You successfully login <a href='index.php'>Main page</a>";
    } else {echo  'Error. Try again later.';}
}
