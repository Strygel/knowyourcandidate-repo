<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>KnowYourCandidate</title>
        
        <script src="../js/jquery-3.6.0.min.js"></script>

        <script src="../js/db_displayUI-script.js"></script>
        <script src="../snippets/dropdown_formLoader.js"></script>

        <link rel="stylesheet" href="../css/db_displayUI-design.css">
    </head>
    
    <body>
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
                <input type='text' name="honorary_degree" id="honorary_degree" required></input> <br> <br>

                <label for="tertiary"> Tertiary:</label> <br>
                <input type='text' name="tertiary" id="tertiary" required></input> <br> <br>

                <label for="political_background"> Political Background:</label> <br>
                <textarea type='text' name="political_background" id="political_background" class="textbox" required></textarea> <br> <br>

                <div>Political Stands: </div>
                <label for="stance_divorce">Divorce:</label> <br>
                <input type='radio' name='stance_divorce' id='stance_divorce' value="Yes" required>Yes</input>
                <input type='radio' name='stance_divorce' id='stance_divorce' value="No">No</input>
                <input type='radio' name='stance_divorce' id='stance_divorce' value="Unknown">Unknown</input> <br>

                <label for="stance_death_penalty">Death Penalty:</label> <br>
                <input type='radio' name='stance_death_penalty' id='stance_death_penalty' value="Yes" required>Yes</input>
                <input type='radio' name='stance_death_penalty' id='stance_death_penalty' value="No">No</input>
                <input type='radio' name='stance_death_penalty' id='stance_death_penalty' value="Unknown">Unknown</input> <br>

                <label for="stance_same_sex_marriage">Same Sex Marriage:</label> <br>
                <input type='radio' name='stance_same_sex_marriage' id='stance_same_sex_marriage' value="Yes" required>Yes</input>
                <input type='radio' name='stance_same_sex_marriage' id='stance_same_sex_marriage' value="No">No</input>
                <input type='radio' name='stance_same_sex_marriage' id='stance_same_sex_marriage' value="Unknown">Unknown</input> <br> <br>

                <input type="submit" name="submit" id="submit">
                <input type="reset" name="clear" id="clear">
            </form>
        </div>

        <div class="grid-container">
            <div>
                
            </div>
            <div id="panel_2">
                <?php include "db_remover.php"; ?>

                <!-- Data Loaded from jQuery to PHP and MySQL Database comes here-->
            </div>
        </div>
    </body>
</html>