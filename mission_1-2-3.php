<?php
$hensu="hello world";//�ϐ��̐ݒ�
$filename="mission_1-2.txt";//�t�@�C���̐ݒ�
$fp=fopen($filename,"a");//�t�@�C�����J���ĒǋL��a
fwrite($fp,$hensu);//�ϐ�����������
fclose($fp);//�t�@�C�������
?>