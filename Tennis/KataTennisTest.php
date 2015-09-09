<?php
require_once 'KataTennis.php';

class KataTennisTest extends PHPUnit_Framework_TestCase {
    public function test_start_game_score_is_love_all() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->assertEquals("love all", $tennis->getScore());
    }

    public function test_player1_win_score_should_be_fifteen_love() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $tennis->whoGetThisScore('cwcwk');
        $this->assertEquals("fifteen love", $tennis->getScore());
    }

    public function test_player2_win_score_should_be_love_fifteen() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $tennis->whoGetThisScore('cckoo');
        $this->assertEquals("love fifteen", $tennis->getScore());
    }
}