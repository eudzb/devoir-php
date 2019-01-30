<?php
session_start();
require 'database.php';

$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null == $id ) {
        header("Location: article.php");
    } else {

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'SELECT *
                  FROM user
                  INNER JOIN article ON user.id = article.author';

        $statement = $pdo->prepare($query);
        $statement->execute(array($id));
        $data = $statement->fetch(PDO::FETCH_ASSOC);
    }

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>monblog.com - Détails article</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/details.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
		 <div class="home">
       <h2 class="account-title">Détails de l'article </h2>
     </div>

     <div class="details">
       <h3><?php echo $data['title']; ?></h3>
     </div>
     <div class="details">
       <p><?php echo $data['content']; ?></p>
     </div>
     <div class="details">
       <span><?php echo $data['username']; ?></span>
     </div>

  </body>
</html>
