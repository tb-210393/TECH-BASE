<?php
$hensu="hello world";//変数の設定
$filename="mission_1-2.txt";//ファイルの設定
$fp=fopen($filename,"a");//ファイルを開いて追記のa
fwrite($fp,$hensu);//変数を書き込み
fclose($fp);//ファイルを閉じる
?>