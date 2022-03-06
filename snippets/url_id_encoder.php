<?php
    // This code will encode the variable 'id' in the url for every candidate button it has clicked so that when the page reloads or the url has been shared,
    // it will instantly redirect to the specific candidate that has been clicked
    //
    // For example: (if the user clicks one of the selections in candidate_block.php)
    // http://127.0.0.1/knowyourcandidate/webpages/mayor.php?id=Mark%3APandan-01-ILOCOS%3ANORTE-ADAMS
    // The id encoded is 'Mark%3APandan-01-ILOCOS%3ANORTE-ADAMS'
    // Which will redirects to candidate 'Mark Pandan' -> 'REGION I (ILOCOS REGION)' -> ILOCOS NORTE -> ADAMS in mayor.php
    //
    // -- This feature will most likely applies easily to PHP -- 
    // To use it in PHP:
    // 
    // include 'this php directory';
    // encode_ID (
    //    $_POST['table_selected'], 
    //    $_POST['candidate], 
    //    isset($_POST['regions']) ?  $_POST['regions'] : "",
    //    isset($_POST['provinces']) ? $_POST['provinces'] : "",
    //    isset($_POST['city_or_municipalities']) ? $_POST['city_or_municipalities'] : ""
    // );

    function encode_ID($table, $candidate, $regions, $province, $city_or_municipalities) {    
        switch ($table) {
            case 'pres_candidates': case 'vcpres_candidates':
                return IDcase($candidate);
            break;
            case 'governor_candidates':
                return IDcase($candidate) . "-" . region_ID($regions) . "-" . IDcase($province);
            break;
            case 'mayor_candidates':
                return IDcase($candidate) . "-" . region_ID($regions) . "-" . IDcase($province) . "-" . IDcase($city_or_municipalities);
            break;
        }
    }

    function region_ID($regions) {
        switch ($regions) {
            case 'REGION I (ILOCOS REGION)': return "01"; break;
            case 'REGION II (CAGAYAN VALLEY)': return "02"; break;
            case 'REGION III (CENTRAL LUZON)': return "03"; break;
            case 'REGION IV-A (CALABARZON)': return "04A"; break;
            case 'REGION IV-B (MIMAROPA)': return "04B"; break;
            case 'REGION V (BICOL REGION)': return "05"; break;
            case 'REGION VI (WESTERN VISAYAS)': return "06"; break;
            case 'REGION VII (CENTRAL VISAYAS)': return "07"; break;
            case 'REGION VIII (EASTERN VISAYAS)': return "08"; break;
            case 'REGION IX (ZAMBOANGA PENINSULA)': return "09"; break;
            case 'REGION X (NORTHERN MINDANAO)': return "10"; break;
            case 'REGION XI (DAVAO REGION)': return "11"; break;
            case 'REGION XII (SOCCSKSARGEN)': return "12"; break;
            case 'REGION XIII (CARAGA)': return "13"; break;
            case 'NATIONAL CAPITAL REGION (NCR)': return "NCR"; break;
            case 'CORDILLERA ADMINISTRATIVE REGION (CAR)': return "CAR"; break;
            case 'BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO (BARMM)': return "BARMM"; break;
        } 
    }

    function IDcase($str) {
        return rawurlencode(str_replace(' ', ':', $str));
    }
?>