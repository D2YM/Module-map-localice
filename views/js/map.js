var map, markers;
var infoWindow, infowincontent, strong;
if ( document.getElementById('map-api') ) {
    var map_div = document.getElementById('map-api');
    
}
function initMap() {
    // The location of Uluru
    map = new google.maps.Map(document.getElementById('map-api'), {
        zoom: 6,
        center: { lat: 6.3758436, lng: -74.5644584 },
        streetViewControl: false
    });
    var labels = 'M';

    var markers = [];
    infoWindow = new google.maps.InfoWindow;
    Array.prototype.forEach.call(locations, function(markerElem) {
        //console.log(markerElem['id']);
        var id = markerElem['id'];
        var name = markerElem['name'];
        var state = "Departamento: " + markerElem['state'];
        var city = "Ciudad: " + markerElem['city'];
        var address = "Dirección: " + markerElem['address'];
        var type = markerElem['type'];
        var point = new google.maps.LatLng(
            parseFloat(markerElem['lat']),
            parseFloat(markerElem['lng']));

        var infowincontent = document.createElement('div');
        var strong = document.createElement('strong');
        strong.textContent = name
        infowincontent.appendChild(strong);
        infowincontent.appendChild(document.createElement('br'));

        var text = document.createElement('text');
        text.textContent = state
        infowincontent.appendChild(text);
        infowincontent.appendChild(document.createElement('br'));

        var text = document.createElement('text');
        text.textContent = city
        infowincontent.appendChild(text);
        infowincontent.appendChild(document.createElement('br'));

        var text = document.createElement('text');
        text.textContent = address
        infowincontent.appendChild(text);
        infowincontent.appendChild(document.createElement('br'));
        //var icon = labels;
        var marker = new google.maps.Marker({
            map: map,
            position: point,
            label: labels,
        });
        markers.push(marker);
        marker.addListener('click', function() {
            infoWindow.setContent(infowincontent);
            infoWindow.open(map, marker);
        });
        marker.addListener('dblclick', function() {

            map.setZoom(map.getZoom() + 1);
            map.setCenter(marker.getPosition());
        });
    });
    var markerCluster = new MarkerClusterer(map, markers, { imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' });

    /*map.addListener('zoom_changed', function() {
        infowindow.setContent('Zoom: ' + map.getZoom());
    });*/

    //console.log(map_LAT_LON);
}

var locations = map_LAT_LON;
