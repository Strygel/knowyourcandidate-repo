$(document).ready(function() {
    // This is the javascript for 'db_displayUI.php' which is responsible for DOM (Document Object Manipulation) of the website
    // It can also be useful for key and mousepresses.

    var formLoader_directory = '../snippets/dropdown_formLoader.html';
    
    var loader_directory = '../database/db_loader.php';

    var provinces_directory = '../database/db_dropdown/db_dropdown-Provinces.php';
    var regions_directory = '../database/db_dropdown/db_dropdown-Regions.php';
    var municipalities_directory = '../database/db_dropdown/db_dropdown-Municipalities.php'

    // This part is responsible for loading the database from the right panel ('div#panel_2') of db_displayUI.php
    // It will intially load the database first based from the first value of 'select#tables' when the display was opened.
    $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value});
    
    // Then it will detect if the value was changed (in other words if the user chose a table from the dropdown)
    $("select#tables").change(function(){

        // Next will be the switch..case from which table was chosen. 
        // That table will be sent as a value for loader_directory (db_loader) and proceeds to load every data it contains.
        switch (this.value) {
            case 'pres_candidates': case 'vcpres_candidates':
                $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value});

                // This part was supposed to create or destroy the address dropdown for selecting the address which I will be making in the future

                // remove_dropdown();
            break;

            case 'governor_candidates':
                $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value});

                // remove_dropdown();
                // $("select#tables + br").after($.load(formLoader_directory + " #provinces-dropdown"));
            break;

            case 'mayor_candidates':
                $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value});

                // remove_dropdown();
                // $("select#tables + br").after($.load(formLoader_directory + " #provinces-dropdown"));
                // $("select#tables + br").after($.load(formLoader_directory + " #city_or_municipality-dropdown"));
            break;
            
        }
    });

    // This part will run as a chain for the user to select the specific address
    $("select#regions").load(regions_directory);

    $("select#regions").change(function() {
        $("select#city_or_municipalities option").remove();
        $("select#provinces").load(provinces_directory, {region: document.getElementById("regions").value});
    });
    $("select#provinces").change(function() {
        $("select#city_or_municipalities").load(municipalities_directory, {province: document.getElementById("provinces").value})
    });
});

function remove_dropdown() {
    $("label[for=regions]").remove();
    $("select#regions").remove();

    $("label[for=provinces]").remove();
    $("select#provinces").remove();

    $("label[for=city_or_municipalities").remove();
    $("select#city_or_municipalities").remove();

    $(".blank").remove();
}

// ===== Trash Codes ===== 

// remove_dropdown();

// load('../snippets/dropdown_formLoader.html', document.getElementById("region-dropdown"));

// $("select#tables + br").load(formLoader_directory + " #city_or_municipality-dropdown *");

// var loader = formLoader_directory + " #city_or_municipality-dropdown";
// $("select#tables + br").load(loader, {}, function() { 
//     $(this).after()});

