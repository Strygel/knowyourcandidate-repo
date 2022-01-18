<?php
    // PLANS (01/18/22): I am planning to expand this in the future by increasing the criteria of who to delete since 
    // it is flawed yet to just detect the candidate's name only

    include 'db_connect.php';
    candidates_db();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $table = $_POST['table_selected'];
        $candidate = $_POST['candidate'];
    
        $sql = "SELECT picture_dir FROM $table WHERE candidate='$candidate'";
        $query = mysqli_query(candidates_db(), $sql);
        $query = mysqli_fetch_all($query);
        $query = $query[0][0];

        unlink($query);

        $sql = "DELETE FROM $table WHERE candidate='$candidate'";
        mysqli_query(candidates_db(), $sql);
    }

    mysqli_close(candidates_db());
?>