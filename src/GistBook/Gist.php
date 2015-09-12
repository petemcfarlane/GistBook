<?php

namespace GistBook;

class Gist
{
    private $uri;
    private $id;
    private $username;
    private $files;

    public static function fromUri($uri)
    {
        return new Gist($uri);
    }

    public function files()
    {
        if (is_null($this->files)) {
            $github = new Github();
            $this->files = $github->requestFilesFromGist($this);
        }
        return $this->files;
    }

    public function getId()
    {
        return $this->id;
    }

    private function __construct($uri) {
        $this->parseUri($uri);
    }

    private function parseUri($uri)
    {
        if (!preg_match('/gist\.github\.com\/(?<username>[^\/]+)\/(?<id>[^\/]+)/', $uri, $matches)) {
            throw new \InvalidArgumentException('Invalid Uri');
        }
        $this->uri = $uri;
        $this->id = $matches['id'];
        $this->username = $matches['username'];
    }
}
