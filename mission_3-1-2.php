<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form action="mission_3-1-2.php" method="POST">
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
if(!empty($_POST["name"]&$_POST["comment"])){
$time=date("Y/m/d H:i:s");
$filename="mission_3-1.txt";
$array=file($filename);
$number=count($array)+1;
$fp=fopen($filename,"a");
fwrite($fp,$number."<>".$_POST["name"]."<>".$_POST["comment"]."<>".$time."\n");
fclose($fp);
}
?>
</form>
</body>
</html>
