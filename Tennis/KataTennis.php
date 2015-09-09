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
        $this->score = 'love all';
    }

    public function getScore() {
        return $this->score;
    }

    public function whoGetThisScore($player) {
        switch ($player) {
            case $this->player1:
                $this->score = 'fifteen love';
                break;
            case $this->player2:
                $this->score = 'love fifteen';
                break;
        }
    }
}