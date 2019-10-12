<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form action="mission_2-1.php" method="POST">
<p>
<input type="text" name="komento" value="コメント">
<input type="submit" value="送信">
</p>
<p>
<?php
echo $_POST["komento"]."を受け付けました。";
?>
</p>
</form>
</body>
</html>
