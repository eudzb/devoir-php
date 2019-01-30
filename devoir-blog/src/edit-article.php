<?php
session_start();
include 'database.php';
include 'edit.php';

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
    <title>monblog.com - Edition</title>
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

     <h3 class="article-title-page">Édition</h3>

     <div class="edit-article">
       <form action="" method="post">
         <label>Titre :</label>
         <input
          name="title"
          type="text"
					required
          value="<?php echo !empty($title)?$title:'';?>">
          <br>
          <label>Contenu :</label>
          <br>
         <textarea
          name="content"
          rows="8"
          cols="80"
					required
          value="<?php echo !empty($content)?$content:'';?>">
        </textarea>
        <br>
        <button type="submit" name="edit">Éditer</button>
       </form>
     </div>

     <!-- Sois indulgent pour les <br> stp j'ai plus de le temps pour le css haha  -->
  </body>
</html>
