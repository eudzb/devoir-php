<?php
session_start();
require 'database.php';
include 'add-article.php';

if (isset($_SESSION['id'])) {
	$userId = $_SESSION['id'];
}

if (empty($userId)) {
	header('Location: login.php'); //redirige si le user n'est pas "réellement" connecté
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>monblog.com - Rédiger un article</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/article.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
    include 'navbar.php';
   	?>

	 	<div class="home">
      <h2 class="account-title">Rédiger un article </h2>
   	</div>

    <?php if ($status === true) : ?>
    <span class="successAccount">
      <?php echo $success; ?>
    </span>
    <?php endif ?>

    <div class="registration">

      <form action="create-article.php" method="post">
        <h2 class="registration-title">C'est à vous !</h2>
        <input
          type="text"
          name="title"
          placeholder="Titre"
          autocomplete="off"
          required>
        <textarea
          name="content"
          rows="8"
          cols="80"
          required
          maxlength="10000"
          placeholder="Écrivez ici...">
        </textarea>
        <button type="submit" name="okay">Ok !</button>
      </form>
    </div>

  </body>
</html>
