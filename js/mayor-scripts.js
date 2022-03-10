var loader_directory = "../database/db_loaderONCE.php";
var block_directory = "../snippets/candidate_block.php";

var provinces_directory = '../database/db_dropdown/db_dropdown-Provinces.php';
var regions_directory = '../database/db_dropdown/db_dropdown-Regions.php';
var municipalities_directory = '../database/db_dropdown/db_dropdown-Municipalities.php'

var placeholder_dropdown = "<option value='' disabled selected>Select your option</option>";


$(document).ready(function() {
    $("#header_UI").load("../snippets/header.html");

    $("#candidates-info_UI").load("../snippets/candidate_info.php")

    var table = "mayor_candidates";
    var region_NCR = "NATIONAL CAPITAL REGION (NCR)";

    simplemaps_countrymap.region_zoom(20);

    $("select#provinces").load(provinces_directory, {region: region_NCR}, 
    function() {
        $("select#provinces").prepend(placeholder_dropdown);

        if (id) {
            load_candidate(candidate, regions, provinces, city_or_municipalities);

            document.getElementById("provinces").value = provinces;
                
            $("select#city_or_municipalities").load(municipalities_directory, {province: document.getElementById("provinces").value},
            function() {
                $("select#city_or_municipalities").prepend(placeholder_dropdown);
                document.getElementById("city_or_municipalities").value = city_or_municipalities;

                $("#cand_panel").load(block_directory, {
                    table_selected: table,
                    regions: region_NCR,
                    provinces: document.getElementById("provinces").value,
                    city_or_municipalities: document.getElementById("city_or_municipalities").value,
                }, 
                function() {
                    let urlID = encodeURIComponent(id);
                    let beActive = document.getElementById(urlID);
                    beActive.classList.add("active");

                    console.log(document.getElementById("provinces").value);

                    $(".cand_block").click(function(event) {
                        event.preventDefault();
                        load_candidate(this.childNodes[3].outerText,
                            region_NCR,
                            document.getElementById("provinces").value,
                            document.getElementById("city_or_municipalities").value);
                    })
                    
                });
            })
        }
    });

	$("select#provinces").change(function() {
        $("select#city_or_municipalities").load(municipalities_directory, {
            province: document.getElementById("provinces").value
        },
        function() {
            $("select#city_or_municipalities").prepend(placeholder_dropdown);
        });
	});

    $("select#city_or_municipalities").change(function() {
        $("#cand_panel").load(block_directory, {
            table_selected: table,
            regions: region_NCR,
            provinces: document.getElementById("provinces").value,
            city_or_municipalities: document.getElementById("city_or_municipalities").value
        }, 
		function() {
			$(".cand_block").click(function(event) {
				event.preventDefault();
				load_candidate(this.childNodes[3].outerText,
					region_NCR,
					document.getElementById("provinces").value,
                    document.getElementById("city_or_municipalities").value)
			})
		});
    });
});

function load_candidate(candidate, regions, provinces, city_or_municipalities) {
    $("#cand_content").load("../snippets/candidate_info.php", {
        table_selected : 'mayor_candidates',
        candidate : candidate,
		regions: regions,
		provinces: provinces,
        city_or_municipalities: city_or_municipalities 
    })
}; 