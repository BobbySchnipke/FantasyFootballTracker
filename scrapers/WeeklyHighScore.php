<?php
class WeeklyHighScore
{
    public static function getHighScores($scoresArray){
        $highScore = array();
        $gameScores = array();
        foreach($scoresArray as $key=>$weeklyScores){
            $currentHighScore = 0;
            $currentWeek = $key;
            foreach($weeklyScores as $key=>$game){
                $awayTeam = strtok($key, '(');
                $homeTeam = strtok($game['opponent'], '(');
                $scores = explode('-', $game['score']);
                $gameScores[$awayTeam] = $scores[0];
                $gameScores[$homeTeam] = $scores[1];
                if($gameScores[$awayTeam] == $currentHighScore){
                    $highScore[$currentWeek] = 'TIE!!! '.$highScore['currentWeek'].' - '.$awayTeam;
                }
                if($gameScores[$awayTeam] > $currentHighScore){
                    $highScore[$currentWeek] = $awayTeam.' - '.$gameScores[$awayTeam];
                    $currentHighScore = $gameScores[$awayTeam];
                }
                if($gameScores[$homeTeam] == $currentHighScore){
                    $highScore[$currentWeek] = 'TIE!!! '.$highScore['currentWeek'].' - '.$homeTeam;
                }
                if($gameScores[$homeTeam] > $currentHighScore){
                    $highScore[$currentWeek] = $homeTeam.' - '.$gameScores[$homeTeam];
                    $currentHighScore = $gameScores[$homeTeam];
                }
                
            }
        }
        return $highScore;
    }
}