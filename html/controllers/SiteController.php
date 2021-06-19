<?php

namespace controllers;

require_once "bootstrap.php";

use GuzzleHttp\Exception\GuzzleException;
use models\ApiClient;
use models\View;
use src\Todo;

class SiteController extends Controller
{
    /**
     * Renders
     *
     * @return false|string
     * @throws GuzzleException
     */
    public function index(ApiClient $client)
    {
        $todos = $client->getTodos();
        if ($todos) {
            Todo::createMultipleTodosFromArray($todos, $this->em);

            return $this->renderPhpFile('views/site/index.php', [
                'view' => new View(),
                'todoObjects' => $todos
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
        $contents = $res->getBody()->getContents();

        if ($res->getStatusCode() !== 200) {
            return null;
        }

        return $contents;
    }

}