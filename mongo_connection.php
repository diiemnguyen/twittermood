<?php
// connect to mongodb
$m = new MongoClient();
echo "Connection to mongo database successfully! <br />";
// select a database
$db = $m->twitter;
echo "Database: " . $db . "<br />";
// select a collection
$collection = new MongoCollection($db, 'docs');
echo "Collection: " . $collection . "<br />";
// count documents
$count_collection = $collection->count();
echo "Documents in collection: " . $count_collection . "<br />";

  
  
// How many have the boolean property set to true?
$query = array ('user.location' => 'Buenos Aires');
$count_collection = $collection->count($query);
echo "There are " . $count_collection . " user.location = Buenos Aires documents in the docs collection.<br><br>";

   
$start = new MongoDate(strtotime('2014-01-01 00:00:00'));
$end = new MongoDate(strtotime('2014-01-31 23:59:59'));
$collection->find(array("created_at" => array('$gt' => $start, '$lte' => $end)));









?>






