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

crs4326 = new L.Proj.CRS(
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

gibsGeographic = makeGIBSLayer();

leafmap = new L.Map('map', {
    zoomControl: true,
    crs: crs4326,
    tms: true,
    continuousWorld: true,
    center: [0, 0],
    zoom: 2
});

control = L.control.layers({
    'Yesterday': gibsGeographic.addTo(leafmap),
    'Day Before': makeGIBSLayer("2015-04-10")
}, {},
    {
        collapsed: false
    }
);

control.addTo(leafmap);

leafmap.on('baselayerchange', function(e){
    var singleLayer;
    console.log("Base layer changed");
    console.log(arguments);

    for(singleLayer in control._layers) {
        if(singleLayer.layer == e.layer) {
            console.log(singleLayer.name);
        }
    }
});
