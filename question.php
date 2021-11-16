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
</head>
<body>
  <form action="reply.php" method="post">
    <input type="hidden" name="question_id" value="<?= $data->question_id ?>">
    <?= $hasAlreadyReplied ? 'Vous avez déjà répondu' : '' ?>
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
          <th>
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
              <button id="send-btn" type="submit">Envoyer</button>
            </td>
          </tr>
        <?php } ?>
        <?php foreach ($data->replies as $reply) { ?>
          <tr>
            <td><?= $reply->name ?></td>
            <td>
              <?= $reply->reply ?>
              <?php if ($reply->user_id === $user_id) { ?>
                <button type="submit" name="delete" value="<?= $reply->created_at ?>">
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
</body>
</html>