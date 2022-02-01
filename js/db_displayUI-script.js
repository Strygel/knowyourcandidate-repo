$(document).ready(function() {
    // This is the javascript for 'db_displayUI.php' which is responsible for DOM (Document Object Model) manipulation of the website
    // It can also be useful for key and mousepresses.    
    
    var loader_directory = '../database/db_loader.php';
    var uploader_directory = '../database/db_uploader.php';
    var remover_directory = '../database/db_remover.php';

    var provinces_directory = '../database/db_dropdown/db_dropdown-Provinces.php';
    var regions_directory = '../database/db_dropdown/db_dropdown-Regions.php';
    var municipalities_directory = '../database/db_dropdown/db_dropdown-Municipalities.php'

    var placeholder_dropdown = "<option value='' disabled selected>Select your option</option>";

    // This part is responsible for loading the database from the right panel of db_displayUI.php
    // It will intially load the database first based from the first value of '#tables' when the display was opened.
    load_database(document.getElementById("tables").value);
    
    // This part will prevent the browser for updating the website when the form is submitted and eventually send it to the database
    $('form').on('submit', function(event) {
        event.preventDefault();

        let tables = document.getElementById("tables").value;

        let regions = document.getElementById("regions");
        let regions_value = (regions) ? regions.value : null;

        let provinces = document.getElementById("provinces");
        let provinces_value = (provinces) ? provinces.value : null;

        let city_or_municipalities = document.getElementById("city_or_municipalities");
        let city_or_municipalities_value = (city_or_municipalities) ? city_or_municipalities.value : null;

        $.ajax({
            type: 'POST',
            url: uploader_directory,
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data, textStatus, jqXHR) {
                load_database(
                    tables, 
                    regions_value,
                    provinces_value,
                    city_or_municipalities_value
                    );

                document.querySelector('form').reset();
                document.getElementById('tables').value = tables;
                if (regions) {
                    document.getElementById('regions').value = regions_value;
                }
                if (provinces) {
                    document.getElementById('provinces').value = provinces_value;
                }
                if (city_or_municipalities) {
                    document.getElementById('city_or_municipalities').value = city_or_municipalities_value;
                }

                console.log("Status: " + textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Status: " + textStatus);
                console.error("Description: " + errorThrown);
            },
        });
    });

    // When clear was pressed, not only the text in the inputs were erased but also the dropdowns will be removed and move to pres_candidates once again
    $("#clear").click(function() {
        remove_dropdown();
        load_database('pres_candidates');
    });

    // This part is where the database were loaded in #panel_2
    function load_database (table_selected, region = null, province = null, municipality = null) {
        switch (table_selected) {
            case 'pres_candidates': case 'vcpres_candidates':
                $("div#panel_2").load(loader_directory, {
                    table_selected : table_selected
                }, 
                    function() {
                        buttons();
                });
            break;
    
            case 'governor_candidates':
                $("div#panel_2").load(loader_directory, {
                    table_selected : table_selected,
                    regions: region,
                    provinces: province
                }, 
                    function() {
                        buttons();
                });
            break;
    
            case 'mayor_candidates':
                $("div#panel_2").load(loader_directory, {
                    table_selected : table_selected,
                    regions: region,
                    provinces: province,
                    city_or_municipalities: municipality
                },
                    function() {
                        buttons();
                    }
                );
            break;
        }
    }

    // This part is responsible for the showing and hiding the buttons from each cells as well as the function for expand and delete database  
    function buttons() {
        $(".candidate_card").prepend("<button class='toggle_expand' style='display: none;'>Show</button>");
        $(".candidate_card").prepend("<button class='remove_db' style='display: none;'>Delete</button>");

        for (let i = 1; i <= $(".cells").length; i++) {
            $(".cells:nth-child(" + i + ")").hover(
                function() {
                    $(".cells:nth-child(" + i + ") .toggle_expand").show();
                    $(".cells:nth-child(" + i + ") .remove_db").show();
                }, 
                function() {
                    $(".cells:nth-child(" + i + ") .toggle_expand").hide();
                    $(".cells:nth-child(" + i + ") .remove_db").hide();
                });
        }

        $(".remove_db").click(function() {
            let candidate = this.parentNode.childNodes[5].innerText;
            let birthdate = this.parentNode.childNodes[11].childNodes[1].nodeValue;
    
            let tables = document.getElementById("tables").value; 
            let regions = document.getElementById("regions");
            let provinces = document.getElementById("provinces");
            let city_or_municipalities = document.getElementById("city_or_municipalities");
    
            let prompt = confirm("Are you sure that you want to delete this database?");
                
            if(prompt == true) {
                $.post(remover_directory, {
                    table_selected: document.getElementById("tables").value,
                    candidate: candidate,
                    birthdate: birthdate
                })
                .done(function(jqXHR) {
                    load_database(
                        tables,
                        (regions) ? regions.value : null,
                        (provinces) ? provinces.value : null,
                        (city_or_municipalities) ? city_or_municipalities.value : null
                    );

                    console.log(candidate)
    
                    console.log("Removing Success");
                })
                .fail(function(jqXHR) {
                    console.log("Removing Failed");
                })
    
            }
            else {
                console.log("Removing Cancelled");
            }
        });
    
        $(".toggle_expand").click(function() {
            let card = this.parentNode;

            if (this.innerText == 'Show') {
                card.style.height = "fit-content";
                this.innerText = "Hide";
            }
            else if (this.innerText == 'Hide')
            {   
                card.style.height = "175px";
                this.innerText = "Show";
            }
        })
    }
 
    // This will detect if the value was changed (in other words if the user chose a table from the dropdown)
    $("select#tables").change(function(){
        // Next will be the switch..case from which table was chosen. 
        // That table will be sent as a value for loader_directory (db_loader) and proceeds to load every data it contains.
        switch (this.value) {
            case 'pres_candidates': case 'vcpres_candidates':
                $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value}, 
                    function() {
                        buttons();
                });

                remove_dropdown();
            break;

            case 'governor_candidates':
                $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value}, 
                    function() {
                        buttons();
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
                        buttons();
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

        // This portion is for selecting regions, provinces and city/municipalities in the Database Uploader
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
                buttons();
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
                buttons();
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
                buttons();
            });
        });
    });
});