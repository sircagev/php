<?php
echo "EJERCICIO 1 \n";

$numeroLista = intval(readline("Ingrese la cantidad de números a promediar \n"));

$datosPromedio = [];
for ($i=1; $i <= $numeroLista ; $i++) { 
    $datosPromedio[$i-1] = floatval(readline("Ingrese el valor: $i \n"));
}

$sum = 0;
foreach($datosPromedio as $numero){
    $sum += $numero;
}

$promedio = $sum/$numeroLista;
echo $promedio;
echo "\n \n";

echo "EJERCICIO 2 \n";
echo "Números pares hasta 100 \n";
for ($i=1; $i <=100 ; $i++) { 
    if($i % 2 == 0){
        echo "$i ";
    }
}
echo "\n \n";

echo "EJERCICIO 3 \n";
$numFac = readline("Ingrese el número factorial: ");
$factorial = 1;
for ($i=1; $i <=$numFac ; $i++) { 
    $factorial *= $i;
}

echo "El factorial de $numFac es $factorial ";
echo "\n \n";

echo "EJERCICIO 4 \n";
$frase = readline("Ingresa una frase o palabra para saber si es palindromo ");
$fraseLimpia = str_replace(' ','',$frase);
$fraseInvertida = strrev($fraseLimpia);

if ($fraseLimpia == $fraseInvertida) {
    echo "La frase $frase es un palindromo";
}else{
    echo "La frase $frase no es un palindromo";
}
echo "\n \n";

echo "EJERCICIO 5 \n";
$num = intval(readline("Ingrese un número para saber si es primo "));
$prim = true;
for($i=2; $i <= $num ; $i++) { 
    if (($num%$i == 0)&&($num!=$i)) {
        $prim = false;
        break;
    }
}

if ($num <= 1 || $prim == false){
    echo "El número $num no es primo";
}
else{
    echo "El número $num es primo";
}
echo "\n \n";

echo "EJERCICIO 6 \n";
$numero = readline("Ingresa un número de mas de un digito ");
$numInv = strrev($numero);

echo "El número Invertido de $numero es $numInv ";
echo "\n \n";

echo "EJERCICIO 7 - 1\n";

$dI = readline("Escriba la cantidad de datos que va a ingresar: ");
$lista = [];
for ($i=1; $i <= $dI ; $i++) { 
    $lista[$i-1] = readline("Ingrese el valor $i: ");
}

$aBus = readline("Ingrese el dato que quiere encontrar: ");
for ($i=1; $i <= $dI ; $i++) { 
    if ($lista[$i-1] == $aBus) {
        echo "El elemento esta en la lista y se encuentra en la posición ".($i-1);
    }
}
echo "\n \n";

echo "EJERCICIO 7 - 2 \n";

$dI = intval(readline("Escriba la cantidad de datos que va a ingresar: "));
$lista = [];
for ($i=1; $i <= $dI ; $i++) { 
    $lista[$i-1] = readline("Ingrese el valor $i: ");
}
echo "\n";
$existe = false;
$posicion = 0;
$aBus = readline("Ingrese el dato que quiere encontrar: ");
for ($i=1; $i <= $dI ; $i++) { 
    if ($lista[$i-1] == $aBus) {
        $existe = true;
        $posicion = $i -1;
        break;
    }
}

if ($existe == true) {
    echo "El elemento esta en la lista y se encuentra en la posición $posicion";
}else{
    echo "El elemento no esta en la lista";
}
echo "\n \n";

echo "EJERCICIO 8 \n";
echo "Ingresa el rango de números donde quiere saber los números perfectos \n";
$min = intval(readline("Minimo: "));
$max = intval(readline("Maximo: "));

$suma = 0;

$numerosPerfectos = [];

for ($i=$min; $i <= $max ; $i++) { 
    for ($j=1; $j <= $i ; $j++) { 
        if($i % $j == 0 && $i != $j){
            $suma += $j;
        }
    }
    if($suma == $i){
        array_push($numerosPerfectos, $i);
    }
    $suma = 0;
}

echo "La siguiente es una lisa de números perfectos entre $min y $max: ";
for ($i=0; $i < count($numerosPerfectos); $i++) { 
    echo $numerosPerfectos[$i]." ";
}
echo "\n \n";

echo "EJERCICIO 9 \n";
$secuencia = intval(readline("Escriba hasta que número de la secuencia de fibonacci quiere saber \n"));

$numerosFibo = [0,1];

if ($secuencia < 1) {
    echo "ERROR, Intentelo de nuevo";
}elseif($secuencia == 1){
    echo "1 número de la secuencia Fibonacci es ".$numerosFibo[1]."\n";
}else{
    echo "1 número de la secuencia Fibonacci es ".$numerosFibo[1]."\n";
    for ($i=2; $i <= $secuencia ; $i++) { 
        $numerosFibo[$i] = $numerosFibo[$i-1] + $numerosFibo[$i-2];
        echo "$i número de la secuencia Fibonacci es ".$numerosFibo[$i]."\n";
    }
}
echo "\n \n";

echo "EJERCICIO 10 \n";
$listaaOrdenar = [];
$orden = 1;
$number = 0;
echo "Ingrese una lista de números (Cuando no ingrese más, por favor digite la palabra stop): \n";

while ($number != "stop") {
    $number = readline("Valor ".$orden++.": ");
    if ($number == "stop") {
        echo "La lista ha sido ingresada";
    }else{
        array_push($listaaOrdenar,$number);
    }
}

$temp = 0;
$cambios = 1;

while ($cambios != 0) {
    for ($i=1; $i < count($listaaOrdenar); $i++) { 
        if (($listaaOrdenar[$i-1] > $listaaOrdenar[$i])) {
            $temp = $listaaOrdenar[$i-1];
            $listaaOrdenar[$i-1] = $listaaOrdenar[$i];
            $listaaOrdenar[$i]= $temp;
            $cambios++;
        }
    }
    if($cambios > 1){
        $cambios = 1;
    }else{
        $cambios = 0;
    }
}
echo "\n";

echo "La lista ordenada es: ";
for ($i=0; $i < count($listaaOrdenar) ; $i++) { 
    echo $listaaOrdenar[$i]." ";
}

echo "\n";
?>