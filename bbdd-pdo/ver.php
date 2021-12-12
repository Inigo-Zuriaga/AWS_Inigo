<?php

//Requiero el archivo de conexión
require_once "conexion.php";
?>
<h1>Tabla personas</h1>
<table border="1" >
    <tr>
        <td>id</td>
        <td>nombre</td>
        <td>activo</td>
    </tr>
<?php
//Select con OBJ
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch(PDO::FETCH_OBJ)){ //Recorro el resultado
        ?>

<tr>
    <td><?php echo $personas->id ?></td>
    <td><?php echo $personas->nombre ?></td>
    <td><?php echo $personas->activo ?></td>
</tr>
<?php
}
?>
</table>

