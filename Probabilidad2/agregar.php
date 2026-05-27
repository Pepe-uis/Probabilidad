<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $X=$_POST["X"];
    $Y=$_POST["Y"];
    $squlcmd="INSERT INTO Datos(X,Y)VALUES($X , $Y)";
    $noms="localhost";
    $nomu="root";
    $paw="";
    $basedatos="Probabilidad";
    $com=new MySQLi($noms,$nomu,$paw,$basedatos);
    if($com->query($squlcmd)==TRUE)
    {
        header("Location: index.php");
        die();
    }
    ?>
</body>
</html>