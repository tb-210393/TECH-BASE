<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form action="mission_2-3-1.php" method="POST">
<p>
<input type="text" name="comment" value="コメント">
<input type="submit" value="送信">
</p>
<?php
if(isset($_POST["comment"])){
$hensu=$_POST["comment"];
$filename="mission_2-3.txt";
$fp=fopen($filename,"w");
fwrite($fp,$hensu);
fclose($fp);
}
?>
</form>
</body>
</html>
