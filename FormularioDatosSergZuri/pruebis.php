<form method="get" action="pruebis.php">
    <input type="text" name="contra"  placeholder="contraseña"/>
    <input type="number" name="num"  placeholder="número"/>
    <input type="text" name="contra"  placeholder="contraseña"/>

    <input type="submit" name="Enviar" />
</form>

<?php

$contra = filter_input(INPUT_GET, 'contra', FILTER_SANITIZE_STRING);


// Validate password strength
$mayus = preg_match('@[A-Z]@', $contra);
$minus = preg_match('@[a-z]@', $contra);
$num = preg_match('@[0-9]@', $contra);
$especial = preg_match('@[^\w]@', $contra);

if (isset($_GET['Enviar'])) {
    if (!$especial) {
        echo "La contraseña debe tener un caracter especial!";
    }
    if(!$mayus || !$minus){
        echo "<br>La contraseña debe tener MAYUS y MINUS!";
    }
    if(!$num){
        echo "<br>La contraseña debe tener almenos un número!";
    }
    if( strlen($contra) < 8 || strlen($contra) > 16){
        echo "<br>La contraseña debe tener entre 8 y 16 caracteres!";
    }
    else {
        echo 'Strong password.';
    }
}