<?php

$id = $_POST['question_id'];
$content = @file_get_contents("database/$id.json");
$data = json_decode($content);

setcookie("user_name", $_POST['name'], time()+60*60*24*365);

$data->replies[] = [
  'reply' => $_POST['reply'],
  'name' => $_POST['name'],
  'user_id' => $_COOKIE["user_id"]
];

$data->updated_at = time();

file_put_contents("./database/$id.json", json_encode($data, JSON_PRETTY_PRINT));

header("Location: question.php?id=$id");
