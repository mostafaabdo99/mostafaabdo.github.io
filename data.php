<?php

require_once("coin_config/config.php");
require_once("coin_config/connection.php");
require_once("coin_config/global.php");

// Fetch the data
$query = "
  SELECT *
  FROM coin_visitor_statis
  ORDER BY date ASC";
$result = mysqli_query($conn,$query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysqli_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Print out rows
$prefix = '';
echo "[\n";
while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo $prefix . " {\n";
  echo '  "date": "' . $row['date'] . '",' . "\n";
  echo '  "value": ' . $row['visitor'] .'' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";


?>