<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>KnowYourCandidate</title>
        <link rel="stylesheet" href="css/design.css">
    </head>
    
    <body>
        <div id="item1">
            <h2>Database Uploader</h2>
            <form action="" method="POST"  enctype="multipart/form-data">
                <label for="candidate"> Candidate: </label> <br>
                <input type='text' name="candidate" id="candidate" required> <br> <br>

                <label for="file"> Picture: </label> <br>
                <input type='file' name="fileToUpload" id="fileToUpload" required> <br> <br>

                <label for="credentials"> Credentials:</label> <br>
                <textarea type='text' name="credentials" id="credentials" class="textbox" required></textarea> <br> <br>

                <label for="biography"> Biography:</label> <br>
                <textarea type='text' name="biography" id="biography" class="textbox" required></textarea> <br> <br>

                <label for="sources"> Sources:</label> <br>
                <textarea type='text' name="sources" id="sources" class="textbox" required></textarea> <br> <br>

                <input type="submit" name="submit" id="submit">
            </form>

            <!-- [Pandan] This is the PHP part of this code and this is where my work is being done -->
            <?php include "database/db_uploader.php"; ?>
        </div>

        <div class="grid-container">
            <div></div>
            <div id="item2">
                <?php include 'database/db_loader.php' ?>
            </div>

        </div>
    </body>
</html>