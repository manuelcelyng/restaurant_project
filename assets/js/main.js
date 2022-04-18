
var clave;
var clavereg;
var nombrefull;
var form;

window.onload = function () {

  console.log("hola");
  form = document.getElementsByTagName("form");
  if(document.getElementById('formu-reg')){
    console.log("hola2");
    clavereg = document.getElementById('pass-reg');
    nombrefull = document.getElementById('nombre-reg');
    document.getElementById("formu-reg").addEventListener('submit', validarFormularioreg);
    clavereg.onkeypress = restringirAlfaNume;
    nombrefull.onkeypress = restringirAlfa;
  } else if(document.getElementById('formSesion')){
    console.log("hola");
    document.getElementById("formSesion").addEventListener('submit', validarFormulario);
    nombrefull = document.getElementById('nombre-login');
    clave = document.getElementById('pass-login');
    clave.onkeypress = restringirAlfaNume;
    nombrefull.onkeypress = restringirAlfa;
  } else {
    nav = navigator.geolocation;
    if(nav){
      nav.getCurrentPosition(visualizarPosicion,funcionError);
    }
  }
}

function validarFormulario(event) {
  event.preventDefault();

  var errorSpan = document.getElementById("formError");
  var regName = /^[A-Z ]+$/;
  console.log(regName.test(nombrefull.value))
  if (!regName.test(nombrefull.value)) {
    errorSpan.innerHTML = "El nombre es invalido, verifíquelo.<br>";
    return;
  }
  var regPass = /^[A-Z0-9]+$/i;
  if (clave.value.length < 8 || !regPass.test(clave.value)) {
    errorSpan.innerHTML = "La contraseña debe tener minimo 8 caracteres alfa y/o numericos.<br>";
    return;
  }
  this.submit();
}

function validarFormularioreg(event) {
  event.preventDefault();
  var errorSpan = document.getElementById("formError-reg");
  var email = document.getElementById('email-reg');

  var regName = /^[A-Z ]+$/;
  console.log(regName.test(nombrefull.value))
  if (!regName.test(nombrefull.value)) {
    errorSpan.innerHTML = "El nombre es invalido, verifíquelo.<br>";
    return;
  }

  var regPass = /^[A-Z0-9]+$/i;
  if (clavereg.value.length < 8 || !regPass.test(clavereg.value)) {
    errorSpan.innerHTML = "La contraseña debe tener minimo 8 caracteres alfa y/o numericos.<br>";
    return;
  }

  var regEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i;
  if(!regEmail.test(email.value)) {
    errorSpan.innerHTML = "El email es invalido, verifíquelo.<br>";
    return;
  }

  this.submit();
}

function restringirAlfaNume(event){
  var letra = String.fromCharCode(event.charCode);
  var regLetra = /^[A-Z0-9]+$/i;
  console.log(regLetra.test(letra));
  return regLetra.test(letra)
}

function restringirAlfa(event){
  var letra = String.fromCharCode(event.charCode);
  var regLetra = /^[A-Z ]+$/i;
  if(/^[a-z]+$/.test(letra)){
    nombrefull.value = nombrefull.value + letra.toUpperCase();
    return false;
  }
  console.log(regLetra.test(letra));
  return regLetra.test(letra)
}
 
var ubicaciones = [
    {lat: 6.235079777695059, lng: -75.56922197341919},
    {lat: 6.19754699579643, lng: -75.55883646011353},
    {lat: 6.1964910476412625, lng: -75.5738353729248},
    {lat: 6.180843568447304, lng: -75.56863188743591},
    {lat: 6.1633396026858716, lng: -75.57312726974487},
    {lat: 6.2707488965690885, lng: -75.57700574398041},
    {lat: 6.23225344668978, lng: -75.60401558876038},
    {lat: 6.176459631315757, lng: -75.591881275177}
];

var map;

var coord;

var directionsService;
var directionsRenderer; 

