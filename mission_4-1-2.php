<?php
//4-1-1
echo "start";
$dsn='�f�[�^�x�[�X��';
$user='���[�U�[��';
$password='�p�X���[�h';
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

//4-1-2
$sql="CREATE TABLE IF NOT EXISTS tbtest"
."("
."id INT AUTO_INCREMENT PRIMARY KEY,"
."name char(32),"
."comment TEXT"
.");";
$stmt=$pdo->query($sql);
echo "stop";
?>