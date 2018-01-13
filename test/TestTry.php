<?php 

require_once(__DIR__."/../vendor/autoload.php");

use PHPUnit\Framework\TestCase;

class InitialTest extends TestCase{
    function testPrintSomething(){
        print "test";
        $this->assertEquals(true, true);
    }
}