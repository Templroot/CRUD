// Добавление карты на страницу в map
DG.then(function () {
    var map = DG.map("map", {
        center: [59.934, 30.311],
        //zoom: 100,
        fullscreenControl: false,
        maxBounds: [  //Максимальное отдадение от карты
            [59.54, 29.92], 
            [60.309665, 30.757732],
        ],
        minZoom: 10
    });

    // Группы маркеров
    var markers = DG.featureGroup();
    var group, myIcon_O;

    myIcon_O = DG.icon({  // инициализация иконки 
        iconUrl: "M_mark.png", // ссылка на файл с иконкой 
        iconSize: [48, 48], // размер иконки 
        
    });
    
var infoframe = document.getElementById("info");
var infobox = document.getElementById("infobox");
    // Добавление объектов


    //----------------------------------------------
    //---------------------Маркеры------------------------
    var marker_O0 = DG.marker([59.911149, 30.444505], {icon: myIcon_O}).addTo(markers).bindPopup('М.Видео');
    var marker_O1 = DG.marker([59.898796, 30.422673], {icon: myIcon_O}).addTo(markers).bindPopup('ВПитереБыт');
    var marker_O2 = DG.marker([59.896940, 30.404170], {icon: myIcon_O}).addTo(markers).bindPopup('Техно-Онлайн');
    var marker_O3 = DG.marker([59.929788, 30.414690], {icon: myIcon_O}).addTo(markers).bindPopup('Digital Reseller');
    var marker_O4 = DG.marker([59.920213, 30.464692], {icon: myIcon_O}).addTo(markers).bindPopup('DNS ');
    var marker_O5 = DG.marker([59.932572, 30.434272], {icon: myIcon_O}).addTo(markers).bindPopup('Ситилинк ');



    //----------------------------------------
    group = DG.featureGroup([marker_O0, marker_O1, marker_O2, marker_O3, marker_O4, marker_O5]);
    group.addTo(map);
    group.on("click", function (e) {                //
        map.setView([e.latlng.lat, e.latlng.lng]);  // Централизация при клике на маркер 
    });
    // Прорисовка группы маркеров на карте
    markers.addTo(map);
    // Центровка карты по группе маркеров
    map.fitBounds(markers.getBounds());


    // Обработка событий маркеров и смена в iframe


    marker_O0.on("click", function (e) {
        infobox.style.visibility = "visible";
        infoframe.src = "Frame/M_T0.html";
    });
    
    marker_O1.on("click", function (e) {
        infobox.style.visibility = "visible";
        infoframe.src = "Frame/M_T1.html";
    });

    marker_O2.on("click", function (e) {
        infobox.style.visibility = "visible";
        infoframe.src = "Frame/M_T2.html";
    });

    marker_O3.on("click", function (e) {
        infobox.style.visibility = "visible";
        infoframe.src = "Frame/M_T3.html";
    });

    marker_O4.on("click", function (e) {
        infobox.style.visibility = "visible";
        infoframe.src = "Frame/M_T4.html";
    });

    marker_O5.on("click", function (e) {
        infobox.style.visibility = "visible";
        infoframe.src = "Frame/M_T5.html";
    });


});


//----------------------------------------------

