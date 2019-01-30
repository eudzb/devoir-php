<?php
if (isset($_POST['send'])) {
  $username = strip_tags($_POST['username']); // strip_tags supp les balises HTML et PHP d'une chaîne
  $password = sha1($_POST['password']); // hash le mdp
  $confirmedPassword = sha1($_POST['confirmedPassword']);

  if (isset($username) &&
      isset($password) &&
      isset($confirmedPassword)) {
        $query = 'INSERT INTO user(username, password)
                  VALUES(:username, :password)'; //requête préparée

        $statement = $pdo->prepare($query);

        $statement->bindParam(':username', $username); //permet de paramètrer les champs
        $statement->bindParam(':password', $password);

  }

  if ($password === $confirmedPassword) {
    $status = $statement->execute();
    $success = 'Votre compte a été crée avec succès !';
  } elseif ($password !== $confirmedPassword) {
    $status = false;
    $errorPassword = 'Les mots de passes ne correspondent pas !';
  }

}
