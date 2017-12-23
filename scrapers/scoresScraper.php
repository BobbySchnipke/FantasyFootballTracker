<?php
    include_once('WeeklyHighScore.php');
    $stored = './tmp/scoreScraperResult.txt';
    $validTeam = true;
    $teamId = 0;
    $scores = array();

    $url = 'http://games.espn.com/ffl/schedule?leagueId=429859&teamId='.$teamId;

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

    $tableDetails = array();
    foreach($details as $detail){
        $tableDetails[] = trim($detail->textContent);
    }
    // remove the first element from the array
    // array_splice($tableDetails, 0, 2);

    // each weekly score with values will have 6 elements
    // keep checking elements ahead until the value is no longer contains a '-', which is
    // only present when scores are in the sixth element
    $elementCount = 0;
    $validWeek = true;
    // print_r($tableDetails[$elementCount]);exit();
    // print_r($tableDetails);exit();
    $firstPass = true;
    $weekElement = 1;
    $tempCount = 0;
    $weekCounter = 1;
    while($validWeek){
        $dashPos = strpos($tableDetails[$elementCount], '-');
        $weekPos = strpos(strToLower($tableDetails[$elementCount]), 'week');
        if($firstPass){
            $gameCounter = 0;
            $elementCount += 2;
        }
        $firstPass = false;

        if(false !== $dashPos || false !== $weekPos){
            $scores[$weekCounter][$tableDetails[$elementCount]]['opponent']
                = $tableDetails[$elementCount+3];
            $scores[$weekCounter][$tableDetails[$elementCount]]['score']
                = $tableDetails[$elementCount+5];
            $elementCount += 6;
            $gameCounter += 1;
            $tempCount += 1;
        } else if($gameCounter == 6){
            if(strpos(strtolower($tableDetails[$elementCount + 1]), 'playoffs')){
                $validWeek = false;
            } else {
                $weekCounter += 1;
                $gameCounter = 0;
                $elementCount += 2;
            }
        } else {//print_r($tableDetails[$elementCount]);exit();
           $validWeek = false;
        }
    }//print_r($tempCount."\n".$weekCounter);exit();
// print_r($scores);

$highScoreByWeek = \WeeklyHighScore::getHighScores($scores);
print_r($highScoreByWeek);exit();
$result = file_put_contents($stored, serialize($highScoreByWeek));
// print_r($result);
exit();