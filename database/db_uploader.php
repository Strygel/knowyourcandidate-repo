<?php
    // Do not bother this code. It is for my own matters only.

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $table = $_POST['tables'];

        switch ($table) {
            case 'pres_candidates': case 'vcpres_candidates':
                upload_POST($table, 'set_1');
            break;

            case 'governor_candidates':
                upload_POST($table, 'set_2');      
            break;

            case 'mayor_candidates':
                upload_POST($table, 'set_3');
            break;
        }      
    }
?>

<?php
    function upload_POST($table, $set) {
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
        isset($_POST['regions']) ? $regions = $_POST['regions'] : '';
        isset($_POST['provinces']) ? $provinces = $_POST['provinces'] : '';
        isset($_POST['city_or_municipalities']) ? $city_or_municipalities = $_POST['city_or_municipalities'] : '';
        // ==============================================================
        $stance_divorce = $_POST['stance_divorce'];
        $stance_death_penalty = $_POST['stance_death_penalty'];
        $stance_same_sex_marriage = $_POST['stance_same_sex_marriage'];
        // ==============================================================
        $fileName = basename($_FILES['fileToUpload']['name']);
        $targetFilePath = '../pictures/' . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFilePath)) {
                
                switch ($set) {
                    case 'set_1':
                        $sql = "INSERT INTO $table (candidate, picture_dir, nickname, age, birthdate, hometown, honorary_degree, tertiary, political_background, 
                        stance_divorce, stance_death_penalty, stance_same_sex_marriage) 
                        VALUES ('$candidate', '$fileName', '$nickname', '$age', '$birthdate', '$hometown', '$honorary_degree', '$tertiary', '$political_background', 
                        '$stance_divorce', '$stance_death_penalty', '$stance_same_sex_marriage')";
                    break;
                        
                    case 'set_2':
                        $sql = "INSERT INTO $table (candidate, picture_dir, nickname, age, birthdate, hometown, honorary_degree, tertiary, political_background, 
                        stance_divorce, stance_death_penalty, stance_same_sex_marriage, regions, provinces) 
                        VALUES ('$candidate', '$fileName', '$nickname', '$age', '$birthdate', '$hometown', '$honorary_degree', '$tertiary', '$political_background', 
                        '$stance_divorce', '$stance_death_penalty', '$stance_same_sex_marriage', '$regions', '$provinces')";
                    break;

                    case 'set_3':
                        $sql = "INSERT INTO $table (candidate, picture_dir, nickname, age, birthdate, hometown, honorary_degree, tertiary, political_background, 
                        stance_divorce, stance_death_penalty, stance_same_sex_marriage, regions, provinces, city_or_municipalities) 
                        VALUES ('$candidate', '$fileName', '$nickname', '$age', '$birthdate', '$hometown', '$honorary_degree', '$tertiary', '$political_background', 
                        '$stance_divorce', '$stance_death_penalty', '$stance_same_sex_marriage', '$regions', '$provinces', '$city_or_municipalities')";
                    break;
                }
                mysqli_query(candidates_db(), $sql);
            }
            else {
                echo "Picture Upload Error";
            }
        }
        else {
            echo "Only pictures are allowed!";
        }

        mysqli_close(candidates_db());  
        
        // === Trash code that might be recycled for later use ===

        // $candidate = $_POST['candidate'];
        // $nickname = $_POST['nickname'];
        // $age = $_POST['age'];
        // $birthdate = $_POST['birthdate'];
        // $hometown = $_POST['hometown'];
        // $honorary_degree = $_POST['honorary_degree'];
        // $tertiary = $_POST['tertiary'];
        // $political_background = $_POST['political_background'];

        // $stance_divorce = (isset($_POST['stance_divorce']) ? TRUE : FALSE);
        // $stance_death_penalty = (isset($_POST['stance_death_penalty']) ? TRUE : FALSE);
        // $stance_same_sex_marriage = (isset($_POST['stance_same_sex_marriage']) ? TRUE : FALSE);

        // private $extra_POST = array();

        // function append_POST($post_data) {
        //     $this->extra_POST[] = $_POST[$post_data];
        // }

        // if ($extra_POST) {
        //         $toInsert = array('region', 'city_or_municipality');
        //         $count = "SELECT COUNT(*) FROM $table";
                
        //         for ($i = 0; $i = count($extra_POST); $i++) {
        //             $sql = "UPDATE $table SET $toInsert[$i] = $extra_POST[$i] WHERE id = $count";
        //             mysqli_query($conn, $sql);
        //         }
        //         $extra_POST = array();
        // }
    }
?>

