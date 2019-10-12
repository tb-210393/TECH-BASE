<html>
<head>
<meta charset="utf-8">
</head>

<body>
<!_入力フォーム_>
<form action="mission_3-3-1.php" method="POST">
<p>
<input type="text" name="name" value="名前">
</p>
<p>
<input type="text" name="comment" value="コメント">
<input type="submit" name="send" value="送信">
</p>
</form>

<!_削除フォーム_>
<form action="mission_3-3-1.php" method="POST">
<p>
<input type="text" name="deleteNo" value="削除対称番号">
<input type="submit" name="delete" value="削除">
</p>
</form>

<?php
//送信ボタンを押されたときの処理
if(isset($_POST["send"])){
//名前の変数を定義
if(isset($_POST["name"])){
$name=$_POST["name"];
}else{
$name="";
}
//コメントの変数を定義
if(isset($_POST["comment"])){
$comment=$_POST["comment"];
}else{
//テキストの書き込み
$comment="";
}
if(!empty($name&$comment)){
$time=date("Y/m/d H:i:s");
//投稿番号の指定
$filename="mission_3-1.txt";
$fpr=fopen($filename,"r");
$fpa=fopen($filename,"a");
$line=file($filename);
$lastline=end($line);
$lastnumber=explode("<>",$lastline);
if(!empty($lastnumber)){
$number=(int)$lastnumber[0]+1;
}else{
$number=1;
}
fwrite($fpa,$number."<>".$name."<>".$comment."<>".$time."\n");
fclose($fpr);
fclose($fpa);
}
//テキスト内容を画面表示
$filename="mission_3-1.txt";
$line=file($filename);
for($i=0;$i<count($line);$i++){
if(isset($line)){
list($number,$name,$comment,$time)=explode("<>",$line[$i]);
echo $number." ".$name." ".$comment." ".$time."<br>";
}}}

//削除ボタンを押されたときの処理
if(isset($_POST["delete"])){
//削除番号の定義
if(isset($_POST["deleteNo"])){
$deleteNo=$_POST["deleteNo"];
}else{
$deleteNo="";
}
$filename="mission_3-1.txt";
if(!empty($filename)){
$line=file($filename);
$fpr=fopen($filename,"r");
$fpw=fopen($filename,"w");
for($i=0;$i<count($line);$i++){
$data=explode("<>",$line[$i]);
if($deleteNo==$data[0]){
fwrite($fpw,"");
}else{
fwrite($fpw,$line[$i]);
}}
fclose($fpw);
fclose($fpr);

//テキスト内容を画面表示
$filename="mission_3-1.txt";
$array=file($filename);
for($i=0;$i<count($array);$i++){
if(isset($array)){
list($numberi,$namei,$commenti,$timei)=explode("<>",$array[$i]);
echo $numberi." ".$namei." ".$commenti." ".$timei."<br>";
}}}}
?>
</body>
</html>
