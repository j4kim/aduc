<?php

require('init.php');

$id = $_POST['question_id'];

$data = getData($id);

setcookie("user_name", $_POST['name'], time()+60*60*24*365);

$data->replies[] = [
  'reply' => $_POST['reply'],
  'name' => $_POST['name'],
  'user_id' => $user_id,
  'created_at' => $time
];

$data->updated_at = $time;

setData($id, $data);

header("Location: question.php?id=$id");
