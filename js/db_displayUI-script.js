$(document).ready(function() {
    // This is the javascript for 'db_displayUI.php' which is responsible for DOM (Document Object Model) manipulation of the website
    // It can also be useful for key and mousepresses.

    var formLoader_directory = '../snippets/dropdown_formLoader.html';
    
    var loader_directory = '../database/db_loader.php';

    var provinces_directory = '../database/db_dropdown/db_dropdown-Provinces.php';
    var regions_directory = '../database/db_dropdown/db_dropdown-Regions.php';
    var municipalities_directory = '../database/db_dropdown/db_dropdown-Municipalities.php'

    var placeholder_dropdown = "<option value='' disabled selected>Select your option</option>";


    // This part is responsible for loading the database from the right panel ('div#panel_2') of db_displayUI.php
    // It will intially load the database first based from the first value of 'select#tables' when the display was opened.
    // $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value});
    
    // Then it will detect if the value was changed (in other words if the user chose a table from the dropdown)
    $("select#tables").change(function(){

        // Next will be the switch..case from which table was chosen. 
        // That table will be sent as a value for loader_directory (db_loader) and proceeds to load every data it contains.
        switch (this.value) {
            case 'pres_candidates': case 'vcpres_candidates':
                $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value}, 
                    function() {
                        remove_cell_button();
                });

                remove_dropdown();
            break;

            case 'governor_candidates':
                $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value}, 
                    function() {
                        remove_cell_button();
                });

                remove_dropdown();

                $("select#tables + br + br").after(regions_dropdown() + provinces_dropdown() + "<br class='blank'>");
                $("select#regions").load(regions_directory, function() {
                    $("select#regions").prepend(placeholder_dropdown);
                });

            break;

            case 'mayor_candidates':
                $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value},
                    function() {
                        remove_cell_button();
                    }
                );
                
                remove_dropdown();

                $("select#tables + br + br").after(regions_dropdown() + provinces_dropdown() + city_or_municipality_dropdown() + "<br class='blank'>");
                $("select#regions").load(regions_directory, 
                function() {
                    $("select#regions").prepend(placeholder_dropdown);
                });
            break;
        }

        $("select#regions").change(function() {
            $("select#city_or_municipalities option").remove();
            $("select#provinces").load(provinces_directory, {region: document.getElementById("regions").value}, 
            function() {
                $("select#provinces").prepend(placeholder_dropdown);
            });

            $("div#panel_2").load(loader_directory, {
                table_selected : document.getElementById("tables").value,
                regions: document.getElementById("regions").value
            },
            function() {
                remove_cell_button();
            });
        });

        $("select#provinces").change(function() {
            $("select#city_or_municipalities").load(municipalities_directory, {province: document.getElementById("provinces").value},
            function() {
                $("#city_or_municipalities").prepend(placeholder_dropdown);
            });

            $("div#panel_2").load(loader_directory, {
                table_selected : document.getElementById("tables").value,
                regions: document.getElementById("regions").value,
                provinces: document.getElementById("provinces").value
            },
            function() {
                remove_cell_button();
            });
        });

        $("select#city_or_municipalities").change(function() {
            $("div#panel_2").load(loader_directory, {
                table_selected : document.getElementById("tables").value,
                regions: document.getElementById("regions").value,
                provinces: document.getElementById("provinces").value,
                city_or_municipalities: document.getElementById("city_or_municipalities").value
            }, 
            function() {
                remove_cell_button();
            });
        });
    });


});