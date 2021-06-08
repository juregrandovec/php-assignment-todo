<?php

namespace controllers;

use GuzzleHttp\Exception\GuzzleException;
use models\View;

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
        $result = \GuzzleHttp\json_decode($this->requestPlaceholderTodoData());
        if ($result) {
            return $this->renderPhpFile('views/site/index.php', [
                'view' => new View(),
                'todoObjects' => $result
            ]);
        } else {
            return $this->renderPhpFile('views/site/error.php');
        }
    }

    /**
     * Makes a request to jsonplaceholder.com and returns an array of stdObjects representing sample "TODO's"
     *
     * @return string|null
     * @throws GuzzleException
     */
    private function requestPlaceholderTodoData(): ?string
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://jsonplaceholder.typicode.com/todos');

        if ($res->getStatusCode() !== 200) {
            return null;
        }

        return $res->getBody()->getContents();
    }

}