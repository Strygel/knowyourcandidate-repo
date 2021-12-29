<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>KnowYourCandidate</title>
        <link rel="stylesheet" href="css/design.css">
    </head>
    
    <body>

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