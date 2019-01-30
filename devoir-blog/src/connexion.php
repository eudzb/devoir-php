<?php
session_start();

if (isset($_POST['send'])) {
  $username = strip_tags($_POST['username']);
  $password = sha1($_POST['password']);

  $query = 'SELECT *
            FROM user
            WHERE username = ? AND password = ?';

  $statement = $pdo->prepare($query);
  $statement->execute(array($username, $password));

  $userExist = $statement->rowCount();
  $status = $statement->execute();

  if ($userExist == 1) {
    $userInfo = $statement->fetch(); //Récupère la ligne suivante d'un jeu de résultats PDO
    $_SESSION['id'] = $userInfo['id'];
    $_SESSION['username'] = $userInfo['username'];
    header('Location: account.php?id='.$_SESSION['id']);
  }
  else {
    $status = false;
  }

  $statement->bindParam(':username', $username); // Lie un paramètre à un nom de variable spécifique
  $statement->bindParam(':password', $password);

}
