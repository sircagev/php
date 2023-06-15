<?php

echo "EJERCICIO 1 \n";
function esPalindromo(string $texto){
    
    $textoLimpio = str_replace(' ','',$texto);
    $textoInvertido = strrev($textoLimpio);

    if ($textoLimpio == $textoInvertido) {
    echo "true";
    }else{
    echo "false";
    }
}

$frase = readline("Ingresa una frase o palabra para saber si es palindromo ");
esPalindromo($frase);
echo "\n \n";

echo "EJERCICIO 2 \n";
function generarFibonacci(int $val){
    
    $numerosFibo = [0,1];

    if ($val < 1) {
        echo "ERROR, Intentelo de nuevo";
    }elseif($val == 1){
        echo "1 número de la secuencia Fibonacci es ".$numerosFibo[0]."\n";
    }else{
        echo "número 1 de la secuencia Fibonacci es ".$numerosFibo[0]."\n";
        echo "número 2 de la secuencia Fibonacci es ".$numerosFibo[1]."\n";
        for ($i=2; $i < $val ; $i++) { 
            $numerosFibo[$i] = $numerosFibo[$i-1] + $numerosFibo[$i-2];
            echo "Número ".($i+1)." de la secuencia Fibonacci es ".$numerosFibo[$i]."\n";
        }
    }
}

$secuencia = intval(readline("Escriba hasta que número de la secuencia de fibonacci quiere saber \n"));
generarFibonacci($secuencia);
echo "\n \n";

echo "EJERCICIO 3 \n";

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

function ordenarArray(array $numeros){
    $temp = 0;
    $cambios = 1;

    while ($cambios != 0) {
        for ($i=1; $i < count($numeros); $i++) { 
            if (($numeros[$i-1] > $numeros[$i])) {
                $temp = $numeros[$i-1];
                $numeros[$i-1] = $numeros[$i];
                $numeros[$i]= $temp;
                $cambios++;
            }
        }
        if($cambios > 1){
            $cambios = 1;
        }else{
            $cambios = 0;
        }
    }

    echo "La lista ordenada es: ";
    for ($i=0; $i < count($numeros) ; $i++) { 
        echo $numeros[$i]." ";
    }
}

ordenarArray($listaaOrdenar);
echo "\n \n";

echo "EJERCICIO 4 \n";

$array = [];

function sumaDigitos(int $numero){
    $array = str_split($numero);
    $suma = 0;

    for ($i=0; $i < count($array); $i++) { 
        $suma += $array[$i];
    }
    echo "La suma de los digitos es $suma";
}

$numIngr = intval(readline("Ingresa un numero de 2 digitos o más: ")) ;
sumaDigitos($numIngr);
echo "\n \n";

echo "EJERCICIO 5 \n";

function fierroALV(){

    for ($i=1; $i <= 100; $i++) { 
        if (($i % 3 == 0) && ($i%5 == 0)) {
            echo "PesoPluma ";
        }elseif($i %  3== 0){
            echo "Peso ";
        }elseif($i % 5 == 0){
            echo "Pluma ";
        }else{
            echo "$i ";
        }
    } 
}

fierroALV();


?>