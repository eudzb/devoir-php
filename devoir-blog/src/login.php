<?php
session_start();
include 'database.php';
include 'connexion.php';
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>monblog.com - Connexion</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
    include 'navbar.php';
    ?>

    <div class="registration">

      <?php if ($status === false) : ?>
      <span class="errorPassword">
        <?php echo 'Mauvais identifiant ou mot de passe !'; ?>
      </span>
      <?php endif ?>

       <form action="" method="post">
         <h2 class="registration-title">Connectez-vous !</h2>
         <input
            type="text"
            name="username"
            class="w3-input"
            placeholder="Pseudo"
            autocomplete="off"
            required>
         <input
            type="password"
            name="password"
            class="w3-input"
            placeholder="Mot de passe"
            required>

        <button type="submit" name="send">Connexion</button>
       </form>
       <div class="no-account">
         <a href="registration.php">
           Pas encore inscrit ?
         </a>
     </div>
     </div>
  </body>
</html>
