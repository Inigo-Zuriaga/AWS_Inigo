<?php
session_start();
//EDITAR
if (isset($_GET['Enviar'])) {
    //PILLO LOS ATRIBUTOS ENVIADOS DESDE EDITAR.PHP
    $tituloedit = filter_input(INPUT_GET, 'Título', FILTER_SANITIZE_STRING);
    $JBedit = filter_input(INPUT_GET, 'JB', FILTER_SANITIZE_STRING);
    $anioedit = filter_input(INPUT_GET, 'Anio', FILTER_SANITIZE_STRING);
    $notaedit = filter_input(INPUT_GET, 'Nota', FILTER_SANITIZE_STRING);
    $directoredit = filter_input(INPUT_GET, 'Director', FILTER_SANITIZE_STRING);
    $id = $_GET['nid'];



    foreach ($_SESSION['personajes'] as $key => $row) {
        //SI LOS ID'S COINCIDEN...
        if ($id == $key) {
        //ELIMINO EL ANTIGUO Y HAGO UN PUSH CON LA INFO ACTUALIZADA!
            unset($_SESSION['personajes'][$id]);
            array_push($_SESSION['personajes'],

                [
                    'Título' => $tituloedit,
                    'Año' => $anioedit,
                    'James Bond' => $JBedit,
                    'Director' => $directoredit,
                    'Nota Rottentomatoes' => $notaedit
                ]);




        }
    }


}
//REINICIO LA SESION
if (isset($_GET['action']) && $_GET['action'] == "Reiniciar") {
    session_destroy();
    session_start();
}
//BORRO CAMPOS POR ID
if (isset($_GET['action']) && $_GET['action'] == "borrar") {
    $id = $_GET['id'];
    unset($_SESSION['personajes'][$id]);
}

//ORDENAR TITULOS ASCENDE Y DESCENDETE.
if (isset($_GET['action']) && $_GET['action'] == "tituloASC") {
    foreach ($_SESSION['personajes'] as $key => $row) {
        $titulo[$key] = $row['Título'];
    }
    array_multisort($titulo, SORT_ASC, $_SESSION['personajes']);
}

if (isset($_GET['action']) && $_GET['action'] == "tituloDESC") {
    foreach ($_SESSION['personajes'] as $key => $row) {
        $titulo[$key] = $row['Título'];
    }
    array_multisort($titulo, SORT_DESC, $_SESSION['personajes']);
}

//ORDENAR BONDS
if (isset($_GET['action']) && $_GET['action'] == "bondASC") {
    foreach ($_SESSION['personajes'] as $key => $row) {
        $james[$key] = $row['James Bond'];
    }
    array_multisort($james, SORT_ASC, $_SESSION['personajes']);
}

if (isset($_GET['action']) && $_GET['action'] == "bondDESC") {
    foreach ($_SESSION['personajes'] as $key => $row) {
        $james[$key] = $row['James Bond'];
    }
    array_multisort($james, SORT_DESC, $_SESSION['personajes']);
}

//ORDENAR DIRECTOR
if (isset($_GET['action']) && $_GET['action'] == "directorASC") {
    foreach ($_SESSION['personajes'] as $key => $row) {
        $director[$key] = $row['Director'];
    }
    array_multisort($director, SORT_ASC, $_SESSION['personajes']);
}

if (isset($_GET['action']) && $_GET['action'] == "directorDESC") {
    foreach ($_SESSION['personajes'] as $key => $row) {
        $director[$key] = $row['Director'];
    }
    array_multisort($director, SORT_DESC, $_SESSION['personajes']);
}

//ORDENAR NOTAS
if (isset($_GET['action']) && $_GET['action'] == "notaASC") {
    foreach ($_SESSION['personajes'] as $key => $row) {
        $nota[$key] = $row['Nota Rottentomatoes'];
    }
    array_multisort($nota, SORT_ASC, $_SESSION['personajes']);
}

if (isset($_GET['action']) && $_GET['action'] == "notaDESC") {
    foreach ($_SESSION['personajes'] as $key => $row) {
        $nota[$key] = $row['Nota Rottentomatoes'];
    }
    array_multisort($nota, SORT_DESC, $_SESSION['personajes']);
}

//ORDENAR AÑO
if (isset($_GET['action']) && $_GET['action'] == "anioASC") {
    foreach ($_SESSION['personajes'] as $key => $row) {
        $anio[$key] = $row['Año'];
    }
    array_multisort($anio, SORT_ASC, $_SESSION['personajes']);
}

