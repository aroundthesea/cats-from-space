// Sample access token
L.mapbox.accessToken = 'pk.eyJ1IjoiYXJvdW5kdGhlc2VhIiwiYSI6InVQLXRtUWcifQ.mWzq_PBpWyvhNvMuQctMDw';

// Render map and view
var map = L.mapbox.map('map', 'examples.map-i86nkdio', { 
	zoomControl: false
}).setView([31, -95.50], 4);

// Zoom control location
new L.Control.Zoom({ 
	position: 'topright'
}).addTo(map);

// Marker cluster functionality
L.mapbox.featureLayer('examples.map-i86nkdio').on('ready', function(e) {
    var clusterGroup = new L.MarkerClusterGroup();
    e.target.eachLayer(function(layer) {
        clusterGroup.addLayer(layer);
    });
    map.addLayer(clusterGroup);
});

// Hard-coded marker in GeoJSON format
L.mapbox.featureLayer({
    type: 'Feature',
    geometry: {
        type: 'Point',
        coordinates: [
        	-122.1383771,
        	37.4228628
        ]
    },
    properties: {
        title: 'WePay',
        description: '380 Portage Ave',
        'marker-size': 'medium',
        'marker-color': '#f44',
    }
}).addTo(map);