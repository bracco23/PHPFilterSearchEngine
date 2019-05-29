<?php

use PHPUnit\Framework\TestCase;
use bracco23\Token\DefaultTokenizer;

class DefaultTokenizerTest extends TestCase
{
    public function testEmptyString()
    {
        $tokenizer = new DefaultTokenizer();
        $this->assertEquals([], $tokenizer->getTokens(""));
    }

    public function testSingleElementString()
    {
        $tokenizer = new DefaultTokenizer();
        $this->assertEquals(["prova"], $tokenizer->getTokens("prova"));
    }
}
