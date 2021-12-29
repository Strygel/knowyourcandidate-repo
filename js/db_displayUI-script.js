$(document).ready(function() {
    var formLoader_directory = '../snippets/dropdown_formLoader.html';
    
    var loader_directory = '../database/db_loader.php';
    var provinces_directory = '../database/db_dropdown/db_dropdown-Provinces.php';
    var regions_directory = '../database/db_dropdown/db_dropdown-Regions.php';
    var municipalities_directory = '../database/db_dropdown/db_dropdown-Municipalities.php'

    $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value});
    $("select#regions").load(regions_directory);
    
    $("select#tables").change(function(){
        switch (this.value) {
            case 'pres_candidates': case 'vcpres_candidates':
                $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value});

                // remove_dropdown();
            break;

            case 'governor_candidates':
                $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value});

                // remove_dropdown();

                // load('../snippets/dropdown_formLoader.html', document.getElementById("region-dropdown"));
                // $("select#tables + br").after($.load(formLoader_directory + " #city_or_municipality-dropdown"));
                // $("select#tables + br").load(formLoader_directory + " #city_or_municipality-dropdown *");
            break;

            case 'mayor_candidates':
                $("div#panel_2").load(loader_directory, {table_selected : document.getElementById("tables").value});

                // remove_dropdown();
                
                // var loader = formLoader_directory + " #city_or_municipality-dropdown";
                // $("select#tables + br").load(loader, {}, function() { 
                //     $(this).after()});
            break;
            
        }
    });

    $("select#regions").change(function() {
        $("select#city_or_municipalities option").remove();
        $("select#provinces").load(provinces_directory, {region: document.getElementById("regions").value});
    });
    $("select#provinces").change(function() {
        $("select#city_or_municipalities").load(municipalities_directory, {province: document.getElementById("provinces").value})
    });
});

function remove_dropdown() {
    $("label[for=regions]").remove();
    $("select#regions").remove();

    $("label[for=provinces]").remove();
    $("select#provinces").remove();

    $("label[for=city_or_municipalities").remove();
    $("select#city_or_municipalities").remove();

    $(".blank").remove();
}
