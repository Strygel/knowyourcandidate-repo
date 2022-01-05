// This part will run as a chain for the user to select the specific address

var remover_directory = '../database/db_remover.php';

function remove_dropdown() {
    $("label[for=regions]").remove();
    $("select#regions").remove();

    $("label[for=provinces]").remove();
    $("select#provinces").remove();

    $("label[for=city_or_municipalities").remove();
    $("select#city_or_municipalities").remove();

    $(".blank").remove();
}

function remove_cell_button() {
    $(".candidate_card").append("<button class='remove_db' style='display: none;'>Delete</button>");
    $(".remove_db").click(function() {
        // Add Click function for remove_db
    });

    for (let i = 1; i <= $(".cells").length; i++) {
        $(".cells:nth-child(" + i + ")").hover(
            function() {
                $(".cells:nth-child(" + i + ") .remove_db").show();
            }, 
            function() {
                $(".cells:nth-child(" + i + ") .remove_db").hide();
            });
    }
}

function regions_dropdown() {
    return  "<label for='regions'>Select a region:</label> <br class='blank'>" +
            "<select name='regions' id='regions' required></select>" +
            "<br class='blank'>";
}

function provinces_dropdown() {
    return "<label for='provinces'>Select a province:</label> <br class='blank'>" +
           "<select name='provinces' id='provinces' required></select>" +
           "<br class='blank'>";
}

function city_or_municipality_dropdown() {
    return  "<label for='city_or_municipalities'>Select a city or municipality:</label> <br class='blank'>" +
            "<select name='city_or_municipalities' id='city_or_municipalities' required></select>" +
            "<br class='blank'>"; 
}