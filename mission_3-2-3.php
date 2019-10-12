<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form action="mission_3-2-3.php" method="POST">
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
if(!empty($name&$comment)){
$time=date("Y/m/d H:i:s");
$filename="mission_3-1.txt";
$arr=file($filename);
$number=count($arr)+1;
$fp=fopen($filename,"a");
fwrite($fp,$number."<>".$name."<>".$comment."<>".$time."\n");
fclose($fp);
}
$filename="mission_3-1.txt";
$array=file($filename);
for($i=0;$i<count($array);$i++){
if(isset($array)){
list($numberi,$namei,$commenti,$timei)=explode("<>",$array[$i]);
echo $numberi." ".$namei." ".$commenti." ".$timei."<br>";
}}
?>
</form>
</body>
</html>
