<?php
    /* De functie sanitize() wordt gebruikt om de ingevoerde waarden van een
       formulier klaar te maken voor opslag in de database. Deze waarden moeten
       worden ontdaan van..... */
    function sanitize($text)
    {
        // de spaties uiterst links en uiterst rechts van de ingevoerde waarde...
        $text = trim($text);

        // Alle eventuele html-tags in de ingevoerde waarden, vooral het <script></script> tag...
        $text = strip_tags($text);

        /* Enkele quotes ' en dubbele quotes " moeten worden voorzien van een \ d.w.z. een escape teken. 
           Dit om onbedoelde afsluiten van enkele en dubbele quotes te voorkomen */
        $text = addslashes($text);

        // De functie sanitize() geeft de schoongemaakte waarde van $tekst terug als return waarde
        return $text;
    }  
?>