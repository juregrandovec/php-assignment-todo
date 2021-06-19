<?php


namespace models;


abstract class ApiClient
{
    public $client;

    abstract public function getTodos(): array;
}