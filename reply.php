<?php

require('init.php');

$id = $_POST['question_id'];

$data = getData($id);

$name = @$_POST['name'];
$reply = @$_POST['reply'];
$delete = @$_POST['delete'];

if ($name && $reply) {
  setcookie("user_name", $name , time()+60*60*24*365);
  array_unshift($data->replies, [
    'reply' => $reply,
    'name' => $name,
    'user_id' => $user_id,
    'created_at' => $time
  ]);
} else if ($delete) {
  $data->replies = array_values(
    array_filter($data->replies,
      function($reply) use ($user_id, $delete) {
        return !($reply->user_id == $user_id && $reply->created_at == $delete);
      }
    )
  );
} else {
  die("Mauvais arguments");
}

$data->updated_at = $time;

setData($id, $data);

header("Location: question.php?id=$id");
