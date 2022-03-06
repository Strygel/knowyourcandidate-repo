function toTitlecase(str) {
    str = str.toLowerCase();
    str = str.split(' ');

    for (var i = 0; i < str.length; i++) {
        str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1);  
    }
    return str.join(' ');
}

function toMySQLcode(table, region, province = null, city_or_municipality = null) {
    if (province == null && city_or_municipality == null) {
        return `SELECT * from ${table} from WHERE regions='${region}'`;
    }
    else if (city_or_municipality == null) {
        return `SELECT * from ${table} from WHERE regions='${region}' AND provinces='${province}'`;
    }
    else {
        return `SELECT * from ${table} from WHERE regions='${region}' AND provinces='${province}' 
        AND city_or_municipalities='${city_or_municipality}'`;
    }
}

var provinces = {
    "Abra": {isRegion: false, id: "PHL2542"},
    "Agusan Del Norte": {isRegion: true, id: "12"},
    "Agusan Del Sur": {isRegion: false, id: "PHL2588"},
    "Aklan": {isRegion: false, id: "PHL2525"},
    "Albay": {isRegion: false, id: "PHL2536"},
    "Antique": {isRegion: false, id: "PHL2526"},
    "Apayao": {isRegion: false, id: "PHL2546"},
    "Aurora": {isRegion: false, id: "PHL2549"},
    "Basilan": {isRegion: true, id: "19"},
    "Bataan": {isRegion: false, id: "PHL2555"},
    "Batanes": {isRegion: false, id: "PHL2543"},
    "Batangas": {isRegion: false, id: "PHL2564"},
    "Benguet": {isRegion: true, id: "1"},
    "Biliran": {isRegion: false, id: "PHL2581"},
    "Bohol": {isRegion: false, id: "PHL2513"},
    "Bukidnon": {isRegion: false, id: "PHL2589"},
    "Bulacan": {isRegion: false, id: "PHL2565"},
    "Cagayan": {isRegion: false, id: "PHL2545"},
    "Camarines Norte": {isRegion: false, id: "PHL2537"},
    "Camarines Sur": {isRegion: true, id: "6"},
    "Camiguin": {isRegion: false, id: "PHL2590"},
    "Capiz": {isRegion: false, id: "PHL2528"},
    "Catanduanes": {isRegion: false, id: "PHL2539"},
    "Cavite": {isRegion: false, id: "PHL2563"},
    "Cebu": {isRegion: true, id: "10"},
    "Compostela Valley": {isRegion: false, id: "PHL2592"},
    "Cotabato": {isRegion: false, id: "PHL2579"},
    "Davao Del Norte": {isRegion: false, id: "PHL2591"},
    "Davao Del Sur": {isRegion: false, id: "PHL2596"},
    // "Davao Occidental": {isRegion: false, id: ""},
    "Davao Oriental": {isRegion: false, id: "PHL2597"},
    // "Dinagat Islands": {isRegion: false, id: ""},
    "Eastern Samar": {isRegion: false, id: "PHL2582"},
    "Guimaras": {isRegion: false, id: "PHL2530"},
    "Ifugao": {isRegion: false, id: "PHL2551"},
    "Ilocos Norte": {isRegion: false, id: "PHL2547"},
    "Ilocos Sur": {isRegion: false, id: "PHL2548"},
    "Iloilo": {isRegion: true, id: "8"},
    "Isabela": {isRegion: true, id: "0"},
    "Kalinga": {isRegion: false, id: "PHL4931"},
    "La Union": {isRegion: false, id: "PHL2561"},
    "Laguna": {isRegion: false, id: "PHL2566"},
    "Lanao Del Norte": {isRegion: false, id: "PHL2573"},
    "Lanao Del Sur": {isRegion: false, id: "PHL2574"},
    "Leyte": {isRegion: true, id: "11"},
    "Marinduque": {isRegion: false, id: "PHL2569"},
    "Maguindanao": {isRegion: true, id: "15"},
    "Masbate": {isRegion: false, id: "PHL2540"},
    "Misamis Occidental": {isRegion: false, id: "PHL2523"},
    "Misamis Oriental": {isRegion: false, id: "PHL2595"},
    "Mountain Province": {isRegion: false, id: "PHL2552"},
    "Negros Occidental": {isRegion: true, id: "9"},
    "Negros Oriental": {isRegion: false, id: "PHL2516"},
    "Northern Samar": {isRegion: false, id: "PHL2586"},
    "Nueva Ecija": {isRegion: false, id: "PHL2557"},
    "Nueva Vizcaya": {isRegion: false, id: "PHL2553"},
    "Occidental Mindoro": {isRegion: false, id: "PHL2570"},
    "Oriental Mindoro": {isRegion: false, id: "PHL2571"},
    "Palawan": {isRegion: true, id: "7"},
    "Pampanga": {isRegion: true, id: "4"},
    "Pangasinan": {isRegion: true, id: "2"},
    "Quezon": {isRegion: true, id: "5"},
    "Quirino": {isRegion: false, id: "PHL2554"},
    "Rizal": {isRegion: false, id: "PHL2567"},
    "Romblon": {isRegion: false, id: "PHL2535"},
    "Samar": {isRegion: false, id: "PHL2584"},
    "Sarangani": {isRegion: false, id: "PHL2598"},
    "Siquijor": {isRegion: false, id: "PHL2517"},
    "Sorsogon": {isRegion: false, id: "PHL2541"},
    "South Cotabato": {isRegion: false, id: "PHL2599"},
    "Southern Leyte": {isRegion: false, id: "PHL2585"},
    "Sultan Kudarat": {isRegion: false, id: "PHL2580"},
    "Sulu": {isRegion: false, id: "PHL2524"},
    "Surigao Del Norte": {isRegion: false, id: "PHL2593"},
    "Surigao Del Sur": {isRegion: false, id: "PHL2594"},
    "Tarlac": {isRegion: false, id: "PHL2556"},
    "Tawi-tawi": {isRegion: false, id: "PHL2511"},
    "Zambales": {isRegion: true, id: "3"},
    "Zamboanga Del Norte": {isRegion: false, id: "PHL2520"},
    "Zamboanga Del Sur": {isRegion: true, id: "16"},
    "Zamboanga Sibugay": {isRegion: false, id: "PHL2521"},
};

// Only applicable for Metro Manila only
var city_or_municipalities = {
    "City Of Manila": "PHL5543",
    "City Of Mandaluyong": "PHL5542",
    "City Of Marikina": "PHL5550",
    "City Of Pasig": "PHL5552",
    "Quezon City": "PHL5549",
    "City Of San Juan": "PHL5551",
    "Caloocan City": "PHL5545",
    "City Of Malabon": "PHL5546",
    "City Of Navotas": "PHL5544",
    "City Of Valenzuela": "PHL5547",
    "City Of Las Piñas": "PHL5556",
    "City Of Makati": "PHL5553",
    "City Of Muntinlupa": "PHL5557",
    "City Of Parañaque": "PHL5555",
    "Pasay City": "PHL5554",
    "Pateros": "PHL5559",
    "Taguig City": "PHL5558"
}

