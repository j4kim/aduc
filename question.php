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
  <form action="reply.php" method="post">
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
        <?php foreach ($data->replies as $reply) { ?>
          <tr>
            <td><?= $reply->name ?></td>
            <td><?= $reply->reply ?></td>
          </tr>
        <?php } ?>
        <tr>
          <td>
            <input type="text" placeholder="Votre nom" name="name">
          </td>
          <td>
            <input type="text" placeholder="Votre réponse" name="reply">
            <button id="send-btn" type="submit">Envoyer</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
  <script>
    var form = document.querySelector('form')
    form.addEventListener("submit", function(e){
      if (!(this.name.value && this.reply.value)) {
        alert("Veuillez remplir votre nom et votre réponse")
        e.preventDefault()
      }
    });
  </script>
</body>
</html>