<?php
    if (isset($_POST['login'])) 
	{ $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим логін в змінну, якщо пусто то знищуєм логін

    if (isset($_POST['password'])) 
	{ $password=$_POST['password']; if ($password =='') { unset($password);} } //заносим пароль в змінну, якщо пусто то знищуєм пароль
 
 if (empty($login) or empty($password)) //якщо пустий логін або пароль то виходимо звідси
    {
    exit ("Ви не ввели всі дані, попробуйте ще!");
    }
    
	
    $login = stripslashes($login);           //якщо є логін і пароль, то зробимо їх нормальними
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);                   
    $password = trim($password);
	
 
    include ("db.php");                      // підключаємся до бази
	
	
    // перевірка на існування двох однакових логінів
    $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'") or die( mysqli_error($db));
    $myrow = mysqli_fetch_array($result, MYSQLI_BOTH);
    if (!empty($myrow['id'])) {
    exit ("Вибачте, введений логін уже існує");
    }
    // якщо нема то заносим їх в базу
    $result2 = mysqli_query ("INSERT INTO users (login,password) VALUES('$login','$password')") or die( mysqli_error($db));
    // перевіримо на помилки
    if ($result2=='TRUE')
    {
    echo "Ви успішно зареєструвалися!";
    }
    else {
    echo "Помилка! ви не зареєстровані";
    }
    ?>