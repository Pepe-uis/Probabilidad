<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $Y=$_GET["Y"];
    $X=$_GET["X"];
    $id=$_GET["id"];
    $squl1="UPDATE Datos SET X='$X' Where id = $id";
    $squl2="UPDATE Datos SET Y='$Y' Where id = $id";
    $noms="localhost";
    $nomu="root";
    $paw="";
    $basedatos="Probabilidad";
    $com=new MySQLi($noms,$nomu,$paw,$basedatos);
    if($com->query($squl1)==TRUE&&$com->query($squl2)==TRUE)
    {
        header("Location: index.php");
        die();
    }
?>
</body>
</html>