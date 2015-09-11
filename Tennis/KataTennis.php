<?php
/**
 * TDD KATA Tennis 练习
 */

class KataTennis {
    private $player1;       //玩家一
    private $player2;       //玩家二
    private $score;         //比分

    public function __construct($player1, $player2) {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->start();
    }

    private function start() {
        $this->score = array(0,0);
    }

    private function translateScoreToString($score) {
        $dect = array('love ', 'fifteen ', 'thirty ', 'forty ');
        return isset($dect[$score]) ? $dect[$score] : $score;
    }

    private function getScoreWhenInLimit($player1Score, $player2Score) {
        $player1Score = $this->translateScoreToString($player1Score);
        $player2Score = $this->translateScoreToString($player2Score);

        if ($player1Score !== $player2Score){
            return trim($player1Score . $player2Score);
        }

        if ($player1Score !== 'forty '){
            return $player1Score . "all";
        }

        return 'deuce';
    }

    private function getScoreWhenOutLimit($player1Score, $player2Score) {
        if ($player1Score === $player2Score){
            return 'deuce';
        }

        if (abs($player1Score - $player2Score) >= 2){
            return $player1Score > $player2Score ? $this->player1 . ' win' : $this->player2 . ' win';
        }

        return $player1Score > $player2Score ? $this->player1 . " advantage" : $this->player2 . " advantage";
    }

    public function getScore() {

        if (max($this->score[0],$this->score[1]) >= 4) {
            return $this->getScoreWhenOutLimit($this->score[0], $this->score[1]);
        }

        return  $this->getScoreWhenInLimit($this->score[0], $this->score[1]);
    }

    public function whoGetThisScore($player) {
        switch ($player) {
            case $this->player1:
                $this->score[0] += 1;
                break;
            case $this->player2:
                $this->score[1] += 1;
                break;
        }
    }
}