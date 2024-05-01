<?php include 'Conx.php';
error_reporting(0);
$id = str_replace(" ", "+", $_GET['id']);
$key = "ThisIsASecretKey";
function decryptData($ciphertext, $key) {
    $cipher = "aes-256-cbc";
    $ciphertext = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($ciphertext, 0, $ivlen);
    $ciphertext = substr($ciphertext, $ivlen);
    return openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
}
$decryptedData = decryptData($id, $key);
$sql = "SELECT * FROM user_tb WHERE busID = '$decryptedData'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
  $Barangay = $row["Provinc"];
  $Monic = $row["Monic"];
  $bar = $row["Baran"];
  $Uzip = $row["Zipc"];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Confirm Map</title>
<style>
#map {
  height: 350px; 
  width: 98%;
  border-radius: 200px;
  border: 5px solid black;
  margin-top: 3px;
  margin-top: 12px;
}
#addressSuggestions {
  position: absolute;
  top: 70px;
  left: 20px;
  z-index: 1000;
  background-color: white;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: calc(100% - 40px);
  max-height: 200px;
  overflow-y: auto;
  font-weight: bold;
  font-family: italic;
  font-size: 15px;
  border-radius: 12px;
}
body{
  background-color: white;
}
.wrapper{
  display: flex;
  flex-flow: row wrap;
  text-align: center;
}
.wrapper>*{
  padding: 10px;
  flex: 1 100%;
}
.header{
  text-align: left;
  height: 70px;
  overflow: hidden;
  display: flex;
  align-items: center;
  background-color: #0020C2; 
  color: white;
  border-bottom: 2px solid white;
}
.main{
  text-align: left;
  font-size: 24px;
}
.header h1{
  font-size: 40px;
  font-weight: bold;
  font-family: italic ;
}

.home a{
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 5px;
  border: 2px solid black;
  width: 120px;
  height: 30px;
  color: white;
  font-weight: bold;
  font-family: italic;
  border: transparent;
  background-color: #0020C2;
  transition: all 0s ease;
  box-shadow: 1px 1px 1px 1px white;
}
.home a:hover{
  background-color: #FF5F1F;
}
.header h1{
  text-align: left;
  font-family: "Rakkas", serif;
    font-weight: 400;
    font-style: normal;
    text-shadow: 5px 5px 5px black;  
}
header h1:hover{
  letter-spacing: 20px;
  font-weight: bold;
  color: black;
  text-shadow: 5px 5px 5px white;
  word-spacing: 10px;
  text-transform: uppercase;
}
.ma{
  margin-top: 2%;
  display: flex; 
  justify-content: center; 
  border: 2px solid black;
  height: 375px;
  border-radius: 200px;
    background: hsla(27, 73%, 51%, 1);
    background: linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    background: -moz-linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    background: -webkit-linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#DD7A28", endColorstr="#081CFF", GradientType=1 );
  transition: all ease 1s;
}
.ma:hover{
  background: hsla(235, 100%, 52%, 1);
    background: linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    background: -moz-linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    background: -webkit-linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#081CFF", endColorstr="#DD7A28", GradientType=1 );
}
.LB{
  font-weight: bold;
  font-family: italic;
  font-size: 22px;
  text-align: center;
}
.ing{
  font-size: 22px;
  width: 350px;
  outline: 0;
  border-radius: 6px;
  font-weight: bold;
  font-family: italic;
  border: 1px solid black;
}
.ing:hover{
  box-shadow: 3px 3px black;
}
.ibtn{
  width: 30%;
  background-color: #FF5F1F;
  color: white;
  border: transparent;
  border-radius: 9px;
  transition: all ease 1s;
}
.ibtn:hover{
  background-color: #0020C2;
  width: 50%;
  color: white;
}


  </style>
