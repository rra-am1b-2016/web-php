<?php
    // Maak contact met de databaseserver en database
    include("connect_db.php");
    
    /* Maak een DELETE query die op basis van een id (meegegeven d.m.v. $_GET) een 
     * record verwijderd */
    $sql = "DELETE FROM `users` WHERE `id` = '".$_GET["id"]."'";

    // Verstuur de query naar de database
    mysqli_query($conn, $sql);

    // Ga naar de pagina showName.php zonder te wachten.
    header("location: showName.php");
?>