$(document).ready(function(){ 
    $("#cand_block").load("../snippets/candidate_block.php", {
        table_selected: "pres_candidates"
    });
})

$(document).ready(function() {
    $("#header_UI").load("../snippets/header.html");
    console.log(test);
});
