<?php
    session_start();
if (isset($_POST['login']))
	{ $login = $_POST['login']; if ($login == '') { unset($login);} } //������� ���� � �����, ���� ������ - �������
    if (isset($_POST['password']))
	{ $password=$_POST['password']; if ($password =='') { unset($password);} } //������� ������ � �����, ���� ������ - �������

if (empty($login) or empty($password)) //��������� ���� ���� �����
    {
    exit ("�� �� ����� ����������, ���������� ��");
    }
    
	
    $login = stripslashes($login);            //���� � ���� � ������, �� ������� �� �����������
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);

	
    include ("bd.php");    // ���������� �� ����
 
 
    $result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'") or die( mysqli_error($db)); //������� � ���� �� ��� ��� ����������
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
    exit ("�������, �������� ���� ��� ������ �������");
    }
    else {
    if ($myrow['password']==$password) // ������� �����
	{
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];     // ��������� ����� � ���� �������
    echo "�� ������ �� ����! <a href='index.php'>������� �������</a>";
    }
 else {

    exit ("�������, �������� ���� ���� ��� ������ �������");
    }
    }
    ?>