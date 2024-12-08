<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'projekt';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()) {
    exit('Blad polaczenia z baza danych'.mysqli_connect_error());
}

$query = "SELECT * FROM articles";
$result = $con->query($query);
?>

<!DOCTYPE html> 
<html lang="pl"> 
  
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content= 
        "width=device-width, initial-scale=1.0"> 
    <style> 
    body { 
        font-family: Arial, sans-serif; 
        margin: 0; 
        padding: 0; 
    } 

    header { 
        background-color: #ffffff; 
        color: #000000; 
        text-align: center; 
    } 

    nav { 
        background-color: #B3A492; 
        padding: 10px; 
    } 

    nav a { 
        color: #000000; 
        text-decoration: none; 
        padding: 10px; 
        margin-right: 10px; 
        display: inline-block; 
    } 

    .container { 
        display: flex; 
        justify-content: space-between; 
        max-width: 95%; 
        margin: 0 auto; 
        padding: 20px; 
    } 

    article p { 
        text-align: justify; 
    } 

    main { 
        flex: 2; 
    } 

    article { 
        margin-bottom: 20px; 
        padding: 10px 20px; 
        border: 1px solid rgb(145, 145, 145); 
        margin-right: 10px; 
    } 

    aside { 
        flex: 1; 
        background-color: #D6C7AE; 
        padding: 10px; 
    } 

    footer { 
        background-color: #B3A492; 
        color: #000000; 
        text-align: center; 
        position: fixed; 
        bottom: 0; 
        width: 100%; 
    } 
    a:link, a:visited {
        text-decoration: none;
    } 
    </style> 
    <title>Projekt</title> 
</head> 
  
<body> 
    <header> 
        <h1><a href="index.php">Projekt</a></h1>  
    </header> 
  
    <nav> 
        <a href="logowanie.html">Logowanie</a> 
        <a href="upload.php">Wgrywanie plików</a> 
        <a href="dodajpost.php">Dodawanie postów</a> 
        <a href="usunpost.php">Usuwanie postów</a> 
        <a href="uzytkownicy.php">Zarządzanie użytkownikami</a> 
        <a href="kontakt.html">Formularz kontaktowy</a> 
        <a href="logout.php">Wyloguj</a> 
    </nav> 
  
    <div class="container"> 
        <main> 
            <?php
                while ($row = $result->fetch_row()) {
                    echo "<article><h2>".$row[1]."</h2><p>".$row[2]."</p></article>";
                }
            ?>
        </main> 
  
        <aside> 
            <h2></h2> 
            <ul>           
            </ul> 
        </aside> 
    </div> 
  
    <footer> 
        <p>Oskar Matysik</p> 
    </footer> 
</body> 
</html>