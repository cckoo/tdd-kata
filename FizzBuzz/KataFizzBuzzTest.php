<?php
require_once 'KataFizzBuzz.php';

class KataFizzBuzzTest extends PHPUnit_Framework_TestCase {
    public function setUp() {
        $this->kata_fizz_buzz = new KataFizzBuzz();
    }
    public function test_input_1_return_1() {
        $this->assertEquals(array(1), $this->kata_fizz_buzz->translate(1));
    }
    public function test_input_2_return_array_1_2() {
        $this->assertEquals(array(1,2), $this->kata_fizz_buzz->translate(2));
    }
    public function test_input_3_return_array_3_replace_by_Fizz() {
        $this->assertEquals(array(1, 2, 'Fizz'), $this->kata_fizz_buzz->translate(3));
    }
    public function test_input_5_return_array_3_replace_by_Fizz_5_replace_by_Buzz() {
        $this->assertEquals(array(1,2,'Fizz',4,'Buzz'), $this->kata_fizz_buzz->translate(5));
    }

    public function test_input_6_return_array_6_replace_by_Fizz() {
        $this->assertEquals(array(1,2,'Fizz',4,'Buzz','Fizz'), $this->kata_fizz_buzz->translate(6));
    }

    public function test_input_10_return_array_10_replace_by_Buzz() {
        $expect = [1,2,'Fizz',4,'Buzz','Fizz',7,8,'Fizz','Buzz'];
        $this->assertEquals($expect, $this->kata_fizz_buzz->translate(10));
    }

    public function test_input_15_return_array_15_replace_by_FizzBuzz() {
        $expect = [1,2,'Fizz',4,'Buzz','Fizz',7,8,'Fizz','Buzz',11,'Fizz',13,14,'FizzBuzz'];
        $this->assertEquals($expect, $this->kata_fizz_buzz->translate(15));
    }
}