<?php

require_once 'Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->calculator = new Calculator();
	}
	/**
	 * @test
	 */
	public function nullStringReturnZero() {
		$this->assertEquals(0, $this->calculator->add(""));
	}
	/**
	 * @test
	 */
	public function stringNumReturnNum() {
		$this->assertEquals(1, $this->calculator->add("1"));
	}
	/**
	 * @test
	 */
	public function stringTwoNumReturnSum() {
		$this->assertEquals(3, $this->calculator->add("1,2"));
	}
	/**
	 * @test
	 */
	public function stringMultiNumReturnSum() {
		$this->assertEquals(6, $this->calculator->add("1,2,3"));
	}
	/**
	 * @test
	 */
	public function stringDelimiterWithNewline() {
		$this->assertEquals(6, $this->calculator->add("1,2\n3"));
	}
}
