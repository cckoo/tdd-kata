<?php
class Calculator {
	public $delimiter = "/,|\n/";
	public function add($string){
		if (preg_match($this->delimiter, $string)) {
			$nums = $this->numsOf($string);
			return $this->sumOf($nums);
		}
		if (is_numeric($string)) {
			return $string;
		}
		return 0;
	}
	public function numsOf($string) {
		return preg_split($this->delimiter, $string);
	}
	public function sumOf($nums) {
		return array_sum($nums);
	}
}
