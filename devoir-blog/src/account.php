<?php
session_start();
include 'database.php';

if (isset($_SESSION['id'])) {
	$userId = $_SESSION['id'];
	$userName = $_SESSION['username'];
}

if (empty($userId)) {
	header('Location: login.php'); //redirige si le user n'est pas "réellement" connecté
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>monblog.com - Mon profil</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
    include 'navbar.php';
     ?>
     <div class="home">
       <h2 class="account-title">Mon profil </h2>
     </div>

     <h3 class="article-title-page">Mes articles</h3>

     <div class="articles">
      <ul class="article-ul">Titre</ul>
      <ul class="article-ul">Contenu</ul>
      <ul class="article-ul">Voir plus</ul>
      <ul class="article-ul">Éditer</ul>
      <ul class="article-ul">Supprimer</ul>

      <?php

			$query = "SELECT title, content
                FROM article
								INNER JOIN user ON article.author = user.id
								WHERE user.username = '$userName'";
      $statement = $pdo->prepare($query);
      $statement->execute();
      while ( $data = $statement->fetch(PDO::FETCH_ASSOC) ) { ?>

        <li class="article-title article-li">
          <?php
            echo $data['title'];
           ?>
        </li>
        <li class="article-contents article-li">
          <?php echo $data['content']; ?>
        </li>
				<a href="details.php?=<?= $data['id'] ?>" target="_blank">
        	<li class="article-show article-li">
          	<span class="glyphicon glyphicon-plus"></span>
        	</li>
				</a>
				<a href="edit-article.php?=<?= $data['id'] ?>">
	        <li class="article-edit article-li">
	          <span class="glyphicon glyphicon-pencil"></span>
	        </li>
				</a>
				<a href="delete.php?=<?= $data['id'] ?>">
	        <li class="article-delete article-li">
	          <span class="glyphicon glyphicon-trash"></span>
	        </li>
				</a>
    <?php  } ?>

      <li></li>
    </div>

     </div>
  </body>
</html>
