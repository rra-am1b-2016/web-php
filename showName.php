<?php  
    // Maak contact met de databaseserver en database
    include("connect_db.php");
    include("functions.php");
    
    // Check of het $_POST array niet leeg is
    

    if ( !empty($_POST))
    {
        if (!isset($_POST["favouriteGames"]))
        {
            header("refresh:4; url=index.html");
            echo "U bent verplicht minimaal een game te selecteren als favoriet";
            exit();
        }
        //var_dump($_POST["favouriteGames"]);
        //echo $_POST["favouriteGames"]["Tomb raider"];

        $favouriteGames = serialize($_POST["favouriteGames"]);
        

        $firstname = sanitize($_POST['firstname']);
        $infix = sanitize($_POST['infix']);
        $lastname = sanitize($_POST['lastname']);   
        $password = sanitize($_POST['password']);
       
        
        
       
       // Maak een INSERT query en ....
       $sql = "INSERT INTO `users` (`id`,
                                    `firstname`,
                                    `infix`,
                                    `lastname`,
                                    `password`,
                                    `favouriteGames`)
                VALUES              (NULL,
                                    '".$firstname."',
                                    '".$infix."',
                                    '".$lastname."',
                                    '".$password."',
                                    '".$favouriteGames."')";    
        // verstuur deze naar de database.
        //echo $sql;

        mysqli_query($conn, $sql);
        
    }
    
    // Maak een SELECT query voor het opvragen van alle records uit de tabel users
    $sql = "SELECT `id`, `firstname`, `infix`, `lastname`, `password`, `favouriteGames` FROM `users`";

    // Verstuur deze query naar de database
    $result = mysqli_query($conn, $sql);

    // Maak de header van de tabel
    $table = "";    
    $table .= "<table id='tbl_1'>
                <tr>
                    <th>id</th>
                    <th>firstname</th>
                    <th>infix</th>
                    <th>lastname</th>
                    <th>password</th>
                    <th>favourite Games</th>
                    <th></th>
                    <th></th>
                </tr>";
                // Vul de tabel met records....
                while ( $record = mysqli_fetch_array($result, MYSQLI_ASSOC) )
                {      
                        //var_dump($record["favouriteGames"]);
                        $favouriteGames = unserialize($record["favouriteGames"]);
                        //var_dump($favouriteGames);
                        $favouriteGames = implode(", ", $favouriteGames);
                        
                        $table .= "<tr>
                                        <td>".$record['id']."</td>
                                        <td>".$record['firstname']."</td>
                                        <td>".$record['infix']."</td>
                                        <td>".$record['lastname']."</td> 
                                        <td>".$record['password']."</td>
                                        <td>".$favouriteGames."</td> 
                                        <td>
                                            <a href='remove.php?id=".$record['id']."'>
                                                <img src='images/drop.png' alt='kruis'>
                                            </a>
                                        </td> 
                                        <td>
                                            <a href='update.php?id=".$record['id']."'>
                                                <img src='./images/edit.png' alt='update,potlood,enz..'>
                                            </a>
                                        </td>         
                                   </tr>";
                } 
    $table .= "</table>";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>userinfo</title>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
        <link rel='stylesheet' type='text/css' href='css/style_index.css'>
    </head>
    <body>
        <?php 
            echo $table;
        ?>
        Klik <a href='index.html'>hier</a> voor teruggaan naar formulier
        
    </body>
</html>