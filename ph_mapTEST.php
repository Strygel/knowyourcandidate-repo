<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>KnowYourCandidate</title>
        <link rel="stylesheet" href="css/ph_mapTEST-design.css">

        <link rel="stylesheet" href="ph_map/chosen_v1.8.7/chosen.css">

        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="ph_map/chosen_v1.8.7/chosen.jquery.min.js"></script>

        <script type="text/javascript" src="ph_map/mapdata.js"></script>
        <script type="text/javascript" src="ph_map/countrymap.js"></script>
        <!-- <script type="text/javascript" src="ph_map/search.js"></script> -->
        <!-- <script type="text/javascript" src="ph_map/select.js"></script> -->

        <script type="text/javascript" src="js/ph_mapTEST-script.js"></script>
    </head>
    
    <body>
        <div id='testing'>
            <select id="state_list" style="width:350px;" tabindex="0"></select>
            <p class="details">Selected: <span id="clicked_state"></span></p>
            <!-- <p class="details">MySQL Code: <span id="mysql_code"></span></p> -->
        </div>
        <div id='map'></div>
    </body>
</html>

<!-- ================ KnowYourCandidate-repo project ========================
    [PANDAN]
    Some things to take note before proceeding:

    - Import the .sql file first in your phpMyAdmin which was located in 'mysql' folder
        Components:
        * candidates_db.sql   = This is where the list of candidates from president, vice-president, governors and mayors are placed.
        * philippines_addr.sql = It is a database for every addresses in the Philippines. Divided into regions, province, city/municipality.
            (Database Source: https://github.com/clavearnel/philippines-region-province-citymun-brgy) 
             but I changed the ARMM to BARMM since its already outdated 7 years ago.

    - The UI for adding data in the database is in 'database/db_displayUI.php'
    - The 'database/db_loader.php' file should be the one to use for showing candidate's info.
    - Before committing to GitHub, export the .sql (only candidate_db.sql) file first and place in the 'mysql' folder if you added some data in there.

    This is not testrun-ed yet so far.

    =========================================================================
 -->