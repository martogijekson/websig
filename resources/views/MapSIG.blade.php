<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Peta Interaktif</title>

<!-- Leaflet.js CDN -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwlgebS3bplkEr9NEFBhut66Xo-m4muW4"></script>

<style>
  /* Ensure box-sizing is applied universally */
  *, *::before, *::after {
    box-sizing: border-box;
  }

  html, body {
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
  }

body {
    font-family: 'Cambria', serif;
    background-color: #f7f9fc;
    color: #333;
}


  h1 {
    text-align: center;
    padding: 15px;
    background-color: #1F509A;
    color: white;
    font-size: 24px;
    margin: 0;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
  }

  /* Container for both maps */
  .map-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px;
    gap: 20px;
    width: 100%;
    height: calc(100% - 60px); /* Adjust container height for the header */
    box-sizing: border-box;
  }

  .map-wrapper {
    flex: 1 1 calc(50% - 20px); /* Make maps take 50% of the space */
    max-width: 100%; /* Ensure map takes full width */
    min-width: 300px; /* Ensure a minimum size for responsiveness */
    height: 100%; /* Ensure maps take full height of the container */
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }

  .map-wrapper h2 {
    background: #1F509A;
    color: white;
    margin: 0;
    padding: 10px;
    font-size: 18px;
    text-align: center;
  }

  #leaflet-map, #google-map {
    height: 100%; /* Maps will now occupy the full height of their containers */
    width: 100%; /* Full width */
  }

  .popup-content {
    font-size: 14px;
    font-family: Arial, sans-serif;
    color: #333;
    text-align: center;
  }

  .popup-content img {
    max-width: 80px;
    margin-bottom: 10px;
  }

  .popup-content .title {
    font-weight: bold;
    font-size: 16px;
    color: #007BFF;
  }

  .popup-content .desc {
    margin: 5px 0;
    font-size: 14px;
  }

  /* Media query for mobile responsiveness */
  @media (max-width: 768px) {
    .map-container {
      flex-direction: column; /* Stack maps vertically on small screens */
      gap: 10px;
    }

    .map-wrapper {
      height: 50vh; /* Limit the height of the maps to 50% of the viewport */
    }

    h1 {
      font-size: 20px; /* Reduce header size on small screens */
    }
  }
</style>
</head>
<body>
<h1>Peta Interaktif</h1>

<div class="map-container">
  <div class="map-wrapper">
    <h2>Leaflet Map</h2>
    <div id="leaflet-map"></div>
  </div>
  <div class="map-wrapper">
    <h2>Google Maps</h2>
    <div id="google-map"></div>
  </div>
</div>

<script>
// Leaflet.js Map
const leafletMap = L.map('leaflet-map').setView([-8.655948167965134, 115.21630778361869], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(leafletMap);

const leafletPopupContent = `
  <div class="popup-content">
    <img src="/images/Walikota.png" alt="Logo Universitas Udayana">
    <div class="title">Kantor: Walikota Denpasar</div>
    <div class="desc">Dauh Puri Kangin, Kota Denpasar, Bali.</div>
  </div>
`;

const leafletMarker = L.marker([-8.655948167965134, 115.21630778361869]).addTo(leafletMap);
leafletMarker.bindPopup(leafletPopupContent).openPopup();

// Google Maps API Map
const googleMapDiv = document.getElementById('google-map');
const googleMap = new google.maps.Map(googleMapDiv, {
  center: { lat: -8.798355553710037, lng: 115.1724520021613 },
  zoom: 13,
});

const googlePopupContent = `
  <div class="popup-content">
    <img src="/images/logo-unud.png" alt="Logo Universitas Udayana">
    <div class="title">Kantor: Rektorat Universitas Udayana</div>
    <div class="desc">Jalan Raya Kampus UNUD, Bukit Jimbaran, Bali.</div>
  </div>
`;

const infoWindow = new google.maps.InfoWindow({
  content: googlePopupContent,
});

const googleMarker = new google.maps.Marker({
  position: { lat: -8.798355553710037, lng: 115.1724520021613 },
  map: googleMap,
  title: "Universitas Udayana",
});

// Add a click event listener to the marker to show the popup
googleMarker.addListener("click", () => {
  infoWindow.open(googleMap, googleMarker);
});
</script>
</body>
</html>
