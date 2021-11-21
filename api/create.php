<?php

require('init.php');

$id = id();

$data = [
  'question' => $_POST['question'],
  'user_id' => $user_id,
  'question_id' => $id,
  'created_at' => $time,
  'updated_at' => $time,
  'replies' => []
];

setData($id, $data);

echo json_encode($data);