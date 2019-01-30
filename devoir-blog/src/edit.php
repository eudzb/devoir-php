<?php
session_start();
require 'database.php';

$id = null;
if ( !empty($_POST['id'])) {
    $id = $_REQUEST['id'];
} else {
  echo "no";
}

if ( null==$id ) {
    header('Location: account.php?id='.$_SESSION['id']);
}

if ( !empty($_POST['edit'])) {
    $title = null;
    $content = null;

    $title = $_POST['title'];
    $content = $_POST['content'];

    $valid = true;

    if ($valid) {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "UPDATE article  set title = ?, content = ? WHERE id = ?";
        $statement = $pdo->prepare($query);
        $statement->execute(array($title,$content,$id));
        header('Location: account.php?id='.$_SESSION['id']);
    }
} else {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM article where id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute(array($id));
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    $title = $data['title'];
    $content = $data['content'];
}
