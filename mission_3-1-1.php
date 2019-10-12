<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form action="mission_3-1-1.php" method="POST">
<p>
名前：<input type="text" name="name">
</p>
<p>
コメント：<input type="text" name="comment">
</p>
<p>
<input type="submit" value="送信">
</p>
<?php
if(!empty($_POST["comment"]&$_POST["name"])){
$filename="mission_3-1.txt";
$fp=fopen($filename,"a");
fwrite($fp,$_POST["name"].$_POST["comment"]."\n");
fclose($fp);
}
?>
</form>
</body>
</html>
