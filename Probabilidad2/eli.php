<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="esti_tab.css">
</head>
<body>
    <?php
    $id=$_GET["id"];
    echo "<form>";
    echo "<h1>¿Seguro que quiere eliminar el registro con el $id?</h1>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<p>";
    echo "<a href="."index.php"." class="."boton".">No</a>";
    echo "<a href="."Eliminar.php?id=$id"." class="."boton".">Si</a>";
    echo "</p>";
    echo "</form>";
    ?>
</body>
</html>