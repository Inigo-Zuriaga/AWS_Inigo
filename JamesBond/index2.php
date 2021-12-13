<?php
//EDITAR

if (isset($_GET['Enviar1'])) {
    //PILLO LOS ATRIBUTOS ENVIADOS DESDE EDITAR.PHP
    $tituloedit = filter_input(INPUT_GET, 'Título', FILTER_SANITIZE_STRING);
    $JBedit = filter_input(INPUT_GET, 'JB', FILTER_SANITIZE_STRING);
    $anioedit = filter_input(INPUT_GET, 'Anio', FILTER_SANITIZE_STRING);
    $notaedit = filter_input(INPUT_GET, 'Nota', FILTER_SANITIZE_STRING);
    $directoredit = filter_input(INPUT_GET, 'Director', FILTER_SANITIZE_STRING);
    $id = $_GET['nid'];


            //ELIMINO EL ANTIGUO Y HAGO UN PUSH CON LA INFO ACTUALIZADA!
            //unset($_SESSION['personajes'][$id]);
            array_push($_SESSION['personajes2'],

                [
                    'Título' => $tituloedit,
                    'Año' => $anioedit,
                    'James Bond' => $JBedit,
                    'Director' => $directoredit,
                    'Nota Rottentomatoes' => $notaedit
                ]);
}

foreach ($_SESSION['personajes2'] as $key => $row) {

    echo $row['Titulo'];

}