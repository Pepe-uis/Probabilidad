<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="esti_tab.css">
</head>
<body>
    <h1>Editar registro</h1>
    <form action="modi.php" method="get">
    <?php
    $id=$_GET["id"];
    $squl1="SELECT X,Y   FROM Datos  Where id = $id";
    $noms="localhost";
    $nomu="root";
    $paw="";
    $basedatos="Probabilidad";
    $com=new MySQLi($noms,$nomu,$paw,$basedatos);
    $coma=$com->query($squl1);
    $reg=$coma->fetch_assoc();
    $X=$reg["X"];
    $Y=$reg["Y"];
    //echo "<form action="."modi.php"." method="."get".">";
    echo "<label for="."id".">id</label><input type="."number"." name="."id"." id="."id"." value="."$id".">";
    //echo "<label for="."X".">X</label><input type="."number"." name="."X"." id="."X"." value="."$X"." onkeydown="."return event.key!=='-' && event.key !=='e'".">";
    //echo "<label for="."Y".">Y</label><input type="."number"." name="."Y"." id="."Y"." value="."$Y"." onkeydown="."return event.key!=='-' && event.key !=='e'".">";
    //echo "<input type="."submit"." value="."enviar".">";
    //echo "</form>";
    ?>
    <label for="X">X</label><input type=number name="X" id="X" value=<?php echo $X?> onkeydown="return event.key!=='-' && event.key !=='e'">
    <label for="Y">Y</label><input type=number name="Y" id="Y" value=<?php echo $Y?> onkeydown="return event.key!=='-' && event.key !=='e'">
    <input type="submit" value="enviar">
    </form>
</body>
</html>