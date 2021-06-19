<?php


namespace models;


class GuzzleApiClient extends ApiClient
{
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getTodos(): array
    {
        $res = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/todos');
        return \GuzzleHttp\json_decode($res->getBody()->getContents());
    }
}