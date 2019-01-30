<?php
if(isset($_POST['okay'])) {
  $title = strip_tags($_POST['title']); // strip_tags supp les balises HTML et PHP d'une chaîne
  $content = strip_tags($_POST['content']);
  $author = $_SESSION['id'];

  if (isset($title) && isset($content)) {
    $query = 'INSERT INTO article(title, content, author)
              VALUES(:title, :content, :author)'; //requête préparée

    $statement = $pdo->prepare($query);
    $statement->bindParam(':title', $title);
    $statement->bindParam(':content', $content);
    $statement->bindParam(':author', $author);
    $status = $statement->execute();

  }
  $success = 'Vous pouvez dès à présent consulter votre article !';
}
