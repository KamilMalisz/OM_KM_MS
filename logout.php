<?php
session_start();
session_destroy();
header('Location: /projekt/index.php');
?>