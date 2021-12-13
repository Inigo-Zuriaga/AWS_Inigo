<?php
//Array palabras con tilde
$palabrasArray = array(1 => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in urna lacinia, pharetra magna at, vestibulum odio. Fusce nulla tellus, cursus ac semper nec, aliquet accumsan ex. Cras lorem tellus, dignissim nec mauris molestie, faucibus porta ligula. Nulla lacinia enim id cursus dictum. Sed eu rutrum elit, vitae interdum diam. Duis consectetur, purus sed eleifend consequat, lacus ante facilisis risus, ac venenatis neque orci at sem. Sed eleifend scelerisque tincidunt. Sed volutpat ex vehicula fermentum venenatis. Donec vel mollis nunc. Sed aliquam orci et tristique ornare. Ut sem purus, lobortis eget molestie eget, semper tincidunt ipsum. Fusce fermentum lectus ut sem faucibus, sit amet luctus nibh elementum. Curabitur volutpat malesuada tristique. Nunc quis quam sit amet dui porttitor ultrices. Nunc id ex ac diam tristique rhoncus at interdum nisl. Fusce consequat risus dolor, vel condimentum elit porta at. Nullam quis nunc maximus purus feugiat placerat non non lorem. Phasellus cursus risus orci, at sagittis turpis dignissim at. Donec ut nisi tempus urna fermentum aliquet ac ut diam. Morbi placerat tempor mi, id faucibus libero. Morbi tempor et nibh a suscipit. Vivamus ut ante non tellus cursus hendrerit. Cras scelerisque, nisl vel sagittis tempor, lorem odio sodales arcu, lacinia gravida augue quam eu elit. Praesent velit ex, mollis sed nisl sit amet, suscipit cursus ante. Pellentesque non libero vitae nibh ullamcorper suscipit. Integer eleifend tristique tristique. Integer nec ultrices nisl. Integer non aliquet dolor. Suspendisse sem purus, tristique eget lacinia nec, condimentum vitae nisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut placerat luctus elit egestas pellentesque. Quisque quam lacus, lobortis nec lacus eu, malesuada rutrum lacus');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Palabra Larga</title>
</head>
<body>
<h1>Palabra Larga</h1>
<?php
//Inicio la sesión
session_start();
//Botón de reiniciar
if (isset($_GET['reiniciar'])) {
    session_destroy();
    session_start();
    setcookie("letra","",-1);
    header("Location: index.php");
}
if (!isset($_SESSION['palabra'])){
    $_SESSION['palabra'] = $palabrasArray[1];
    //Convierto el número en un array de 10 dígitos
    $_SESSION['original'] = explode(" ",$palabrasArray[1]);

    //Genero el array de asteriscos
    $_SESSION['resuelto'] = [];
    for ($i = 0; $i < strlen($_SESSION['palabra']); $i++){
    $_SESSION['resuelto'][] ="-";
        }
}
//Recojo la palabra del formulario
if (isset($_GET['letra'])){
    //Booleano para ver si hay error
    $acierto = false;
    //Recorro el array de la palabra original
    foreach ($_SESSION['original'] as $indice => $valor){

        //Si coinciden el valor y la letra introducida
        if ($valor == $_GET['letra']){
            //Asigno el valor de ese índice al array de guiones
            $_SESSION['resuelto'][$indice] = $valor;
            setcookie("letra", $_GET['letra'], time() + 86400);
            //No hay error
            $acierto = true;
        }
    }
}
?>
<form name="formulario">
    <!--BOTON DE REINICIAR EL JUEGO-->
    <form><input type="submit" name="reiniciar" value="Reiniciar"></form>
    <p> <?php echo implode("", $_SESSION['resuelto']) ?></a></p>

</form>
<?php
//Comprobacion de que es array todavia no ha sido resuelto
//if (in_array("-",$_SESSION['resuelto'])){ ?>
<form name="enviar">
    <p>
        <label class="escribe">Escribe una palabra:</label>
        <input type="text" class="cuadroEscribe" id="letra" name="letra" size="4">
        <input type="submit" name="enviar">
    </p>
</form>
<?php
//Inicializo el valor de búsqueda
if (isset($_COOKIE['letra']) && $_COOKIE['letra']){
    $_SESSION['letra'] = $_COOKIE['letra'];
    header("Location:index.php");
}
else{
    $_SESSION['letra'] = "";
    //}
} ?>
</form>
</body>
</html>