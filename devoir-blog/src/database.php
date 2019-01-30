<?php

try
{
	$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
