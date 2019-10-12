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
//テーブル作成
$sql="CREATE TABLE IF NOT EXISTS mission_5"
	."("
	."id INT AUTO_INCREMENT PRIMARY KEY,"
	."name char(32),"
	."comment TEXT,"
	."pass TEXT,"
	."registry_datetime DATETIME"
	.");";
$stmt=$pdo->query($sql);



//送信ボタンを押したときの処理
if(isset($_POST["send"])){
	//変数を定義
	if(isset($_POST["name"])){
		$name=$_POST["name"];
	}else{
		$name="";
	}

	if(isset($_POST["comment"])){
		$comment=$_POST["comment"];
	}else{
		$comment="";
	}

	$time=date("Y/m/d H:i:s");
	//パスワード変数を定義
	if(isset($_POST["pass"])){
		$pass=$_POST["pass"];
	}else{
		$pass="";
	}

	//送信するときの処理
	if(empty($_POST["hensyuyo"])){
		if(!empty($name&$comment)){
		//テーブルに書き込み
			$sql=$pdo->prepare("INSERT INTO mission_5(name,comment,pass,registry_datetime)VALUES(:name,:comment,:pass,:time)");
			$sql->bindParam(':name',$name,PDO::PARAM_STR);
			$sql->bindParam(':comment',$comment,PDO::PARAM_STR);
			$sql->bindParam(':pass',$pass,PDO::PARAM_STR);
			$sql->bindParam(':time',$time,PDO::PARAM_STR);
			$sql->execute();

			echo "送信されました。";
		}
	}else{
		//編集するときの処置
		$hensyuyo=$_POST["hensyuyo"];
		if(!empty($name&$comment)){
			$id=$hensyuyo;
			$sql='update mission_5 set name=:name,comment=:comment,pass=:pass,registry_datetime=:time where id=:id';
			$stmt=$pdo->prepare($sql);
			$stmt->bindParam(':name',$name,PDO::PARAM_STR);
			$stmt->bindParam(':comment',$comment,PDO::PARAM_STR);
			$stmt->bindParam(':pass',$pass,PDO::PARAM_STR);
			$stmt->bindParam(':time',$time,PDO::PARAM_STR);
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$stmt->execute();

			echo "編集出来ました。";
		}
	}
}//送信ボタンを押したときの処理終

//削除ボタンを押したときの処理
if(isset($_POST["delete"])){
	//削除番号の定義
	if(isset($_POST["deleteNo"])){
		$deleteNo=$_POST["deleteNo"];
	}else{
		$deleteNo="";
	}
	if(!empty($_POST["passD"])){
		$passD=$_POST["passD"];
	}else{
		$passD="";
		echo "パスワードが入力されておりません。";
	}

	if(!empty($deleteNo&$passD)){
		$sql='SELECT*FROM mission_5';
		$stmt=$pdo->query($sql);
		$results=$stmt->fetchAll();
		foreach($results as $row){
			$No=$row['id'];
			$pass=$row['pass'];
			if($No==$deleteNo){
				if(!empty($pass)){
					if($passD==$pass){
						$id=$No;
						$sql='delete from mission_5 where id=:id';
						$stmt=$pdo->prepare($sql);
						$stmt->bindParam(':id',$id,PDO::PARAM_INT);
						$stmt->execute();
						echo "削除できました。";
					}else{
						echo "パスワードが間違っているため、削除できません。";
					}
				}else{
					echo "パスワードが未設定のため、削除できません。";
				}
			}
		}
	}
}//削除ボタンを押したときの処理終

//編集ボタンを押したときの処理
if(isset($_POST["hensyu"])){
	//編集番号の定義
	if(isset($_POST["hensyuNo"])){
		$hensyuNo=$_POST["hensyuNo"];
	}else{
		$hensyuNo="";
		echo "編集番号が入力されていません。";
	}
	if(isset($_POST["passH"])){
		$passH=$_POST["passH"];
	}else{
		$passH="";
		echo "パスワードが入力されていません。";
	}
	if(!empty($hensyuNo&$passH)){
		$sql='SELECT*FROM mission_5';
		$stmt=$pdo->query($sql);
		$results=$stmt->fetchAll();
		foreach($results as $row){
			$No=$row['id'];
			$name=$row['name'];
			$comment=$row['comment'];
			$pass=$row['pass'];
			if($No==$hensyuNo){
				if(!empty($pass)){
					if($passH==$pass){
						$hensyu1=$No;
						$name1=$name;
						$comment1=$comment;
					}else{
						echo "パスワードが違います。";
					}
				}else{
					echo "パスワードが未設定のため編集できません。";
				}
			}
		}
	}
}//編集ボタンを押したときの処理終
?>


<!_入力フォーム_>
<form action="mission_5-1.php" method="POST">
<p>
<input type="text" name="name" value="<?php if(!empty($name1)){echo $name1;}?>" placeholder="名前">
</p>
<p>
<input type="text" name="comment" value="<?php if(!empty($comment1)){echo $comment1;}?>" placeholder="コメント">
</p>
<p>
<input type="text" name="pass" placeholder="パスワード">
<input type="submit" name="send" value="送信">
<input type="hidden" name="hensyuyo" value="<?php if(!empty($hensyu1)){echo $hensyu1;}?>">
</p>
</form>

<!_削除フォーム_>
<form action="mission_5-1.php" method="POST">
<p>
<input type="text" name="deleteNo" placeholder="削除対称番号">
</p>
<p>
<input type="text" name="passD" placeholder="パスワード">
<input type="submit" name="delete" value="削除">
</p>
</form>

<!_編集番号指定用フォーム_>

<form action="mission_5-1.php" method="POST">
<p>
<input type="text" name="hensyuNo" placeholder="編集対称番号">
</p>
<p>
<input type="text" name="passH" placeholder="パスワード">
<input type="submit" name="hensyu" value="編集">
</p>
</form>

<?php
$sql='SELECT*FROM mission_5';
$stmt=$pdo->query($sql);
$result=$stmt->fetchall();
foreach($result as $row){
	echo $row['id'].' '. $row['name'].' '.$row['comment'].' '.$row['registry_datetime'].'<br>';
	echo "<hr>";
}
?>
</body>
</html>
