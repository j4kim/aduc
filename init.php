<?php

function getData($id) {
  $content = @file_get_contents("database/$id.json");
  return json_decode($content);
}

function setData($id, $data) {
  file_put_contents("./database/$id.json", json_encode($data, JSON_PRETTY_PRINT));
}

function id() {
  return bin2hex(random_bytes(9));
}

$time = time();

$user_id = @$_COOKIE["user_id"];

if (!$user_id) {
  $user_id = id();
  setcookie("user_id", $user_id, $time+60*60*24*365);
}