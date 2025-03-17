<?php
//Define consente anche l'utilizzo di array. 
//Puoi utilizzarlo a livello globale
define('COSTANTE_ARRAY',[]);
define('COSTANTE_NUMERO',1);
define('COSTANTE_STRINGA','Ciao Mondo!');

function provaDefine(){
    // All'interno di una funzione non puoi usare const ma è consentito adoperare define. 
    //Se all'interno della funzione adopererai una costante, puoi crearla quindi con define

    define('COSTANTE_LOCALE_NELLA_FUNZIONE','Valore');
}

//Punto anche const è utilizzabile a livello globale. 
const COSTANTE_CONST_NUMERO = 2;
const COSTANTE_CONST_STRING = 'Hello World!';

class TestCostanti{

    // All'interno di una classe non posso adoperare define perché è una funzione, userò invece const 
    public const COSTANTE_INTERNA_ALLA_CLASSE = 0;

}

//Tra le varie cose posso accedere alla costante interna della classe come se fosse una proprietà statica 
echo TestCostanti::COSTANTE_INTERNA_ALLA_CLASSE;