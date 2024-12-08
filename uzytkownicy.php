<?php
session_start();
$type = $_SESSION['type'];
if($type !== 'admin') {
    header('Location: /projekt/brakdostepu.html');
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'projekt';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()) {
    exit('Blad polaczenia z baza danych'.mysqli_connect_error());
}

$query = "SELECT * FROM users";
$result = $con->query($query);
?>

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
        canvas{
        pointer-events:none;
        }
        table {
            margin-top: 1%;
            margin-left: auto;
            margin-right: auto;
            text-align:center;
        }
    </style>
    <title>Usun post</title> 
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
        <table width="1000px" border="1px">
            <tr>
            <td>ID</td>
            <td>Nick</td>
            <td>Typ konta</td>
            </tr>
            <?php
                while ($row = $result->fetch_row()) {
                    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[4]."</td></tr>";
                }
            ?>
        </table>
        <form action="uzytkownicyp.php" method="post">
        <label for="id">ID:</label><br>
        <input type="number" id="id" name="id" placeholder = "Podaj ID" required><br>
        <input type="text" id="type" name="type" placeholder = "Podaj typ" required><br>
        <input type="submit" value="Zmień"><br>
        </form>
</body>
<footer> 
    <p>Oskar Matysik</p> 
</footer> 
</html>