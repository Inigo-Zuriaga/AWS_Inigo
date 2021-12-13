<h1>TEXTO</h1>
<?php
session_start();
$palabras = "La Segunda Guerra Mundial fue un conflicto militar global que se desarrolló entre 1939 y 1945. En ella se vieron implicadas la mayor parte de las naciones del mundo, incluidas todas las grandes potencias, así como prácticamente todas las naciones europeas, agrupadas en dos alianzas militares enfrentadas: los aliados de la Segunda Guerra Mundial y las potencias del eje. Fue la mayor contienda bélica de la historia, con más de cien millones de militares movilizados y un estado de «guerra total» en que los grandes contendientes destinaron toda su capacidad económica, militar y científica al servicio del esfuerzo bélico, borrando la distinción entre recursos civiles y militares. Marcada por hechos de enorme repercusión que incluyeron la muerte masiva de civiles —el Holocausto, los bombardeos intensivos sobre ciudades y el uso, por única vez, de armas nucleares en un conflicto militar— la Segunda Guerra Mundial fue la más mortífera de la historia con un resultado de entre 50 y 70 millones de víctimas, el 2,5 % de la población mundial. El comienzo del conflicto se suele situar en el 1 de septiembre de 1939, con la invasión alemana de Polonia, cuando Hitler se decidió a la incorporación de una de sus reivindicaciones expansionistas más delicadas: el pasillo de Danzig, que implicaba la invasión de la mitad occidental de Polonia; la mitad oriental, junto con Estonia, Letonia y Lituania fue ocupada por la Unión Soviética, mientras que Finlandia logró mantener su independencia de los soviéticos (Guerra de Invierno). El Reino Unido y Francia le declararon la guerra a Alemania, que esperaban como una repetición de la guerra de trincheras (Guerra de broma) para la que habían tomado toda clase de precauciones (Línea Maginot) que demostraron ser del todo inútiles. Las maniobras espectaculares de la blitzkrieg (guerra relámpago) proporcionaron en pocos meses a Alemania el control de Noruega, Dinamarca, los Países Bajos, Bélgica y la propia Francia, mientras el ejército británico escapaba in extremis desde las playas de Dunkerque durante la batalla de Francia. La mayor parte del continente europeo estaba ocupado por el ejército alemán o por sus aliados, entre los que destacaba la Italia fascista, cuya aportación militar no fue muy significativa (batalla de los Alpes, guerra greco-italiana). La batalla de Inglaterra, la primera completamente aérea de la historia, mantuvo durante el periodo siguiente la presión sobre el nuevo gobierno de Winston Churchill, decidido a la resistencia (sangre, sudor y lágrimas) y que finalmente venció, entre otras cosas gracias a una innovación tecnológica (el RADAR) y al decisivo apoyo estadounidense, que negoció en varias entrevistas con Franklin D. Roosevelt (Carta del Atlántico, 14 de agosto de 1941).";
$_SESSION['todas']=[];
if (!isset($_SESSION['palabra'])) {
    $_SESSION['palabra'] = $palabras;
    //Convierto el número en un array de 10 dígitos
    $_SESSION['palabraexplode'] = explode(" ", $palabras);

    for ($i = 0; $i < strlen($_SESSION['palabra']); $i++) {
        echo $_SESSION['palabraexplode'][$i] . " ";

    }

}
if (isset($_GET['Envia'])) {
    $input = filter_input(INPUT_GET, 'texto', FILTER_SANITIZE_STRING);

    for ($i = 0; $i < strlen($_SESSION['palabra']); $i++) {
        if ($input == $_SESSION['palabraexplode'][$i]) {
            $bien = $_SESSION['palabraexplode'][$i];

            array_push($_SESSION['todas'],$_SESSION['palabraexplode'][$i] );

            ?> <a style="color: #F72E5A"><?php echo "" . $bien . " " ?> </a> <?php ;
            setcookie($bien, $bien, time() + 3600);  //1h
        } else {
            echo $_SESSION['palabraexplode'][$i] . " ";
        }
    }

}


if (isset($_GET['Vaciar'])) {

    foreach ($_SESSION['todas'] as $row) {
        echo $row;
        setcookie($row, "", -1);
    }

    session_destroy();
    header("Location:index1.php");
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
    <form method="get" action="index1.php">
        <input type="submit" name="Envia"/>
        <input type="text" name="texto">
    </form>
    <form action="index1.php" method="get">
        <input type="submit" name="Vaciar" value="Limpiar"/>
    </form>
    <title>Ejercicio1</title>
</head>
<body>

</body>
</html>