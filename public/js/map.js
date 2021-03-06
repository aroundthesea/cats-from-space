// Specify GIBS tile
var crs4326 = new L.Proj.CRS(
    'EPSG:4326',
    '+proj=longlat +ellps=WGS84 +datum=WGS84 +no_defs', {
    origin: [-180, 100], 
    resolutions: [
        0.5625,
        0.28125,
        0.140625,
        0.0703125,
        0.03515625,
        0.017578125,
        0.0087890625,
        0.00439453125,
        0.002197265625
    ]}
);
var control;
/**
 *
 * @param [date] String in the format "YYYY-MM-DD" - Defaults to "2015-04-11". Should default to yesterday.
 * @returns {L.TileLayer} New layer to add to map
 */
function makeGIBSLayer(date) {
    var newLayer;
    date = date || "2015-04-11";

    newLayer = new L.TileLayer('http://map1a.vis.earthdata.nasa.gov/wmts-geo/wmts.cgi?TIME='+date+'&SERVICE=WMTS&REQUEST=GetTile&VERSION=1.0.0&LAYER=MODIS_Terra_CorrectedReflectance_TrueColor&STYLE=&TILEMATRIXSET=EPSG4326_250m&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}&FORMAT=image%2Fjpeg', {
        minZoom: 2,
        maxZoom: 9,
        attribution: 'GIBS',
        tileSize: 512,
        noWrap: true,
        continuousWorld: true
    });

    return newLayer;
}

function resetLayerControls(date) {
    var dayBefore, dayAfter, dateStr;
    date = date || "2015-04-11";
    currentDate = date;

    date = new Date(date);

    for(singleLayer in control._layers) {
        var actualLayer = control._layers[singleLayer];
        control.removeLayer(actualLayer.layer);
    }

    dayAfter = new Date(date.getTime() + 86400000);

    if(dayAfter.getTime() < new Date().getTime()) {
        dateStr = dayAfter.toISOString().substring(0,10);
        control.addBaseLayer(makeGIBSLayer(dateStr), dateStr);
    }

    dayBefore = new Date(date.getTime() - 86400000);
    dateStr = dayBefore.toISOString().substring(0,10);
    control.addBaseLayer(makeGIBSLayer(dateStr), dateStr);
}

// GIBS tile layer
var currentDate = "2015-04-11";
var gibsGeographic = makeGIBSLayer(currentDate);

// Map
var map = new L.Map('map', {
    zoomControl: true,
    crs: crs4326,
    tms: true,
    continuousWorld: true,
    center: [0, 0],
    zoom: 2
});

control = L.control.layers({
    "2015-04-11": gibsGeographic.addTo(map),
    "2015-04-10": makeGIBSLayer("2015-04-10")
}, {},
    {
        collapsed: false
    }
);

control.addTo(map);

map.on('baselayerchange', function(e){
    var singleLayer;

    for(singleLayer in control._layers) {
        var actualLayer = control._layers[singleLayer];
        if(actualLayer.layer._leaflet_id == e.layer._leaflet_id) {
            $("#currentLabel").text(actualLayer.name);
            resetLayerControls(actualLayer.name);
        }
    }
});

// Define marker icon
var icon = L.MakiMarkers.icon({
    icon: "star", 
    color: "#ffa200", 
    size: "l"
});

// Add marker to map by clicking
map.on('click', function(e) {
    var lat = e.latlng.lat.toFixed(4);
    var lng = e.latlng.lng.toFixed(4);
    var tag = prompt('Enter a tag');

    if(!tag || tag === "") return;

    L.marker([lat, lng], {
        icon: icon,
        draggable: true,
        clickable: true,
        bounceOnAdd: true
    }).bindPopup(
        '<strong>Location:</strong> ' + lat + ', ' + lng + '<br />' + 
        '<strong>Tags:</strong> ' + tag
    ).addTo(map);

    $.post("/data",{
        "lat": lat,
        "lon": lng,
        "tag": tag,
        "zoom": map._zoom,
        "date": currentDate
    });
});

var successCallback =  function(response) {
    var point, i;

    for(i in response){
        point = response[i];

        L.marker([point.lat, point.lon], {
            icon: icon,
            draggable: false,
            clickable: true,
            bounceOnAdd: true
        }).bindPopup(
            '<strong>Coordinates:</strong> ' + point.lat.toFixed(4) + ', ' + point.lon.toFixed(4) + '<br />' +
            '<strong>Tags:</strong> ' + point.tag
        ).addTo(map)
    }
};

$.get("/data", null, successCallback);