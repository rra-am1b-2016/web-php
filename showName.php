<?php
    /* Dit is mijn eerste
     * commentaar behorende bij de onderstaande
     * coderegel met php */

    /*
    echo "<h1>Variabelen van het datatype String</h1>";
    
    echo "Hallo Wereld<br>"; // Dit is ook een manier

    # Dit is de derde manier
    $firstname = "Harry";
    $infix = "de";
    $lastname = "Bok";

    $newFirstname = 'Arjan';
    $newInfix = "de";
    $newLastname = "Ruijter";


    echo "Mijn naam is: " . $firstname ." ".$infix." ".$lastname."<br>";

    echo "Mijn naam is $newFirstname $newInfix $newLastname en ik vind dat een mooie naam.";
    echo "<hr>";

    echo "<h1>Variabelen van het datatype Integer en Float</h1>";
    
    $getal1 = 5;  // Dit is een integer
    $getal2 = 3.3478; // Dit is een float
    $som = $getal1 + $getal2;
    $verschil = $getal1 - $getal2;
    $product = $getal1 * $getal2;
    $quotient = $getal1 / $getal2;

    echo "De som van ".$getal1." + ".$getal2." = ".$som."<br>";
    echo "Het verschil van ".$getal1." - ".$getal2." = ".$verschil."<br>";
    echo "Het quotient van ".$getal1." / ".$getal2." = ".$quotient."<br>";
    echo "Het product van ".$getal1." * ".$getal2." = ".$product."<br><hr>";
    
    echo "<h1>Variabelen van het datatype Array</h1>";

    $auto1 = "BMW";
    $auto2 = "Fiat";
    $auto3 = "Bugatti";

    echo "De beste automerken ter wereld zijn: ".$auto1.", ".$auto2.", ".$auto3."<br><hr>";
    echo "<h3>Dit is een indexed array</h3>";
    $games = array("Kings Valley", "Tomb Raider", "Pac Man", "GTA", "Battlefield");
    var_dump($games);
    echo "De beste spellen ooit zijn: ".$games[0].", "
                                       .$games[1].", "
                                       .$games[2].", "
                                       .$games[3].", "
                                       .$games[4]."<hr>";

    echo "<h3>Dit is een associatief array</h3>";

    // Leg van een persoon zijn voornaam, lengte, haarkleur, leeftijd, schoenmaat, geboorteplaats

    $persoon = array("voornaam" => "Arjan",
                     "lengte" => 1.80,
                     "haarkleur" => "Grijs",
                     "leeftijd" => 48,
                     "schoenmaat" => 45,
                     "geboorteplaats" => "Amsterdam");

    var_dump($persoon);

    echo "Mijn voornaam is: ".$persoon["voornaam"]."<br>".
         "Mijn lichaamslengte is: ".$persoon["lengte"]." meter<br>".
         "Mijn haarkleur is: ".$persoon["haarkleur"]."<br>".
         "Mijn leeftijd is: ".$persoon['leeftijd']." jaar<br>".
         "Mijn schoenmaat is: ".$persoon['schoenmaat']." europese maat<br>".
         "Mijn geboorteplaats is: ".$persoon['geboorteplaats']."<br><hr>";

    echo "<h3>Hieronder staan de ingevulde formuliergegevens</h3>";

    var_dump($_POST);

    */

    
    //var_dump($_POST);
    /*
    echo "<hr>";
    echo '<h3>Hieronder staat een var_dump van de associatieve superglobal array genaamd: $_SERVER</h3>';
    var_dump($_SERVER);
    */

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "am1b_2016_loginregistration";
    

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //var_dump($conn);

    /************************************************************************************
     * Het invoegen van een record in de tabel
     */

    $sql = "INSERT INTO `users` (`id`,
                                 `firstname`,
                                 `infix`,
                                 `lastname`)
            VALUES              (NULL,
                                 '".$_POST["firstname"]."',
                                 '".$_POST["infix"]."',
                                 '".$_POST["lastname"]."')";    
    
    mysqli_query($conn, $sql);
    /*************************************************************************************/
    
    /**************************************************************************************
     * Het opvragen van gegevens uit de tabel
     */

     $sql = "SELECT `id`, `firstname`, `infix`, `lastname` FROM `users`";

     $result = mysqli_query($conn, $sql);

     /*
     $record = mysqli_fetch_array($result, MYSQLI_ASSOC);

     echo "We krijgen het volgende terug van de database: ";
     //var_dump($record);
     echo "Het id: ".$record["id"]."<br>";
     echo "De voornaam: ".$record["firstname"]."<br>";
     */ 

     echo "<table>
           <tr>
                <th>id</th>
                <th>firstname</th>
                <th>infix</th>
                <th>lastname</th>
                <th></th>
           </tr>";

     while ( $record = mysqli_fetch_array($result, MYSQLI_ASSOC) )
     {      
            echo "<tr>
                        <td>".$record['id']."</td>
                        <td>".$record['firstname']."</td>
                        <td>".$record['infix']."</td>
                        <td>".$record['lastname']."</td> 
                        <td><a href='remove.php'><img src='images/drop.png' alt='kruis'></a></td>          
                  <tr>";
     } 
     echo "</table>";








     /***********************************************************************************/

    //schrijfNaarScherm($servername, $username, $password);

    function schrijfNaarScherm($servername, $username, $password)
    {
        echo $servername." ".$username." ".$password;
        echo "<hr>";
    }





    echo "Uw volledige naam is: ".$_POST["firstname"]." ".$_POST["infix"]." ".$_POST["lastname"]."<br>";
    echo "Uw wachtwoord is: ".$_POST["password"]."<br>";
    echo "Uw e-mailadres is: ".$_POST['email']."<br>";
    echo "Uw favoriete games zijn: ";
    
    if ( isset($_POST["favouriteGames"]["Tomb raider"]) == 1)
    {
        echo $_POST["favouriteGames"]["Tomb raider"]." ";
    }
    if ( isset($_POST["favouriteGames"]["Pac Man"]) == 1)
    {
        echo $_POST["favouriteGames"]["Pac Man"]." ";
    }
    if ( isset($_POST["favouriteGames"]["Donkey Kong"]) == 1)
    {
        echo $_POST["favouriteGames"]["Donkey Kong"]." ";
    }
    if ( isset($_POST["favouriteGames"]["Assassins Creed"]) == 1)
    {
        echo $_POST["favouriteGames"]["Assassins Creed"]." ";
    }
    if ( isset($_POST["favouriteGames"]["Kings Valley"]) == 1)
    {
        echo $_POST["favouriteGames"]["Kings Valley"]." ";
    }
       
    //var_dump($_POST);
    //var_dump($_SERVER);
    echo "<h4>Uw gegevens zijn succesvol opgeslagen in de database.</h4>";
    echo $sql;

    echo "De while loop<hr>";

    $getal = 1;

    while( $getal <= 5 )
    {
        echo 'De waarde van $getal is: '.$getal."<br>";
        $getal += 1;
    }

    echo "De while loop is klaar";
?>

<style>
    *
    {
        font-family: Verdana, Arial;
        margin: 0;
        padding: 0;
    }

    table, td, th 
    {
        border:2px solid grey;
        border-collapse: collapse;
        padding: 0.4em 1em;
    }
</style>