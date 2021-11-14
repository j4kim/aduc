<?php

$id = $_GET["id"];
$content = @file_get_contents("database/$id.json");

if (!($id && $content)) {
  header('Location: /');
}

$data = json_decode($content);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data->question ?></title>
</head>
<body>
  <h1><?= $data->question ?></h1>
</body>
</html>