<?php
    // Stop de naam van databaseserver in de variabele $servername
    $servername = "localhost";
    
    // Stop de naam van de gebruiker met rechten op de database in de variabele $servername    
    $username = "root";

    // Sop het password van de bovenstaande gebruiker in de variabele $password
    $password = "";

    // Geef de naam van de database en stop deze in de variabele $dbname
    $dbname = "am1b_2016_loginregistration";    

    /* Maak verbinding met de mysql-databaseserver met de functie mysqli_connect(), gebruik
       bovenstaande variabelen als parameters */
    $conn = mysqli_connect($servername, $username, $password, $dbname);
?>