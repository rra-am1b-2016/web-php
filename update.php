<?php
 // Maak contact met de mysql-server en database
 include("connect_db.php");
 include("functions.php");

 if ( isset($_POST['submit']))
 {
     var_dump($_POST);

     $id = sanitize($_POST['id']);
     $firstname = sanitize($_POST['firstname']);
     $infix = sanitize($_POST['infix']);
     $lastname = sanitize($_POST['lastname']);
     $password = sanitize($_POST['password']);

     $favouriteGames = serialize($_POST["favouriteGames"]);
     // Maak een update query..
     $sql = "UPDATE `users` 
             SET `firstname` = '".$firstname."',
                 `infix` = '".$infix."',
                 `lastname` = '".$lastname."',
                 `password` = '".$password."',
                 `favouriteGames` = '".$favouriteGames."'
             WHERE `id` = ".$id.";";
    
    // Verstuur de query naar de databases via de verbinding in $conn
    mysqli_query($conn, $sql);

    // Je wordt automatisch doorgestuurd naar de pagina showName.php
    header("location: showName.php");
 }
 else
 {
     
 // Maak een SELECT query om het record te selecteren
 $sql = "SELECT * FROM `users` WHERE `id` = '".$_GET["id"]."'";

 // Vuur de query af op de database..
 $result = mysqli_query($conn,$sql);

 // $result is van het type resource. 
 //Dit datatype is niet zomaar uit te lezen en te gebruiken. Kijk maar
 //var_dump($result);

 // Met de onderstaande functie kunnen we een resource omzetten naar een array (associatief)
 $record = mysqli_fetch_array($result, MYSQLI_ASSOC);

 $id = htmlentities($record["id"], ENT_QUOTES);
 $firstname = htmlentities($record["firstname"], ENT_QUOTES);
 $infix = htmlentities($record["infix"], ENT_QUOTES);
 $lastname = htmlentities($record["lastname"], ENT_QUOTES);
 $password = htmlentities($record["password"], ENT_QUOTES);

 //var_dump($record["favouriteGames"]);
 $favouriteGames = unserialize($record["favouriteGames"]);
 //var_dump($favouriteGames);
 
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel='stylesheet' style='text/css' href='./css/style.css'>
        <link rel='stylesheet' style='text/css' href='./css/style_index.css'>
    </head>
    <body>
        <h3>Wijzig de onderstaande gegevens</h3>
        <form action='update.php' method='post'>
            <table id='tbl_1'>
                <tr>
                    <td>id:</td>
                    <td><input type='number' name='id' value='<?php echo $id; ?>' readonly></td>
                </tr>
                <tr>
                    <td>voornaam:</td>
                    <td><input type='text' name='firstname' value='<?php echo $firstname; ?>'></td>
                </tr>
                <tr>s
                    <td>tussenvoegsel:</td>
                    <td><input type='text' name='infix' value='<?php echo $infix; ?>'></td>
                </tr>
                <tr>
                    <td>achternaam:</td>
                    <td><input type='text' name='lastname' value='<?php echo $lastname; ?>'></td>
                </tr>
                <tr>
                    <td>wachtwoord:</td>
                    <td><input type='password' name='password' value='<?php echo $password; ?>'></td>
                </tr>
                <tr>
                    <td>favoriete games:</td>
                    <td>
                        <input type="checkbox" name="favouriteGames[Tomb raider]" value="Tomb Raider" <?php if (isset($favouriteGames["Tomb raider"])) { echo 'checked'; } ?>> Tomb Raider<br>
                        <input type="checkbox" name="favouriteGames[Pac Man]" value="Pac Man" <?php if (isset($favouriteGames["Pac Man"])) { echo 'checked'; } ?>>Pac Man<br>
            
                        <input type="checkbox" name="favouriteGames[Donkey Kong]" value="Donkey Kong" <?php if (isset($favouriteGames["Donkey Kong"])) { echo 'checked'; } ?>>Donkey Kong<br>
                        <input type="checkbox" name="favouriteGames[Assassins Creed]" value="Assassins Creed" <?php if (isset($favouriteGames["Assassins Creed"])) { echo 'checked'; } ?>>Assassins Creed<br>
                        <input type="checkbox" name="favouriteGames[Kings Valley]" value="Kings Valley" <?php if (isset($favouriteGames["Kings Valley"])) { echo 'checked'; } ?>>Kings Valley
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' name='submit' value='Update!'></td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php
  }
?>