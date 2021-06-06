<?php

namespace controllers;
use Exception;

class SiteController extends Controller
{
    public function index()
    {
        try {
            $tableData = null;
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', 'https://jsonplaceholder.typicode.com/todos');
//            echo $res->getStatusCode();
//            echo $res->getHeader('content-type')[0];
            $body = $res->getBody()->getContents();

            return $this->renderPhpFile('views/site/index.php', [
                'body' => $body
            ]);
        } catch (Exception $e) {
            return $e;
        }

    }
}