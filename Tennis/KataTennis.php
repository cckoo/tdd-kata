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
        switch ($score) {
            case 0:
                $res = "love ";
                break;
            case 1:
                $res = "fifteen ";
                break;
            case 2:
                $res = "thirty ";
                break;
            case 3:
                $res = "forty ";
                break;
            default:
                $res = $score;
        }

        return $res;
    }

    public function getScore() {
        $player1Score = $this->translateScoreToString($this->score[0]);
        $player2Score = $this->translateScoreToString($this->score[1]);
        if (is_numeric($player1Score) || is_numeric($player2Score)) {
            if ($player1Score === $player2Score)
                return 'deuce';

            if ($player1Score !== 'forty ' && !is_numeric($player1Score))
                return $this->player2 . " win";

            if ($player2Score !== 'forty ' && !is_numeric($player2Score))
                return $this->player1 . " win";

            if ($player1Score === 'forty ' && is_numeric($player2Score) && $player2Score >= 5)
                return $this->player2 . " win";

            if ($player2Score === 'forty ' && is_numeric($player1Score) && $player1Score >= 5)
                return $this->player1 . " win";

            if (is_numeric($player1Score) && is_numeric($player2Score)){
                if ($player1Score - $player2Score >= 2)
                    return $this->player1 . " win";
                if ($player2Score - $player1Score >= 2)
                    return $this->player2 . " win";
            }

            return $player1Score > $player2Score ? $this->player1 . " advantage" : $this->player2 . " advantage";
        }
        if ($player1Score === $player2Score) {

            if ($player1Score === 'forty ') {
                return 'deuce';
            }

            return $player1Score . "all";
        }

        return  trim($player1Score . $player2Score);
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