$(document).ready(function(){ 
    $("#cand_block").load("../snippets/candidate_block.php", {
        table_selected: "vcpres_candidates"
    });
})