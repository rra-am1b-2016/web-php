<?php
    function sanatize($text)
    {
        $text = trim($text);
        $text = strip_tags($text);
        $text = addslashes($text);
        return $text;
    }  
?>