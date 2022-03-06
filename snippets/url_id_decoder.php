<?php 
    // This code will decoode the variable 'id' in the url for every candidate button it has clicked so that when the page reloads or the url has been shared,
    // it will instantly redirect to the specific candidate that has been clicked
    //
    // When the url was initially loaded, this code will be the first one to generate and interacts along with db_loaderONCE.php and candidate_block.php
    //
    // For example:
    // http://127.0.0.1/knowyourcandidate/webpages/mayor.php?id=Mark%3APandan-01-ILOCOS%3ANORTE-ADAMS
    // The id decoded is 'Mark:Pandan-01-ILOCOS:NORTE-ADAMS'
    // 
    // -- How this code works(?)
    // * The code will remove the dash '-' first then place each separated strings into an array:
    //      array('Mark:Pandan', '01', 'ILOCOS:NORTE', 'ADAMS');
    // * Then remove the colon ':' for every array to be equivalent to spaces
    //      array('Mark Pandan', '01', 'ILOCOS NORTE', 'ADAMS');
    // * Last, will be to convert the numbered regions into actual names based on philippines_addr.sql
    //      '01' = 'REGION I (ILOCOS REGION)';
    //
    // Which will redirects to candidate 'Mark Pandan' -> 'REGION I (ILOCOS REGION)' -> ILOCOS NORTE -> ADAMS in mayor.php
    // 
    // -- This feature will work in combination of php (getting the url) to js/jquery (for loading the database into the website) -- 
    // 
    // For example:
    // --- loading in PHP ---
    // include once 'this php directory';
    //
    // (Note just for demo purposes only as I cannot use php close syntax here because it affects the overall code here)
    // --- js/jquery gets the data ---
    // var id = "<?= $id"; 
    // var candidate = "<?= $array_id[0]";
    // var regions = "<?=  array_key_exists(1, $array_id) ? $array_id[1] : ""; ";
    // var provinces = "<?= array_key_exists(2, $array_id) ? $array_id[2] : ""; ";
    // var city_or_municipalities = "<?= array_key_exists(3, $array_id) ? $array_id[3] : ""; ";

    $id = isset($_GET['id']) ? $_GET['id'] : "";

    $array_id = str_replace('-', ' ', $id);
    $array_id = explode(' ', $array_id);
    
    for ($i = 0; $i < count($array_id); $i++) {
        $array_id[$i] = str_replace(':', ' ', $array_id[$i]);
    }

    if(array_key_exists(1, $array_id)) {
        switch ($array_id[1]) {
            case "01": $array_id[1] = 'REGION I (ILOCOS REGION)'; break;
            case "02": $array_id[1] = 'REGION II (CAGAYAN VALLEY)'; break;
            case "03": $array_id[1] = 'REGION III (CENTRAL LUZON)'; break;
            case "04A": $array_id[1] = 'REGION IV-A (CALABARZON)'; break;
            case "04B": $array_id[1] = 'REGION IV-B (MIMAROPA)'; break;
            case "05": $array_id[1] = 'REGION V (BICOL REGION)'; break;
            case "06": $array_id[1] = 'REGION VI (WESTERN VISAYAS)'; break;
            case "07": $array_id[1] = 'REGION VII (CENTRAL VISAYAS)'; break;
            case "08": $array_id[1] = 'REGION VIII (EASTERN VISAYAS)'; break;
            case "09": $array_id[1] = 'REGION IX (ZAMBOANGA PENINSULA)'; break;
            case "10": $array_id[1] = 'REGION X (NORTHERN MINDANAO)'; break;
            case "11": $array_id[1] = 'REGION XI (DAVAO REGION)'; break;
            case "12": $array_id[1] = 'REGION XII (SOCCSKSARGEN)'; break;
            case "13": $array_id[1] = 'REGION XIII (CARAGA)'; break;
            case "NCR": $array_id[1] = 'NATIONAL CAPITAL REGION (NCR)'; break;
            case "CAR": $array_id[1] = 'CORDILLERA ADMINISTRATIVE REGION (CAR)'; break;
            case "BARMM": $array_id[1] = 'BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO (BARMM)'; break;
        }
    }
?>