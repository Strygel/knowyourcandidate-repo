<?php
    // Do not bother this code. It is for my own matters only.
    include '../snippets/db_uploader_functions.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $table = $_POST['tables'];
        switch ($table) {
            case 'pres_candidates':
                upload_POST($table, 'sql_1');
            break;

            case 'vcpres_candidates':
                upload_POST($table, 'sql_2');
            break;

            case 'governor_candidates':
                upload_POST($table, 'sql_3');      
            break;

            case 'mayor_candidates':
                upload_POST($table, 'sql_4');
            break;
        }      
    }
?>


<?php
    // Error catcher(?) NOT YET WORKING
    function alert($msg) {
        echo "<script type='text'>alert('$msg');</script>";
    }
?>

<?php
    function upload_POST($table, $sql) {
        include 'db_connect.php';
        candidates_db();
        
        // ==============================================================
        $candidate = $_POST['candidate'];
        $nickname = $_POST['nickname'];
        $age = $_POST['age'];
        $birthdate = $_POST['birthdate'];
        $hometown = $_POST['hometown'];
        $honorary_degree = $_POST['honorary_degree'];
        $tertiary = $_POST['tertiary'];
        $political_background = $_POST['political_background'];
        // ==============================================================
        isset($_POST['regions']) ? $region = $_POST['regions'] : '';
        isset($_POST['provinces']) ? $province = $_POST['provinces'] : '';
        isset($_POST['city_or_municipalities']) ? $city_or_municipality = $_POST['city_or_municipalities'] : '';
        // ==============================================================
        $stance_divorce = $_POST['stance_divorce'];
        $stance_death_penalty = $_POST['stance_death_penalty'];
        $stance_same_sex_marriage = $_POST['stance_same_sex_marriage'];
        // ==============================================================
        
        $fileName = basename($_FILES['fileToUpload']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            switch ($sql) {
                case 'sql_1': case 'sql_2':
                    if ($sql == 'sql_1') {
                        $directory = directory_editor('presidents');
                    }
                    else if ($sql == 'sql_2') {
                        $directory = directory_editor('vc_presidents');
                    }

                    $targetFilePath = $directory . "/" . $fileName;
                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFilePath);

                    $new_directory = fileName_editor($targetFilePath, $fileType, $directory, $table, $candidate);

                    $sql = "INSERT INTO $table (candidate, picture_dir, nickname, age, birthdate, hometown, honorary_degree, tertiary, political_background, 
                    stance_divorce, stance_death_penalty, stance_same_sex_marriage) 
                    VALUES ('$candidate', '$new_directory', '$nickname', '$age', '$birthdate', '$hometown', '$honorary_degree', '$tertiary', '$political_background', 
                    '$stance_divorce', '$stance_death_penalty', '$stance_same_sex_marriage')";
                break;

                case 'sql_3':
                    $directory = directory_editor('governors', $region, $province);
                    
                    $targetFilePath = $directory . "/" . $fileName;
                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFilePath);  

                    $new_directory = fileName_editor($targetFilePath, $fileType, $directory, $table, $candidate, $region, $province);

                    $sql = "INSERT INTO $table (candidate, picture_dir, nickname, age, birthdate, hometown, honorary_degree, tertiary, political_background, 
                    stance_divorce, stance_death_penalty, stance_same_sex_marriage, regions, provinces) 
                    VALUES ('$candidate', '$new_directory', '$nickname', '$age', '$birthdate', '$hometown', '$honorary_degree', '$tertiary', '$political_background', 
                    '$stance_divorce', '$stance_death_penalty', '$stance_same_sex_marriage', '$region', '$province')";
                break;

                case 'sql_4':
                    $directory = directory_editor('mayors', $region, $province, $city_or_municipality);

                    $targetFilePath = $directory . "/" . $fileName;
                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFilePath);

                    
                    $new_directory = fileName_editor($targetFilePath, $fileType, $directory, $table, $candidate, $region, $province, $city_or_municipality);

                    $sql = "INSERT INTO $table (candidate, picture_dir, nickname, age, birthdate, hometown, honorary_degree, tertiary, political_background, 
                    stance_divorce, stance_death_penalty, stance_same_sex_marriage, regions, provinces, city_or_municipalities) 
                    VALUES ('$candidate', '$new_directory', '$nickname', '$age', '$birthdate', '$hometown', '$honorary_degree', '$tertiary', '$political_background', 
                    '$stance_divorce', '$stance_death_penalty', '$stance_same_sex_marriage', '$region', '$province', '$city_or_municipality')";
                break;
            }
            mysqli_query(candidates_db(), $sql);
        }
        else {
            alert("Only Pictures are Allowed!");
        }


        mysqli_close(candidates_db());  
    }
?>

