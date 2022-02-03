<?php
    function candidates_db() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "candidates_db";
    
        return mysqli_connect($host, $username, $password, $database);
    }

    function philippines_addr() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "philippines_addr";

        return mysqli_connect($host, $username, $password, $database);
    }
?>

