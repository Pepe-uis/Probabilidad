<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $id=$_GET["id"];
    $squl1="DELETE FROM Datos WHERE id = $id";
    $noms="localhost";
    $nomu="root";
    $paw="";
    $basedatos="Probabilidad";
    $com=new MySQLi($noms,$nomu,$paw,$basedatos);
    if($com->query($squl1)==TRUE)
    {
        header("Location: index.php");
        die();
    }
    ?>
</body>
</html>