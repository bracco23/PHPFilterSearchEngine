<?php

namespace bracco23\Token;

interface ITokenizer
{
    function getTokens(string $inputString): array;
}
