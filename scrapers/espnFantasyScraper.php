<?php
$stored = './tmp/scraperResult.txt';
$validTeam = true;
$teamId = 0;
$scores = array();
while($validTeam){
    $teamId++;
    if($teamId < 15){
    $url = 'http://games.espn.com/ffl/schedule?leagueId=429859&teamId='.$teamId.'&seasonId=2016';
    }
    else{
        exit();
    }
    print_r($teamId);
    $output = file_get_contents($url);

    $DOM = new DOMDocument();

    $internalErrors = libxml_use_internal_errors(true);
    $DOM->loadHTML($output);
    libxml_use_internal_errors($internalErrors);

    $headers = $DOM->getElementsByTagName('th');
    $details = $DOM->getElementsByTagName('td');

    $tableHeaders = array();
    foreach($headers as $header){
        $tableHeaders[] = trim($header->textContent);
    }
    //print_r($tableHeaders);exit();

    $tableDetails = array();
    foreach($details as $detail){
        $tableDetails[] = trim($detail->textContent);
    }

    // remove the first element from the array
    array_splice($tableDetails, 0, 2);

    // each weekly score with values will have 6 elements
    // keep checking 6 elements ahead until the value is no longer starts with "week"
    $elementCount = 0;
    $validWeek = true;
    //print_r($tableDetails[$elementCount]);exit();
    $firstPass = true;
    while($validWeek){
        $pos = strpos($tableDetails[$elementCount], 'Week');
        if(false !== $pos){
            $scores[$teamId][$tableDetails[$elementCount]][$tableHeaders[1]] = $tableDetails[$elementCount+1];
            $scores[$teamId][$tableDetails[$elementCount]][$tableHeaders[2]] = $tableDetails[$elementCount+2];
            $scores[$teamId][$tableDetails[$elementCount]][$tableHeaders[3]] = $tableDetails[$elementCount+4];
            $elementCount += 6;
            $firstPass = false;
        }
        else{
            if($firstPass){
                $validTeam = false;
                $validWeek = false;
            }
            else{
                $validWeek = false;
            }
        }

    }
}
print_r($scores);

$result = file_put_contents($stored, serialize($scores));
print_r($result);
exit();