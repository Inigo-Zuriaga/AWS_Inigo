<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

if(isset($_GET['action'])&& $_GET['action']=="Reiniciar"){
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
    $_SESSION['opcionesraza'] = ['Escoge la raza','Golden retriever','Husky','Border collie','Desconocida','Podenco', 'Salchicha','Pastor aleman'];
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
///////////////////////////////////////ORDENAR POR RAZA/////////////////////////////////////////

if (isset($_GET['ordenraza'])) {
session_destroy();
switch ($_GET['ordenraza']) {
    case 1:
        foreach ($_SESSION['perritos'] as $key => $row) {
            $nombre[$key] = $row['raza'];
            $chucho="Golden retriever";
            if (!in_array($chucho, $_SESSION['perritos'][$key])) {
                unset($_SESSION['perritos'][$key]);
            }
        }
        break;

    case 2:
        foreach ($_SESSION['perritos'] as $key => $row) {
            $nombre[$key] = $row['raza'];
            $chucho="Husky";
            if (!in_array($chucho, $_SESSION['perritos'][$key])) {
                unset($_SESSION['perritos'][$key]);
            }
        }
        break;

    case 3:
        foreach ($_SESSION['perritos'] as $key => $row) {
            $nombre[$key] = $row['raza'];
            $chucho="Border collie";
            if (!in_array($chucho, $_SESSION['perritos'][$key])) {
                unset($_SESSION['perritos'][$key]);
            }
        }
        break;
    case 4:
        foreach ($_SESSION['perritos'] as $key => $row) {
            $nombre[$key] = $row['raza'];
            $chucho="Desconocida";
            if (!in_array($chucho, $_SESSION['perritos'][$key])) {
                unset($_SESSION['perritos'][$key]);
            }
        }
        break;
    case 5:
        foreach ($_SESSION['perritos'] as $key => $row) {
            $nombre[$key] = $row['raza'];
            $chucho="Podenco";
            if (!in_array($chucho, $_SESSION['perritos'][$key])) {
                unset($_SESSION['perritos'][$key]);
            }
        }
        break;
    case 6:
        foreach ($_SESSION['perritos'] as $key => $row) {
            $nombre[$key] = $row['raza'];
            $chucho="Salchicha";
            if (!in_array($chucho, $_SESSION['perritos'][$key])) {
                unset($_SESSION['perritos'][$key]);
            }
        }
        break;
    case 7:
        foreach ($_SESSION['perritos'] as $key => $row) {
            $nombre[$key] = $row['raza'];
            $chucho="Pastor aleman";
            if (!in_array($chucho, $_SESSION['perritos'][$key])) {
                unset($_SESSION['perritos'][$key]);
            }
        }
        break;
}

}
///////////////////////////////////////BUSCADOR/////////////////////////////////////////
if (isset($_GET['buscar'])) {
    session_destroy();
    foreach ($_SESSION['perritos'] as $key => $row) {
        $nombre[$key] = $row['nombre'];

            if (!in_array($_GET['buscar'],$_SESSION['perritos'][$key])) {
                unset($_SESSION['perritos'][$key]);
            }
        }
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
    <title>Perritos3</title>
</head>
<body>
<h1>Ejercicios de recuperación 3 PERRITOS</h1>

<a href="index.php?action=Reiniciar" title="Reiniciar">Reiniciar</a>
<br><br>
<form name="ordenar">
    <select name="orden" onchange="ordenar.submit()">
        <?php foreach ($_SESSION['opciones'] as $key => $row){ ?>
        <option value=" <?php echo $key ?> "><?php echo $row ?></option>
        <?php } ?>
    </select>
</form>
<br>

<form name="busca">
    <input type="text" name="buscar" onchange="busca.submit()">
</form>


<ul class="cabecera">
    <li>Foto</li>
    <li>Nombre</li>
    <li>Raza
        <form name="ordenarraza">
            <select name="ordenraza" onchange="ordenarraza.submit()">
                <?php foreach ($_SESSION['opcionesraza'] as $key => $row){ ?>
                    <option value=" <?php echo $i++; ?> "><?php echo $row ?></option>
                <?php } ?>
            </select>
        </form>
    </li>
    <li>Edad</li>
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

