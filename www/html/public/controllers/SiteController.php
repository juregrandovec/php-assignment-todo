<?php

namespace controllers;

use GuzzleHttp\Exception\GuzzleException;
use lib\View;

class SiteController extends Controller
{
    /**
     * Renders
     *
     * @return false|string
     * @throws GuzzleException
     */
    public function index()
    {
        return $this->renderPhpFile('views/site/index.php', [
            'view' => new View(),
            'todoObjects' => $this->requestPlaceholderTodoData()
        ]);
    }

    /**
     * Makes a request to jsonplaceholder.com and returns an array of stdObjects representing sample "TODO's"
     *
     * @return string
     * @throws GuzzleException
     */
    private function requestPlaceholderTodoData(): string
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://jsonplaceholder.typicode.com/todos');

        return $res->getBody()->getContents();
    }

}