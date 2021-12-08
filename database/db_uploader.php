<?php
    include 'database/db_connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $candidate = $_POST['candidate'];
        $credentials = $_POST['credentials'];
        $biography = $_POST['biography'];
        $sources = $_POST['sources'];

        $fileName = basename($_FILES['fileToUpload']['name']);
        $targetFilePath = 'pictures/' . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if(in_array($fileType, $allowTypes)) {

            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFilePath)) {
                $sql = "INSERT INTO candidate_pres (name, fileName, credentials, biography, sources) VALUES ('$candidate', '$fileName', '$credentials', '$biography', '$sources')";
                $query = mysqli_query($conn, $sql);
            }
            else {
                echo "Picture Upload Error";
            }
        }
        else {
            echo "Only pictures are allowed!";
        }
        
    }

    mysqli_close($conn);
?>