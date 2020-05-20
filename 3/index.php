<?php

if (isset($_REQUEST["text"])) {
    $str = $_REQUEST["text"];
    obrText($str);
} else include "main.html";

function obrText($str)
{
    $array = array(0);
    $sort_array = array(0);
    $i = 0;
    $j = 0;
    $str = explode("\n", $str);

    foreach ($str as $value) {
        $array[$i] = $value;
        $i++;
        $array[$i] = explode(" ", $value);
        shuffle($array[$i]);
        $array[$i] = implode(" ", $array[$i]);
        $i++;
    }

    foreach ($array as $value) {
        $sort_array[$j] = explode(" ", $value);
        $j++;
    }

    uasort($sort_array, function ($s1, $s2) {
        return strcmp(($s1[1]), strtolower($s2[1]));
    });

    foreach ($sort_array as $value) {
        print implode(" ", $value) . "<br>";
    }

}
?>