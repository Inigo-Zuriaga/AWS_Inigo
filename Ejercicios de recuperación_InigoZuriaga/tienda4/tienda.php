<style>
    .campo{
        border: 0;
        outline: 0;
    }
</style>
<?php
    session_start();

    if (!isset($_SESSION['personajes1'])) {
        $_SESSION['carrito'] = [];
        $_SESSION['personajes1'] = [
            [
                'Título' => "Pimiento",
                'Variedad' => "Verdura",
                'Precio' => 7
            ],
            [
                'Título' => "Manzana",
                'Variedad' => "Fruta",
                'Precio' => 2
            ],
            [
                'Título' => "Pera",
                'Variedad' => "Fruta",
                'Precio' => 23
            ],
            [
                'Título' => "Cebolla",
                'Variedad' => "Verdura",
                'Precio' => 3
            ],
            [
                'Título' => "Zanahoria",
                'Variedad' => "Tubérculo",
                'Precio' => 4
            ],
            [
                'Título' => "Patata",
                'Variedad' => "Tubérculo",
                'Precio' => 1
            ],
            [
                'Título' => "Kiwi",
                'Variedad' => "Fruta",
                'Precio' => 7
            ],
            [
                'Título' => "Fresas",
                'Variedad' => "Fruta",
                'Precio' => 8
            ],
            [
                'Título' => "Boniato",
                'Variedad' => "Tubérculo",
                'Precio' => 6
            ],
            [
                'Título' => "Plátano",
                'Variedad' => "Fruta",
                'Precio' => 10
            ],


        ];
    }
    ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>tienda de productos</title>
</head>
<body>
    <div style="padding-bottom: 10px; background-color: black">

        <h1>TIENDA DE PRODUCTOS</h1>

        <p>
            <a href="index.php">
                Volver al carrito
                &nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 width="1.2%">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
            </a>
        </p>
    </div>
    <ul class="cabecera">
        <li>Foto</li>
        <li>Título</li>
        <li>Variedad</li>
        <li>Precio</li>
        <li>Cantidad/Añadir</li>
    </ul>

    <?php

    foreach ($_SESSION['personajes1'] as $key => $row) {
        ?>


        <form method="get" action="index.php">
            <br>
            <ul>
                <li>
                    <img id="poster" style="width: 65%;" src="img/<?php echo $row['Título'] ?>.jpg">

                </li>
                <li><input type="text" class="campo" readonly name="Título" value="<?php echo $row['Título'] ?>"/></li>
                <li><input type="text" class="campo" readonly name="Vari" value="<?php echo $row['Variedad'] ?>"/></li>
                <li><input type="number" class="campo" readonly name="Prec" value="<?php echo $row['Precio'] ?>"/></li>
                <li><input type="number" min="1" style="width: 15%" name="Cantidad" value="1"/><input type="submit" name="Enviar"/></li>
            </ul>



        </form>
    <?php } ?>


</body>
</html>