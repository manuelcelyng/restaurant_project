/**
* Template Name: Delicious - v4.7.1
* Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  let selectTopbar = select('#topbar')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
        if (selectTopbar) {
          selectTopbar.classList.add('topbar-scrolled')
        }
      } else {
        selectHeader.classList.remove('header-scrolled')
        if (selectTopbar) {
          selectTopbar.classList.remove('topbar-scrolled')
        }
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Hero carousel indicators
   */
  let heroCarouselIndicators = select("#hero-carousel-indicators")
  let heroCarouselItems = select('#heroCarousel .carousel-item', true)

  heroCarouselItems.forEach((item, index) => {
    (index === 0) ?
    heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "' class='active'></li>":
      heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "'></li>"
  });

  /**
   * Menu isotope and filter
   */
  window.addEventListener('load', () => {
    let menuContainer = select('.menu-container');
    if (menuContainer) {
      let menuIsotope = new Isotope(menuContainer, {
        itemSelector: '.menu-item',
        layoutMode: 'fitRows'
      });

      let menuFilters = select('#menu-flters li', true);

      on('click', '#menu-flters li', function(e) {
        e.preventDefault();
        menuFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        menuIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });

      }, true);
    }

  });

  /**
   * Testimonials slider
   */
  new Swiper('.events-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Initiate gallery lightbox 
   */
  const galleryLightbox = GLightbox({
    selector: '.gallery-lightbox'
  });

  /**
   * Testimonials slider
   */
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

})()

window.onload = function () {
  //UBICACION
  nav = navigator.geolocation;
  if(nav){
    nav.getCurrentPosition(visualizarPosicion,funcionError);
  }
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