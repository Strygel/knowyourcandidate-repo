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

function remove_stance() {
    $("div.label_stance").remove();

    $("label[for=stance_divorce]").remove();
    $("label[for=stance_death_penalty]").remove();
    $("label[for=stance_same_sex_marriage]").remove();

    $("input[type=radio]").remove();
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

function stance() {
    return "<div class='label_stance'>Political Stands: </div>" +

           "<input type='radio' name='stance_divorce' id='stance_divorce' value='Yes' required>" +
           "<label for='stance_divorce'>Yes</label>" + 
           "<input type='radio' name='stance_divorce' id='stance_divorce' value='No'>" +
           "<label for='stance_divorce'>No</label>" +
           "<input type='radio' name='stance_divorce' id='stance_divorce' value='Unknown'>" +
           "<label for='stance_divorce'>Unknown</label> <br class='blank'>" + 

           "<label for='stance_death_penalty'>Death Penalty:</label> <br class='blank'>" +
           "<input type='radio' name='stance_death_penalty' id='stance_death_penalty' value='Yes' required>" +
           "<label for='stance_death_penalty'>Yes</label>" +
           "<input type='radio' name='stance_death_penalty' id='stance_death_penalty' value='No'>" +
           "<label for='stance_death_penalty'>No</label>" +
           "<input type='radio' name='stance_death_penalty' id='stance_death_penalty' value='Unknown'>" +
           "<label for='stance_death_penalty'>Unknown</label> <br class='blank'>" +

           "<label for='stance_same_sex_marriage'>Same Sex Marriage:</label> <br class='blank'>" +
           "<input type='radio' name='stance_same_sex_marriage' id='stance_same_sex_marriage' value='Yes' required>" +
           "<label for='stance_same_sex_marriage'>Yes</label>" +
           "<input type='radio' name='stance_same_sex_marriage' id='stance_same_sex_marriage' value='No'>" +
           "<label for='stance_same_sex_marriage'>No</label>" +
           "<input type='radio' name='stance_same_sex_marriage' id='stance_same_sex_marriage' value='Unknown'>" +
           "<label for='stance_same_sex_marriage'>Unknown</label>  <br class='blank'> <br class='blank'>";                    
}

