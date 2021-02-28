<?php
$curl = curl_init();
$name = "Alena";
$info = "Hi";
$data = array("name" => $name, "info" => $info);
$user_agent = "user_agent: Chrome";
curl_setopt($curl, CURLOPT_URL, "http://127.0.0.1:8000");
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
curl_exec($curl);
curl_close($curl);