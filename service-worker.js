var cacheName = 'Tupro-1';
var filesToCache = [];

self.addEventListener('install', function(e) {
  console.log('[ServiceWorker] Install');
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      console.log('[ServiceWorker] Caching app shell');
      return cache.addAll(filesToCache);
    })
  );
});

self.addEventListener('activate', function(e) {
  console.log('[ServiceWorker] Activate');
  e.waitUntil(
    caches.keys().then(function(keyList) {
      return Promise.all(keyList.map(function(key) {
        if (key !== cacheName) {
          console.log('[ServiceWorker] Removing old cache', key);
          return caches.delete(key);
        }
      }));
    })
  );
  return self.clients.claim();
});
var filesToCache = [
  '/',
  '/index.html',
  '/app.js',
  '/Diseño.html',
  '/Fotografia.html',
  '/Marketing.html',
  '/Web.html',
  '/css/estilo.css',
  '/lib/font-awesome/css/fontawesome-all.css',
  '/lib/bootstrap/css/bootstrap.min.css',
  '/css/estilo.css',
  '/lib/animate/animate.min.css',
  '/lib/owlcarousel/assets/owl.carousel.min.css',
  '/lib/lightbox/css/lightbox.min.css',
  '/lib/jquery/jquery.min.js',
  '/lib/jquery/jquery-migrate.min.js',
  '/lib/bootstrap/js/bootstrap.bundle.min.js',
  '/lib/easing/easing.min.js',
  '/lib/superfish/superfish.min.js',
  '/lib/wow/wow.min.js',
  '/lib/waypoints/waypoints.min.js',
  '/lib/counterup/counterup.min.js',
  '/lib/owlcarousel/owl.carousel.min.js',
  '/lib/isotope/isotope.pkgd.min.js',
  '/lib/lightbox/js/lightbox.min.js',
  '/lib/touchSwipe/jquery.touchSwipe.min.js',
  '/js/main.js',
  '/app.js',
  '/img/1.png',
  '/img/2.png',
  '/img/4.png',
  '/img/5.png',
  '/img/B.png',
  '/img/BB.png',
  '/img/logo.png',
  '/img/team-1.png',
  '/img/team-2.png',
  '/img/team-3.png',
  '/img/tupro.png',
  '/img/intro-carousel/1.png',
  '/img/intro-carousel/2.png',
  '/img/intro-carousel/3.png',
  '/img/intro-carousel/4.png',
  '/img/intro-carousel/5.png',
  '/img/Diseño/1.png',
  '/img/Diseño/2.png',
  '/img/Diseño/3.png',
  '/img/Diseño/A.png',
  '/img/Diseño/idea.png',
  '/img/Diseño/BRANDING.png',
  '/img/Diseño/INTERIORES.png',
  '/img/Diseño/PIEZAS GRAFICAS.png',
  '/img/Diseño/PUBLICIDAD.png',
  '/imgFotografia/1.png',
  '/imgFotografia/2.png',
  '/imgFotografia/3.png',
  '/imgFotografia/A.png',
  '/imgFotografia/AUDIOVISUALES.png',
  '/imgFotografia/FOTOGRAFIA.png',
  '/img/Marketing/1.png',
  '/img/Marketing/2.png',
  '/img/Marketing/3.png',
  '/img/Marketing/A.png',
  '/img/Marketing/MARKETING.png',
  '/img/Marketing/SOCIAL MEDIA.png',
  '/img/Web/1.png',
  '/img/Web/2.png',
  '/img/Web/3.png',
  '/img/Web/A.png',
  '/img/Web/SITIO WEB.png',
  '/img/Web/TIENDA ONLINE.png',
  '/videos/Quines somos.mp4'


];
self.addEventListener('fetch', function(e) {
  console.log('[ServiceWorker] Fetch', e.request.url);
  e.respondWith(
    caches.match(e.request).then(function(response) {
      return response || fetch(e.request);
    })
  );
});