    <?php
    session_start();



    if (isset($_GET['Enviar'])) {
        $titulocarr = filter_input(INPUT_GET, 'Título', FILTER_SANITIZE_STRING);
        $variedadcarr = filter_input(INPUT_GET, 'Vari', FILTER_SANITIZE_STRING);
        $preciocarr = filter_input(INPUT_GET, 'Prec', FILTER_SANITIZE_STRING);

        $fecha = $titulocarr ."_". date('ljS\ofFYh:i:sA');

        array_push($_SESSION['product'],$titulocarr );
        print_r($_SESSION['product']);

        //setcookie($fecha, $titulocarr);
        setcookie($titulocarr, $titulocarr, time() + 3600);  //1h
        //print_r($_COOKIE);


        $cantidad = filter_input(INPUT_GET, 'Cantidad', FILTER_SANITIZE_STRING);

        for ($i = 0; $i < $cantidad; $i++) {
            array_push($_SESSION['carrito'],

                [
                    'Título' => $titulocarr,
                    'Variedad' => $variedadcarr,
                    'Precio' => $preciocarr,
                ]);

        }
    }
    if (isset($_GET['Vaciar'])) {

            foreach ($_SESSION['product'] as $row) {
                echo $row;
                setcookie($row, "", -1);
            }
            session_destroy();
            header("Location:index.php");
            session_start();

    }
    //REINICIO LA SESION
    if (isset($_GET['action']) && $_GET['action'] == "Reiniciar") {

        foreach ($_SESSION['product'] as $row) {
            echo $row;
            setcookie($row, "", -1);
        }
        session_destroy();
        header("Location:index.php");
        session_start();

    }

    ?>
    <!doctype html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Carrito</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    </head>
    <body>
    <div style="padding-bottom: 10px; background-color: black">

        <h1>CARRITO DE PRODUCTOS</h1>


        <!--AQUI REINICIO LA SESION CON EL BOTON-->
        <form action="index.php" method="get">
        <p>
            <a href="index.php?action=Reiniciar" title="Reiniciar">
                Vaciar carrito
                &nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 width="1.2%">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
            </a>
        </p>
        <input type="submit" name="Vaciar"  value="Vaciar carrito"/>
        </form>
        <br>
        <p>
            <a href="tienda.php">
                Volver a la tienda
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
    </ul>

    <?php foreach ($_SESSION['carrito'] as $key => $row) { ?>
        <ul>
            <li>
                <img id="poster" style="width: 65%" src="img/<?php echo $row['Título'] ?>.jpg">
            </li>
            <li><?php echo $row['Título'] ?></li>
            <li><?php echo $row['Variedad'] ?></li>
            <li><?php echo $row['Precio'] ?>€</li>

        </ul>
    <?php } ?>

    </body>
    </html>

