<?php

class KataFizzBuzz {
    public function translate($input) {
        return array_map(array($this, 'replace'), range(1, $input));
    }

    private function replace($num) {
        if ($num % 15 === 0) {
            return 'FizzBuzz';
        }

        if ($num % 5 === 0) {
            return 'Buzz';
        }

        if ($num % 3 === 0) {
            return 'Fizz';
        }

        return $num;
    }
}