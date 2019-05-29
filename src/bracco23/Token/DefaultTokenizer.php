<?php

namespace bracco23\Token;

use bracco23\Support\MbStrIterator;

class DefaultTokenizer implements ITokenizer
{
    private $separator;
    private $delimiter;
    private $escape;

    public function __construct(string $separator = "\\s", string $delimiter = "\"", string $escape = "\\")
    {
        $this->separator = $separator;
        $this->delimiter = $delimiter;
        $this->escape = $escape;
    }

    private $STATE_NORMAL = function ($char, $state, $output, $outputIndex) {
        if(mb_ereg_match($separator, $c)){

        }elseif(mb_ereg_match($delimiter, $c)){

        }elseif(mb_ereg_match($escape, $c)){
            $state = self::STATE_ESCAPED;
        }
    };

    private $STATE_IN_DELIMITER = function ($char, &$state, &$output, &$outputIndex){
        if(mb_ereg_match($separator, $c)){

        }elseif(mb_ereg_match($delimiter, $c)){

        }elseif(mb_ereg_match($escape, $c)){
            
        }
    };
    private $STATE_ESCAPED = function ($char, &$state, &$output, &$outputIndex){
        if(mb_ereg_match($separator, $c)){

        }elseif(mb_ereg_match($delimiter, $c)){

        }elseif(mb_ereg_match($escape, $c)){
            
        }
    };
    private $STATE_ESCAPED_IN_DELIMITER = function ($char, &$state, &$output, &$outputIndex){
        if(mb_ereg_match($separator, $c)){

        }elseif(mb_ereg_match($delimiter, $c)){

        }elseif(mb_ereg_match($escape, $c)){
            
        }
    };

    public function getTokens(string $inputString): array
    {
        $actualState = self::$STATE_NORMAL;
        $iter = new MbStrIterator($inputString);
        $toReturn = [];
        $returnIndex = 0;

        foreach ($iter as $c) {
           $actualState($c, $actualState, $toReturn, $returnIndex);
        }
        return $toReturn;
    }
}
