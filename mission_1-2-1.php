<?php
$hensu="hello world";//�ϐ��̐ݒ�
$filename="mission_1-2.txt";//�t�@�C���̐ݒ�
$fp=fopen($filename,"w");//�t�@�C�����J���ď������݂̂�
fwrite($fp,$hensu);//�ϐ�����������
fclose($fp);//�t�@�C�������
?>