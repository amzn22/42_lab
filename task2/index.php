<?php
require "vendor/predis/predis/autoload.php";
Predis\Autoloader::register();

try {
    $redis = new Predis\Client(array(
        "scheme" => "tcp",
        "host" => "127.0.0.1",
        "port" => 6379
    ));
    if (isset($_POST["send"])) {

        $name = (string)$_POST["name"];
        $info = (string)$_POST["info"];
        $redis->rpush('names',$name);
        print "Name: ".$name."<br />";
        $redis->rpush('messages',$info);
        print "Message: ".$info;

    } else {
        include "page.html";
    }
    if (isset($_POST["send2"])) {
        $size = $redis->llen("messages");
        $names = $redis->lrange("names",0,-1);
        $messages = $redis->lrange("messages",0,-1);
        for($i=0;$i<$size;$i++){
            print("Name: ".$names[$i].". ");
            print("Message: ".$messages[$i].". <br />");
        }
    }
}
catch (Exception $e) {
    die($e->getMessage());
}


?>
