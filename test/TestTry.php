<?php

use PHPUnit\Framework\TestCase;

class InitialTest extends TestCase
{
    public function testPrintSomething()
    {
        print "test";
        $this->assertEquals(true, true);
    }
}