</head>
<body>
  <div class ="wrapper">
    <header class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h1>Palaba Hub</h1>
          </div>
          <div class="col-4" style="text-align: right; display: flex; justify-content: right; align-items: center;">
            <div class="home">
              <a href="../Login/login.php" class="btn btn1">BACK</a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <article class="main" style="background-color: white;">
        <div id="addressSuggestions" class="list-group" style="border: transparent; padding-left: 20%; background-color: transparent; margin-top: 4%;">
          <!-- Suggestions will appear here -->
        </div>
        <div style="padding-left: 5%;">
          <label for="address" class="LB">Enter Address:</label>
          <input class = "ing" onchange="locateAddress()" type="text" id="address" value="<?php echo $Barangay." ".$Monic." ".$bar." ". $Uzip;?>">
        </div>
        <div class="ma">
          <div id="map"></div>
        </div>
        <form action="update-data.php?id=<?php echo $id;?>" method="post" style = "text-align: center; margin-top: 20px;">
          <input hidden type="text" name="lati" id="latitude" placeholder="Enter address...">
          <input hidden type="text" name="long" id="longitude" placeholder="Enter address...">
          <input class = "ibtn" type="Submit" value="Confirm">
        </form>
    </article>
  </div>





        
                <script>
                  navigator.geolocation.watchPosition(success);
                  function success(pos) {

                    const lat = pos.coords.latitude;
                    const lng = pos.coords.longitude;
                    const accuracy = pos.coords.accuracy;

                }
                  let mapOptions = {
                    center:[14.7496577, 120.9656795],
                    zoom:9
                }

                let map = new L.map('map' , mapOptions);

                let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                map.addLayer(layer);

                let marker = null;
                map.on('click', (event)=> {

                    if(marker !== null){
                        map.removeLayer(marker);
                    }
                    marker = L.marker([event.latlng.lat , event.latlng.lng]).addTo(map);
                    document.getElementById('latitude').value = event.latlng.lat;
                    document.getElementById('longitude').value = event.latlng.lng;
                    updateCoordinatesTable(event.latlng.lat, event.latlng.lng);
                }) 
                //when done loading run automaticaly 
                    function locateAddressOnLoad() {
                  var address = $('#address').val();
                  if (address) {
                    locateAddress();
                  }
                }

                // Call locateAddressOnLoad function when the page loads
                $(document).ready(function() {
                  locateAddressOnLoad();
                });
                 function locateAddress() {
                    var address = document.getElementById('address').value;
                    console.log(address)
                    // Use a geocoding service (like OpenStreetMap Nominatim) to convert address to coordinates
                    fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + address)
                      .then(response => response.json())
                      .then(data => {
                        if (data && data.length > 0) {
                          var lat = data[0].lat;
                          var lon = data[0].lon;

                          // Remove existing marker if present
                          if (marker) {
                            map.removeLayer(marker);
                          }

                          // Add marker to the map
                          marker = L.marker([lat, lon]).addTo(map);

                          // Pan the map to the marker's location
                          map.setView([lat, lon], 50);

                          // Update latitude and longitude in the table
                          updateCoordinatesTable(lat, lon);
                        } else {
                          alert('Location not found');
                        }
                      })
                      .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while fetching location data');
                      });
                  }
                function updateCoordinatesTable(lat, lon) {
                    $('#latitude').val(lat);
                    $('#longitude').val(lon)
                  }

                   // Function to fetch address suggestions as user types
                  var cal = document.getElementById('addressSuggestions');
                   $('#address').on('input', function () {
                     cal.style.display = 'block';
                    var input = $(this).val();
                    console.log(input)
                    if (input.length > 0) {
                      fetch('https://nominatim.openstreetmap.org/search?format=json&q=Philippines%20' + input)
                        .then(response => response.json())
                         .then(data => {
                          var suggestionsHTML = '';
                          data.forEach(item => {
                            suggestionsHTML += `<a href="#" class="list-group-item list-group-item-action suggestion-item">${item.display_name}</a>`;
                          });
                          $('#addressSuggestions').html(suggestionsHTML);
                        })
                        .catch(error => {
                          console.error('Error:', error);
                        });
                    } else {
                      $('#addressSuggestions').empty();
                    }
                  }
                );

                  $(document).on('click', '.suggestion-item', function (e) {
                    e.preventDefault();
                    var address = $(this).text();
                    $('#address').val(address).trigger('input');
                    locateAddress();
                    $('#addressSuggestions').empty();
                  });
                  document.getElementById('addressSuggestions').addEventListener('click', function() {
                        cal.style.display = 'none';
                    });
                </script>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html> 