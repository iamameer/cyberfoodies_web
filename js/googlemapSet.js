// Initialize and add the map
function initMap() { 
    var latlong
    // The location of cyberjaya
    if(document.getElementById("latlong").value){ 
        var ltlg = document.getElementById("latlong").value 
        ltlg = '{ "lat":'+(ltlg.split(',')[0]).replace('{','') +', "lng":'+ (ltlg.split(',')[1]).replace('}','') +'}'
        console.log(ltlg)
        latlong = JSON.parse(ltlg);
        console.log(latlong)

        // The map, centered at latlong
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: latlong,
        });
        // The marker, positioned at latlong
        var marker = new google.maps.Marker({
          position: latlong,
          map: map,
          draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function (evt) {
            document.getElementById('latlong').value = evt.latLng.lat()+','+evt.latLng.lng()
            console.log('val: '+document.getElementById('latlong').value )
            map.setCenter(marker.position);
            marker.setMap(map);
            //evt.latLng.lat().toFixed(3)  evt.latLng.lng().toFixed(3) 
        });

        map.setCenter(marker.position);
        marker.setMap(map);
    }else{
      //if empty val
      document.getElementById("latlong").value = "2.9213,101.6559" 
      //latlong = { lat: 2.9213, lng: 101.6559};

      if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(
          (position) =>{
            let pos = {
              lat: position.coords.latitude, 
              lng: position.coords.longitude
            };
  
            console.log(`${position.coords.latitude},${position.coords.longitude}`)
            document.getElementById("latlong").value = `${position.coords.latitude},${position.coords.longitude}`
           
            // The map, centered at current_pos
              const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: pos,
              });
              // The marker, positioned at current_pos
              var marker = new google.maps.Marker({
                position: pos,
                map: map,
                draggable: true
              });
  
              google.maps.event.addListener(marker, 'dragend', function (evt) {
                  document.getElementById('latlong').value = evt.latLng.lat()+','+evt.latLng.lng()
                  console.log('val: '+document.getElementById('latlong').value )
                  map.setCenter(marker.position);
                  marker.setMap(map);
                  //evt.latLng.lat().toFixed(3)  evt.latLng.lng().toFixed(3) 
              });
  
              map.setCenter(marker.position);
              marker.setMap(map);
          }
        )
      }
    } 

    //const cyberjaya = {lat: latlong.lat, lng: latlong.lng};
 
}
 