var info = {
  logo : ['imagenes/logo0.png','imagenes/logo1.png','imagenes/logo2.png', 'imagenes/logo3.png',
      'imagenes/logo4.png','imagenes/logo5.png','imagenes/logo6.png', 'imagenes/logo7.png'],
  nombre : ['Centro Comercial Sandiego','El Tesoro Shopping Park', 'Centrocomercial Santafé',
      'San Lucas Plaza', 'City Plaza Centro Comercial', 'Florida parque comercial',
      'Centro Comercial Los Molinos', 'Centro Comercial Viva Envigado'],
  direcciones : ['Cl. 33 #42B-06.','Cra. 25a #1a Sur 45.','Carrera 43A Cl. 7 Sur ##170',
           'Cl. 20 Sur ##27-55','Calle 36 D Sur # 27ª- 105','Cl. 71 ##65 - 150',
           'Cl. 30A ##82a-26','Cra. 48 ##32B Sur-139']
}

function visualizarPosicion(position){
  
  // OBTENER MI UBICACION
  console.log(position);
  console.log(position.coords.latitude, position.coords.longitude);
  // GRAFICAR EL MAPA
  var mapa = document.getElementById('mapa');
  directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer();
  coord = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
  var opcionesMapa = {
    center: coord,
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.NORMAL,
  };
  map = new google.maps.Map(mapa,opcionesMapa);
  directionsRenderer.setMap(map);

  //MARCADOR USUARIO
  var opcionesMarcador = {
    position: coord,
    map: map,
    icon: "image/pin-user.png",
    animation: google.maps.Animation.BOUNCE
  };
  var marcaUsuario = new google.maps.Marker(opcionesMarcador);

  //ARREGLO DE MARCADORES
  var marcadores = [];

  marcadores = ubicaciones.forEach(function callback(ubicacion, i){
    var opcionesMarcadores = {
      position: ubicacion,
      map: map,
      icon: "image/pin-restaurant.png",
      animation: google.maps.Animation.DROP
    };
    var marca = new google.maps.Marker(opcionesMarcadores);
    var contenido = "<div class='icono_principal'><img src=image/main-icon.png>"+
      "</div><h3>"+info.nombre[i]+"</h3><p class='direction'>"+info.direcciones[i]+
      "</p>"+"<style type='text/css'>"+
      ".icono_principal {margin-bottom: 1px; text-align: center;}"+
      ".icono_secundario img {width: 100%;}"+
      "h3 {margin-top: 1px;} .direction, h3 {text-align: center;} </style>";

    marca.addListener('mouseover', function(event){mostrarInfo(event,contenido,this)});
    marca.addListener('mouseout',cerrarInfo);
    marca.addListener('dblclick',function(event){redireccionar(info.link[i])});
    marca.addListener('click',calcRoute);
    return marca;
  });

  map.addListener('click',nuevaMarca);
}

function nuevaMarca(event){
  var opcionesMarcador = {
    position: event.latLng,
    animation: google.maps.Animation.DROP,
    map: map
  };
  console.log("{lat: "+event.latLng.lat()+", lng: "+event.latLng.lng()+"}");
  var m = new google.maps.Marker(opcionesMarcador);
}

function mostrarInfo(event, contenido, mark) {
  var opcionesInfo = {
    content: contenido,
    position: event.latLng 
  };
  mark.infowindow = new google.maps.InfoWindow(opcionesInfo);
  mark.infowindow.open({
      anchor: mark,
      map,
      shouldFocus: false,
    });
}

function cerrarInfo(event) {;
  console.log("cerrar")
  this.infowindow.close();
}

function redireccionar(link) {
  window.location.href = link;
}

function rest(n) {
  map.setCenter(ubicaciones[n]);
  map.setZoom(17);
}

function calcRoute() {
  var request = {
      origin: coord,
      destination: this.getPosition(),
      // Note that JavaScript allows us to access the constant
      // using square brackets and a string value as its
      // "property."
      travelMode: 'DRIVING'
  };
  directionsService.route(request, function(response, status) {
    if (status == 'OK') {
      directionsRenderer.setDirections(response);
    }
  });
}

function funcionError() {
  console.log("error");
}