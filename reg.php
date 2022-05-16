<?php
	header('Content-Type: text/html; charset=windows-1251');
    ?>
<html>
    <head>
	<meta charset="windows-1251">
    <title>Реєстрація</title>
    </head>
    <body>
    <h2>Реєстрація</h2>
    <form action="save_user.php" method="post">
<p>
    <label>Ваш логін:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>
<p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
<p>
    <input type="submit" name="submit" value="Зареєструватися">
</p></form>
    </body>
    </html>