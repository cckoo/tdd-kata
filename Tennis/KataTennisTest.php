<?php
require_once 'KataTennis.php';

class KataTennisTest extends PHPUnit_Framework_TestCase {
    public function test_start_game_score_is_love_all() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->assertEquals("love all", $tennis->getScore());
    }

    public function test_player1_win_score_should_be_fifteen_love() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cwcwk', 1);
        $this->assertEquals("fifteen love", $tennis->getScore());
    }

    public function test_player2_win_score_should_be_love_fifteen() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cckoo', 1);
        $this->assertEquals("love fifteen", $tennis->getScore());
    }

    public function test_player_all_win_score_should_be_fifteen_all() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cwcwk', 1);
        $this->who_win_many_times($tennis, 'cckoo', 1);

        $this->assertEquals("fifteen all", $tennis->getScore());
    }

    public function test_player1_win_twice_score_should_be_thirty_love() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cwcwk', 2);

        $this->assertEquals("thirty love", $tennis->getScore());
    }

    public function test_player2_win_twice_score_should_be_love_thirty() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cckoo', 2);
        $this->assertEquals("love thirty", $tennis->getScore());
    }

    public function test_player_all_win_twice_score_should_be_thirty_all() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cckoo', 2);
        $this->who_win_many_times($tennis, 'cwcwk', 2);;
        $this->assertEquals("thirty all", $tennis->getScore());
    }

    public function test_player1_win_three_times_score_should_be_forty_love() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cwcwk', 3);
        $this->assertEquals("forty love", $tennis->getScore());
    }

    public function test_player1_win_three_times_score_should_be_love_forty() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cckoo', 3);
        $this->assertEquals("love forty", $tennis->getScore());
    }

    public function test_player_all_win_three_times_score_should_be_forty_all() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cckoo', 3);
        $this->who_win_many_times($tennis, 'cwcwk', 3);
        $this->assertEquals("deuce", $tennis->getScore());
    }

    public function test_when_deuce_player1_win_score_should_be_player1name_advantage() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cckoo', 3);
        $this->who_win_many_times($tennis, 'cwcwk', 4);
        $this->assertEquals("cwcwk advantage", $tennis->getScore());
    }

    public function test_when_deuce_player2_win_score_should_be_player2name_advantage() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cwcwk', 3);
        $this->who_win_many_times($tennis, 'cckoo', 4);
        $this->assertEquals("cckoo advantage", $tennis->getScore());
    }

    public function test_when_deuce_player1_win_and_player2_win_score_should_be_deuce() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cwcwk', 3);
        $this->who_win_many_times($tennis, 'cckoo', 4);
        $this->who_win_many_times($tennis, 'cwcwk', 1);
        $this->assertEquals("deuce", $tennis->getScore());
    }

    public function test_when_player1_win_four_times_and_player2_didnt_win_more_than_three_times_should_be_player1_win() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cwcwk', 3);
        $this->who_win_many_times($tennis, 'cckoo', 2);
        $this->who_win_many_times($tennis, 'cwcwk', 1);
        $this->assertEquals("cwcwk win", $tennis->getScore());
    }

    public function test_when_player2_win_four_times_and_player1_didnt_win_more_than_three_times_should_be_player2_win() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cwcwk', 1);
        $this->who_win_many_times($tennis, 'cckoo', 4);
        $this->assertEquals("cckoo win", $tennis->getScore());
    }

    public function test_when_deuce_player1_win_twice_score_should_be_player1_win() {
        $tennis = new KataTennis("cwcwk", "cckoo");
        $this->who_win_many_times($tennis, 'cwcwk', 3);
        $this->who_win_many_times($tennis, 'cckoo', 3);
        $this->who_win_many_times($tennis, 'cwcwk', 2);
        $this->assertEquals("cwcwk win", $tennis->getScore());
    }

    public function who_win_many_times(KataTennis $tennis, $winner, $score){
        for ($i = 0; $i < $score; $i++) {
            $tennis->whoGetThisScore($winner);
        }
    }
}