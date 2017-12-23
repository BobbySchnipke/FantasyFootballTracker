<?php

    require_once('./models/classes/Teams.php');
    $stored = './tmp/teamsScraperResult.txt';
    $leagueId = 429859;

    $status = Teams::addTeamsToDb($leagueId);

    if($status == 'success'){
        file_put_contents($stored, serialize($scores));
    }

    print_r($status); exit();

//     // This particular page is used because it lists the teams in order of teamId starting with 1
//     $url = 'http://games.espn.com/ffl/leaguerosters?leagueId='.$leagueId;

//     $output = file_get_contents($url);

//     $DOM = new DOMDocument();

//     $internalErrors = libxml_use_internal_errors(true);
//     $DOM->loadHTML($output);
//     libxml_use_internal_errors($internalErrors);

//     $teams = $DOM->getElementsByTagName('th');
//     forEach($teams as $team){
//         $team = $team->textContent;
//         // remove the scores at the end of the team names
//         $scoreStart = strpos($team, '(');
//         $length = strlen($team);
//         $end = $scoreStart - $length - 1;
//         $teamName = substr($team, 0, $end);
        
//         // store the teamName in the database with the teamId
//         $teamRecord = \TeamsQuery::create()
//             ->setLeagueId($leagueId)
//             ->setTeam_league_id($teamId)
//             ->setTeamName($teamName)
//             ->save();
            
//     }
// $result = file_put_contents($stored, serialize($scores));
// print_r($result);
// exit();