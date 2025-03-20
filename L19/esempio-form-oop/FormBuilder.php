<?php

//la classe deve:
//Inizializzare un tag Form 
//Inserire al suo interno input su richiesta 
//Inserire al suo interno Select su richiesta. 
//Inserire al suo interno il bottone di invio del Form 
//Renderizzare il Form su richiesta 
class FormBuilder{

    private $action;
    private $method;

    private $innerHTML = '';

    private $availableInputAttributes = [
        "name",
        "type",
        "placeholder",
        "required"
    ];

    public function __construct(string $action = "", string $method = "") {
        $this->action = $action;
        $this->method = $method;
    }

    private function getAttributesString(array $attributeArr):string{
        $attributesString = '';

        foreach($attributeArr as $key => $value){
            $attributesString .= " $key=\"$value\" ";
        }

        return $attributesString;
    }

    public function addInputField(array $attributeArr): void{
        $attributesString = $this->getAttributesString($attributeArr);
        $this->innerHTML .= "<input $attributesString>";
    }

    public function addTextField(string $name, string $value = '', string $placeholder = ""){
        $valueAttribute = $value ? "value=\"$value\"" : "";
        $placeholderAttribute = $placeholder ? "placeholder=\"$placeholder\"" : "";
        $this->innerHTML = "<input type=\"text\" name=\"$name\" $valueAttribute $placeholderAttribute >";
    }

    public function render(): void{

        $action = $this->action ? "action=\"$this->action\"" : "";
        $method = $this->method ? "action=\"$this->method\"" : "";

        echo "<form $action $method>
                $this->innerHTML
              </form>";
    }

}