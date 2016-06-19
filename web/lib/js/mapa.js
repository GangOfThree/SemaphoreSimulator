//key= AIzaSyDG94jyox5HGY9k-ajWQdzJsePe81moRhY
window.onload = function() {
  initialize();

  
  getCoordinate();

};
function getCoordinate(){
    var coordinate= {lat: "", lng: ""};
    var query="http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address= calle 7 y calle 32, La Plata";
    $.getJSON( query, function( data ) {
        coordinate.lng=data.results[0].geometry.location.lng;
        coordinate.lat=data.results[0].geometry.location.lat;
       
        alert(coordinate.lng);
        addMarker(coordinate);
        
    });
}
function obtainGeolocation(){
 window.navigator.geolocation.getCurrentPosition(localitation);
}
var latitude;
var longitude;
var map;
// Utilizamos el objeto Navigator para obtener la Latitud y la Longitud
function obtainGeolocation(){
 window.navigator.geolocation.getCurrentPosition(localitation);
 }

function addMarker(coordinate){
    
    var marker = new google.maps.Marker({
    position: coordinate,
    map: map,
    
    });
}
// Aqui Desarrollamos toda la magia
 function localitation(geo){
 // obtenemos y guardamos la latitud y longitud 
 var latitude = geo.coords.latitude;
 var longitude = geo.coords.longitude;
 // las variables las colocamos en la instancia del objeto de google maps
 var latlng = new google.maps.LatLng(latitude,longitude );
 // y configuramos las opciones del maps 
     var myOptions = {
          center: latlng,
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
     // Decimos donde vamos a colocar el maps
         map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
       // Inistancia para le marker
        var marker = new google.maps.Marker({
            position: latlng, 
            map: map, 
            title:"Estamos aqui!"
        });
 }
 //llamando la funcion inicial para ver trabajar la API


function initialize() {
   obtainGeolocation();   
}