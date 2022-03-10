$(document).ready(function(){ 
    $("#cand_block").load("../snippets/candidate_block.php", {
        table_selected: "vcpres_candidates"
    });
})

$(document).ready(function() {
    $("#header_UI").load("../snippets/header.html");
    console.log(test);
});

$(document).ready(function() {
    $("#candidates-info_UI").load("../snippets/candidate_info.html")
});