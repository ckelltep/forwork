<?php
    if (isset($_POST['login'])) 
	{ $login = $_POST['login']; if ($login == '') { unset($login);} } //������� ���� � �����, ���� ����� �� ������ ����

    if (isset($_POST['password'])) 
	{ $password=$_POST['password']; if ($password =='') { unset($password);} } //������� ������ � �����, ���� ����� �� ������ ������
 
 if (empty($login) or empty($password)) //���� ������ ���� ��� ������ �� �������� �����
    {
    exit ("�� �� ����� �� ���, ���������� ��!");
    }
    
	
    $login = stripslashes($login);           //���� � ���� � ������, �� ������� �� �����������
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);                   
    $password = trim($password);
	
 
    include ("db.php");                      // ���������� �� ����
	
	
    // �������� �� ��������� ���� ��������� �����
    $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'") or die( mysqli_error($db));
    $myrow = mysqli_fetch_array($result, MYSQLI_BOTH);
    if (!empty($myrow['id'])) {
    exit ("�������, �������� ���� ��� ����");
    }
    // ���� ���� �� ������� �� � ����
    $result2 = mysqli_query ("INSERT INTO users (login,password) VALUES('$login','$password')") or die( mysqli_error($db));
    // ��������� �� �������
    if ($result2=='TRUE')
    {
    echo "�� ������ ��������������!";
    }
    else {
    echo "�������! �� �� �����������";
    }
    ?>