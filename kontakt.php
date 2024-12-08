<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'projekt';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()) {
    exit('Blad polaczenia z baza danych'.mysqli_connect_error());
}

if(!isset($_POST['email'], $_POST['tresc'])) {
    exit('Niektore pola sa puste');
}

$email = $_POST['email'];
$tresc = $_POST['tresc'];

$query = "INSERT INTO contact (email, content) VALUES (?, ?)";
$stmt = $con->prepare($query);
$stmt->bind_param("ss", $email, $tresc);
$stmt->execute();
header('Location: /projekt/index.php');
?>