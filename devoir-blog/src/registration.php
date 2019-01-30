<?php
session_start();
include 'database.php';
include 'add-user.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>monblog.com - Inscription</title>
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

      <?php if ($status === true) : ?>
      <span class="successAccount">
        <?php echo $success ?>
      </span>

      <?php elseif ($status === false) : ?>
      <span class="errorPassword">
        <?php echo $errorPassword ?>
      </span>
      <?php endif ?>

      <form action="registration.php" method="post">
        <h2 class="registration-title">Inscrivez-vous !</h2>
        <input
          type="text"
          name="username"
          placeholder="Pseudo"
          autocomplete="off"
          required>
        <input
          type="password"
          name="password"
          placeholder="Mot de passe"
          required>
        <input
          type="password"
          name="confirmedPassword"
          placeholder="Veuillez confirmez le mot de passe"
          required>
        <button type="submit" name="send">Je m'inscris !</button>
      </form>
    </div>
  </body>
</html>
