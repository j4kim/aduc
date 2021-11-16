<?php

require('init.php');

$data = getData($_GET["id"]);

$hasAlreadyReplied = false;

foreach($data->replies as $reply) {
  if ($reply->user_id === $user_id) {
    $hasAlreadyReplied = true;
    break;
  }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data->question ?></title>
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
  <style>
    table input, table button {
      margin-bottom: 0 !important;
    }
    table button[name=delete] {
      width: auto;
      padding-top: 2px;
      padding-bottom: 4px;
    }
  </style>
</head>
<body>
<main class="container">
  <form action="reply.php" method="post">
    <input type="hidden" name="question_id" value="<?= $data->question_id ?>">
    <?= $hasAlreadyReplied ? '<small>Vous avez déjà répondu</small>' : '' ?>
    <table>
      <thead>
        <tr>
          <th>
            <?=
              count($data->replies) > 1 ?
                count($data->replies) . " participants" :
                count($data->replies) . " participant"
            ?>
          </th>
          <th colspan="2">
            <?= $data->question ?>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php if (!$hasAlreadyReplied) { ?>
          <tr>
            <td>
              <input
                type="text"
                placeholder="Votre nom"
                name="name"
                value="<?= @$_COOKIE['user_name'] ?>"
              >
            </td>
            <td>
              <input type="text" placeholder="Votre réponse" name="reply">
            </td>
            <td>
              <button id="send-btn" type="submit">Envoyer</button>
            </td>
          </tr>
        <?php } ?>
        <?php foreach ($data->replies as $reply) { ?>
          <tr>
            <td><?= $reply->name ?></td>
            <td>
              <?= $reply->reply ?>
            </td>
            <td>
              <?php if ($reply->user_id === $user_id) { ?>
                <button
                  class="secondary outline"
                  type="submit"
                  name="delete"
                  value="<?= $reply->created_at ?>"
                >
                  x
                </button>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </form>
  <script>
    var form = document.querySelector('form')
    form.addEventListener("submit", function(e){
      var deleting = this.delete && this.delete.value
      var inserting = this.name.value && this.reply.value
      if (!(deleting || inserting)) {
        alert("Veuillez remplir votre nom et votre réponse")
        e.preventDefault()
      }
    });
  </script>
</main>
</body>
</html>