<html>
<!_ヘッダー部分_>
<head>
<meta charset="utf-8">
</head>

<!_ボディ部分_>
<body>

<?php
//全体に関する変数の定義
$filename="mission_3-1.txt";
$line=file($filename);

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
//送信するときの処理
if(empty($_POST["hensyuyo"])){
//投稿番号を定義
$fpr=fopen($filename,"r");
$lastline=end($line);
$lastdata=explode("<>",$lastline);
if(!empty($lastline)){
$number=(int)$lastdata[0]+1;
}else{
$number=1;
}
fclose($fpr);
//テキストへの書き込み
if(!empty($name&$comment)){
$fpa=fopen($filename,"a");
fwrite($fpa,$number."<>".$name."<>".$comment."<>".$time."\n");
fclose($fpa);
}}else{
//編集するときの処置

$hensyuyo=$_POST["hensyuyo"];
if(!empty($name&$comment)){
$fpr=fopen($filename,"r");
$fpw=fopen($filename,"w");
for($i=0;$i<count($line);$i++){
$data1=explode("<>",$line[$i]);
if($hensyuyo==$data1[0]){
fwrite($fpw,$hensyuyo."<>".$name."<>".$comment."<>".$time."\n");
}else{
fwrite($fpw,$line[$i]);
}}
fclose($fpw);
fclose($fpr);
}}}//送信ボタンを押したときの処理終

//削除ボタンを押したときの処理
if(isset($_POST["delete"])){
//削除番号の定義
if(isset($_POST["deleteNo"])){
$deleteNo=$_POST["deleteNo"];
}else{
$deleteNo="";
}
$fpr=fopen($filename,"r");
$fpw=fopen($filename,"w");
for($i=0;$i<count($line);$i++){
$data1=explode("<>",$line[$i]);
if($deleteNo==$data1[0]){
fwrite($fpw,"");
}else{
fwrite($fpw,$line[$i]);
}}
fclose($fpw);
fclose($fpr);
}//削除ボタンを押したときの処理終

//編集ボタンを押したときの処理
if(isset($_POST["hensyu"])){
//編集番号の定義
if(isset($_POST["hensyuNo"])){
$hensyuNo=$_POST["hensyuNo"];
}else{
$hensyuNo="";
}
if(!empty($filename)){
$fpr=fopen($filename,"r");
for($i=0;$i<count($line);$i++){
$data2=explode("<>",$line[$i]);
if($hensyuNo==$data2[0]){
$hensyu1=$data2[0];
$name1=$data2[1];
$comment1=$data2[2];
}}
fclose($fpr);
}}//編集ボタンを押したときの処理終
?>


<!_入力フォーム_>
<form action="mission_3-4-1.php" method="POST">
<p>
<input type="text" name="name" value="<?php if(!empty($name1)){echo $name1;}else{echo "名前";}?>">
</p>
<p>
<input type="text" name="comment" value="<?php if(!empty($comment1)){echo $comment1;}else{echo "コメント";}?>">
<input type="hidden" name="hensyuyo"value="<?php if(!empty($hensyu1)){echo $hensyu1;}else{echo "";}?>">
<input type="submit" name="send" value="送信">
</p>
</form>

<!_削除フォーム_>
<form action="mission_3-4-1.php" method="POST">
<p>
<input type="text" name="deleteNo" value="削除対称番号">
<input type="submit" name="delete" value="削除">
</p>
</form>

<!_編集番号指定用フォーム_>

<form action="mission_3-4-1.php" method="POST"><p>
<input type="text" name="hensyuNo" value="編集対称番号">
<input type="submit" name="hensyu" value="編集">
</p>
</form>


<?php
//テキストファイルからの出力
$file="mission_3-1.txt";
$array=file($file);
if(!empty($file)){
$fp=fopen($file,"r");
for($i=0;$i<count($array);$i++){
$data=explode("<>",$array[$i]);
echo $data[0]." ".$data[1]." ".$data[2]." ".$data[3]."<br>";
}}
fclose($fp);
?>
</body>
</html>
