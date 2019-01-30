<?php
require 'database.php';

$id = $_GET['id'];

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = 'DELETE FROM article  WHERE id = "$id"';
$statement = $pdo->prepare($query);
$statement->execute(array($id));
header('Location: account.php?id='.$_SESSION['id']);
