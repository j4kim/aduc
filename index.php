<?php

require('init.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aduc</title>
</head>
<body>
  <form action="create.php" method="post">
    <label for="question">Question</label>
    <input type="text" name="question" id="question">
    <button type="submit">
      Créer une question
    </button>
  </form>
</body>
</html>