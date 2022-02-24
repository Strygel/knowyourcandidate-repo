// simplemaps_select.map = simplemaps_countrymap;

var provinces_directory = 'database/db_dropdown/db_dropdown-Provinces.php';
var regions_directory = 'database/db_dropdown/db_dropdown-Regions.php';
var municipalities_directory = 'database/db_dropdown/db_dropdown-Municipalities.php'

var placeholder_dropdown = "<option value='' disabled selected>Select your option</option>";


$(document).ready(function(){
	// var state_list=$("#state_list")

	// state_list.append($("<option></option>"));
	// state_list.append($("<option></option>").attr("value", '-1').text('----------- Zoom out -----------'));
	// for (var state in simplemaps_countrymap_mapdata.state_specific){
	// 	var key=state;
	// 	var value=simplemaps_countrymap_mapdata.state_specific[state].name;
	// 	 state_list.append($("<option></option>").attr("value",key).text(value)); 
	// }						
	// state_list.chosen();
	// state_list.change(function(){
	// 	var id=$(this).val();
	// 	// simplemaps_countrymap.state_zoom(id);

	// 	let value = simplemaps_countrymap_mapdata.state_specific[id].name
	// 	$("#clicked_state").text(value);
	// 	// $("#mysql_code").text(value.toUpperCase());
	// });

	var table = "mayor_candidates"; // can also be mayor_candidates

	if (table == "governor_candidates") {
		$("select#regions").load(regions_directory, function() {
			$("select#regions").prepend(placeholder_dropdown);
			$("select#regions option[value='NATIONAL CAPITAL REGION (NCR)']").remove();
		});
	}
	else if (table == "mayor_candidates") {
		$("select#regions").load(regions_directory, function() {
			$("select#regions").prepend(placeholder_dropdown);
		});
	}


	$("select#regions").change(function() {
		$("select#city_or_municipalities option").remove();
		$("select#provinces").load(provinces_directory, {region: document.getElementById("regions").value}, 
		function() {
			$("select#provinces").prepend(placeholder_dropdown);
		});

		$("span#mysql_code").text(	
			toMySQLcode(table, document.getElementById("regions").value)
		);
		
		if (document.getElementById("provinces").value != '' || document.getElementById("city_or_municipalities").value != '') {
			$("span#mysql_code").text(toMySQLcode(table, document.getElementById("regions").value));
			return simplemaps_countrymap.back();
		}

	});

	$("select#provinces").change(function() {
		$("select#city_or_municipalities").load(municipalities_directory, {province: document.getElementById("provinces").value},
		function() {
			$("#city_or_municipalities").prepend(placeholder_dropdown);
		});

		$("span#mysql_code").text(		
			toMySQLcode(table, document.getElementById("regions").value, 
			document.getElementById("provinces").value
			)
		);

		let str = toTitlecase(this.value);
		try {
			if (provinces[str].isRegion) {
				simplemaps_countrymap.region_zoom(provinces[str].id);
			}
			else {
				simplemaps_countrymap.state_zoom(provinces[str].id);
			}
		}
		catch {
			console.log("Not in Map Database");
			return simplemaps_countrymap.back();
		}
	});

	$("select#city_or_municipalities").change(function() {
		$("span#mysql_code").text(
			toMySQLcode(table, document.getElementById("regions").value, 
			document.getElementById("provinces").value, 
			document.getElementById("city_or_municipalities").value
			)
		);

		let str = toTitlecase(this.value);
		if (document.getElementById("regions").value == "NATIONAL CAPITAL REGION (NCR)") {

			simplemaps_countrymap.region_zoom("20", function() {
				simplemaps_countrymap.state_zoom(city_or_municipalities[str]);
				// simplemaps_countrymap_mapdata.state_specific[city_or_municipalities[str]].color = '#ffffff';
			});
			
		}

	});


})

// simplemaps_countrymap.hooks.zoomable_click_state = function(id) {
// 	$("#state_list").val(id);
// 	$("#state_list").trigger("chosen:updated")
// 	let value = simplemaps_countrymap_mapdata.state_specific[id].name
// 	$("#clicked_state").text(value);
// 	$("#mysql_code").text(value.toUpperCase());
// 	// document.getElementById("state_list").selected = id;
// }

// simplemaps_countrymap.hooks.zoomable_click_region = function(id) {
// 	$("#state_list").val(id);
// 	$("#state_list").trigger("chosen:updated")
// 	let value = simplemaps_countrymap_mapdata.regions[id].name
// 	$("#clicked_state").text(value);
// 	$("#mysql_code").text(value.toUpperCase());
// }

// simplemaps_countrymap.hooks.back = function() {
// 	$("select#regions").val('');
// 	$("select#provinces option").remove();
// 	$("select#city_or_municipalities option").remove();
// }