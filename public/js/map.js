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

// GIBS tile layer
var gibsGeographic = new L.TileLayer('http://map1a.vis.earthdata.nasa.gov/wmts-geo/wmts.cgi?TIME=2013-11-04&SERVICE=WMTS&REQUEST=GetTile&VERSION=1.0.0&LAYER=MODIS_Terra_CorrectedReflectance_TrueColor&STYLE=&TILEMATRIXSET=EPSG4326_250m&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}&FORMAT=image%2Fjpeg', {
    minZoom: 2,
    maxZoom: 8,
    attribution: 'NASA GIBS',
    tileSize: 512,
    noWrap: true,
    continuousWorld: true
});

// Map
var map = new L.Map('map', {
    zoomControl: true,
    crs: crs4326,
    tms: true,
    continuousWorld: true,
    center: [0, 0],
    zoom: 2,
    layers: [gibsGeographic]
});

// Track coordinates
// map.on('mousemove', function(e) {
//     var coordinates = document.getElementById("coordinates");
//     coordinates.innerHTML = e.latlng.lat.toFixed(4) + ", " + e.latlng.lng.toFixed(4);
// });

// Define marker icon
var myIcon = L.icon({
    iconUrl: 'http://leafletjs.com/dist/images/marker-icon.png',
    popupAnchor: [-3, -76]
});

// Add marker to map by clicking
map.on('click', function(e) {
    L.marker([e.latlng.lat, e.latlng.lng], {
        icon: myIcon,
        draggable: true,
        clickable: true
    }).addTo(map);
});