<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'projekt';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()) {
    exit('Blad polaczenia z baza danych'.mysqli_connect_error());
}

if(!isset($_POST['tytul'], $_POST['tresc'])) {
    exit('Niektore pola sa puste');
}

$tytul = $_POST['tytul'];
$tresc = $_POST['tresc'];

$query = "INSERT INTO articles (title, content) VALUES (?, ?)";
$stmt = $con->prepare($query);
$stmt->bind_param("ss", $tytul, $tresc);
$stmt->execute();
header('Location: /projekt/index.php');
?>