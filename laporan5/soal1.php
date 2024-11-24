<?php
$batas = time()+5;
setcookie("user", "admin", $batas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
if(isset($_COOKIE["user"])){
    echo "selamat Datang ".$_COOKIE["user"].",Cookie telah dibuat dan akan berakhir setelah 5 detik";
}else{
    echo"Cookie telah berakhir";
}
?>

</body>
</html>