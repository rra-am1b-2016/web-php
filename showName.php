<?php  
    // Maak contact met de databaseserver en database
    include("connect_db.php");
    
    // Check of het $_POST array niet leeg is
    if ( !empty($_POST))
    {
       // Maak een INSERT query en ....
       $sql = "INSERT INTO `users` (`id`,
                                    `firstname`,
                                    `infix`,
                                    `lastname`)
                VALUES              (NULL,
                                    '".$_POST["firstname"]."',
                                    '".$_POST["infix"]."',
                                    '".$_POST["lastname"]."')";    
        // verstuur deze naar de database.
        mysqli_query($conn, $sql);
    }
    
    // Maak een SELECT query voor het opvragen van alle records uit de tabel users
    $sql = "SELECT `id`, `firstname`, `infix`, `lastname` FROM `users`";

    // Verstuur deze query naar de database
    $result = mysqli_query($conn, $sql);

    // Maak de header van de tabel
    echo "<table>
            <tr>
                <th>id</th>
                <th>firstname</th>
                <th>infix</th>
                <th>lastname</th>
                <th></th>
            </tr>";
            // Vul de tabel met records....
            while ( $record = mysqli_fetch_array($result, MYSQLI_ASSOC) )
            {      
                    echo "<tr>
                                <td>".$record['id']."</td>
                                <td>".$record['firstname']."</td>
                                <td>".$record['infix']."</td>
                                <td>".$record['lastname']."</td> 
                                <td>
                                    <a href='   remove.php?id=".$record['id']."'>
                                        <img src='images/drop.png' alt='kruis'>
                                    </a>
                                </td>          
                        </tr>";
            } 
    echo "</table>";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>userinfo</title>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
    </head>
    <body>

    </body>
</html>