<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'projekt';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()) {
    exit('Blad polaczenia z baza danych'.mysqli_connect_error());
}

$id = $_POST['id'];

$query = "DELETE FROM articles WHERE ID=?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();
header('Location: /projekt/usunpost.php');
?>
