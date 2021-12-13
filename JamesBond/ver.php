
<?php
    session_start();
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $personaje = $_SESSION['personajes'][$id];
        ?><h1><u><?php echo $personaje['Título'] ." - ". $personaje['Año'];?></h1></u></h1>
        <br>
        <!--DENTRO DEL DIV-CONTAINER ESTA EL POSTER DE LA PELI. DENTRO DEL OVERLAY ESTA LO QUE ESTA DEBAJO DEL POSTER,
        AL HACER HOVER DESAPARECE Y SE MUESTRA LO DE ATRAS-->
        <div class="container">

            <img id="titulo" src="img/<?php echo $personaje['Título']?>.jpg" style="width: 80%" class="image">
            <div class="overlay">

                <h1 class="text"><?php echo $personaje['James Bond'];?><br> is James Bond</h1></div>
            </div>
        </div><br><br>
        <p><strong>Director: </strong><?php echo $personaje['Director'];?></p>
        <p><strong>Nota: </strong><?php echo $personaje['Nota Rottentomatoes'];?></p>

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
<style>
    html{
        background: black;
        color: white;
        text-align: center;
        font-family: 'Black Ops One', cursive;


    }
    .container {
        margin-left: 38%;
        justify-content: center;
        position: relative;
        width: 24%;


    }

    #titulo{

    }



    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        justify-content: center;
        transition: 0.5s;
        background-size: cover;
        background: no-repeat center url("img/<?php echo $personaje['James Bond']?>.jpg");
        background size: contain;

    }


    .container:hover .overlay {
        opacity: 1;
        transition: 1.5s ;
    }
    .container:hover #titulo {
        opacity: 0;
        transition: 1.5s ;
        transform: rotate(360deg);

    }


    .text {
        color: #ffffff;
        -webkit-text-stroke: 1px black; /*contorno*/
        font-size: 40px;
        text-align: center;
        padding-top: 80%;



    }
</style>