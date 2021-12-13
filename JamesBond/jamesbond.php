<?php
//https://editorial.rottentomatoes.com/guide/james-bond-movies-in-order/
//https://es.wikipedia.org/wiki/Pel%C3%ADculas_de_James_Bond


session_start();

if (isset($_GET['action']) && $_GET['action'] == "Reiniciar"){
    session_destroy();
    session_start();
}

if (isset($_GET['action']) && $_GET['action'] == "borrar"){
    $id = $_GET['id'];
    unset($_SESSION['personajes'][$id]);
}

if (isset($_GET['action']) && $_GET['action'] == "OrdenarASC"){
    foreach ($_SESSION['personajes'] as $key => $row){
        $nombre[$key] = $row['Título'];
    }
    array_multisort($nombre, SORT_ASC, $_SESSION['personajes']);
}

if (isset($_GET['action']) && $_GET['action'] == "OrdenarDESC"){
    foreach ($_SESSION['personajes'] as $key => $row){
        $nombre[$key] = $row['Título'];
    }
    array_multisort($nombre, SORT_DESC, $_SESSION['personajes']);
}


if (!isset($_SESSION['personajes'])) {
    $_SESSION['personajes'] = [
        [
            'Título' => "DR. NO",
            'Año' => "1962",
            'James Bond' => "Sean Connery",
            'Director' => "Terence Young",
            'Nota Rottentomatoes' => "95",
        ],
        [
            'Título' => "FROM RUSSIA WITH LOVE",
            'Año' => "1963",
            'James Bond' => "Sean Connery",
            'Director' => "Terence Young",
            'Nota Rottentomatoes' => "95",
        ],
        [
            'Título' => "GOLDFINGER",
            'Año' => "1964",
            'James Bond' => "Sean Connery",
            'Director' => "Guy Hamilton",
            'Nota Rottentomatoes' => "99",
        ],
        [
            'Título' => "THUNDERBALL",
            'Año' => "1965",
            'James Bond' => "Sean Connery",
            'Director' => "Terence Young",
            'Nota Rottentomatoes' => "87",
        ],
        [
            'Título' => "YOU ONLY LIVE TWICE",
            'Año' => "1967",
            'James Bond' => "Sean Connery",
            'Director' => "Lewis Gilbert",
            'Nota Rottentomatoes' => "73",
        ],
        [
            'Título' => "CASINO ROYALE (parodia)",
            'Año' => "1967",
            'James Bond' => "David Niven",
            'Director' => "Peter Sellers",
            'Nota Rottentomatoes' => "25",
        ],
        [
            'Título' => "ON HER MAJESTY'S SECRET SERVICE",
            'Año' => "1969",
            'James Bond' => "George Lazenby",
            'Director' => "Peter R. Hunt",
            'Nota Rottentomatoes' => "81",
        ],
        [
            'Título' => "DIAMONDS ARE FOREVER",
            'Año' => "1971",
            'James Bond' => "Sean Connery",
            'Director' => "Guy Hamilton",
            'Nota Rottentomatoes' => "64",
        ],
        [
            'Título' => "LIVE AND LET DIE",
            'Año' => "1973",
            'James Bond' => "Roger Moore",
            'Director' => "Guy Hamilton",
            'Nota Rottentomatoes' => "65",
        ],
        [
            'Título' => "THE MAN WITH THE GOLDEN GUN",
            'Año' => "1974",
            'James Bond' => "Roger Moore",
            'Director' => "Guy Hamilton",
            'Nota Rottentomatoes' => "39",
        ],
        [
            'Título' => "THE SPY WHO LOVED ME",
            'Año' => "1977",
            'James Bond' => "Roger Moore",
            'Director' => "Lewis Gilbert",
            'Nota Rottentomatoes' => "80",
        ],
        [
            'Título' => "MOONRAKER",
            'Año' => "1979",
            'James Bond' => "Roger Moore",
            'Director' => "Lewis Gilbert",
            'Nota Rottentomatoes' => "60",
        ],
        [
            'Título' => "FOR YOUR EYES ONLY",
            'Año' => "1981",
            'James Bond' => "Roger Moore",
            'Director' => "John Glen",
            'Nota Rottentomatoes' => "72",
        ],
        [
            'Título' => "OCTOPUSSY",
            'Año' => "1983",
            'James Bond' => "Roger Moore",
            'Director' => "John Glen",
            'Nota Rottentomatoes' => "43",
        ],
        [
            'Título' => "FOR YOUR EYES ONLY",
            'Año' => "1983",
            'James Bond' => "Sean Connery",
            'Director' => "Irvin Kershner",
            'Nota Rottentomatoes' => "70",
        ],
        [
            'Título' => "A VIEW TO KILL",
            'Año' => "1983",
            'James Bond' => "Roger Moore",
            'Director' => "John Glen",
            'Nota Rottentomatoes' => "38",
        ],
        [
            'Título' => "THE LIVING DAYLIGHTS",
            'Año' => "1987",
            'James Bond' => "Timothy Dalton",
            'Director' => "John Glen",
            'Nota Rottentomatoes' => "74",
        ],
        [
            'Título' => "A VIEW TO KILL",
            'Año' => "1989",
            'James Bond' => "Timothy Dalton",
            'Director' => "John Glen",
            'Nota Rottentomatoes' => "78",
        ],
        [
            'Título' => "GOLDENEYE",
            'Año' => "1995",
            'James Bond' => "Pierce Brosnan",
            'Director' => "Martin Campbell",
            'Nota Rottentomatoes' => "79",
        ],
        [
            'Título' => "TOMORROW NEVER DIES",
            'Año' => "1997",
            'James Bond' => "Pierce Brosnan",
            'Director' => "Roger Spottiswoode",
            'Nota Rottentomatoes' => "56",
        ],
        [
            'Título' => "THE WORLD IS NOT ENOUGH",
            'Año' => "1999",
            'James Bond' => "Pierce Brosnan",
            'Director' => "Michael Apted",
            'Nota Rottentomatoes' => "52",
        ],
        [
            'Título' => "DIE ANOTHER DAY",
            'Año' => "2002",
            'James Bond' => "Pierce Brosnan",
            'Director' => "Lee Tamahori",
            'Nota Rottentomatoes' => "56",
        ],
        [
            'Título' => "CASINO ROYALE",
            'Año' => "2006",
            'James Bond' => "Daniel Craig",
            'Director' => "Martin Campbell",
            'Nota Rottentomatoes' => "94",
        ],
        [
            'Título' => "QUANTUM OF SOLACE",
            'Año' => "2008",
            'James Bond' => "Daniel Craig",
            'Director' => "Marc Forster",
            'Nota Rottentomatoes' => "64",
        ],
        [
            'Título' => "SKYFALL",
            'Año' => "2012",
            'James Bond' => "Daniel Craig",
            'Director' => "Sam Mendes",
            'Nota Rottentomatoes' => "92",
        ],
        [
            'Título' => "SPECTRE",
            'Año' => "2015",
            'James Bond' => "Daniel Craig",
            'Director' => "Sam Mendes",
            'Nota Rottentomatoes' => "63",
        ],
        [
            'Título' => "NO TIME TO DIE",
            'Año' => "2021",
            'James Bond' => "Daniel Craig",
            'Director' => "Cary Joji Fukunaga",
            'Nota Rottentomatoes' => "84"
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
    <title>Listado de personajes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>
<body>
<h1>Listado de personajes</h1>
<p>
    <a href="index.php?action=Reiniciar" title="Reiniciar">
        Reiniciar sesión <br>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="1.2%">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
    </a>
    <br>
    <a href="index.php?action=Ordenar" title="Ordenar por fecha ascendente">
        Ordenar por fecha ascendente
    </a>
</p>
<ul class="cabecera">
    <li>Foto</li>
    <li>
        Título
        <a href="index.php?action=OrdenarDESC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>

        </a>
        <a href="index.php?action=OrdenarASC">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="7%">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </a>
    </li>
    <li>Año</li>
    <li>James Bond</li>
    <li>Director</li>
    <li>Nota</li>
</ul>
<?php foreach ($_SESSION['personajes'] as $key => $row){ ?>
    <ul>
        <li>
            <img src="imgsfamosos/<?php echo $row['Apellido']?>.jpg">
        </li>
        <li><?php echo $row['Título'] ?></li>
        <li><?php echo $row['Año'] ?></li>
        <li><?php echo $row['James Bond'] ?></li>
        <li><?php echo $row['Director'] ?></li>
        <li><?php echo $row['Nota Rottentomatoes'] ?></li>
        <li>
            <a href="ver.php?id=<?php echo $key ?>" title="Ver">
                <!--<span class="lnr lnr-eye"></span>-->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="10%">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>

            </a>
            <a href="editar.php?id=<?php echo $key ?>" title="Editar">
                <!--<span class="lnr lnr-pencil"></span>-->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="10%">
                    <path stroke-linecap="round" stroke-linejoin="round"  stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </a>
            <a href="index.php?action=borrar&id=<?php echo $key ?>" title="Borrar">
                <!--<span class="lnr lnr-trash"></span>-->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="10%">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </a>
        </li>
    </ul>
<?php } ?>

</body>
</html>