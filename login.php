<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'projekt';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()) {
    exit('Blad polaczenia z baza danych'.mysqli_connect_error());
}

if(!isset($_POST['email'], $_POST['password'])) {
    exit('Niektore pola sa puste');
}

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email=? limit 1";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);

if ($row) {
    if (password_verify($password, $row['password'])) {
        session_start();
        if($row["type"] == "user") {
            $_SESSION["type"] = "user";
            header('Location: /projekt/index.php');
        } elseif($row["type"] == "admin") {
            $_SESSION["type"] = "admin";
            header('Location: /projekt/index.php');
        } elseif($row["type"] == "autor") {
            $_SESSION["type"] = "autor";
            header('Location: /projekt/index.php');
        } else {
            echo 'Nieznany typ użytkownika!';
        }
    } else {
        echo 'Email lub haslo nieprawidlowe!';
    }
} else {
    echo 'Brak użytkownika o podanym adresie email!';
}
?>