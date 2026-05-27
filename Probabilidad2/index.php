<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="esti_tab.css">
</head>
<body>
    <h1>Probabilidad</h1>
    <h2>Datos</h2>
    <?php
    $SumaX=0;
    $SumaY=0;
    $PotenciaSX=0;
    $PotenciaSY=0;
    $MultiplicacionS=0;
    $bor=2;
    $noms="localhost";
    $nomu="root";
    $paw="";
    $basedatos="Probabilidad";
    $com=new MySQLi($noms,$nomu,$paw,$basedatos);
    if($com->connect_error)
    {
        die("<h2><font color='red'>Error de conexion.".$com->connect_error."</font></h2>");
    }
    $sqlcmd ="SELECT * FROM Datos";
    $tabla = $com->query($sqlcmd);
    if($tabla->num_rows>0)
    {
        echo "<table border=$bor>";
        echo "<tr> <th>X</th><th>Y</th><th>X^2</th><th>Y^2</th><th>X*Y</th><th>Editar</th><th>Eliminar</th></tr>";
        while($reg=$tabla->fetch_assoc())
        {
            $id=$reg["id"];
            $XDatos=$reg["X"];
            $YDatos=$reg["Y"];
            $SumaX=$SumaX+($XDatos);
            $SumaY=$SumaY+($YDatos);
            $PotenciaSX=$PotenciaSX+(pow($XDatos,2));
            $PotenciaSY=$PotenciaSY+(pow($YDatos,2));
            $MultiplicacionS=$MultiplicacionS+($XDatos*$YDatos);
            $PotenciaX=pow($XDatos,2);
            $PotenciaY=pow($YDatos,2);
            $Multiplicacion=$XDatos*$YDatos;
            echo "<tr>";
            echo "<th>$XDatos</th> <th>$YDatos</th> <th>$PotenciaX</th> <th>$PotenciaY</th> <th>$Multiplicacion</th>";
            echo "<th><a href="."Editar.php?id=$id"."><img src="."lapiz.png width="."30px"."><br><p>Editar</p></a></th>";
            echo "<th><a href="."eli.php?id=$id"."><img src="."equis.png width="."30px"."><br><p>Eliminar</p></a></th>";
            echo "</tr>";
            
        }
        if($tabla->num_rows>2)
            {
        echo "</table>";
        echo "<table border=$bor>";
        echo "<tr><th colspan="."5".">Sumas</th></tr>";
        echo "<tr> <th>$SumaX</th><th>$SumaY</th><th>$PotenciaSX</th><th>$PotenciaSY</th><th>$MultiplicacionS</th></tr>";
        echo "</table>";
        echo "<table border=$bor>";
        echo "<tr><th colspan="."5".">Resultados</th></tr>";
        echo "<tr><th>Media X: </th><th>".($SumaX/$tabla->num_rows)."</th></tr>";
        echo "<tr><th>Media Y: </th><th>".($SumaY/$tabla->num_rows)."</th></tr>";
        echo "<tr><th>Covarianza: </th><th>".(($MultiplicacionS/$tabla->num_rows)-(($SumaX/$tabla->num_rows)*($SumaY/$tabla->num_rows)))."</th></tr>";
        echo "<tr><th>r: </th><th>".((($MultiplicacionS/$tabla->num_rows)-(($SumaX/$tabla->num_rows)*($SumaY/$tabla->num_rows)))/(sqrt((($PotenciaSX/$tabla->num_rows)-pow(($SumaX/$tabla->num_rows),2))*(($PotenciaSY/$tabla->num_rows)-pow(($SumaY/$tabla->num_rows),2)))))."</th></tr>";
        echo "<tr><th>R^2</th><th>".pow((($MultiplicacionS/$tabla->num_rows)-(($SumaX/$tabla->num_rows)*($SumaY/$tabla->num_rows)))/(sqrt((($PotenciaSX/$tabla->num_rows)-pow(($SumaX/$tabla->num_rows),2))*(($PotenciaSY/$tabla->num_rows)-pow(($SumaY/$tabla->num_rows),2)))),2)."</th></tr>";
        echo "<tr><th>Sx</th><th>".sqrt((($PotenciaSX/$tabla->num_rows)-pow(($SumaX/$tabla->num_rows),2)))."</th></tr>";
        echo "<tr><th>Sy</th><th>".sqrt((($PotenciaSY/$tabla->num_rows)-pow(($SumaY/$tabla->num_rows),2)))."</th></tr>";
        echo "<tr><th>m</th><th>".((($MultiplicacionS/$tabla->num_rows)-(($SumaX/$tabla->num_rows)*($SumaY/$tabla->num_rows)))/(pow(($SumaX/$tabla->num_rows),2)-($PotenciaSX/$tabla->num_rows)))."</th></tr>";
        echo "<tr><th>b</th><th>".((($SumaY/$tabla->num_rows))-((($MultiplicacionS/$tabla->num_rows)-(($SumaX/$tabla->num_rows)*($SumaY/$tabla->num_rows)))/(pow(($SumaX/$tabla->num_rows),2)-($PotenciaSX/$tabla->num_rows)))*($SumaX/$tabla->num_rows))."</th></tr>";
        echo "<tr><th>Ecuacion: </th><th>y=".((($SumaY/$tabla->num_rows))-((($MultiplicacionS/$tabla->num_rows)-(($SumaX/$tabla->num_rows)*($SumaY/$tabla->num_rows)))/(pow(($SumaX/$tabla->num_rows),2)-($PotenciaSX/$tabla->num_rows)))*($SumaX/$tabla->num_rows))."+".((($MultiplicacionS/$tabla->num_rows)-(($SumaX/$tabla->num_rows)*($SumaY/$tabla->num_rows)))/(pow(($SumaX/$tabla->num_rows),2)-($PotenciaSX/$tabla->num_rows)))."*x</th></tr>";
        echo "</table>";
            }
    }
    else
    {
        echo"<h2><font color='red'>No hay registros </font></h2>";
    }
    ?>
    <a href="Nuevo_Dato.html" class="boton">Agregar Registro</a>
</body>
</html>