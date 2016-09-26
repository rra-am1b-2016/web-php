<?php
 // Maak contact met de mysql-server en database
 include("connect_db.php");

 // Maak een SELECT query om het record te selecteren
 $sql = "SELECT * FROM `users` WHERE `id` = '".$_GET["id"]."'";

 // Vuur de query af op de database..
 $result = mysqli_query($conn,$sql);

 // $result is van het type resource. 
 //Dit datatype is niet zomaar uit te lezen en te gebruiken. Kijk maar
 var_dump($result);

 // Met de onderstaande functie kunnen we een resource omzetten naar een array (associatief)
 $record = mysqli_fetch_array($result, MYSQLI_ASSOC);

 // Kijk maar....
 var_dump($record);
 //echo $sql; exit();

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel='stylesheet' style='text/css' href='./css/style.css'>
    </head>
    <body>
        <form action='' method=''>
            <table>

            </table>
        </form>
    </body>
</html>

