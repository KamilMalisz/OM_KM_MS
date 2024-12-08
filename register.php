<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'projekt';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()) {
    exit('Blad polaczenia z baza danych'.mysqli_connect_error());
}

if(!isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    exit('Niektore pola sa puste');
}

if($stmt = $con->prepare('SELECT id, password from users WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows>0) {
        echo 'Uzytkownik juz istnieje!';
    } else {
        if($stmt = $con->prepare('INSERT INTO users (username, password, email, type) VALUES (?, ?, ?, ?)')) {
            $type = "user";
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $type);
            $stmt->execute();
        }
        else {
            echo 'Wystapil blad';
        }
    }
    $stmt->close();
    header('Location: /projekt/logowanie.html');
    exit;
} else {
    echo 'Wystapil blad';
}
$con->close();
?>
