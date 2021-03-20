// Initialize and add the map
function initMap() {
    // The location of cyberjaya
    var latlong
    if(document.getElementById("latlong").value){ 
        var ltlg = document.getElementById("latlong").value 
        ltlg = '{ "lat":'+ltlg.split(',')[0] +', "lng":'+ ltlg.split(',')[1] +'}'
        console.log(ltlg)
        latlong = JSON.parse(ltlg);
        console.log(latlong)
    }else{
        latlong = { lat: 2.9213, lng: 101.6559};
        document.getElementById("latlong").value = "2.9213,101.6559"
    }
    const cyberjaya = {lat: latlong.lat, lng: latlong.lng};
    // The map, centered at cyberjaya
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 12,
      center: cyberjaya,
    });
    // The marker, positioned at cyberjaya
    var marker = new google.maps.Marker({
      position: cyberjaya,
      map: map,
      draggable: true
    });

    google.maps.event.addListener(marker, 'dragend', function (evt) {
        document.getElementById('latlong').value = evt.latLng.lat()+','+evt.latLng.lng()
        map.setCenter(marker.position);
        marker.setMap(map);
        //evt.latLng.lat().toFixed(3)  evt.latLng.lng().toFixed(3) 
    });

    map.setCenter(marker.position);
    marker.setMap(map);

    // // Create the initial InfoWindow.
    // let infoWindow = new google.maps.InfoWindow({
    //     content: "Click to set your location",
    //     position: cyberjaya,
    // });

    // infoWindow.open(map);
 
    // // Configure the click listener.
    // map.addListener("click", (mapsMouseEvent) => {
    //     // Close the current InfoWindow.
    //     infoWindow.close();
    //     // Create a new InfoWindow.
    //     infoWindow = new google.maps.InfoWindow({
    //         position: mapsMouseEvent.latLng,
    //     });

    //     // marker.setMap(null);
    //     // marker = new google.maps.Marker({
    //     //     position: mapsMouseEvent.latLng,
    //     //     map: map,
    //     // });
        
    //     var val = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)

    //     infoWindow.setContent(
    //         val
    //     );

    //     document.getElementById("latlong").value = val; 

    //     infoWindow.open(map);
    // });
}