<?php

$id = uniqid();

$data = [
  'question' => $_POST['question'],
  'user_id' => $_COOKIE['user_id'],
  'question_id' => $id,
  'time' => time(),
];

file_put_contents("./database/$id.json", json_encode($data, JSON_PRETTY_PRINT));

header("Location: question.php?id=$id");
