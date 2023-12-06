<?php
include 'functions/utility-functions.php';
include 'functions/names-functions.php';

$fileName = 'names-short-list.txt';

$fullNames = load_full_names($fileName);

$firstNames = load_first_names($fullNames);

$lastNames = load_last_names($fullNames);

// $findMe = ',';
// echo $fullNames[0] . '<br>';
// echo strpos($fullNames[0], $findMe) . '<br>';
// echo substr($fullNames[0], 0, strpos($fullNames[0], $findMe));
// exit();

// Get valid names
for($i = 0; $i < sizeof($fullNames); $i++) {
    // jam the first and last name together without a comma, then test for alpha-only characters
    if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
        $validFirstNames[$i] = $firstNames[$i];
        $validLastNames[$i] = $lastNames[$i];
        $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
    }
}

//$common_last_names = array_count_values($validLastNames);
//dd($common_last_names);

// ~~~~~~~~~~~~ Display results ~~~~~~~~~~~~ //

    echo '<h1>Names - Results</h1>';

    echo '<h2>All Names</h2>';
    echo "<p>There are " . sizeof($fullNames) . " total names</p>";
    echo '<ul style="list-style-type:none">';    
    foreach($fullNames as $fullName) {
        echo "<li>$fullName</li>";
    }
    echo "</ul>";

    echo '<h2>All Valid Names</h2>';
    echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
    echo '<ul style="list-style-type:none">';    
    foreach($validFullNames as $validFullName) {
        echo "<li>$validFullName</li>";
    }
    echo "</ul>";

    echo '<h2>Unique Names</h2>';
    $uniqueValidNames = (array_unique($validFullNames));
    echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
    echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidNames as $uniqueValidNames) {
        echo "<li>$uniqueValidNames</li>";
    }
    echo "</ul>";

    echo '<h2>Common First Names</h2>';
    $commonFirstNames = getCommonNames($firstNames);
    //dd($commonFirstNames);

    echo ("<p>There are " . sizeof($commonFirstNames) . " duplicate first names: <br></p>");
   echo '<ul style="list-style-type:none">';    
    foreach($commonFirstNames as $cn => $val) {
       echo "<li>".$cn." is repeated ".$val." times.</li>";
    }
    echo "</ul>";

    echo '<h2>Common Last Names</h2>';
    $commonLastNames = getCommonNames($lastNames);
    //dd($commonFirstNames);

    echo ("<p>There are " . sizeof($commonLastNames) . " duplicate first names: <br></p>");
   echo '<ul style="list-style-type:none">';    
    foreach($commonLastNames as $cn => $val) {
       echo "<li>".$cn." is repeated ".$val." times.</li>";
    }
    echo "</ul>";

?>








