<?php
//4-1-1
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

/*4-1-2
$sql="CREATE TABLE IF NOT EXISTS tbtest"
."("
."id INT AUTO_INCREMENT PRIMARY KEY,"
."name char(32),"
."comment TEXT"
.");";
$stmt=$pdo->query($sql);
*/

/*4-1-3
$sql='SHOW TABLES';
$result=$pdo->query($sql);
foreach($result as $row){
echo $row[0];
echo '<br>';
}
echo"<hr>";
*/

//4-1-4
$sql='SHOW CREATE TABLE mission_5';
$result=$pdo->query($sql);
foreach($result as $row){
echo $row[1];
}
echo "<hr>";
?>