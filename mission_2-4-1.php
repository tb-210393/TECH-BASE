<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form action="mission_2-4-1.php" method="POST">
<p>
<input type="text" name="comment" value="コメント">
<input type="submit" value="送信">
</p>
<?php
if(!empty($_POST["comment"])){
$hensu=$_POST["comment"];
$filename="mission_2-4.txt";
$fp=fopen($filename,"a");
fwrite($fp,$hensu."\n");
fclose($fp);
$array=file($filename);
if(!empty($array[0])){
echo $array[0]."<br>";
}
if(!empty($array[1])){
echo $array[1]."<br>";
}
if(!empty($array[2])){
echo $array[2]."<br>";
}}
?>
</form>
</body>
</html>