if (isset($_GET['action']) && $_GET['action'] == "anioDESC") {
    foreach ($_SESSION['personajes'] as $key => $row) {
        $anio[$key] = $row['Año'];
    }
    array_multisort($anio, SORT_DESC, $_SESSION['personajes']);

}

//PELICULAS, BONDS, DIRECTORES, AÑOS Y NOTAS
if (!isset($_SESSION['personajes'])) {
    $_SESSION['personajes'] = [
        [
            'Título' => "DR. NO",
            'Año' => "1962",
            'James Bond' => "Sean Connery",
            'Director' => "Terence Young",
            'Nota Rottentomatoes' => 95
        ],
        [
            'Título' => "FROM RUSSIA WITH LOVE",
            'Año' => "1963",
            'James Bond' => "Sean Connery",
            'Director' => "Terence Young",
            'Nota Rottentomatoes' => 95
        ],
        [
            'Título' => "GOLDFINGER",
            'Año' => "1964",
            'James Bond' => "Sean Connery",
            'Director' => "Guy Hamilton",
            'Nota Rottentomatoes' => 99
        ],
        [
            'Título' => "THUNDERBALL",
            'Año' => "1965",
            'James Bond' => "Sean Connery",
            'Director' => "Terence Young",
            'Nota Rottentomatoes' => 87
        ],
        [
            'Título' => "YOU ONLY LIVE TWICE",
            'Año' => "1967",
            'James Bond' => "Sean Connery",
            'Director' => "Lewis Gilbert",
            'Nota Rottentomatoes' => 73
        ],
        [
            'Título' => "CASINO ROYALE (Parodia)",
            'Año' => "1967",
            'James Bond' => "David Niven",
            'Director' => "Peter Sellers",
            'Nota Rottentomatoes' => 25
        ],
        [
            'Título' => "ON HER MAJESTY'S SECRET SERVICE",
            'Año' => "1969",
            'James Bond' => "George Lazenby",
            'Director' => "Peter R. Hunt",
            'Nota Rottentomatoes' => 81
        ],
        [
            'Título' => "DIAMONDS ARE FOREVER",
            'Año' => "1971",
            'James Bond' => "Sean Connery",
            'Director' => "Guy Hamilton",
            'Nota Rottentomatoes' => 64
        ],
        [
            'Título' => "LIVE AND LET DIE",
            'Año' => "1973",
            'James Bond' => "Roger Moore",
            'Director' => "Guy Hamilton",
            'Nota Rottentomatoes' => 65
        ],
        [
            'Título' => "THE MAN WITH THE GOLDEN GUN",
            'Año' => "1974",
            'James Bond' => "Roger Moore",
            'Director' => "Guy Hamilton",
            'Nota Rottentomatoes' => 39
        ],
        [
            'Título' => "THE SPY WHO LOVED ME",
            'Año' => "1977",
            'James Bond' => "Roger Moore",
            'Director' => "Lewis Gilbert",
            'Nota Rottentomatoes' => 80
        ],
        [
            'Título' => "MOONRAKER",
            'Año' => "1979",
            'James Bond' => "Roger Moore",
            'Director' => "Lewis Gilbert",
            'Nota Rottentomatoes' => 60
        ],
        [
            'Título' => "FOR YOUR EYES ONLY",
            'Año' => "1981",
            'James Bond' => "Roger Moore",
            'Director' => "John Glen",
            'Nota Rottentomatoes' => 72
        ],
        [
            'Título' => "OCTOPUSSY",
            'Año' => "1983",
            'James Bond' => "Roger Moore",
            'Director' => "John Glen",
            'Nota Rottentomatoes' => 43
        ],
        [
            'Título' => "A VIEW TO KILL",
            'Año' => "1983",
            'James Bond' => "Roger Moore",
            'Director' => "John Glen",
            'Nota Rottentomatoes' => 38
        ],
        [
            'Título' => "THE LIVING DAYLIGHTS",
            'Año' => "1987",
            'James Bond' => "Timothy Dalton",
            'Director' => "John Glen",
            'Nota Rottentomatoes' => 74
        ],
        [
            'Título' => "LICENCE TO KILL",
            'Año' => "1989",
            'James Bond' => "Timothy Dalton",
            'Director' => "John Glen",
            'Nota Rottentomatoes' => 78
        ],
        [
            'Título' => "GOLDENEYE",
            'Año' => "1995",
            'James Bond' => "Pierce Brosnan",
            'Director' => "Martin Campbell",
            'Nota Rottentomatoes' => 79
        ],
        [
            'Título' => "TOMORROW NEVER DIES",
            'Año' => "1997",
            'James Bond' => "Pierce Brosnan",
            'Director' => "Roger Spottiswoode",
            'Nota Rottentomatoes' => 56
        ],
        [
            'Título' => "THE WORLD IS NOT ENOUGH",
            'Año' => "1999",
            'James Bond' => "Pierce Brosnan",
            'Director' => "Michael Apted",
            'Nota Rottentomatoes' => 52
        ],
        [
            'Título' => "DIE ANOTHER DAY",
            'Año' => "2002",
            'James Bond' => "Pierce Brosnan",
            'Director' => "Lee Tamahori",
            'Nota Rottentomatoes' => 56
        ],
        [
            'Título' => "CASINO ROYALE",
            'Año' => "2006",
            'James Bond' => "Daniel Craig",
            'Director' => "Martin Campbell",
            'Nota Rottentomatoes' => 94
        ],
        [
            'Título' => "QUANTUM OF SOLACE",
            'Año' => "2008",
            'James Bond' => "Daniel Craig",
            'Director' => "Marc Forster",
            'Nota Rottentomatoes' => 64
        ],
        [
            'Título' => "SKYFALL",
            'Año' => "2012",
            'James Bond' => "Daniel Craig",
            'Director' => "Sam Mendes",
            'Nota Rottentomatoes' => 92
        ],
        [
            'Título' => "SPECTRE",
            'Año' => "2015",
            'James Bond' => "Daniel Craig",
            'Director' => "Sam Mendes",
            'Nota Rottentomatoes' => 63
        ],
        [
            'Título' => "NO TIME TO DIE",
            'Año' => "2021",
            'James Bond' => "Daniel Craig",
            'Director' => "Cary Joji Fukunaga",
            'Nota Rottentomatoes' => 84
        ]

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
    <title>Listado de películas James Bond</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>
<body>
<div style="background: no-repeat center  url('img/gun-barrel.gif'); padding-bottom: 180px;margin-bottom: 30px; background-color: black">

    <h1>PELÍCULAS JAMES BOND</h1>


    <!--AQUI REINICIO LA SESION CON EL BOTON-->
    <p>
        <a href="index.php?action=Reiniciar" title="Reiniciar">
            Reiniciar sesión <br>
            &nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
                 width="1.2%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
        </a>
    </p>
</div>
<!--UL CON TODOS LOS ENCABEZADOS Y BOTONES DE ORDENAR-->
<ul class="cabecera">
    <li>Foto</li>

    <!--TODOS LOS APARTADOS LOS PUEDES ORDENAR DE A-Z o DEL 0-9 -->
    <li>
        Título
        <a href="index.php?action=tituloDESC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>

        </a>
        <a href="index.php?action=tituloASC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
            </svg>
        </a>
    </li>
    <li>James Bond
        <a href="index.php?action=bondDESC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>

        </a>
        <a href="index.php?action=bondASC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
            </svg>
        </a>
    </li>
    <li>Director
        <a href="index.php?action=directorDESC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>

        </a>
        <a href="index.php?action=directorASC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
            </svg>
        </a>
    </li>
    <li>Nota
        <a href="index.php?action=notaDESC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>

        </a>
        <a href="index.php?action=notaASC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
            </svg>
        </a>
    </li>
    <li>Año
        <a href="index.php?action=anioDESC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>

        </a>
        <a href="index.php?action=anioASC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
            </svg>
        </a>
    </li>
</ul>
<!--CREO UN FOREACH DE L SESION DE `PERSONAJES`. IMPRIMO CADA DATO EN UN LI-->
<?php foreach ($_SESSION['personajes'] as $key => $row) { ?>
    <ul>
        <li>
            <img id="poster" style="width: 65%" src="img/<?php echo $row['Título'] ?>.jpg">
        </li>
        <li><b><?php echo $row['Título'] ?></b></li>
        <li><?php echo $row['James Bond'] ?></li>
        <li><?php echo $row['Director'] ?></li>
        <li><?php echo $row['Nota Rottentomatoes'] ?></li>
        <li><?php echo $row['Año'] ?></li>
        <li>

            <a href="ver.php?id=<?php echo $key ?>" title="Ver" id="Ver">
                <!--<span class="lnr lnr-eye"></span>-->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" width="10%">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>

            </a>

            <a href="editar.php?id=<?php echo $key ?>" title="Editar">
                <!--<span class="lnr lnr-pencil"></span>-->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" width="10%">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </a>
            <a href="index.php?action=borrar&id=<?php echo $key ?>" title="Borrar">
                <!--<span class="lnr lnr-trash"></span>-->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" width="10%">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </a>
        </li>
    </ul>
<?php } ?>

</body>
</html>

