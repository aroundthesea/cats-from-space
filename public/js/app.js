function samplePost() {
    var successCallback =  function(response) {
        console.log("success");
        console.log(response);
    };

    $.post("/data",{
        "lat": 43,
        "lon": -122,
        "tag": "Otter",
        "zoom": 1,
        "date": "2015-04-10"
    }, successCallback);
}

function sampleGet() {
    var successCallback =  function(response) {
        console.log("success");
        console.log(response);
    };

    $.get("/location/volcanoes", null, successCallback);
}

function getCurrentLocation() {
    var successCallback = function(position) {
        console.log(position.coords.latitude + " " + position.coords.longitude);
    };

    navigator.geolocation.getCurrentPosition(successCallback);
}