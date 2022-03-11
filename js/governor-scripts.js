var loader_directory = "../database/db_loaderONCE.php";
var block_directory = "../snippets/candidate_block.php";

var provinces_directory = '../database/db_dropdown/db_dropdown-Provinces.php';
var regions_directory = '../database/db_dropdown/db_dropdown-Regions.php';
var municipalities_directory = '../database/db_dropdown/db_dropdown-Municipalities.php'

var placeholder_dropdown = "<option value='' disabled selected>Select your option</option>";

$(document).ready(function() {
    var table = "governor_candidates";

    $("#header_UI").load("../snippets/header.html");
	$("#footer_UI").load("../snippets/footer.html");

    // $("#mayor-gov-cand").load("../snippets/mayor-gov_cand.html");

    // $("#candidates-info_UI").load("../snippets/candidate_info.html")
	
    $("select#regions").load(regions_directory, function() {
        $("select#regions").prepend(placeholder_dropdown);
        $("select#regions option[value='NATIONAL CAPITAL REGION (NCR)']").remove();

		if (id) {
			load_candidate(candidate, regions, provinces);

			document.getElementById("regions").value = regions;
			$("select#provinces").load(provinces_directory, {region: document.getElementById("regions").value}, 
			function() {
				$("select#provinces").prepend(placeholder_dropdown);
				document.getElementById("provinces").value = provinces;

				$("#cand_panel").load(block_directory, {
					table_selected: table,
					regions: document.getElementById("regions").value,
					provinces: document.getElementById("provinces").value
				}, 
				function() {
					$(".cand_block").click(function(event) {
						event.preventDefault();
						load_candidate(this.childNodes[3].outerText,
							document.getElementById("regions").value,
							document.getElementById("provinces").value);
					})

					let urlID = encodeURIComponent(id);
					let beActive = document.getElementById(urlID);
					beActive.classList.add("active");

					let str = toTitlecase(provinces);

					try {
						if (provincesMap[str].isRegion) {
							simplemaps_countrymap.region_zoom(provincesMap[str].id);
						}
						else {
							simplemaps_countrymap.state_zoom(provincesMap[str].id);
						}
					}
					catch {
						console.log(provincesMap[str].id)
						console.log("Not in Map Database");
						return simplemaps_countrymap.back();
					}
				});
			});
		}
    });

    $("select#regions").change(function() {
		$("select#city_or_municipalities option").remove();
		$("select#provinces").load(provinces_directory, {region: document.getElementById("regions").value}, 
		function() {
			$("select#provinces").prepend(placeholder_dropdown);
		});

        document.getElementById("cand_panel").innerHTML = '<p id="placeholder">Select More Options...</p>';

		// $("#cand_selector").load(block_directory, {
        //     table_selected: table,
        //     regions: document.getElementById("regions").value
        // });

		if (document.getElementById("provinces").value != '') {
			// $("span#mysql_code").text(toMySQLcode(table, document.getElementById("regions").value));
			return simplemaps_countrymap.back();
		}

		// $("span#mysql_code").text(	
		// 	toMySQLcode(table, document.getElementById("regions").value)
		// );
	});

	$("select#provinces").change(function() {
        $("#cand_panel").load(block_directory, {
            table_selected: table,
            regions: document.getElementById("regions").value,
            provinces: document.getElementById("provinces").value
        }, 
		function() {
			$(".cand_block").click(function(event) {
				event.preventDefault();
				load_candidate(this.childNodes[3].outerText,
					document.getElementById("regions").value,
					document.getElementById("provinces").value);
			})
		});

		let str = toTitlecase(this.value);

		try {
			if (provincesMap[str].isRegion) {
				simplemaps_countrymap.region_zoom(provincesMap[str].id);
			}
			else {
				simplemaps_countrymap.state_zoom(provincesMap[str].id);
			}
		}
		catch {
            console.log(provincesMap[str].id)
			console.log("Not in Map Database");
			return simplemaps_countrymap.back();
		}

        // $("span#mysql_code").text(		
		// 	toMySQLcode(table, document.getElementById("regions").value, 
		// 	document.getElementById("provinces").value
		// 	)
		// );
	});
});

function load_candidate(candidate, regions, provinces) {
    $("#cand_content").load("../snippets/candidate_info.php", {
        table_selected : "governor_candidates",
        candidate : candidate,
		regions: regions,
		provinces: provinces.value
    })
}; 