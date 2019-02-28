function initMap() {
  // The location of Uluru
  var nis = {lat: 43.3209, lng: 21.8958};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: nis});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: nis, map: map});
}
