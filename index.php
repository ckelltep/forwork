<?php
    session_start();
	header('Content-Type: text/html; charset=windows-1251');
    ?>
    <html>
    <head> 
	<meta charset="windows-1251">
    <title>Головна сторінка</title>
    </head>
    <body>
    <h2>Головна сторінка</h2>
    <form action="testreg.php" method="post"> <!-- post на сторінку testreg -->
    
    <p>
    <label>Ваш логін:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>
 
    <p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p> 

    <p>
    <input type="submit" name="submit" value="Войти">
    <br>
    
	
	<!-- посилання на реєстрацію --> 
    <a href="reg.php">Зареєструватися</a> 
    </p></form>
    <br>
    <?php
    // перевірим чи пусті введені логін або пароль
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // якщо пусті, то 
    echo "Ви ввійшли на сайт як гість<br><a href='reg.php'>Зареєструватися</a>";
    }
    else
    {

    // якщо не пусті логін і пароль
    echo "Ви ввійшли на сайт як".$_SESSION['login']."<br><a  href=''>Це посилання доступне лише зареєстрованим</a>";
    }
    ?>
    </body>
    </html>