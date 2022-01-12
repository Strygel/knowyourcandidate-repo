<?php
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
            case "presidents": case "vc_presidents":
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
        if ($table == 'pres_candidates') {
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
                $new_fileName = $fileName . "_" . $province . "_" . "governor";
                $new_directory = $directory . "/" . $new_fileName . "." . $fileType;

                rename($targetFilePath, $new_directory);

                return $new_directory;
            }
            else if ($table == 'mayor_candidates') {
                $new_fileName = $fileName . "_" . $province . "_" . $municipality . "_" . "mayor";
                $new_directory = $directory . "/" . $new_fileName . "." . $fileType;

                rename($targetFilePath, $new_directory);

                return $new_directory;
            }
        }
    }
?>