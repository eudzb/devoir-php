<?php
session_start();
require 'database.php';

if (isset($_SESSION['id'])) {
	$userId = $_SESSION['id'];
}

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>monblog.com - Les articles</title>
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
      <h2 class="account-title">Les Articles </h2>
   	</div>

   	<h3 class="article-title-page">Le Top du moment</h3>

	 	<a href="create-article.php">
	 		<button type="button" class="write" name="write">Rédiger un article</button>
 	 	</a>

     <div class="articles-page">
      <ul class="article-ul-page">Titre</ul>
      <ul class="article-ul-page">Contenu</ul>
      <ul class="article-ul-page">Auteur</ul>
			<ul class="article-ul-page">Voir plus</ul>
      <ul class="article-ul-page">Commentaire</ul>

      <?php
      $query = 'SELECT title, content, username
                FROM article
                INNER JOIN user ON article.author = user.id';
      $statement = $pdo->prepare($query);
      $statement->execute();
      while ( $data = $statement->fetch(PDO::FETCH_ASSOC) ) { ?>

        <li class="article-title article-li-page">
          <?php
            echo $data['title'];
           ?>
        </li>
        <li class="article-contents-page article-li-page">
          <?php echo $data['content']; ?>
        </li>
        <li class="article-author-page article-li-page">
          <?php echo $data['username']; ?>
        </li>
        <a href="details.php?id=<?= $data['id'] ?>" target="_blank">
					<li class="article-show-page article-li-page">
          	<span class="glyphicon glyphicon-plus"></span>
        	</li>
				</a>
        <a href="details.php?id=<?= $data['id'] ?>">
					<li class="article-comment-page article-li-page">
          	<span class="glyphicon glyphicon-envelope"></span>
					</li>
				</a>

    <?php  } ?>

      <li></li>
    </div>

     </div>
  </body>
</html>
