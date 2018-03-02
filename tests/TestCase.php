<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setup()
    {
    	parent::setup();
    	$testName = str_replace(["test", "_"], ["", " "], $this->getName());
        $testName = preg_replace_callback("/[a-zA-Z0-9]{3,}\b/", function($match){
            return ucfirst($match[0]);
        }, $testName);

        $time = $this->getTestResultObject()->time();
        $className = get_class($this);
        dump(' ->' . $testName . ' [ ' . number_format($time, 3) . ' ]' . "[$className]");

    }
}
