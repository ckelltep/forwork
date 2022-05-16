<?php
    session_start();
if (isset($_POST['login']))
	{ $login = $_POST['login']; if ($login == '') { unset($login);} } //вводимо логін в змінну, якщо пустий - знищуємо
    if (isset($_POST['password']))
	{ $password=$_POST['password']; if ($password =='') { unset($password);} } //вводимо пароль в змінну, якщо пустий - знищуємо

if (empty($login) or empty($password)) //зупиняємо якщо одне пусто
    {
    exit ("Ви не ввели інформацію, попробуйте ще");
    }
    
	
    $login = stripslashes($login);            //якщо є логін і пароль, то зробимо їх нормальними
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);

	
    include ("bd.php");    // підключаємся до бази
 
 
    $result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'") or die( mysqli_error($db)); //забираєм з бази всі дані про залогінених
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
    exit ("Вибачте, введений логін або пароль невірний");
    }
    else {
    if ($myrow['password']==$password) // звірюємо паролі
	{
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];     // зарускаємо сессію і вхід успішний
    echo "Ви ввійшли на сайт! <a href='index.php'>Головна сторінка</a>";
    }
 else {

    exit ("Вибачте, введений вами логін або пароль невірний");
    }
    }
    ?>