<?php

if (isset($_POST["send"])) {
    $name = (string)$_POST["name"];
    $info = (string)$_POST["info"];
    $text = fopen("info.txt", 'a');
    fwrite($text, $name." ");
    fwrite($text, $info."\n");
    fclose($text);
} else {
    include "web.html";
}