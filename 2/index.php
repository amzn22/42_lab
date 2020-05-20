<?php

replace();
function replace(){
require "main.html";
$str=$_REQUEST["text"];
$new_str="";
foreach ($gen = generator($str) as $value){
$new_str = $new_str.$value;
}
echo "Обработанный текст: ".$new_str;
echo " "."Число замен: ".$gen ->getReturn();
}
function generator($str){
    $replace=0;
    for($i=0; $i<strlen($str); $i++){
        switch ($str[$i]){
            case "h":
                $str[$i]="4";
                yield $str[$i];
                $replace++;
                break;
            case "l":
                $str[$i]="1";
                yield $str[$i];
                $replace++;
                break;
            case "e":
                $str[$i]="3";
                yield $str[$i];
                $replace++;
                break;
            case "o":
                $str[$i]="0";
                yield $str[$i];
                $replace++;
                break;

        }
    }
    return $replace;

}


?>
