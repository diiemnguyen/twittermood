<?php
echo '<h1>TwitterMood - Dot</h1>';
// connect to mongodb
$m = new MongoClient();
echo "Connection to mongo database successfully! <br />";
// select a database
$db = $m->mytwitter;
echo "Database: " . $db . "<br />";
// select a collection
$collection = new MongoCollection($db, 'mytweets');
echo "Collection: " . $collection . "<br />";
// count documents
$count_document = $collection->count();
echo "Documents in collection: " . $count_document . "<br />";

  
  
// How many have the boolean property set to true?  Buenos Aires
$query = array ('user.location' => 'Los Angeles');
$count_doc = $collection->count($query);
echo "There are " . $count_doc . " user.location = Los Angeles documents in the docs collection.<br><br>";



   
$start = new MongoDate(strtotime('2014-01-01 00:00:00'));
$end = new MongoDate(strtotime('2014-01-31 23:59:59'));
$collection->find(array("created_at" => array('$gt' => $start, '$lte' => $end)));

// get - $happy_arr[0]
$happy_arr = array('happy','happiness','overhappy','quasihappy','smile','smiling','laugh','laughing','glad','gladness','happy mood','joy','joyous','joyfull','lucky','luckily','luckiness','cheerful','successful','merry','satisfy');  // 21

$sad_arr = array('text' => "sad","sadness","ill","illness","cry","crying","unhappy","unhappiness","grief","sorrow","sorrowful","mournful","disappointed","disappointment","sad attempt","despondent","disconsolate","discouraged","gloomy","downcast","downhearted","depressed","dejected","melancholy"); // 24

$exciting_arr = array("excited","exciting","excitedly","superexcited","hyperexcited","brisk","stir","awaken","animate","stimulate","kindle","inflame","evoke","eager","discomposed","stormy","impassioned","active","enthusiastic","perturbed");  // 20

$angry_arr = array("angry","angrier","angriest","anger","incensed","enraged","infuriated","furious","mad","provoked","irritated","irate","animosity","resentment");  // 14



echo '<html>

<head>
	<title>TwitterMood</title>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
	
	</script>
	<style>
		.button {
		   	width: 120px; 
		  	height: 40px; 
		  	border: 1px solid; 
		  	text-align: center;
			margin-left: 25px;
	  	}
	</style>
</head> 

<body>';

echo '
<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<col width="14%" /> 
	<col width="14%" /> 	
	<col width="14%" />	
	<col width="14%" />		
	<col width="14%" />	
	<col width="60%" />	
  <tr>
    <th scope="col">Happy</th>
    <th scope="col">Sad</th>
    <th scope="col">Exciting</th>
    <th scope="col">retweeted</th>
    <th scope="col">location</th>
    <th rowspan="5" scope="col">
		<div id="map" style="width: 400px; height: 300px"></div> 

	   	<script type="text/javascript"> 
		  var myOptions = {
			 zoom: 8,
			 center: new google.maps.LatLng(51.49, -0.12),
			 mapTypeId: google.maps.MapTypeId.ROADMAP
		  };
	
		  var map = new google.maps.Map(document.getElementById("map"), myOptions);
	   	</script>
		
	</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><button type="button" class="button">California</button></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><button type="button" class="button">New York</button></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><button type="button" class="button">Texas</button></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><button type="button" class="button">Washington</button></td>
  </tr>
</table>

'; // end table 



echo '</body></html>';
?>