<?php
session_start();
$type = $_SESSION['type'];
if($type !== 'autor' && $type !== 'admin') {
    header('Location: /projekt/brakdostepu.html');
}
?>

<!DOCTYPE html>
<html lang="pl"> 
    
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content= 
        "width=device-width, initial-scale=1.0"> 
    <style type="text/css">
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
        }
        form {
            max-width: 1500px;
            max-height: 900px;
            border: 3px solid #333;
            background: #D6C7AE;
            margin-left: auto;
            margin-right: auto;
            text-align:center;
            margin-top: 1%;
            
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
        textarea {
            resize: none;
        }
    </style>
    <title>Dodaj post</title> 
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
    <form action="dodajpostp.php" method="post">
        <label for="email">Tytuł</label><br>
        <input type="text" id="tytul" name="tytul" placeholder = "Tytuł" required><br>
        <label for="tresc">Treść</label><br>
        <textarea id="tresc" name="tresc" rows="43" cols="150" placeholder = "Treść" required></textarea><br>
        <input type="submit" value="Dodaj post">
    </form>
</body>
<footer> 
    <p>Oskar Matysik</p> 
</footer> 
</html> 