<?php
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

        $sql = "DELETE FROM $table WHERE candidate='$candidate' LIMIT 1";
        mysqli_query(candidates_db(), $sql);
    }

    mysqli_close(candidates_db());
?>