<?php

include('includes/pdo.php');

$id = $_GET['id'];

//Suppression de l'image selectionée puis redirection
$sql = 'DELETE FROM `galleryContent` WHERE id = ?';
$query = $pdo->prepare($sql);
$query->execute([ $id ]);

header('Location: gallery.php');
exit;
