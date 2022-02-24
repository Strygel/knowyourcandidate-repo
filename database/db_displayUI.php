<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Database Uploader</title>
        
        <script src="../js/jquery-3.6.0.min.js"></script>

        <script src="../js/db_displayUI-script.js"></script>
        <script src="../snippets/dropdown_formLoader.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="../css/db_displayUI-design.css">
    </head>
    
    <body>
        <div class="grid-container">
            <div id="panel_1" >
                <div class="header"><h2>Database Uploader</h2></div>
                <form action="" id="my_form" method="POST"  enctype="multipart/form-data">
                    <label for="tables">Select a table:</label> <br>
                    <select name="tables" id="tables">
                        <option value="pres_candidates">pres_candidates</option>
                        <option value="vcpres_candidates">vcpres_candidates</option>
                        <option value="mayor_candidates">mayor_candidates</option>
                        <option value="governor_candidates">governor_candidates</option>
                    </select> <br> <br>

                    <!-- options can be seen from '../database/db_dropdown/db_dropdown-Regions.php' -->

                    <!-- options can be seen from '../database/db_dropdown/db_dropdown-Provinces.php' -->

                    <!-- options can be seen from '../database/db_dropdown/db_dropdown-Municipalities.php' -->

                    <label for="candidate"> Candidate: </label> <br>
                    <input type='text' name="candidate" id="candidate" class="small_textbox" required> <br> <br>

                    <label for="partylist"> Partylist: </label> <br>
                    <input type="text" name="partylist" id="partylist" class="small_textbox" required> <br> <br>

                    <label for="file"> Picture: </label> <br>
                    <input type='file' name="fileToUpload" id="fileToUpload" required> <br> <br>

                    <label for="nickname"> Nickname:</label>
                    <input type='text' name="nickname" id="nickname" class="small_textbox" required></input> <br> <br>

                    <label for="age"> Age:</label>
                    <input type='number' name="age" id="age" class="tiny_textbox" required></input> <br> <br>

                    <label for="birthdate"> Birthdate:</label>
                    <input type='date' name="birthdate" id="birthdate" required></input> <br> <br>

                    <label for="hometown"> Hometown:</label>
                    <input type='text' name="hometown" id="hometown" required></input> <br> <br>

                    <label for="honorary_degree"> Honorary Degree:</label> <br>
                    <textarea type='text' name="honorary_degree" id="honorary_degree" required></textarea> <br> <br>

                    <label for="tertiary"> Tertiary:</label> <br>
                    <input type='text' name="tertiary" id="tertiary" required></input> <br> <br>

                    <label for="political_background"> Political Background:</label> <br>
                    <textarea type='text' name="political_background" id="political_background" class="textbox" required></textarea> <br> <br>

                    <!-- Stance for Divorce -->

                    <!-- Stance for Death Penalty -->

                    <!-- Stance for Same Sex Marriage -->

                    <input type="submit" name="submit" id="submit">
                    <input type="reset" name="clear" id="clear">
                </form>
            </div>
            <div id="panel_2">
                <?php include "db_remover.php"; ?>

                <!-- Data Loaded from jQuery to PHP and MySQL Database comes here-->
            </div>
        </div>
    </body>
</html>