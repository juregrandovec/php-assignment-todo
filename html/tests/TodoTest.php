<?php

namespace tests;


use src\Todo;
use PHPUnit\Framework\TestCase;

class TodoTest extends TestCase
{
    public $em;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        require ("bootstrap.php");
        parent::__construct($name, $data, $dataName);
        $this->em = $entityManager;
    }

    public function testCreateMultipleTodosFromArray()
    {
        $testData = [
            (object)['title' => 'test1'],
            (object)['title' => 'test2'],
            (object)['title' => 'test3'],
        ];

        Todo::createMultipleTodosFromArray($testData, $this->em);

        foreach ($testData as $todo){
            $result = $this->em->getRepository('src\Todo')->findBy(['text' => $todo->title]);
            $this->assertGreaterThan(0, count($result));
        }
    }
}
