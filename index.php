<?php
    session_start();
	header('Content-Type: text/html; charset=windows-1251');
    ?>
    <html>
    <head> 
	<meta charset="windows-1251">
    <title>������� �������</title>
    </head>
    <body>
    <h2>������� �������</h2>
    <form action="testreg.php" method="post"> <!-- post �� ������� testreg -->
    
    <p>
    <label>��� ����:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>
 
    <p>
    <label>��� ������:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p> 

    <p>
    <input type="submit" name="submit" value="�����">
    <br>
    
	
	<!-- ��������� �� ��������� --> 
    <a href="reg.php">��������������</a> 
    </p></form>
    <br>
    <?php
    // �������� �� ���� ������ ���� ��� ������
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // ���� ����, �� 
    echo "�� ������ �� ���� �� ����<br><a href='reg.php'>��������������</a>";
    }
    else
    {

    // ���� �� ���� ���� � ������
    echo "�� ������ �� ���� ��".$_SESSION['login']."<br><a  href=''>�� ��������� �������� ���� �������������</a>";
    }
    ?>
    </body>
    </html>