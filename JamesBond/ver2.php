
<?php
    session_start();
$_SESSION['personajes2']=[];
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
        $personaje = $_SESSION['personajes'][$id];


        echo $_SESSION['personajes2']['Titulo'];

        array_push($_SESSION['personajes2'],

            [
                $_SESSION['id']=> [
                'Título' => $personaje['Título'],
                'Año' => $personaje['Año'],
                'James Bond' => $personaje['James Bond'],
                'Director' => $personaje['Director'],
                'Nota Rottentomatoes' => $personaje['Nota Rottentomatoes']
            ]
                    ]);
       echo $_SESSION['personajes2']['Titulo'];


        //echo $_SESSION['personajes2']['Titulo'];
        foreach ($_SESSION['personajes2'] as $key => $row) {


        ?><h1><u><?php echo $row['Título'] ." ". $row['Año'];?></h1></u></h1>

<br>
        <p><strong>Director: </strong><?php echo $row['Director'];?></p>
        <p><strong>Nota: </strong><?php echo $row['Nota Rottentomatoes'];?></p>
<br>
<?php } ?>

<?php


    }
    else{
        echo "No encuentro el personaje";
    }
?>
<br>
<a href="index.php" title="Volver">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="2%">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
    </svg>
</a>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
