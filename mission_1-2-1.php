<?php
$hensu="hello world";//変数の設定
$filename="mission_1-2.txt";//ファイルの設定
$fp=fopen($filename,"w");//ファイルを開いて書き込みのｗ
fwrite($fp,$hensu);//変数を書き込み
fclose($fp);//ファイルを閉じる
?>