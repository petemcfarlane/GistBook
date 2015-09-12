<?php

namespace GistBook;

class Gist
{
    private function __construct() {}

    public static function fromUri($uri)
    {
        if (!filter_var($uri, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('Invalid Uri');
        }
        $gist = new Gist();
        $gist->uri = $uri;
        return $gist;
    }
}
