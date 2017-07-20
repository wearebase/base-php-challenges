<?php

/*
Challenge 1: Read and write to Test::$secret before it's output.

Rules::
1. No use of Reflection API / runkit extension
2. No stopping execution before Test::run()
3. No Exceptions or PHP errors / warnings notices allowed
4. No redefining $test

Hints:
1. Caesar
2. Magic methods
3. Requires something that became available in PHP 5.4

*/


class Test
{
    private $secret = 'Nyy lbhe Onfr ner orybat gb hf.';

    private $callback;

    final public function run()
    {
        call_user_func($this->callback);
        return $this->secret . PHP_EOL;
    }

    public function __set($k, $v)
    {
        $key          = $v[($v[$v])]; // $v is some kind of weird array
        $value        = $v(); // and a callback!
        $this->{$key} = $value;
    }

}


$test = new Test;

// start editing here


// end editing here

echo $test->run();

