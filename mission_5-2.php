<html>
<!_ヘッダー部分_>
<head>
<meta charset="utf-8">
</head>

<!_ボディ部分_>
<body>

<?php
//データベースの接続
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
//テーブルの中身を確認する。
$sql='SELECT*FROM mission_5';
$stmt=$pdo->query($sql);
$result=$stmt->fetchall();
foreach($result as $row){
	echo $row['id'].' '. $row['name'].' '.$row['comment'].' '.$row['pass'].' '.$row['registry_datetime'].'<br>';
	echo "<hr>";
}
?>
</body>
</html>

