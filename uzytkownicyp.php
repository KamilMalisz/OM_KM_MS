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
$type = $_POST['type'];

$query = "UPDATE users SET type = ? WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("ss", $type, $id);
$stmt->execute();
header('Location: /projekt/uzytkownicy.php');
?>