<?php
    // Do not bother this code. It is for my own matters only.

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
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
                    if ($sql == 'sql_2') {
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

    function directory_editor($database, $region = null, $province = null, $municipality = null) {

        $folder_database = "../pictures/" . $database;
        if (!file_exists($folder_database) && !is_dir($folder_database)) {
            mkdir($folder_database);
        }

        if ($region) {
            $folder_region = $folder_database . "/" . $region;
            if (!file_exists($folder_region) && !is_dir($folder_region)) {
                mkdir($folder_region);
            }

            if ($province) {
                $folder_province = $folder_region . "/" . $province;
                if (!file_exists($folder_province) && !is_dir($folder_province)) {
                    mkdir($folder_province);
                }

                if ($municipality) {
                    $folder_municipality = $folder_province .  "/" . $municipality;
                    if (!file_exists($folder_municipality) && !is_dir($folder_municipality)) {
                        mkdir($folder_municipality);
                    }

                }
            }
        }

        switch ($database) {
            case "presidents": case "v_presidents":
                return $folder_database;
            break;

            case "governors":
                return $folder_province;
            break;

            case "mayors":
                return $folder_municipality;
            break;
        }
    }

    function fileName_editor($targetFilePath, $fileType ,$directory, $table, $candidate, $region = null, $province = null, $municipality = null) {
        if ($table == 'pres_candidates' || $table == 'vcpres_candidates') {
            $new_fileName = $candidate . "-" . "president";
            $new_directory = $directory . "/" . $new_fileName . "." . $fileType;

            rename($targetFilePath, $new_directory);

            return $new_directory;
        }
        else if ($table == 'vcpres_candidates') {
            $new_fileName = $candidate . "-" . "vcpresident";
            $new_directory = $directory . "/" . $new_fileName . "." . $fileType;

            rename($targetFilePath, $new_directory);

            return $new_directory;
        }
        else {
            switch ($region) {
                case 'REGION I (ILOCOS REGION)': $fileName = $candidate . "-01"; break;
                case 'REGION II (CAGAYAN VALLEY)': $fileName = $candidate . "-02"; break;
                case 'REGION III (CENTRAL LUZON)': $fileName = $candidate . "-03"; break;
                case 'REGION IV-A (CALABARZON)': $fileName = $candidate . "-04A"; break;
                case 'REGION IV-B (MIMAROPA)': $fileName = $candidate . "-04B"; break;
                case 'REGION V (BICOL REGION)': $fileName = $candidate . "-05"; break;
                case 'REGION VI (WESTERN VISAYAS)': $fileName = $candidate . "-06"; break;
                case 'REGION VII (CENTRAL VISAYAS)': $fileName = $candidate . "-07"; break;
                case 'REGION VIII (EASTERN VISAYAS)': $fileName = $candidate . "-08"; break;
                case 'REGION IX (ZAMBOANGA PENINSULA)': $fileName = $candidate . "-09"; break;
                case 'REGION X (NORTHERN MINDANAO)': $fileName = $candidate . "-10"; break;
                case 'REGION XI (DAVAO REGION)': $fileName = $candidate . "-11"; break;
                case 'REGION XII (SOCCSKSARGEN)': $fileName = $candidate . "-12"; break;
                case 'REGION XIII (Caraga)': $fileName = $candidate . "-13"; break;
                case 'NATIONAL CAPITAL REGION (NCR)': $fileName = $candidate . "-NCR"; break;
                case 'CORDILLERA ADMINISTRATIVE REGION (CAR)': $fileName = $candidate . "-CAR"; break;
                case 'BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO (BARMM)': $fileName = $candidate . "-BARMM"; break;
            }
    
            if ($table == 'governor_candidates') {
                $new_fileName = $directory . "/" . $fileName . "_" . $province . "_" . "governor" . "." . $fileType;
                $new_directory = $directory . "/" . $new_fileName . "." . $fileType;

                rename($targetFilePath, $new_directory);

                return $new_directory;
            }
            else if ($table == 'mayor_candidates') {
                $new_fileName = $directory . "/" . $fileName . "_" . $province . "_" . $municipality . "_" . "mayor" . "." . $fileType;
                $new_directory = $directory . "/" . $new_fileName . "." . $fileType;

                rename($targetFilePath, $new_directory);

                return $new_directory;
            }
        }
    }
?>

