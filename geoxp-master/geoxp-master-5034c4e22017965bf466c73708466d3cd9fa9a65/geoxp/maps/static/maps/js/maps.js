function initMap() {
    var locations = JSON.parse(window.locs);
    var items = JSON.parse(window.items);
    var center = {lat: -23.68594472954867, lng: -46.66395767421875};

    map = new google.maps.Map(document.getElementById('map'),
    {zoom: 10, center: center});

    console.log(document.getElementById('map'));
    console.log(map);

    var infowindow = new google.maps.InfoWindow({
            content: contentString
          });
    
    for (var i = 0; i < items.length; i++) {
        var l = locations[i];
        var item = items[i];
        var contentString = item.fields.name;

        var location = {lat: l.fields.lat, lng: l.fields.lon};
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: item.fields.name
        });
        google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
            return function() {
                infowindow.setContent(content);
                infowindow.open(map,marker);
            };
        })(marker,contentString,infowindow));  
    }

    loadUbsData(window.src, map);
}

function loadUbsData(src, map) {
    map.data.loadGeoJson(src);
    map.data.setStyle({
          fillColor: 'white',
          fillOpacity: 0.4,
          strokeWeight: 0.5
        });
}
