<style>
    th{
        width: 8rem;
        text-align: left;
        border-bottom: 1px solid black;
    }
    td{
        width: 8rem;
    }
</style>

<h1>Ejemplo 6: Vista de coche</h1>
<table>
    <tr>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Color</th>
        <th>Propietario</th>
    </tr>

    <tr>
        <td><?php echo $datos->marca ?></td>
        <td><?php echo $datos->modelo ?></td>
        <td><?php echo $datos->color ?></td>
        <td><?php echo $datos->propietario ?></td>
    </tr>
</table>
