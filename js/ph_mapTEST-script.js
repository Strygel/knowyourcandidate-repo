// simplemaps_select.map = simplemaps_countrymap;
$(document).ready(function(){
	var state_list=$("#state_list")

	state_list.append($("<option></option>"));
	state_list.append($("<option></option>").attr("value", '-1').text('----------- Zoom out -----------'));
	for (var state in simplemaps_countrymap_mapdata.state_specific){
		var key=state;
		var value=simplemaps_countrymap_mapdata.state_specific[state].name;
		 state_list.append($("<option></option>").attr("value",key).text(value)); 
	}						
	state_list.chosen();
	state_list.change(function(){
		var id=$(this).val();
		simplemaps_countrymap.state_zoom(id);

		let value = simplemaps_countrymap_mapdata.state_specific[id].name
		$("#clicked_state").text(value);
		// $("#mysql_code").text(value.toUpperCase());
	});					
})

simplemaps_countrymap.hooks.zoomable_click_state = function(id) {
	$("#state_list").val(id);
	$("#state_list").trigger("chosen:updated")
	let value = simplemaps_countrymap_mapdata.state_specific[id].name
	$("#clicked_state").text(value);
	$("#mysql_code").text(value.toUpperCase());
	// document.getElementById("state_list").selected = id;
}

simplemaps_countrymap.hooks.back = function(){
	$("#state_list").val('');
	$("#state_list").trigger("chosen:updated")

	$("#clicked_state").text('');
	// $("#mysql_code").text('');
}



// simplemaps_countrymap.hooks.zoomable_click_region = function(id) {

// }


 


