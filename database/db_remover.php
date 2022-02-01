<?php
    // Done implementing higher restrictions for deleting a database. I only add birthday as an additional criteria
    // since my speculation is that its impossible for a person with the same name and same birthday. So far this might be the case yet.
    // Adding regions and municipalities will make the performance slower I think.

    include 'db_connect.php';
    candidates_db();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $table = $_POST['table_selected'];
        $candidate = $_POST['candidate'];
        $birthdate = $_POST['birthdate'];
    
        $sql = "SELECT picture_dir FROM $table WHERE candidate='$candidate' AND birthdate='$birthdate'";
        $query = mysqli_query(candidates_db(), $sql);
        $query = mysqli_fetch_all($query);
        $query = $query[0][0];

        unlink($query);

        $sql = "DELETE FROM $table WHERE candidate='$candidate' AND birthdate='$birthdate'";  
        mysqli_query(candidates_db(), $sql);
    }

    mysqli_close(candidates_db());
?>