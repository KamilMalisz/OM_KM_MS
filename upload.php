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
            max-width: 320px;
            border: 3px solid #333;
            background: #D6C7AE;
            margin-left: auto;
            margin-right: auto;
            text-align:center;
            margin-top: 12%;
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
    </style>
    <title>Upload</title> 
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
    <form onsubmit="return check();" action="uploadp.php" method="post" enctype="multipart/form-data">
        Wybierz plik do przeslania:
        <input type="file" name="file" id="file"><br>
        <input type="submit" value="Przeslij" name="submit"><br>
        <span id='message'></span>
      </form>
</body>
<footer> 
    <p>Oskar Matysik</p> 
</footer> 
<script type="text/javascript">
    var inputElement = document.getElementById("file");
    inputElement.addEventListener('change', function() {
        document.getElementById('message').style.color = '';
        document.getElementById('message').innerHTML = '';
    });
        
    function check() {
        var inputElement = document.getElementById("file");
        var fileLimit = 1000; 
        var files = inputElement.files; 
        var fileSize = files[0].size; 
        var fileSizeInKB = (fileSize/1024);

        if (fileSize>fileLimit) {
            return true;
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Plik jest zbyt duży!';
            return false;
        }
        }
</script>
</html>