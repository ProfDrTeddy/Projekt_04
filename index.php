<?php
  require_once("Db.class.php");

  $db = new Db();

  $results = $db->query('SELECT * FROM result;');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title></title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.css' rel='stylesheet' />
    <style>
      h1 {
        margin: 0 auto;
        text-align: center;
        color: white;
        background-color: black;
      }
      body { 
          margin: 0;
          padding: 0;
      }
      #map {
          width:100%; 
          height: 600px; 
      }
      table {
        width:80%;
        margin: 0 auto;
      }

      th {
        background-color: rgba(255,255,255,0.3);
        padding: 18px 15px;
        text-align: left;
        font-weight: 500;
        text-transform: uppercase;
      }

      td {
        padding: 15px;
        text-align: left;
        vertical-align:middle;
        font-weight: 300;
        border-bottom: solid 1px rgba(255,255,255,0.1);
      }

    </style>
</head>
<body>
   <div class="header">
    <h1>Results</h1>
  </div>
  <div>
    <table>
      <tr>
        <th>
          ID
        </th>
        <th>
          Station ID
        </th>
        <th>
          Latitude
        </th>
        <th>
          Longitude
        </th>
        <th>
          Luftverschmutzung
        </th>
        <th>
          Geräuschpegel
        </th>
        <th>
          Timestamp
        </th>
      <tr>
        <td>asdkasd</td>
        <td>asdkasd</td>
        <td>asdkasd</td>
        <td>asdkasd</td>
        <td>asdkasd</td>
        <td>asdkasd</td>
        <td>asdkasd</td>
      </tr>

    </table>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM persons";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Station ID</th>";
                echo "<th>Latitude</th>";
                echo "<th>Longitude</th>";
                echo "<th>Air Polution</th>";
                echo "<th>Noise Polution</th>";
                echo "<th>Timestamp</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['station_id'] . "</td>";
                echo "<td>" . $row['lat'] . "</td>";
                echo "<td>" . $row['lng'] . "</td>";
                echo "<td>" . $row['air_polution'] . "</td>";
                echo "<td>" . $row['noise_polution'] . "</td>";
                echo "<td>" . $row['timestamp'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

  </div>
  <div>
      <div id='map'></div>
  </div>

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoidHIwbGwiLCJhIjoiY2pncnQ1b3dtMDRkYzMzbjFzNTVmMDh4eiJ9.mQP1YCbOOviw-QHaxgYNJQ';
var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
    center: [10.50, 52], // starting position [lng, lat]
    zoom: 5 // starting zoom
});
</script>

</body>
</html>
