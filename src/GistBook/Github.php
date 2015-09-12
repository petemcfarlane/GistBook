<?php

namespace GistBook;

use Guzzle\Http\Client;

class Github
{
    public function requestFilesFromGist(Gist $gist)
    {
        $client = new Client("https://api.github.com");
        $response = $client->get("/gists/{$gist->getId()}")->send();
        if (!$response->isSuccessful()) {
            throw new \Exception($response->getStatusCode() . ' ' . $response->getReasonPhrase());
        }
        $gist = json_decode($response->getBody(), true);
        return $gist['files'];
    }
}
