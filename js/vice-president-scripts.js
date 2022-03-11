$(document).ready(function() {    
    $("#header_UI").load("../snippets/header.html");
    $("#footer_UI").load("../snippets/footer.html");

    $("#cand_selector").load("../snippets/candidate_block.php", {
        table_selected: "vcpres_candidates",
    }, function() {
        $(".cand_block").click(function(event) {
            event.preventDefault();
            load_candidate(this.childNodes[3].outerText);
        })

        if (id) {
            load_candidate(candidate);

            let urlID = encodeURIComponent(id);
            let beActive = document.getElementById(urlID);
            beActive.classList.add("active");
        }
    })
});

function load_candidate(candidate) {
    $("#cand_content").load("../snippets/candidate_info.php", {
        table_selected : "vcpres_candidates",
        candidate : candidate
    })
    console.log(candidate);
}; 
