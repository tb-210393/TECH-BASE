<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form action="mission_2-3-2.php" method="POST">
<p>
<input type="text" name="comment" value="コメント">
<input type="submit" value="送信">
</p>
<?php
if(isset($_POST["comment"])){
$hensu=$_POST["comment"];
$filename="mission_2-3.txt";
$fp=fopen($filename,"a");
fwrite($fp,$hensu."\n");
fclose($fp);
}
?>
</form>
</body>
</html>
