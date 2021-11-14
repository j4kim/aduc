<?php

$time = time();

$user_id = @$_COOKIE["user_id"];

if (!$user_id) {
  $user_id = uniqid();
  setcookie("user_id", $user_id, time()+60*60*24*365);
}

function getData($id) {
  $content = @file_get_contents("database/$id.json");
  return json_decode($content);
}

function setData($id, $data) {
  file_put_contents("./database/$id.json", json_encode($data, JSON_PRETTY_PRINT));
}