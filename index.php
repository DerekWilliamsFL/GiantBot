<?php

require_once 'config.php';
include 'GiantBomb.php';

$gb = new GiantBomb($api_key);
$query = $gb->search('ico');
$result = $query->results[0];
$gameInfo = $gb->game($result->id);

$name = $result->name;
$id = $result->id;
$description = $result->deck;
$gameUrl = $result->site_detail_url;
if ($gameInfo->results->reviews) {
    $gameReview = $gameInfo->results->reviews[0]->site_detail_url;
}
else {
    $gameReview = null;
}
//$results = $pokemonYellow->results;
//$count = count($pokemonYellow->results);
//echo $count;
//Multiple
//foreach($results as $result) {
//    echo '<p>' . $result->description . '</p>';
//}
//print_r($pokemonYellow->results[0]->deck);
//print_r($pokemonYellow->results[0]->api_detail_url);
//print_r($result);
echo('<a href=' . $gameUrl . '>' . $name . '</a> - ');
if($gameReview != null) {
    echo('<a href=' . $gameReview . '>Review</a> <br><br>');
}
else { echo('No GiantBomb review available <br>'); }
//echo($id . '<br>');
//echo($gameUrl . '<br>');
echo($description . '<br>');
print_r($gameReview);
//print_r($gameReview);
//rint_r($gameInfo->results);
?>

