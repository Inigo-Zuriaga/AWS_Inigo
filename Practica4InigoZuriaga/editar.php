
    <?php
    session_start();
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $personaje = $_SESSION['personajes'][$id];
        ?><h1 xmlns="http://www.w3.org/1999/html"><?php echo $personaje['Título'] ." - ". $personaje['James Bond'];?></h1><br>

        <?php


    }
    else{
        echo "Error";
    }

    ?>
    <br>


    <form method="get" action="index.php">
        <label><strong>ID:</strong></label><br>
         <input type="text" name="nid"  value="<?php echo $_GET['id']?>"/>
    <input type="text" style="width: 15%" name="Título" value="<?php echo $personaje['Título']?>"/>
    <input type="text"  name="JB" value="<?php echo $personaje['James Bond']?>"/>
        <input type="text"  name="Director" value="<?php echo $personaje['Director']?>"/>
    <input type="number" name="Nota" value="<?php echo $personaje['Nota Rottentomatoes'] ?>"/>
    <input type="number" name="Anio" value="<?php echo $personaje['Año'] ?>"/>

    <input type="submit" name="Enviar" />

    </form>
    <a href="index.php" title="Volver">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="2%">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
    </svg>
    </a>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">

<style>
    html{
        font-family: 'Black Ops One', cursive;
    }
</style>