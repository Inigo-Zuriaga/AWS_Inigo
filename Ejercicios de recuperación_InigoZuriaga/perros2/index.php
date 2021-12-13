<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if(isset($_GET['action'])&& $_GET['action']=="Reiniciar"){
    //Borro la cookie
    setcookie("galleta", "", -1);
    //Recargo la página
    header("Location:index.php");
    session_destroy();
    session_start();

}

if (!isset($_SESSION['perritos'])) {
    $_SESSION['perritos'] = [
        [
            'nombre' => 'Tobey',
            'raza' => 'Golden retriever',
            'edad' => 1,
            'foto' => 'tobey.png'
        ],
        [
            'nombre' => 'Mike',
            'raza' => 'Husky',
            'edad' => 3,
            'foto' => 'mike.jpg'
        ],
        [
            'nombre' => 'Illun',
            'raza' => 'Border collie',
            'edad' => 5,
            'foto' => 'illun.jpg'
        ],
        [
            'nombre' => 'Gina',
            'raza' => 'Desconocida',
            'edad' => 10,
            'foto' => 'gina.jpg'
        ],
        [
            'nombre' => 'Eros',
            'raza' => 'Podenco',
            'edad' => 4,
            'foto' => 'susana.jpg'
        ],
        [
            'nombre' => 'Boby',
            'raza' => 'Golden retriever',
            'edad' => 12,
            'foto' => 'tobey.png'
        ],
        [
            'nombre' => 'Xuxo',
            'raza' => 'Border collie',
            'edad' => 15,
            'foto' => 'illun.jpg'
        ],
        [
            'nombre' => 'Susana',
            'raza' => 'Podenco',
            'edad' => 2,
            'foto' => 'susana.jpg'
        ],
        [
            'nombre' => 'Hotdog',
            'raza' => 'Salchicha',
            'edad' => 1,
            'foto' => 'hotdog.png'
        ],
        [
            'nombre' => 'Luis',
            'raza' => 'Pastor aleman',
            'edad' => 8,
            'foto' => 'luis.png'
        ],
    ];

    $_SESSION['opciones'] = ['Nombre A-Z','Nombre Z-A','Raza A-Z','Raza Z-A','Edad Asc', 'Edad Des'];
    $_SESSION['opcionesraza'] = ['','Golden retriever','Husky','Border collie','Desconocida','Podenco', 'Salchicha','Pastor aleman'];
}
///////////////////////////////////////ORDENAR/////////////////////////////////////////
if (isset($_GET['orden'])) {

    switch ($_GET['orden']) {
        case 0:
            $orden = SORT_ASC;
            $tipo = SORT_STRING;
            foreach ($_SESSION['perritos'] as $key => $row) {
                $nombre[$key] = $row['nombre'];
            }
            break;
        case 1:
            $orden = SORT_DESC;
            $tipo = SORT_STRING;
            foreach ($_SESSION['perritos'] as $key => $row) {
                $nombre[$key] = $row['nombre'];
            }
            break;
        case 2:;
            $orden = SORT_ASC;
            $tipo = SORT_STRING;
            foreach ($_SESSION['perritos'] as $key => $row) {
                $nombre[$key] = $row['raza'];
            }
            break;
        case 3:
            $orden = SORT_DESC;
            $tipo = SORT_STRING;
            foreach ($_SESSION['perritos'] as $key => $row) {
                $nombre[$key] = $row['raza'];
            }
            break;
        case 4:
            $orden = SORT_ASC;
            $tipo = SORT_NUMERIC;
            foreach ($_SESSION['perritos'] as $key => $row) {
                $nombre[$key] = $row['edad'];
            }
            break;
        case 5:
            $orden = SORT_DESC;
            $tipo = SORT_NUMERIC;
            foreach ($_SESSION['perritos'] as $key => $row) {
                $nombre[$key] = $row['edad'];
            }
            break;

    }
    array_multisort($nombre, $orden, $_SESSION['perritos'],$tipo);

}


?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <title>Perritos2</title>
</head>
<body>
<h1>Ejercicios de recuperación 2 PERRITOS</h1>

<a href="index.php?action=Reiniciar" title="Reiniciar">Reiniciar</a>
<form name="ordenar">
    <select name="orden" onchange="ordenar.submit()">
        <?php foreach ($_SESSION['opciones'] as $key => $row){ ?>
        <option value=" <?php echo $key ?> "><?php echo $row ?></option>
        <?php } ?>
    </select>
</form>
<br>

<form name="ordenar2">
    <?php foreach ($_SESSION['opciones'] as $key => $row){ ?>
        <?php echo "| " . $row?> <input type="radio" name="orden" value="<?php echo $key ?>" onchange="ordenar2.submit()">
    <?php } echo "| " ?>

</form>

<ul class="cabecera">
    <li>Foto</li>
    <li>Nombre
        <a href="index.php?orden=0">↑</a>
        <a href="index.php?orden=1">↓</a></li>
    <li>Raza
        <a href="index.php?orden=2">↑</a>
        <a href="index.php?orden=3">↓</a></li>
    <li>Edad
        <a href="index.php?orden=4">↑</a>
        <a href="index.php?orden=5">↓</a></li>
</ul>
<?php foreach ($_SESSION['perritos'] as $key => $row){ ?>
<ul class="perrolista">
    <li><img src="./imgs/<?php echo $row['foto'] ?>" alt="<?php echo $row['nombre'] ?>"></li>
    <li><?php echo $row['nombre'] ?> </li>
    <li><?php echo $row['raza'] ?> </li>
    <li><?php echo $row['edad'] ?> </li>
</ul>
<?php } ?>
</body>
</html>

