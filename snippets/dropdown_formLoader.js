// This part will run as a chain for the user to select the specific address
function remove_dropdown() {
    $("label[for=regions]").remove();
    $("select#regions").remove();

    $("label[for=provinces]").remove();
    $("select#provinces").remove();

    $("label[for=city_or_municipalities").remove();
    $("select#city_or_municipalities").remove();

    $(".blank").remove();
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

