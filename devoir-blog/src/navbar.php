<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header navbar-brand">
          <span class="title-site">monblog.com</span>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>
            Accueil
          </a></li>
          <li><a href="article.php"><span class="glyphicon glyphicon-list-alt"></span>
            Articles
          </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

          <?php if(isset($_SESSION['username'])) : ?>

            <li><a href="account.php?id=<?= $_SESSION['id'] ?>">
              <span class="glyphicon glyphicon-user"></span>
              <?php echo $_SESSION['username']; ?>
            </a></li>
            <li><a href="deconnexion.php"><span class="glyphicon glyphicon-off"></span>
              Déconnexion
            </a></li>

          <?php else : ?>

            <li><a href="registration.php">
              <span class="glyphicon glyphicon-user"></span>
              <?php echo 'Inscription'; ?>
            </a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>
              Connexion
            </a></li>

          <?php endif ?>

        </ul>
      </div>
    </nav>
  </body>
</html>
