<?php

require('init.php');

$data = getData($_POST['question_id']);

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
