<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form action="mission_2-2-2.php" method="POST">
<p>
<input type="text" name="comment" value="コメント">
<input type="submit" value="送信">
</p>
<p>
<?php
if(isset($_POST["comment"])){
$hensu=$_POST["comment"];
}else{
$hensu="";
}
if(!empty($hensu)){
$filename="mission_2-2-1.txt";
$fp=fopen($filename,"w");
fwrite($fp,$hensu);
fclose($fp);
echo $hensu."を受け付けました。";
}
?>
</p>
</form>
</body>
</html>
