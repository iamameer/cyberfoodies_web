// Initialize and add the map
function initMap() {
    // The location of cyberjaya
    var latlong = document.getElementById("latlong").value;
    if(document.getElementById("latlong").value){  
        ltlg = '{ "lat":'+ (latlong.split(',')[0].replace('{','')) +', "lng":'+ (latlong.split(',')[1].replace('}','')) +'}'
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
      //draggable: true
    });
 
    map.setCenter(marker.position);
    marker.setMap(map);

}