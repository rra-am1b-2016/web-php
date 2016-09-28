<?php
 // Maak contact met de mysql-server en database
 include("connect_db.php");

 if ( isset($_POST['submit']))
 {
     var_dump($_POST);
     // Maak een update query..
     $sql = "UPDATE `users` 
             SET `firstname` = '".$_POST['firstname']."',
                 `infix` = '".$_POST['infix']."',
                 `lastname` = '".$_POST['lastname']."'
             WHERE `id` = ".$_POST['id'].";";
    
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

 // Kijk maar....
 //var_dump($record);
 //echo $sql; exit();

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
                    <td><input type='number' name='id' value='<?php echo $record["id"]; ?>' readonly></td>
                </tr>
                <tr>
                    <td>voornaam:</td>
                    <td><input type='text' name='firstname' value='<?php echo $record["firstname"]; ?>'></td>
                </tr>
                <tr>
                    <td>tussenvoegsel:</td>
                    <td><input type='text' name='infix' value='<?php echo $record["infix"]; ?>'></td>
                </tr>
                <tr>
                    <td>achternaam:</td>
                    <td><input type='text' name='lastname' value='<?php echo $record["lastname"]; ?>'></td>
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