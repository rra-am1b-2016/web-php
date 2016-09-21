<?php
    echo "Het record met id=".$_GET["id"]." is succesvol verwijderd!";
    //var_dump($_GET);

    include("connect_db.php");
    
    $sql = "DELETE FROM `users` WHERE `id` = '".$_GET["id"]."'";

    //echo $sql;

    mysqli_query($conn, $sql);

    header("refresh: 3; url=showName.php");
?>