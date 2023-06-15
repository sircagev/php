<?php

function repartirCartas(){
    $mazo =   ["As de Corazones","2 de Corazones","3 de Corazones","4 de Corazones","5 de Corazones","6 de Corazones","7 de Corazones","8 de Corazones","9 de Corazones","10 de Corazones","Jota de Corazones","Queen de Corazones","King de Corazones","As de Picas","2 de Picas","3 de Picas","4 de Picas","5 de Picas","6 de Picas","7 de Picas","8 de Picas","9 de Picas","10 de Picas","Jota de Picas","Queen de Picas","King de Picas","As de Diamanantes","2 de Diamanantes","3 de Diamanantes","4 de Diamanantes","5 de Diamanantes","6 de Diamanantes","7 de Diamanantes","8 de Diamanantes","9 de Diamanantes","10 de Diamanantes","Jota de Diamanantes","Queen de Diamanantes","King de Diamanantes","As de Tréboles","2 de Tréboles","3 de Tréboles","4 de Tréboles","5 de Tréboles","6 de Tréboles","7 de Tréboles","8 de Tréboles","9 de Tréboles","10 de Tréboles","Jota de Tréboles","Queen de Tréboles","King de Tréboles"];

    shuffle($mazo);

    $indicesMazo = array_rand($mazo,5);    

    for ($i=0; $i < 5; $i++) { 
        $manoJugador[$i] = $mazo[$indicesMazo[$i]];
    }

    return $manoJugador;

}

$manoJugador = repartirCartas();
echo "\n";

function mostrarCartas(array $array){
    for ($i=0; $i < 5 ; $i++) {
        echo $array[$i]."\n";
    }
}

mostrarCartas($manoJugador);
echo "\n";

function evaluarMano(array $array){

    for ($i=0; $i < count($array); $i++) {
        $separar = explode(" de ",$array[$i]);
        $nuevo1[$i] = $separar[0];
        $nuevo2[$i] = $separar[1];
    }

    $cantidadPalo = cantidad($nuevo2);
    $cantidadTarjetasIguales = cantidad($nuevo1);
    $escalera = validarEscalera($nuevo1);

    $escaleraReal = ["As","Queen","King","Jota","10"];

    if ($cantidadPalo == 1) {
        
        $esta = validarEscaleraReal($nuevo1);
        
        if ($esta) {
            echo "Escalera Real";
        }elseif($escalera){
            echo "Escalera de Color";
        }else{
            echo "Color";
        }
    }elseif($escalera){
        echo "Escalera";
    }elseif ($cantidadTarjetasIguales == 2) {
        
        $cantidad = array_unique($nuevo1);
        $contador = 0;

        for ($i=0; $i < count($cantidad)-1 ; $i++) { 
            
            for ($j=0; $j < count($nuevo1) ; $j++) { 
                if ($cantidad[$i] == $nuevo1[$j]) {
                    $contador += 1;
                }
            }
        }

        if($contador == 1 || $contador == 4){
            echo "poker";
        }else{
            echo "fullhouse";
        }
    }elseif ($cantidadTarjetasIguales == 3) {
        
        $cantidad = array_unique($nuevo1);
        $contador = 0;

        for ($i=0; $i < count($cantidad) ; $i++) { 
            
            for ($j=0; $j < count($nuevo1) ; $j++) { 
                if ($cantidad[$i] == $nuevo1[$j]) {
                    $contador += 1;
                }
            }

            if ($contador == 3 || $contador == 2) {
                $i = count($cantidad);
                
            }else{
                $contador = 0;
            }
        }

        if($contador == 3 ){
            echo "Trio";
        }else{
            echo "Dos pares ";
        }

    }elseif($cantidadTarjetasIguales == 4){
        echo "Par";
    }else{
        echo "Carta Alta";
    } 

    echo "\n";
}

function cantidad( array $separado){

    $cantidad = count(array_unique($separado));
    
    return $cantidad;
}

function validarEscaleraReal(array $escalera){
    /* for ($i = 0; $i < count($separado) ; $i++) { 
        if(!in_array($separado[$i],$escalera)){
            return false;
        }
    } */

    if(in_array("As",$escalera) && in_array("Jota",$escalera) && in_array("Queen",$escalera) && in_array("King",$escalera) && in_array("10",$escalera)){
        return true;
    }

    return false;
}

function validarEscalera(array $separado){

    for ($i=0; $i < count($separado) ; $i++) { 
        $separado[$i] = match($separado[$i]){
            'As' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5,
            '6' => 6,
            '7' => 7,
            '8' => 8,
            '9' => 9,
            '10' => 10,
            'Jota' => 11,
            'Queen' => 12,
            'King' => 13
        };
    }

    sort($separado);

    for ($i=0; $i < count($separado)-1; $i++) { 
        if($separado[$i] !== ($separado[$i+1]-1)){
            return false;
        }
    }

    return true;

}

evaluarMano($manoJugador);

?>